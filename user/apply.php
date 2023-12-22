<?php
// apply.php

// Include necessary files and classes
//require_once($_SERVER['DOCUMENT_ROOT'] . '/Seekers---job-portal-using-php-tailwind-mysql/user/JobManager.php');
require_once 'JobManager.php';
$jobManager = new JobManager();

$jobId = isset($_GET['job_id']) ? $_GET['job_id'] : null;

if (!$jobId) {
    echo 'Invalid job ID';
    exit;
}

$jobData = $jobManager->getJobById($jobId);

if (!$jobData) {
    echo 'Job not found';
    exit;
}

$jobCategoryId = $jobData['jobCategory']; 

$quizQuestions = $jobManager->getQuizQuestions($jobId);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply for <?php echo $jobData['jobTitle']; ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <h1>Apply for <?php echo $jobData['jobTitle']; ?></h1>
    





<form action="process_application.php" method="post">
    <input type="hidden" name="job_id" value="<?php echo $jobData['id']; ?>">
    <?php foreach ($quizQuestions as $index => $questionData) : ?>
        <?php
        $questionId = $index + 1;
        $questionText = $questionData['question'];
        ?>

        <div class="mb-3">
            <label for="question<?php echo $questionId; ?>" class="form-label">
                Question <?php echo $questionId; ?>: <?php echo $questionText; ?>
            </label>
           <select id="question<?php echo $questionId; ?>" name="question<?php echo $questionId; ?>" class="form-select" required>
                <option value="<?php echo $questionData['option1']; ?>">Option A: <?php echo $questionData['option1']; ?></option>
                <option value="<?php echo $questionData['option2']; ?>">Option B: <?php echo $questionData['option2']; ?></option>
                <option value="<?php echo $questionData['option3']; ?>">Option C: <?php echo $questionData['option3']; ?></option>
                <option value="<?php echo $questionData['option4']; ?>">Option D: <?php echo $questionData['option4']; ?></option>
            </select>

        </div>

        <input type="hidden" name="correct_answer<?php echo $questionId; ?>" value="<?php echo $questionData['correct_option']; ?>">
    <?php endforeach; ?>

    <button type="submit" class="btn btn-primary">Submit Application</button>
</form>





    

</body>

</html>
