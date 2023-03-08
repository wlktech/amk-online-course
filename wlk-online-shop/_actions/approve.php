<?php 
include "../vendor/autoload.php";
use App\WlkOnlineShop\Databases\Connection;
use App\WlkOnlineShop\Databases\UserModel;
use Helpers\HTTP;



$id = $_POST['id'];
$status = $_POST['status'];

$db = new UserModel(new Connection);
$approve_user = $db->UserApprove($id, $status);
// echo "<pre>";
// print_r($approve_user);
// echo "</pre>";
if($approve_user){
    HTTP::redirect("../admin/user_index.php?msg= User has been approved successfully.");
}

?>