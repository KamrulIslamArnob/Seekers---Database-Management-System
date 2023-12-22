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
$sql = "SELECT u.email AS user_email, j.jobTitle, j.company_id,u.name,a.company_id,j.offerSalary
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
        $offerSalary = $row['offerSalary'];

        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'Congratulations for getting ' . $jobTitle;
        $mail->Body = "<p>Congratulations! We are pleased to extend an offer for the $jobTitle role at our company. Your skills and experience stood out, and we believe you\'ll be a great addition to our team.</p>
        <ul>
            <li><strong>Start Date:</strong> 1/2/24</li>
            <li><strong>Salary:</strong> $offerSalary</li>
        </ul>
        <p>Please review the attached offer letter and let us know your decision by [Acceptance Deadline].</p>
        <p>We look forward to welcoming you to our company.</p>
        ";

        $mail->send();
        echo 'accept action successful';
        // Update status in the applications table
        $updateSql = "UPDATE applications SET status = '2' WHERE id = $applicationID";
        if ($conn->query($updateSql) === TRUE) {
            echo 'Hire action successful. Application status updated.';
        } else {
            echo "Error updating application status: " . $conn->error;
        }

    } catch (Exception $e) {
      
        echo "accept action failed. Mailer Error: {$mail->ErrorInfo}";
    }
} else {

    echo "Error: Could not fetch information from the database";
}

$conn->close();
?>

