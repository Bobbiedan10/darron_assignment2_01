<?php
  class IndexModel extends Model
  {
    public function find(string $tablename, array $fields) : array
    {
      $id = $fields['username'];
      $passw = $fields['password'];
      $query = "SELECT * from $tablename WHERE Username = '$id' AND Password_ = '$passw'";
      $seek = $this->sql->query($query);
      if($this->sql->errno)
      {
        echo 'SQL Error occurred: ';
        echo $this->sql->error;
        exit();
      }
      if($result->num_rows > 0)
      {
        while($row = $seek->fetch_assoc())
        {
          $_SESSION['session_user'] = array(
            'username' => $row['Username'],
            'licenseNum' => $row['LicenseNum'],
            'firstName' => $row['FirstName'],
            'lastName' => $row['LastName'],
          );
        }
        return true;
      }
        return false;
    }
  }