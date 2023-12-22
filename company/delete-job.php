<?php


if (isset($_GET['job_id'])) {
    $jobId = $_GET['job_id'];


    include_once 'JobManager.php'; 

    $jobManager = new JobManager();

    if ($jobManager->deleteJob($jobId)) {
        echo "Job deleted successfully.";
    } else {
        echo "Failed to delete job.";
    }
} else {
    echo "Job ID not provided.";
}
?>
