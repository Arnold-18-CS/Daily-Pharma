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

// Retrieve form data
$prescription_id = $_POST['prescription_id'];
$patient_ssn = $_POST['patient_ssn'];
$doctor_ssn = $_POST['doctor_ssn'];
$drug_name = $_POST['drug_name'];
$prescription_amt = $_POST['prescription_amt'];
$prescription_dosage = $_POST['prescription_dosage'];

// Prepare the SQL statement
$sql = "INSERT INTO prescriptions (Prescription_ID, Patient_SSN, Doctor_SSN, Drug_Name, Prescription_Amt, Prescription_Dosage) VALUES ('$prescription_id', '$patient_ssn', '$doctor_ssn', '$drug_name', '$prescription_amt', '$prescription_dosage')";

if ($conn->query($sql) === TRUE) {
    // Close the database connection
    $conn->close();
    
    // Redirect to the follow-up table
    header("Location: prescription_table.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
