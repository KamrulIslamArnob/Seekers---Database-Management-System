<?php

//require_once($_SERVER['DOCUMENT_ROOT'] . '/Seekers---job-portal-using-php-tailwind-mysql/admin/JobManager.php');
require_once 'JobManager.php';

$jobId = $_GET['job_id'];

$jobManager = new JobManager();

$result = $jobManager->updateJobStatus($jobId, 2);

if ($result) {
    echo 'Job has been approved.';
} else {
    echo 'Error approving job';
}
?>
