<!DOCTYPE html>
<html lang="en" dir="ltr" data-mode="light" class="scroll-smooths group" data-theme-color="violet">

<head>
    <meta charset="utf-8" />
    <title>Registration | Jobcy - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta content="Tailwind Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="Themesbrand" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico" />
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Choise Css -->
    <link rel="stylesheet" href="../assets/libs/choices.js/public/assets/styles/choices.min.css">

    <link rel="stylesheet" href="../assets/css/icons.css" />
    <link rel="stylesheet" href="../assets/css/tailwind.css" />




</head>

<body class="bg-white dark:bg-neutral-800">

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

//require_once($_SERVER['DOCUMENT_ROOT'] . '/Seekers---job-portal-using-php-tailwind-mysql/database/crud/DBConnection.php');
require_once '../database/crud/DBConnection.php';
// Check if user ID is provided in the URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Create an instance of the DBConnection class
    $db = new DBConnection();

    // Get the user ID from the URL
    $userId = $_GET['id'];

    // Fetch user data based on the user ID
    $sql = "SELECT * FROM users WHERE id = $userId";
    $result = $db->conn->query($sql);

    if ($result->num_rows > 0) {

        $userData = $result->fetch_assoc();

 
        $name = $userData['name'];
        $user_name = $userData['user_name'];
        $email = $userData['email'];
        $password = $userData['password']; 
        $birthdate = $userData['DOB']; 
        $address = $userData['address'];
        $designation = $userData['designation'];
        $role = $userData['role'];
        $status = $userData['status'];
        $nationality = $userData['Nationality'];
        $userId = $userData['id'];
    } else {
        // User not found
        echo "User not found.";
        exit;
    }
} else {
    // No user ID provided in the URL
    echo "Invalid request.";
    exit;
}
?>


    <?php
    session_start();
    if(!isset($_SESSION['username'])) {
        header("Location:http://localhost/Seekers---job-portal-using-php-tailwind-mysql/index.php");

    }else if($_SESSION['role']=='user'){
        header("Location:http://localhost/Seekers---job-portal-using-php-tailwind-mysql/user/dashboard-user.php");
    }else if($_SESSION['role']=='company'){
        header("Location:http://localhost/Seekers---job-portal-using-php-tailwind-mysql/user/dashboard-user.php");
    }

    ?>

    <div class="main-content">
        <div class="page-content">

            <section
                class="pt-28 lg:pt-44 pb-28 group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500 dark:bg-neutral-900 bg-[url('../images/home/page-title.png')] bg-center bg-cover relative">
                <div class="container mx-auto">
                    <div class="grid">
                        <div class="col-span-12">
                            <div class="text-center text-white">
                                <h3 class="mb-4 text-[26px]">Edit User</h3>
                                <div class="page-next">
                                    <nav class="inline-block" aria-label="breadcrumb text-center">
                                        <ol class="flex flex-wrap justify-center text-sm font-medium uppercase">
                                            <li><a href="index.html">Home</a></li>
                                            <li><i class="bx bxs-chevron-right align-middle px-2.5"></i><a
                                                    href="javascript:void(0)">Profile</a></li>
                                            <li class="active" aria-current="page"><i
                                                    class="bx bxs-chevron-right align-middle px-2.5"></i>Edit User
                                            </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <img src="assets/images/about/shape.png" alt="" class="absolute block bg-cover -bottom-0 dark:hidden">
                <img src="assets/images/about/shape-dark.png" alt=""
                    class="absolute hidden bg-cover -bottom-0 dark:block">
            </section>

            <!-- Start grid -->
            <section class="py-20">

<h2 class="mb-4">Edit User</h2>

<form action="process_edit_user.php" method="post" onsubmit="return validateForm()">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" required>
    </div>

    <div class="form-group">
        <label for="user_name">Username:</label>
        <input type="text" class="form-control" id="user_name" name="user_name" value="<?php echo $user_name; ?>" required>
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
    </div>
    <input type="hidden" name="user_id" value="<?php echo $userId; ?>">

    <div class="form-group">
        <label for="role">Role:</label>
        <select class="form-control" id="role" name="role" required>
            <option value="company" <?php echo ($role == 'company') ? 'selected' : ''; ?>>Company</option>
            <option value="user" <?php echo ($role == 'user') ? 'selected' : ''; ?>>User</option>
            <option value="admin" <?php echo ($role == 'admin') ? 'selected' : ''; ?>>Admin</option>
        </select>
    </div>

    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>

    <div class="form-group">
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
    </div>

    <div class="form-group">
        <label for="status">Status:</label>
        <select class="form-control" id="status" name="status" required>
            <option value="active" <?php echo ($status == 'active') ? 'selected' : ''; ?>>Active</option>
            <option value="inactive" <?php echo ($status == 'inactive') ? 'selected' : ''; ?>>Inactive</option>
        </select>
    </div>

    <div class="form-group">
        <label for="birthdate">Date of Birth:</label>
        <input type="date" class="form-control" id="birthdate" name="birthdate" value="<?php echo $birthdate; ?>" required>
    </div>

    <div class="form-group">
        <label for="address">Address:</label>
        <input type="text" class="form-control" id="address" name="address" value="<?php echo $address; ?>" required>
    </div>

    <div class="form-group">
        <label for="nationality">Nationality:</label>
        <input type="text" class="form-control" id="nationality" name="nationality" value="<?php echo $nationality; ?>" required>
    </div>

    <!-- Add other fields as needed -->

    <button type="submit" class="btn text-dark btn-primary">Update</button>
</form>
            </section>
        </div>
    </div>


     <?php
        include('../user/footer.php');
        ?>


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
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>



        <script>
        function validateForm() {
            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('confirm_password').value;

            if (password !== confirmPassword) {
                alert("Password and Confirm Password do not match.");
                return false;
            }
            return true;
        }
    </script>

    
<script>
    function validateForm() {

        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirm_password").value;

        if (password !== confirmPassword) {
            alert("Password and Confirm Password must match.");
            return false;
        }


        return true; 
    }
</script>
</body>

</html>