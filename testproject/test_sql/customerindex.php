<?php 
include('vendor/autoload.php');
use Sql\App\databases\DatabaseConnect;
use Sql\App\databases\Customer;
$db = new Customer(new DatabaseConnect());
$customers = $db->GetAll();

?>




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Customer Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
  <?php include "navbar.php" ?>
    <div class="container mt-5">
        <h3>Customer Lists</h3>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Phone</th>
                        <th>Address Line1</th>
                        <th>Address Line2</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Postal Code</th>
                        <th>Country</th>
                        <th>Sale Rep Emp No</th>
                        <th>Credit Limit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach($customers as $customer){
                    ?>
                    <tr>
                        <td><?php echo $customer['customerNumber'] ?></td>
                        <td><?php echo $customer['customerName'] ?></td>
                        <td><?php echo $customer['contactLastName'] ?></td>
                        <td><?php echo $customer['contactFirstName'] ?></td>
                        <td><?php echo $customer['phone'] ?></td>
                        <td><?php echo $customer['addressLine1'] ?></td>
                        <td><?php echo $customer['addressLine2'] ?></td>
                        <td><?php echo $customer['city'] ?></td>
                        <td><?php echo $customer['state'] ?></td>
                        <td><?php echo $customer['postalCode'] ?></td>
                        <td><?php echo $customer['country'] ?></td>
                        <td><?php echo $customer['salesRepEmployeeNumber'] ?></td>
                        <td><?php echo $customer['creditLimit'] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>