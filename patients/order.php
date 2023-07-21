<?php

session_start();

require_once("../connect.php");

$username = $_SESSION["userid"];
$user = $_SESSION["user"];
$patientAddress = $_SESSION["user"]["Patient_Address"];
$patientSSN = $_SESSION["user"]["Patient_SSN"];
$selectedDrug = $_SESSION['selected_drug'];



$result = $conn->query(
    "INSERT INTO `orders` (Drug_ID, Patient_SSN) VALUES ('$selectedDrug','$patientSSN')"
);

if ($result === true) {
    echo "<script>alert('$username - Order for $selectedDrug has been placed. Address - $patientAddress');</script>";
    echo "<script>window.location.href = '../patients/patientView.php';</script>";

} else {
    echo "<script>alert('Error in order plaement. Try Again')
    window.location.href = 'patientView.php';
    </script>";
}


?>