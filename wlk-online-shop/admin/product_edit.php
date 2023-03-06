<?php 
include "../vendor/autoload.php";
use App\WlkOnlineShop\Databases\Connection;
use App\WlkOnlineShop\Databases\CategoryModel;
use App\WlkOnlineShop\Databases\ProductModel;

$db = new CategoryModel(new Connection);
$categories = $db->getAllCategory();

$id = $_GET['id'];
$product_db = new ProductModel(new Connection);
$product = $product_db->GetProductById($id);


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
                                    <h4 class="card-title">Product Edit <a href="product_index.php" class="btn btn-primary">Back</a></h4>
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
                                            <form action="../_actions/product_edit.php" method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="product" class="form-label">Product Name</label>
                                                    <input type="text" class="form-control" name="product_name" id="product" value="<?= $product->product_name ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="category_id" class="form-label">Category</label>
                                                    <select name="category_id" id="category_id" class="form-control">
                                                        <option value="">Choose Category</option>
                                                        <?php foreach($categories as $category){ ?>
                                                            <option value="<?= $category->id ?>" <?php if($category->id==$product->category_id){ echo "selected"; } ?>><?= $category->category_name ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="price" class="form-label">Product Price</label>
                                                    <input type="number" class="form-control" name="price" value="<?= $product->price ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="old_price" class="form-label">Product Old Price</label>
                                                    <input type="number" class="form-control" name="old_price" value="<?= $product->old_price ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="qty" class="form-label">Product Qty</label>
                                                    <input type="number" class="form-control" name="qty" value="<?= $product->qty ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="description" class="form-label">Product Description</label>
                                                    <textarea name="description" id="description" cols="30" rows="10" class="form-control"><?= $product->description ?></textarea>
                                                </div>
                                                
                                                </div>
                                                <input type="hidden" name="id" value="<?= $product->p_id ?>">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
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