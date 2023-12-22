<?php
// Include the database connection class
//require_once($_SERVER['DOCUMENT_ROOT'] . '/Seekers---job-portal-using-php-tailwind-mysql/database/crud/DBConnection.php');

require_once '../database/crud/DBConnection.php';
class JobManager {
    private $db;

    public function __construct() {
        $this->db = new DBConnection();
    }

    public function searchJobs() {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if (isset($_GET['job_title'])) {
                $searchValue = $this->db->conn->real_escape_string($_GET['job_title']);
            if($searchValue == ""){
                echo "Please insert company name or job title name for searching.";
            }else{
               session_start();
                $currentUserId = $_SESSION['user_id'];
                $userId = $this->db->conn->real_escape_string($currentUserId);

            $sql = "SELECT jobs.*, users.name
        FROM jobs
        LEFT JOIN users ON jobs.company_id = users.id
        WHERE (LOWER(jobs.jobTitle) LIKE LOWER('%$searchValue%')
           OR LOWER(users.name) LIKE LOWER('%$searchValue%'))";


                $result = $this->db->conn->query($sql);

                if ($result) {
           if ($result->num_rows > 0) {
    $searchResults = array();

    while ($row = $result->fetch_assoc()) {
        $searchResults[] = $row;
    }

    // Store the search results in the session
    $_SESSION['search_results'] = $searchResults;

    // Redirect to the search results page
    header("Location: job-search-result.php");
    exit();
} else {
                echo "No jobs found.";
            }
        } else {
            echo "Error executing the query: " . $this->db->conn->error;
        }
            }
  
            }
        }
    }



   
}

$jobManager = new JobManager();
$jobManager->searchJobs();
?>