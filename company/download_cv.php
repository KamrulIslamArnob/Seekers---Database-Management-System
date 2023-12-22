<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

//require_once($_SERVER['DOCUMENT_ROOT'] . '/Seekers---job-portal-using-php-tailwind-mysql/database/crud/DBConnection.php');
require_once '../database/crud/DBConnection.php';

if (isset($_GET['user_id'])) {
    $userId = $_GET['user_id'];

    // Implement the logic to fetch the CV file path based on the user ID from the database
    $cvFilePath = getCVFilePath($userId);

    if ($cvFilePath) {
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($cvFilePath) . '"');
        readfile($cvFilePath);
        exit;
    } else {
        echo 'CV file not found.';
    }
} else {
    echo 'Invalid request.';
}

function getCVFilePath($userId) {
    $db = new DBConnection();


  $sql = "SELECT cv FROM users WHERE id = $userId";

    $result = $db->conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $cvFilePath = $row['cv'];

        return $cvFilePath;
    } else {
        return false;
    }
}

?>
