<?php

$conn = new mysqli("localhost","root","","drugdispensingtool");

if ($conn->connect_error){
    die("Connection error: " . $conn->connect_error);
}else{
    echo "Connection successful <br>";
}


?>