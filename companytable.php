<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-COMPLATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <title>COMPANY'S DRUGS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>List of Drugs</h2>
        <a class="btn btn-primary" href="/users/adddrugs.php" role="button">New Drug</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>       
                    <th>Drug Name</th>
                    <th>Drug Company</th>
                    <th>Drug Formula</th>
                    <th>Drug Price</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "users";

                $connection = new mysqli($servername, $username, $password, $database);

                if ($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }

                $sql = "SELECT * FROM drugs";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Invalid query: " . $connection->error);
                }

                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                                    
                        <td>$row[Drug_Name]</td>
                        <td>$row[Drug_company]</td>
                        <td>$row[Drug_Formula]</td>
                        <td>$row[Drug_Price]</td>                    
                        <td>
                            
                            <a class='btn btn-danger btn-sm' href='drugsdelete.php?id=$row[Drug_Name]'>Delete</a>
                        </td>
                    </tr>
                    ";
                }

                $connection->close();

                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

