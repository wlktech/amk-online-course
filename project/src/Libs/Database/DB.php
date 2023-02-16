<?php 
namespace Test\App\Database;
use PDO;
use PDOException;

class DB{
    private $host = "localhost:3308";
    private $dbname = "wlk";
    private $username = "root";
    private $password = "";
    private $conn;
    public function connect(){
        try{
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            // echo "Success";
            return $this->conn;
        }catch(Exception $e){

        }
    }
}



?>