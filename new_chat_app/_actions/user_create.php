<?php 
include('../vendor/autoload.php');
use Amk\NewChat\App\Databases\DBConnection as DB;
use Amk\NewChat\App\Databases\UserModel;
use Helpers\HTTP;

$data = [
 'user_name' => $_POST['user_name'],
 'email' => $_POST['email'],
 'password' => md5($_POST['password']),
 'status' => 0
];

// echo "<pre>";
// print_r($data);
// echo "</pre>";

$db = new UserModel(new DB());
$result = $db->UserCreate($data);
//echo "<pre>";
// print_r($result);
// echo "</pre>";

if ($result) {
 header('location: ../login_form.php?msg=Your Account has been  Created Successfully');
} else {
 HTTP::redirect('../reg_form.php?error=Something went wrong');
}

?>