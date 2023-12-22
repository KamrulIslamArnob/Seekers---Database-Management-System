<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

//require_once($_SERVER['DOCUMENT_ROOT'] . '/Seekers---job-portal-using-php-tailwind-mysql/database/crud/DBConnection.php');
require_once '../database/crud/DBConnection.php';
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Create an instance of the DBConnection class
    $db = new DBConnection();

    $userId = $_GET['id'];

    $sql = "DELETE FROM users WHERE id = $userId";

    $result = $db->conn->query($sql);

    if ($result) {
        echo "User has been deleted.";
    } else {
        // Error occurred during deletion
        echo "Error: " . $db->conn->error;
    }
} else {
    // No user ID provided in the URL
    echo "Invalid request.";
}
?>
