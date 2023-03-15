<?php include('layouts/head.php'); ?>

<body>
 <?php include('layouts/navbar.php'); ?>
 <div class="container">
  <div class="row">
   <div class="col-md-8">
    <div class="card mt-5">
     <div class="card-header">
      <h3>Login</h3>
     </div>
     <div class="card-body">
      <!-- reg_form -->
      <form action="_actions/login.php" method="post">
       <!-- user_name -->

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
        <button type="submit" class="btn btn-primary">Login</button>
       </div>
      </form>
     </div>
    </div>
   </div>
  </div>
 </div>
 <?php include('layouts/footer.php'); ?>