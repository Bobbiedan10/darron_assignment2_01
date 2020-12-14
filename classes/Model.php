<?php
  class Model implements Reader, Writer, Updater, Deleter
  {
    protected $sqli;
    public function __construct(string $user, string $pass, string $db, string $host)
    {
      $this->sqli = mysqli_connect($host, $user, $pass, $db);
        if(!$this->sqli)
        {
            die('Cannot connect to database');
        }
    }

    // Returns one record from a table with the given id
    public function find(string $tablename, array $ids) : array
    {

    }
    
    // Returns all records in a table
    public function findall(string $tablename, array $ids) : array
    {

    }

    // Adds a record to a table
    public function add(array $tables, array $fields)
    {

    }

    // Updates the database
    public function update(array $tables, array $fields)
    {

    }

    // Deletes a record from a table with given id
    public function del(array $tablenames, array $ids)
    {

    }
  }