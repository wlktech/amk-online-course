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

    //user_name, public_name, company only update
    public function GeneralUpdate($data){
        try{
            $query = "UPDATE users SET user_name=:user_name, public_name=:public_name, company=:company WHERE id=:id";
            $statement = $this->db->prepare($query);
            $statement->execute($data);
            return $statement->rowCount();
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    public function ChangePassword($data){
        try{
            $query = "UPDATE users SET password = :password WHERE id=:id";
            $statement = $this->db->prepare($query);
            $statement->execute($data);
            return $statement->rowCount();
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    public function ProfileImgUpdate($data){
        try{
            $query = "UPDATE users SET profile_img = :profile_img WHERE id=:id";
            $statement = $this->db->prepare($query);
            $statement->execute($data);
            return $statement->rowCount();
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    //change data of bio, birth_date, country, language, phone, website, fav_music, fav_movie, 
    public function InfoUpdate($id, $bio, $birth_date, $country, $state, $language, $phone, $website, $fav_music, $fav_movie){
        try{
            $query = "UPDATE users SET bio=:bio, birth_date=:birth_date, country=:country, state=:state, language=:language, phone=:phone, website=:website, fav_music=:fav_music, fav_movie=:fav_movie WHERE id=:id";
            $statement = $this->db->prepare($query);
            $statement->execute([
                ":id"=>$id,
                ":bio"=>$bio,
                ":birth_date"=>$birth_date,
                ":country"=>$country,
                ":state"=>$state,
                ":language"=>$language,
                ":phone"=>$phone,
                ":website"=>$website,
                ":fav_music"=>$fav_music,
                ":fav_movie"=>$fav_movie
            ]);
            return $statement->rowCount();

        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    //getAllusers data with roles
    public function GetAllUsers(){
        $statement = $this->db->prepare("SELECT users.*, roles.name as role, roles.value from users LEFT JOIN roles ON users.role_id=roles.id");
        $statement->execute();
        $row = $statement->fetchAll();
        return $row ?? false;
    }

    public function UserApprove($id, $status){
        try{
            $query = "UPDATE users SET status = :status WHERE id=:id";
            $statement = $this->db->prepare($query);
            $statement->execute([
                ":id" => $id,
                ":status" => $status
            ]);
            return $statement->rowCount();
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    public function UserSuspend($id, $status){
        try{
            $query = "UPDATE users SET status = :status WHERE id=:id";
            $statement = $this->db->prepare($query);
            $statement->execute([
                ":id" => $id,
                ":status" => $status
            ]);
            return $statement->rowCount();
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    public function ChangeRole($id, $role_id){
        try{
            $query = "UPDATE users SET role_id = :role_id WHERE id=:id";
            $statement = $this->db->prepare($query);
            $statement->execute([
                ":id" => $id,
                ":role_id" => $role_id
            ]);
            return $statement->rowCount();
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    public function GetUser($id){
        try{
            $query = "SELECT * FROM users WHERE id = :id";
            $statement = $this->db->prepare($query);
            $statement->execute([
                ":id"=> $id
            ]);
            $result = $statement->fetch();
            return $result;
        }catch(PDOException $e){

        }
    }

    //deleteuser 
    public function DeleteUser($id){
        try{
            $query = "DELETE FROM users WHERE id = :id";
            $statement = $this->db->prepare($query);
            $statement->execute([
                ":id"=> $id
            ]);
            return true;
        }catch(PDOException $e){

        }
    }

    // user login

    public function UserLoginCheck($email, $password)
    {
    $statement = $this->db->prepare("SELECT users.*, roles.name as role, roles.value FROM users LEFT JOIN roles ON   
    users.role_id = roles.id WHERE email = :email AND password = :password AND status != 'pending'");
    $statement->execute([
        ':email' => $email,
        ':password' => $password
    ]);
    $row = $statement->fetch();
    return $row ?? false;
    }

}

