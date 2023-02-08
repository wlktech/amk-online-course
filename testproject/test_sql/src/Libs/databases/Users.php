<?php 
namespace Sql\App\databases;

use PDO;
use PDOException;

class Users

{
 private $db = null;  // property

 public function __construct($db)
 {
  $this->db = $db->connect();
 }

 //getall users
 public function GetAllUser(){
    $sql = "SELECT * FROM users";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();

 }

 //get unique city from users table
 public function GetUniqueCity(){
   $sql = "SELECT DISTINCT city FROM users";
   $stmt = $this->db->prepare($sql);
   $stmt->execute();
   return $stmt->fetchAll();
 }

 //get unique user from users table
 public function GetUniqueUser(){
   $sql = "SELECT DISTINCT name FROM users";
   $stmt = $this->db->prepare($sql);
   $stmt->execute();
   return $stmt->fetchAll();
 }
 
 //count name from user table alias
 public function CountName(){
   $sql = "SELECT COUNT(name) as count_name from users";
   $stmt = $this->db->prepare($sql);
   $stmt->execute();
   return $stmt->fetchAll();
 }
}