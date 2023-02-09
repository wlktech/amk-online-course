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

 //select sum(salary) from user
 public function getTotalSalary(){
  $sql = "select sum(salary) as total_salary from users";
  $stmt = $this->db->prepare($sql);
  $stmt->execute();
  return $stmt->fetchAll();
 }

 public function getAvgSalary(){
  $sql = "select avg(salary) as avg_salary from users";
  $stmt = $this->db->prepare($sql);
  $stmt->execute();
  return $stmt->fetchAll();
 }

 public function getMinSalary(){
  $sql = "select min(salary) as min_salary from users";
  $stmt = $this->db->prepare($sql);
  $stmt->execute();
  return $stmt->fetchAll();
 }

 public function getMaxSalary(){
  $sql = "select max(salary) as max_salary from users";
  $stmt = $this->db->prepare($sql);
  $stmt->execute();
  return $stmt->fetchAll();
 }

 public function getColumnNameAgeCity(){
  $sql = "select name, age, city from users";
  $stmt =  $this->db->prepare($sql);
  $stmt->execute();
  return $stmt->fetchAll();
 }

 public function getAgeGreaterThan30(){
  $sql = "Select * from users where age > 30";
  $stmt = $this->db->prepare($sql);
  $stmt->execute();
  return $stmt->fetchAll();
 }

 public function getSexFemale(){
  $sql = "select name, sex, city from tbl_name where sex ='f'";
  $stmt = $this->db->prepare($sql);
  $stmt->execute();
  return $stmt->fetchAll();

 }
 public function getSexMale(){
  $sql = "select name, sex, city from tbl_name where sex ='m'";
  $stmt = $this->db->prepare($sql);
  $stmt->execute();
  return $stmt->fetchAll();
  
 }
}