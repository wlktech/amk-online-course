<?php 

namespace Wlk\App\Databases;

use PDO;
use PDOException;

class User{
    private $conn;
    public function __construct($connection){
        $this->conn = $connection;
    }
    public function getAll(){
        try{
            $state = $this->conn->prepare("SELECT * FROM users");
            $state->execute();
            $users = $state->fetchAll();
            return $users;
        }catch(Exception $e){

        }
    }
}




?>