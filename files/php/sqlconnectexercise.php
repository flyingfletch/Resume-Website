<?php
    $hostname = "php-mysql-exercisedb.slccwebdev.com";
    $username = "phpmysqlexercise";
    $password = "mysqlexercise";
    $databasename = "php_mysql_exercisedb";

    try {
        // Create NEW PDO object
        $conn = new PDO("mysql:host=$hostname;dbname=$databasename", $username, $password);
        
        // Set PDO error mode to exception
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Send success message to screen
        echo "Database connection successful!";

    } catch (PDOException $error) {
        
        // Return error code if one is created
        echo "Connection failed: " . $error->getMessage();
    }
    $conn = null;
?>