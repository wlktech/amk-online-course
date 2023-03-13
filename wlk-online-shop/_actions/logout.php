<?php 
session_start();
session_destroy();
include "../vendor/autoload.php";
use Helpers\HTTP;

HTTP::redirect("../login_form.php");


?>