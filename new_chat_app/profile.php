<?php 
include('vendor/autoload.php');
use Helpers\Auth;
use Helpers\HTTP;
use Amk\NewChaApp\Databases\UserModel;
use Amk\NewChaApp\Databases\DB;
$auth = Auth::check();
?>
<?php include('layouts/head.php'); ?>

<body>
 <?php include('layouts/navbar.php') ?>

 <div class="container">
  <div class="row">
   <div class="col-md-8">
    <div class="card">
     <div class="card-header">
      <h3>Profile</h3>
     </div>
     <?php if(isset($_GET['msg'])): ?>
     <div class="alert alert-success">
      <?php echo $_GET['msg']; ?>
     </div>
     <?php endif; ?>
     <!-- error alert  -->
     <?php if(isset($_GET['error'])): ?>
     <div class="alert alert-danger">
      <?php echo $_GET['error']; ?>
     </div>
     <?php endif; ?>
     <div class="card-body">
      <table class="table">
       <tr>
        <th>Profile </th>
        <td>
         <img src="_actions/profile/<?= $auth->profile; ?>" alt="" width="100px">
        </td>
       </tr>
       <tr>
        <th>ID</th>
        <td><?= $auth->id; ?></td>
       </tr>
       <tr>
        <th>User Name</th>
        <td><?= $auth->user_name; ?></td>
       </tr>
       <tr>
        <th>User Email</th>
        <td><?= $auth->email; ?></td>
       </tr>
       <tr>
        <th>User Status</th>
        <td><?= $auth->status; ?></td>

       </tr>
       <tr>
        <th>User Created At</th>
        <td><?= $auth->created_at; ?></td>
       </tr>
       <tr>
        <th>User Updated At</th>
        <td><?= $auth->updated_at; ?></td>
       </tr>
      </table>
     </div>
    </div>
   </div>

   <div class="col-md-4">
    <div class="card">
     <div class="card-header">
      <h3>Update Profile</h3>
     </div>
     <div class="card-body">
      <form action="_actions/profile_update.php" method="post" enctype="multipart/form-data">
       <!-- id -->
       <input type="hidden" name="id" value="<?= $auth->id; ?>">
       <div class="form-group">
        <!-- profile image update  -->
        <label for="profile_image">Profile Image</label>
        <input type="file" name="profile" id="profile_image" class="form-control">

       </div>
       <!-- submit  -->
       <div class="form-group mt-5">
        <input type="submit" value="Update Profile" class="btn btn-primary">
       </div>
      </form>
     </div>
    </div>
   </div>
  </div>
 </div>

 <?php 
 include('layouts/footer.php')
 ?>