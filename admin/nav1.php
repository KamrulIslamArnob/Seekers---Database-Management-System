
<?php
    
    $conn = mysqli_connect("localhost","root","1","seekers_database");

    if(!isset($_SESSION['username'])){
        header('location:../index.php');
    }



?>

<div class="hidden px-5 mx-auto border-gray-200 container-fluid lg:px-24 bg-gray-50 md:block dark:bg-neutral-600">
            <div class="grid items-center grid-cols-12">
                <div class="col-span-7">
                    <ul class="flex items-center py-3">
                        <li class="ltr:mr-4 rtl:ml-4">
                            <p class="mb-0 text-gray-800 text-13 dark:text-gray-50"> <i class="mdi mdi-map-marker"></i> Your Location: <a href="javascript:void(0)" class="font-medium">New Caledonia</a></p>
                        </li>
                        <li>
                            <ul class="flex flex-wrap gap-4 text-gray-800 ">
                                <li class="transition-all duration-200 ease-in hover:text-green-500 dark:text-gray-50 dark:hover:text-green-500"><a href="javascript:void(0)" class="social-link"><i class="uil uil-whatsapp"></i></a></li>
                                <li class="transition-all duration-200 ease-in hover:text-green-500 dark:text-gray-50 dark:hover:text-green-500"><a href="javascript:void(0)" class="social-link"><i class="uil uil-facebook-messenger-alt"></i></a></li>
                                <li class="transition-all duration-200 ease-in hover:text-green-500 dark:text-gray-50 dark:hover:text-green-500"><a href="javascript:void(0)" class="social-link"><i class="uil uil-instagram"></i></a></li>
                                <li class="transition-all duration-200 ease-in hover:text-green-500 dark:text-gray-50 dark:hover:text-green-500"><a href="javascript:void(0)" class="social-link"><i class="uil uil-envelope"></i></a></li>
                                <li class="transition-all duration-200 ease-in hover:text-green-500 dark:text-gray-50 dark:hover:text-green-500"><a href="javascript:void(0)" class="social-link"><i class="uil uil-twitter-alt"></i></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="col-span-5 ltr:ml-auto rtl:mr-auto">
                    <ul class="flex items-center gap-4">
                        <li>
                            <a href="#signupModal" class="py-3 font-medium text-gray-800 text-13 dark:text-gray-50" data-tw-toggle="modal" data-tw-target="#modal-id_form"><i class="uil uil-lock ltr:mr-1 rtl:ml-1"></i>Sign Up</a>
               
                            <div class="relative z-50 hidden modal" id="modal-id_form" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                <div class="fixed top-0 bottom-0 left-0 right-0 z-50 overflow-hidden">
                                    <div class="absolute inset-0 transition-opacity bg-black bg-opacity-60 modal-overlay"></div>
                                    <div class="box-content p-4 mx-auto animate-translate sm:max-w-lg">
                                        <div class="relative overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl top-36 dark:bg-neutral-800">
                                            <div class="p-12 bg-white dark:bg-neutral-800">
                                                <div class="mb-4 text-center">
                                                    <h5 class="mb-1 text-gray-800 dark:text-gray-50">Sign Up</h5>
                                                    <p class="text-gray-500 dark:text-gray-300">Sign Up and get access to all the features of Jobcy</p>
                                                </div>
                                                <div class="mb-4">
                                                    <label for="usernameInput" class="block text-gray-900 dark:text-gray-50 ltr:text-left rtl:text-right">Username</label>
                                                    <input type="text" class="w-full mt-2 border-gray-100 rounded placeholder:text-13 placeholder:text-gray-200 focus:ring-1 focus:ring-violet-500 dark:bg-transparent dark:text-gray-50 dark:border-neutral-600" id="usernameInput" placeholder="Enter your username">
                                                </div>
                                                <div class="mb-4">
                                                    <label for="emailInput" class="block text-gray-900 dark:text-gray-50 ltr:text-left rtl:text-right">Email</label>
                                                    <input type="email" class="w-full mt-2 border-gray-100 rounded placeholder:text-13 placeholder:text-gray-200 focus:ring-1 focus:ring-violet-500 dark:bg-transparent dark:text-gray-50 dark:border-neutral-600" id="usernameInput" placeholder="Enter your email">
                                                </div>
                                                <div class="mb-4">
                                                    <label for="passwordInput" class="block text-gray-900 dark:text-gray-50 ltr:text-left rtl:text-right">Password</label>
                                                    <input type="password" class="w-full mt-2 border-gray-100 rounded placeholder:text-13 placeholder:text-gray-200 focus:ring-1 focus:ring-violet-500 dark:bg-transparent dark:text-gray-50 dark:border-neutral-600" id="usernameInput" placeholder="Enter your password">
                                                </div>
                                                <div class="mb-3 ltr:float-left rtl:float-right">
                                                    <a href="#!">
                                                        <input class="mr-1 align-middle rounded cursor-pointer group-data-[theme-color=violet]:checked:bg-violet-500 group-data-[theme-color=sky]:checked:bg-sky-500 group-data-[theme-color=red]:checked:bg-red-500 group-data-[theme-color=green]:checked:bg-green-500 group-data-[theme-color=pink]:checked:bg-pink-500 group-data-[theme-color=blue]:checked:bg-blue-500 checked:ring-0 checked:ring-offset-0 focus:ring-0 focus:ring-offset-0 dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-violet-500/20" type="checkbox" id="flexCheckDefault">
                                                        <label class="dark:text-gray-50" for="flexCheckDefault">I agree to the <a href="javascript:void(0)" class="underline group-data-[theme-color=violet]:text-violet-500 group-data-[theme-color=sky]:text-sky-500 group-data-[theme-color=red]:text-red-500 group-data-[theme-color=green]:text-green-500 group-data-[theme-color=pink]:text-pink-500 group-data-[theme-color=blue]:text-blue-500">Terms and conditions</a></label>
                                                    </a>
                                                </div>
                                                <div class="text-center">
                                                    <button type="submit" class="w-full mt-4 text-white border-transparent btn group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500">Sign Up</button>
                                                </div>
                                                <div class="mt-4 text-center">
                                                    <p class="mb-0 text-gray-800 dark:text-gray-300">Already a member ? <a href="sign-in.html" class="font-medium underline group-data-[theme-color=violet]:text-violet-500 group-data-[theme-color=sky]:text-sky-500 group-data-[theme-color=red]:text-red-500 group-data-[theme-color=green]:text-green-500 group-data-[theme-color=pink]:text-pink-500 group-data-[theme-color=blue]:text-blue-500"> Sign-in </a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="relative hidden dropdown language sm:block">
                                <button class="px-4 py-3 border-0 btn dropdown-toggle" type="button" aria-expanded="false" data-dropdown-toggle="navNotifications">
                                    <img src="../assets/images/flags/us.jpg" alt="" class="h-4" id="header-lang-img">
                                </button>
                                <div class="absolute top-auto z-50 hidden w-40 list-none bg-white rounded shadow dropdown-menu -left-20 dark:bg-neutral-700" id="navNotifications">
                                    <ul class="border border-gray-50 dark:border-gray-700" aria-labelledby="navNotifications">
                                        <li>
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50/50 dark:text-gray-200 dark:hover:bg-neutral-600/50 dark:hover:text-white"><img src="../assets/images/flags/us.jpg" alt="user-image" class="inline-block h-3 mr-1"> <span class="align-middle">English</span></a>
                                        </li>
                                        <li>
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50/50 dark:text-gray-200 dark:hover:bg-neutral-600/50 dark:hover:text-white"><img src="../assets/images/flags/spain.jpg" alt="user-image" class="inline-block h-3 mr-1"> <span class="align-middle">Spanish</span></a>
                                        </li>
                                        <li>
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50/50 dark:text-gray-200 dark:hover:bg-neutral-600/50 dark:hover:text-white"><img src="../assets/images/flags/germany.jpg" alt="user-image" class="inline-block h-3 mr-1"> <span class="align-middle">German</span></a>
                                        </li>
                                        <li>
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50/50 dark:text-gray-200 dark:hover:bg-neutral-600/50 dark:hover:text-white"><img src="../assets/images/flags/italy.jpg" alt="user-image" class="inline-block h-3 mr-1"> <span class="align-middle">Italian</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        
        <nav class="navbar fixed right-0 left-0 top-0 lg:top-[44.5px] px-5 lg:px-24 transition-all duration-500 ease shadow-lg shadow-gray-200/20 bg-white border-gray-200 dark:bg-neutral-800 z-40 dark:shadow-neutral-900" id="navbar">
            <div class="mx-auto container-fluid">
                <div class="flex flex-wrap items-center justify-between mx-auto">
                    <a href="index.html" class="flex items-center">
                        <img src="../assets/images/logo-dark.png" alt="" class="logo-dark h-[22px] block dark:hidden">
                        <img src="../assets/images/logo-light.png" alt="" class="logo-dark h-[22px] hidden dark:block">
                    </a>
                    
                    <div class="flex items-center lg:order-2">
                        
                        <div>
                            <div class="relative dropdown ltr:mr-4 rtl:ml-4">
                                <button type="button" class="flex items-center px-4 py-5 dropdown-toggle" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <img class="w-8 h-8 rounded-full ltr:xl:mr-2 rtl:xl:ml-2" src="../assets/images/user/img-02.jpg" alt="Header Avatar">
                                    <span class="hidden fw-medium xl:block dark:text-gray-50"><?php echo $_SESSION['username']?></span>
                                </button>
                                <ul class="absolute top-auto z-50 hidden w-48 p-3 list-none bg-white border rounded shadow-lg dropdown-menu border-gray-500/20 xl:ltr:-left-3 ltr:-left-32 rtl:-right-3 dark:bg-neutral-800" id="profile/log" aria-labelledby="navNotifications">
                                    <li class="p-2 dropdown-item group/dropdown dark:text-gray-300">
                                        <a class="text-15 font-medium text-gray-800  group-data-[theme-color=violet]:group-hover/dropdown:text-violet-500 group-data-[theme-color=sky]:group-hover/dropdown:text-sky-500 group-data-[theme-color=red]:group-hover/dropdown:text-red-500 group-data-[theme-color=green]:group-hover/dropdown:text-green-500 group-data-[theme-color=pink]:group-hover/dropdown:text-pink-500 group-data-[theme-color=blue]:group-hover/dropdown:text-blue-500 group-hover:pl-1.5 transition-all duration-300 ease-in dark:text-gray-50" href="job-categories.php">Job Catagories</a>
                                    </li>
                                    <li class="p-2 dropdown-item group/dropdown dark:text-gray-300">
                                        <a class="text-15 font-medium text-gray-800 group-data-[theme-color=violet]:group-hover/dropdown:text-violet-500 group-data-[theme-color=sky]:group-hover/dropdown:text-sky-500 group-data-[theme-color=red]:group-hover/dropdown:text-red-500 group-data-[theme-color=green]:group-hover/dropdown:text-green-500 group-data-[theme-color=pink]:group-hover/dropdown:text-pink-500 group-data-[theme-color=blue]:group-hover/dropdown:text-blue-500 group-hover:pl-1.5 transition-all duration-300 ease-in dark:text-gray-50" href="registration.php">Registration</a>
                                    </li>
                                    <li class="p-2 dropdown-item group/dropdown dark:text-gray-300">
                                        <a class="text-15 font-medium text-gray-800 group-data-[theme-color=violet]:group-hover/dropdown:text-violet-500 group-data-[theme-color=sky]:group-hover/dropdown:text-sky-500 group-data-[theme-color=red]:group-hover/dropdown:text-red-500 group-data-[theme-color=green]:group-hover/dropdown:text-green-500 group-data-[theme-color=pink]:group-hover/dropdown:text-pink-500 group-data-[theme-color=blue]:group-hover/dropdown:text-blue-500 group-hover:pl-1.5 transition-all duration-300 ease-in dark:text-gray-50" href="manage-users.php">Manage Users</a>
                                    </li>
                                    <li class="p-2 dropdown-item group/dropdown dark:text-gray-300">
                                        <a class="text-15 font-medium text-gray-800 group-data-[theme-color=violet]:group-hover/dropdown:text-violet-500 group-data-[theme-color=sky]:group-hover/dropdown:text-sky-500 group-data-[theme-color=red]:group-hover/dropdown:text-red-500 group-data-[theme-color=green]:group-hover/dropdown:text-green-500 group-data-[theme-color=pink]:group-hover/dropdown:text-pink-500 group-data-[theme-color=blue]:group-hover/dropdown:text-blue-500 group-hover:pl-1.5 transition-all duration-300 ease-in dark:text-gray-50" href="manage-jobs.php">Manage Jobs</a>
                                    </li>
                                    <li class="p-2 dropdown-item group/dropdown dark:text-gray-300">
                                        <a class="text-15 font-medium text-gray-800 group-data-[theme-color=violet]:group-hover/dropdown:text-violet-500 group-data-[theme-color=sky]:group-hover/dropdown:text-sky-500 group-data-[theme-color=red]:group-hover/dropdown:text-red-500 group-data-[theme-color=green]:group-hover/dropdown:text-green-500 group-data-[theme-color=pink]:group-hover/dropdown:text-pink-500 group-data-[theme-color=blue]:group-hover/dropdown:text-blue-500 group-hover:pl-1.5 transition-all duration-300 ease-in dark:text-gray-50" href="quize-manage.php">Manage Quizes</a>
                                    </li>
                                    <li class="p-2 dropdown-item group/dropdown dark:text-gray-300">
                                        <a class="text-15 font-medium text-gray-800 group-data-[theme-color=violet]:group-hover/dropdown:text-violet-500 group-data-[theme-color=sky]:group-hover/dropdown:text-sky-500 group-data-[theme-color=red]:group-hover/dropdown:text-red-500 group-data-[theme-color=green]:group-hover/dropdown:text-green-500 group-data-[theme-color=pink]:group-hover/dropdown:text-pink-500 group-data-[theme-color=blue]:group-hover/dropdown:text-blue-500 group-hover:pl-1.5 transition-all duration-300 ease-in dark:text-gray-50" href="profile-admin.php">My Profile</a>
                                    </li>
                                    <li class="p-2 dropdown-item group/dropdown dark:text-gray-300">
                                        <a class="text-15 font-medium text-gray-800 group-data-[theme-color=violet]:group-hover/dropdown:text-violet-500 group-data-[theme-color=sky]:group-hover/dropdown:text-sky-500 group-data-[theme-color=red]:group-hover/dropdown:text-red-500 group-data-[theme-color=green]:group-hover/dropdown:text-green-500 group-data-[theme-color=pink]:group-hover/dropdown:text-pink-500 group-data-[theme-color=blue]:group-hover/dropdown:text-blue-500 group-hover:pl-1.5 transition-all duration-300 ease-in dark:text-gray-50" href="../auth/sign-out.php">Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div id="navbar-collapse" class="navbar-res items-center justify-between w-full text-sm lg:flex lg:w-auto lg:order-1 group-focus:[.navbar-toggler]:block hidden">
                        <ul class="flex flex-col items-start mt-5 mb-10 font-medium lg:mt-0 lg:mb-0 lg:items-center lg:flex-row" id="navigation-menu">
                            <li class="relative ">
                                <a
                                        class="block w-full px-4 py-2 text-13 font-medium text-gray-700 duration-300 bg-transparent dropdown-item whitespace-nowrap hover:translate-x-1.5 group-data-[theme-color=violet]:hover:text-violet-500 group-data-[theme-color=sky]:hover:text-sky-500 group-data-[theme-color=red]:hover:text-red-500 group-data-[theme-color=green]:hover:text-green-500 group-data-[theme-color=pink]:hover:text-pink-500 group-data-[theme-color=blue]:hover:text-blue-500 uppercase group-data-[mode=dark]:text-gray-50"
                                        href="dashboard-admin.php">Home</a>

                            </li>
                            <li class="relative lg:mt-0">
                                <a
                                        class="block w-full px-4 py-2 text-13 font-medium text-gray-700 duration-300 bg-transparent dropdown-item whitespace-nowrap hover:translate-x-1.5 group-data-[theme-color=violet]:hover:text-violet-500 group-data-[theme-color=sky]:hover:text-sky-500 group-data-[theme-color=red]:hover:text-red-500 group-data-[theme-color=green]:hover:text-green-500 group-data-[theme-color=pink]:hover:text-pink-500 group-data-[theme-color=blue]:hover:text-blue-500 uppercase group-data-[mode=dark]:text-gray-50"
                                        href="../Vendor/cruddiy/core/index.php">Realtion Builder</a>

                                
                            </li>
                            <li class="relative lg:mt-0">
                                <a
                                        class="block w-full px-4 py-2 text-13 font-medium text-gray-700 duration-300 bg-transparent dropdown-item whitespace-nowrap hover:translate-x-1.5 group-data-[theme-color=violet]:hover:text-violet-500 group-data-[theme-color=sky]:hover:text-sky-500 group-data-[theme-color=red]:hover:text-red-500 group-data-[theme-color=green]:hover:text-green-500 group-data-[theme-color=pink]:hover:text-pink-500 group-data-[theme-color=blue]:hover:text-blue-500 uppercase group-data-[mode=dark]:text-gray-50"
                                        href="manage-users.php">Manage Users</a>

                                
                            </li>
                            <li class="relative lg:mt-0">
                                <a
                                        class="block w-full px-4 py-2 text-13 font-medium text-gray-700 duration-300 bg-transparent dropdown-item whitespace-nowrap hover:translate-x-1.5 group-data-[theme-color=violet]:hover:text-violet-500 group-data-[theme-color=sky]:hover:text-sky-500 group-data-[theme-color=red]:hover:text-red-500 group-data-[theme-color=green]:hover:text-green-500 group-data-[theme-color=pink]:hover:text-pink-500 group-data-[theme-color=blue]:hover:text-blue-500 uppercase group-data-[mode=dark]:text-gray-50"
                                        href="manage-jobs.php">Manage Jobs</a>
                                
                            <li class="relative  lg:mt-0">
                                <a class="block w-full px-4 py-2 text-13 font-medium text-gray-700 duration-300 bg-transparent dropdown-item whitespace-nowrap hover:translate-x-1.5 group-data-[theme-color=violet]:hover:text-violet-500 group-data-[theme-color=sky]:hover:text-sky-500 group-data-[theme-color=red]:hover:text-red-500 group-data-[theme-color=green]:hover:text-green-500 group-data-[theme-color=pink]:hover:text-pink-500 group-data-[theme-color=blue]:hover:text-blue-500 uppercase group-data-[mode=dark]:text-gray-50"
                                        href="registration.php">REGISTRATION</a>

                                
                            </li>
                           
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
