<?php 
include "vendor/autoload.php";
use App\WlkOnlineShop\Databases\CountryModel;
use App\WlkOnlineShop\Databases\StateModel;
use App\WlkOnlineShop\Databases\FavMovieModel;
use App\WlkOnlineShop\Databases\FavMusicModel;

$countries = CountryModel::CountryOptions();
$states = StateModel::StateOptions();
$movies = FavMovieModel::FavouriteMovieOptions();
$musics = FavMusicModel::FavouriteMusicOptions();
// echo "<pre>";
// print_r($state);
// echo "</pre>";

?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>Register with Background Color - Modern Admin - Clean Bootstrap 4 Dashboard HTML Template + Bitcoin Dashboard</title>
    <link rel="apple-touch-icon" href="./admin/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="./admin/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="./admin/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="./admin/app-assets/vendors/css/forms/icheck/icheck.css">
    <link rel="stylesheet" type="text/css" href="./admin/app-assets/vendors/css/forms/icheck/custom.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="./admin/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="./admin/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="./admin/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="./admin/app-assets/css/components.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="./admin/app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
    <link rel="stylesheet" type="text/css" href="./admin/app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="./admin/app-assets/css/pages/login-register.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 1-column  bg-full-screen-image blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
                            <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                                <div class="card-header border-0 pb-0">
                                    <div class="card-title text-center">
                                        <img src="./admin/app-assets/images/logo/logo-dark.png" alt="branding logo">
                                    </div>
                                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>Easily Using</span></h6>
                                </div>
                                <div class="card-content">
                                    <div class="text-center">
                                        <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-facebook"><span class="la la-facebook"></span></a>
                                        <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-twitter"><span class="la la-twitter"></span></a>
                                        <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-linkedin"><span class="la la-linkedin font-medium-4"></span></a>
                                        <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-github"><span class="la la-github font-medium-4"></span></a>
                                    </div>
                                    <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1"><span>OR Using
                                            Email</span></p>
                                    <div class="card-body">
                                        <form class="form-horizontal" action="_actions/user_create.php" method="post" novalidate>
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="text" class="form-control" id="user_name" placeholder="User Name" name="user_name">
                                                <div class="form-control-position">
                                                    <i class="la la-user"></i>
                                                </div>
                                            </fieldset>
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="text" class="form-control" id="public_name" placeholder="Public Name" name="public_name">
                                                <div class="form-control-position">
                                                    <i class="la la-user"></i>
                                                </div>
                                            </fieldset>
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Your Email Address" required>
                                                <div class="form-control-position">
                                                    <i class="la la-envelope"></i>
                                                </div>
                                            </fieldset>
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
                                                <div class="form-control-position">
                                                    <i class="la la-key"></i>
                                                </div>
                                            </fieldset>
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone" required>
                                                <div class="form-control-position">
                                                    <i class="la la-phone"></i>
                                                </div>
                                            </fieldset>
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" required>
                                                <div class="form-control-position">
                                                    <i class="fas fa-location"></i>
                                                </div>
                                            </fieldset>
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="text" class="form-control" id="fix_address" name="fix_address" placeholder="Enter Fix Address" required>
                                                <div class="form-control-position">
                                                    <i class="fas fa-location-dot"></i>
                                                </div>
                                            </fieldset>
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="text" class="form-control" id="company" name="company" placeholder="Enter Company Name" required>
                                                <div class="form-control-position">
                                                    <i class="fas fa-building"></i>
                                                </div>
                                            </fieldset>
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="text" class="form-control" id="bio" name="bio" placeholder="Enter Biography" required>
                                                <div class="form-control-position">
                                                    <i class="fas fa-check"></i>
                                                </div>
                                            </fieldset>
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="date" class="form-control" id="dob" name="dob" placeholder="Date of Birth" required>
                                                <div class="form-control-position">
                                                    <i class="la la-calendar"></i>
                                                </div>
                                            </fieldset>
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <select id="projectinput6" class="form-control" name="country">
                                                    <option value="none" selected="" disabled="">Choose Country</option>
                                                    <?php 
                                                    foreach ($countries as $country){ ?>
                                                        <option value="<?= $country ?>"><?= $country ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                                <div class="form-control-position">
                                                    <i class="la la-flag"></i>
                                                </div>
                                            </fieldset>
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <select id="projectinput6" class="form-control" name="state">
                                                    <option value="none" selected="" disabled="">Choose State</option>
                                                    <?php 
                                                    foreach ($states as $state){ ?>
                                                        <option value="<?= $state ?>"><?= $state ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                                <div class="form-control-position">
                                                    <i class="la la-key"></i>
                                                </div>
                                            </fieldset>
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="text" class="form-control" id="language" name="language" placeholder="Language" required>
                                                <div class="form-control-position">
                                                    <i class="la la-key"></i>
                                                </div>
                                            </fieldset>
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <select id="projectinput6" class="form-control" name="fav_movie">
                                                    <option value="none" selected="" disabled="">Choose Favorite Movies</option>
                                                    <?php 
                                                    foreach ($movies as $movie){ ?>
                                                        <option value="<?= $movie ?>"><?= $movie ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                                <div class="form-control-position">
                                                    <i class="la la-key"></i>
                                                </div>
                                            </fieldset>
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <select id="projectinput6" class="form-control" name="fav_music">
                                                    <option value="none" selected="" disabled="">Choose Favorite Musics</option>
                                                    <?php 
                                                    foreach ($musics as $music){ ?>
                                                        <option value="<?= $music ?>"><?= $music ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                                <div class="form-control-position">
                                                    <i class="la la-key"></i>
                                                </div>
                                            </fieldset>
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="text" class="form-control" id="website" name="website" placeholder="Website" required>
                                                <div class="form-control-position">
                                                    <i class="la la-key"></i>
                                                </div>
                                            </fieldset>
                                            <div class="form-group row">
                                                <!-- <div class="col-sm-6 col-12 text-center text-sm-left pr-0">
                                                    <fieldset>
                                                        <input type="checkbox" id="remember-me" class="chk-remember">
                                                        <label for="remember-me"> Remember Me</label>
                                                    </fieldset>
                                                </div> -->
                                                <!-- <div class="col-sm-6 col-12 float-sm-left text-center text-sm-right"><a href="recover-password.html" class="card-link">Forgot Password?</a></div> -->
                                            </div>
                                            <button type="submit" class="btn btn-outline-info btn-block"><i class="la la-user"></i> Register</button>
                                        </form>
                                    </div>
                                    <div class="card-body">
                                        <a href="login_form.php" class="btn btn-outline-danger btn-block"><i class="ft-unlock"></i>
                                            Login</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <!-- END: Content-->
    <script src="https://kit.fontawesome.com/b829c5162c.js" crossorigin="anonymous"></script>

    <!-- BEGIN: Vendor JS-->
    <script src="./admin/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="./admin/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
    <script src="./admin/app-assets/vendors/js/forms/icheck/icheck.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="./admin/app-assets/js/core/app-menu.js"></script>
    <script src="./admin/app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="./admin/app-assets/js/scripts/forms/form-login-register.js"></script>
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>