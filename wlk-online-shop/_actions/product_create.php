<?php 
session_start();
include "../vendor/autoload.php";
use App\WlkOnlineShop\Databases\Connection;
use App\WlkOnlineShop\Databases\ProductModel;
use Helpers\HTTP;

$file_name = $_FILES['file_name']['name'];
$tmp = $_FILES['file_name']['tmp_name'];
$errors = $_FILES['file_name']['error'];
$type = $_FILES['file_name']['type'];

$data=[
    'product_name' => $_POST['product_name'],
    'category_id' => $_POST['category_id'],
    'price' => $_POST['price'],
    'old_price' => $_POST['old_price'],
    'qty' => $_POST['qty'],
    'description' => $_POST['description'],
    'file_name' => $file_name,
    'product_status' => $_POST['product_status']
];

$db = new ProductModel(new Connection);
if($type == 'image/jpeg' | $type == 'image/png' | $type == 'image/gif' | $type == 'image/jpg'){
    if($errors == 0){
        if(move_uploaded_file($tmp, 'product_image/'.$file_name)){
            $product_create = $db->productCreate($data);
            if($product_create){
                $_SESSION['msg'] = "Product has been created successfully.";
                $_SESSION['expire'] = time();
                HTTP::redirect("../admin/product_index.php");
            }else{
                echo "ERROR";
            }
        }
    }
}

?>