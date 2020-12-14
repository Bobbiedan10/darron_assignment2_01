<?php
  class LoginController extends AbstractController
  {
    protected function makeModel() : Model
    {
      return new Model(DB_USER, DB_PASS, DB_NAME, DB_HOST);
    }

    protected function makeView() : View
    {
      $view = new View();
      return $view;
    }

    public function start()
    {
      $auth = new AuthenticateController();
      if(isset($_GET['logout']) && ($_GET['logout'] == true) && $auth->isUserLoggedIn())
      {
        $auth->logOutUser();
        header('location:index.php');
        exit();
      }
      
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
        $index_controller = new IndexController();
        $index_controller->setErrorMessages(['login'=>'Login failed']);
        $index_controller->start();
      }
    }
  }