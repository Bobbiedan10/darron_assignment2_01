<?php
  class AuthenticateController extends AbstractController
  {
    private static $firstname = '';
    private static $lastname = '';
    private static $username = '';
    private static $licenseNum = '';

    protected function makeModel() : Model
    {
      return new AuthenticateModel(DB_USER, DB_PASS, DB_NAME, DB_HOST);
    }

    protected function makeView() : View 
    {
      $view = new View();
      return $view;
    }

    public function start()
    {
      $this->model = $this->makeModel();
    }
    public function auth(string $username, string $password) : bool
    {
      $validate = new ValidateController();
      if(!$validate->checkUsername($username) || !$validate->checkPassword($password))
      {
        return false;
      }

      $fields = ['username'=>$username, 'password'=> $password];
      $records = $this->model->find('vlrms_drivers',$fields);
      if(empty($records))
      {
        return false;
      }
      else{
        self::$firstname = $records['FirstName'];
        self::$lastname = $records['LastName'];
        self::$username = $records['Username'];
        self::$licenseNum = $records['LicenseNum'];
        return true;
      }
    }

    public function loginUser(array $data)
    {
      
      if(empty($data))
      {
        trigger_error('Invalid parameter value recieved', E_USER_ERROR);
        return false;
      }

      session_start();
      $_SESSION['session_user']["username"] = self::$username;
      $_SESSION['session_user']["licenseNo"] = self::$licenseNum;
      $_SESSION['session_user']["firstName"] = self::$firstname;
      $_SESSION['session_user']["surname"] = self::$lastname;
      $_SESSION['session_user']['name'] = self::$firstname." ".self::$lastname;
      session_write_close();
    }

    public function isUserLoggedIn() : bool
    {
      session_start();
      if(!isset($_SESSION['session_user']['username']) || 
      empty($_SESSION['session_user']['username'] || 
      !$validate->checkUsername($_SESSION['session_user']['username'])))
      {
        session_write_close();
        return false;
      }
      else
      {
        session_write_close();
        return true;
      }
    }

    public function getUserInfo(string $field) : string
    {
      if(empty($field))
      {
        trigger_error('Invalid parameter recieved -: getUserInfo', E_USER_ERROR);
      }
      session_start();
      if(!isset($_SESSION['session_user'][$field]))
      {
        session_write_close();
        trigger_error('Invalid field name('.$field.') for getUserInfo(). Only username, password', E_USER_ERROR);
      }
      $info = $_SESSION['session_user'][$field];
      session_write_close();
      return $info;
    }

    public function logOutUser()
    {
      session_start();

      $_SESSION = array();

      if(ini_get("session.use_cookies"))
      {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]);
      }
      session_destroy();
      header('location:index.php');
      exit();
    }
  }