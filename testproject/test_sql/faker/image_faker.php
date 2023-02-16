<?php
/**
 * Populate MySQL Table Using faker
 * 
 * @author 
 */
require_once('../vendor/autoload.php');

try{
    $count = 100;
    $faker = \Faker\Factory::create();

    //Connecting MySQL Database
    $pdo  = new PDO('mysql:host=localhost:3308;dbname=amk_sql', 'root', '', array(
        PDO::ATTR_PERSISTENT => true
    ));
    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    //Check if the table exists
    $tableExists = $pdo->query("SHOW TABLES LIKE 'productlines'")->rowCount() > 0;
    if ($tableExists) {
        //Truncate the table
        $stmt = $pdo->prepare("truncate table productlines");
        $stmt->execute();
    } else {
        throw new Exception("The table 'productlines' does not exist in the database.");
    }

    //Insert the data
    $sql = 'INSERT INTO productlines (productLine, textDescription, htmlDescription, image) 
    VALUES (:productLine, :textDescription, :htmlDescription, :image)';
    $stmt = $pdo->prepare($sql);

    for ($i=0; $i < $count; $i++) {
        $date = $faker->dateTime($max = 'now', 'UTC')->format('Y-m-d H:i:s');
        // $password = password_hash($faker->password(8), PASSWORD_DEFAULT);
        // $status = $faker->randomElement(array(0,1));
        $stmt->execute(
            [
                'productLine' => $faker->ean8,
                'textDescription' => $faker->name,
                'htmlDescription' => $faker->name,
                'image' => $faker->imageUrl($width = 640, $height = 480)
                
            ]
        );
    }
} catch(Exception $e){
    echo '<pre>';print_r($e);echo '</pre>';exit;
}

if ($stmt->rowCount() > 0) {
    echo 'Data Inserted Successfully';
} else {
    echo 'Data Inserted Failed';
}