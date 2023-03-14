<?php 
session_start();
include "./layouts/head.php";
include "./layouts/navbar.php";
?>
    
<?php if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
} ?>
<h1>Hello</h1>






<?php 
include "./layouts/footer.php";
?>