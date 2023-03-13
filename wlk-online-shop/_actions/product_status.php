<?php 
session_start();
include "../vendor/autoload.php";
use App\WlkOnlineShop\Databases\Connection;
use App\WlkOnlineShop\Databases\ProductModel;
use Helpers\HTTP;

$id = $_POST['id'];
$product_status = $_POST['product_status'];


$db = new ProductModel(new Connection);
$product_status_change = $db->productStatus($id, $product_status);
if($product_status == "Active"){
    $_SESSION['msg'] = "Product has been activated successfully.";
    $_SESSION['expire'] =  time();
    HTTP::redirect('../admin/product_index.php');
}else if($product_status == "Inactive"){
    $_SESSION['msg'] = "Product has been deactivated successfully.";
    $_SESSION['expire'] =  time();
    HTTP::redirect('../admin/product_index.php');
}else{
    echo "ERROR";
}


?>