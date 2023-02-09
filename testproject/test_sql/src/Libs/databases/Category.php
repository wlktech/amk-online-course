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
        $stmt = $this->db->prepare("SELECT * FROM categories order by id desc");
        $stmt->execute();
        $categories = $stmt->fetchAll();
        return $categories;
    }catch(Exception $e){

    }
 }

 //create
 public function InsertCategory($data){
    $sql = "Insert into categories(category_name) values(:category_name)";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(":category_name", $data);
    $stmt->execute();
    return $stmt->rowCount();
 }

}