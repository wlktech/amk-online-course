<?php 
include "../vendor/autoload.php";
use App\WlkOnlineShop\Databases\Connection;
use App\WlkOnlineShop\Databases\ProductModel;
use Helpers\HTTP;



$file_name = $_FILES['file_name']['name'];
$tmp = $_FILES['file_name']['tmp_name'];
$errors = $_FILES['file_name']['error'];
$type = $_FILES['file_name']['type'];

$id = $_POST['id'];

$db = new ProductModel(new Connection);
if($type == 'image/jpeg' | $type == 'image/png' | $type == 'image/gif' | $type == 'image/jpg'){
    if($errors == 0){
        if(move_uploaded_file($tmp, 'product_image/'.$file_name)){
            $product_photo_update = $db->ProductPhotoUpdate($id, $file_name);
            if($product_photo_update){
                HTTP::redirect("../admin/product_index.php?msg= Product Photo has been updated successfully.");
            }else{
                echo "ERROR";
                die;
            }
        }
    }
}




?>