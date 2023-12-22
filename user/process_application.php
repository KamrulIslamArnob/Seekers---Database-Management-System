<?php
// process_application.php

// Include necessary files and classes
//require_once($_SERVER['DOCUMENT_ROOT'] . '/Seekers---job-portal-using-php-tailwind-mysql/user/JobManager.php');
require_once 'JobManager.php';

// Create a JobManager instance
$jobManager = new JobManager();

// Get the job ID from the URL or form data, adjust this based on your implementation
$jobId = isset($_POST['job_id']) ? $_POST['job_id'] : (isset($_GET['job_id']) ? $_GET['job_id'] : null);

// Check if a valid job ID is provided
if (!$jobId) {
    // Handle the case when no job ID is provided
    echo 'Invalid job ID';
    exit;
}

// Fetch the job details using the job ID
$jobData = $jobManager->getJobById($jobId);
//print_r($jobData);

// Check if the job exists
if (!$jobData) {
    // Handle the case when the job does not exist
    echo 'Job not found';
    exit;
}

// Get quiz questions for the job category
$jobCategoryId = $jobData['id'];
$quizQuestions = $jobManager->getQuizQuestions($jobCategoryId);

$score = 0;
foreach ($quizQuestions as $index => $questionData) {
 $questionId = $index + 1;
$selectedOption = isset($_POST["question$questionId"]) ? $_POST["question$questionId"] : null;
$correctOption = $questionData['correct_option'];
//print_r($correctOption);

if ($selectedOption === $correctOption) {

    $score++;
}


}
    session_start();
$userId = $_SESSION['user_id'];


$applicationData = [
    'user_id' => $userId,
    'job_id' => $jobId,
    'score' => $score,
    'company_id' => $jobData['company_id'],
];


$applicationId = $jobManager->applyJob($applicationData);


if ($applicationId) {
    echo "Your application has been submitted successfully.";
} else {
    echo "Failed to submit the application. Please try again.";
}

?>
