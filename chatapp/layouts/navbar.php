<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="index.php"><i class="fas fa-message me-2 text-primary"></i>ChatApp</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Chat Room</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php if(isset($_SESSION['user'])){
              echo $_SESSION['user']['username'];
            ?>
            <img src="profiles/<?= $_SESSION['user']['profile'] ?>" width="30px" height="30px" alt="" class="rounded-circle">
            <?php
            }else{
              echo "Account";
            } ?>
          </a>
          <ul class="dropdown-menu">
            <?php if(!isset($_SESSION['user'])): ?>
            <li><a class="dropdown-item" href="registerform.php">Register</a></li>
            <li><a class="dropdown-item" href="loginform.php">Login</a></li>
            <?php endif ?>
            <?php if(isset($_SESSION['user'])): ?>
            <li><a class="dropdown-item" href="profile.php">User Profile</a></li>
            <li><a class="dropdown-item" href="./controllers/UserController.php?action=logout">Logout</a></li>
            <?php endif ?>
          </ul>
        </li>
        
      </ul>
    </div>
  </div>
</nav>