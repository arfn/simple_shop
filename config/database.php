<?php

  class Database
  {
    private $host = "localhost";
    private $user = "root";
    private $password = "lancaw123";
    private $dbname = "shop";

    protected $dbh;

    public function __construct()
    {
        try{
          $this->dbh = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
          $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch(PDOException $e)
        {
          echo "Error in database connection";
        }
    }
  }

 ?>
