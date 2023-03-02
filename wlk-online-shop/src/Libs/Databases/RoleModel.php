<?php
namespace App\WlkOnlineShop\Databases;



class RoleModel
{
    private $db = null;
    public function __construct($db){
        $this->db = $db->connect();
    }
    
    //getAllRoles
    public function getAllRole(){
        try{
            $query = "SELECT * FROM roles";
            $statement = $this->db->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll();
            return $result;
        }catch(PDOException $e){

        }
    }
    

}

