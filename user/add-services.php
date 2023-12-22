<?php
session_start();
$conn = mysqli_connect("localhost","root","1","seekers_database") or die("connection failed");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input data (you should enhance this)
    $user_id = $_SESSION['user_id'];
    $job_id = $_POST['job_id'];
    $job_title = $_POST['job_title'];
    $service_logo = $_POST['service_logo'];
    $description = $_POST['description'];

    // Insert data into the services table
    $sql = "INSERT INTO services (user_id, job_id, job_title, service_logo, description) VALUES ('$user_id', '$job_id', '$job_title', '$service_logo', '$description')";

    if (mysqli_query($conn, $sql)) {
        header("Location: services.php"); // Redirect back to the services page after successful insertion
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
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
    <div class="container">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="max-w-md mx-auto bg-white p-8 rounded-md shadow-md">
            <!-- First Column -->
            <div class="mb-4">
                <label for="job_id" class="block text-gray-600 text-sm font-medium mb-2">Job ID:</label>
                <input type="text" name="job_id" class="w-full border rounded-md px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label for="job_title" class="block text-gray-600 text-sm font-medium mb-2">Job Title:</label>
                <input type="text" name="job_title" class="w-full border rounded-md px-3 py-2" required>
            </div>

            <!-- Second Column -->
            <div class="mb-4">
                <label for="service_logo" class="block text-gray-600 text-sm font-medium mb-2">Service Logo:</label>
                <input type="text" name="service_logo" class="w-full border rounded-md px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-600 text-sm font-medium mb-2">Description:</label>
                <textarea name="description" class="w-full border rounded-md px-3 py-2" required></textarea>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="bg-purple-500 text-white px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                Add Service
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
