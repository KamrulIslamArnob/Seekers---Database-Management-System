
<?php

    session_start();

?>


<!DOCTYPE html>
<html lang="en" dir="ltr" data-mode="light" class="scroll-smooths group" data-theme-color="violet">
    <head>
        <meta charset="utf-8" />
        <title>Company List | Jobcy - Admin & Dashboard Template</title>
        <meta
          name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <meta
          content="Tailwind Multipurpose Admin & Dashboard Template"
          name="description"
        />
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



        
   <?php include('nav1.php');?>


                <div class="fixed z-40 flex flex-col gap-3 ltr:left-0 rtl:right-0 top-[330px]">
                    <!-- light-dark mode button -->
                    <a href="javascript: void(0);" id="ltr-rtl" class="z-40 px-3 py-3 font-medium text-white transition-all duration-300 ease-linear group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500 text-14 hover:bg-violet-700 ltr:rounded-r rtl:rounded-l" onclick="changeMode(event)">
                                <span class="ltr:hidden">LTR</span>
                                <span  class="rtl:hidden">RTL</span>
                            </a>  
           
                </div> 
        
                <div class="fixed transition-all duration-300 ease-linear top-[27.5rem] switcher" id="style-switcher">
                    <div class="w-48 p-4 bg-white shadow-md" >
                        <div>
                            <h3 class="mb-2 font-semibold text-gray-900 text-16">Select your color</h3>
                            <ul class="flex gap-3 ">
                                <li>
                                    <a class="h-10 w-10 bg-[#815DF2] block rounded-full" data-color="violet" href="javascript: void(0);"></a>
                                </li>
                                <li>
                                    <a class="h-10 w-10 bg-[#69cdf1] block rounded-full" data-color="sky" href="javascript: void(0);"></a>
                                </li>
                                <li>
                                    <a class="h-10 w-10 bg-[#dd4948] block rounded-full" data-color="red" href="javascript: void(0);"></a>
                                </li>
                            </ul>
                            <ul class="flex gap-3 mt-4">
                                <li>
                                    <a class="h-10 w-10 bg-[#38c284] block rounded-full" data-color="green" href="javascript: void(0);"></a>
                                </li>
                                 <li>
                                    <a class="h-10 w-10 bg-[#e35490] block rounded-full" data-color="pink"  href="javascript: void(0);"></a>
                                </li>
                                <li>
                                    <a class="h-10 w-10 bg-[#5276f4] block rounded-full" data-color="blue" href="javascript: void(0);"></a>
                                </li>
                            </ul>
                        </div>

                        <div class="mt-5">
                            <h3 class="mb-2 font-semibold text-gray-900 text-16">Light/dark Layout</h3>
                            <div class="flex justify-center mt-2">
                                   <!-- light-dark mode button -->
                                <a href="javascript: void(0);" id="mode" class="z-40 px-6 py-2 font-normal text-white transition-all duration-300 ease-linear rounded text-14 bg-zinc-800" onclick="changeMode(event)">
                                    <i class="hidden text-xl uil uil-brightness dark:text-white dark:inline-block"></i>
                                    <i class="inline-block text-xl uil uil-moon dark:text-zinc-800 dark:hidden"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div> 
                <!-- light-dark mode button -->
                <a href="javascript: void(0);" onclick="toggleSwitcher()" class="fixed z-40 flex flex-col gap-3 px-4 py-3 font-normal text-white group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500 top-96 text-14 ltr:rounded-r rtl:rounded-l">
                    <i class="text-xl mdi mdi-cog mdi-spin"></i>
                </a> 
        

        <div class="main-content">
            <div class="page-content">

                <section class="pt-28 lg:pt-44 pb-28 group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500 dark:bg-neutral-900 bg-[url('../images/home/page-title.png')] bg-center bg-cover relative" >
                    <div class="container mx-auto">
                        <div class="grid">
                            <div class="col-span-12">
                                <div class="text-center text-white">
                                    <h3 class="mb-4 text-[26px]">Company List</h3>
                                    <div class="page-next">
                                        <nav class="inline-block" aria-label="breadcrumb text-center">
                                            <ol class="flex flex-wrap justify-center text-sm font-medium uppercase">
                                                <li><a href="index.html">Home</a></li>
                                                <li><i class="bx bxs-chevron-right align-middle px-2.5"></i><a href="javascript:void(0)">Pages</a></li>
                                                <li class="active" aria-current="page"><i class="bx bxs-chevron-right align-middle px-2.5"></i>Company List</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <img src="../assets/images/about/shape.png" alt="" class="absolute block bg-cover -bottom-0 dark:hidden">
                    <img src="../assets/images/about/shape-dark.png" alt="" class="absolute hidden bg-cover -bottom-0 dark:block">
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
                                                    <select class="form-select" data-trigger name="choices-single-filter-orderby" id="choices-single-filter-orderby" aria-label="Default select example">
                                                        <option value="df">Default</option>
                                                        <option value="ne">Newest</option>
                                                        <option value="od">Oldest</option>
                                                        <option value="rd">Random</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-span-12 lg:col-span-6">
                                                <div class="selection-widget">
                                                    <select class="form-select" data-trigger name="choices-candidate-page" id="choices-candidate-page" aria-label="Default select example">
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
                                <div class="grid grid-cols-12 gap-8">
                                    <div class="col-span-12 lg:col-span-4">
                                        <div class="relative px-6 py-12 border rounded-md border-gray-100/50 dark:border-neutral-600">
                                            <img src="../assets/images/featured-job/img-01.png" alt="" class="mx-auto">
                                            <div class="mt-5 text-center">
                                                <a href="company-details.html"><h6 class="mb-3 text-lg text-gray-900 dark:text-white">Jobcy Consulting</h6></a>
                                                <p class="mb-6 text-gray-500 dark:text-gray-300">New York</p>
    
                                                <a href="company-details.html" class="text-white border-transparent btn group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500 focus:ring focus:ring-custom-500/30">52 Opening Jobs</a>
                                            </div>
                                            <div class="absolute px-2 text-white bg-violet-500 top-3 ltr:right-0 rtl:left-0">
                                                <span class="relative text-xs font-medium uppercase">4.9 <i class="mdi mdi-star-outline"></i></span>
                                                <div class="after:contant[] ltr:after:border-r-[11px] rtl:after:border-l-[11px] after:absolute after:border-b-[11px] ltr:after:-left-[11px] rtl:after:-right-[11px] after:top-0 after:border-t-[11px] after:border-t-transparent after:border-violet-500 after:border-b-transparent"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 lg:col-span-4">
                                        <div class="relative px-6 py-12 border rounded-md border-gray-100/50 dark:border-neutral-600">
                                            <img src="../assets/images/featured-job/img-02.png" alt="" class="mx-auto">
                                            <div class="mt-5 text-center">
                                                <a href="company-details.html"><h6 class="mb-3 text-lg text-gray-900 dark:text-white">Creative Agency</h6></a>
                                                <p class="mb-6 text-gray-500 dark:text-gray-300">UK</p>
    
                                                <a href="company-details.html" class="text-white border-transparent btn group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500 focus:ring focus:ring-custom-500/30">11 Opening Jobs</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 lg:col-span-4">
                                        <div class="relative px-6 py-12 border rounded-md border-gray-100/50 dark:border-neutral-600">
                                            <img src="../assets/images/featured-job/img-03.png" alt="" class="mx-auto">
                                            <div class="mt-5 text-center">
                                                <a href="company-details.html"><h6 class="mb-3 text-lg text-gray-900 dark:text-white">DootTech Solution</h6></a>
                                                <p class="mb-6 text-gray-500 dark:text-gray-300">London</p>
    
                                                <a href="company-details.html" class="text-white border-transparent btn group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500 focus:ring focus:ring-custom-500/30">09 Opening Jobs</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 lg:col-span-4">
                                        <div class="relative px-6 py-12 border rounded-md border-gray-100/50 dark:border-neutral-600">
                                            <img src="../assets/images/featured-job/img-07.png" alt="" class="mx-auto">
                                            <div class="mt-5 text-center">
                                                <a href="company-details.html"><h6 class="mb-3 text-lg text-gray-900 dark:text-white">Apple School & College</h6></a>
                                                <p class="mb-6 text-gray-500 dark:text-gray-300">Canada</p>
    
                                                <a href="company-details.html" class="text-white border-transparent btn group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500 focus:ring focus:ring-custom-500/30">27 Opening Jobs  </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 lg:col-span-4">
                                        <div class="relative px-6 py-12 border rounded-md border-gray-100/50 dark:border-neutral-600">
                                            <img src="../assets/images/featured-job/img-05.png" alt="" class="mx-auto">
                                            <div class="mt-5 text-center">
                                                <a href="company-details.html"><h6 class="mb-3 text-lg text-gray-900 dark:text-white">Hunter Hospital</h6></a>
                                                <p class="mb-6 text-gray-500 dark:text-gray-300">America</p>
    
                                                <a href="company-details.html" class="text-white border-transparent btn group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500 focus:ring focus:ring-custom-500/30">07 Opening Jobs</a>
                                            </div>
                                            <div class="absolute px-2 text-white bg-violet-500 top-3 ltr:right-0 rtl:left-0">
                                                <span class="relative text-xs font-medium uppercase">4.8 <i class="mdi mdi-star-outline"></i></span>
                                                <div class="after:contant[] ltr:after:border-r-[11px] rtl:after:border-l-[11px] after:absolute after:border-b-[11px] ltr:after:-left-[11px] rtl:after:-right-[11px] after:top-0 after:border-t-[11px] after:border-t-transparent after:border-violet-500 after:border-b-transparent"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 lg:col-span-4">
                                        <div class="relative px-6 py-12 border rounded-md border-gray-100/50 dark:border-neutral-600">
                                            <img src="../assets/images/featured-job/img-06.png" alt="" class="mx-auto">
                                            <div class="mt-5 text-center">
                                                <a href="company-details.html"><h6 class="mb-3 text-lg text-gray-900 dark:text-white">Jshop Agency</h6></a>
                                                <p class="mb-6 text-gray-500 dark:text-gray-300">Canada</p>
    
                                                <a href="company-details.html" class="text-white border-transparent btn group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500 focus:ring focus:ring-custom-500/30">20 Opening Jobs</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 lg:col-span-4">
                                        <div class="relative px-6 py-12 border rounded-md border-gray-100/50 dark:border-neutral-600">
                                            <img src="../assets/images/featured-job/img-08.png" alt="" class="mx-auto">
                                            <div class="mt-5 text-center">
                                                <a href="company-details.html"><h6 class="mb-3 text-lg text-gray-900 dark:text-white">Adobe Agency</h6></a>
                                                <p class="mb-6 text-gray-500 dark:text-gray-300">New York</p>
    
                                                <a href="company-details.html" class="text-white border-transparent btn group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500 focus:ring focus:ring-custom-500/30">27 Opening Jobs</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 lg:col-span-4">
                                        <div class="relative px-6 py-12 border rounded-md border-gray-100/50 dark:border-neutral-600">
                                            <img src="../assets/images/featured-job/img-09.png" alt="" class="mx-auto">
                                            <div class="mt-5 text-center">
                                                <a href="company-details.html"><h6 class="mb-3 text-lg text-gray-900 dark:text-white">Creative Agency</h6></a>
                                                <p class="mb-6 text-gray-500 dark:text-gray-300">Uk</p>
    
                                                <a href="company-details.html" class="text-white border-transparent btn group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500 focus:ring focus:ring-custom-500/30">35 Opening Jobs</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 lg:col-span-4">
                                        <div class="relative px-6 py-12 border rounded-md border-gray-100/50 dark:border-neutral-600">
                                            <img src="../assets/images/featured-job/img-10.png" alt="" class="mx-auto">
                                            <div class="mt-5 text-center">
                                                <a href="company-details.html"><h6 class="mb-3 text-lg text-gray-900 dark:text-white">Kshop Agency</h6></a>
                                                <p class="mb-6 text-gray-500 dark:text-gray-300">America</p>
    
                                                <a href="company-details.html" class="text-white border-transparent btn group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500 focus:ring focus:ring-custom-500/30">14 Opening Jobs</a>
                                            </div>
                                            <div class="absolute px-2 text-white bg-violet-500 top-3 ltr:right-0 rtl:left-0">
                                                <span class="relative text-xs font-medium uppercase">3.0 <i class="mdi mdi-star-outline"></i></span>
                                                <div class="after:contant[] ltr:after:border-r-[11px] rtl:after:border-l-[11px] after:absolute after:border-b-[11px] ltr:after:-left-[11px] rtl:after:-right-[11px] after:top-0 after:border-t-[11px] after:border-t-transparent after:border-violet-500 after:border-b-transparent"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-12">
                                <div class="col-span-12">
                                    <ul class="flex justify-center gap-2 mt-8">
                                        <li class="w-12 h-12 text-center border rounded-full cursor-default border-gray-100/50 dark:border-gray-100/20">
                                            <a class="cursor-auto" href="javascript:void(0)" tabindex="-1">
                                                <i class="mdi mdi-chevron-double-left text-16 leading-[2.8] dark:text-white"></i>
                                            </a>
                                        </li>
                                        <li class="w-12 h-12 text-center text-white border border-transparent rounded-full cursor-pointer group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500">
                                            <a class="text-16 leading-[2.8]" href="javascript:void(0)">1</a>
                                        </li>
                                        <li class="w-12 h-12 text-center text-gray-900 transition-all duration-300 border rounded-full cursor-pointer border-gray-100/50 hover:bg-gray-100/30 focus:bg-gray-100/30 dark:border-gray-100/20 dark:text-gray-50 dark:hover:bg-gray-500/20">
                                            <a class="text-16 leading-[2.8]" href="javascript:void(0)">2</a>
                                        </li>
                                        <li class="w-12 h-12 text-center text-gray-900 transition-all duration-300 border rounded-full cursor-pointer border-gray-100/50 hover:bg-gray-100/30 focus:bg-gray-100/30 dark:border-gray-100/20 dark:text-gray-50 dark:hover:bg-gray-500/20">
                                            <a class="text-16 leading-[2.8]" href="javascript:void(0)">3</a>
                                        </li>
                                        <li class="w-12 h-12 text-center text-gray-900 transition-all duration-300 border rounded-full cursor-pointer border-gray-100/50 hover:bg-gray-100/30 focus:bg-gray-100/30 dark:border-gray-100/20 dark:text-gray-50 dark:hover:bg-gray-500/20">
                                            <a class="text-16 leading-[2.8]" href="javascript:void(0)">4</a>
                                        </li>
                                        <li class="w-12 h-12 text-center text-gray-900 transition-all duration-300 border rounded-full cursor-pointer border-gray-100/50 hover:bg-gray-100/30 focus:bg-gray-100/30 dark:border-gray-100/20 dark:text-gray-50 dark:hover:bg-gray-500/20">
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
        
        
        <!-- start subscribe -->
        <section class="relative py-16 overflow-hidden bg-zinc-700 dark:bg-neutral-900">
            <div class="container mx-auto">
                <div class="grid items-center grid-cols-12 gap-5">
                    <div class="col-span-12 lg:col-span-7">
                        <div class="text-center lg:text-start">
                            <h4 class="text-white">Get New Jobs Notification!</h4>
                            <p class="mt-1 mb-0 text-white/50 dark:text-gray-300">Subscribe &amp; get all related jobs notification.</p>
                        </div>
                    </div>
                    <div class="z-40 col-span-12 lg:col-span-5">
                        <form class="flex" action="#">
                            <input
                                type="text" class="w-full text-gray-100 bg-transparent rounded-md border-gray-50/30 ltr:border-r-0 rtl:border-l-0 ltr:rounded-r-none rtl:rounded-l-none placeholder:text-13 placeholder:text-gray-100 dark:text-gray-100 dark:bg-white/5 dark:border-neutral-600 focus:ring-0 focus:ring-offset-0"
                                id="subscribe" placeholder="Enter your email" >
                            <button class="text-white border-transparent btn ltr:rounded-l-none rtl:rounded-r-none group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500 focus:ring focus:ring-custom-500/30" type="button" id="subscribebtn">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="absolute right-0 -top-10 -z-0 opacity-20">
                <img src="../assets/images/subscribe.png" alt="" class="img-fluid">
            </div>
        </section>
        <!-- end subscribe -->
        <!-- Footer Start -->
        <footer class="footer ">
            <!-- start footer -->
            <section class="py-12 bg-zinc-800 dark:bg-neutral-900">
                <div class="container mx-auto">
                    <div class="grid grid-cols-12 lg:gap-10">
                        <div class="col-span-12 xl:col-span-4">
                            <div class="mr-12">
                                <h4 class="text-white mb-6 text-[23px]">Jobcy</h4>
                                <p class="text-white/50 dark:text-gray-300">
                                    It is a long established fact that a reader will be of a page reader
                                    will be of at its layout.
                                </p>
                                <p class="mt-3 text-white dark:text-gray-50">Follow Us on:</p>
                                <div class="mt-5">
                                    <ul class="flex gap-3">
                                        <li class="w-8 h-8 leading-loose text-center text-gray-200 transition-all duration-300 border rounded-full cursor-pointer border-gray-200/50 hover:text-gray-50 group-data-[theme-color=violet]:hover:bg-violet-500 group-data-[theme-color=sky]:hover:bg-sky-500 group-data-[theme-color=red]:hover:bg-red-500 group-data-[theme-color=green]:hover:bg-green-500 group-data-[theme-color=pink]:hover:bg-pink-500 group-data-[theme-color=blue]:hover:bg-blue-500 hover:border-transparent">
                                            <a href="#">
                                                <i class="uil uil-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li class="w-8 h-8 leading-loose text-center text-gray-200 transition-all duration-300 border rounded-full cursor-pointer border-gray-200/50 hover:text-gray-50 group-data-[theme-color=violet]:hover:bg-violet-500 group-data-[theme-color=sky]:hover:bg-sky-500 group-data-[theme-color=red]:hover:bg-red-500 group-data-[theme-color=green]:hover:bg-green-500 group-data-[theme-color=pink]:hover:bg-pink-500 group-data-[theme-color=blue]:hover:bg-blue-500 hover:border-transparent">
                                            <a href="#">
                                                <i class="uil uil-linkedin-alt"></i>
                                            </a>
                                        </li>
                                        <li class="w-8 h-8 leading-loose text-center text-gray-200 transition-all duration-300 border rounded-full cursor-pointer border-gray-200/50 hover:text-gray-50 group-data-[theme-color=violet]:hover:bg-violet-500 group-data-[theme-color=sky]:hover:bg-sky-500 group-data-[theme-color=red]:hover:bg-red-500 group-data-[theme-color=green]:hover:bg-green-500 group-data-[theme-color=pink]:hover:bg-pink-500 group-data-[theme-color=blue]:hover:bg-blue-500 hover:border-transparent">
                                            <a href="#">
                                                <i class="uil uil-google"></i>
                                            </a>
                                        </li>
                                        <li class="w-8 h-8 leading-loose text-center text-gray-200 transition-all duration-300 border rounded-full cursor-pointer border-gray-200/50 hover:text-gray-50 group-data-[theme-color=violet]:hover:bg-violet-500 group-data-[theme-color=sky]:hover:bg-sky-500 group-data-[theme-color=red]:hover:bg-red-500 group-data-[theme-color=green]:hover:bg-green-500 group-data-[theme-color=pink]:hover:bg-pink-500 group-data-[theme-color=blue]:hover:bg-blue-500 hover:border-transparent">
                                            <a href="#">
                                                <i class="uil uil-twitter"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 mt-8 md:col-span-6 xl:col-span-2 md:mt-0">
                            <p class="mb-6 text-white text-16">Company</p>
                            <ul class="space-y-4">
                                <li class="text-sm transition-all duration-500 ease-in-out text-white/50 hover:text-gray-50 hover:text-base dark:text-gray-300 dark:hover:text-gray-50">
                                    <a href="about.html">
                                        <i class="mdi mdi-chevron-right"></i> About Us
                                    </a>
                                </li>
                                <li class="text-sm transition-all duration-500 ease-in-out text-white/50 hover:text-gray-50 hover:text-base dark:text-gray-300 dark:hover:text-gray-50">
                                    <a href="contact.html">
                                        <i class="mdi mdi-chevron-right"></i> Contact Us
                                    </a>
                                </li>
                                <li class="text-sm transition-all duration-500 ease-in-out text-white/50 hover:text-gray-50 hover:text-base dark:text-gray-300 dark:hover:text-gray-50">
                                    <a href="services.html">
                                        <i class="mdi mdi-chevron-right"></i> Services
                                    </a>
                                </li>
                                <li class="text-sm transition-all duration-500 ease-in-out text-white/50 hover:text-gray-50 hover:text-base dark:text-gray-300 dark:hover:text-gray-50">
                                    <a href="blog.html">
                                        <i class="mdi mdi-chevron-right"></i> Blog
                                    </a>
                                </li>
                                <li class="text-sm transition-all duration-500 ease-in-out text-white/50 hover:text-gray-50 hover:text-base dark:text-gray-300 dark:hover:text-gray-50">
                                    <a href="team.html">
                                        <i class="mdi mdi-chevron-right"></i> Team
                                    </a>
                                </li>
                                <li class="text-sm transition-all duration-500 ease-in-out text-white/50 hover:text-gray-50 hover:text-base dark:text-gray-300 dark:hover:text-gray-50">
                                    <a href="pricing.html">
                                        <i class="mdi mdi-chevron-right"></i> Pricing
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-span-12 mt-8 md:col-span-6 xl:col-span-2 md:mt-0">
                            <p class="mb-6 text-white text-16">For Jobs</p>
                            <ul class="space-y-4">
                                <li class="text-sm transition-all duration-500 ease-in-out text-white/50 hover:text-gray-50 hover:text-base dark:text-gray-300 dark:hover:text-gray-50">
                                    <a href="job-categories.html">
                                        <i class="mdi mdi-chevron-right"></i> Browser Categories
                                    </a>
                                </li>
                                <li class="text-sm transition-all duration-500 ease-in-out text-white/50 hover:text-gray-50 hover:text-base dark:text-gray-300 dark:hover:text-gray-50">
                                    <a href="job-list.html">
                                        <i class="mdi mdi-chevron-right"></i> Browser Jobs
                                    </a>
                                </li>
                                <li class="text-sm transition-all duration-500 ease-in-out text-white/50 hover:text-gray-50 hover:text-base dark:text-gray-300 dark:hover:text-gray-50">
                                    <a href="job-details.html">
                                        <i class="mdi mdi-chevron-right"></i> Job Details
                                    </a>
                                </li>
                                <li class="text-sm transition-all duration-500 ease-in-out text-white/50 hover:text-gray-50 hover:text-base dark:text-gray-300 dark:hover:text-gray-50">
                                    <a href="bookmark-jobs.html">
                                        <i class="mdi mdi-chevron-right"></i> Bookmark Jobs
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-span-12 mt-8 md:col-span-6 xl:col-span-2 md:mt-0">
                            <p class="mb-6 text-white text-16">For Candidates</p>
                            <ul class="space-y-4">
                                <li class="text-sm transition-all duration-500 ease-in-out text-white/50 hover:text-gray-50 hover:text-base dark:text-gray-300 dark:hover:text-gray-50">
                                    <a href="candidate-list.html">
                                        <i class="mdi mdi-chevron-right"></i> Candidate List
                                    </a>
                                </li>
                                <li class="text-sm transition-all duration-500 ease-in-out text-white/50 hover:text-gray-50 hover:text-base dark:text-gray-300 dark:hover:text-gray-50">
                                    <a href="candidate-grid.html">
                                        <i class="mdi mdi-chevron-right"></i> Candidate Grid
                                    </a>
                                </li>
                                <li class="text-sm transition-all duration-500 ease-in-out text-white/50 hover:text-gray-50 hover:text-base dark:text-gray-300 dark:hover:text-gray-50">
                                    <a href="candidate-details.html">
                                        <i class="mdi mdi-chevron-right"></i> Candidate Details
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-span-12 mt-8 md:col-span-6 xl:col-span-2 md:mt-0">
                            <p class="mb-6 text-white text-16">Support</p>
                            <ul class="space-y-4">
                                <li class="text-sm transition-all duration-500 ease-in-out text-white/50 hover:text-gray-50 hover:text-base dark:text-gray-300 dark:hover:text-gray-50">
                                    <a href="contact.html">
                                        <i class="mdi mdi-chevron-right"></i> Help Center
                                    </a>
                                </li>
                                <li class="text-sm transition-all duration-500 ease-in-out text-white/50 hover:text-gray-50 hover:text-base dark:text-gray-300 dark:hover:text-gray-50">
                                    <a href="faqs.html">
                                        <i class="mdi mdi-chevron-right"></i> FAQ'S
                                    </a>
                                </li>
                                <li class="text-sm transition-all duration-500 ease-in-out text-white/50 hover:text-gray-50 hover:text-base dark:text-gray-300 dark:hover:text-gray-50">
                                    <a href="privacy-policy.html">
                                        <i class="mdi mdi-chevron-right"></i> Privacy Policy
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end footer -->
            <!-- strat footer alt -->
            <section class="py-6 border-t bg-zinc-800 border-gray-100/10 dark:bg-neutral-900">
                <div class="container mx-auto">
                    <div class="text-center">
                        <p class="mb-0 text-center text-white/50">
                            <script>document.write(new Date().getFullYear())</script>
                            © Jobcy - Job Listing Page
                                Template by
                            <a href="https://themeforest.net/search/themesdesign" target="_blank" class="underline transition-all duration-300 hover:text-gray-50">Themesdesign</a>
                        </p>
                    </div>
                </div>
            </section>
            <!-- end footer alt -->
        </footer>
        <!-- end Footer -->


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