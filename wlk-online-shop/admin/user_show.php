<?php 
include "../vendor/autoload.php";
use App\WlkOnlineShop\Databases\Connection;
use App\WlkOnlineShop\Databases\UserModel;

$db = new UserModel(new Connection);
$id = $_GET['id'];
$user = $db->GetUser($id);
?>
<?php 

include "layouts/head.php";


?>

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

<?php 

include "layouts/navbar.php";
include "layouts/sidebar.php";

?>


    
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- eCommerce statistic -->
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <td><?= $user->id ?></td>
                        </tr>
                        <tr>
                            <th>Username</th>
                            <td><?= $user->user_name ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?= $user->email ?></td>
                        </tr>
                        <tr>
                            <th>Role</th>
                            <td>
                                <?php if($user->role_id == 1){ ?>
                                <span class="badge badge-primary"><?= "Admin" ?></span>
                                <?php }else if($user->role_id == 2){ ?>
                                <span class="badge badge-primary"><?= "User" ?></span>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td><?= $user->phone ?></td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td><?= $user->address ?></td>
                        </tr>
                        <tr>
                            <th>Fix Address</th>
                            <td><?= $user->fix_address ?></td>
                        </tr>
                        <tr>
                            <th>Profile Image</th>
                            <td><img src="../_actions/profile/<?= $user->profile_img ?>" width="50px" alt=""></td>
                        </tr>
                        <tr>
                            <th>Company</th>
                            <td><?= $user->company ?></td>
                        </tr>
                        <tr>
                            <th>Bio</th>
                            <td><?= $user->bio ?></td>
                        </tr>
                        <tr>
                            <th>Birth Date</th>
                            <td><?= $user->birth_date ?></td>
                        </tr>
                        <tr>
                            <th>Favorite Music</th>
                            <td><?= $user->fav_music ?></td>
                        </tr>
                        <tr>
                            <th>Favorite Movie</th>
                            <td><?= $user->fav_movie ?></td>
                        </tr>
                        <tr>
                            <th>Country</th>
                            <td><?= $user->country ?></td>
                        </tr>
                        <tr>
                            <th>State</th>
                            <td><?= $user->state ?></td>
                        </tr>
                        <tr>
                            <th>Language</th>
                            <td><?= $user->language ?></td>
                        </tr>
                        <tr>
                            <th>Website</th>
                            <td><?= $user->website ?></td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td><span class="badge badge-primary"><?= $user->status ?></span></td>
                        </tr>
                        <tr>
                            <th>Created At</th>
                            <td><?= date("Y-M-d", strtotime($user->created_at)); ?></td>
                        </tr>
                    </thead>
                </table>
                <!--/ Basic Horizontal Timeline -->
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

<?php 
include "layouts/footer.php";
include "layouts/scripts.php";

?>