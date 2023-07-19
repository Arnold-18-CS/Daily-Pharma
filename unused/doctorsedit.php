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

$id = $_GET['id']; // Get the user ID from the query parameter

$name="";
$phone="";
$specialty="";
$experience="";

$errorMessage = "";
$successMessage="";

if( $_SERVER['REQUEST_METHOD'] == 'GET'){
    //GET method: Show the data of the client 

    if (!isset( $_GET['id']) ){
        header("location: doctorsindex.php");
        exit;
    }

    //read the row of the selected client from the database table 
    $sql = $connection->prepare("SELECT * FROM doctors WHERE id = ? ");
    $sql->bind_param("i", $id);
    $sql->execute();
    $row = $sql->get_result()->fetch_assoc();

    if (!$row) {
        header("location: doctorsindex.php");
        exit;
    }

    $name = $row["name"];
    $phone = $row["phone"];
    $specialty = $row["specialty"];
    $experience = $row["experience"];
}


else{
    //POST method: Update the data of the doctor

    $id = $_POST["id"];
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $specialty = $_POST["specialty"];
    $experience = $_POST["experience"];

    do{
        if ( empty($id) || empty($name) || empty($specialty) || empty($phone) || empty($experience)){
            $errorMessage ="All the fieds are required";
            break;
        }
        //add new user to database 
        $sql = "UPDATE  doctors " .
        "SET name = '$name', phone = '$phone' , specialty = '$specialty', Experience = '$experience' " .
        "WHERE id = $id ";

        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid Query: " . $connection->error;
            break;
        }

        $successMessage = "User updated Correctly";

        header("location: doctorsindex.php");

        exit;

    }while (false);
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-COMPLATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <title>Doctors</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class= "container my-5">
        <h2>New Doctor</h2>

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
        <form method ="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form label">Phone</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="phone" value="<?php echo $phone?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form label">Specialty</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="specialty" value="<?php echo $specialty?>">
                </div>

            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form label">Experience</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="experience" value="<?php echo $experience?>">
                </div>
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
                    <a class="btn btn-outline-primary" href="/users/doctorsindex.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>