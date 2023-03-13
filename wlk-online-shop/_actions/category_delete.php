<?php 
session_start();
include "../vendor/autoload.php";
use App\WlkOnlineShop\Databases\Connection;
use App\WlkOnlineShop\Databases\CategoryModel;
use Helpers\HTTP;

$id = $_GET['id'];


$db = new CategoryModel(new Connection);
$delete_category = $db->DeleteCategory($id);

if($delete_category){
    $_SESSION['msg'] = "Category has been deleted successfully.";
    $_SESSION['expire'] = time();
    HTTP::redirect('../admin/category_index.php');
}else{
    echo "ERROR";
}

?>