<?php 
include "vendor/autoload.php";
use Wlk\App\Databases\DB;
use Wlk\App\Databases\User;
// include "src/Libs/Databases/DB.php";
// include "src/Libs/Databases/User.php";

$db = new DB();
$connection = $db->connect();
$userDB = new User($connection);
$users = $userDB->getAll();
echo "<pre>";
print_r($users);
echo "</pre>";


?>