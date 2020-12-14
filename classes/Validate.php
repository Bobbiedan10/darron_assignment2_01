<?php 
class Validate
{
  protected $errors = [];

  public function __construct()
  {

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
      if(!$username_valid || !$password)
      {
        $this->setErrorMessages("credentials", "Invalid username or password format");
        return false;
      }
    }

    $authObj = new Authenticate();
    if(!$authObj->auth($user_info['username']))
    {
      $this->errors['Credentials'] = "Invalid username or password combination";
      return false;
    }
    return true;
  }

  public function valid(string $name) : bool
  {
    if (!preg_match('^[a-zA-Z_\x80-\xff][a-zA-Z0-9_\x80-\xff]*$', $name)) 
    {
      trigger_error('Invalid variable name received');
    }
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
    if(empty($passwd))
    {
      $this->setErrorMessages("password","Error: Information missing");
      return false;
    }
    if(strlen($passwd) < 10)
    {
      $this->setErrorMessages("password","Error: Password too short");
      return false;
    }
    if(strlen($passwd) > 18)
    {
      $this->setErrorMessages("password","Error: Password too long");
      return false;
    }
    if(preg_match('/^(?=.\d)(?=.[a-z])(?=.[A-Z])(?=.[a-zA-Z]).{10,18}$/',$passwd))
    {
      $this->setErrorMessages("password","Error: Password must contain uppercase letter and number");
      return false;
    }
    if(!ctype_alpha(substr($passwd,0,1)))
    {
      $this->setErrorMessages("password","Error: First character must be a letter");
      return true;
    }
    else
    {
      return true;
    }
  }

  public function checkId(string $addr) : bool 
  {
    return true;
  }

  public function checkName(string $name) : bool 
  {
    return true;
  }
  
  public function checkAddress(string $addr) : bool
  {
    return true;
  }

  public function checkTelNum(string $prefix,  string $line_number) : bool
  {
    return true;
  }
}

?>