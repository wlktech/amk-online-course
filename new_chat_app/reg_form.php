<?php include('layouts/head.php'); ?>

<body>
 <?php include('layouts/navbar.php'); ?>
 <div class="container">
  <div class="row">
   <div class="col-md-8">
    <div class="card mt-5">
     <div class="card-header">
      <h3>Register</h3>
     </div>
     <div class="card-body">
      <!-- reg_form -->
      <form action="_actions/user_create.php" method="post">
       <!-- user_name -->
       <div class="form-group mt-3">
        <label for="user_name">User Name</label>
        <input type="text" name="user_name" id="user_name" class="form-control">
       </div>
       <!-- email -->
       <div class="form-group mt-3">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control">
       </div>
       <!-- password -->
       <div class="form-group mt-3">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control">
       </div>
       <!-- submit button -->
       <div class="form-group mt-3">
        <button type="submit" class="btn btn-primary">Register</button>
       </div>
      </form>
     </div>
    </div>
   </div>
  </div>
 </div>
 <?php include('layouts/footer.php'); ?>