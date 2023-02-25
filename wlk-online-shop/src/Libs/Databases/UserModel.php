<?php
namespace App\WlkOnlineShop\Databases;



class UserModel
{
    private $db = null;
    public function __construct($db){
        $this->db = $db->connect();
    }
    public function UserRegister($data){
        try{
            $query = "INSERT INTO users(user_name, public_name, email, password, phone, address, fix_address, company, bio, birth_date, country, state, language, fav_movie, fav_music, website, status, role_id, created_at) VALUES(:user_name, :public_name, :email, :password, :phone, :address, :fix_address, :company, :bio, :birth_date, :country, :state, :language, :fav_movie, :fav_music, :website, :status, :role_id, NOW())";
            $statement = $this->db->prepare($query);
            $statement->execute($data);
            return $this->db->lastInsertId();
    
            
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    // user login

    public function UserLogin($email, $password)
    {
    $statement = $this->db->prepare("SELECT users.*, roles.name as role, roles.value FROM users LEFT JOIN roles ON   
    users.role_id = roles.id WHERE email = :email AND password = :password");
    $statement->execute([
        ':email' => $email,
        ':password' => $password
    ]);
    $row = $statement->fetch();
    return $row ?? false;
    }
}