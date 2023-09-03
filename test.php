<?php 

$ID = $_SESSION["userid"];
$user = $_SESSION["user"];

if (isset($_SESSION['user'])) {
    if ($_SESSION['user'] == "Patient") {
        $username = $_SESSION["user"]["Company_Name"];
        $_SESSION["userdata"] = $row;    }else if ($_GET['cat'] == "movies") {
        $pageTitle = "Movies";
    }else if ($_GET['cat'] == "music") {
        $pageTitle = "Music";
    }
}


?>