<?php
// National ID validation
function checkID(string $id) : bool
    {
        $first_four;
        $second_two;
        $third_two;
        $last_four;
        
        if(empty($id))
        {
            $_SESSION['idErr'] = 'Error: Information missing';
            return false;
        }
        if($id[4] && $id[7] && $id[10] != '-')
        {
            $_SESSION['idErr'] = 'Error: Incorrect national Id format(Hypens Needed)';
            return false;
        }
        if(strstr($id,'-'))
        {
            list ($first_four, $second_two, $third_two, $last_four) = explode('-',$id);
        }
        if(!ctype_digit($first_four) || !ctype_digit($second_two) || !ctype_digit($third_two) || !ctype_digit($last_four))
        {
            $_SESSION['idErr'] = 'Error: Numbers only';
            return false;
        }
        if(strlen($first_four)<>4|| strlen($second_two)<>2 || strlen($third_two)<>2 || strlen($last_four)<>4)
        {
            $_SESSION['idErr'] = 'Error: Incorrect ID length';
            return false;
        }
        
        $y = substr($id,0,4);
        $m = substr($id,5,2);
        $d = substr($id,8,2);
        $year = date("Y");
        $age = $year - $y;
        
        if($age < 16)
        {
            $_SESSION['licensenoErr'] = 'Error: You are too young';
            return false;
        }
        if($age > 80)
        {
            $_SESSION['licensenoErr'] = 'Error: You are too old';
            return false;
        }
        if($m >12 || $m < 1)
        {
            $_SESSION['idErr'] = 'Error: Invalid month';
            return false;
        }
        if($d > 31 || $d < 1)
        {
            $_SESSION['idErr'] = 'Error: Invalid day';
            return false;
        }
        if($m == 2 && $d > 29 )
        {
            $_SESSION['idErr'] = 'Error: Invalid day';
            return false;
        }
        if($m == 9 && $d > 30)
        {
            $_SESSION['idErr'] = 'Error: Invalid day';
            return false;
        }
        if($m == 4 && $d > 30)
        {
            $_SESSION['idErr'] = 'Error: Invalid day';
            return false;
        } 
        if($m == 6 && $d > 30)
        {
            $_SESSION['idErr'] = 'Error: Invalid day';
            return false;
        }
        if($m == 11 && $d > 30)
        {
            $_SESSION['idErr'] = 'Error: Invalid day';
            return false;
        }
        else
        {
            $_SESSION['idErr'] = '';
            return true;
        }
            
    }

// License No validation

function checkLicenceNum(string $licenseno) : bool
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
            $_SESSION['licensenoErr'] = 'Error: Information missing add DOB(yyyymmdd)';
            return false;
        }
        
        $age = $year - $y;
        
        if(strlen($licenseno)<>8)
        {
            $_SESSION['L_Num'] = '';
            $_SESSION['licensenoErr'] = 'Error: Invalid length add DOB(yyyymmdd)';
            return false;
        }
         
        if($age < 16)
        { 
            $_SESSION['L_Num'] = '';
            $_SESSION['licensenoErr'] = 'Error: You are too young';
            return false;
        }
        if($m >12 || $m < 1)
        {
            $_SESSION['L_Num'] = '';
            $_SESSION['licensenoErr'] = 'Error: Invalid month';
            return false;
        }
        if($d > 31 || $d < 1)
        {
            $_SESSION['L_Num'] = '';
            $_SESSION['licensenoErr'] = 'Error: Invalid day';
            return false;
        }
        if($m == 2 && $d > 29 )
        {
            $_SESSION['L_Num'] = '';
            $_SESSION['licensenoErr'] = 'Error: Invalid day';
            return false;
        }
        if($m == 9 && $d > 30)
        {
            $_SESSION['L_Num'] = '';
            $_SESSION['licensenoErr'] = 'Error: Invalid day';
            return false;
        }
        if($m == 4 && $d > 30)
        {
            $_SESSION['L_Num'] = '';
            $_SESSION['licensenoErr'] = 'Error: Invalid day';
            return false;
        } 
        if($m == 6 && $d > 30)
        {
            $_SESSION['L_Num'] = '';
            $_SESSION['licensenoErr'] = 'Error: Invalid day';
            return false;
        }
        
        if($m == 11 && $d > 30)
        {
            $_SESSION['L_Num'] = '';
            $_SESSION['licensenoErr'] = 'Error: Invalid day';
            return false;
        }
        else
        {
            $_SESSION['licensenoErr'] = '';
            $_SESSION['L_Num'] = $rNum.$licenseno;
            return true;
        }
         
      }
    else
    {
        $_SESSION['licensenoErr'] = '';
        $_SESSION['L_Num'] = $licenseno;
        return true;
    }
        
    }

// Name validation

function checkName(string $fname) : bool
{
  if(empty($fname))
  {
    $_SESSION['fnameErr'] = 'Error: Missing Information';
    return false;
  }
  if(!ctype_alpha($fname))
  {
    $_SESSION['fnameErr'] = "Error: Only alphabet character allowed";
    return false;
  }
  else
  {
    $_SESSION['fnameErr'] = '';
    return true;
  }
}

function checkLastName($lname) : bool
{
  if(empty($lname))
  {
    $_SESSION['surnameErr'] = 'Error: Missing Information';
    return false;
  }
  if(!ctype_alpha($lname))
  {
    $_SESSION['surnameErr'] = "Error: Only alphabet character allowed";
    return false;
  }
  else
  {
    $_SESSION['surnameErr'] = '';
    return true;
  }
}

// Email validation

function checkEmail(string $email) : bool
{
    if(empty($email))
    {
        $_SESSION['emailErr'] = 'Error: Missing Information';
        return false;
    }
    // Validate email 
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    { 
        $_SESSION['emailErr'] = 'Error: Format invalid';
        return false;
    }
    else
    {
      $_SESSION['emailErr'] = '';
      return true;
    }
}

// Phone Num validation

function checkTelNum(string $prefix, string $line_number) : bool
{
  if(empty($prefix) || empty($line_number))
  {
    $_SESSION['telErr'] = "Error: Missing Information";
    return false;
  }

  if(!ctype_digit($prefix) || !ctype_digit($line_number))
  {
    $_SESSION['telErr'] = "Error: Only digits allowed";
    return false; 
  }

  if(strlen($prefix) <> 3 || strlen($line_number) <> 4)
  {
    $_SESSION['telErr'] = "Error: Incorrect telephone number format";
    return false;
  }
  else
  {
    $_SESSION['telErr'] = "";
    return true;
  }
}

// Address validation

function checkAddr(string $addr) : bool
{
  if(empty($addr))
  {
    $_SESSION['add1Err'] = "Error: Missing Information";
    return false;
  }
  if(preg_match('/^(?:\\d+ [a-zA-Z ]+, ){2}[a-zA-Z ]+$/', $addr))
  {
    $_SESSION['add1Err'] = "Error: Invalid street address";
    return false;
  }
  else
  {
    $_SESSION['add1Err'] = "";
    return true;
  }
}
function checkAddr2(string $addr) : bool
{
  if(empty($addr))
  {
    $_SESSION['add2Err'] = "";
    return true;
  }
  if(preg_match('/^(?:\\d+ [a-zA-Z ]+, ){2}[a-zA-Z ]+$/', $addr))
  {
    $_SESSION['add2Err'] = "Error: Invalid street address";
    return false;
  }
  else
  {
    $_SESSION['add2Err'] = "";
    return true;
  }
}

// Parish

function loadParishes() : string
{
  if(!file_exists('parish.json'))
  {
    $_SESSION['parishErr'] = "No parishes available";
    return $_SESSION['parishErr'];
  }
  else
  {
    $strJsonFileContents = file_get_contents("parish.json");
    $array = json_decode($strJsonFileContents, true);
      
    foreach($array as $key => $value) 
    {
      echo "<option value=\"".$key ."\">".$value."</option>";
      $_SESSION['parishErr'] = "";
    }
      
      if(empty($_POST['parish']))
      {
        $_SESSION['parishErr'] = "Error: Choose a parish";
      }
  }
  return $value;
}

//Driver Sign In

// Username
function checkUsername(string $uname): bool
{
    if(empty($uname))
    {
        $_SESSION['uname_err'] = 'Error: Information missing';
        return false;
    }
    if(strlen($uname) <> 8)
    {
        $_SESSION['uname_err'] = 'Error: Incorrect username length';
        return false;
    }
    if(!ctype_alpha(substr($uname,0,4)))
    {
        $_SESSION['uname_err'] = 'Error: First 4 characters must be letters';
        return false;
    }
    if(!ctype_digit(substr($uname,4)))
    {
        $_SESSION['uname_err'] = 'Error: Last 4 characters must be numbers';
        return false;
    }
    if($uname != ucfirst($uname))
    {
        $_SESSION['uname_err'] = 'Error: First letter must be capital';
        return false;
    }
    if(substr($uname,1,3) != strtolower(substr($uname,1,3)))
    {
        $_SESSION['uname_err'] = 'Error: Last 3 letters must be lowercase';
        return false;
    }
    else
    {
      $_SESSION['uname_err'] = '';
      return true;
    }
}
// Password
function checkPassword(string $passwd): bool
{
    if(empty($passwd))
    {
        $_SESSION['passwd_err'] = 'Error: Information missing';
        return false;
    }
    if(strlen($passwd) < 10)
    {
        $_SESSION['passwd_err'] = "Error: Password too short";
        return false;
    }
    if(strlen($passwd) > 18)
    {
        $_SESSION['passwd_err'] = "Error: Password too long";
        return false;
    }
    if(preg_match('/^(?=.\d)(?=.[a-z])(?=.[A-Z])(?=.[a-zA-Z]).{10,18}$/',$passwd))
    {
        $_SESSION['passwd_err'] = "Error: Password must contain uppercase letter and number";
        return false;
    }
    if(!ctype_alpha(substr($passwd,0,1)))
    {
        $_SESSION['passwd_err'] = "Error: First character must be a letter";
        return true;
    }
     else
    {
      $_SESSION['passwd_err'] = '';
      return true;
    }
}

if(empty($_POST['validation_by_js']))
{
    if(isset($_POST['register']))
    {
        $_SESSION['readonly'] = '';
        $id = $_POST['national_id'];
        $licenseno = $_POST['licenseNo'];
        $fname = $_POST['firstName'];
        $lname = $_POST['surname'];
        $email = $_POST['email'];
        $prefix = $_POST['prefix'];
        $line_number = $_POST['lineNumber'];
        $addr = $_POST['address1'];
        $addr2 = $_POST['address2'];
        
        checkID($id);
        checkLicenceNum($licenseno);
        if (checkLicenceNum($licenseno))
        {
            if(isset($_POST['licenseNo']))
            {
                $_SESSION['readonly'] = 'readonly';
            }

            $licenseno = $_SESSION['L_Num'];
        }
        checkName($fname);
        checkLastName($lname);
        checkEmail($email);
        checkTelNum($prefix, $line_number);
        checkAddr($addr);
        checkAddr2($addr2);
        print_r($_POST);
        
        if(checkID($id) && checkLicenceNum($licenseno) && checkName($fname) && checkLastName($lname) && checkEmail($email) && checkTelNum($prefix, $line_number) && checkAddr($addr) && checkAddr2($addr2))
        {
            header('location:register_driver.php');
        }
    }
    
    if(isset($_POST['sign_in']))
    {
        $uname = $_POST['username'];
        $passwd = $_POST['password'];
        
        checkUsername($uname);
        checkPassword($passwd);
        
        if(checkUsername($uname) && checkPassword($passwd))
        {
            require('sign_in_user.php');
        }
    }
}

if(isset($_POST['cancel']))
{
    header('location:index.php');
}
?>