<?php
$conn = new mysqli("localhost", "root", "1", "seekers_database");

if($conn->connect_error) {
    die("Connection failed: ".$conn->connect_error);
}

$username = $_POST['username'];
$email = $_POST['useremail'];
$password = password_hash($_POST['userpassword'], PASSWORD_BCRYPT);
$role = $_POST['role'];

// Use prepared statement to prevent SQL injection
$sql = "INSERT INTO users (user_name, email, password, role) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $username, $email, $password, $role);

if($stmt->execute()) {
    header("Location:sign-in.php");
} else {
    echo "Error: Registration failed.";
}

$stmt->close();
$conn->close();
?>
