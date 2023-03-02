<?php 
include "../vendor/autoload.php";
use App\WlkOnlineShop\Databases\Connection;
use App\WlkOnlineShop\Databases\UserModel;
use Helpers\HTTP;



$id = $_GET['id'];

$db = new UserModel(new Connection);
$delete_user = $db->DeleteUser($id);
// echo "<pre>";
// print_r($suspend_user);
// echo "</pre>";
if($delete_user){
    HTTP::redirect("../admin/user_index.php?msg= User has been deleted successfully.");
}else{
    echo "ERROR";
}

?>