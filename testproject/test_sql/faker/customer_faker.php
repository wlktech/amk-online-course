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
    $tableExists = $pdo->query("SHOW TABLES LIKE 'clients'")->rowCount() > 0;
    if ($tableExists) {
        //Truncate the table
        $stmt = $pdo->prepare("truncate table clients");
        $stmt->execute();
    } else {
        throw new Exception("The table 'clients' does not exist in the database.");
    }

    //Insert the data
    $sql = 'INSERT INTO clients (customerNumber, customerName, contactLastName, contactFirstName, phone, addressLine1, addressLine2, city, state, postalCode, country, salesRepEmployeeNumber, creditLimit) 
    VALUES (:customerNumber, :customerName, :contactLastName, :contactFirstName, :phone, :addressLine1, :addressLine2, :city, :state, :postalCode, :country, :salesRepEmployeeNumber, :creditLimit)';
    $stmt = $pdo->prepare($sql);

    for ($i=0; $i < $count; $i++) {
        $date = $faker->dateTime($max = 'now', 'UTC')->format('Y-m-d H:i:s');
        // $password = password_hash($faker->password(8), PASSWORD_DEFAULT);
        // $status = $faker->randomElement(array(0,1));
        $stmt->execute(
            [
                'customerNumber' => $faker->ean8,
                'customerName' => $faker->name,
                'contactLastName' => $faker->lastName,
                'contactFirstName' => $faker->firstName,
                'phone' => $faker->phoneNumber,
                'addressLine1' => $faker->address,
                'addressLine2' => $faker->address,
                'city' => $faker->city,
                'state' => $faker->state,
                'postalCode' => $faker->postcode,
                'country' => $faker->country,
                'salesRepEmployeeNumber' => $faker->randomDigit,
                'creditLimit' => $faker->randomDigit,
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