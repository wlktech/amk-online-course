<?php 
include "../vendor/autoload.php";
use App\WlkOnlineShop\Databases\Connection;
use App\WlkOnlineShop\Databases\ProductModel;
use Helpers\HTTP;

$id = $_POST['id'];
$product_status = $_POST['product_status'];


$db = new ProductModel(new Connection);
$product_status_change = $db->productStatus($id, $product_status);
if($product_status == "Active"){
    HTTP::redirect('../admin/product_index.php?msg= Product has been activated successfully.');
}else if($product_status == "Inactive"){
    HTTP::redirect('../admin/product_index.php?msg= Product has been deactivated successfully.');
}else{
    echo "ERROR";
}


?>