<?php 
include "../vendor/autoload.php";
use App\WlkOnlineShop\Databases\Connection;
use App\WlkOnlineShop\Databases\UserModel;
use Helpers\HTTP;



$id = $_POST['id'];
$status = $_POST['status'];

$db = new UserModel(new Connection);
$suspend_user = $db->UserSuspend($id, $status);
// echo "<pre>";
// print_r($suspend_user);
// echo "</pre>";
if($suspend_user){
    HTTP::redirect("../admin/user_index.php?msg= User has been suspended successfully.");
}

?>