<?php

$conn = new mysqli("localhost","root","","drug_dispensing");

if ($conn->connect_error){
    die("Connection error: " . $conn->connect_error);
}else{
    echo "Connection successful <br>";
}


?>