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
        $sql = "SELECT * FROM jf_su22_Portfolio_Responses;";

        // Execute SQL statement on server
        echo "<b>The data currently in the database:</b><br>\n";
        foreach ($conn -> query($sql) as $row) {
            echo $row['ContactID'] . " | ";
            echo $row['FullName'] . " | ";
            echo $row['Email'] . " | ";
            echo $row['ChocolateOrVanilla'] . " | ";
            echo $row['ContactBack'] . " | ";
            echo $row['Comments'] . " | ";
            echo $row['DateSent'] . "<br>\n";
        }

    } catch (PDOException $error) {
        
        // Return error code if one is created
        echo "An error occurred: <br>" . $error->getMessage();
    }
    $conn = null;
?>