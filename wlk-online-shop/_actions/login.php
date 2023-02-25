<?php 
session_start();
include "../vendor/autoload.php";
use App\WlkOnlineShop\Databases\Connection;
use App\WlkOnlineShop\Databases\UserModel;
use Helpers\HTTP;

$email = $_POST['email'];
$password = md5($_POST['password']);

$db = new UserModel(new Connection);
$user = $db->UserLogin($email, $password);
if($user){
    HTTP::redirect("../admin/admin_profile.php");
}else{
    HTTP::redirect("../login_form.php");
}
// echo "<pre>";
// print_r($user);
// echo "</pre>";


?>