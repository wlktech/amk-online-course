<?php 
include "../vendor/autoload.php";
use App\WlkOnlineShop\Databases\Connection;
use App\WlkOnlineShop\Databases\UserModel;
use App\WlkOnlineShop\Databases\RoleModel;

$db = new UserModel(new Connection);
$users = $db->GetAllUsers();

$role_db = new RoleModel(new Connection);
$roles = $role_db->getAllRole();


?>

<?php 
include "layouts/head.php";
?>
<link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/tables/datatable/datatables.min.css">
<link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/tables/extensions/autoFill.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/tables/extensions/colReorder.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/tables/extensions/fixedColumns.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/tables/datatable/select.dataTables.min.css">

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
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">AutoFill Datatable</h3>
                        <div class="row breadcrumbs-top d-inline-block">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">DataTables</a>
                                    </li>
                                    <li class="breadcrumb-item active">AutoFill Datatable
                                    </li>
                                </ol>
                            </div>
                        </div>
                </div>
                <div class="content-header-right col-md-6 col-12">
                    <div class="btn-group float-md-right">
                        <button class="btn btn-info dropdown-toggle mb-1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                        <div class="dropdown-menu arrow"><a class="dropdown-item" href="#"><i class="fa fa-calendar-check mr-1"></i> Calender</a><a class="dropdown-item" href="#"><i class="fa fa-cart-plus mr-1"></i> Cart</a><a class="dropdown-item" href="#"><i class="fa fa-life-ring mr-1"></i> Support</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="fa fa-cog mr-1"></i> Settings</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- eCommerce statistic -->
                <section id="autofill">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Auto Fill</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <p class="card-text">
                                            <!-- msg session alert -->
                                            <?php if(isset($_GET['msg'])){ ?>
                                                <div class="alert alert-success alert-dismissible fade show">
                                                    <strong>Success!</strong><?= $_GET['msg'] ?>
                                                    <button type="button" class="close" data-dismiss="alert">
                                                        <span>&times;</span>
                                                    </button>
                                                </div>
                                                <?php unset($_SESSION['msg']) ?>
                                            <?php } ?>
                                            <!-- msg session alert -->
                                        </p>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered auto-fill">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>UserName</th>
                                                        <th>Role</th>
                                                        <th>Profile</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $no=1;
                                                    foreach($users as $user){ ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $user->user_name ?></td>
                                                        <td>
                                                            <span class="badge badge-primary">
                                                                <?= $user->role ?>
                                                            </span>
                                                            <?php if($auth->value==1){ ?>
                                                            <span>
                                                                <form action="../_actions/change_role.php" method="post">
                                                                    <input type="hidden" name="id" value="<?= $user->id ?>">
                                                                    <select name="role_id" class="form-control">
                                                                        <?php foreach($roles as $role){ ?>
                                                                            <option value="<?= $role->id ?>" <?php if($user->role_id == $role->id){ echo "selected"; } ?>><?= $role->name ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                    <button class="btn btn-sm btn-success">Change Role</button>
                                                                </form>
                                                            </span>
                                                            <?php } ?>
                                                        </td>
                                                        <td><img src="../_actions/profile/<?= $user->profile_img ?>" width="50px" alt=""></td>
                                                        <td>
                                                            <?php if($user->status=="approved"){ ?>
                                                                <span class="badge badge-success">Active</span>
                                                                <?php if($auth->value==1){ ?>
                                                                <span class="btn">
                                                                    <form action="../_actions/user_ban.php" method="post">
                                                                        <input type="hidden" name="id" value="<?= $user->id ?>">
                                                                        <input type="hidden" name="status" value="pending">
                                                                        <button type="submit" class="btn btn-sm btn-primary">User Ban</button>
                                                                    </form>
                                                                </span>
                                                                <?php } ?>  
                                                            <?php }else{ ?> 
                                                                <span class="badge badge-warning">Pending . . .</span> 
                                                                <?php if($auth->value==1){ ?>
                                                                <span class="btn">
                                                                    <form action="../_actions/approve.php" method="post">
                                                                        <input type="hidden" name="id" value="<?= $user->id ?>">
                                                                        <input type="hidden" name="status" value="approved">
                                                                        <button type="submit" class="btn btn-sm btn-primary">Approve</button>
                                                                    </form>
                                                                </span> 
                                                                <?php } ?> 
                                                            <?php } ?>
                                                        </td>
                                                        <td>
                                                            <a href="user_show.php?id=<?= $user->id ?>" class="btn btn-sm btn-success">Show</a>
                                                            <?php if($auth->value == 1){ ?>
                                                            <a href="../_actions/user_delete.php?id=<?= $user->id ?>" class="btn btn-sm btn-danger">Delete</a>
                                                            <?php } ?>
                                                            
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>UserName</th>
                                                        <th>Role</th>
                                                        <th>Profile</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
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
<script src="./app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
<script src="./app-assets/vendors/js/tables/datatable/dataTables.autoFill.min.js"></script>
<script src="./app-assets/vendors/js/tables/datatable/dataTables.colReorder.min.js"></script>
<script src="./app-assets/vendors/js/tables/datatable/dataTables.fixedColumns.min.js"></script>
<script src="./app-assets/vendors/js/tables/datatable/dataTables.select.min.js"></script>
<script src="./app-assets/js/scripts/tables/datatables-extensions/datatable-autofill.js"></script>