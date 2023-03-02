<?php 
include "../vendor/autoload.php";
// use Helpers\HTTP;
use App\WlkOnlineShop\Databases\CountryModel;
use App\WlkOnlineShop\Databases\StateModel;
use App\WlkOnlineShop\Databases\FavMovieModel;
use App\WlkOnlineShop\Databases\FavMusicModel;
use App\WlkOnlineShop\Databases\LanguageModel;

$countries = CountryModel::CountryOptions();
$states = StateModel::StateOptions();
$fav_movies = FavMovieModel::FavouriteMovieOptions();
$fav_musics = FavMusicModel::FavouriteMusicOptions();
$languages = LanguageModel::LanguageOption();

// $auth = Auth::check();
// echo "<pre>";
// print_r($auth);
// echo "</pre>";
// die();

include "layouts/head.php";


?>
    <link rel="stylesheet" type="text/css" href="../admin/app-assets/vendors/css/forms/selects/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../admin/app-assets/vendors/css/pickers/pickadate/pickadate.css">
    <link rel="stylesheet" type="text/css" href="../admin/app-assets/vendors/css/forms/toggle/switchery.min.css">
    <link rel="stylesheet" type="text/css" href="../admin/app-assets/css/plugins/forms/validation/form-validation.css">
    <link rel="stylesheet" type="text/css" href="../admin/app-assets/css/plugins/pickers/daterange/daterange.css">

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

<?php 

include "layouts/navbar.php";
include "layouts/sidebar.php";

?>


    
    <!-- BEGIN: Content-->
    <div class="app-content content">
            <div class="content-header row pt-2 mt-2 px-3">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Account setting</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Pages</a>
                                </li>
                                <li class="breadcrumb-item active">Account setting
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12">
                    <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                        <button class="btn btn-info round dropdown-toggle dropdown-menu-right box-shadow-2 px-2 mb-1" id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ft-settings icon-left"></i> Settings</button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"><a class="dropdown-item" href="card-bootstrap.html">Cards</a><a class="dropdown-item" href="component-buttons-extended.html">Buttons</a></div>
                    </div>
                </div>
            </div>
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-body">
                <!-- account setting page start -->
                <section id="page-account-settings">
                    <div class="row">
                        <!-- left menu section -->
                        <div class="col-md-3 mb-2 mb-md-0">
                            <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                                <li class="nav-item">
                                    <a class="nav-link d-flex active" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="true">
                                        <i class="ft-globe mr-50"></i>
                                        General
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex" id="account-pill-password" data-toggle="pill" href="#account-vertical-password" aria-expanded="false">
                                        <i class="ft-lock mr-50"></i>
                                        Change Password
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex" id="account-pill-info" data-toggle="pill" href="#account-vertical-info" aria-expanded="false">
                                        <i class="ft-info mr-50"></i>
                                        Info
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex" id="account-pill-social" data-toggle="pill" href="#account-vertical-social" aria-expanded="false">
                                        <i class="ft-camera mr-50"></i>
                                        Social links
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex" id="account-pill-connections" data-toggle="pill" href="#account-vertical-connections" aria-expanded="false">
                                        <i class="ft-feather mr-50"></i>
                                        Connections
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex" id="account-pill-notifications" data-toggle="pill" href="#account-vertical-notifications" aria-expanded="false">
                                        <i class="ft-message-square mr-50"></i>
                                        Notifications
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- right content section -->
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
                                                <form action="../_actions/profile_update.php" method="post" enctype="multipart/form-data">
                                                    <input type="hidden" name="id" value="<?= $auth->id ?>">
                                                    <div class="media">
                                                        <a href="javascript: void(0);">
                                                            <img src="../_actions/profile/<?= $auth->profile_img ?>" class="rounded mr-75" alt="profile image" height="64" width="64">
                                                        </a>
                                                        <div class="media-body mt-75">
                                                            <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                                <label class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer" for="account-upload">Choose new photo</label>
                                                                <input type="file" name="profile_img" id="account-upload" hidden>
                                                                <button class="btn btn-sm btn-secondary ml-50" type="submit">Profile Upload</button>
                                                            </div>
                                                            <p class="text-muted ml-75 mt-50"><small>Allowed JPG, GIF or PNG. Max
                                                                    size of
                                                                    800kB</small></p>
                                                        </div>
                                                    </div>
                                                </form>
                                                <hr>
                                                <form novalidate action="../_actions/general_update.php" method="POST">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-username">Username</label>
                                                                    <input type="text" name="user_name" class="form-control" id="account-username" placeholder="Username" value="<?= $auth->user_name; ?>" required data-validation-required-message="This username field is required">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-name">Public Name</label>
                                                                    <input type="text" name="public_name" class="form-control" id="account-name" placeholder="Name" value="<?= $auth->public_name; ?>" required data-validation-required-message="This name field is required">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-e-mail">E-mail</label>
                                                                    <input type="email" class="form-control" id="account-e-mail" placeholder="Email" value="<?= $auth->email; ?>" disabled data-validation-required-message="This email field is required">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- <div class="col-12">
                                                            <div class="alert alert-warning alert-dismissible mb-2" role="alert">
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                                <p class="mb-0">
                                                                    Your email is not confirmed. Please check your inbox.
                                                                </p>
                                                                <a href="javascript: void(0);">Resend confirmation</a>
                                                            </div>
                                                        </div> -->
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="account-company">Company</label>
                                                                <input type="text" name="company" class="form-control" id="account-company" placeholder="Company name" value="<?= $auth->company; ?>">
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="id" value="<?= $auth->id ?>">
                                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                            <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                                changes</button>
                                                            <button type="reset" class="btn btn-light">Cancel</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade " id="account-vertical-password" role="tabpanel" aria-labelledby="account-pill-password" aria-expanded="false">
                                                <form novalidate action="../_actions/password_change.php" method="POST">
                                                    <div class="row">
                                                        <input type="hidden" name="id" value="<?= $auth->id ?>">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-old-password">Old Password</label>
                                                                    <input type="password" class="form-control" id="account-old-password" required placeholder="Old Password" data-validation-required-message="This old password field is required">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-new-password">New Password</label>
                                                                    <input type="password" name="password" id="account-new-password" class="form-control" placeholder="New Password" required data-validation-required-message="The password field is required" minlength="6">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-retype-new-password">Retype New
                                                                        Password</label>
                                                                    <input type="password" name="con-password" class="form-control" required id="account-retype-new-password" data-validation-match-match="password" placeholder="New Password" data-validation-required-message="The Confirm password field is required" minlength="6">
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                            <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                                changes</button>
                                                            <button type="reset" class="btn btn-light">Cancel</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="account-vertical-info" role="tabpanel" aria-labelledby="account-pill-info" aria-expanded="false">
                                                <form novalidate action="../_actions/user_info_update.php" method="post">
                                                    <input type="hidden" name="id" value="<?= $auth->id ?>">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="accountTextarea">Bio</label>
                                                                <textarea class="form-control" id="accountTextarea" name="bio" rows="3" placeholder="Your Bio data here..."><?= $auth->bio ?></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-birth-date">Birth date</label>
                                                                    <input type="text" name="birth_date" class="form-control birthdate-picker" required placeholder="Birth date" id="account-birth-date" data-validation-required-message="This birthdate field is required" value="<?= $auth->birth_date ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="accountSelect">Country</label>
                                                                <select class="form-control" id="accountSelect" name="country">
                                                                    <?php
                                                                    foreach($countries as $country){ 
                                                                    ?>
                                                                    <option value="<?= $country ?>" <?= $country == $auth->country ? 'selected': ''?>><?= $country ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="accountSelect">State</label>
                                                                <select class="form-control" id="accountSelect" name="state">
                                                                    <?php
                                                                    foreach($states as $state){ 
                                                                    ?>
                                                                    <option value="<?= $state ?>" <?= $state == $auth->state ? 'selected': ''?>><?= $state ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="languageselect2">Languages</label>
                                                                <select class="form-control" id="languageselect2" multiple="multiple" name="language[]">
                                                                    <option value="">Choose Languages</option>
                                                                    <?php foreach($languages as $language){ ?>
                                                                    <option value="<?= $language ?>" <?= $language == $auth->language ? 'selected' : ''?>><?= $language ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                                <p>Your Language is : <span class="badge badge-lg badge-pill badge-light-secondary mt-1">
                                                                    <?= $auth->language ?>
                                                                    <i class="feather icon-plus"></i>
                                                                </span></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-phone">Phone</label>
                                                                    <input type="text" name="phone" class="form-control" id="account-phone" required placeholder="Phone number" value="<?= $auth->phone ?>" data-validation-required-message="This phone number field is required">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="account-website">Website</label>
                                                                <input type="text" class="form-control" id="account-website" name="website" placeholder="Website address" value="<?= $auth->website ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="musicselect2">Favourite Music</label>
                                                                <select class="form-control" id="musicselect2" multiple="multiple" name="fav_music[]">
                                                                    <option value="">Choose Favorite Music</option>
                                                                    <?php foreach($fav_musics as $fav_music){ ?>
                                                                        <option value="<?= $fav_music ?>" <?= $fav_music == $auth->fav_music ? 'selected': ''?>><?= $fav_music ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                                <p>Your Favorite Music is : <span class="badge badge-lg badge-pill badge-light-secondary mt-1">
                                                                    <?= $auth->fav_music ?>
                                                                    <i class="feather icon-plus"></i>
                                                                </span></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="moviesselect2">Favourite movies</label>
                                                                <select class="form-control" id="moviesselect2" multiple="multiple" name="fav_movie[]">
                                                                    <option value="">Choose Favorite Movie</option>
                                                                    <?php foreach($fav_movies as $fav_movie){ ?>
                                                                        <option value="<?= $fav_movie ?>" <?= $fav_movie == $auth->fav_movie ? 'selected': ''?>><?= $fav_movie ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                                <p>Your Favorite Movie is : <span class="badge badge-lg badge-pill badge-light-secondary mt-1">
                                                                    <?= $auth->fav_movie ?>
                                                                    <i class="feather icon-plus"></i>
                                                                </span></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                            <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                                changes</button>
                                                            <button type="reset" class="btn btn-light">Cancel</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade " id="account-vertical-social" role="tabpanel" aria-labelledby="account-pill-social" aria-expanded="false">
                                                <form>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="account-twitter">Twitter</label>
                                                                <input type="text" id="account-twitter" class="form-control" placeholder="Add link" value="https://www.twitter.com">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="account-facebook">Facebook</label>
                                                                <input type="text" id="account-facebook" class="form-control" placeholder="Add link">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="account-google">Google+</label>
                                                                <input type="text" id="account-google" class="form-control" placeholder="Add link">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="account-linkedin">LinkedIn</label>
                                                                <input type="text" id="account-linkedin" class="form-control" placeholder="Add link" value="https://www.linkedin.com">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="account-instagram">Instagram</label>
                                                                <input type="text" id="account-instagram" class="form-control" placeholder="Add link">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="account-quora">Quora</label>
                                                                <input type="text" id="account-quora" class="form-control" placeholder="Add link">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                            <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                                changes</button>
                                                            <button type="reset" class="btn btn-light">Cancel</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="account-vertical-connections" role="tabpanel" aria-labelledby="account-pill-connections" aria-expanded="false">
                                                <div class="row">
                                                    <div class="col-12 mb-3">
                                                        <a href="javascript: void(0);" class="btn btn-info">Connect to
                                                            <strong>Twitter</strong></a>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <button class=" btn btn-sm btn-secondary float-right">edit</button>
                                                        <h6>You are connected to facebook.</h6>
                                                        <span>Johndoe@gmail.com</span>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <a href="javascript: void(0);" class="btn btn-danger">Connect to
                                                            <strong>Google</strong>
                                                        </a>
                                                    </div>
                                                    <div class="col-12 mb-2">
                                                        <button class=" btn btn-sm btn-secondary float-right">edit</button>
                                                        <h6>You are connected to Instagram.</h6>
                                                        <span>Johndoe@gmail.com</span>
                                                    </div>
                                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                        <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                            changes</button>
                                                        <button type="reset" class="btn btn-light">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="account-vertical-notifications" role="tabpanel" aria-labelledby="account-pill-notifications" aria-expanded="false">
                                                <div class="row">
                                                    <h6 class="ml-1 mb-2">Activity</h6>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <input type="checkbox" class="switchery" data-size="sm" checked id="accountSwitch1">
                                                            <label class="ml-50" for="accountSwitch1">Email me when someone comments
                                                                onmy
                                                                article</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <input type="checkbox" class="switchery" data-size="sm" checked id="accountSwitch2">
                                                            <label for="accountSwitch2" class="ml-50">Email me when someone answers on
                                                                my
                                                                form</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <input type="checkbox" class="switchery" data-size="sm" id="accountSwitch3">
                                                            <label for="accountSwitch3" class="ml-50">Email me hen someone follows
                                                                me</label>
                                                        </div>
                                                    </div>
                                                    <h6 class="ml-1 my-2">Application</h6>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <input type="checkbox" class="switchery" data-size="sm" checked id="accountSwitch4">
                                                            <label for="accountSwitch4" class="ml-50">News and announcements</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <input type="checkbox" class="switchery" data-size="sm" id="accountSwitch5">
                                                            <label for="accountSwitch5" class="ml-50">Weekly product updates</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <input type="checkbox" class="switchery" data-size="sm" checked id="accountSwitch6">
                                                            <label for="accountSwitch6" class="ml-50">Weekly blog digest</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                        <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                            changes</button>
                                                        <button type="reset" class="btn btn-light">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- account setting page end -->
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
<script src="../admin/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
 <script src="../admin/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
 <script src="../admin/app-assets/vendors/js/pickers/pickadate/picker.js"></script>
 <script src="../admin/app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
 <script src="../admin/app-assets/vendors/js/forms/toggle/switchery.min.js"></script>
 <script src="../admin/app-assets/js/scripts/pages/account-setting.js"></script>