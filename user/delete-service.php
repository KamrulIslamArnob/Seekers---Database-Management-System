<?php
session_start();
$conn = mysqli_connect("localhost","root","1","seekers_database") or die("connection failed");

// Check if service_id is provided in the URL
if (isset($_GET['service_id'])) {
    // Validate and sanitize service_id (you should enhance this)
    $service_id = $_GET['service_id'];

    // Delete the service with the specified service_id for the current user
    $user_id = $_SESSION['user_id'];
    $sql = "DELETE FROM services WHERE service_id = '$service_id' AND user_id = '$user_id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: services.php"); // Redirect back to the services page after successful deletion
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Service ID not provided.";
}
?>
