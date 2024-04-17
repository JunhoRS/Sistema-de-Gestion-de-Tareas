<?php

  require 'config/config.php';
  
  require 'libs/database.php';
  require 'libs/controller.php';
  require 'libs/view.php';
  require 'libs/model.php';
  
  require 'helpers/files.php';
  require 'helpers/session.php';
  
  require 'router/url_define.php';
  require 'router/router.php';
  
  $router= new Router();
  
?>