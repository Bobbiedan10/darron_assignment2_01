<?php
  class AuthenticateModel extends Model implements Reader
  {
    public function find(string $tablename, array $ids) : array
    {
      if(!isset($ids['username']) && !isset($ids['password']))
      {
        trigger_error('<b>AuthenticateModel::find() error</b>: Invalid parameters', E_USER_ERROR);
      }

      $query_str = "SELECT FirstName, LastName, Username, LicenseNum FROM $tablename WHERE Username='{$ids['username']}' AND Password_='{$ids['password']}'";
      if($result = $this->sqli->query($query_str))
      {
        if($result->num_rows <> 1)
        {
          return [];
        }
        else
        {
          return $result->fetch_assoc();
        }
      }
      else
      {
        trigger_error('<b>AuthenticateModel SQL error: </b>'.$this->sqli->error, E_USER_WARNING);
        return [];
      }
    }

    public function findAll(string $tablename, array $ids) : array
    {
      return [];
    }

  }