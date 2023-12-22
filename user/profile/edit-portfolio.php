
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!-- App favicon -->
     <link rel="shortcut icon" href="../../assets/images/favicon.ico" />


<link rel="stylesheet" href="../../assets/libs/choices.js/public/assets/styles/choices.min.css">

<link rel="stylesheet" href="../../assets/css/icons.css" />
<link rel="stylesheet" href="../../assets/css/tailwind.css" />

</head>
<body>
    <?php
        include('nav1.php');
    ?>

<div class="main-content">
    <div class="page-content">


        <!-- Start grid -->
        <section class="py-20">
            <div class="container mx-auto">
                <div class="grid grid-cols-12 gap-y-10 lg:gap-10 mx-auto">
                    
                    <div class="col-span-12 lg:col-span-12">
                        <div class="border rounded border-gray-100/50 dark:border-neutral-600 nav-tabs bottom-border-tab">
                            <div class="px-6 py-0 border-b border-gray-100/50 dark:border-neutral-600">

                                <ul class="items-center text-sm font-medium text-center text-gray-700 nav md:flex">
                                    <li class="nav-item" role="presentation">
                                        <button class="inline-block w-full py-4 px-[18px] dark:text-gray-50" data-tw-toggle="tab" type="button" data-tw-target="settings-tab">
                                            Settings
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
                                                <h5 class="mb-1 text-gray-900 fs-17 dark:text-gray-50">Edit Experience</h5>
                                            </a>
                                            <p class="mb-3 text-gray-500 dark:text-gray-300">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam, eius!</p>
                                            <p class="mb-3 text-gray-500 dark:text-gray-300"></span></p>
                                            <a href="../InfoCRUD/experience-index.php" class="inline-block px-4 py-2 font-medium border rounded-md transition duration-300 ease-in-out transform group">
                                                Edit <i class="align-middle mdi mdi-chevron-right"></i>
                                            </a>                                        </div>
                                    </div>
                                </div>
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
                                            <a href="../educationcrud/education-index.php" class="inline-block px-4 py-2 font-medium border rounded-md transition duration-300 ease-in-out transform group">
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
                                            <a href="../educationcrud/projects-index.php" class="inline-block px-4 py-2 font-medium border rounded-md transition duration-300 ease-in-out transform group">
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

<?php
include('../footer.php');
?>

<script>
    function updateProfilePicture() {
        const fileInput = document.getElementById('profile-img-file-input');
        const form = new FormData();
        form.append('dp-img', fileInput.files[0]);

        fetch('update-profile-picture.php', {
                method: 'POST',
                body: form
            })
            .then(response => response.json())
            .then(data => {
                // Handle response, e.g., display a success message
                console.log(data);
            })
            .catch(error => {
                // Handle error
                console.error('Error:', error);
            });
    }
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