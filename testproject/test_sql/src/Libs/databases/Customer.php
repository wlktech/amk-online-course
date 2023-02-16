<?php
namespace Sql\App\databases;

use PDO;
use PDOException;

class Customer

{
 private $db = null;  // property

 public function __construct($db)
 {
  $this->db = $db->connect();
 }

 //getall 
 public function GetAll(){
    $sql = "SELECT * FROM clients";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);

 }
}
?>