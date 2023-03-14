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
                <div class="card-header">User Profile</div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Profile Image</th>
                            <td><img src="profiles/<?= $auth['profile'] ?>" width="50px" alt="<?= $auth['profile'] ?>">
                            <form action="./controllers/UserController.php" class="d-inline float-end" method="post">
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
                                <span class="badge text-bg-primary"><?= $auth['status'] == 0 ? 'offline' : 'online' ?></span>
                            </td>
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