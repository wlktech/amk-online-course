<?php 
session_start();
include "../vendor/autoload.php";
use App\WlkOnlineShop\Databases\Connection;
use App\WlkOnlineShop\Databases\ProductModel;
use Helpers\HTTP;

$id = $_POST['product_id'];
$qty = $_POST['qty'];


$db = new ProductModel(new Connection);
$product_qty = $db->product_qty($id, $qty);
if($product_qty){
    HTTP::redirect('../order_index.php');
}else{
    echo "ERROR";
}


?>