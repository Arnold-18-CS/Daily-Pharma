<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-COMPLATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <title>CONTRACTS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>List of Contracts</h2>
        <a class="btn btn-primary" href="/users/contract_create.php" role="button">New Contract</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Contract ID</th>       
                    <th>Pharmacy Name</th>
                    <th>Company Name</th>
                    <th>Contract Supervisor</th>
                    <th>Contract Details</th>
                    <th>Start Date</th>
                    <th>End Date</th>
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

                $sql = "SELECT * FROM contracts";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Invalid query: " . $connection->error);
                }

                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>$row[Contract_ID]</td>                
                        <td>$row[Pharmacy_Name]</td>
                        <td>$row[Company_Name]</td>
                        <td>$row[Contract_Supervisor]</td>
                        <td>$row[Contract_Details]</td>
                        <td>$row[Start_Date]</td>
                        <td>$row[End_Date]</td>
                        <td>
                            <a class='btn btn-danger btn-sm' href='delete_contract.php?id=$row[Contract_ID]'>Delete</a>
                        </td>
                    </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
