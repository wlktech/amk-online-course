<?php 
include('vendor/autoload.php');
use Amk\NewChat\App\Databases\DBConnection as DB;
use Amk\NewChat\App\Databases\UserModel;

$db = new UserModel(new DB());
$users = $db->GetAllUsers();
?>
<?php include('layouts/head.php'); ?>

<body>
 <?php include('layouts/navbar.php'); ?>

 <div class="container">
  <div class="row">
   <div class="col-md-8">
    <div class="card">
     <div class="card-header">
      <h3>User List</h3>

     </div>
     <div class="card-body">
      <table class="table">
       <thead>
        <tr>
         <th>ID</th>
         <th>User Name</th>
         <th>User Email</th>
         <th>User Status</th>
         <th>Action</th>
        </tr>
       </thead>

       <tbody>
        <?php foreach($users as $user): ?>
        <tr>
         <td><?= $user->id; ?></td>
         <td><?= $user->user_name; ?></td>
         <td><?= $user->email; ?></td>
         <td>
          <?php if($user->status == 1): ?>
          <span class="badge badge-success">online</span>
          <?php else: ?>
          <span class="badge badge-danger">offline</span>
          <?php endif; ?>
         </td>
         <td>
          <a href="chat.php?id=<?= $user->id; ?>" class="btn btn-primary btn-sm">Send Message</a>
         </td>
        </tr>
        <?php endforeach; ?>
      </table>
     </div>
    </div>
   </div>
  </div>
 </div>

 <?php include('layouts/footer.php'); ?>