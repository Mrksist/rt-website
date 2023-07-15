<?php
    namespace SITE;
    class Page {

        public function __construct($id)
        {
            $this->topdescription = "404";
            $this->ui = "<h1 class=\"md\">Страница не найдена</h1>
            <h3 class=\"md\">Возможно, она была перемещена и сейчас находится по другому адресу. Попробуйте обратиться к нам одним из способов со страницы <a class=\"md\" href=\"/contacts\">контакты</a></h3>";
        }
    }
?>