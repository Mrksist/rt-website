# Веб-сайт RT
Сайт был написан за довольно короткое время. Тематика - хостинг статей на любые темы. Для деплоя требуется PHP с поддержкой библиотеки MySQLi и, собственно, сама база данных MySQL. Репозиторий создан для подачи заявки на программу НЕЙМАРК: https://vega52.ru/neymark!!!!!
## История разработки
Разработан с помощью немного устаревших средств: классических HTML/CSS/JS/PHP/SQL без использования каких-либо веб-фреймворков (если не считать MySQLi в PHP). Написан в июне 2021 года, адаптирован под GitHub в июле 2022. Некоторое время работал на публике с доменом rt.mcxyz.ru, домен на данный момент не функционирует. 
## Развёртывание 
Подробно описывается процесс развёртывания сайта для использования в различных кругах.

Скопируйте данные сайта в любую папку (пропишите это в командной строке):
```
git clone https://github.com/Mrksist/rt-website.git
```
Далее необходимо установить на вашу машину сам PHP, СУБД MySQL и отредактировать конфигурацию самого сайта. Конфигурация сайта располагается в файле rt.conf, находящегося в корне сайта, следующего содержания:
```conf
host=<hostname>
user=<username>
password=<password>
database=<database-name>
table=<table-name>
```
* В первой строчке вместо `<hostname>` вставьте имя хоста базы данных, если вы подключаетесь с MySQL, установленной на локальной машине, скорее всего, это `localhost`. В ином случае имя хоста базы данных располагается на панели управления базами данных вашего хостинга. 

* Во второй строчке вместо `<username>` имя пользователя, в третьей вместо `<password>` - пароль. Имя пользователя и пароль устанавливаются при установке СУБД, либо, если вы используете хостинг, располагаются рядом с именем хоста на панели управления. 

* В третьей строчке - имя базы данных вместо `<database-name>`. База данных должна быть создана в консоли MySQL следующим запросом:
```sql
CREATE DATABASE <имя>
```
Где `<имя>` - имя базы данных, которое следует подставить вместо `<database-name>`. 

* В последней строчке конфигурации вместо `<table-name>` следует подставить имя таблицы. Если таблицы с этим именем не существует в базе - сайт сам создаст её. 


Осталось лишь запустить сервер. При загрузке сайта на публичный хостинг пропустите этот шаг. При запуске на локальной машине это можно сделать при помощи PHP Development Server (командная строка):

```
PHP -S 127.0.0.1:<port>
```

Вместо `<port>` подставьте порт, на котором следует запускать сайт. Обычно, это 8080 или 8000.

## Создание статьи
Стати создаются в формате Markdown, создать Markdown можно, например, с помощью онлайн-редактора [Dillinger](https://dillinger.io/). Статья в формате .md должна быть помещена в каталог `archive` с именем `articles_<номер>.md`, где `<номер>` - идентификатор статьи, целое число. Теперь следует созать ссылку на статью в базе данных. В консоли MySQL:
```sql
INSERT INTO <имя-таблицы> (id, name, description, date) VALUES (<id>, <name>, <description>, NOW());
```
Где:
* `<имя-таблицы>` - имя таблицы, то же, что и в `rt.conf`. 
* `<id>` - номер статьи, тот же, что и `<номер>` в имени Markdown-файла статьи. 
* `<name>` - название статьи для сайта. Текст, ограниченный в размере 20 символами.
* `<description>` - описание статьи. Текст, в размере не ограниченный.

Статья отображается на сайте. В дальнейшем планируется автоматизировать процесс, за обновлениями вы можете следить в этом репозитории.
