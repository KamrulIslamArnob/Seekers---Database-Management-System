<?php
// Include necessary files and classes
//require_once($_SERVER['DOCUMENT_ROOT'] . '/Seekers---job-portal-using-php-tailwind-mysql/company/JobManager.php');
require_once 'JobManager.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jobManager = new JobManager();


    $jobData = [
        'jobTitle' => $_POST['jobTitle'],
        'vacancy' => $_POST['vacancy'],
        'experience' => $_POST['experience'],
        'employeeType' => $_POST['employeeType'],
        'position' => $_POST['position'],
        'offerSalary' => $_POST['offerSalary'],
        'jobDescription' => $_POST['jobDescription'],
        'responsibilities' => $_POST['responsibilities'],
        'qualification' => $_POST['qualification'],
        'skillExperience' => $_POST['skillExperience'],
        'keywords' => $_POST['keywords'],
        'location' => $_POST['location'],
        'industry' => $_POST['industry'],
        'job_id' => $_POST['job_id'],
        'status' => 1,
    ];

    // Perform the job edit
    $result = $jobManager->editJob($jobData);

    if ($result) {
    
        echo "Your job updated successfully!.";
        exit();
    } else {
        echo "Error: Unable to edit the job.";
    }
}
?>
