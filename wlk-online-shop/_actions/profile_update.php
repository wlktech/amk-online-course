<?php 
include "../vendor/autoload.php";
use App\WlkOnlineShop\Databases\Connection;
use App\WlkOnlineShop\Databases\UserModel;
use Helpers\HTTP;
use Helpers\Auth;

$auth = Auth::check();

$profile_img = $_FILES['profile_img']['name'];
$tmp = $_FILES['profile_img']['tmp_name'];
$errors = $_FILES['profile_img']['error'];
$type = $_FILES['profile_img']['type'];

$data = [
    "id" => $_POST['id'],
    "profile_img" => $profile_img,
];

if($errors){
    echo "ERRORS";
}else{
    if($type == "image/jpeg" || $type == "image/png" || $type == "image/gif"){
        $db = new UserModel(new Connection);
        $profile_img_update = $db->ProfileImgUpdate($data);
        if($profile_img_update){
            move_uploaded_file($tmp, "profile/".$profile_img);
            if($auth->value == 1){
                HTTP::redirect('../admin/admin_profile.php');
            }else if($auth->value == 2){
                HTTP::redirect('../admin/user_profile.php');
            }
        }
    }else{
        echo "Invalid File Type";
    }
}




?>