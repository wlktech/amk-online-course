<?php 
session_start();
include "../vendor/autoload.php";
use App\WlkOnlineShop\Databases\Connection;
use App\WlkOnlineShop\Databases\ProductModel;
use Helpers\HTTP;

// $file_name = $_FILES['file_name']['name'];
// $tmp = $_FILES['file_name']['tmp_name'];
// $errors = $_FILES['file_name']['error'];
// $type = $_FILES['file_name']['type'];


    $id = $_POST['id'];
    $product_name = $_POST['product_name'];
    $category_id = $_POST['category_id'];
    $price = $_POST['price'];
    $old_price = $_POST['old_price'];
    $qty = $_POST['qty'];
    $description = $_POST['description'];


$db = new ProductModel(new Connection);
$product_update = $db->ProductUpdate($id, $product_name, $category_id, $price, $old_price, $qty, $description);
if($product_update){
    $_SESSION['msg'] = "Product has been updated successfully.";
    $_SESSION['expire'] =  time();
    HTTP::redirect('../admin/product_index.php');
}else{
    echo "ERROR";
}


?>