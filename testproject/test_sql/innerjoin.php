<?php 
include('vendor/autoload.php');
use Sql\App\databases\DatabaseConnect;
use Sql\App\databases\innerjoin;
$db = new innerjoin(new DatabaseConnect());
$innerjoins = $db->getAll();
$customers = $db->getAllCustomer();
$orders = $db->getAllOrder();
$customerinnerjoins = $db->CustomerInnerJoin()
// echo "<pre>";
// print_r($innerjoins);
// echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>
    <?php include "navbar.php" ?>
<div class="container mt-5">
    <div class="card ">
        <div class="card-header">
            <h5>Cricket & Football Inner Join</h5>
        </div>
        <div class="table-responsive px-4">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Cricket_ID</th>
                        <th>Name</th>
                        <th>Football_ID</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach($innerjoins as $innerjoin){
                    ?>
                    <tr>
                        <td><?php echo $innerjoin['cricket_id'] ?></td>
                        <td><?php echo $innerjoin['name'] ?></td>
                        <td><?php echo $innerjoin['football_id'] ?></td>
                        <td><?php echo $innerjoin['name'] ?></td>
                    </tr>
                    <?php 
                    }?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3>Customer Table</h3>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach($customers as $customer){
                            ?>
                            <tr>
                                <td><?php echo $customer['customer_id'] ?></td>
                                <td><?php echo $customer['first_name'] ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3>Order Table</h3>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Amount</th>
                                <th>Customer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach($orders as $order){
                            ?>
                            <tr>
                                <td><?php echo $order['order_id'] ?></td>
                                <td><?php echo $order['amount'] ?></td>
                                <td><?php echo $order['customer'] ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
    <div class="card my-5">
        <div class="card-header">
             <h3>Customers to Order Inner Join</h3>
        </div>
        <div class="table-responsive">
            
            <table class="table">
                <thead>
                    <tr>
                        <th>CustomerID</th>
                        <th>First Name</th>
                        <th>OrderID</th>
                        <th>Amount</th>
                        <th>Customer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach($customerinnerjoins as $customerinnerjoin){
                    ?>
                    <tr>
                        <td><?php echo $customerinnerjoin['customer_id'] ?></td>
                        <td><?php echo $customerinnerjoin['first_name'] ?></td>
                        <td><?php echo $customerinnerjoin['order_id'] ?></td>
                        <td><?php echo $customerinnerjoin['amount'] ?></td>
                        <td><?php echo $customerinnerjoin['customer'] ?></td>
                    </tr>
                    <?php 
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
    
    
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
</body>
</html>
