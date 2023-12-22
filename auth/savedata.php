<?php

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "1";
$dbName = "seekers_database";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if(!$conn) {
    die("Something went wrong;");
}

?>