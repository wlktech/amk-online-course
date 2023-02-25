<?php 
include "vendor/autoload.php";
use App\WlkOnlineShop\Databases\CountryModel;
use App\WlkOnlineShop\Databases\StateModel;

$country = CountryModel::CountryOptions();
$state = StateModel::StateOptions();
// echo "<pre>";
// print_r($country);
// echo "</pre>";
// foreach ($country as $key=>$value){
//     echo $key. " ".$value. "<br>";
// }
echo "<pre>";
print_r($state);
echo "</pre>";
foreach ($state as $key=>$value){
    echo $key. " ".$value. "<br>";
}
?>