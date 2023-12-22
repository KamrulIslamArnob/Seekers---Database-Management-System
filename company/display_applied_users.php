<?php
session_start();
// Seekers---job-portal-using-php-tailwind-mysql/company/applied-users.php

// Include necessary files and classes
//require_once($_SERVER['DOCUMENT_ROOT'] . '/Seekers---job-portal-using-php-tailwind-mysql/database/crud/DBConnection.php');
//require_once($_SERVER['DOCUMENT_ROOT'] . '/Seekers---job-portal-using-php-tailwind-mysql/company/JobManager.php');
require_once '../database/crud/DBConnection.php';
require_once 'JobManager.php';
// Your existing code
$currentUserId = $_SESSION['user_id'];
$companyId = $currentUserId; 

$jobManager = new JobManager();
$appliedUsers = $jobManager->getAppliedUsers($companyId);

if ($appliedUsers) {
    
    foreach ($appliedUsers as $appliedUser) {
        echo '<p>User ID: ' . $appliedUser['user_id'] . ', Status: ' . $appliedUser['status'] . '</p>';
        
        // Display additional user details
        echo '<ul>';
        foreach ($appliedUser['user_details'] as $key => $value) {
            echo '<li>' . ucfirst($key) . ': ' . $value . '</li>';
        }
        echo '</ul>';
    }
} else {
    echo 'No applied users found.';
}
?>
