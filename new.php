<?php

$server = "localhost";
$dbName = "nti";
$dbUser = "root";
$dbPassword = "";
$con = mysqli_connect($server,$dbUser,$dbPassword,$dbName);

    if($con){
        echo 'connected';
    }
   else{
       die('Error:' .mysqli_connect_error());
   }

?>