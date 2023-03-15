<?php 
include('../vendor/autoload.php');
use Helpers\Auth;
use Helpers\HTTP;
use Amk\NewChat\App\Databases\UserModel;
use Amk\NewChat\App\Databases\DBConnection as DB;

$auth = Auth::check();
$db = new UserModel(new DB);

$file_name = $_FILES['profile']['name'];
$file_tmp = $_FILES['profile']['tmp_name'];
$errors = $_FILES['profile']['error'];
$type = $_FILES['profile']['type'];

$data = [
 'id' => $auth->id,
 'profile' => $file_name
];

if($errors == 0){
 if($type == 'image/jpeg' || $type == 'image/png'){
  $upload = move_uploaded_file($file_tmp, 'profile/'.$file_name);
  if($upload){
   $update = $db->ProfileUpdate($data);
   if($update){
    HTTP::redirect('profile.php?msg=Profile Updated Successfully');
   }else{
    HTTP::redirect('profile.php?error=Profile Update Failed');
   }
  }
 }
}
  



?>