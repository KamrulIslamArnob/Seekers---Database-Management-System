<?php
// Start the session
session_start();

if (!isset($_SESSION['username'])) {
    header("Location:http://localhost/Seekers---job-portal-using-php-tailwind-mysql/index.php");
} else if ($_SESSION['role'] == 'admin') {
    header("Location:http://localhost/Seekers---job-portal-using-php-tailwind-mysql/admin/dashboard-admin.php");
} else if ($_SESSION['role'] == 'user') {
    header("Location:http://localhost/Seekers---job-portal-using-php-tailwind-mysql/user/dashboard-user.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico" />

    <link rel="stylesheet" href="../assets/libs/choices.js/public/assets/styles/choices.min.css">

    <!-- Swiper Css -->
    <link rel="stylesheet" href="../assets/libs/swiper/swiper-bundle.min.css">

    <link rel="stylesheet" href="../assets/css/icons.css" />
    <link rel="stylesheet" href="../assets/css/tailwind.css" />

</head>

<body>
    <?php include('nav.php') ?>

    <section class="" id="editForm">
        <div class="container ">
            <form action="" method="POST" enctype="multipart/form-data">

                <div class="mt-5 grid grid-cols-12 gap-6">
                    <!-- Company's Name -->
                    <div class="col-span-12 lg:col-span-12">
                        <div class="mb-3">
                            <label for="companyName" class="text-sm text-gray-900 dark:text-gray-50">Company's Name</label>
                            <input type="text" name="companyName" class="w-full mt-1 text-gray-500 border rounded border-gray-100/50 text-13 dark:bg-transparent dark:border-neutral-600" id="companyName" value="">
                        </div>
                    </div>

                    <!-- Profile Picture -->
                    <div class="col-span-12 lg:col-span-4">
                        <div class="mb-3">
                            <label for="profilePicture" class="text-sm text-gray-900 dark:text-gray-50">Profile Picture</label>
                            <input type="file" name="profilePicture" accept="image/*" class="w-full mt-1 text-gray-500 border rounded border-gray-100/50 text-13 dark:bg-transparent dark:border-neutral-600" id="profilePicture">
                        </div>
                    </div>

                    <!-- Cover Picture -->
                    <div class="col-span-12 lg:col-span-8">
                        <div class="mb-3">
                            <label for="coverPicture" class="text-sm text-gray-900 dark:text-gray-50">Cover Picture</label>
                            <input type="file" name="coverPicture" accept="image/*" class="w-full mt-1 text-gray-500 border rounded border-gray-100/50 text-13 dark:bg-transparent dark:border-neutral-600" id="coverPicture">
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="col-span-12">
                        <div class="mb-3">
                            <label for="description" class="text-sm text-gray-900 dark:text-gray-50">Description</label>
                            <textarea name="description" class="w-full mt-1 text-gray-500 border rounded border-gray-100/50 text-13 dark:bg-transparent dark:border-neutral-600" id="description" rows="3"></textarea>
                        </div>
                    </div>

                    <!-- Our Mission and Vision -->
                    <div class="col-span-12 lg:col-span-6">
                        <div class="mb-3">
                            <label for="mission" class="text-sm text-gray-900 dark:text-gray-50">Our Mission</label>
                            <textarea name="mission" class="w-full mt-1 text-gray-500 border rounded border-gray-100/50 text-13 dark:bg-transparent dark:border-neutral-600" id="mission" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="col-span-12 lg:col-span-6">
                        <div class="mb-3">
                            <label for="vision" class="text-sm text-gray-900 dark:text-gray-50">Our Vision</label>
                            <textarea name="vision" class="w-full mt-1 text-gray-500 border rounded border-gray-100/50 text-13 dark:bg-transparent dark:border-neutral-600" id="vision" rows="3"></textarea>
                        </div>
                    </div>

                    <!-- Facilities with Picture -->
                    <div class="col-span-12 lg:col-span-6">
                        <div class="mb-3">
                            <label for="facilities" class="text-sm text-gray-900 dark:text-gray-50">Facilities</label>
                            <textarea name="facilities" class="w-full mt-1 text-gray-500 border rounded border-gray-100/50 text-13 dark:bg-transparent dark:border-neutral-600" id="facilities" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="col-span-12 lg:col-span-6">
                        <div class="mb-3">
                            <label for="facilitiesPicture" class="text-sm text-gray-900 dark:text-gray-50">Facilities Picture</label>
                            <input type="file" name="facilitiesPicture" accept="image/*" class="w-full mt-1 text-gray-500 border rounded border-gray-100/50 text-13 dark:bg-transparent dark:border-neutral-600" id="facilitiesPicture">
                        </div>
                    </div>

                    <!-- Social Media Links -->
                    <div class="col-span-12">
                        <div class="mb-3">
                            <label for="facebook" class="text-sm text-gray-900 dark:text-gray-50">Facebook</label>
                            <input type="text" name="facebook" class="w-full mt-1 text-gray-500 border rounded border-gray-100/50 text-13 dark:bg-transparent dark:border-neutral-600" id="facebook">
                        </div>
                        <div class="mb-3">
                            <label for="twitter" class="text-sm text-gray-900 dark:text-gray-50">Twitter</label>
                            <input type="text" name="twitter" class="w-full mt-1 text-gray-500 border rounded border-gray-100/50 text-13 dark:bg-transparent dark:border-neutral-600" id="twitter">
                        </div>
                        <div class="mb-3">
                            <label for="linkedin" class="text-sm text-gray-900 dark:text-gray-50">LinkedIn</label>
                            <input type="text" name="linkedin" class="w-full mt-1 text-gray-500 border rounded border-gray-100/50 text-13 dark:bg-transparent dark:border-neutral-600" id="linkedin">
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="col-span-12 lg:col-span-4">
                        <div class="mb-3">
                            <label for="email" class="text-sm text-gray-900 dark:text-gray-50">Email</label>
                            <input type="text" name="email" class="w-full mt-1 text-gray-500 border rounded border-gray-100/50 text-13 dark:bg-transparent dark:border-neutral-600" id="email">
                        </div>
                    </div>

                    <!-- Submit button -->
                    <div class="col-span-12 mt-5 mb-5 text-right">
                        <input type="submit" name="submit" value="Save" class="btn btn-primary">
                    </div>
                </div>

            </form>
        </div>
    </section>

    <?php
    include('../user/footer.php');
    ?>

    <script src="https://unicons.iconscout.com/release/v4.0.0/script/monochrome/bundle.js"></script>
    <script src="../assets/libs/@popperjs/core/umd/popper.min.js"></script>
    <script src="../assets/libs/simplebar/simplebar.min.js"></script>

    <script src="../assets/js/pages/switcher.js"></script>

    <script src="../assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>

    <script src="../assets/js/pages/job-list.init.js"></script>

    <script src="../assets/js/pages/dropdown&modal.init.js"></script>

    <!-- Swiper Js -->
    <script src="../assets/libs/swiper/swiper-bundle.min.js"></script>
    <script src="../assets/js/pages/swiper.init.js"></script>

    <script src="../assets/js/pages/nav&tabs.js"></script>

    <script src="../assets/js/app.js"></script>
</body>

</html>
