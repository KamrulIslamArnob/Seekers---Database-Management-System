<?php
require_once '../../database/crud/UserCRUD.php';

session_start();

if (!isset($_SESSION['username'])) {
    header("Location:http://localhost/Seekers---job-portal-using-php-tailwind-mysql/index.php");
} else if (isset($_SESSION['username']) and $_SESSION['role'] == 'admin') {
    header("Location:http://localhost/Seekers---job-portal-using-php-tailwind-mysql/admin/dashboard-admin.php");
} else if (isset($_SESSION['username']) and $_SESSION['role'] == 'company') {
    header("Location:http://localhost/Seekers---job-portal-using-php-tailwind-mysql/user/dashboard-user.php");
}



$userCRUD = new CRUD('');
$userId = $_SESSION['user_id'];
$userData = $userCRUD->getUserWithDetails($userId);
//print_r($userData);



?>



<!DOCTYPE html>
<html lang="en" dir="ltr" data-mode="light" class="scroll-smooths group" data-theme-color="violet">

<head>
    <meta charset="utf-8" />
    <title> Profile | User </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta content="Tailwind Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="Themesbrand" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="../../assets/images/favicon.ico" />


    <link rel="stylesheet" href="../../assets/libs/choices.js/public/assets/styles/choices.min.css">

    <link rel="stylesheet" href="../../assets/css/icons.css" />
    <link rel="stylesheet" href="../../assets/css/tailwind.css" />




</head>

<body class="bg-white dark:bg-neutral-800">





    <?php
    include('nav1.php');
    ?>




    <div class="main-content">
        <div class="page-content">

            <section
                class="pt-28 lg:pt-44 pb-28 group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500 dark:bg-neutral-900 bg-[url('../images/home/page-title.png')] bg-center bg-cover relative">
                <div class="container mx-auto">
                    <div class="grid">
                        <div class="col-span-12">
                            <div class="text-center text-white">
                                <h3 class="mb-4 text-[26px]">My Profile</h3>
                                <div class="page-next">
                                    <div class="user-portfolio">
                                        <button type="button"
                                            class="border btn group-data-[theme-color=violet] bg-rgb-12-20-39 group-data-[theme-color=sky] bg-rgb-12-20-39 group-data-[theme-color=red] bg-rgb-12-20-39 group-data-[theme-color=green] bg-rgb-12-20-39 group-data-[theme-color=pink] bg-rgb-12-20-39 group-data-[theme-color=blue] bg-rgb-12-20-39 group-data-[theme-color=violet] text-rgb-12-20-39 group-data-[theme-color=sky] text-rgb-12-20-39 group-data-[theme-color=red] text-rgb-12-20-39 group-data-[theme-color=green] text-rgb-12-20-39 group-data-[theme-color=pink] text-rgb-12-20-39 group-data-[theme-color=blue] text-rgb-12-20-39 group-data-[theme-color=violet] hover:bg-rgb-12-20-39 group-data-[theme-color=sky] hover:bg-rgb-12-20-39 group-data-[theme-color=red] hover:bg-rgb-12-20-39 group-data-[theme-color=green] hover:bg-rgb-12-20-39 group-data-[theme-color=pink] hover:bg-rgb-12-20-39 group-data-[theme-color=blue] hover:bg-rgb-12-20-39 group-data-[theme-color=violet] hover:text-white group-data-[theme-color=sky] hover:text-white group-data-[theme-color=red] hover:text-white group-data-[theme-color=green] hover:text-white group-data-[theme-color=pink] hover:text-white group-data-[theme-color=blue] hover:text-white hover:ring group-data-[theme-color=violet] hover:ring-rgb-12-20-39 group-data-[theme-color=sky] hover:ring-rgb-12-20-39 group-data-[theme-color=red] hover:ring-rgb-12-20-39 group-data-[theme-color=green] hover:ring-rgb-12-20-39 group-data-[theme-color=pink] hover:ring-rgb-12-20-39 group-data-[theme-color=blue] hover:ring-rgb-12-20-39">
                                            <a href="../portfolio/index.php">Personal Portfolio Website</a>
                                        </button>
                                        <button type="button"
                                            class="border btn group-data-[theme-color=violet] bg-rgb-12-20-39 group-data-[theme-color=sky] bg-rgb-12-20-39 group-data-[theme-color=red] bg-rgb-12-20-39 group-data-[theme-color=green] bg-rgb-12-20-39 group-data-[theme-color=pink] bg-rgb-12-20-39 group-data-[theme-color=blue] bg-rgb-12-20-39 group-data-[theme-color=violet] text-rgb-12-20-39 group-data-[theme-color=sky] text-rgb-12-20-39 group-data-[theme-color=red] text-rgb-12-20-39 group-data-[theme-color=green] text-rgb-12-20-39 group-data-[theme-color=pink] text-rgb-12-20-39 group-data-[theme-color=blue] text-rgb-12-20-39 group-data-[theme-color=violet] hover:bg-rgb-12-20-39 group-data-[theme-color=sky] hover:bg-rgb-12-20-39 group-data-[theme-color=red] hover:bg-rgb-12-20-39 group-data-[theme-color=green] hover:bg-rgb-12-20-39 group-data-[theme-color=pink] hover:bg-rgb-12-20-39 group-data-[theme-color=blue] hover:bg-rgb-12-20-39 group-data-[theme-color=violet] hover:text-white group-data-[theme-color=sky] hover:text-white group-data-[theme-color=red] hover:text-white group-data-[theme-color=green] hover:text-white group-data-[theme-color=pink] hover:text-white group-data-[theme-color=blue] hover:text-white hover:ring group-data-[theme-color=violet] hover:ring-rgb-12-20-39 group-data-[theme-color=sky] hover:ring-rgb-12-20-39 group-data-[theme-color=red] hover:ring-rgb-12-20-39 group-data-[theme-color=green] hover:ring-rgb-12-20-39 group-data-[theme-color=pink] hover:ring-rgb-12-20-39 group-data-[theme-color=blue] hover:ring-rgb-12-20-39">
                                            <a href="../resume/index.php">CV Builder Tool</a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <img src="../../assets/images/about/shape.png" alt=""
                    class="absolute block bg-cover -bottom-0 dark:hidden">
                <img src="../../assets/images/about/shape-dark.png" alt=""
                    class="absolute hidden bg-cover -bottom-0 dark:block">
            </section>

            <!-- Start grid -->
            <section class="py-20">
                <div class="container mx-auto">
                    <div class="grid grid-cols-12 gap-y-10 lg:gap-10">
                        <div class="col-span-12 lg:col-span-12 ">
                            <div class="border rounded border-gray-100/50 dark:border-neutral-600">
                                <div class="p-5 border-b border-gray-100/50 dark:border-neutral-600">
                                    <div class="text-center relative">
                                        <div class="inline-block">
                                            <img src="  <?php echo $userData['profile_picture']; ?>" alt=""
                                                class="w-20 h-20 p-1 mx-auto border-2 rounded-full border-gray-200/20">
                                            <div class="relative inline-block">
                                                <div class="three-dots cursor-pointer" onclick="toggleDropdown(this)"
                                                    id="dots-button">
                                                    <div class="text-green-500">...</div>
                                                </div>
                                                <div id="dropdown-content"
                                                    class="dropdown-content hidden absolute bg-white shadow-md z-10 mt-2">
                                                    <button class="edit-button px-4 py-2 bg-blue-500 text-purple-200"><a
                                                            href="edit-profile.php">Edit</a></button>
                                                </div>
                                            </div>
                                        </div>

                                        <h6 class="mt-4 mb-0 text-lg text-gray-900 dark:text-gray-50">
                                            <?php echo $userData['name']; ?>
                                        </h6>
                                        <p class="mb-4 text-gray-500 dark:text-gray-300">

                                            <?php echo $userData['designation']; ?>
                                        </p>

                                        <ul class="flex flex-wrap justify-center gap-2 mb-0">
                                            <li
                                                class="w-10 h-10 text-lg leading-10 transition-all duration-300 ease-in-out rounded bg-violet-500/20 text-violet-500 hover:bg-violet-500 hover:text-white">
                                                <a href=" <?php echo $userData['Facebook']; ?> "
                                                    
                                                class="social-link rounded-3 "><i
                                                        class="uil uil-facebook-f"></i></a>
                                            </li>
                                            <li
                                                class="w-10 h-10 text-lg leading-10 transition-all duration-300 ease-in-out rounded bg-sky-500/20 text-sky-500 hover:bg-sky-500 hover:text-white">
                                                <a href=" <?php echo $userData['Github']; ?>"
                                                    class="social-link rounded-3 btn-soft-info"><i
                                                        class="uil uil-twitter-alt"></i></a>
                                            </li>
                                            <li
                                                class="w-10 h-10 text-lg leading-10 text-green-500 transition-all duration-300 ease-in-out rounded bg-green-500/20 hover:bg-green-500 hover:text-white">
                                                <a href=" <?php echo $userData['Whatsapp']; ?> "
                                                    class="social-link rounded-3 btn-soft-success"><i
                                                        class="uil uil-whatsapp"></i></a>
                                            </li>
                                            <li
                                                class="w-10 h-10 text-lg leading-10 text-red-500 transition-all duration-300 ease-in-out rounded bg-red-500/20 hover:bg-red-500 hover:text-white">
                                                <a href="<?php echo $userData['Linkedin']; ?>"
                                                    class="social-link rounded-3 btn-soft-danger"><i
                                                        class="uil uil-phone-alt"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>



                            </div>
                        </div>

                    </div>
                </div>
            </section>
            <!-- End grid -->



        </div>
    </div>


    <?php
    include('../footer.php');
    ?>


    <script>
        function toggleDropdown(dropdown) {
            var dropdownContent = dropdown.nextElementSibling;
            dropdownContent.classList.toggle('hidden');
        }

        // Close the dropdown if the user clicks outside of it
        document.addEventListener('click', function (event) {
            var dropdownContent = document.getElementById('dropdown-content');
            var dotsButton = document.getElementById('dots-button');

            if (!event.target.matches('.text-green-500') && !event.target.matches('.edit-button')) {
                dropdownContent.classList.add('hidden');
            }
        });
    </script>

    <script src="https://unicons.iconscout.com/release/v4.0.0/script/monochrome/bundle.js"></script>
    <script src="../../assets/libs/@popperjs/core/umd/popper.min.js"></script>
    <script src="../../assets/libs/simplebar/simplebar.min.js"></script>


    <script src="../../assets/js/pages/switcher.js"></script>

    <script src="../../assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>

    <script src="../../assets/js/pages/job-list.init.js"></script>

    <script src="../../assets/js/pages/dropdown&modal.init.js"></script>

    <script src="../../assets/js/pages/nav&tabs.js"></script>

    <script src="../../assets/js/app.js"></script>

</body>

</html>