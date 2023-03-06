<?php 
include "../vendor/autoload.php";
use App\WlkOnlineShop\Databases\Connection;
use App\WlkOnlineShop\Databases\CategoryModel;
use Helpers\HTTP;

$category_name = $_POST['category_name'];

$db = new CategoryModel(new Connection);
$create_category = $db->CreateCategory($category_name);

if($create_category){
    HTTP::redirect('../admin/category_index.php?msg= Category has been created successfully.');
}else{
    echo "ERROR";
}

?>