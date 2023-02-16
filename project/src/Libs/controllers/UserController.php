<?php 
session_start();
include "../../../vendor/autoload.php";
use Test\App\Database\DB;
use Test\App\Database\User;

$db = new DB();
$connection = $db->connect();
$userDB = new User($connection);

if(isset($_POST['name'])){
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $doj = $_POST['doj'];
    $city = $_POST['city'];
    $salary = $_POST['salary'];
    if($name == "" | $age == "" | $gender=="" | $doj=="" | $city=="" | $salary==""){
        if($name==""){
            $_SESSION['name']="Name Must Not Be Empty";
        }
        if($age==""){
            $_SESSION['age']="Age Must Not Be Empty";
        }
        if($gender==""){
            $_SESSION['gender']="Gender Must Not Be Empty";
        }
        if($doj==""){
            $_SESSION['doj']="Date of Job Must Not Be Empty";
        }
        if($city==""){
            $_SESSION['city']="City Must Not Be Empty";
        }
        if($salary==""){
            $_SESSION['salary']="Salary Must Not Be Empty";
        }
        header("location: ".$_SERVER["HTTP_REFERER"]);
    }else{
        unset($_SESSION['name']);
        unset($_SESSION['age']);
        unset($_SESSION['gender']);
        unset($_SESSION['doj']);
        unset($_SESSION['city']);
        unset($_SESSION['salary']);   

        if($_POST['action']=="add"){
            $status = $userDB->create($name, $age, $gender, $doj, $city, $salary);
            if($status){
                $_SESSION['status']="User Created Successfully";
                $_SESSION['expire']=time();
            }else{
                $_SESSION['status']="User Creation Fail";
                $_SESSION['expire']=time();
            }
            header("location: ".$_SERVER["HTTP_REFERER"]);
        }else if($_POST['action']=="update"){
            $id = $_POST['id'];
            $status = $userDB->update($id, $name, $age, $gender, $doj, $city, $salary);
            if($status){
                $_SESSION['status']="User Updated Successfully";
                $_SESSION['expire']=time();
            }else{
                $_SESSION['status']="User Updating Fail";
                $_SESSION['expire']=time();
            }
            header("location: ../../../index.php?page=allusers");
        }
    }
}
if($_GET['action']=="delete"){
    $id = $_GET['id'];
    $status = $userDB->delete($id);
    if($status){
        $_SESSION['status']="Users Deleted Successfully.";
        $_SESSION['expire']=time();
    }
    header("location: ".$_SERVER["HTTP_REFERER"]);
}


?>