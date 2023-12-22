<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $_SESSION['job_data'] = $_POST;
    header("Location: add-job-quize.php");
    exit(); 
} else {
   
    echo "Form not submitted.";
}


?>
