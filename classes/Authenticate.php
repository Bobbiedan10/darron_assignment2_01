<?php
  class Authenticate
  {
    public function loginUser(array $data)
    {
      session_start();
      if(empty($data))
      {
        trigger_error('Invalid parameter value recieved', E_USER_ERROR);
        return false;
      }
      session_start();
      $_SESSION['session_user'] = [
        "username" => $data[0],
        "licenseNo" => $data[1],
        "firstName" => $data[2],
        "surname" => $data[3]
      ];
      session_write_close();
    }

    public function isUserLoggedIn() : bool
    {
      return true;
    }

    public function getUserInfo(string $field) : string
    {

    }

    public function logOutUser()
    {
      
    }
  }