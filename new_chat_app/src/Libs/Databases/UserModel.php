<?php 
namespace Amk\NewChat\App\Databases;
use PDO;
use PDOException;

class UserModel 

{
 private $db = null;  // property

 public function __construct($db)
 {
  $this->db = $db->connect();
 }

 // user create method
 public function UserCreate($data)
 {
  $sql = "INSERT INTO users (user_name, email, password, created_at) VALUES (:user_name, :email, :password, now())";
  $stmt = $this->db->prepare($sql);
  $stmt->bindParam(':user_name', $data['user_name']);
  $stmt->bindParam(':email', $data['email']);
  $stmt->bindParam(':password', $data['password']);
  
  $stmt->execute();
  return $stmt->rowCount();
 }

 // user login method
 public function UserLogin($data)
 {
  $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
  $stmt = $this->db->prepare($sql);
  $stmt->bindParam(':email', $data['email']);
  $stmt->bindParam(':password', $data['password']);
  $stmt->execute();
  return $stmt->fetch();
 }

 // profile update method with id, profile_image only
 public function ProfileUpdate($data)
 {
  $sql = "UPDATE users SET profile = :profile WHERE id = :id";
  $stmt = $this->db->prepare($sql);
  $stmt->bindParam(':profile', $data['profile']);
  $stmt->bindParam(':id', $data['id']);
  $stmt->execute();
  return $stmt->rowCount();
 }

 // get all users
 public function GetAllUsers()
 {
  $sql = "SELECT * FROM users";
  $stmt = $this->db->prepare($sql);
  $stmt->execute();
  return $stmt->fetchAll();
 }

 // get profile image by id
 public function GetProfileImage($id)
 {
  $sql = "SELECT profile FROM users WHERE id = :id";
  $stmt = $this->db->prepare($sql);
  $stmt->bindParam(':id', $id);
  $stmt->execute();
  return $stmt->fetch();
 } 

 // get user_name by id 
 public function GetUserName($id)
 {
  $sql = "SELECT user_name FROM users WHERE id = :id";
  $stmt = $this->db->prepare($sql);
  $stmt->bindParam(':id', $id);
  $stmt->execute();
  return $stmt->fetch();
 }
}

?>