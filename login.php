<?php
  require 'autoloader.php';
  require 'config.php';

  $auth = new Authenticate();

  if(!$auth->isUserLoggedIn())
  {
    if(empty($_POST))
    {
      trigger_error('Invalid access to login.php page attempted', E_USER_ERROR);
      return false;
    }
    $username = $_POST['username'];
    $password = $_POST['password'];
    $auth->loginUser([$username,$password]);
  }

  if($auth->isUserLoggedIn())
  {
    header('location:public_console.php');
  }
  else
  {
    
  }