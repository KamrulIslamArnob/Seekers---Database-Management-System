<?php
//require_once($_SERVER['DOCUMENT_ROOT'] . '/Seekers---job-portal-using-php-tailwind-mysql/database/crud/DBConnection.php');
require_once '../database/crud/DBConnection.php';
class JobManager {
    private $db;

    public function __construct() {
        $this->db = new DBConnection();
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



     public function editJob($jobData) {
        $jobId = $jobData['job_id'];


        $escapedJobData = array_map([$this->db->conn, 'real_escape_string'], $jobData);

   $sql = "UPDATE jobs SET
            jobTitle = '{$escapedJobData['jobTitle']}',
            vacancy = {$escapedJobData['vacancy']},
            experience = '{$escapedJobData['experience']}',
            employeeType = '{$escapedJobData['employeeType']}',
            position = '{$escapedJobData['position']}',
            offerSalary = '{$escapedJobData['offerSalary']}',
            jobDescription = '{$escapedJobData['jobDescription']}',
            responsibilities = '{$escapedJobData['responsibilities']}',
            qualification = '{$escapedJobData['qualification']}',
            skillExperience = '{$escapedJobData['skillExperience']}',
            keywords = '{$escapedJobData['keywords']}',
            location = '{$escapedJobData['location']}',
            industry = '{$escapedJobData['industry']}',
            status = '{$escapedJobData['status']}'
        WHERE id = $jobId";


        return $this->db->conn->query($sql);
    }



 public function deleteJob($jobId)
    {
        $sql = "DELETE FROM jobs WHERE id = ?";
        $stmt = $this->db->prepare($sql);

        if ($stmt) {
            $stmt->bind_param('i', $jobId);
            $stmt->execute();
            $stmt->close();
            return true;
        } else {
            return false;
        }
    }


    public function getAppliedUsers($companyId) {
        $companyId = $this->db->conn->real_escape_string($companyId);
    
        $sql = "SELECT applications.*, jobs.jobTitle
                FROM applications
                JOIN jobs ON applications.job_id = jobs.id
                WHERE applications.company_id = '$companyId' AND applications.status = 1";
    
        $result = $this->db->conn->query($sql);
    
        $appliedUsers = [];
    
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $userId = $row['user_id'];
                $userDetails = $this->getUserDetails($userId);
    
                $appliedUsers[] = [
                    'user_id' => $userId,
                    'status' => $row['status'],
                    'job_title' => $row['jobTitle'],  
                    'user_details' => $userDetails,
                    'score' => $row['score'] ?? 'N/A',
                    'job_id'=> $row['job_id'],
                    'applicant_id' => $row['id']
                ];
            }
        }
    
        return $appliedUsers;
    }
    

private function getUserDetails($userId) {
    $userId = $this->db->conn->real_escape_string($userId);

    $sql = "SELECT * FROM users WHERE id = '$userId'";
    $result = $this->db->conn->query($sql);

    if ($result && $result->num_rows > 0) {
        return $result->fetch_assoc();
    }

    return null;
}

public function getQuizQuestions($jobId) {
    $jobId = $this->db->conn->real_escape_string($jobId);

    $sql = "SELECT * FROM jobs WHERE id = '$jobId'";
    $result = $this->db->conn->query($sql);

    $quizQuestions = [];

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Assuming your table has columns like 'question', 'option1', 'option2', 'option3', 'option4', 'correct_option'
            $quizQuestions[] = [
                'question' => $row['question'],
                'option1' => $row['option1'],
                'option2' => $row['option2'],
                'option3' => $row['option3'],
                'option4' => $row['option4'],
                'correct_option' => $row['correct_option'],
            ];
        }
    }

    return $quizQuestions;
}

public function updateScore($jobId, $score) {
    // Replace this with the actual logic to update the score in your database
    // You may need to adjust this based on your database schema and connection method
    $jobId = $this->db->conn->real_escape_string($jobId);
    $score = $this->db->conn->real_escape_string($score);

    $sql = "UPDATE jobs SET score = '$score' WHERE id = '$jobId'";
    $result = $this->db->conn->query($sql);

    return $result;
}


}



?>