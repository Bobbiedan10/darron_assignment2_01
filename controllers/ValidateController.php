<?php
  class ValidateController extends AbstractController
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
      if($this->credentialsValidated($_POST))
      {
        $login_controller = new LoginController();
        $login_controller->start();
      }
      else
      {
        $index_controller = new IndexController();
        $index_controller->setErrorMessages($this->getErrorMessages());
        $index_controller->start();
      }
    }

    public function getErrorMessages()
  {
    return $this->errors;
  }

  public function setErrorMessages(string $field_name, string $err_msg)
  {
    if (empty($err_msg)) {
      trigger_error('Cannot create an empty error message', E_USER_ERROR);
    }
    if(empty($field_name))
    {
        trigger_error('Invalid field name used. Cannot be empty', E_USER_ERROR);
    }
    $this->errors[$field_name] = $err_msg;
  }

  public function credentialsValidated(array $user_info) : bool
  {
    
    $matched_record = 0;
    if($user_info['validation_by_js'] == false)
    {
      $username_valid = $this->checkUsername($user_info['username']);
      $password_valid = $this->checkPassword($user_info['password']);
      if(!$username_valid || !$password_valid)
      {
        $this->setErrorMessages("credentials", "Invalid username or password format");
        return false;
      }
      $authObj = new AuthenticateController();
      $authObj->start();
      if(!$authObj->auth($user_info['username'], $user_info['password']))
      {
        $this->setErrorMessages("credentials", "Invalid username or password!");
        return false;
      }
      return true;
    }
  }

  public function valid(string $name) : bool
  {
    if (!preg_match('/^[a-zA-Z_\x80-\xff][a-zA-Z0-9_\x80-\xff]*$/', $name)) 
    {
      trigger_error('Invalid variable name received');
      return false;
    }
    return true;
  }

  public function checkUsername(string $uname) : bool 
  {
    if(empty($uname))
    {
      $this->setErrorMessages('username','Error: Information missing');
      return false;
    }
    if(strlen($uname) <> 8)
    {
      $this->setErrorMessages('username','Error: Incorrect username length');
      return false;
    }
    if(!ctype_alpha(substr($uname,0,4)))
    {
      $this->setErrorMessages('username','Error: First 4 characters must be letters');
      return false;
    }
    if(!ctype_digit(substr($uname,4)))
    {
      $this->setErrorMessages('username','Error: Last 4 characters must be numbers');
      return false;
    }
    if($uname != ucfirst($uname))
    {
      $this->setErrorMessages('username','Error: First letter must be capital');
      return false;
    }
    if(substr($uname,1,3) != strtolower(substr($uname,1,3)))
    {
        $this->setErrorMessages('username','Error: Last 3 letters must be lowercase');
        return false;
    }
    else
    {
      return true;
    }
  }

  public function checkPassword(string $password) : bool 
  {
    if(empty($password))
    {
      $this->setErrorMessages("password","Error: Information missing");
      return false;
    }
    if(strlen($password) < 10)
    {
      $this->setErrorMessages("password","Error: Password too short");
      return false;
    }
    if(strlen($password) > 18)
    {
      $this->setErrorMessages("password","Error: Password too long");
      return false;
    }
    if(preg_match('/^(?=.\d)(?=.[a-z])(?=.[A-Z])(?=.[a-zA-Z]).{10,18}$/',$password))
    {
      $this->setErrorMessages("password","Error: Password must contain uppercase letter and number");
      return false;
    }
    if(!ctype_alpha(substr($password,0,1)))
    {
      $this->setErrorMessages("password","Error: First character must be a letter");
      return true;
    }
    else
    {
      return true;
    }
  }

  public function checkId(string $id) : bool 
  {
    $first_four;
        $second_two;
        $third_two;
        $last_four;
        
        if(empty($id))
        {
            $this->setErrorMessages('national_id','Error: Information missing');
            return false;
        }
        if($id[4] && $id[7] && $id[10] != '-')
        {
          $this->setErrorMessages('national_id','Error: Incorrect national Id format(Hypens Needed)');
            return false;
        }
        if(strstr($id,'-'))
        {
            list ($first_four, $second_two, $third_two, $last_four) = explode('-',$id);
        }
        if(!ctype_digit($first_four) || !ctype_digit($second_two) || !ctype_digit($third_two) || !ctype_digit($last_four))
        {
            $this->setErrorMessages('national_id','Error: Numbers only');
            return false;
        }
        if(strlen($first_four)<>4|| strlen($second_two)<>2 || strlen($third_two)<>2 || strlen($last_four)<>4)
        {
          $this->setErrorMessages('national_id','Error: Incorrect ID length');
            return false;
        }
        
        $y = substr($id,0,4);
        $m = substr($id,5,2);
        $d = substr($id,8,2);
        $year = date("Y");
        $age = $year - $y;
        
        if($age < 16)
        {
          $this->setErrorMessages('national_id','Error: You are too young');
            return false;
        }
        if($age > 80)
        {
          $this->setErrorMessages('national_id','Error: You are too old');
            return false;
        }
        if($m >12 || $m < 1)
        {
          $this->setErrorMessages('national_id','Error: Invalid month');
            return false;
        }
        if($d > 31 || $d < 1)
        {
          $this->setErrorMessages('national_id','Error: Invalid day');
            return false;
        }
        if($m == 2 && $d > 29 )
        {
          $this->setErrorMessages('national_id','Error: Invalid day for February');
            return false;
        }
        if($m == 9 && $d > 30)
        {
          $this->setErrorMessages('national_id','Error: Invalid day for September');
            return false;
        }
        if($m == 4 && $d > 30)
        {
          $this->setErrorMessages('national_id','Error: Invalid day for April');
            return false;
        } 
        if($m == 6 && $d > 30)
        {
          $this->setErrorMessages('national_id','Error: Invalid day for August');
            return false;
        }
        if($m == 11 && $d > 30)
        {
          $this->setErrorMessages('national_id','Error: Invalid day');
            return false;
        }
        else
        {
          return true;
        }
  }

  public function checkLicenseNo(string $liceno) : bool
  {
    if(strlen($licenseno)<>15)
    {
        $rNum = mt_rand(1000000,9999999);
        $y = substr($licenseno,0,4);
        $m = substr($licenseno,4,2);
        $d = substr($licenseno,6,2);
        $year = date("Y");

        if(empty($licenseno))
        {
            $_SESSION['L_Num'] = '';
            $this->setErrorMessages('licenseNo','Error: Information missing add DOB(yyyymmdd)');
            return false;
        }
        
        $age = $year - $y;
        
        if(strlen($licenseno)<>8)
        {
            $_SESSION['L_Num'] = '';
            $this->setErrorMessages('licenseNo','Error: Invalid length add DOB(yyyymmdd)');
            return false;
        }
        if($age < 16)
        { 
            $_SESSION['L_Num'] = '';
            $this->setErrorMessages('licenseNo','Error: You are too young');
            return false;
        }
        if($m >12 || $m < 1)
        {
            $_SESSION['L_Num'] = '';
            $this->setErrorMessages('licenseNo','Error: Invalid month');
            return false;
        }
        if($d > 31 || $d < 1)
        {
            $_SESSION['L_Num'] = '';
            $this->setErrorMessages('licenseNo','Error: Invalid day');
            return false;
        }
        if($m == 2 && $d > 29 )
        {
            $_SESSION['L_Num'] = '';
            $this->setErrorMessages('licenseNo','Error: Invalid day');
            return false;
        }
        if($m == 9 && $d > 30)
        {
            $_SESSION['L_Num'] = '';
            $this->setErrorMessages('licenseNo','Error: Invalid day');
            return false;
        }
        if($m == 4 && $d > 30)
        {
            $_SESSION['L_Num'] = '';
            $this->setErrorMessages('licenseNo','Error: Invalid day');
            return false;
        } 
        if($m == 6 && $d > 30)
        {
            $_SESSION['L_Num'] = '';
            $this->setErrorMessages('licenseNo','Error: Invalid day');
            return false;
        }
        
        if($m == 11 && $d > 30)
        {
            $_SESSION['L_Num'] = '';
            $this->setErrorMessages('licenseNo','Error: Invalid day');
            return false;
        }
        else
        {
          $_SESSION['L_Num'] = $rNum.$licenseno;
          return true;
        }
         
      }
    else
    {
        
      $_SESSION['L_Num'] = $licenseno;
      return true;
    }
        
  }

  public function checkName(string $name) : bool 
  {
    if(empty($fname))
    {
      $this->setErrorMessages('firstName','Error: Missing Information');
      return false;
    }
    if(!ctype_alpha($fname))
    {
      $this->setErrorMessages('firstName',"Error: Only alphabet character allowed");
      return false;
    }
    else
    {
      return true;
    }
  }
  
  public function checkAddress(string $addr) : bool
  {
    if(empty($addr))
    {
      $this->setErrorMessages("address1","Error: Missing Information");
      return false;
    }
    if(preg_match('/^(?:\\d+ [a-zA-Z ]+, ){2}[a-zA-Z ]+$/', $addr))
    {
      $this->setErrorMessages("address1","Error: Invalid street address");
      return false;
    }
    else
    {
      return true;
    }
  }

  function checkEmail(string $email) : bool
  {
    if(empty($email))
    {
      $this->setErrorMessages('email','Error: Missing Information');
      return false;
    }
    // Validate email 
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    { 
      $this->setErrorMessages('email','Error: Format invalid');
      return false;
    }
    else
    {
      return true;
    }
  }

  public function checkTelNum(string $prefix,  string $line_number) : bool
  {
    if(empty($prefix) || empty($line_number))
    {
      $this->setErrorMessages("telephone","Error: Missing Information");
      return false;
    }

    if(!ctype_digit($prefix) || !ctype_digit($line_number))
    {
      $this->setErrorMessages("telephone","Error: Only digits allowed");
      return false; 
    }

    if(strlen($prefix) <> 3 || strlen($line_number) <> 4)
    {
      $this->setErrorMessages("telephone","Error: Incorrect telephone number format");
      return false;
    }
    else
    {
      return true;
    }
  }
}