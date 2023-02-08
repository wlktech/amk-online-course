<?php
include('vendor/autoload.php');
use Sql\App\databases\DatabaseConnect;
use Sql\App\databases\Category;
$db = new Category(new DatabaseConnect());
$categories = $db->getAll();

// echo "<pre>";
// print_r($cities);
// echo "</pre>";
// die();

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <?php include "navbar.php" ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                <div class="card-header">
                <h4>Categories List</h4>
                </div>
                <div class="card-body">
                <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php foreach($categories as $key=>$category) : ?>
                            <td><?= $category->id; ?></td>
                            <td><?= $category->category_name; ?></td>
                            <td><?= $category->created_at; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                </table>
                </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>