<?php 
session_start();
include("../vendor/autoload.php");
use Wlk\Chatapp\Databases\DB;
use Wlk\Chatapp\Databases\QueryBuilder;
use Helpers\HTTP;

$db = new QueryBuilder(new DB());


if(isset($_POST['username'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if($username == "" | $email == "" | $password == ""){
        if($username == ""){
            $_SESSION['v-name'] = "*Username Must Not Be Empty!"; 
        }
        if($email == ""){
            $_SESSION['v-email'] = "*Email Must Not Be Empty!"; 
        }
        if($password == ""){
            $_SESSION['v-password'] = "*Password Must Not Be Empty!"; 
        }
        HTTP::redirect('../registerform.php');
    }else{
        unset($_SESSION['v-name']);
        unset($_SESSION['v-email']);
        unset($_SESSION['v-password']);

        $datas = [
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT)
        ];

        if($_POST['action']=="add"){
            $usercreate = $db->create("users", $datas);
            if($usercreate){
                $_SESSION['msg'] = "Registered Success!";
                $_SESSION['expire'] = time();
                HTTP::redirect('../loginform.php');
            }
        }

    }
}
if(isset($_POST['email'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    if($email == "" | $password == ""){
        if($email == ""){
            $_SESSION['v-email'] = "*Email Must Not Be Empty!"; 
        }
        if($password == ""){
            $_SESSION['v-password'] = "*Password Must Not Be Empty!"; 
        }
        HTTP::redirect('../loginform.php');
    }else{
        unset($_SESSION['v-email']);
        unset($_SESSION['v-password']);


        if($_POST['action'] == 'login'){
            $userlogin = $db->login('users', '*', null, $email);
            if(password_verify($password, $userlogin['password'])){
                $_SESSION['user'] = $userlogin;
                $_SESSION['msg'] = "Login Success!";
                $_SESSION['expire'] = time();
                HTTP::redirect('../profile.php');
            }else{
                HTTP::redirect('../loginform.php');
            }
        } 
    }
}


if($_POST['action']== 'profileUpload'){

    $image_arr = $_FILES['profile']['name'];
    $tmp_name = $_FILES['profile']['tmp_name'];
    $folder = "../profiles/";
    $profile = uniqid('profile').$image_arr;
    move_uploaded_file($tmp_name,$folder.$profile);

    $id = $_POST['id'];
    $datas = [
        'profile' => $profile
    ];
    echo "<pre>";
    print_r($datas);
    echo $id;
    echo "</pre>";
    die;
    $profileUpload = $db->update('users', $datas, $id);
    if($profileUpload){
        HTTP::redirect('../profile.php');
    }
}



if($_GET['action']=='logout'){
    unset($_SESSION['user']);
    HTTP::redirect('../loginform.php');
}





?>