<?php 

namespace Wlk\App\Databases;

use PDO;
use PDOException;

class DB{
    private $host = "localhost:3308";
    private $dbname = "amk_sql";
    private $username = "root";
    private $password = "";
    private $conn;
    public function connect(){
        $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
        echo "Success";
        return $this->conn;
    }
}


?>