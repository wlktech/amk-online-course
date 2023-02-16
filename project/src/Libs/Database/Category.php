<?php 
namespace Test\App\Database;

use PDO;
use PDOException;

class Category{
    private $conn;
    public function __construct($connection){
        $this->conn = $connection;
    }
    //create
    public function create($category_name){
        try{
            $state = $this->conn->prepare("INSERT INTO categories(category_name) VALUES(:category_name)");
            $state->bindParam(":category_name", $category_name);
            $state->execute();
            return true;
        }catch(Exception $e){

        }
    }
    //getAll
    public function getAll(){
        try{
            $state = $this->conn->prepare("SELECT * FROM categories order by id desc");
            $state->execute();
            $categories = $state->fetchAll(PDO::FETCH_ASSOC);
            return $categories;
        }catch(Exception $e){

        }
    }
    //update
    public function get($id){
        try{
            $state = $this->conn->prepare("SELECT * FROM categories where id=:id");
            $state->bindParam(":id", $id);
            $state->execute();
            $category = $state->fetch(PDO::FETCH_ASSOC);
            return $category;
        }catch(Exception $e){

        }
    }
    public function update($id, $category_name){
        try{
            $state = $this->conn->prepare("UPDATE categories SET category_name=:category_name WHERE id=:id");
            $state->bindParam(":id", $id);
            $state->bindParam(":category_name", $category_name);
            $state->execute();
            return true;
        }catch (Exception $e) {
            
        }
    }
    public function delete($id){
        try{
            $state = $this->conn->prepare("DELETE FROM categories WHERE id=:id");
            $state->bindParam(":id", $id);
            $state->execute();
            return true;
        }catch(Exception $e){

        }
    }
}





?>