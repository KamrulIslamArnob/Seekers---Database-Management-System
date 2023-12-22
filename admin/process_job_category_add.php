<?php

//require_once($_SERVER['DOCUMENT_ROOT'] . '/Seekers---job-portal-using-php-tailwind-mysql/admin/JobManager.php');
require_once 'JobManager.php';



$jobManager = new JobManager();
 $jobCategory = isset($_POST['jobCategory']) ? $_POST['jobCategory'] : '';

$result =  $jobManager->addJobCategory($jobCategory);

if ($result) {
    echo 'Job category added successfully.';
} else {
    echo 'Error approving job';
}
?>
