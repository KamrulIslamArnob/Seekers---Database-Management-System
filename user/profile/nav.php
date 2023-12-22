<?php

$conn = mysqli_connect("localhost", "root", "1", "seekers_database");

if (!isset($_SESSION['username'])) {
    header('location:../index.php');
}

$userNavData = $userCRUD->getRowById($userId);
//print_r($userData);
// echo $userData['profile_picture']; 

//navbar logic 

// Get the current URL
$currentUrl = $_SERVER['REQUEST_URI'];

// Define the base URL
$baseUrl = "http://localhost/Seekers---job-portal-using-php-tailwind-mysql/";

// Check if the current URL contains "dashboard-user.php"
if (strpos($currentUrl, 'dashboard-user.php') !== false) {
    // If yes, construct the href with "profile/profile.php"
    $href = "profile/profile.php";
} else {
    // If no, construct the href with "profile.php"
    $href = "profile.php";
}

if (strpos($currentUrl, 'dashboard-user.php') !== false) {
    // If yes, construct the href with "profile/profile.php"
    $hrefsignout = "../auth/sign-out.php";
} else {
    // If no, construct the href with "profile.php"
    $hrefsignout = "../../auth/sign-out.php";
}


?>



<div class="hidden px-5 mx-auto border-gray-200 container-fluid lg:px-24 bg-gray-50 md:block dark:bg-neutral-600">
    <div class="grid items-center grid-cols-12">
        <div class="col-span-7">
            <ul class="flex items-center py-3">
                <li class="ltr:mr-4 rtl:ml-4">
                    <p class="mb-0 text-gray-800 text-13 dark:text-gray-50">
                        <?php echo (date("Y-m-d", time())); ?> <i class="mdi mdi-map-marker"></i><a
                            href="javascript:void(0)" class="font-medium">
                            <?php echo $userNavData['address']; ?>
                        </a>
                    </p>
                </li>
                <li>
                    <ul class="flex flex-wrap gap-4 text-gray-800 ">
                        <li
                            class="transition-all duration-200 ease-in hover:text-green-500 dark:text-gray-50 dark:hover:text-green-500">
                            <a href="<?php echo $userData['Whatsapp']; ?> " class="social-link"><i
                                    class="uil uil-whatsapp"></i></a>
                        </li>
                        <li
                            class="transition-all duration-200 ease-in hover:text-green-500 dark:text-gray-50 dark:hover:text-green-500">
                            <a href="<?php echo $userNavData['Facebook']; ?> " class="social-link"><i
                                    class="uil uil-facebook-messenger-alt"></i></a>
                        </li>

                        <li
                            class="transition-all duration-200 ease-in hover:text-green-500 dark:text-gray-50 dark:hover:text-green-500">
                            <a href="<?php echo $userData['email']; ?> " class="social-link"><i
                                    class="uil uil-envelope"></i></a>
                        </li>
                        <li
                            class="transition-all duration-200 ease-in hover:text-green-500 dark:text-gray-50 dark:hover:text-green-500">
                            <a href="<?php echo $userData['Github']; ?> " class="social-link"><i
                                    class="uil uil-twitter-alt"></i></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="col-span-5 ltr:ml-auto rtl:mr-auto">
            <ul class="flex items-center gap-4">


            </ul>
        </div>
    </div>
</div>


<nav class="navbar fixed right-0 left-0 top-0 lg:top-[44.5px] px-5 lg:px-24 transition-all duration-500 ease shadow-lg shadow-gray-200/20 bg-white border-gray-200 dark:bg-neutral-800 z-40 dark:shadow-neutral-900"
    id="navbar">
    <div class="mx-auto container-fluid">
        <div class="flex flex-wrap items-center justify-between mx-auto">
            <a href="dashboard-user.php" class="flex items-center">
                <img src="../assets/images/logo-dark.png" alt="" class="logo-dark h-[22px] block dark:hidden">
                <img src="../assets/images/logo-light.png" alt="" class="logo-dark h-[22px] hidden dark:block">
            </a>
            <button data-collapse-toggle="navbar-collapse" type="button"
                class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg navbar-toggler group lg:hidden hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <div class="flex items-center lg:order-2">
                <div>
                    <div class="relative dropdown">
                        <div class="relative">
                            <button type="button"
                                class="btn border-0 h-[70px] dropdown-toggle px-4 text-gray-500 dark:text-gray-300"
                                aria-expanded="false" data-dropdown-toggle="notification">
                                <i class="text-2xl mdi mdi-bell"></i>
                            </button>
                            <span
                                class="absolute text-xs px-1.5 bg-red-500 text-white font-medium rounded-full left-6 top-3 ring-2 ring-white dark:ring-neutral-800">3</span>
                        </div>
                        <div class="absolute right-0 top-auto left-auto z-50 hidden list-none bg-white rounded shadow dropdown-menu w-72 dark:bg-neutral-800 "
                            id="notification">
                            <div class="border rounded border-gray-50 dark:border-neutral-600"
                                aria-labelledby="notification">
                                <div class="grid grid-cols-1 ">
                                    <div class="p-4 bg-gray-50 dark:bg-neutral-700">
                                        <h6 class="mb-1 text-gray-800 dark:text-gray-50"> Notification </h6>
                                        <p class="mb-0 text-gray-500 text-13 dark:text-gray-300">You have 4 unread
                                            Notification</p>
                                    </div>
                                </div>
                                <div class="h-60" data-simplebar>
                                    <div>
                                        <a href="#!">
                                            <div class="flex p-4 hover:bg-gray-50/30 dark:hover:bg-neutral-600/50">
                                                <div class="flex-shrink-0 ltr:mr-3 rtl:ml-3">
                                                    <div
                                                        class="h-10 w-10 bg-violet-500/20 rounded-full text-center leading-[2.8]">
                                                        <i class="text-lg text-violet-500 uil uil-user-check"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow">
                                                    <h6 class="mb-1 text-sm text-gray-700 dark:text-gray-300">22
                                                        verified registrations</h6>
                                                    <div class="text-gray-600 text-13 dark:text-gray-300">
                                                        <p class="mb-0"><i
                                                                class="mdi mdi-clock-outline dark:text-gray-300"></i>
                                                            <span>3 hour ago</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>

                                        <a href="#!">
                                            <div
                                                class="flex items-center p-4 hover:bg-gray-50/30 dark:hover:bg-neutral-600/50">
                                                <div class="flex-shrink-0 ltr:mr-3 rtl:ml-3">
                                                    <img src="assets/images/user/img-01.jpg"
                                                        class="w-10 h-10 rounded-full" alt="user-pic">
                                                </div>
                                                <div class="flex-grow">
                                                    <h6 class="mb-1 text-sm text-gray-700 dark:text-gray-300">Kevin
                                                        Stewart</h6>
                                                    <div class="text-gray-600 text-13 dark:text-gray-300">
                                                        <p class="mb-0"><i
                                                                class="mdi mdi-clock-outline dark:text-gray-300"></i>
                                                            <span>1 hour ago</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>

                                        <a href="#!">
                                            <div
                                                class="flex items-center p-4 hover:bg-gray-50/30 dark:hover:bg-neutral-600/50">
                                                <div class="flex-shrink-0 ltr:mr-3 rtl:ml-3">
                                                    <img src="assets/images/featured-job/img-04.png"
                                                        class="w-10 h-10 rounded-full" alt="user-pic">
                                                </div>
                                                <div class="flex-grow">
                                                    <h6 class="mb-1 text-sm text-gray-700 dark:text-gray-300">
                                                        Applications has been approved</h6>
                                                    <div class="text-gray-600 text-13 dark:text-gray-300">
                                                        <p class="mb-0"><i
                                                                class="mdi mdi-clock-outline dark:text-gray-300"></i>
                                                            <span>45 min ago</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>

                                        <a href="#!">
                                            <div
                                                class="flex items-center p-4 hover:bg-gray-50/30 dark:hover:bg-neutral-600/50">
                                                <div class="flex-shrink-0 ltr:mr-3 rtl:ml-3">

                                                    <img src="../saved-data/profile_picture_25.jpg"
                                                        class="w-10 h-10 rounded-full" alt="user-pic">

                                                </div>
                                                <div class="flex-grow">
                                                    <h6 class="mb-1 text-sm text-gray-700 dark:text-gray-300">Salena
                                                        Layfield</h6>
                                                    <div class="text-gray-600 text-13 dark:text-gray-300">
                                                        <p class="mb-0"><i
                                                                class="mdi mdi-clock-outline dark:text-gray-300"></i>
                                                            <span>15 min ago</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>

                                        <a href="#!">
                                            <div
                                                class="flex items-center p-4 hover:bg-gray-50/30 dark:hover:bg-neutral-600/50">
                                                <div class="flex-shrink-0 ltr:mr-3 rtl:ml-3">
                                                    <img src="assets/images/featured-job/img-01.png"
                                                        class="w-10 h-10 rounded-full" alt="user-pic">
                                                </div>
                                                <div class="flex-grow">
                                                    <h6 class="mb-1 text-sm text-gray-700 dark:text-gray-300">Creative
                                                        Agency</h6>
                                                    <div class="text-gray-600 text-13 dark:text-gray-300">
                                                        <p class="mb-0"><i
                                                                class="mdi mdi-clock-outline dark:text-gray-300"></i>
                                                            <span>15 min ago</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>

                                    </div>
                                </div>
                                <div
                                    class="grid p-1 border-t border-gray-50 dark:border-zinc-600 justify-items-center bg-gray-50 dark:bg-neutral-700">
                                    <a class="border-0 group-data-[theme-color=violet]:text-violet-500 group-data-[theme-color=sky]:text-sky-500 group-data-[theme-color=red]:text-red-500 group-data-[theme-color=green]:text-green-500 group-data-[theme-color=pink]:text-pink-500 group-data-[theme-color=blue]:text-blue-500 btn dark:text-gray-50"
                                        href="javascript:void(0)">
                                        <i class="mr-1 mdi mdi-arrow-right-circle"></i> <span>View More..</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div>
                    <div class="relative dropdown ltr:mr-4 rtl:ml-4">
                        <button type="button" class="flex items-center px-4 py-5 dropdown-toggle"
                            id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="true">

                            <span class="hidden xl:block dark:text-purple-500 fw-medium">
                                <?php echo $_SESSION['username'] ?>
                            </span>

                        </button>
                        <ul class="absolute top-auto z-50 hidden w-48 p-3 list-none bg-white border rounded shadow-lg dropdown-menu border-gray-500/20 xl:ltr:-left-3 ltr:-left-32 rtl:-right-3 dark:bg-neutral-800"
                            id="profile/log" aria-labelledby="navNotifications">
                            <li class="p-2 dropdown-item group/dropdown dark:text-gray-300">
                                <a class="text-15 font-medium text-gray-800  group-data-[theme-color=violet]:group-hover/dropdown:text-violet-500 group-data-[theme-color=sky]:group-hover/dropdown:text-sky-500 group-data-[theme-color=red]:group-hover/dropdown:text-red-500 group-data-[theme-color=green]:group-hover/dropdown:text-green-500 group-data-[theme-color=pink]:group-hover/dropdown:text-pink-500 group-data-[theme-color=blue]:group-hover/dropdown:text-blue-500 group-hover:pl-1.5 transition-all duration-300 ease-in dark:text-gray-50"
                                    href="manage-jobs.php">Manage Jobs</a>
                            </li>
                            <li class="p-2 dropdown-item group/dropdown dark:text-gray-300">
                                <a class="text-15 font-medium text-gray-800 group-data-[theme-color=violet]:group-hover/dropdown:text-violet-500 group-data-[theme-color=sky]:group-hover/dropdown:text-sky-500 group-data-[theme-color=red]:group-hover/dropdown:text-red-500 group-data-[theme-color=green]:group-hover/dropdown:text-green-500 group-data-[theme-color=pink]:group-hover/dropdown:text-pink-500 group-data-[theme-color=blue]:group-hover/dropdown:text-blue-500 group-hover:pl-1.5 transition-all duration-300 ease-in dark:text-gray-50"
                                    href="bookmark-jobs.php">Bookmarks Jobs</a>
                            </li>
                            <li class="p-2 dropdown-item group/dropdown dark:text-gray-300">
                                <a class="text-15 font-medium text-gray-800 group-data-[theme-color=violet]:group-hover/dropdown:text-violet-500 group-data-[theme-color=sky]:group-hover/dropdown:text-sky-500 group-data-[theme-color=red]:group-hover/dropdown:text-red-500 group-data-[theme-color=green]:group-hover/dropdown:text-green-500 group-data-[theme-color=pink]:group-hover/dropdown:text-pink-500 group-data-[theme-color=blue]:group-hover/dropdown:text-blue-500 group-hover:pl-1.5 transition-all duration-300 ease-in dark:text-gray-50"
                                    href="<?php echo $href; ?>">My Profile</a>
                            </li>
                            <li class="p-2 dropdown-item group/dropdown dark:text-gray-300">
                                <a class="text-15 font-medium text-gray-800 group-data-[theme-color=violet]:group-hover/dropdown:text-violet-500 group-data-[theme-color=sky]:group-hover/dropdown:text-sky-500 group-data-[theme-color=red]:group-hover/dropdown:text-red-500 group-data-[theme-color=green]:group-hover/dropdown:text-green-500 group-data-[theme-color=pink]:group-hover/dropdown:text-pink-500 group-data-[theme-color=blue]:group-hover/dropdown:text-blue-500 group-hover:pl-1.5 transition-all duration-300 ease-in dark:text-gray-50"
                                    href="<?php echo $hrefsignout; ?>">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div id="navbar-collapse"
                class="navbar-res items-center justify-between w-full text-sm lg:flex lg:w-auto lg:order-1 group-focus:[.navbar-toggler]:block hidden">
                <ul class="flex flex-col items-start mt-5 mb-10 font-medium lg:mt-0 lg:mb-0 lg:items-center lg:flex-row"
                    id="navigation-menu">
                    <li class="relative dropdown">
                        <button class="py-5 text-gray-800 lg:px-4 dropdown-toggle dark:text-gray-50 lg:h-[70px]"
                            id="home" data-bs-toggle="dropdown">Jobs <i
                                class='align-middle bx bxs-chevron-down ltr:ml-1 rtl:mr-1'></i></button>

                        <ul class="relative top-auto z-50 w-full py-2 list-none bg-white border-0 rounded dropdown-menu lg:border border-gray-500/20 lg:absolute ltr:-left-3 rtl:-right-3 lg:w-48 lg:shadow-lg dark:bg-neutral-800 "
                            aria-labelledby="home">
                            <li class="w-full">
                                <a class="block w-full px-4 py-2 text-13 font-medium text-gray-700 duration-300 bg-transparent dropdown-item whitespace-nowrap hover:translate-x-1.5 group-data-[theme-color=violet]:hover:text-violet-500 group-data-[theme-color=sky]:hover:text-sky-500 group-data-[theme-color=red]:hover:text-red-500 group-data-[theme-color=green]:hover:text-green-500 group-data-[theme-color=pink]:hover:text-pink-500 group-data-[theme-color=blue]:hover:text-blue-500 uppercase group-data-[mode=dark]:text-gray-50"
                                    href="manage-and-apply.php">Manage & Apply</a>
                            </li>
                            <li class="w-full"><a
                                    class="block w-full px-4 py-2 text-13 font-medium text-gray-700 duration-300 bg-transparent dropdown-item whitespace-nowrap hover:translate-x-1.5 group-data-[theme-color=violet]:hover:text-violet-500 group-data-[theme-color=sky]:hover:text-sky-500 group-data-[theme-color=red]:hover:text-red-500 group-data-[theme-color=green]:hover:text-green-500 group-data-[theme-color=pink]:hover:text-pink-500 group-data-[theme-color=blue]:hover:text-blue-500 uppercase group-data-[mode=dark]:text-gray-50"
                                    href="bookmark-jobs.php">Bookmark</a>
                            </li>
                            <li class="w-full"><a
                                    class="block w-full px-4 py-2 text-13 font-medium text-gray-700 duration-300 bg-transparent dropdown-item whitespace-nowrap hover:translate-x-1.5 group-data-[theme-color=violet]:hover:text-violet-500 group-data-[theme-color=sky]:hover:text-sky-500 group-data-[theme-color=red]:hover:text-red-500 group-data-[theme-color=green]:hover:text-green-500 group-data-[theme-color=pink]:hover:text-pink-500 group-data-[theme-color=blue]:hover:text-blue-500 uppercase group-data-[mode=dark]:text-gray-50"
                                    href="search.php">Search</a>
                            </li>
                        </ul>
                    </li>
                    <li class="relative dropdown lg:mt-0">
                        <a href="companies.php"
                            class="py-5 text-gray-800 lg:px-4 dropdown-toggle dark:text-gray-50 lg:h-[70px]"
                            id="company" data-bs-toggle="dropdown">Companies </a>
                    </li>
                    <li class="relative dropdown lg:mt-0">
                        <button href="#"
                            class="py-5 text-gray-800 lg:px-4 dropdown-toggle dark:text-gray-50 lg:h-[70px]" id="pages"
                            data-bs-toggle="dropdown"> Resume & Portfolio <i
                                class='align-middle bx bxs-chevron-down ltr:ml-1 rtl:mr-1'></i></button>
                        <div
                            class="relative top-auto z-50 py-2 list-none bg-white border-0 rounded dropdown-menu lg:border border-gray-500/20 lg:absolute  lg:w-[40rem] lg:shadow-lg dark:bg-neutral-800">




                            <div class="grid grid-cols-12">
                                <div class="col-span-12 lg:col-span-4">
                                    <ul class="relative top-auto z-50 py-2 list-none dark:bg-neutral-800"
                                        aria-labelledby="pages">
                                        <span
                                            class="block px-4 py-3 font-normal text-gray-500 uppercase text-13">Portfolio</span>

                                        <li><a class="block w-full px-4 py-2 text-13 font-medium text-gray-900 duration-300 bg-transparent dropdown-item whitespace-nowrap hover:translate-x-1.5 group-data-[theme-color=violet]:hover:text-violet-500 group-data-[theme-color=sky]:hover:text-sky-500 group-data-[theme-color=red]:hover:text-red-500 group-data-[theme-color=green]:hover:text-green-500 group-data-[theme-color=pink]:hover:text-pink-500 group-data-[theme-color=blue]:hover:text-blue-500 uppercase group-data-[mode=dark]:text-gray-50"
                                                href="profile/edit-portfolio.php">Edit Portfolio</a>
                                        </li>

                                        <li><a class="block w-full px-4 py-2 text-13 font-medium text-gray-900 duration-300 bg-transparent dropdown-item whitespace-nowrap hover:translate-x-1.5 group-data-[theme-color=violet]:hover:text-violet-500 group-data-[theme-color=sky]:hover:text-sky-500 group-data-[theme-color=red]:hover:text-red-500 group-data-[theme-color=green]:hover:text-green-500 group-data-[theme-color=pink]:hover:text-pink-500 group-data-[theme-color=blue]:hover:text-blue-500 uppercase group-data-[mode=dark]:text-gray-50"
                                                href="portfolio/index.php">Home</a>
                                        </li>

                                        <li><a class="block w-full px-4 py-2 text-13 font-medium text-gray-900 duration-300 bg-transparent dropdown-item whitespace-nowrap hover:translate-x-1.5 group-data-[theme-color=violet]:hover:text-violet-500 group-data-[theme-color=sky]:hover:text-sky-500 group-data-[theme-color=red]:hover:text-red-500 group-data-[theme-color=green]:hover:text-green-500 group-data-[theme-color=pink]:hover:text-pink-500 group-data-[theme-color=blue]:hover:text-blue-500 uppercase group-data-[mode=dark]:text-gray-50"
                                                href="portfolio/about.php">About</a>
                                        </li>
                                        <li><a class="block w-full px-4 py-2 text-13 font-medium text-gray-900 duration-300 bg-transparent dropdown-item whitespace-nowrap hover:translate-x-1.5 group-data-[theme-color=violet]:hover:text-violet-500 group-data-[theme-color=sky]:hover:text-sky-500 group-data-[theme-color=red]:hover:text-red-500 group-data-[theme-color=green]:hover:text-green-500 group-data-[theme-color=pink]:hover:text-pink-500 group-data-[theme-color=blue]:hover:text-blue-500 uppercase group-data-[mode=dark]:text-gray-50"
                                                href="portfolio/blog.php">Blog</a>
                                        </li>
                                        <li><a class="block w-full px-4 py-2 text-13 font-medium text-gray-900 duration-300 bg-transparent dropdown-item whitespace-nowrap hover:translate-x-1.5 group-data-[theme-color=violet]:hover:text-violet-500 group-data-[theme-color=sky]:hover:text-sky-500 group-data-[theme-color=red]:hover:text-red-500 group-data-[theme-color=green]:hover:text-green-500 group-data-[theme-color=pink]:hover:text-pink-500 group-data-[theme-color=blue]:hover:text-blue-500 uppercase group-data-[mode=dark]:text-gray-50"
                                                href="portfolio/services.php">services</a>
                                        </li>
                                        <li><a class="block w-full px-4 py-2 text-13 font-medium text-gray-900 duration-300 bg-transparent dropdown-item whitespace-nowrap hover:translate-x-1.5 group-data-[theme-color=violet]:hover:text-violet-500 group-data-[theme-color=sky]:hover:text-sky-500 group-data-[theme-color=red]:hover:text-red-500 group-data-[theme-color=green]:hover:text-green-500 group-data-[theme-color=pink]:hover:text-pink-500 group-data-[theme-color=blue]:hover:text-blue-500 uppercase group-data-[mode=dark]:text-gray-50"
                                                href="portfolio/portfolio.php">Project</a>
                                        </li>
                                        <li><a class="block w-full px-4 py-2 text-13 font-medium text-gray-900 duration-300 bg-transparent dropdown-item whitespace-nowrap hover:translate-x-1.5 group-data-[theme-color=violet]:hover:text-violet-500 group-data-[theme-color=sky]:hover:text-sky-500 group-data-[theme-color=red]:hover:text-red-500 group-data-[theme-color=green]:hover:text-green-500 group-data-[theme-color=pink]:hover:text-pink-500 group-data-[theme-color=blue]:hover:text-blue-500 uppercase group-data-[mode=dark]:text-gray-50"
                                                href="portfolio/contact.php">contact</a>
                                        </li>

                                    </ul>
                                </div>
                                <div class="col-span-12 lg:col-span-4">
                                    <ul class="relative top-auto z-50 py-2 list-none dark:bg-neutral-800"
                                        aria-labelledby="pages">
                                        <span
                                            class="block px-4 py-3 font-normal text-gray-500 uppercase text-13">Resume</span>
                                        <li><a class="block w-full px-4 py-2 text-13 font-medium text-gray-900 duration-300 bg-transparent dropdown-item whitespace-nowrap hover:translate-x-1.5 group-data-[theme-color=violet]:hover:text-violet-500 group-data-[theme-color=sky]:hover:text-sky-500 group-data-[theme-color=red]:hover:text-red-500 group-data-[theme-color=green]:hover:text-green-500 group-data-[theme-color=pink]:hover:text-pink-500 group-data-[theme-color=blue]:hover:text-blue-500 uppercase group-data-[mode=dark]:text-gray-50"
                                                href="profile/edit-profile.php">Edit Profile</a>
                                        </li>
                                        <li><a class="block w-full px-4 py-2 text-13 font-medium text-gray-900 duration-300 bg-transparent dropdown-item whitespace-nowrap hover:translate-x-1.5 group-data-[theme-color=violet]:hover:text-violet-500 group-data-[theme-color=sky]:hover:text-sky-500 group-data-[theme-color=red]:hover:text-red-500 group-data-[theme-color=green]:hover:text-green-500 group-data-[theme-color=pink]:hover:text-pink-500 group-data-[theme-color=blue]:hover:text-blue-500 uppercase group-data-[mode=dark]:text-gray-50"
                                                href="resume/index.php">CV Builder Tool</a>
                                        </li>

                                    </ul>
                                </div>
                               




                            </div>

                        </div>
                    </li>

                    <li class="relative dropdown lg:mt-0">
                        <button href="#"
                            class="py-5 text-gray-800 lg:px-4 dropdown-toggle dark:text-gray-50 lg:h-[70px]" id="pages"
                            data-bs-toggle="dropdown"> Blogs <i
                                class='align-middle bx bxs-chevron-down ltr:ml-1 rtl:mr-1'></i></button>
                        <div
                            class="relative top-auto z-50 py-2 list-none bg-white border-0 rounded dropdown-menu lg:border border-gray-500/20 lg:absolute  lg:w-[40rem] lg:shadow-lg dark:bg-neutral-800">

                                    <ul class="relative top-auto z-50 py-2 list-none dark:bg-neutral-800"
                                        aria-labelledby="pages">
                                        <span class="block px-4 py-3 font-normal text-gray-500 uppercase text-13">Blog</span>
                                        <li>
                                            <a class="block w-full px-4 py-2 text-13 font-medium text-gray-900 duration-300 bg-transparent dropdown-item whitespace-nowrap hover:translate-x-1.5 group-data-[theme-color=violet]:hover:text-violet-500 group-data-[theme-color=sky]:hover:text-sky-500 group-data-[theme-color=red]:hover:text-red-500 group-data-[theme-color=green]:hover:text-green-500 group-data-[theme-color=pink]:hover:text-pink-500 group-data-[theme-color=blue]:hover:text-blue-500 uppercase group-data-[mode=dark]:text-gray-50"
                                                href="blog/blogCRUD/blogs-create.php">Write Blog
                                            </a>
                                        </li>
                                        <li>
                                            <a class="block w-full px-4 py-2 text-13 font-medium text-gray-900 duration-300 bg-transparent dropdown-item whitespace-nowrap hover:translate-x-1.5 group-data-[theme-color=violet]:hover:text-violet-500 group-data-[theme-color=sky]:hover:text-sky-500 group-data-[theme-color=red]:hover:text-red-500 group-data-[theme-color=green]:hover:text-green-500 group-data-[theme-color=pink]:hover:text-pink-500 group-data-[theme-color=blue]:hover:text-blue-500 uppercase group-data-[mode=dark]:text-gray-50"
                                                href="blog/blogCRUD/blogs-index.php">Edit Blog
                                            </a>
                                        </li>
                                        <li>
                                            <a class="block w-full px-4 py-2 text-13 font-medium text-gray-900 duration-300 bg-transparent dropdown-item whitespace-nowrap hover:translate-x-1.5 group-data-[theme-color=violet]:hover:text-violet-500 group-data-[theme-color=sky]:hover:text-sky-500 group-data-[theme-color=red]:hover:text-red-500 group-data-[theme-color=green]:hover:text-green-500 group-data-[theme-color=pink]:hover:text-pink-500 group-data-[theme-color=blue]:hover:text-blue-500 uppercase group-data-[mode=dark]:text-gray-50"
                                                href="blog/ViewAllBlogs.php">All Blogs
                                            </a>
                                        </li>
                                        <li>
                                            <a class="block w-full px-4 py-2 text-13 font-medium text-gray-900 duration-300 bg-transparent dropdown-item whitespace-nowrap hover:translate-x-1.5 group-data-[theme-color=violet]:hover:text-violet-500 group-data-[theme-color=sky]:hover:text-sky-500 group-data-[theme-color=red]:hover:text-red-500 group-data-[theme-color=green]:hover:text-green-500 group-data-[theme-color=pink]:hover:text-pink-500 group-data-[theme-color=blue]:hover:text-blue-500 uppercase group-data-[mode=dark]:text-gray-50"
                                                href="blog/blogs.php">My Blogs
                                            </a>
                                        </li>
                                    </ul>
                               

                        </div>
                    </li>


                    <li class="py-5 lg:px-4">
                        <a href="portfolio/contact.php"
                            class="py-2.5 text-gray-800 font-medium leading-tight dark:text-gray-50" id="contact"
                            data-bs-toggle="dropdown">Contact </a>
                    </li>
                </ul>
            </div>


        </div>
    </div>
</nav>