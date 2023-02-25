<?php 
include "../vendor/autoload.php";
use App\WlkOnlineShop\Databases\Connection;
use App\WlkOnlineShop\Databases\UserModel;
use Helpers\HTTP;


$data = [
    'user_name' => $_POST['user_name'],
    'public_name' => $_POST['public_name'],
    'email' => $_POST['email'],
    'password' => md5($_POST['password']),
    'phone' => $_POST['phone'],
    'address' => $_POST['address'],
    'fix_address' => $_POST['fix_address'],
    'company' => $_POST['company'],
    'bio' => $_POST['bio'],
    // date of birth with date format
    'birth_date' => date('Y-m-d', strtotime($_POST['dob'])),
    'country' => $_POST['country'],
    'state' => $_POST['state'],
    'language' => $_POST['language'],
    'fav_movie' => $_POST['fav_movie'],
    'fav_music' => $_POST['fav_music'],
    'website' => $_POST['website'],
    'status' => 'pending',
    'role_id' => '1',
    
   ];
   
//    echo "<pre>";
//    print_r($data);
//    echo "</pre>";
$db = new UserModel(new Connection);
$user_insert_data = $db->UserRegister($data);

if($user_insert_data){
    HTTP::redirect('login_form.php');
}else{
    HTTP::redirect('register_form.php');
}
//    echo "<pre>";
//    print_r($user_insert_data);
//    echo "</pre>";

?>