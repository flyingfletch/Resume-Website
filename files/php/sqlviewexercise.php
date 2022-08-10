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

        // Prepare SQL statement on server
        $stmt = $conn -> prepare($sql);

        // Execute SQL statement on server
        $stmt ->execute();

    } catch (PDOException $error) {
        
        // Return error code if one is created
        echo "An error occurred: <br>" . $error->getMessage();
    }
    $conn = null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <!-- DataTables JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    
    <title>Data Table</title>
</head>
<body>
    <!-- Table Section -->
    <section id="table">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2>The data currently in the database is:</h2>
                    <!-- Table -->
                    <table class="table" id="dataTable">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Chocolate or Vanilla</th>
                                <th scope="col">Contact Back</th>
                                <th scope="col">Comments</th>
                                <th scope="col">Date Sent</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                // Print returned data to the screen
                                echo "<b>The data currently in the database:</b><br>\n";
                                foreach ($stmt -> fetchAll() as $row) {
                                    echo "<tr>";
                                    echo "<td>" . $row['ContactID'] . "</td>";
                                    echo "<td>" . $row['FullName'] . "</td>";
                                    echo "<td>" . $row['Email'] . "</td>";
                                    echo "<td>" . $row['ChocolateOrVanilla'] . "</td>";
                                    echo "<td>" . $row['ContactBack'] . "</td>";
                                    echo "<td>" . $row['Comments'] . "</td>";
                                    echo "<td>" . $row['DateSent'] . "</td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</body>
</html>