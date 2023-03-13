<?php 
session_start();
include "../vendor/autoload.php";
use App\WlkOnlineShop\Databases\Connection;
use App\WlkOnlineShop\Databases\UserModel;
use Helpers\HTTP;



$email = $_POST['email'];
$password = md5($_POST['password']);

$db = new UserModel(new Connection);
$user = $db->UserLoginCheck($email, $password);
if($user->value=='1'){
    $_SESSION['user'] = $user;
    HTTP::redirect("../admin/admin_profile.php");
}else if($user->value=='2'){
    $_SESSION['user'] = $user;
    HTTP::redirect("../admin/user_profile.php");
}else{
    $_SESSION['msg']="Email or Password was wrong!";
    $_SESSION['expire'] = time();
    HTTP::redirect("../login_form.php");
}
// echo "<pre>";
// print_r($user);
// echo "</pre>";


?>