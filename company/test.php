


<!DOCTYPE html>
<html lang="en" dir="ltr" data-mode="light" class="scroll-smooths group" data-theme-color="violet">

<head>
    <meta charset="utf-8" />
    <title>Applied Users | Jobcy - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta content="Tailwind Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="Themesbrand" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

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
    include('nav.php');
    ?>

<div class="main-content">
        <div class="page-content">

            <section
                class="pt-28 lg:pt-44 pb-28 group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500 dark:bg-neutral-900 bg-[url('../images/home/page-title.png')] bg-center bg-cover relative">
                <div class="container mx-auto">
                    <div class="grid">
                        <div class="col-span-12">
                            <div class="text-center text-white">
                                <h3 class="mb-4 text-[26px]">Applied Users</h3>
                                <div class="page-next">
                                    <nav class="inline-block" aria-label="breadcrumb text-center">
                                        <ol class="flex flex-wrap justify-center text-sm font-medium uppercase">
                                            <li><a href="index.html">Home</a></li>
                                            <li><i class="bx bxs-chevron-right align-middle px-2.5"></i><a
                                                    href="javascript:void(0)">Profile</a></li>
                                            <li class="active" aria-current="page"><i
                                                    class="bx bxs-chevron-right align-middle px-2.5"></i>Applied Users
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
                    <section class="py-20">
            <div class="container mx-auto">
                <div class="grid grid-cols-12 gap-y-10 lg:gap-10 mx-auto">
                    
                    <div class="col-span-12 lg:col-span-12">
                        <div class="border rounded border-gray-100/50 dark:border-neutral-600 nav-tabs bottom-border-tab">
                            <div class="px-6 py-0 border-b border-gray-100/50 dark:border-neutral-600">

                                <ul class="items-center text-sm font-medium text-center text-gray-700 nav md:flex">
                                    <li class="nav-item" role="presentation">
                                        <button class="inline-block w-full py-4 px-[18px] dark:text-gray-50" data-tw-toggle="tab" type="button" data-tw-target="settings-tab">
                                            Applied Candidate
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <section class="bg-gray-50 dark:bg-neutral-700" id="">
                        <div class="container mx-auto">
                            <div class="grid grid-cols-1 gap-5">
                                <div class="mb-5 text-center">
                                    <h3 class="mb-3 text-3xl text-gray-900 dark:text-gray-50"></h3>
                                    <p class="mb-5 text-gray-500 whitespace-pre-line dark:text-gray-300"></p>
                                </div>
                            </div>
                            <div class="grid grid-cols-12 gap-5">
                           
                            <?php
$conn = mysqli_connect("localhost", "root", "1", "seekers_database");
$sql = "SELECT u.*, j.jobTitle
        FROM users AS u
        JOIN jobs AS j ON u.id = j.applied_users
        WHERE u.id = j.company_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
?>
        <div class="col-span-12 md:col-span-6 lg:col-span-4">
            <div class="p-2 mt-3 transition-all duration-500 bg-white rounded shadow-lg shadow-gray-100/50 card dark:bg-neutral-800 dark:shadow-neutral-600/20 group/blog">
                <div class="relative overflow-hidden">
                    <img src="../assets/images/blog/img-01.jpg" alt="" class="rounded">
                    <div class="absolute inset-0 hidden transition-all duration-500 rounded-md bg-black/30 group-hover/blog:block"><?php // You can add dynamic content here ?></div>
                    <div class="hidden text-white transition-all duration-500 top-2 left-2 group-hover/blog:block author group-hover/blog:absolute">
                        <p class="mb-0 "><i class="mdi mdi-account text-light"></i> <a href="javascript:void(0)" class="text-light user"><?= $row['name'] ?></a></p>
                        <p class="mb-0 text-light date"><i class="mdi mdi-calendar-check"></i> created</p>
                    </div>
                    <div class="hidden bottom-2 right-2 group-hover/blog:block author group-hover/blog:absolute">
                        <ul class="mb-0 list-unstyled">
                            <li class="list-inline-item"><a href="javascript:void(0)" class="text-white"></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="text-white"></li>
                        </ul>
                    </div>
                </div>
                <div class="p-5">
                    <a href="blog-details.html" class="primary-link">
                        <h5 class="mb-1 text-gray-900 fs-17 dark:text-gray-50"><?= $row['jobTitle'] ?></h5>
                    </a>
                    <p class="mb-3 text-gray-500 dark:text-gray-300">tag line</p>
                    <p class="mb-3 text-gray-500 dark:text-gray-300">view more option </p>
                    <a href="../InfoCRUD/experience-index.php?user_id=<?= $row['id'] ?>&job_id=<?= $row['job_id'] ?>&action=accept" class="inline-block px-4 py-2 font-medium border rounded-md transition duration-300 ease-in-out transform group">
                        Accept <i class="align-middle mdi mdi-chevron-right"></i>
                    </a>
                    <a href="../InfoCRUD/experience-index.php?user_id=<?= $row['id'] ?>&job_id=<?= $row['job_id'] ?>&action=reject" class="inline-block px-4 py-2 font-medium border rounded-md transition duration-300 ease-in-out transform group">
                        Reject <i class="align-middle mdi mdi-chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>
<?php
    }
} else {
    echo 'No applied users found.';
}
?>

                                
                                
                                <!-- second card  -->
                                <div class="col-span-12 md:col-span-6 lg:col-span-4">
                                    <div class="p-2 mt-3 transition-all duration-500 bg-white rounded shadow-lg shadow-gray-100/50 card dark:bg-neutral-800 dark:shadow-neutral-600/20 group/blog">
                                        <div class="relative overflow-hidden">
                                            <img src="../../assets/images/blog/img-01.jpg" alt="" class="rounded">
                                            <div class="absolute inset-0 hidden transition-all duration-500 rounded-md bg-black/30 group-hover/blog:block"></div>
                                            <div class="hidden text-white transition-all duration-500 top-2 left-2 group-hover/blog:block author group-hover/blog:absolute">
                                                <p class="mb-0 "><i class="mdi mdi-account text-light"></i> <a href="javascript:void(0)" class="text-light user">Dirio Walls</a></p>
                                                <p class="mb-0 text-light date"><i class="mdi mdi-calendar-check"></i> 01 July, 2021</p>
                                            </div>
                                            <div class="hidden bottom-2 right-2 group-hover/blog:block author group-hover/blog:absolute">
                                                <ul class="mb-0 list-unstyled">
                                                    <li class="list-inline-item"><a href="javascript:void(0)" class="text-white"><i class="mdi mdi-heart-outline me-1"></i> 33</a></li>
                                                    <li class="list-inline-item"><a href="javascript:void(0)" class="text-white"><i class="mdi mdi-comment-outline me-1"></i> 08</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="p-5">
                                            <a href="blog-details.html" class="primary-link">
                                                <h5 class="mb-1 text-gray-900 fs-17 dark:text-gray-50">Edit Skill</h5>
                                            </a>
                                            <p class="mb-3 text-gray-500 dark:text-gray-300">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam, eius!</p>
                                            <p class="mb-3 text-gray-500 dark:text-gray-300"></p>
                                            <a href="../InfoCRUD/skills-index.php" class="inline-block px-4 py-2 font-medium border rounded-md transition duration-300 ease-in-out transform group">
                                                        Edit <i class="align-middle mdi mdi-chevron-right"></i>
                                            </a>                                        </div>
                                    </div>
                                </div>
                                <!-- third card  -->
                                <div class="col-span-12 md:col-span-6 lg:col-span-4">
                                    <div class="p-2 mt-3 transition-all duration-500 bg-white rounded shadow-lg shadow-gray-100/50 card dark:bg-neutral-800 dark:shadow-neutral-600/20 group/blog">
                                        <div class="relative overflow-hidden">
                                            <img src="../../assets/images/blog/img-01.jpg" alt="" class="rounded">
                                            <div class="absolute inset-0 hidden transition-all duration-500 rounded-md bg-black/30 group-hover/blog:block"></div>
                                            <div class="hidden text-white transition-all duration-500 top-2 left-2 group-hover/blog:block author group-hover/blog:absolute">
                                                <p class="mb-0 "><i class="mdi mdi-account text-light"></i> <a href="javascript:void(0)" class="text-light user">Dirio Walls</a></p>
                                                <p class="mb-0 text-light date"><i class="mdi mdi-calendar-check"></i> 01 July, 2021</p>
                                            </div>
                                            <div class="hidden bottom-2 right-2 group-hover/blog:block author group-hover/blog:absolute">
                                                <ul class="mb-0 list-unstyled">
                                                    <li class="list-inline-item"><a href="javascript:void(0)" class="text-white"><i class="mdi mdi-heart-outline me-1"></i> 33</a></li>
                                                    <li class="list-inline-item"><a href="javascript:void(0)" class="text-white"><i class="mdi mdi-comment-outline me-1"></i> 08</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="p-5">
                                            <a href="blog-details.html" class="primary-link">
                                                <h5 class="mb-1 text-gray-900 fs-17 dark:text-gray-50">Edit Education</h5>
                                            </a>
                                            <p class="mb-3 text-gray-500 dark:text-gray-300">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam, eius!</p>
                                            <p class="mb-3 text-gray-500 dark:text-gray-300"></p>
                                            <a href="../InfoCRUD/education-index.php" class="inline-block px-4 py-2 font-medium border rounded-md transition duration-300 ease-in-out transform group">
                                                Edit <i class="align-middle mdi mdi-chevron-right"></i>
                                            </a>                                        </div>
                                    </div>
                                </div>
                                 <!-- fourth card  -->
                                 <div class="col-span-12 md:col-span-6 lg:col-span-4">
                                    <div class="p-2 mt-3 transition-all duration-500 bg-white rounded shadow-lg shadow-gray-100/50 card dark:bg-neutral-800 dark:shadow-neutral-600/20 group/blog">
                                        <div class="relative overflow-hidden">
                                            <img src="../../assets/images/blog/img-01.jpg" alt="" class="rounded">
                                            <div class="absolute inset-0 hidden transition-all duration-500 rounded-md bg-black/30 group-hover/blog:block"></div>
                                            <div class="hidden text-white transition-all duration-500 top-2 left-2 group-hover/blog:block author group-hover/blog:absolute">
                                                <p class="mb-0 "><i class="mdi mdi-account text-light"></i> <a href="javascript:void(0)" class="text-light user">Dirio Walls</a></p>
                                                <p class="mb-0 text-light date"><i class="mdi mdi-calendar-check"></i> 01 July, 2021</p>
                                            </div>
                                            <div class="hidden bottom-2 right-2 group-hover/blog:block author group-hover/blog:absolute">
                                                <ul class="mb-0 list-unstyled">
                                                    <li class="list-inline-item"><a href="javascript:void(0)" class="text-white"><i class="mdi mdi-heart-outline me-1"></i> 33</a></li>
                                                    <li class="list-inline-item"><a href="javascript:void(0)" class="text-white"><i class="mdi mdi-comment-outline me-1"></i> 08</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="p-5">
                                            <a href="blog-details.html" class="primary-link">
                                                <h5 class="mb-1 text-gray-900 fs-17 dark:text-gray-50">Edit Certification</h5>
                                            </a>
                                            <p class="mb-3 text-gray-500 dark:text-gray-300">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam, eius!</p>
                                            <p class="mb-3 text-gray-500 dark:text-gray-300"></p>
                                            <a href="../InfoCRUD/certifications-index.php" class="inline-block px-4 py-2 font-medium border rounded-md transition duration-300 ease-in-out transform group">
                                                Edit <i class="align-middle mdi mdi-chevron-right"></i>
                                            </a>                                        </div>
                                    </div>
                                </div>
                                 <!-- fifth card  -->
                                 <div class="col-span-12 md:col-span-6 lg:col-span-4">
                                    <div class="p-2 mt-3 transition-all duration-500 bg-white rounded shadow-lg shadow-gray-100/50 card dark:bg-neutral-800 dark:shadow-neutral-600/20 group/blog">
                                        <div class="relative overflow-hidden">
                                            <img src="../../assets/images/blog/img-01.jpg" alt="" class="rounded">
                                            <div class="absolute inset-0 hidden transition-all duration-500 rounded-md bg-black/30 group-hover/blog:block"></div>
                                            <div class="hidden text-white transition-all duration-500 top-2 left-2 group-hover/blog:block author group-hover/blog:absolute">
                                                <p class="mb-0 "><i class="mdi mdi-account text-light"></i> <a href="javascript:void(0)" class="text-light user">Dirio Walls</a></p>
                                                <p class="mb-0 text-light date"><i class="mdi mdi-calendar-check"></i> 01 July, 2021</p>
                                            </div>
                                            <div class="hidden bottom-2 right-2 group-hover/blog:block author group-hover/blog:absolute">
                                                <ul class="mb-0 list-unstyled">
                                                    <li class="list-inline-item"><a href="javascript:void(0)" class="text-white"><i class="mdi mdi-heart-outline me-1"></i> 33</a></li>
                                                    <li class="list-inline-item"><a href="javascript:void(0)" class="text-white"><i class="mdi mdi-comment-outline me-1"></i> 08</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="p-5">
                                            <a href="blog-details.html" class="primary-link">
                                                <h5 class="mb-1 text-gray-900 fs-17 dark:text-gray-50">Edit Language Skills</h5>
                                            </a>
                                            <p class="mb-3 text-gray-500 dark:text-gray-300">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam, eius!</p>
                                            <p class="mb-3 text-gray-500 dark:text-gray-300"></p>
                                            <a href="../InfoCRUD/language_skills-index.php" class="inline-block px-4 py-2 font-medium border rounded-md transition duration-300 ease-in-out transform group">
                                                Edit <i class="align-middle mdi mdi-chevron-right"></i>
                                            </a>                                        </div>
                                    </div>
                                </div>
                                 <!-- sixth card  -->
                                 <div class="col-span-12 md:col-span-6 lg:col-span-4">
                                    <div class="p-2 mt-3 transition-all duration-500 bg-white rounded shadow-lg shadow-gray-100/50 card dark:bg-neutral-800 dark:shadow-neutral-600/20 group/blog">
                                        <div class="relative overflow-hidden">
                                            <img src="../../assets/images/blog/img-01.jpg" alt="" class="rounded">
                                            <div class="absolute inset-0 hidden transition-all duration-500 rounded-md bg-black/30 group-hover/blog:block"></div>
                                            <div class="hidden text-white transition-all duration-500 top-2 left-2 group-hover/blog:block author group-hover/blog:absolute">
                                                <p class="mb-0 "><i class="mdi mdi-account text-light"></i> <a href="javascript:void(0)" class="text-light user">Dirio Walls</a></p>
                                                <p class="mb-0 text-light date"><i class="mdi mdi-calendar-check"></i> 01 July, 2021</p>
                                            </div>
                                            <div class="hidden bottom-2 right-2 group-hover/blog:block author group-hover/blog:absolute">
                                                <ul class="mb-0 list-unstyled">
                                                    <li class="list-inline-item"><a href="javascript:void(0)" class="text-white"><i class="mdi mdi-heart-outline me-1"></i> 33</a></li>
                                                    <li class="list-inline-item"><a href="javascript:void(0)" class="text-white"><i class="mdi mdi-comment-outline me-1"></i> 08</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="p-5">
                                            <a href="blog-details.html" class="primary-link">
                                                <h5 class="mb-1 text-gray-900 fs-17 dark:text-gray-50">Edit Projects</h5>
                                            </a>
                                            <p class="mb-3 text-gray-500 dark:text-gray-300">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam, eius!</p>
                                            <p class="mb-3 text-gray-500 dark:text-gray-300"></p>
                                            <a href="../InfoCRUD/projects-index.php" class="inline-block px-4 py-2 font-medium border rounded-md transition duration-300 ease-in-out transform group">
                                                Edit <i class="align-middle mdi mdi-chevron-right"></i>
                                            </a>                                        </div>
                                    </div>
                                </div>
                                 <!-- seventh card  -->
                                 <div class="col-span-12 md:col-span-6 lg:col-span-4">
                                    <div class="p-2 mt-3 transition-all duration-500 bg-white rounded shadow-lg shadow-gray-100/50 card dark:bg-neutral-800 dark:shadow-neutral-600/20 group/blog">
                                        <div class="relative overflow-hidden">
                                            <img src="../../assets/images/blog/img-01.jpg" alt="" class="rounded">
                                            <div class="absolute inset-0 hidden transition-all duration-500 rounded-md bg-black/30 group-hover/blog:block"></div>
                                            <div class="hidden text-white transition-all duration-500 top-2 left-2 group-hover/blog:block author group-hover/blog:absolute">
                                                <p class="mb-0 "><i class="mdi mdi-account text-light"></i> <a href="javascript:void(0)" class="text-light user">Dirio Walls</a></p>
                                                <p class="mb-0 text-light date"><i class="mdi mdi-calendar-check"></i> 01 July, 2021</p>
                                            </div>
                                            <div class="hidden bottom-2 right-2 group-hover/blog:block author group-hover/blog:absolute">
                                                <ul class="mb-0 list-unstyled">
                                                    <li class="list-inline-item"><a href="javascript:void(0)" class="text-white"><i class="mdi mdi-heart-outline me-1"></i> 33</a></li>
                                                    <li class="list-inline-item"><a href="javascript:void(0)" class="text-white"><i class="mdi mdi-comment-outline me-1"></i> 08</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="p-5">
                                            <a href="blog-details.html" class="primary-link">
                                                <h5 class="mb-1 text-gray-900 fs-17 dark:text-gray-50">Edit Services</h5>
                                            </a>
                                            <p class="mb-3 text-gray-500 dark:text-gray-300">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam, eius!</p>
                                            <p class="mb-3 text-gray-500 dark:text-gray-300"></p>
                                            <a href="../InfoCRUD/services-index.php" class="inline-block px-4 py-2 font-medium border rounded-md transition duration-300 ease-in-out transform group">
                                                Edit <i class="align-middle mdi mdi-chevron-right"></i>
                                            </a>                                        </div>
                                    </div>
                                </div>
                                
                                
                                </div>
                            </div>
                        </div>
                    </section>
    </div>
</div>

                                    
                </div>
            </div>


        </section>
        <!-- End grid -->



    </div>
</div>


<!-- end main content-->




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