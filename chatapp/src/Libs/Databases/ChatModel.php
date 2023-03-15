<?php 
namespace Wlk\Chatapp\Databases;

use PDO;
use PDOException;

class ChatModel 

{
 private $db = null;  // property

 public function __construct($db)
 {
  $this->db = $db->connect();
 }
// insert message method 
 public function InsertMessage($data)
 {
  $sql = "INSERT INTO chats (user_id, to_id, message) VALUES (:user_id, :to_id, :message)";
  $stmt = $this->db->prepare($sql);
  $stmt->bindParam(':user_id', $data['user_id']);
  $stmt->bindParam(':to_id', $data['to_id']);
  $stmt->bindParam(':message', $data['message']);
  $stmt->execute();
  	/**
       check if this is the first
       conversation between them
       **/
      $sql2 = "SELECT * FROM conversations
               WHERE (user_1=? AND user_2=?)
               OR    (user_2=? AND user_1=?)";
      $stmt2 = $this->db->prepare($sql2);
         $stmt2->execute([$data['user_id'], $data['to_id'], $data['user_id'], $data['to_id']]);
      if ($stmt2->rowCount() == 0) {
          $sql3 = "INSERT INTO conversations (user_1, user_2)
                   VALUES (?, ?)";
          $stmt3 = $this->db->prepare($sql3);
          $stmt3->execute([$data['user_id'], $data['to_id']]);
      }
  return $stmt->rowCount();
 }

  // get all chats by user id
 public function GetAllChats($data)
 {
  $sql = "SELECT * FROM chats
           WHERE (user_id=? AND to_id=?)
           OR    (to_id=? AND user_id=?)
           ORDER BY id ASC";
  $stmt = $this->db->prepare($sql);
  $stmt->execute([$data['user_id'], $data['to_id'], $data['user_id'], $data['to_id']]);
  return $stmt->fetchAll();
 }


}

?>