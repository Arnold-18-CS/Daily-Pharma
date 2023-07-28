<?php
session_start();
require_once("connect.php");

$user = $_SESSION["user"];
$ID = $_SESSION["userid"];
$username = $_SESSION["user"]["Pharmacy_Name"];

$error = '';

$drug_id = '' ;
$drug_price = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$drug_id = $_POST["drug_id"];
$drug_price = $_POST["drug_price"];

if (empty($drug_id) || empty($drug_price)) {
$error = "All fields are required";
}

if (empty($error)) {

    $checkQuery = "SELECT * FROM drug_prices WHERE Drug_ID = '$drug_id' AND Pharmacy_ID = '$ID'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0) {
        echo "<script>alert('This drug already exists in your list, thus its details will be updated instead.')</script>";
        $updateQuery = "UPDATE drug_prices SET Drug_Price = '$drug_price' WHERE Drug_ID = '$drug_id' AND Pharmacy_ID = '$ID'";
        if ($conn->query($updateQuery) === TRUE) {
            echo "<script>alert('Drug price details updated successfully.')</script>";
        } else {
            $error = "Error updating drug price details: " . $conn->error;
        }

    } else {
        $insertQuery = "INSERT INTO drug_prices (Drug_ID, Pharmacy_ID, Drug_Price)
                        VALUES ('$drug_id', '$ID', '$drug_price')";
        if ($conn->query($insertQuery) === TRUE) {
            echo "<script>alert('Drug added successfully');
                  window.location.href = 'pharmacyView.php';
                  </script>";
        } else {
            $error = "Error in drug addition.";
        }
    }
}
}



if (!empty($error)) {
    echo "<script>alert('$error')
    window.location.href = 'adddrugs.php';
    </script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-COMPLATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <title>Available Drugs</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>New Drug</h2>

        <?php
        if (!empty($errorMessage)) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>
        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Drug Name</label>
                <div class="col-sm-6">
                <select name="drug_id" id="Drug_ID" required>
                    <?php

                    require_once("connect.php");
                    // Fetch drugs from the drugs table
                    $sql = "SELECT `Drug_ID`, `Drug_Name` FROM drugs";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value=" '. $row["Drug_ID"] .' "> '. $row["Drug_Name"] .' </option>';
                        }
                    }else {
                        echo '<option value="">No drugs found</option>';
                    }
                    $result->close();
                    ?>
                </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Drug Price</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="drug_price">
                </div>
            </div>

            <?php
            if (!empty($successMessage)) {
                echo "
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    </div>
                </div>
                ";
            }
            ?>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="pharmacyView.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
