<?php 

$servername ="localhost";
$username ="root";
$password="";
$database="users";

//create connection 
$connection= new mysqli($servername, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$id = $_GET['name']; // Get the user ID from the query parameter

$name="";
$drug_name="";
$drug_price="";
$address="";
$phone="";


$errorMessage = "";
$successMessage="";

if( $_SERVER['REQUEST_METHOD'] == 'GET'){
    //GET method: Show the data of the client 

    if (!isset( $_GET['name']) ){
        header("location: pharmacyindex.php");
        exit;
    }

    //read the row of the selected client from the database table 
    $sql = $connection->prepare("SELECT * FROM pharmacy WHERE name = ? ");
    $sql->bind_param("s", $name);
    $sql->execute();
    $row = $sql->get_result()->fetch_assoc();

    if (!$row) {
        header("location: pharmacyindex.php");
        exit;
    }

    $name = $row["name"];
    $drug_name= $row["drug_name"];
    $drug_price=$row["drug_price"];
    $phone = $row["phone"];
    $address = $row["address"];
}


else{
    //POST method: Update the data of the client 

    $name = $_POST["name"];
    $drug_name = $_POST["drug_name"];
    $drug_price=$_POST["drug_price"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    do{
        if ( empty($name) || empty($drug_name) || empty($drug_price) || empty($phone) || empty($address)){
            $errorMessage ="All the fieds are required";
            break;
        }
        //add new user to database 
        $sql = "UPDATE  pharmacy " .
        "SET name = '$name', drug_name = '$drug_name' , drug_price = '$drug_price', address = '$address' , phone = '$phone' " .
        "WHERE name = '$name' ";

        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid Query: " . $connection->error;
            break;
        }

        $successMessage = "User updated Correctly";

        header("location: pharmacyindex.php");
        exit();

    }while (false);
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-COMPLATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <title>PHARMACY</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class= "container my-5">
        <h2>New Pharmacy</h2>

        <?php
        if( !empty($errorMessage)){
            echo "
            <div class='alert alert-warning alert-dismisible fade show' role='alert'>
                 <strong>$errorMessage <?strong>
                 <button type='button' class='btn-close' data-bs-dismiss='alert' aria -label='Close'></label>
                 </div>
                 ";
        }
        ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

          
            <div class="row mb-3">
                <label class="col-sm-3 col-form label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form label">Drug Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="drug_name" value="<?php echo $drug_name?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form label">Drug Price</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="drug_price" value="<?php echo $drug_price?>">
                </div>

            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form label">Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="address" value="<?php echo $address?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form label">Phone</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="phone" value="<?php echo $phone?>">
                </div>


            <?php
            if (!empty($successMessage) ){
                echo "
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-success alert-dismisible fade show' role='alert'>
                            <strong>$successMessage <?strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria -label='Close'></label>
                            </div>
                    </div>
                 </div>
                 ";
            }
            ?>
            <div class= "row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/users/pharmacyindex.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>