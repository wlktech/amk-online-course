<?php 
include('vendor/autoload.php');
use Sql\App\databases\DatabaseConnect;
use Sql\App\databases\ProductLine;
$db = new ProductLine(new DatabaseConnect());
$productlines = $db->GetAll();

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
        <h3>Product Lines</h3>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Product Lines</th>
                        <th>Text Description</th>
                        <th>HTML Description</th>
                        <th>Images</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach($productlines as $productline){
                    ?>
                    <tr>
                        <td><?php echo $productline['productLine'] ?></td>
                        <td><?php echo $productline['textDescription'] ?></td>
                        <td><?php echo $productline['htmlDescription'] ?></td>
                        <td><img src="<?php echo $productline['image'] ?>" width="100px" alt=""></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>