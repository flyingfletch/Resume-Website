<?php
    $hostname = "php-mysql-exercisedb.slccwebdev.com";
    $username = "phpmysqlexercise";
    $password = "mysqlexercise";
    $databasename = "php_mysql_exercisedb";

    // Variables for Development of Prepared Statement
    $fullName = "Evan Hansen";
    $email = "dearme@email.com";
    $chocolateOrVanilla = "Chocolate"; 
    $contactBack = "Yes";
    $comments = "We should watch my musical together!";

    try {
        // Create NEW PDO object
        $conn = new PDO("mysql:host=$hostname;dbname=$databasename", $username, $password);
        
        // Set PDO error mode to exception
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Variable containing SQL command
        $sql = "INSERT INTO jf_su22_Portfolio_Responses (
            FullName, 
            Email, 
            ChocolateOrVanilla,
            ContactBack, 
            Comments
        )
        VALUES (
            :fullName,
            :email,
            :chocolateOrVanilla,
            :contactBack,
            :comments
        );";

        // Create prepared statement
        $stmt = $conn -> prepare($sql);

        // Bind parameters to variables
        $stmt -> bindParam(':fullName', $fullName, PDO::PARAM_STR);
        $stmt -> bindParam(':email', $email, PDO::PARAM_STR);
        $stmt -> bindParam(':chocolateOrVanilla', $chocolateOrVanilla, PDO::PARAM_STR);
        $stmt -> bindParam(':contactBack', $contactBack, PDO::PARAM_STR);
        $stmt -> bindParam(':comments', $comments, PDO::PARAM_STR);

        // Execute SQL statement on server
        $stmt -> execute();

        // Get the id of the last row added
        $last_id = $conn -> lastInsertId();

        // Send success message to screen
        echo "A new record was added successfully. The last inserted ID is: " . $last_id;

    } catch (PDOException $error) {
        
        // Return error code if one is created
        echo "An error occurred: <br>" . $error->getMessage();
    }
    $conn = null;
?>