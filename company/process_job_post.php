<?php

// Enable error reporting for debugging (remove in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the database connection class
//require_once($_SERVER['DOCUMENT_ROOT'] . '/Seekers---job-portal-using-php-tailwind-mysql/database/crud/DBConnection.php');
require_once '../database/crud/DBConnection.php';
     session_start();
class JobManager {
    private $db;

    public function __construct() {
        $this->db = new DBConnection();
    }


    

 public function saveJob($jobData) {
     $currentUserId = $_SESSION['user_id'];
    $escapedJobData = array_map([$this->db->conn, 'real_escape_string'], $jobData);

    // Build the SQL query
    $sql = "INSERT INTO jobs (jobTitle, vacancy, experience, employeeType, position, offerSalary, jobDescription, responsibilities, qualification, skillExperience, keywords, location, industry, jobCategory, company_id)
            VALUES (
                '{$escapedJobData['jobTitle']}',
                {$escapedJobData['vacancy']},
                '{$escapedJobData['experience']}',
                '{$escapedJobData['employeeType']}',
                '{$escapedJobData['position']}',
                '{$escapedJobData['offerSalary']}',
                '{$escapedJobData['jobDescription']}',
                '{$escapedJobData['responsibilities']}',
                '{$escapedJobData['qualification']}',
                '{$escapedJobData['skillExperience']}',
                '{$escapedJobData['keywords']}',
                '{$escapedJobData['location']}',
                '{$escapedJobData['industry']}',
                '{$escapedJobData['jobCategory']}',
                '{$currentUserId}'
            )";

    // Execute the query
    if ($this->db->conn->query($sql)) {

  
        $jobId = $this->db->conn->insert_id;

        $_SESSION['job_id'] = $jobId;
    } else {
        echo "Error: " . $sql . "<br>" . $this->db->conn->error;
    }
}

    public function saveQuiz($quizData) {
       
   
        $escapedQuizeData = array_map([$this->db->conn, 'real_escape_string'], $quizData);

        // Build the SQL query
        $sql = "INSERT INTO quizzes  (job_id, question, option1, option2, option3, option4, correct_option)
        VALUES (
            '{$quizData['job_id']}',
            '{$escapedQuizeData['question']}',
            '{$escapedQuizeData['option1']}',
            '{$escapedQuizeData['option2']}',
            '{$escapedQuizeData['option3']}',
            '{$escapedQuizeData['option4']}',
            '{$escapedQuizeData['correct_option']}'
        )";


         $result = $this->db->conn->query($sql);

        if ($result) {
            echo "Job has been successfully posted.";
        } else {
           echo "Job posted failed.";
        }
    }
}




// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
       $jobData = $_SESSION['job_data'];
    $jobManager = new JobManager();

    $currentUserId = $_SESSION['user_id'];

 

    // // // Save the job data
    $jobManager->saveJob($jobData);
    $jobId = isset($_SESSION['job_id']) ? $_SESSION['job_id'] : null;

$quizzes = [];


for ($i = 1; $i <= 2; $i++) {

    if (isset($_POST['question' . $i])) {
        $quizData = [
            'job_id' => $jobId, 
            'question' => $_POST['question' . $i],
            'option1' => $_POST['option1' . $i],
            'option2' => $_POST['option2' . $i],
            'option3' => $_POST['option3' . $i],
            'option4' => $_POST['option4' . $i],
            'correct_option' => $_POST['correctOption' . $i],
        ];

        $quizzes[] = $quizData;
    }
}



foreach ($quizzes as $quizData) {
    $jobManager->saveQuiz($quizData);
}

} else {
    // Handle the case when the form is not submitted
    echo "Form not submitted.";
}

?>
