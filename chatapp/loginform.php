<?php 
session_start();
if(isset($_SESSION['user'])){
    header("location: ./profile.php");
}



include "./layouts/head.php";
// include "./layouts/navbar.php";

?>
    
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card p-4" style="margin-top:20%;">
                <?php if(isset($_SESSION['expire'])){
                    $diff = time() - $_SESSION['expire'];
                    if($diff > 2){
                        unset($_SESSION['msg']);
                        unset($_SESSION['expire']);
                    }
                }
                ?>
                <?php if(isset($_SESSION['msg'])){ ?>   
                    <div class="alert alert-success alert-dismissible fade show py-3" role="alert">

                <?php echo $_SESSION['msg'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php }?>
                <h4 class="mb-5"><i class="fas fa-unlock me-2"></i>Login</h4>
                <form action="./controllers/UserController.php" method="post">
                    
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                        <label for="email">Email address</label>
                        <?php 
                        if(isset($_SESSION['v-email'])):
                        ?>
                        <p class="text-danger"><?= $_SESSION['v-email'] ?></p>
                        <?php endif ?>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        <label for="password">Password</label>
                        <?php 
                        if(isset($_SESSION['v-password'])):
                        ?>
                        <p class="text-danger"><?= $_SESSION['v-password'] ?></p>
                        <?php endif ?>
                    </div>
                    <div class="mb-3 pt-3 text-end">
                        <input type="hidden" name="action" value="login">
                        <button class="btn btn-dark" type="submit"><i class="fas fa-unlock me-2"></i>Login</button>
                        <button class="btn btn-dark" type="reset"><i class="fas fa-rotate me-2"></i>Reset</button>
                    </div>
                    <p>Are you a New User? Please <a href="registerform.php" class=" text-muted">Register Here</a></p>
                </form>
            </div>
        </div>
    </div>
</div>






<?php 
include "./layouts/footer.php";
?>