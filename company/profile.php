<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location:http://localhost/Seekers---job-portal-using-php-tailwind-mysql/index.php");
} else if (isset($_SESSION["username"]) and $_SESSION["role"] == 'admin') {
    header("Location:http://localhost/Seekers---job-portal-using-php-tailwind-mysql/admin/dashboard-admin.php");
}else if (isset($_SESSION["username"]) and $_SESSION["role"] == 'user') {
    header("Location:http://localhost/Seekers---job-portal-using-php-tailwind-mysql/admin/dashboard-user.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Profile</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
      <!-- App favicon -->
      <link rel="shortcut icon" href="../assets/images/favicon.ico" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Choise Css -->
    <link rel="stylesheet" href="../assets/libs/choices.js/public/assets/styles/choices.min.css">

    <link rel="stylesheet" href="../assets/css/icons.css" />
    <link rel="stylesheet" href="../assets/css/tailwind.css" />
     <!-- Swiper Css -->
     <link rel="stylesheet" href="../assets/libs/swiper/swiper-bundle.min.css">


<link rel="stylesheet" href="../assets/css/icons.css" />
<link rel="stylesheet" href="../assets/css/tailwind.css" />


</head>
<body class="font-sans">

<?php
    include('nav.php');
?>




<div class="bg-cover bg-center h-64 mt-20" style="background-image: url('../assets/images/about/img-01.jpg');">
    <div class="flex items-center justify-center h-full">
        
    </div>
</div>

<div class="container mx-auto mt-8 p-4">
    <div class="flex items-center">
        <div>
            <!-- Your company logo -->
            <img src="../assets/images/featured-job/img-01.png" alt="Company Logo" class="w-16 h-16 object-cover rounded-full">
        </div>
        <div class="ml-4">
            <h1 class="text-3xl font-bold mb-2">Company Name</h1>
            <p class="text-gray-700">Company Description and other information...</p>
        </div>
        <div class="ml-auto">
            <!-- Follow button -->
            <button class="bg-blue-500 text-white px-4 py-2 rounded-full">Follow</button>
        </div>
    </div>
</div>

<nav class="bg-gray-800 text-white p-4">
    <a href="#why-join-us" class="hover:bg-gray-600 px-4 py-2 active">Why Join Us</button>
    <a href="#reviews" class="hover:bg-gray-600 px-4 py-2">Reviews</a>
    <a href="#salary" class="hover:bg-gray-600 px-4 py-2">Salary</a>
    <a href="#jobs" class="hover:bg-gray-600 px-4 py-2">Jobs</a>
    <a href="#interview-scheduling" class="hover:bg-gray-600 px-4 py-2">Interview Scheduling</a>
</nav>
<!-- About Us Section -->
<section class="py-20 bg-gray-50 dark:bg-neutral-700" id="why-join-us">
                        <div class="container mx-auto">
                            <div class="grid grid-cols-1 gap-5">
                                <div class="mb-5 text-center">
                                    <h3 class="mb-3 text-3xl text-gray-900 dark:text-gray-50">About Us</h3>
                                    <p class="mb-5 text-gray-500 whitespace-pre-line dark:text-gray-300"></p>
                                </div>
                            </div>
                            <div class="grid grid-cols-12 gap-5">
                                <div class="col-span-12 md:col-span-6 lg:col-span-4">
                                    <div class="p-2 mt-3 transition-all duration-500 bg-white rounded shadow-lg shadow-gray-100/50 card dark:bg-neutral-800 dark:shadow-neutral-600/20 group/blog">
                                        <div class="relative overflow-hidden">
                                            <img src="../assets/images/blog/img-01.jpg" alt="" class="rounded">
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
                                                <h5 class="mb-1 text-gray-900 fs-17 dark:text-gray-50">Our Mission & Vission</h5>
                                            </a>
                                            <p class="mb-3 text-gray-500 dark:text-gray-300">Lorem ipsum dolor sit amet.</p>
                                            <p class="mb-3 text-gray-500 dark:text-gray-300">Lorem ipsum dolor sit, amet consectetur adipisicing.</p>
                                            <a href="blog-details.html" class="font-medium group-data-[theme-color=violet]:text-violet-500 group-data-[theme-color=sky]:text-sky-500 group-data-[theme-color=red]:text-red-500 group-data-[theme-color=green]:text-green-500 group-data-[theme-color=pink]:text-pink-500 group-data-[theme-color=blue]:text-blue-500">Read more <i class="align-middle mdi mdi-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- second card  -->
                                <div class="col-span-12 md:col-span-6 lg:col-span-4">
                                    <div class="p-2 mt-3 transition-all duration-500 bg-white rounded shadow-lg shadow-gray-100/50 card dark:bg-neutral-800 dark:shadow-neutral-600/20 group/blog">
                                        <div class="relative overflow-hidden">
                                            <img src="../assets/images/blog/img-01.jpg" alt="" class="rounded">
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
                                                <h5 class="mb-1 text-gray-900 fs-17 dark:text-gray-50">Facitilies</h5>
                                            </a>
                                            <p class="mb-3 text-gray-500 dark:text-gray-300">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam, eius!</p>
                                            <p class="mb-3 text-gray-500 dark:text-gray-300">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum, distinctio.</p>
                                            <a href="blog-details.html" class="font-medium group-data-[theme-color=violet]:text-violet-500 group-data-[theme-color=sky]:text-sky-500 group-data-[theme-color=red]:text-red-500 group-data-[theme-color=green]:text-green-500 group-data-[theme-color=pink]:text-pink-500 group-data-[theme-color=blue]:text-blue-500">Read more <i class="align-middle mdi mdi-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- third card  -->
                                <div class="col-span-12 md:col-span-6 lg:col-span-4">
                                    <div class="p-2 mt-3 transition-all duration-500 bg-white rounded shadow-lg shadow-gray-100/50 card dark:bg-neutral-800 dark:shadow-neutral-600/20 group/blog">
                                        <div class="relative overflow-hidden">
                                            <img src="../assets/images/blog/img-01.jpg" alt="" class="rounded">
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
                                                <h5 class="mb-1 text-gray-900 fs-17 dark:text-gray-50">Social Media</h5>
                                            </a>
                                            <p class="mb-3 text-gray-500 dark:text-gray-300"><div class="flex">
        <div class="mr-8">
            <!-- Add social media links with icons here -->
            <a href="#" class="text-blue-500 hover:underline" title="Twitter"><i class="fab fa-twitter"></i></a><br>
            <a href="#" class="text-blue-500 hover:underline" title="LinkedIn"><i class="fab fa-linkedin"></i></a><br>
            <a href="#" class="text-blue-500 hover:underline" title="Facebook"><i class="fab fa-facebook"></i></a>
        </div>
        <div>
            <!-- Add contact form or contact information here -->
            <p class="text-gray-700">Contact us at: contact@company.com</p>
            <!-- Add a contact form if needed -->
        </div>
    </div>
                                      
                                            <a href="blog-details.html" class="font-medium group-data-[theme-color=violet]:text-violet-500 group-data-[theme-color=sky]:text-sky-500 group-data-[theme-color=red]:text-red-500 group-data-[theme-color=green]:text-green-500 group-data-[theme-color=pink]:text-pink-500 group-data-[theme-color=blue]:text-blue-500">Read more <i class="align-middle mdi mdi-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <a href="#">View More</a>
                                </div>
                                
                                
                                </div>
                            </div>
                        </div>
                    </section>


                <!-- start testimonial -->
            <section id= "reviews">
                    <section class="py-20 dark:bg-neutral-800" >
                        <div class="container mx-auto">
                            <div class="grid grid-cols-1 gap-5">
                                <div class="mb-5 text-center">
                                    <h3 class="mb-3 text-3xl text-gray-900 dark:text-gray-50">Happy Candidates</h3>
                                    <p class="mb-5 text-gray-500 whitespace-pre-line dark:text-gray-300">Post a job to tell us about your project. We'll quickly match you with the right <br> freelancers.</p>
                                </div>
                            </div>
                            <div class="grid grid-cols-12 mt-8">
                                <div class="col-span-12 lg:col-span-8 lg:col-start-3">
                                    <div class="pb-5 swiper testimonialSlider">
                                        <div class="mb-12 swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="text-center">
                                                    <div class="mb-4">
                                                        <img src="../assets/images/logo/mailchimp.svg" class="h-12 mx-auto" alt="" />
                                                    </div>
                                                    <p class="mb-4 text-lg font-thin text-gray-500 dark:text-gray-200">" Very well thought out and articulate communication.
                                                        Clear milestones, deadlines and fast work. Patience. Infinite patience. No
                                                        shortcuts. Even if the client is being careless. "</p>
                                                    <h5 class="mb-0 dark:text-gray-50">Jeffrey Montgomery</h5>
                                                    <p class="mb-0 text-gray-500 dark:text-gray-300">Product Manager</p>
                                                </div>
                                            </div>
                                            <!--end swiper-slide-->
                                            <div class="swiper-slide">
                                                <div class="text-center">
                                                    <div class="mb-4">
                                                        <img src="../assets/images/logo/wordpress.svg" class="h-12 mx-auto" alt="" />
                                                    </div>
                                                    <p class="mb-4 text-lg font-thin text-gray-500 dark:text-gray-200">" Very well thought out and articulate communication.
                                                        Clear milestones, deadlines and fast work. Patience. Infinite patience. No
                                                        shortcuts. Even if the client is being careless. "</p>
                                                    <h5 class="mb-0 dark:text-gray-50">Rebecca Swartz</h5>
                                                    <p class="mb-0 text-gray-500 dark:text-gray-300">Creative Designer</p>
                                                </div>
                                            </div>
                                            <!--end swiper-slide-->
                                            <div class="swiper-slide">
                                                <div class="text-center">
                                                    <div class="mb-4">
                                                        <img src="../assets/images/logo/instagram.svg" class="h-12 mx-auto" alt="" />
                                                    </div>
                                                    <p class="mb-4 text-lg font-thin text-gray-500 dark:text-gray-200">" Very well thought out and articulate communication.
                                                        Clear milestones, deadlines and fast work. Patience. Infinite patience. No
                                                        shortcuts. Even if the client is being careless. "</p>
                                                    <h5 class="mb-0 dark:text-gray-50">Charles Dickens</h5>
                                                    <p class="mb-0 text-gray-500 dark:text-gray-300">Store Assistant</p>
                                                </div>
                                            </div>
                                            <!--end swiper-slide-->
                                        </div>
                                        <!--end swiper-wrapper-->
                                        <div class="swiper-pagination"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                <!-- end testimonial -->

            <div>
    <!-- salary -->
    <div>
    <!-- salary -->
    <!-- salary -->
    <section class="py-20 bg-gray-50 dark:bg-neutral-700" id="salary">
                        <div class="container mx-auto">
                            <div class="grid grid-cols-1 gap-5">
                                <div class="mb-5 text-center">
                                    <h3 class="mb-3 text-3xl text-gray-900 dark:text-gray-50">Salary</h3>
                                    <p class="mb-5 text-gray-500 whitespace-pre-line dark:text-gray-300"></p>
                                </div>
                            </div>
                            <div class="grid grid-cols-12 gap-5">
                                <div class="col-span-12 md:col-span-6 lg:col-span-4">
                                    <div class="p-2 mt-3 transition-all duration-500 bg-white rounded shadow-lg shadow-gray-100/50 card dark:bg-neutral-800 dark:shadow-neutral-600/20 group/blog">
                                        <div class="relative overflow-hidden">
                                            <img src="../assets/images/blog/img-01.jpg" alt="" class="rounded">
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
                                                <h5 class="mb-1 text-gray-900 fs-17 dark:text-gray-50">Web Design</h5>
                                            </a>
                                            <p class="mb-3 text-gray-500 dark:text-gray-300">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam, eius!</p>
                                            <p class="mb-3 text-gray-500 dark:text-gray-300"><span class="font-bold">Salary:</span>$8000Tk <span class="font-bold">per year </span></p>
                                            <a href="blog-details.html" class="font-medium group-data-[theme-color=violet]:text-violet-500 group-data-[theme-color=sky]:text-sky-500 group-data-[theme-color=red]:text-red-500 group-data-[theme-color=green]:text-green-500 group-data-[theme-color=pink]:text-pink-500 group-data-[theme-color=blue]:text-blue-500">Read more <i class="align-middle mdi mdi-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- second card  -->
                                <div class="col-span-12 md:col-span-6 lg:col-span-4">
                                    <div class="p-2 mt-3 transition-all duration-500 bg-white rounded shadow-lg shadow-gray-100/50 card dark:bg-neutral-800 dark:shadow-neutral-600/20 group/blog">
                                        <div class="relative overflow-hidden">
                                            <img src="../assets/images/blog/img-01.jpg" alt="" class="rounded">
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
                                                <h5 class="mb-1 text-gray-900 fs-17 dark:text-gray-50">Web Design</h5>
                                            </a>
                                            <p class="mb-3 text-gray-500 dark:text-gray-300">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam, eius!</p>
                                            <p class="mb-3 text-gray-500 dark:text-gray-300"><span class="font-bold">Salary:</span>$8000Tk <span class="font-bold">per year </span></p>
                                            <a href="blog-details.html" class="font-medium group-data-[theme-color=violet]:text-violet-500 group-data-[theme-color=sky]:text-sky-500 group-data-[theme-color=red]:text-red-500 group-data-[theme-color=green]:text-green-500 group-data-[theme-color=pink]:text-pink-500 group-data-[theme-color=blue]:text-blue-500">Read more <i class="align-middle mdi mdi-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- third card  -->
                                <div class="col-span-12 md:col-span-6 lg:col-span-4">
                                    <div class="p-2 mt-3 transition-all duration-500 bg-white rounded shadow-lg shadow-gray-100/50 card dark:bg-neutral-800 dark:shadow-neutral-600/20 group/blog">
                                        <div class="relative overflow-hidden">
                                            <img src="../assets/images/blog/img-01.jpg" alt="" class="rounded">
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
                                                <h5 class="mb-1 text-gray-900 fs-17 dark:text-gray-50">Web Design</h5>
                                            </a>
                                            <p class="mb-3 text-gray-500 dark:text-gray-300">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam, eius!</p>
                                            <p class="mb-3 text-gray-500 dark:text-gray-300"><span class="font-bold">Salary:</span>$8000Tk <span class="font-bold">per year </span></p>
                                            <a href="blog-details.html" class="font-medium group-data-[theme-color=violet]:text-violet-500 group-data-[theme-color=sky]:text-sky-500 group-data-[theme-color=red]:text-red-500 group-data-[theme-color=green]:text-green-500 group-data-[theme-color=pink]:text-pink-500 group-data-[theme-color=blue]:text-blue-500">Read more <i class="align-middle mdi mdi-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <a href="#">View More</a>
                                </div>
                                
                                
                                </div>
                            </div>
                        </div>
                    </section>
    


        <!-- Add more job types as needed -->
        <section class="py-20 bg-gray-50 dark:bg-neutral-700" id="jobs">
                        <div class="container mx-auto">
                            <div class="grid grid-cols-1 gap-5">
                                <div class="mb-5 text-center">
                                    <h3 class="mb-3 text-3xl text-gray-900 dark:text-gray-50">Jobs We Offer</h3>
                                    <p class="mb-5 text-gray-500 whitespace-pre-line dark:text-gray-300"></p>
                                </div>
                            </div>
                            <div class="grid grid-cols-12 gap-5">
                                <div class="col-span-12 md:col-span-6 lg:col-span-4">
                                    <div class="p-2 mt-3 transition-all duration-500 bg-white rounded shadow-lg shadow-gray-100/50 card dark:bg-neutral-800 dark:shadow-neutral-600/20 group/blog">
                                        <div class="relative overflow-hidden">
                                            <img src="../assets/images/blog/img-01.jpg" alt="" class="rounded">
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
                                                <h5 class="mb-1 text-gray-900 fs-17 dark:text-gray-50">Frontend Developer</h5>
                                            </a>
                                            <p class="mb-3 text-gray-500 dark:text-gray-300">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam, eius!</p>
                                            <p class="mb-3 text-gray-500 dark:text-gray-300"><span class="font-bold">Salary per Year: $95,000</span></p>
                                            <a href="blog-details.html" class="font-medium group-data-[theme-color=violet]:text-violet-500 group-data-[theme-color=sky]:text-sky-500 group-data-[theme-color=red]:text-red-500 group-data-[theme-color=green]:text-green-500 group-data-[theme-color=pink]:text-pink-500 group-data-[theme-color=blue]:text-blue-500">Read more <i class="align-middle mdi mdi-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- second card  -->
                                <div class="col-span-12 md:col-span-6 lg:col-span-4">
                                    <div class="p-2 mt-3 transition-all duration-500 bg-white rounded shadow-lg shadow-gray-100/50 card dark:bg-neutral-800 dark:shadow-neutral-600/20 group/blog">
                                        <div class="relative overflow-hidden">
                                            <img src="../assets/images/blog/img-01.jpg" alt="" class="rounded">
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
                                                <h5 class="mb-1 text-gray-900 fs-17 dark:text-gray-50">Web Design</h5>
                                            </a>
                                            <p class="mb-3 text-gray-500 dark:text-gray-300">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam, eius!</p>
                                            <p class="mb-3 text-gray-500 dark:text-gray-300"><span class="font-bold">Salary:</span>$8000Tk <span class="font-bold">per year </span></p>
                                            <a href="blog-details.html" class="font-medium group-data-[theme-color=violet]:text-violet-500 group-data-[theme-color=sky]:text-sky-500 group-data-[theme-color=red]:text-red-500 group-data-[theme-color=green]:text-green-500 group-data-[theme-color=pink]:text-pink-500 group-data-[theme-color=blue]:text-blue-500">Read more <i class="align-middle mdi mdi-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- third card  -->
                                <div class="col-span-12 md:col-span-6 lg:col-span-4">
                                    <div class="p-2 mt-3 transition-all duration-500 bg-white rounded shadow-lg shadow-gray-100/50 card dark:bg-neutral-800 dark:shadow-neutral-600/20 group/blog">
                                        <div class="relative overflow-hidden">
                                            <img src="../assets/images/blog/img-01.jpg" alt="" class="rounded">
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
                                                <h5 class="mb-1 text-gray-900 fs-17 dark:text-gray-50">Web Design</h5>
                                            </a>
                                            <p class="mb-3 text-gray-500 dark:text-gray-300">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam, eius!</p>
                                            <p class="mb-3 text-gray-500 dark:text-gray-300"><span class="font-bold">Salary:</span>$8000Tk <span class="font-bold">per year </span></p>
                                            <a href="blog-details.html" class="font-medium group-data-[theme-color=violet]:text-violet-500 group-data-[theme-color=sky]:text-sky-500 group-data-[theme-color=red]:text-red-500 group-data-[theme-color=green]:text-green-500 group-data-[theme-color=pink]:text-pink-500 group-data-[theme-color=blue]:text-blue-500">Read more <i class="align-middle mdi mdi-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <a href="#">View More</a>
                                </div>
                                
                                
                                </div>
                            </div>
                        </div>
                    </section>
     <!-- Interview Schedule Section -->
     <section class="py-20 bg-gray-50 dark:bg-neutral-700" id="interview-scheduling">
                        <div class="container mx-auto">
                            <div class="grid grid-cols-1 gap-5">
                                <div class="mb-5 text-center">
                                    <h3 class="mb-3 text-3xl text-gray-900 dark:text-gray-50">Interview Schedule</h3>
                                    <p class="mb-5 text-gray-500 whitespace-pre-line dark:text-gray-300"></p>
                                </div>
                            </div>
                            <div class="grid grid-cols-12 gap-5">
                                <div class="col-span-12 md:col-span-6 lg:col-span-4">
                                    <div class="p-2 mt-3 transition-all duration-500 bg-white rounded shadow-lg shadow-gray-100/50 card dark:bg-neutral-800 dark:shadow-neutral-600/20 group/blog">
                                        <div class="relative overflow-hidden">
                                            <img src="../assets/images/blog/img-01.jpg" alt="" class="rounded">
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
                                                <h5 class="mb-1 text-gray-900 fs-17 dark:text-gray-50">Frontend Developer</h5>
                                            </a>
                                            <p class="mb-3 text-gray-500 dark:text-gray-300">Apply Deadline: December 15, 2023</p>
                                            <p class="mb-3 text-gray-500 dark:text-gray-300">Interview Schedule: January 5-10, 2024</p>
                                            <a href="blog-details.html" class="font-medium group-data-[theme-color=violet]:text-violet-500 group-data-[theme-color=sky]:text-sky-500 group-data-[theme-color=red]:text-red-500 group-data-[theme-color=green]:text-green-500 group-data-[theme-color=pink]:text-pink-500 group-data-[theme-color=blue]:text-blue-500">Read more <i class="align-middle mdi mdi-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- second card  -->
                                <div class="col-span-12 md:col-span-6 lg:col-span-4">
                                    <div class="p-2 mt-3 transition-all duration-500 bg-white rounded shadow-lg shadow-gray-100/50 card dark:bg-neutral-800 dark:shadow-neutral-600/20 group/blog">
                                        <div class="relative overflow-hidden">
                                            <img src="../assets/images/blog/img-01.jpg" alt="" class="rounded">
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
                                                <h5 class="mb-1 text-gray-900 fs-17 dark:text-gray-50">Web Design</h5>
                                            </a>
                                            <p class="mb-3 text-gray-500 dark:text-gray-300">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam, eius!</p>
                                            <p class="mb-3 text-gray-500 dark:text-gray-300"><span class="font-bold">Salary:</span>$8000Tk <span class="font-bold">per year </span></p>
                                            <a href="blog-details.html" class="font-medium group-data-[theme-color=violet]:text-violet-500 group-data-[theme-color=sky]:text-sky-500 group-data-[theme-color=red]:text-red-500 group-data-[theme-color=green]:text-green-500 group-data-[theme-color=pink]:text-pink-500 group-data-[theme-color=blue]:text-blue-500">Read more <i class="align-middle mdi mdi-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- third card  -->
                                <div class="col-span-12 md:col-span-6 lg:col-span-4">
                                    <div class="p-2 mt-3 transition-all duration-500 bg-white rounded shadow-lg shadow-gray-100/50 card dark:bg-neutral-800 dark:shadow-neutral-600/20 group/blog">
                                        <div class="relative overflow-hidden">
                                            <img src="../assets/images/blog/img-01.jpg" alt="" class="rounded">
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
                                                <h5 class="mb-1 text-gray-900 fs-17 dark:text-gray-50">Web Design</h5>
                                            </a>
                                            <p class="mb-3 text-gray-500 dark:text-gray-300">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam, eius!</p>
                                            <p class="mb-3 text-gray-500 dark:text-gray-300"><span class="font-bold">Salary:</span>$8000Tk <span class="font-bold">per year </span></p>
                                            <a href="blog-details.html" class="font-medium group-data-[theme-color=violet]:text-violet-500 group-data-[theme-color=sky]:text-sky-500 group-data-[theme-color=red]:text-red-500 group-data-[theme-color=green]:text-green-500 group-data-[theme-color=pink]:text-pink-500 group-data-[theme-color=blue]:text-blue-500">Read more <i class="align-middle mdi mdi-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <a href="#">View More</a>
                                </div>
                                
                                
                                </div>
                            </div>
                        </div>
                    </section>
    </div>
        
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
