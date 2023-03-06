<?php 
include "../vendor/autoload.php";
use App\WlkOnlineShop\Databases\Connection;
use App\WlkOnlineShop\Databases\ProductModel;
use Helpers\HTTP;

$id = $_GET['id'];

$db = new ProductModel(new Connection);
$product_delete = $db->productDelete($id);
if($product_delete){
    HTTP::redirect('../admin/product_index.php?msg= Product has been deleted successfully.');
}else{
    echo "ERROR";
}


?>