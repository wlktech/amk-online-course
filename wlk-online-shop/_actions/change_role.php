<?php 
session_start();
include "../vendor/autoload.php";
use App\WlkOnlineShop\Databases\Connection;
use App\WlkOnlineShop\Databases\UserModel;
use Helpers\HTTP;



$id = $_POST['id'];
$role_id = $_POST['role_id'];

$db = new UserModel(new Connection);
$change_role = $db->ChangeRole($id, $role_id);
// echo "<pre>";
// print_r($suspend_user);
// echo "</pre>";
if($change_role){
    $_SESSION['msg'] = "Role has been changed successfully.";
    $_SESSION['expire'] =  time();
    HTTP::redirect("../admin/user_index.php");
}

?>