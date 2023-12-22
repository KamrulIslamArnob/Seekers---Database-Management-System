<?php

// Enable error reporting for debugging (remove in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the database connection class
//require_once($_SERVER['DOCUMENT_ROOT'] . '/Seekers---job-portal-using-php-tailwind-mysql/database/crud/DBConnection.php');
require_once '../database/crud/DBConnection.php';
class UserManager {
    private $db;

    public function __construct() {
        $this->db = new DBConnection();
    }

    public function registerUser($userData) {
        $escapedUserData = array_map([$this->db->conn, 'real_escape_string'], $userData);

        // Hash the password before storing it
        $hashedPassword = password_hash($escapedUserData['password'], PASSWORD_DEFAULT);

        // Build the SQL query
       $sql = "INSERT INTO users (name, user_name, email, password, role, status, DOB, address, designation)
        VALUES (
            '{$escapedUserData['name']}',
            '{$escapedUserData['user_name']}',
            '{$escapedUserData['email']}',
            '$hashedPassword',
            '{$escapedUserData['role']}',
            '{$escapedUserData['status']}',
            '{$escapedUserData['birthdate']}',
            '{$escapedUserData['address']}',
            '{$escapedUserData['designation']}'
        )";


        // Execute the query
        if ($this->db->conn->query($sql)) {
            echo "User registered successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $this->db->conn->error;
        }
    }
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userManager = new UserManager();

    // Collect form data
    $userData = [
        'name' => $_POST['name'],
        'user_name' => $_POST['user_name'],
        'email' => $_POST['email'],
        'password' => $_POST['password'], 
        'role' => $_POST['role'],
        'status' => $_POST['status'],
        'birthdate' => $_POST['birthdate'],
        'address' => $_POST['address'],
        'designation' => $_POST['designation']
    ];

    // Register the user
    $userManager->registerUser($userData);
} else {
    // Handle the case when the form is not submitted
    echo "Form not submitted.";
}

?>
