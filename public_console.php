<?php
  require 'autoloader.php';
  require 'config.php';

  $controller = new PublicConsoleController();
  $controller->start();