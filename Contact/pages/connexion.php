<?php

$host = "localhost"; 
$username = "root";   
$password = "";      
$dbname = "Contactify";  

$link = mysqli_connect(hostname: $host, username: $username, password: $password, database: $dbname);


if($link === false){
    die("ERROR: Impossible de se connecter. " . mysqli_connect_error());
}
?>