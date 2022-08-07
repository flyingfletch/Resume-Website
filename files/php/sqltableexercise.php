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
        $sql = "CREATE TABLE jf_su22_Portfolio_Responses (
            ContactID INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            FullName VARCHAR(255) NULL,
            Email VARCHAR(255) NULL,
            ChocolateOrVanilla VARCHAR (9),
            ContactBack VARCHAR(3) NULL,
            Comments VARCHAR(600) NULL,
            DateSent DATETIME DEFAULT CURRENT_TIMESTAMP
        );";

        // Execute SQL statement on server
        $conn -> exec($sql);

        // Send success message to screen
        echo "Table created successfully.";

    } catch (PDOException $error) {
        
        // Return error code if one is created
        echo "Execution error: <br>" . $error->getMessage();
    }
    $conn = null;
?>