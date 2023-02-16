<?php 
session_start();
include "../../../vendor/autoload.php";
use Test\App\Database\DB;
use Test\App\Database\Category;

$db = new DB();
$connection = $db->connect();
$categoryDB = new Category($connection);

if(isset($_POST['category_name'])){
    $category_name = $_POST['category_name'];
    
    if($category_name == ""){
        $_SESSION['category_name']="Name Must Not Be Empty";
        header("location: ".$_SERVER["HTTP_REFERER"]);
    }else{
        unset($_SESSION['category_name']);
          

        if($_POST['action']=="add"){
            $status = $categoryDB->create($category_name);
            if($status){
                $_SESSION['status']="Category Created Successfully";
                $_SESSION['expire']=time();
            }else{
                $_SESSION['status']="Category Creation Fail";
                $_SESSION['expire']=time();
            }
            header("location: ".$_SERVER["HTTP_REFERER"]);
        }else if($_POST['action']=="update"){
            $id = $_POST['id'];
            $status = $categoryDB->update($id, $category_name);
            if($status){
                $_SESSION['status']="Category Updated Successfully";
                $_SESSION['expire']=time();
            }else{
                $_SESSION['status']="Category Updating Fail";
                $_SESSION['expire']=time();
            }
            header("location: ".$_SERVER["HTTP_REFERER"]);
        }
    }
}
if($_GET['action']=="delete"){
    $id = $_GET['id'];
    $status = $categoryDB->delete($id);
    if($status){
        $_SESSION['status']="Category Deleted Successfully.";
        $_SESSION['expire']=time();
    }
    header("location: ".$_SERVER["HTTP_REFERER"]);
}


?>