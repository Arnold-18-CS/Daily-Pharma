<?php
require_once("connect.php");

$P_name = $_POST['Patient_Name'];
$P_age = $_POST['Patient_Age'];
$P_email = $_POST['Patient_Email'];
$P_phone = $_POST['Patient_Phone'];
$P_address = $_POST['Patient_Address'];
$P_password = $_POST['Patient_Password'];

$insert_sql = "INSERT INTO `patients`(`Patient_Name`,`Patient_Age`,`Patient_Email`,`Patient_Phone`,`Patient_Address`,`Patient_Password`)
VALUES ('$P_name','$P_age','$P_email','$P_phone','$P_address','$P_password')";

if ($conn->query($insert_sql) === true){
    echo "New Patient record successfully added.";
}else{
    echo "Error: Patient not added - " . $conn->error;
}
?>