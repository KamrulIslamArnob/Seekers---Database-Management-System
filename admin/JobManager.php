<?php
//require_once($_SERVER['DOCUMENT_ROOT'] . '/Seekers---job-portal-using-php-tailwind-mysql/database/crud/DBConnection.php');
require_once '../database/crud/DBConnection.php';
class JobManager
{
    private $db;

    public function __construct()
    {
        $this->db = new DBConnection();
    }


    public function updateJobStatus($jobId, $status)
    {
        $escapedJobId = $this->db->conn->real_escape_string($jobId);
        $escapedStatus = $this->db->conn->real_escape_string($status);

        $sql = "UPDATE jobs SET status = '$escapedStatus' WHERE id = '$escapedJobId'";

        return $this->db->conn->query($sql);
    }


    public function addJobCategory($categoryName)
    {

        $escapedCategoryName = $this->db->conn->real_escape_string($categoryName);

        $sql = "INSERT INTO job_categories (name) VALUES ('$escapedCategoryName')";
        $result = $this->db->conn->query($sql);

        if ($result) {
            return  $result;
        } else {
            return false;
        }
    }


    public function getAllJobCategories()
    {
        $sql = "SELECT * FROM job_categories";
        $result = $this->db->conn->query($sql);

        $jobCategories = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $jobCategories[] = $row;
            }
        }

        return $jobCategories;
    }


    public function getAllJobQuizes()
    {
        $sql = "SELECT * FROM quizzes ";
        $result = $this->db->conn->query($sql);

        $quizes = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $quizes[] = $row;
            }
        }

        return $quizes;
    }


    public function saveQuiz($jobCategoryId, $question, $option1, $option2, $option3, $option4, $correctOption)
    {
        $sql = "INSERT INTO quizzes (job_category_id, question, option1, option2, option3, option4, correct_option) 
                VALUES ('$jobCategoryId', '$question', '$option1', '$option2', '$option3', '$option4', '$correctOption')";

        if ($this->db->conn->query($sql) === TRUE) {
            return true;
        } else {
            return "Error: " . $sql . "<br>" . $this->db->conn->error;
        }
    }
}
