<?php
session_start();
$conn = mysqli_connect("localhost","root","1","seekers_database") or die("connection failed");

// Check if service_id is provided in the URL
if (isset($_GET['service_id'])) {
    // Validate and sanitize service_id (you should enhance this)
    $service_id = $_GET['service_id'];

    // Fetch the service details for the specified service_id and user_id
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM services WHERE service_id = '$service_id' AND user_id = '$user_id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Validate and sanitize input data (you should enhance this)
            $job_id = $_POST['job_id'];
            $job_title = $_POST['job_title'];
            $service_logo = $_POST['service_logo'];
            $description = $_POST['description'];

            // Update the service with the specified service_id for the current user
            $sql_update = "UPDATE services SET job_id = '$job_id', job_title = '$job_title', service_logo = '$service_logo', description = '$description' WHERE service_id = '$service_id' AND user_id = '$user_id'";

            if (mysqli_query($conn, $sql_update)) {
                header("Location: services.php"); // Redirect back to the services page after successful update
                exit();
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
        }
    } else {
        echo "Service not found for the specified ID.";
        exit();
    }
} else {
    echo "Service ID not provided.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico" />

    <link rel="stylesheet" href="../assets/libs/choices.js/public/assets/styles/choices.min.css">
    <!-- Nouislider Css -->
    <link rel="stylesheet" href="../assets/libs/nouislider/nouislider.min.css">

    <link rel="stylesheet" href="../assets/css/icons.css" />
    <link rel="stylesheet" href="../assets/css/tailwind.css" />
</head>
<body>

<?php include('nav1.php'); ?>

<section class="mt-20 flex-grow flex items-center justify-center">
    <div class="container mx-auto">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] . '?service_id=' . $service_id; ?>" class="max-w-md mx-auto bg-white p-8 rounded-md shadow-md">
            <div class="grid grid-cols-2 gap-4">
                <!-- First Column -->
                <div class="mb-4">
                    <label for="job_id" class="block text-gray-600 text-sm font-medium mb-2">Job ID:</label>
                    <input type="text" name="job_id" value="<?php echo $row['job_id']; ?>" class="w-full border rounded-md px-3 py-2" required>
                </div>

                <div class="mb-4">
                    <label for="job_title" class="block text-gray-600 text-sm font-medium mb-2">Job Title:</label>
                    <input type="text" name="job_title" value="<?php echo $row['job_title']; ?>" class="w-full border rounded-md px-3 py-2" required>
                </div>

                <!-- Second Column -->
                <div class="mb-4">
                    <label for="service_logo" class="block text-gray-600 text-sm font-medium mb-2">Service Logo:</label>
                    <input type="text" name="service_logo" value="<?php echo $row['service_logo']; ?>" class="w-full border rounded-md px-3 py-2" required>
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-600 text-sm font-medium mb-2">Description:</label>
                    <textarea name="description" class="w-full border rounded-md px-3 py-2" required><?php echo $row['description']; ?></textarea>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="bg-purple-500 mb-5 text-white px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                Update Service
            </button>
        </form>
    </div>
</section>

<?php include('footer.php') ?>

<script src="https://unicons.iconscout.com/release/v4.0.0/script/monochrome/bundle.js"></script>
    <script src="../assets/libs/@popperjs/core/umd/popper.min.js"></script>
    <script src="../assets/libs/simplebar/simplebar.min.js"></script>

    <script src="../assets/js/pages/switcher.js"></script>

    <!-- Choice Js -->
    <script src="../assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>

    <script src="../assets/js/pages/candidate.init.js"></script>

    <script src="../assets/js/pages/dropdown&modal.init.js"></script>

    <script src="../assets/js/pages/nav&tabs.js"></script>

    <script src="../assets/js/app.js"></script>
</body>
</html>
