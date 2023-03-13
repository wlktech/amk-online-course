<?php 
session_start();
include "../vendor/autoload.php";
use App\WlkOnlineShop\Databases\Connection;
use App\WlkOnlineShop\Databases\ProductModel;
use Helpers\HTTP;

$id = $_GET['id'];

$db = new ProductModel(new Connection);
$product_delete = $db->productDelete($id);
if($product_delete){
    $_SESSION['msg'] = "Product has been deleted successfully.";
    $_SESSION['expire'] =  time();
    HTTP::redirect('../admin/product_index.php');
}else{
    echo "ERROR";
}


?>