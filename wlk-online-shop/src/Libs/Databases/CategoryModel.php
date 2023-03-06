<?php
namespace App\WlkOnlineShop\Databases;



class CategoryModel
{
    private $db = null;
    public function __construct($db){
        $this->db = $db->connect();
    }
    
    public function CreateCategory($category_name){
        $statement = $this->db->prepare("INSERT INTO categories (category_name) VALUES (:category_name)");
        $statement->execute([
            ":category_name" => $category_name
        ]);
        return $statement->rowCount() ?? false;
    }

    //getAllCategories
    public function getAllCategory(){
        try{
            $query = "SELECT * FROM categories";
            $statement = $this->db->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll();
            return $result;
        }catch(PDOException $e){

        }
    }

    //getCategorybyID
    public function getbyID($id){
        try{
            $query = "SELECT * FROM categories WHERE id=:id";
            $statement = $this->db->prepare($query);
            $statement->execute([
                ":id" => $id
            ]);
            $result = $statement->fetch();
            return $result;
        }catch(PDOException $e){

        }
    }
    
    //updatecategory
    public function UpdateCategory($id, $category_name){
        try{
            $query = "UPDATE categories SET category_name=:category_name WHERE id=:id";
            $statement = $this->db->prepare($query);
            $statement->execute([
                ":id" => $id,
                ":category_name" => $category_name
            ]);
            return true;
        }catch(PDOException $e){

        }
    }

    //delete
    public function DeleteCategory($id){
        try{
            $query = "DELETE FROM categories WHERE id=:id";
            $statement = $this->db->prepare($query);
            $statement->execute([
                ":id" => $id
            ]);
            return true;
        }catch(PDOException $e){

        }
    }

}

