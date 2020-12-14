<?php
  require 'autoloader.php';
  require 'config.php';

  $controller = new RegistrationController();
  $controller->start();