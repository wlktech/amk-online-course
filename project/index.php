<?php 
session_start();
include "vendor/autoload.php";
use Test\App\Database\DB;
use Test\App\Database\User;

$db = new DB();
$connection = $db->connect();
$userDB = new User($connection);


// echo "<pre>";
// print_r($users);
// echo "</pre>";

include "header.php";
include "nav.php";
include "sidebar.php";

if(isset($_GET['page'])){
    $page = $_GET['page'];
    if($page == "allusers"){
        $users = $userDB->getAll();
        include "./users/allusers.php";
    }else if($page == "updateuser"){
        $id = $_GET['id'];
        $user = $userDB->get($id);
        include "./users/updateuser.php";
    }else if($page == "totalSalary"){
        $total = $userDB->totalSalary();
        include "./users/totalSalary.php";
    }else if($page == "avgSalary"){
        $avg = $userDB->avgSalary();
        include "./users/avgSalary.php";
    }else if($page == "minSalary"){
        $min = $userDB->minSalary();
        include "./users/minSalary.php";
    }else if($page == "maxSalary"){
        $max = $userDB->maxSalary();
        include "./users/maxSalary.php";
    }else if($page == "maleUser"){
        $gender = $_GET['gender'];
        $users = $userDB->gender($gender);
        include "./users/allusers.php";
    }else if($page == "femaleUser"){
        $gender = $_GET['gender'];
        $users = $userDB->gender($gender);
        include "./users/allusers.php";
    }else if($page == "under30User"){
        $age = $_GET['age'];
        $users = $userDB->Under30User($age);
        include "./users/allusers.php";
    }else if($page == "over30User"){
        $age = $_GET['age'];
        $users = $userDB->Over30User($age);
        include "./users/allusers.php";
    }
}else{
    $users = $userDB->getAll();
    include "./users/allusers.php";
}
?>


        



<?php
include "footer.php";
?>