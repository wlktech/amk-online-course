<?php 
include "../vendor/autoload.php";
use App\WlkOnlineShop\Databases\Connection;
use App\WlkOnlineShop\Databases\UserModel;
use Helpers\HTTP;
use Helpers\Auth;

$auth = Auth::check();

$data = [
    "id" => $_POST['id'],
    "user_name" => $_POST['user_name'],
    "public_name" => $_POST['public_name'],
    "company" => $_POST['company']
];

// echo "<pre>";
// print_r($data);
// echo "</pre>";
$db = new UserModel(new Connection);
$user_update_data = $db->GeneralUpdate($data);
if($user_update_data){
    if($auth->value == 1){
        HTTP::redirect('../admin/admin_profile.php');
    }else if($auth->value == 2){
        HTTP::redirect('../admin/user_profile.php');
    }
}else{
    HTTP::redirect('../admin/admin_profile.php');
}


?>