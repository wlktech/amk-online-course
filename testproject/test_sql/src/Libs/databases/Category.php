<?php 
namespace Sql\App\databases;

use PDO;
use PDOException;

class Category

{
 private $db = null;  // property

 public function __construct($db)
 {
  $this->db = $db->connect();
 }

 //getAll category
 public function getAll(){
    try{
        $stmt = $this->db->prepare("SELECT * FROM categories");
        $stmt->execute();
        $categories = $stmt->fetchAll();
        return $categories;
    }catch(Exception $e){

    }
 }

}