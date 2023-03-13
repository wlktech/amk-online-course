<?php 
session_start();
include "../vendor/autoload.php";
use App\WlkOnlineShop\Databases\Connection;
use App\WlkOnlineShop\Databases\CategoryModel;
use Helpers\HTTP;

$id = $_POST['id'];
$category_name = $_POST['category_name'];

$db = new CategoryModel(new Connection);
$update_category = $db->UpdateCategory($id, $category_name);

if($update_category){
    $_SESSION['msg'] = "Category has been updated successfully.";
    $_SESSION['expire'] = time();
    HTTP::redirect('../admin/category_index.php');
}else{
    echo "ERROR";
}

?>