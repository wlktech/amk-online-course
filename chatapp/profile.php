<?php 
session_start();
include("vendor/autoload.php");
// use Helpers\Auth;
// use Helpers\HTTP;

// if(!Auth::check()){
//     HTTP::redirect('../loginform.php');
// }
if(!isset($_SESSION['user'])){
    header("location: ../loginform.php");
}else{
    $auth = $_SESSION['user'];
}

include "./layouts/head.php";
include "./layouts/navbar.php";
?>   
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card mt-5">
            <?php if(isset($_SESSION['expire'])){
                $diff = time() - $_SESSION['expire'];
                if($diff > 2){
                    unset($_SESSION['msg']);
                    unset($_SESSION['expire']);
                }
            }
            ?>
            <?php if(isset($_SESSION['msg'])){ ?>   
                <div class="alert alert-success alert-dismissible fade show" role="alert">

            <?php echo $_SESSION['msg'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php }?>
                <div class="card-header">User Profile</div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Profile Image</th>
                            <td><img src="profiles/<?= $auth['profile'] ?>" width="100px" alt="<?= $auth['profile'] ?>">
                            <form action="./controllers/UserController.php" class="d-inline float-end" method="post" enctype="multipart/form-data">
                                <input style="width:100px;" class="" type="file" name="profile" id="profile">
                                <input type="hidden" name="id" value="<?= $auth['id'] ?>">
                                <input type="hidden" name="action" value="profileUpload">
                                <button type="submit" class="btn btn-sm btn-primary">Upload</button>
                            </form>
                            </td>
                        </tr>
                        <tr>
                            <th>Name:</th>
                            <td><?= $auth['username'] ?></td>
                        </tr>
                        <tr>
                            <th>Email Address:</th>
                            <td><?= $auth['email'] ?></td>
                        </tr>
                        <tr>
                            <th>Status:</th>
                            <td>
                                <?php if($auth['status']==0){ ?>
                                    <span class='badge text-bg-danger'>offline</span>
                                    <form class="d-inline" action="./controllers/UserController.php" method="post">
                                        <input type="hidden" name="id" value="<?= $auth['id'] ?>">
                                        <input type="hidden" name="status" value="1">
                                        <input type="hidden" name="action" value="statuschange">
                                        <button class="btn btn-sm btn-primary" type="submit">Change</button>
                                    </form>
                                <?php } else if($auth['status']==1){ ?>
                                    <span class='badge text-bg-success'>online</span>
                                    <form class="d-inline" action="./controllers/UserController.php" method="post">
                                        <input type="hidden" name="id" value="<?= $auth['id'] ?>">
                                        <input type="hidden" name="status" value="0">
                                        <input type="hidden" name="action" value="statuschange">
                                        <button class="btn btn-sm btn-primary" type="submit">Change</button>
                                    </form>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Created At:</th>
                            <td><?= $auth['created_at'] ?></td>
                        </tr>
                        <tr>
                            <th>Updated At:</th>
                            <td><?= $auth['updated_at'] ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>






<?php 
include "./layouts/footer.php";
?>