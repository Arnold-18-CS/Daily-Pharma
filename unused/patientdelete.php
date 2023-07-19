 <?php 
 if ( isset($_GET["Patient_SSN"]) ) {
    $SSN = $_GET["Patient_SSN"];

    $servername ="localhost";
    $username ="root";
    $password="";
    $database="users";
    
    //create connection
    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM patients WHERE Patient_SSN='$SSN'";
    $connection->query($sql); 

}

header("location: patientindex.php");
exit;
 ?>