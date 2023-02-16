<?php 
session_start();
include "vendor/autoload.php";
use Test\App\Database\DB;
use Test\App\Database\Category;

$db = new DB();
$connection = $db->connect();
$categoryDB = new Category($connection);

include "header.php";
include "nav.php";
include "./categories/sidebar.php";



if(isset($_GET["page"])){
    $page = $_GET['page'];
    if($page == "all"){
        $categories = $categoryDB->getAll();
        
        include "./categories/all.php";
    }
}else{
    $categories = $categoryDB->getAll();
    include "categories/all.php";
}
?>






<?php

include "footer.php";

?>