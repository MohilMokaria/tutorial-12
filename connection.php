<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "tut12";

    $connection = mysqli_connect($servername, $username, $password, $database);
    
    if(!$connection){
        echo "DB Not-Connected";
    }
?>