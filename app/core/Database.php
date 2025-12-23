
<?php

class Database {

    private $host;
    private $dbname;
    private $username;
    private $password;
    private $conn = null;

    public function __construct (){
      $this->host = "localhost";
      $this->dbname = "smart_wallet_2";
      $this->username = "root";
      $this->password = "";
    }
    
    public function connect(){
        if($this->conn === null){
          $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname};charset=utf8",
          $this->username,
          $this->password
        );
         $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $this->conn;
    }

}

?>