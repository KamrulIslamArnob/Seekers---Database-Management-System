<!DOCTYPE html>
<html lang="en" dir="ltr" data-mode="light" class="scroll-smooths group" data-theme-color="violet">

<head>
    <meta charset="utf-8" />
    <title>Manage Jobs </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta content="Tailwind Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="Themesbrand" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico" />


    <!-- Choise Css -->
    <link rel="stylesheet" href="../assets/libs/choices.js/public/assets/styles/choices.min.css">

    <link rel="stylesheet" href="../assets/css/icons.css" />
    <link rel="stylesheet" href="../assets/css/tailwind.css" />




</head>

<body class="bg-white dark:bg-neutral-800">


    <?php
    session_start();
    if(!isset($_SESSION['username'])) {
        header("Location:http://localhost/Seekers---job-portal-using-php-tailwind-mysql/index.php");

    }else if($_SESSION['role']=='admin'){
        header("Location:http://localhost/Seekers---job-portal-using-php-tailwind-mysql/admin/dashboard-admin.php");
    }
    
    // else if($_SESSION['role']=='company'){
    //     header("Location:http://localhost/Seekers---job-portal-using-php-tailwind-mysql/user/dashboard-user.php");
    // }
    ?>

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
                                <h3 class="mb-4 text-[26px]">Manage Jobs</h3>
                                <div class="page-next">
                                    <nav class="inline-block" aria-label="breadcrumb text-center">
                                        <ol class="flex flex-wrap justify-center text-sm font-medium uppercase">
                                            <li><a href="index.html">Home</a></li>
                                            <li><i class="bx bxs-chevron-right align-middle px-2.5"></i><a
                                                    href="javascript:void(0)">Profile</a></li>
                                            <li class="active" aria-current="page"><i
                                                    class="bx bxs-chevron-right align-middle px-2.5"></i>Manage Jobs
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
                <div class="container mx-auto">
                    <div class="grid items-center grid-cols-12 mb-4">
                        <div class="col-span-12 lg:col-span-8">
                            <div class="mb-3 mb-lg-0">
                                <h6 class="text-gray-900 text-16 dark:text-gray-50"> Showing 1 – 8 of 11 results </h6>
                            </div>
                        </div><!--end col-->


                        <div class="col-span-12 lg:col-span-4">
                            <div class="candidate-list-widgets">
                                <div class="grid items-center grid-cols-12 gap-3">
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="selection-widget">
                                            <select class="form-select" data-trigger
                                                name="choices-single-filter-orderby" id="choices-single-filter-orderby"
                                                aria-label="Default select example">
                                                <option value="df">Default</option>
                                                <option value="ne">Newest</option>
                                                <option value="od">Oldest</option>
                                                <option value="rd">Random</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="selection-widget">
                                            <select class="form-select" data-trigger name="choices-candidate-page"
                                                id="choices-candidate-page" aria-label="Default select example">
                                                <option value="df">All</option>
                                                <option value="ne">8 per Page</option>
                                                <option value="ne">12 per Page</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end candidate-list-widgets-->
                        </div><!--end col-->
                    </div>
                    <div class="mt-8">
                    <?php
                    require_once('display_applied_jobs.php');
                    ?>
                        </div>
                    </div>
                    <div class="grid grid-cols-12">
                        <div class="col-span-12">
                            <ul class="flex justify-center gap-2 mt-8">
                                <li
                                    class="w-12 h-12 text-center border rounded-full cursor-default border-gray-100/50 dark:border-gray-100/20">
                                    <a class="cursor-auto" href="javascript:void(0)" tabindex="-1">
                                        <i
                                            class="mdi mdi-chevron-double-left text-16 leading-[2.8] dark:text-white"></i>
                                    </a>
                                </li>
                                <li
                                    class="w-12 h-12 text-center text-white border border-transparent rounded-full cursor-pointer group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500">
                                    <a class="text-16 leading-[2.8]" href="javascript:void(0)">1</a>
                                </li>
                                <li
                                    class="w-12 h-12 text-center text-gray-900 transition-all duration-300 border rounded-full cursor-pointer border-gray-100/50 hover:bg-gray-100/30 focus:bg-gray-100/30 dark:border-gray-100/20 dark:text-gray-50 dark:hover:bg-gray-500/20">
                                    <a class="text-16 leading-[2.8]" href="javascript:void(0)">2</a>
                                </li>
                                <li
                                    class="w-12 h-12 text-center text-gray-900 transition-all duration-300 border rounded-full cursor-pointer border-gray-100/50 hover:bg-gray-100/30 focus:bg-gray-100/30 dark:border-gray-100/20 dark:text-gray-50 dark:hover:bg-gray-500/20">
                                    <a class="text-16 leading-[2.8]" href="javascript:void(0)">3</a>
                                </li>
                                <li
                                    class="w-12 h-12 text-center text-gray-900 transition-all duration-300 border rounded-full cursor-pointer border-gray-100/50 hover:bg-gray-100/30 focus:bg-gray-100/30 dark:border-gray-100/20 dark:text-gray-50 dark:hover:bg-gray-500/20">
                                    <a class="text-16 leading-[2.8]" href="javascript:void(0)">4</a>
                                </li>
                                <li
                                    class="w-12 h-12 text-center text-gray-900 transition-all duration-300 border rounded-full cursor-pointer border-gray-100/50 hover:bg-gray-100/30 focus:bg-gray-100/30 dark:border-gray-100/20 dark:text-gray-50 dark:hover:bg-gray-500/20">
                                    <a href="javascript:void(0)" tabindex="-1">
                                        <i class="mdi mdi-chevron-double-right text-16 leading-[2.8]"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!--end col-->
                    </div>
                </div>
            </section>
            <!-- End grid -->

        </div>
    </div>


    <?php
    include('footer.php');
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

</body>

</html>