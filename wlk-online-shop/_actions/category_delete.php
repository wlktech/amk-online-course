<?php 
include "../vendor/autoload.php";
use App\WlkOnlineShop\Databases\Connection;
use App\WlkOnlineShop\Databases\CategoryModel;
use Helpers\HTTP;

$id = $_GET['id'];


$db = new CategoryModel(new Connection);
$delete_category = $db->DeleteCategory($id);

if($delete_category){
    HTTP::redirect('../admin/category_index.php?msg= Category has been deleted successfully.');
}else{
    echo "ERROR";
}

?>