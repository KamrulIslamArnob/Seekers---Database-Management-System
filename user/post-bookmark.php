<?php
//require_once($_SERVER['DOCUMENT_ROOT'] . '/Seekers---job-portal-using-php-tailwind-mysql/user/BookmarkManager.php');
require_once 'BookmarkManager.php';

$bookmarkManager = new BookmarkManager();

$jobId = isset($_GET['job_id']) ? $_GET['job_id'] : null;

if (!$jobId) {
    echo 'Invalid job ID';
    exit;
}
    session_start();
$userId = $_SESSION['user_id'];

$isBookmarked = $bookmarkManager->isBookmarked($userId, $jobId);

$bookmarkClass = $isBookmarked ? 'bg-warning' : '';



if ($isBookmarked) {
    $bookmarkManager->removeBookmark($userId, $jobId);
    echo 'Bookmark removed successfully';
} else {
    $bookmarkManager->addBookmark($userId, $jobId);
    echo 'Bookmark added successfully';
}