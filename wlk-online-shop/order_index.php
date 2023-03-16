<?php 
include("vendor/autoload.php");
// use App\WlkOnlineShop\Databases\CountryModel;
// use App\WlkOnlineShop\Databases\StateModel;
use Helpers\Auth;
use Helpers\HTTP;

// $countries = CountryModel::CountryOptions();
// $states = StateModel::StateOptions();

$auth = Auth::check();

if(!isset($auth)){
    HTTP::redirect('login_form.php');
}

if(isset($_SESSION['cart'])){
    $carts = $_SESSION['cart'];
}



?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui"
    />
    <meta
      name="description"
      content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard."
    />
    <meta
      name="keywords"
      content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard"
    />
    <meta name="author" content="PIXINVENT" />
    <title>
      Shopping Cart - Modern Admin - Clean Bootstrap 4 Dashboard HTML Template +
      Bitcoin Dashboard
    </title>
    <link
      rel="apple-touch-icon"
      href="./admin/app-assets/images/ico/apple-icon-120.png"
    />
    <link
      rel="shortcut icon"
      type="image/x-icon"
      href="./admin/app-assets/images/ico/favicon.ico"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700"
      rel="stylesheet"
    />

    <!-- BEGIN: Vendor CSS-->
    <link
      rel="stylesheet"
      type="text/css"
      href="./admin/app-assets/vendors/css/vendors.min.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="./admin/app-assets/vendors/css/forms/icheck/icheck.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="./admin/app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css"
    />
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link
      rel="stylesheet"
      type="text/css"
      href="./admin/app-assets/css/bootstrap.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="./admin/app-assets/css/bootstrap-extended.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="./admin/app-assets/css/colors.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="./admin/app-assets/css/components.css"
    />
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link
      rel="stylesheet"
      type="text/css"
      href="./admin/app-assets/css/core/menu/menu-types/vertical-menu-modern.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="./admin/app-assets/css/core/colors/palette-gradient.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="./admin/app-assets/css/pages/ecommerce-cart.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="./admin/app-assets/css/plugins/forms/checkboxes-radios.css"
    />
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link
      rel="stylesheet"
      type="text/css"
      href="admin/assets/css/style.css"
    />
    <!-- END: Custom CSS-->
  </head>
<body class="horizontal-layout horizontal-menu horizontal-menu-padding 2-columns  " data-open="click"
 data-menu="horizontal-menu" data-col="2-columns">

 <?php 
 include('includes/navbar.php');
 ?>
 <div
  class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-dark navbar-without-dd-arrow navbar-shadow"
  role="navigation" data-menu="menu-wrapper">
  <div class="navbar-container main-menu-content container center-layout" data-menu="menu-container">
   <?php 
   include('includes/topsidebar.php');
   ?>
  </div>
 </div>

 <!-- END: Main Menu-->
 <!-- BEGIN: Content-->

 <div class="app-content container center-layout mt-2">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Shopping Cart</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Shopping Cart
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12">
                    <div class="btn-group float-md-right">
                        <button class="btn btn-info dropdown-toggle mb-1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                        <div class="dropdown-menu arrow"><a class="dropdown-item" href="index.php"><i class="fas fa-cart mr-1"></i> Shop</a><a class="dropdown-item" href="#"><i class="fa fa-cart-plus mr-1"></i> Cart</a><a class="dropdown-item" href="#"><i class="fa fa-life-ring mr-1"></i> Support</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="fa fa-cog mr-1"></i> Settings</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <div class="shopping-cart">
                    <ul class="nav nav-tabs nav-justified">
                        <li class="nav-item">
                            <a class="nav-link active" id="shopping-cart" data-toggle="tab" aria-controls="shop-cart-tab" href="#shop-cart-tab" aria-expanded="true">Shopping Cart</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="checkout" data-toggle="tab" aria-controls="checkout-tab" href="#checkout-tab" aria-expanded="false">Checkout</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="complete-order" data-toggle="tab" aria-controls="comp-order-tab" href="#comp-order-tab" aria-expanded="false">Complete Order</a>
                        </li>
                    </ul>
                    <div class="tab-content pt-1">
                        <div role="tabpanel" class="tab-pane active" id="shop-cart-tab" aria-expanded="true" aria-labelledby="shopping-cart">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-borderless mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Product</th>
                                                        <th>Details</th>
                                                        <th>No. Of Products</th>
                                                        <th>Total</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if(isset($carts)): ?>
                                                    <?php foreach($carts as $product){ ?>
                                                        <?php 
                                                        $total = $product['quantity'] * $product['price'];
                                                        ?>
                                                    <tr>
                                                        <td>
                                                            <div class="product-img d-flex align-items-center">
                                                                <img class="img-fluid" src="<?= $product['file_name'] ?>" alt="Card image cap">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="product-title"><?= $product['product_name'] ?></div>
                                                            <div class="product-color"><strong>Color : </strong> Pink</div>
                                                            <div class="product-size"><strong>Size : </strong> Medium</div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group">
                                                                <form method="post">
                                                                    <input type="hidden" name="product_id" value="<?=$product['product_id']?>" />
                                                                    <input type="text" class="text-center count touchspin" name="quantity"
                                                                    value="<?= $product['quantity']?>" />
                                                                    <button type="submit" name="update" class="btn btn-sm btn-info">
                                                                    <i class="ft-refresh-cw"></i>
                                                                    </button>
                                                                </form>
                                                                <?php 
                                                                if(isset($_POST['update'])) {
                                                                foreach($_SESSION['cart'] as $key => $value) {
                                                                    if($value['product_id'] == $_POST['product_id']) {
                                                                    $_SESSION['cart'][$key]['quantity'] = $_POST['quantity'];
                                                                    echo "<script>window.location.href='order_index.php'</script>";
                                                                    }
                                                                }
                                                                }
                                                                ?>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="total-price">$ <?= $total; ?></div>
                                                        </td>
                                                        <td>
                                                            <?php 
                                                            if(isset($_POST['remove'])){
                                                                foreach($_SESSION['cart'] as $key => $value){
                                                                    if($value['product_id'] == $_POST['product_id']){
                                                                        unset($_SESSION['cart'][$key]);
                                                                        
                                                                    }
                                                                }
                                                                echo "<meta http-equiv='refresh' content='0'>";
                                                            }
                                                            ?>
                                                            <div class="product-action">
                                                                <!-- <a href="#"><i class="ft-trash-2"></i></a> -->
                                                                <form action="order_index.php" method="post">
                                                                    <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
                                                                    <button type="submit" class="btn btn-sm btn-danger" name="remove"><i class="ft-trash-2"></i></button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                    <?php endif ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row match-height">
                                <div class="col-lg-6 col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Apply Coupon</h4>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body">
                                                <label class="text-muted">Enter your coupon code if you have one!</label>
                                                <form action="#">
                                                    <div class="form-body">
                                                        <input type="text" class="form-control" placeholder="Enter Coupon Code Here">
                                                    </div>
                                                    <div class="form-actions border-0 pb-0 text-right">
                                                        <button type="button" class="btn btn-info">Apply Code</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Price Details</h4>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body">
                                            <?php if(isset($carts)): ?>
                                                <div class="price-detail">Price :(<strong><?= count($carts) ?></strong> items) 
                                                    <span class="float-right">
                                                        
                                                    <?php
                                                            if(is_array($carts)){
                                                                $total_item = 0;
                                                                foreach($carts as $product){
                                                                    $total_item += ($product['quantity'] * $product['price']);
                                                                }
                                                                
                                                            }else{
                                                                $total_item=0;
                                                            }
                                                            ?>
                                                            $ <?= $total_item ?>
                                                            
                                                    </span>
                                                </div>
                                                    <div class="price-detail">Delivery Charges <span class="float-right">$100</span></div>
                                                    <div class="price-detail">TAX / VAT <span class="float-right">$0</span></div>
                                                    <hr>
                                                    <div class="price-detail">Payable Amount <span class="float-right">$<?= $total_item+100+0 ?></span></div>
                                                    <div class="total-savings">Your Total Savings on this order $<?= $total_item+100+0 ?></div>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form action="#">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <div class="text-right">
                                                        <a href="ecommerce-checkout.html" class="btn btn-info mr-2">Continue Shopping</a>
                                                        <a href="ecommerce-checkout.html" class="btn btn-warning">Place Order</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="checkout-tab" aria-labelledby="checkout">
                            <div class="row">
                                <div class="col-md-4 order-md-2 mb-4">
                                    <div class="card">
                                        <div class="card-header mb-3">
                                            <h4 class="card-title">Your cart (4)</h4>
                                        </div>
                                        <div class="card-content">
                                            <ul class="list-group mb-3">
                                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                                    <div>
                                                        <h6 class="my-0">Fitbit Alta HR Special Edition x 1</h6>
                                                        <small class="text-muted">Brief description</small>
                                                    </div>
                                                    <span class="text-muted">$250</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                                    <div>
                                                        <h6 class="my-0">Mackbook pro 19'' x 1</h6>
                                                        <small class="text-muted">Brief description</small>
                                                    </div>
                                                    <span class="text-muted">$1150</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                                    <div>
                                                        <h6 class="my-0">VR Headset x 2</h6>
                                                        <small class="text-muted">Brief description</small>
                                                    </div>
                                                    <span class="text-muted">$700</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                                    <div>
                                                        <h6 class="my-0">Smart Watch with LED x 1</h6>
                                                        <small class="text-muted">Brief description</small>
                                                    </div>
                                                    <span class="text-muted">$700</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between">
                                                    <span class="product-name"><strong>Cart Subtotal</strong></span>
                                                    <span class="product-price"><strong>$2800</strong></span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between">
                                                    <div class="text-success">
                                                        <h6 class="my-0">Promo code</h6>
                                                        <small>EXAMPLECODE</small>
                                                    </div>
                                                    <span class="text-success">-$200</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between">
                                                    <span class="product-name">Shipping &amp; Handling</span>
                                                    <span class="product-price">$100</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between">
                                                    <span class="product-name">TAX / VAT</span>
                                                    <span class="product-price">$0</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between">
                                                    <span class="product-name success">Order Total</span>
                                                    <span class="product-price">$2700</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <form class="card p-2">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Promo code">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-secondary">Redeem</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-8 order-md-1">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Billing address</h4>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body">
                                                
                                                    <div class="mb-3">
                                                        <label for="username">Username</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">@</span>
                                                            </div>
                                                            <input type="text" class="form-control" id="username" placeholder="Username" required="" value="<?= $auth->user_name ?>">
                                                            <div class="invalid-feedback">
                                                                Your username is required.
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="email">Email <span class="text-muted">(Optional)</span></label>
                                                        <input type="email" class="form-control" id="email" placeholder="you@example.com" value="<?= $auth->email ?>">
                                                        <div class="invalid-feedback">
                                                            Please enter a valid email address for shipping updates.
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="address">Address</label>
                                                        <input type="text" class="form-control" id="address" placeholder="1234 Main St" required="" value="<?= $auth->address ?>">
                                                        <div class="invalid-feedback">
                                                            Please enter your shipping address.
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                                                        <input type="text" class="form-control" id="address2" placeholder="Apartment or suite" value="<?= $auth->fix_address ?>">
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-5 mb-3">
                                                            <label for="country">Country</label>
                                                            <select class="custom-select d-block w-100" id="country" required="">
                                                                <option value=""><?= $auth->country ?></option>
                                                                
                                                            </select>
                                                            <div class="invalid-feedback">
                                                                Please select a valid country.
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 mb-3">
                                                            <label for="state">State</label>
                                                            <select class="custom-select d-block w-100" id="state" required="">
                                                                <option value=""><?= $auth->state ?></option>
                                                                <option>California</option>
                                                            </select>
                                                            <div class="invalid-feedback">
                                                                Please provide a valid state.
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 mb-3">
                                                            <label for="zip">Zip</label>
                                                            <input type="text" class="form-control" id="zip" placeholder="" required="">
                                                            <div class="invalid-feedback">
                                                                Zip code required.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr class="mb-2">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="same-address" checked>
                                                        <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="save-info" checked>
                                                        <label class="custom-control-label" for="save-info">Save this information for next time</label>
                                                    </div>
                                                    <hr class="mt-2 mb-4">

                                                    <h4 class="mb-1">Payment</h4>
                                                <form class="needs-validation" action="_actions/order_create.php" method="post" novalidate="">
                                                    <div class="d-block my-2">
                                                        <div class="custom-control custom-radio">
                                                            <input id="credit" name="payment_method" type="radio" class="custom-control-input" checked="" required="" value="Credit card">
                                                            <label class="custom-control-label" for="credit">Credit card</label>
                                                        </div>
                                                        <div class="custom-control custom-radio">
                                                            <input id="debit" name="payment_method" type="radio" class="custom-control-input" required="" value="Debit card">
                                                            <label class="custom-control-label" for="debit">Debit card</label>
                                                        </div>
                                                        <div class="custom-control custom-radio">
                                                            <input id="paypal" name="payment_method" type="radio" class="custom-control-input" required="">
                                                            <label class="custom-control-label" for="paypal">Paypal</label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <label for="cc-name">Name on card</label>
                                                            <input type="text" class="form-control" id="cc-name" name="card_name" placeholder="" required="">
                                                            <small class="text-muted">Full name as displayed on card</small>
                                                            <div class="invalid-feedback">
                                                                Name on card is required
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="cc-number">Credit card number</label>
                                                            <input type="text" class="form-control" id="cc-number" name="card_no" placeholder="" required="">
                                                            <div class="invalid-feedback">
                                                                Credit card number is required
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3 mb-3">
                                                            <label for="cc-expiration">Expiration</label>
                                                            <input type="text" class="form-control" id="cc-expiration" name="exp_date" placeholder="" required="">
                                                            <div class="invalid-feedback">
                                                                Expiration date required
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 mb-3">
                                                            <label for="cc-expiration">CVV</label>
                                                            <input type="text" class="form-control" id="cc-cvv" name="cvv_no" placeholder="" required="">
                                                            <div class="invalid-feedback">
                                                                Security code required
                                                            </div>
                                                        </div>
                                                        <?php if(isset($_SESSION['cart'])): ?>
                                                        
                                                        <?php foreach($_SESSION['cart'] as $key->$value): ?>
                                                            <input type="hidden" name="product_id[]" value="<?= $value['product_id'] ?>">
                                                            <input type="hidden" name="price[]" value="<?= $value['price'] ?>">
                                                            <input type="hidden" name="quantity[]" value="<?= $value['quantity'] ?>">
                                                            <input type="hidden" name="total_price[]" value="<?= $value['price']*$value['quantity'] ?>">
                                                        <?php endforeach ?>
                                                        <?php endif ?>
                                                    </div>
                                                    <button class="btn btn-info btn-lg" type="submit">Continue to checkout</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="comp-order-tab" aria-labelledby="complete-order">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title text-center">Thank you. Your order has been processed.</h4>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-around lh-condensed">
                                            <div class="order-details text-center">
                                                <div class="order-title">Order Number</div>
                                                <div class="order-info">#CV45632</div>
                                            </div>
                                            <div class="order-details text-center">
                                                <div class="order-title">Date</div>
                                                <div class="order-info">10<sup>th</sup> Oct, 2018</div>
                                            </div>
                                            <div class="order-details text-center">
                                                <div class="order-title">Amount Paid</div>
                                                <div class="order-info">$2550</div>
                                            </div>
                                            <div class="order-details text-center">
                                                <div class="order-title">Payment Method</div>
                                                <div class="order-info">Credit Card</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="mb-0"><strong>My Orders</strong></h4>
                                </div>
                            </div>
                            <div class="card pull-up">
                                <div class="card-header">
                                    <div class="float-left">
                                        <a href="#" class="btn btn-info">#CV45632</a>
                                    </div>
                                    <div class="float-right">
                                        <a href="#" class="btn btn-outline-info mr-1"><i class="la la-question"></i> Need Help</a>
                                        <a href="#" class="btn btn-outline-info"><i class="la la-map-marker"></i> Track</a>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="card-body py-0">
                                        <div class="d-flex justify-content-between lh-condensed">
                                            <div class="order-details text-center">
                                                <div class="product-img d-flex align-items-center">
                                                    <img class="img-fluid" src="./admin/app-assets/images/elements/fitbit-watch.png" alt="Card image cap">
                                                </div>
                                            </div>
                                            <div class="order-details">
                                                <h6 class="my-0">Fitbit Alta HR Special Edition x 1</h6>
                                                <small class="text-muted">Brief description</small>
                                            </div>
                                            <div class="order-details">
                                                <div class="order-info">$250</div>
                                            </div>
                                            <div class="order-details">
                                                <h6 class="my-0">Delivered on Sun, Oct 15th 2018</h6>
                                                <small class="text-muted">Brief description</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
                                    <span class="float-left">
                                        <span class="text-muted">Ordered On</span>
                                        <strong>Wed, Oct 3rd 2018</strong>
                                    </span>
                                    <span class="float-right">
                                        <span class="text-muted">Ordered Amount</span>
                                        <strong>$250</strong>
                                    </span>
                                </div>
                            </div>
                            <div class="card pull-up">
                                <div class="card-header">
                                    <div class="float-left">
                                        <a href="#" class="btn btn-info">#CV65472</a>
                                    </div>
                                    <div class="float-right">
                                        <a href="#" class="btn btn-outline-info mr-1"><i class="la la-question"></i> Need Help</a>
                                        <a href="#" class="btn btn-outline-info"><i class="la la-map-marker"></i> Track</a>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="card-body py-0">
                                        <div class="d-flex justify-content-between lh-condensed">
                                            <div class="order-details text-center">
                                                <div class="product-img d-flex align-items-center">
                                                    <img class="img-fluid" src="./admin/app-assets/images/elements/13.png" alt="Card image cap">
                                                </div>
                                            </div>
                                            <div class="order-details">
                                                <h6 class="my-0">Mackbook pro 19'' x 1</h6>
                                                <small class="text-muted">Brief description</small>
                                            </div>
                                            <div class="order-details">
                                                <div class="order-info">$1150</div>
                                            </div>
                                            <div class="order-details">
                                                <h6 class="my-0">Delivered on Mon, Oct 16th 2018</h6>
                                                <small class="text-muted">Brief description</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
                                    <span class="float-left">
                                        <span class="text-muted">Ordered On</span>
                                        <strong>Wed, Oct 3rd 2018</strong>
                                    </span>
                                    <span class="float-right">
                                        <span class="text-muted">Ordered Amount</span>
                                        <strong>$1150</strong>
                                    </span>
                                </div>
                            </div>
                            <div class="card pull-up">
                                <div class="card-header">
                                    <div class="float-left">
                                        <a href="#" class="btn btn-info">#CV78645</a>
                                    </div>
                                    <div class="float-right">
                                        <a href="#" class="btn btn-outline-info mr-1"><i class="la la-question"></i> Need Help</a>
                                        <a href="#" class="btn btn-outline-info"><i class="la la-map-marker"></i> Track</a>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="card-body py-0">
                                        <div class="d-flex justify-content-between lh-condensed">
                                            <div class="order-details text-center">
                                                <div class="product-img d-flex align-items-center">
                                                    <img class="img-fluid" src="./admin/app-assets/images/elements/vr.png" alt="Card image cap">
                                                </div>
                                            </div>
                                            <div class="order-details">
                                                <h6 class="my-0">VR Headset x 2</h6>
                                                <small class="text-muted">Brief description</small>
                                            </div>
                                            <div class="order-details">
                                                <div class="order-info">$700</div>
                                            </div>
                                            <div class="order-details">
                                                <h6 class="my-0">Delivered on Tue, Oct 17th 2018</h6>
                                                <small class="text-muted">Brief description</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
                                    <span class="float-left">
                                        <span class="text-muted">Ordered On</span>
                                        <strong>Wed, Oct 3rd 2018</strong>
                                    </span>
                                    <span class="float-right">
                                        <span class="text-muted">Ordered Amount</span>
                                        <strong>$700</strong>
                                    </span>
                                </div>
                            </div>
                            <div class="card pull-up">
                                <div class="card-header">
                                    <div class="float-left">
                                        <a href="#" class="btn btn-info">#CV84123</a>
                                    </div>
                                    <div class="float-right">
                                        <a href="#" class="btn btn-outline-info mr-1"><i class="la la-question"></i> Need Help</a>
                                        <a href="#" class="btn btn-outline-info"><i class="la la-map-marker"></i> Track</a>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="card-body py-0">
                                        <div class="d-flex justify-content-between lh-condensed">
                                            <div class="order-details text-center">
                                                <div class="product-img d-flex align-items-center">
                                                    <img class="img-fluid" src="./admin/app-assets/images/carousel/25.jpg" alt="Card image cap">
                                                </div>
                                            </div>
                                            <div class="order-details">
                                                <h6 class="my-0">Smart Watch with LED x 1</h6>
                                                <small class="text-muted">Brief description</small>
                                            </div>
                                            <div class="order-details">
                                                <div class="order-info">$700</div>
                                            </div>
                                            <div class="order-details">
                                                <h6 class="my-0">Delivered on Wed, Oct 18th 2018</h6>
                                                <small class="text-muted">Brief description</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
                                    <span class="float-left">
                                        <span class="text-muted">Ordered On</span>
                                        <strong>Wed, Oct 3rd 2018</strong>
                                    </span>
                                    <span class="float-right">
                                        <span class="text-muted">Ordered Amount</span>
                                        <strong>$700</strong>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <!-- END: Content-->

 <div class="sidenav-overlay"></div>
 <div class="drag-target"></div>

 <!-- BEGIN: Footer-->
 <footer
      class="footer footer-static footer-light navbar-border navbar-shadow"
    >
      <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
        <span class="float-md-left d-block d-md-inline-block"
          >Copyright &copy; 2019
          <a
            class="text-bold-800 grey darken-2"
            href="https://1.envato.market/modern_admin"
            target="_blank"
            >PIXINVENT</a
          ></span
        ><span class="float-md-right d-none d-lg-block"
          >Hand-crafted & Made with<i class="ft-heart pink"></i
          ><span id="scroll-top"></span
        ></span>
      </p>
    </footer>
    <!-- END: Footer-->

    <!-- BEGIN: Vendor JS-->
    <script src="admin/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="admin/app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js"></script>
    <script src="admin/app-assets/vendors/js/forms/icheck/icheck.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="admin/app-assets/js/core/app-menu.js"></script>
    <script src="admin/app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="admin/app-assets/js/scripts/pages/ecommerce-cart.js"></script>
    <!-- END: Page JS-->
    