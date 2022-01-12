<?php
$server = "localhost";  //127.0.0.1
$dbName = "nti";   //database v=name
$dbUser = "root";
$dbPassword = "";
$con = mysqli_connect($server,$dbUser,$dbPassword,$dbName);
if (!$con) {
    die('Error :' .mysqli_connect_error());
}
    
  

?>
