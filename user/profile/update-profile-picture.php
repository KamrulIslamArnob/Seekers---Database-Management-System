<?php
require_once '../../database/crud/UserCRUD.php';

session_start();

$response = ['success' => false, 'message' => ''];

if (isset($_SESSION["username"]) && isset($_FILES['dp-img']) && $_FILES['dp-img']['error'] === UPLOAD_ERR_OK) {
    $userId = $_SESSION['user_id'];
    $uploadDirectory = '../saved-data/user-profile-image/';
    $uploadDirectory2 = 'saved-data/user-profile-image/';

    // Ensure the directory exists
    if (!is_dir($uploadDirectory)) {
        mkdir($uploadDirectory, 0755, true);
    }

    $fileExtension = pathinfo($_FILES['dp-img']['name'], PATHINFO_EXTENSION);
    $newFileName = "profile_picture_{$userId}.{$fileExtension}";
    $uploadPath = $uploadDirectory . $newFileName;
    $uploadPath2 = $uploadDirectory2 . $newFileName;

    // Move the uploaded file to the desired directory
    if (move_uploaded_file($_FILES['dp-img']['tmp_name'], $uploadPath)) {
        // Update the database with the file path
        $userCRUD = new CRUD('users');
        $updateData = ['profile_picture' => $uploadPath2]; // Update with the full URL
        $userCRUD->updateRow($userId, $updateData);

        $response['success'] = true;
        $response['message'] = 'Profile picture updated successfully.';
    } else {
        $response['message'] = 'Error moving the uploaded file.';
    }
} else {
    $response['message'] = 'Invalid request or file upload error.';
}

header('Content-Type: application/json');
echo json_encode($response);
?>
