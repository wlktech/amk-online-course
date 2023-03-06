<?php 
include "../vendor/autoload.php";
use App\WlkOnlineShop\Databases\Connection;
use App\WlkOnlineShop\Databases\ProductModel;

$id = $_GET['id'];
$db = new ProductModel(new Connection);
$product = $db->GetProductById($id);


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
                                    <h4 class="card-title">Product Detail <a href="product_index.php" class="btn btn-primary">Back</a></h4>
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
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <td><?= $product->id ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Product Name</th>
                                                        <td><?= $product->product_name ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Product Category</th>
                                                        <td><?= $product->category_name ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Product Price</th>
                                                        <td><?= $product->price ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Product Old Price</th>
                                                        <td><?= $product->old_price ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Product Description</th>
                                                        <td><?= $product->description ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Product Image</th>
                                                        <td><img src="../_actions/product_image/<?= $product->file_name ?>" width="100px" alt=""></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Created At</th>
                                                        <td><?= date("d-M-Y", strtotime($product->created_at)) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Updated At</th>
                                                        <td><?= date("d-M-Y", strtotime($product->updated_at)) ?></td>
                                                    </tr>
                                                </thead>
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


<!-- Modal -->
<div class="modal fade" id="productCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Product Create</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- product create form -->
    
    </div>
  </div>
</div>