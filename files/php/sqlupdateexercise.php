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
        
        // Variable containing SQL command
        $sql = "DROP TABLE jf_su22_Portfolio_Responses;";

        // Execute SQL statement on server
        $conn -> exec($sql);

        // Send success message to screen
        echo "Table updated successfully.";

    } catch (PDOException $error) {
        
        // Return error code if one is created
        echo "Execution error: <br>" . $error->getMessage();
    }
    $conn = null;
?>