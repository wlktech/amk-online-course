<?php
include('vendor/autoload.php');
use Sql\App\databases\DatabaseConnect;
use Sql\App\databases\Users;
$db = new Users(new DatabaseConnect());
$users = $db->GetAllUser();
$cities = $db->GetUniqueCity();
$uniqueUsers = $db->GetUniqueUser();
$names = $db->CountName();
$totals = $db->getTotalSalary();
$avgs = $db->getAvgSalary();
$mins = $db->getMinSalary();
$maxs = $db->getMaxSalary();
$specscolumns = $db->getColumnNameAgeCity();
$greater30Users = $db->getAgeGreaterThan30();

// echo "<pre>";
// print_r($cities);
// echo "</pre>";
// die();

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
<div class="container">
  <div class="row">
   <div class="col-lg-8">
    <div class="card">
     <div class="card-header">
      <h4>Users List</h4>
     </div>
     <div class="card-body">
      <table class="table">
       <thead>
        <tr>
         <th>ID</th>
         <th>name</th>
         <th>age</th>
         <th>Sex</th>
         <th>Doj</th>
         <th>City</th>
         <th>Salary</th>
        </tr>
       </thead>
       <tbody>
        <tr>
            <?php foreach($users as $key=>$user) : ?>
                <td><?= $user->id; ?></td>
                <td><?= $user->name; ?></td>
                <td><?= $user->age; ?></td>
                <td><?= $user->sex; ?></td>
                <td><?= $user->doj; ?></td>
                <td><?= $user->city; ?></td>
                <td><?= $user->salary; ?></td>
            
        </tr>
        <?php endforeach; ?>
       </tbody>
      </table>
     </div>
    </div>
    <div class="card">
     <div class="card-header">
      <h4>Greater Than 30</h4>
     </div>
     <div class="card-body">
      <table class="table">
       <thead>
        <tr>
         <th>Greater Than 30</th>
        </tr>
       </thead>
       <tbody>
        <tr>
            <?php foreach($greater30Users as $key=>$greater30User) : ?>
                <td><?= $greater30User->id; ?></td>
                <td><?= $greater30User->name; ?></td>
                <td><?= $greater30User->age; ?></td>
                <td><?= $greater30User->sex; ?></td>
                <td><?= $greater30User->doj; ?></td>
                <td><?= $greater30User->city; ?></td>
                <td><?= $greater30User->salary; ?></td>
        </tr>
        <?php endforeach; ?>
       </tbody>
      </table>
     </div>
    </div>
   </div>
   <div class="col-lg-4">
    <div class="card">
     <div class="card-header">
      <h4>City list</h4>
     </div>
     <div class="card-body">
      <table class="table">
       <thead>
        <tr>
         <th>Unique City</th>
        </tr>
       </thead>
       <tbody>
        <tr>
            <?php foreach($cities as $key=>$city) : ?>
                <td><?= $city->city; ?></td>
            
        </tr>
        <?php endforeach; ?>
       </tbody>
      </table>
     </div>
    </div>
    <div class="card">
     <div class="card-header">
      <h4>Unique User list</h4>
     </div>
     <div class="card-body">
      <table class="table">
       <thead>
        <tr>
         <th>Unique Name</th>
        </tr>
       </thead>
       <tbody>
        <tr>
            <?php foreach($uniqueUsers as $key=>$user) : ?>
                <td><?= $user->name; ?></td>
            
        </tr>
        <?php endforeach; ?>
       </tbody>
      </table>
     </div>
    </div>
    <div class="card">
     <div class="card-header">
      <h4>Count Name</h4>
     </div>
     <div class="card-body">
      <table class="table">
       <thead>
        <tr>
         <th>Count Name</th>
        </tr>
       </thead>
       <tbody>
        <tr>
            <?php foreach($names as $key=>$name) : ?>
                <td><?= $name->count_name; ?></td>
            
        </tr>
        <?php endforeach; ?>
       </tbody>
      </table>
     </div>
    </div>
    <div class="card">
     <div class="card-header">
      <h4>Total Salary</h4>
     </div>
     <div class="card-body">
      <table class="table">
       <thead>
        <tr>
         <th>Total Salary</th>
        </tr>
       </thead>
       <tbody>
        <tr>
            <?php foreach($totals as $key=>$total) : ?>
                <td><?= $total->total_salary; ?></td>
            
        </tr>
        <?php endforeach; ?>
       </tbody>
      </table>
     </div>
    </div>
    <div class="card">
     <div class="card-header">
      <h4>Average Salary</h4>
     </div>
     <div class="card-body">
      <table class="table">
       <thead>
        <tr>
         <th>Average Salary</th>
        </tr>
       </thead>
       <tbody>
        <tr>
            <?php foreach($avgs as $key=>$avg) : ?>
                <td><?= $avg->avg_salary; ?></td>
            
        </tr>
        <?php endforeach; ?>
       </tbody>
      </table>
     </div>
    </div>
    <div class="card">
     <div class="card-header">
      <h4>Minimun Salary</h4>
     </div>
     <div class="card-body">
      <table class="table">
       <thead>
        <tr>
         <th>Minimun Salary</th>
        </tr>
       </thead>
       <tbody>
        <tr>
            <?php foreach($mins as $key=>$min) : ?>
                <td><?= $min->min_salary; ?></td>
            
        </tr>
        <?php endforeach; ?>
       </tbody>
      </table>
     </div>
    </div>
    <div class="card">
     <div class="card-header">
      <h4>Maximum Salary</h4>
     </div>
     <div class="card-body">
      <table class="table">
       <thead>
        <tr>
         <th>Maximum Salary</th>
        </tr>
       </thead>
       <tbody>
        <tr>
            <?php foreach($maxs as $key=>$max) : ?>
                <td><?= $max->max_salary; ?></td>
            
        </tr>
        <?php endforeach; ?>
       </tbody>
      </table>
     </div>
    </div>
    <div class="card">
     <div class="card-header">
      <h4>Specified Columns</h4>
     </div>
     <div class="card-body">
      <table class="table">
       <thead>
        <tr>
         <th>Specified Columns</th>
        </tr>
       </thead>
       <tbody>
        <tr>
            <?php foreach($specscolumns as $key=>$specscolumn) : ?>
                <td><?= $specscolumn->name; ?></td>
                <td><?= $specscolumn->age; ?></td>
                <td><?= $specscolumn->city; ?></td>
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>

</body>
</html>