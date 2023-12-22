<?php
//require_once($_SERVER['DOCUMENT_ROOT'] . '/Seekers---job-portal-using-php-tailwind-mysql/database/crud/DBConnection.php');
require_once '../database/crud/DBConnection.php';
class JobManager {
    private $db;

    public function __construct() {
        $this->db = new DBConnection();
    }


public function updateJobStatus($jobId, $status) {
    $escapedJobId = $this->db->conn->real_escape_string($jobId);
    $escapedStatus = $this->db->conn->real_escape_string($status);

    $sql = "UPDATE jobs SET status = '$escapedStatus' WHERE id = '$escapedJobId'";

    return $this->db->conn->query($sql);
}


  public function getJobById($jobId) {

        $sql = "SELECT * FROM jobs WHERE id = " . (int)$jobId;
        $result = $this->db->conn->query($sql);

        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc(); 
        } else {
            return null; 
        }
    }


    public function getQuizQuestions($jobId) {
    $sql = "SELECT * FROM quizzes WHERE job_id = '$jobId' ORDER BY RAND() LIMIT 5";
    $result = $this->db->conn->query($sql);

    $quizQuestions = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $quizQuestions[] = $row;
        }
    }

    return $quizQuestions;
}


    public function applyJob($applicationData) {
        $userId = $applicationData['user_id'];
        $jobId = $applicationData['job_id'];
        $status = 1;
        $score = $applicationData['score'];
        $companyId = $applicationData['company_id'];
       
         $this->addAppliedUser($applicationData['job_id'], $applicationData['user_id']);
        $sql = "INSERT INTO applications (user_id, job_id, status, score, company_id) VALUES ('$userId', '$jobId', '$status', '$score', '$companyId')";

        if ($this->db->conn->query($sql) === TRUE) {
            return $this->db->conn->insert_id;
        } else {
            return false;
        }
    }


    public function addAppliedUser($jobId, $userId) {
    $jobId = (int) $jobId;
    $userId = (int) $userId;

    $sql = "SELECT applied_users FROM jobs WHERE id = $jobId";
    $result = $this->db->conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $appliedUsers = $row['applied_users'];

        $appliedUsers .= ($appliedUsers !== '') ? ",$userId" : "$userId";

        $sql = "UPDATE jobs SET applied_users = '$appliedUsers' WHERE id = $jobId";
        $this->db->conn->query($sql);
    }



}}



?>