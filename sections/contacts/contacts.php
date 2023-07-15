<?php
    namespace SITE;
    class Page {
        public $topdescription;
        public $addscript;
        public $ui;

        public function __construct($id)
        {
            $this->topdescription = "Контакты";
            $this->ui = '
            <div class="article-wrapper">
            <img src="/cdn/discord.png" class="img-block-logo" title="Discord">
            <p style="text-decoration: none" href="https://discord.com">
            <h1 class="table">DISCORD</h1>
            <p class="table-date">Наш discord-сервер</p>
            <p class="table">Условный discord-сервер</p>
            </p>
            </div>
            <div class="article-wrapper">
            <img src="/cdn/telegram.png" class="img-block-logo" title="Telegram">
            <p style="text-decoration: none" href="https://t.me/">
            <h1 class="table">TELEGRAM</h1>
            <p class="table-date">Наш telegram-канал</p>
            <p class="table">Условный telegram-канал</p>
            </p>
            </div>';
        }
    }
?>