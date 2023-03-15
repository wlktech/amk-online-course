<?php 
session_start();
include('../vendor/autoload.php');
use Amk\NewChat\App\Databases\DBConnection as DB;
use Amk\NewChat\App\Databases\UserModel;

$data = [
 'email' => $_POST['email'],
 'password' => md5($_POST['password']),
];

$db = new UserModel(new DB());
$result = $db->UserLogin($data);

if ($result) {
 $_SESSION['user'] = $result;
 header('location: ../profile.php?msg=You are logged in');
} else {
 header('location: ../login_form.php?error=Invalid Email or Password');
}

?>