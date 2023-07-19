<!DOCTYPE html>
<html>
<head>
    <title>Prescription Table</title>
    <style>
        table {
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
        }
    </style>
</head>
<body>
    <h2>Prescription Table</h2>

    <form method="GET" action="search_prescription.php">
        <label for="patient_ssn">Search Prescription by Patient SSN:</label>
        <input type="text" id="patient_ssn" name="patient_ssn" required>
        <input type="submit" value="Search">
    </form>

    <br>

    <table>
        <tr>
            <th>Prescription ID</th>
            <th>Patient SSN</th>
            <th>Doctor SSN</th>
            <th>Drug Name</th>
            <th>Prescription Amount</th>
            <th>Prescription Dosage</th>
        </tr>
        <?php
        // Establish a connection to the database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "users";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve prescription data from the database
        $sql = "SELECT * FROM prescriptions";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["Prescription_ID"] . "</td>";
                echo "<td>" . $row["Patient_SSN"] . "</td>";
                echo "<td>" . $row["Doctor_SSN"] . "</td>";
                echo "<td>" . $row["Drug_Name"] . "</td>";
                echo "<td>" . $row["Prescription_Amt"] . "</td>";
                echo "<td>" . $row["Prescription_Dosage"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No prescriptions found.</td></tr>";
        }

        // Close the database connection
        $conn->close();
        ?>
    </table>
</body>
</html>
