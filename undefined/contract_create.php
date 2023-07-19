<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "users";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

$Pharmacy_Name = "";
$Company_Name = "";
$Contract_ID = "";
$Contract_Supervisor = "";
$Contract_Details = "";
$Start_Date = "";
$End_Date = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Pharmacy_Name = $_POST["Pharmacy_Name"];
    $Company_Name = $_POST["Company_Name"];
    $Contract_ID = $_POST["Contract_ID"];
    $Contract_Supervisor = $_POST["Contract_Supervisor"];
    $Contract_Details = $_POST["Contract_Details"];
    $Start_Date = $_POST["Start_Date"];
    $End_Date = $_POST["End_Date"];

    do {
        if (empty($Pharmacy_Name) || empty($Company_Name) || empty($Contract_ID) || empty($Contract_Supervisor) || empty($Contract_Details) || empty($Start_Date) || empty($End_Date)) {
            $errorMessage = "All fields are required";
            break;
        }

        // Add new contract to the database
        $sql = "INSERT INTO contracts (Pharmacy_Name, Company_Name, Contract_ID, Contract_Supervisor, Contract_Details, Start_Date, End_Date) " .
            "VALUES ('$Pharmacy_Name', '$Company_Name', '$Contract_ID', '$Contract_Supervisor', '$Contract_Details', '$Start_Date', '$End_Date')";
        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid Query: " . $connection->error;
            break;
        }

        $Pharmacy_Name = "";
        $Company_Name = "";
        $Contract_ID = "";
        $Contract_Supervisor = "";
        $Contract_Details = "";
        $Start_Date = "";
        $End_Date = "";

        $successMessage = "Contract added successfully";
        header("location: /users/contract_table.php");
        exit;
    } while (false);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-COMPLATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <title>CONTRACTS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>New Contract</h2>

        <?php
        if (!empty($errorMessage)) {
            echo "
            <div class='alert alert-warning alert-dismisible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>
        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Pharmacy Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Pharmacy_Name" value="<?php echo $Pharmacy_Name ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Company Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Company_Name" value="<?php echo $Company_Name ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Contract ID</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Contract_ID" value="<?php echo $Contract_ID ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Contract Supervisor</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Contract_Supervisor" value="<?php echo $Contract_Supervisor ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Contract Details</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Contract_Details" value="<?php echo $Contract_Details ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Start Date</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="Start_Date" value="<?php echo $Start_Date ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">End Date</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="End_Date" value="<?php echo $End_Date ?>">
                </div>
            </div>

            <?php
            if (!empty($successMessage)) {
                echo "
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-success alert-dismisible fade show' role='alert'>
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
                    <a class="btn btn-outline-primary" href="/users/contract_table.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
