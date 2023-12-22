<?php





require_once('middleware.php');

//Middleware::startSession();
session_start();

$conn = new mysqli("localhost", "root", "1", "seekers_database") or die(mysqli_error("failed connection"));

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Middleware::startSession();

$username = $_POST['username'];
$password = $_POST['userpassword'];

if (Middleware::checkLoggedIn()) {
    header("Location: ../user/dashboard-user.php");
    exit();
}

// Use prepared statement to prevent SQL injection
$sql = "SELECT * FROM users WHERE user_name=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $row['role'];
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['status'] = $row['status'];
        $_SESSION['id'] = $row['id'];

      

        // Regenerate session ID to prevent session fixation attacks
        session_regenerate_id(true);

        if ($_SESSION['role'] == 'user') {
            header("Location:../user/dashboard-user.php");
        } else if ($_SESSION['role'] == 'admin') {
            header("Location:../admin/dashboard-admin.php");
        } else if ($_SESSION['role'] == 'company') {
            header("Location:../company/dashboard-company.php");
        }
    } else {
        echo "Invalid password";
    }
} else {
    echo "User not found";
}

$stmt->close();
$conn->close();
?>
