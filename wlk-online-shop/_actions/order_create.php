<?php 

$data = [
    'payment_method' => $_POST['payment_method'],
    'card_name' => $_POST['card_name'],
    'card_no' => $_POST['card_no'],
    'exp_date' => $_POST['exp_date'],
    'cvv_no' => $_POST['cvv_no'],
    'product_id' => $_POST['product_id'],
    'quantity' => $_POST['quantity'],
    'price' => $_POST['price'],
    'total_price' => $_POST['total_price'],
    'user_id' => $_POST['user_id'],
    'order_date' => date('Y-m-d'),
    'order_status' => 'pending',
    'order_number' => date('Y-m-d').'-'.rand(1000,9999).'-'.chr(rand(65,90)).chr(rand(65,90)).chr(rand(65,90)).chr(rand(65,90)),

];
// echo "<pre>";
// print_r($data);
// echo "</pre>";

?>