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

        $sql = "INSERT INTO $tablename (
            animalName, 
            animalType, 
            foodType, 
            cuteBaby, 
            funFacts
        )
        VALUES (
            'Snake',
            'Reptile',
            'Carnivore',
            'Yes',
            'They swallow their food whole.'
        );";

        // Execute SQL statement on server
        $conn -> exec($sql);

        // Get the id of the last row added
        $last_id = $conn -> lastInsertId();

        // Send success message to screen
        echo "A new record was added successfully. The last inserted ID is: " . $last_id;

    } catch (PDOException $error) {
        
        // Return error code if one is created
        echo "Execution error: <br>" . $error->getMessage();
    }
    $conn = null;
?>