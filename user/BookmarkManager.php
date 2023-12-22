<?php
//require_once($_SERVER['DOCUMENT_ROOT'] . '/Seekers---job-portal-using-php-tailwind-mysql/database/crud/DBConnection.php');
require_once '../database/crud/DBConnection.php';
class BookmarkManager {
    private $db;

    public function __construct() {
        $this->db = new DBConnection();
    }

    // Check if the job is bookmarked by the user
    public function isBookmarked($userId, $jobId) {
        $userId = $this->db->conn->real_escape_string($userId);
        $jobId = $this->db->conn->real_escape_string($jobId);

        $sql = "SELECT COUNT(*) as count FROM bookmarks WHERE user_id = '$userId' AND job_id = '$jobId'";
        $result = $this->db->conn->query($sql);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['count'] > 0;
        }

        return false;
    }

    // Add a bookmark for the user and job
    public function addBookmark($userId, $jobId) {
        $userId = $this->db->conn->real_escape_string($userId);
        $jobId = $this->db->conn->real_escape_string($jobId);

        $sql = "INSERT INTO bookmarks (user_id, job_id, bookmark_date) VALUES ('$userId', '$jobId', NOW())";
        $result = $this->db->conn->query($sql);

        return $result;
    }

    // Remove a bookmark for the user and job
    public function removeBookmark($userId, $jobId) {
        $userId = $this->db->conn->real_escape_string($userId);
        $jobId = $this->db->conn->real_escape_string($jobId);

        $sql = "DELETE FROM bookmarks WHERE user_id = '$userId' AND job_id = '$jobId'";
        $result = $this->db->conn->query($sql);

        return $result;
    }
}

?>