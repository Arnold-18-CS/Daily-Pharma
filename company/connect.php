<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "dailyPharma";

//create connection 
$conn= new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection Error");
}

?>