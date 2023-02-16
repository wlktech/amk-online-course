<?php 
namespace Test\App\Database;
use PDO;
use PDOException;

class User{
    private $conn;
    public function __construct($connection){
        $this->conn = $connection;
    }

    //create 
    public function create($name, $age, $gender, $doj, $city, $salary){
        try{
            $state = $this->conn->prepare("INSERT INTO users(name, age, gender, doj, city, salary) VALUES(:name, :age, :gender, :doj, :city, :salary)");
            $state->bindParam(":name", $name);
            $state->bindParam(":age", $age);
            $state->bindParam(":gender", $gender);
            $state->bindParam(":doj", $doj);
            $state->bindParam(":city", $city);
            $state->bindParam(":salary", $salary);
            $state->execute();
            return true;
        }catch(Exception $e){

        }
    }
    
    //getAll
    public function getAll(){
        try{
            $state = $this->conn->prepare("SELECT * FROM users order by id desc");
            $state->execute();
            $users = $state->fetchAll(PDO::FETCH_ASSOC);
            return $users;
        }catch(Exception $e){

        }
    }
    //update
    public function get($id){
        try{
            $state = $this->conn->prepare("SELECT * FROM users WHERE id=:id");
            $state->bindParam(":id", $id);
            $state->execute();
            $user = $state->fetch(PDO::FETCH_ASSOC);
            return $user;
        }catch(Exception $e){

        }
    }
    public function update($id, $name, $age, $gender, $doj, $city, $salary){
        try{
            $state = $this->conn->prepare("UPDATE users SET name=:name, age=:age, gender=:gender, doj=:doj, city=:city, salary=:salary WHERE id=:id");
            $state->bindParam(":id", $id);
            $state->bindParam(":name", $name);
            $state->bindParam(":age", $age);
            $state->bindParam(":gender", $gender);
            $state->bindParam(":doj", $doj);
            $state->bindParam(":city", $city);
            $state->bindParam(":salary", $salary);
            $state->execute();
            return true;
        }catch(Exception $e){

        }
    }

    //delete
    public function delete($id){
        try{
            $state = $this->conn->prepare("DELETE FROM users WHERE id=:id");
            $state->bindParam(":id", $id);
            $state->execute();
            return true;
        }catch(Exception $e){

        }
    }



    //gender only
    public function gender($gender){
        try{
            $state = $this->conn->prepare("SELECT * FROM users WHERE gender=:gender order by id desc");
            $state->bindParam(":gender", $gender);
            $state->execute();
            $users = $state->fetchAll(PDO::FETCH_ASSOC);
            return $users;
        }catch(Exception $e){

        }
    }
    
    //less than age = 30
    public function Under30User($age){
        try{
            $state = $this->conn->prepare("SELECT * FROM users WHERE age<:age order by id desc");
            $state->bindParam(":age", $age);
            $state->execute();
            $users = $state->fetchAll(PDO::FETCH_ASSOC);
            return $users;
        }catch(Exception $e){

        }
    }
    //greater than age = 30
    public function Over30User($age){
        try{
            $state = $this->conn->prepare("SELECT * FROM users WHERE age>:age order by id desc");
            $state->bindParam(":age", $age);
            $state->execute();
            $users = $state->fetchAll(PDO::FETCH_ASSOC);
            return $users;
        }catch(Exception $e){

        }
    }

    //filter query
    public function totalSalary(){
        try{
            $state = $this->conn->prepare("SELECT sum(salary) as total FROM users");
            $state->execute();
            $users = $state->fetchAll(PDO::FETCH_ASSOC);
            return $users;
        }catch(Exception $e){

        }
    }
    public function avgSalary(){
        try{
            $state = $this->conn->prepare("SELECT avg(salary) as average FROM users");
            $state->execute();
            $users = $state->fetchAll(PDO::FETCH_ASSOC);
            return $users;
        }catch(Exception $e){

        }
    }
    public function minSalary(){
        try{
            $state = $this->conn->prepare("SELECT min(salary) as minimum FROM users");
            $state->execute();
            $users = $state->fetchAll(PDO::FETCH_ASSOC);
            return $users;
        }catch(Exception $e){

        }
    }
    public function maxSalary(){
        try{
            $state = $this->conn->prepare("SELECT max(salary) as maximum FROM users");
            $state->execute();
            $users = $state->fetchAll(PDO::FETCH_ASSOC);
            return $users;
        }catch(Exception $e){

        }
    }
}

?>