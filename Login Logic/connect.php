<?php

define($servername, "localhost");
define($username, "root");
define($password, "");
define($database, "dailyPharma");

//create connection 
$conn= new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection Error");
}

?>