<?php 
// logout 
session_start();
session_destroy();
header('location: ../login_form.php');

?>