<?php

session_start();

$username = $_SESSION["userid"];
$user = $_SESSION["user"];
$patientAddress = $_SESSION["user"]["Patient_Address"];
$patientSSN = $_SESSION["user"]["Patient_SSN"];
$selectedDrug = $_SESSION['selected_drug'];

echo "<script>alert('$username - Order for $selectedDrug has been placed. Address - $patientAddress');</script>";
echo "<script>window.location.href = 'patientView.php';</script>";


?>