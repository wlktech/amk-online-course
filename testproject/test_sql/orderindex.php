<?php 
include('vendor/autoload.php');
use Sql\App\databases\DatabaseConnect;
use Sql\App\databases\Order;
$db = new Order(new DatabaseConnect());
$orders = $db->GetAll();

?>




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
  <?php include "navbar.php" ?>
    <div class="container">
        <h3>Order Lists</h3>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Order Date</th>
                        <th>Shipped Date</th>
                        <th>Status</th>
                        <th>Customer No</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach($orders as $order){
                    ?>
                    <tr>
                        <td><?php echo $order['orderDate'] ?></td>
                        <td><?php echo $order['shippedDate'] ?></td>
                        <td>
                            <?php if($order['status'] == "cancelled"){ ?>
                                <span class="badge bg-danger"><?php echo $order['status'] ?></span>
                            <?php }else if($order['status'] == "pending"){?>
                                <span class="badge bg-warning"><?php echo $order['status'] ?></span>
                            <?php }else if($order['status'] == "shipped"){ ?>
                                <span class="badge bg-info"><?php echo $order['status'] ?></span>
                            <?php } ?>
                        </td>
                        <td><?php echo $order['customerNumber'] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>