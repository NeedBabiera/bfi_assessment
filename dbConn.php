<?php

$dbServerName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbname = "db_lougeh";
$port = 3306;

$connection = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbname, $port);

if(mysqli_connect_error()){
    echo "Unable to connect to the server";
}

?>
