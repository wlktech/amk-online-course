<?php 
include "../vendor/autoload.php";
use App\WlkOnlineShop\Databases\Connection;
use App\WlkOnlineShop\Databases\UserModel;
use Helpers\HTTP;
use Helpers\Auth;

$auth = Auth::check();

$id = $_POST['id'];
$bio = $_POST['bio'];
$birth_date = date("Y-m-d", strtotime($_POST['birth_date']));
$country = $_POST['country'];
$state = $_POST['state'];
$language = implode(",", $_POST['language']);
$phone = $_POST['phone'];
$website = $_POST['website'];
$fav_music = implode(",", $_POST['fav_music']);
$fav_movie = implode(",", $_POST['fav_movie']);


$db = new UserModel(new Connection);
$user_info_update = $db->InfoUpdate($id, $bio, $birth_date, $country, $state, $language, $phone, $website, $fav_music, $fav_movie);
if($user_info_update){
    if($auth->value == 1){
        HTTP::redirect('../admin/admin_profile.php');
    }else if($auth->value == 2){
        HTTP::redirect('../admin/user_profile.php');
    }else{
        HTTP::redirect('../admin/dashboard.php');
    }
}else{
    echo "ERROR";
    // HTTP::redirect('../admin/admin_profile.php');
}

?>