<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


//require_once($_SERVER['DOCUMENT_ROOT'] . '/Seekers---job-portal-using-php-tailwind-mysql/database/crud/DBConnection.php');
require_once '../database/crud/DBConnection.php';

class UserManager
{
    private $db;

    public function __construct()
    {
        $this->db = new DBConnection();
    }

    public function updateUser($userId, $name, $user_name, $email, $role, $status, $password, $birthdate, $address, $nationality)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "UPDATE users SET
                name = '{$name}',
                user_name = '{$user_name}',
                email = '{$email}',
                role = '{$role}',
                status = '{$status}',
                password = '{$hashedPassword}',
                DOB = '{$birthdate}',
                address = '{$address}',
                Nationality = '{$nationality}'
                WHERE id = {$userId}";

        $result = $this->db->conn->query($sql);

        return $result;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST['user_id'];
    $name = $_POST['name'];
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $status = $_POST['status'];
    $password = $_POST['password']; 
    $birthdate = $_POST['birthdate'];
    $address = $_POST['address'];
    $nationality = $_POST['nationality'];

  
    $userManager = new UserManager();
    $result = $userManager->updateUser($userId, $name, $user_name, $email, $role, $status, $password, $birthdate, $address, $nationality);

    if ($result) {
        echo "User information updated successfully!";
    } else {
        echo "Error updating user information.";
    }
} else {
    // Redirect to an error page or handle the situation accordingly
    echo "Invalid request.";
}

?>
