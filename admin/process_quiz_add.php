<?php
//require_once($_SERVER['DOCUMENT_ROOT'] . '/Seekers---job-portal-using-php-tailwind-mysql/admin/JobManager.php');
require_once 'JobManager.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jobManager = new JobManager();

    $jobCategoryId = $_POST["jobCategory"];
    $question = $_POST["question"];
    $option1 = $_POST["option1"];
    $option2 = $_POST["option2"];
    $option3 = $_POST["option3"];
    $option4 = $_POST["option4"];
    $correctOption = $_POST["correctOption"];

    $result = $jobManager->saveQuiz($jobCategoryId, $question, $option1, $option2, $option3, $option4, $correctOption);

    if ($result === true) {
      echo "Quize has been added.";
        exit;
    } else {
        echo $result;
    }
}
?>
