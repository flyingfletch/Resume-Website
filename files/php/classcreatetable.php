<?php
    $hostname = "blackbeard.slccwebdev.com";
    $username = "student2022";
    $password = "php_pirates";
    $databasename = "php_pirates";
    $tablename = "animalInfo";

    try {
        // Create NEW PDO object
        $conn = new PDO("mysql:host=$hostname;dbname=$databasename", $username, $password);
        
        // Set PDO error mode to exception
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Variable containing SQL command
        $createTable = "CREATE TABLE $tablename (
            ContactID INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            animalName VARCHAR(100) NULL,
            animalType VARCHAR(255) NULL,
            foodType VARCHAR (50),
            cuteBaby VARCHAR(3) NULL,
            funFacts VARCHAR(600) NULL,
            dateSent DATETIME DEFAULT CURRENT_TIMESTAMP
        );";

        // Execute SQL statement on server
        $conn -> exec($createTable);

        // Send success message to screen
        echo "Table created successfully.";

    } catch (PDOException $error) {
        
        // Return error code if one is created
        echo "Execution error: <br>" . $error->getMessage();
    }
    $conn = null;
?>