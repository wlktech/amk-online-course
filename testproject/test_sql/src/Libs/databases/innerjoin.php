<?php 
namespace Sql\App\databases;

use PDO;
use PDOException;

class innerjoin

{
 private $db = null;  // property

 public function __construct($db)
 {
  $this->db = $db->connect();
 }

 //getall cricket
 public function getAll(){
    $sql = "select * from cricket as c inner join football as f on c.name=f.name";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);

 }
//getall customer
 public function getAllCustomer(){
   $sql = "select * from customers";
   $stmt = $this->db->prepare($sql);
   $stmt->execute();
   return $stmt->fetchAll(PDO::FETCH_ASSOC);

}
//getall order
public function getAllOrder(){
   $sql = "select * from orders";
   $stmt = $this->db->prepare($sql);
   $stmt->execute();
   return $stmt->fetchAll(PDO::FETCH_ASSOC);

}

//getall customer to order inner join
public function CustomerInnerJoin(){
   $sql = "select * from customers inner join orders on customers.customer_id=orders.customer";
   $stmt = $this->db->prepare($sql);
   $stmt->execute();
   return $stmt->fetchAll(PDO::FETCH_ASSOC);

}

}

?>