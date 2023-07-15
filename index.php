<!DOCTYPE html>
<!--မြန်မာ-->
<?php
    $I_GET_VAR = 'page';
    if(!isset($_GET[$I_GET_VAR]) || $_GET[$I_GET_VAR] == "articles"){
        include 'sections/articles/articles.php';
    }
    else{
        if(file_exists('sections/'.$_GET[$I_GET_VAR].'/'.$_GET[$I_GET_VAR].'.php'))
        include 'sections/'.$_GET[$I_GET_VAR].'/'.$_GET[$I_GET_VAR].'.php';
        else include 'sections/404/404.php';
    }
    if(isset($_GET['id']))
    $object = new SITE\Page($_GET['id']);
    else $object = new SITE\Page(NULL);
?>
<html lang="ru">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $object->topdescription; ?> - RT</title>

    <link rel="apple-touch-icon" sizes="180x180" href="/img/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon-16x16.png" />

    <link rel="stylesheet" type="text/css" href="/style/main.css" />
    <link rel="stylesheet" type="text/css" href="/style/frame.css" />
    <link rel="stylesheet" type="text/css" href="/style/content.css" />
    <?php 
      if(isset($object->addscript)) echo '<script type="text/javascript" src="'.$object->addscript.'"></script>'; 
    ?>
  </head>
  <body>
    <div clas="root">
      <div class="jsv" id="jsv"></div>
      <div class="navbar" id="navbar">
        <div style="display: none" id="navbar-mini" class="navbar-element">
          <img title="open menu" src="/img/menu.png" id="open-menu" height="35EM" />
        </div>
        <div class="navbar-logo" id="navbar-logo">
          <a href="/" class="navbar-logo">RT</a>
        </div>
        <div id="navbar-full">
          <div class="navbar-element">
            <a href="/" class="navbar-element">Главная</a>
          </div>
          <div class="navbar-element">
            <a href="/?page=contacts" class="navbar-element">Контакты</a>
          </div>
          <div class="navbar-element-right">
            <a href="https://github.com" class="navbar-element">GitHub</a>
            <img title="github icon" src="/img/github.png" height="25EM" widht="25EM" />
          </div>
          <!--div class="navbar-element-right">
            <a class="navbar-element" id="language">Language</a>
            <img title="language icon" src="/img/language.png" height="25EM" widht="25EM" />
          </div -->
        </div>
      </div>
      <div class="navbar-mini-opened" id="navbar-mini-opened">
        <div class="navbar-mini-element">
          <a href="/" class="mini-navbar-element">Главная</a>
        </div>
        <div class="navbar-mini-element">
          <a href="/?page=contacts" class="mini-navbar-element">Контакты</a>
        </div>
        <div class="navbar-mini-element">
          <a href="https://github.com" class="mini-navbar-element">GitHub</a>
          <img title="github icon" src="/img/github.png" height="25EM" widht="25EM" />
        </div>
        <!-- div class="navbar-mini-element">
          <a class="mini-navbar-element" id="language">Language</a>
          <img title="language icon" src="/img/language.png" height="25EM" widht="25EM" />
        </div -->
      </div>
      <div class="content" id="content">
        <div class="wallpaper-img">
          <h1 class="titled">RT</h1>
          <h2 class="titled"><?php echo $object->topdescription;?></h2>
        </div>
        <?php
                    if(isset($object->ui)) echo $object->ui; ?>
      </div>
    </div>
    <footer class="footer" id="footer">
      <div class="footer-element"><a href="/?page=about" class="footer-text">О нас</a><br /></div>
      <div class="footer-element"><a href="/?page=contacts" class="footer-text">Контакты</a><br /></div>
    </footer>
    <script type="text/javascript" src="/scripts/js/load.js"></script>
  </body>
</html>
<?php $conn->close(); ?>