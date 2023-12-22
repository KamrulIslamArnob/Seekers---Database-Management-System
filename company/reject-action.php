<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../Vendor/PHPmailer/Exception.php';
require '../Vendor/PHPmailer/PHPMailer.php';
require '../Vendor/PHPmailer/SMTP.php';

// Replace these with your actual database connection details
$servername = "localhost";
$username = "root";
$password = "1";
$dbname = "seekers_database";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assume you have received these parameters through the GET request
$userID = $_GET['user_id']; // Replace with the actual method you use to get user ID
$applicationID = $_GET['application_id']; // Replace with the actual method you use to get application ID
$jobID = $_GET['job_id']; // Replace with the actual method you use to get job ID

// Fetch relevant information from the database
$sql = "SELECT u.email AS user_email, j.jobTitle, j.company_id,u.name,a.company_id
FROM applications a
JOIN jobs j ON a.job_id = j.id
JOIN users u ON a.user_id = u.id
WHERE a.id = $applicationID AND j.id = $jobID";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        // ... (Your rejection logic here)

           //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth = true;                                   //Enable SMTP authentication
    $mail->Username = 'connect.arnob@gmail.com';                     //SMTP username
    $mail->Password = 'gaaf mlnh lyml rzlm';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port = 465;   
        // ... (Your other email settings)

        // Recipients
        $mail->setFrom('connect.arnob@gmail.com', 'Mailer');
        $mail->addAddress($row['user_email'], $row['name']); // Add a recipient

        // ... (Your other email content and settings)

        // Replace these with the actual values from the database
        //$applicantName = $row['name'];
        $aplicantName = $row['name'];
        $jobTitle = $row['jobTitle'];

        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'Rejection for ' . $jobTitle;
        $mail->Body = "Dear $aplicantName,<br><br>
                          We regret to inform you that your application for the position of $jobTitle apply has been rejected.<br><br>
                          Thank you for your interest in our company.<br><br>
                          Sincerely,<br>
                          Your Company";

        $mail->send();
        echo 'Reject action successful';
        $deleteSql = "DELETE FROM applications WHERE id = $applicationID";
        if ($conn->query($deleteSql) === TRUE) {
            echo 'Reject action successful. Application data deleted.';
        } else {
            echo "Error deleting application data: " . $conn->error;
        }

    } catch (Exception $e) {
      
        echo "Reject action failed. Mailer Error: {$mail->ErrorInfo}";
    }
} else {

    echo "Error: Could not fetch information from the database";
}

$conn->close();
?>