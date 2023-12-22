
<?php

    session_start();
   include "check-role.php";

?>

<!DOCTYPE html>
<html lang="en" dir="ltr" data-mode="light" class="scroll-smooths group" data-theme-color="violet">

<head>
    <meta charset="utf-8" />
    <title>index-1 | Jobcy - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta content="Tailwind Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="Themesbrand" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico" />



    <link rel="stylesheet" href="../assets/css/icons.css" />
    <link rel="stylesheet" href="../assets/css/tailwind.css" />




</head>

<body class="bg-white dark:bg-neutral-800">

    <div class="preloader">
        <div class="loading">
            <img src="../assets/images/loader.gif" width="80" alt="">
        </div>
        
    <div class="main-content">
        <div class="page-content">

            <section
                class="flex items-center justify-center min-h-screen py-10 group-data-[theme-color=violet]:bg-violet-500/10 group-data-[theme-color=sky]:bg-sky-500/10 group-data-[theme-color=red]:bg-red-500/10 group-data-[theme-color=green]:bg-green-500/10 group-data-[theme-color=pink]:bg-pink-500/10 group-data-[theme-color=blue]:bg-blue-500/10 dark:bg-neutral-700">
                <div class="container mx-auto">
                    <div class="grid grid-cols-12">
                        <div class="col-span-12 lg:col-span-10 lg:col-start-2">
                            <div class="flex flex-col bg-white rounded-lg dark:bg-neutral-800">
                                <div class="grid flex-col grid-cols-12 ">
                                    <div class="col-span-12 lg:col-span-6 ltr:rounded-l-lg rtl:rounded-r-lg">
                                        <div class="p-10">
                                            <a href="index.html">
                                                <img src="../assets/images/logo-light.png" alt=""
                                                    class="hidden mx-auto dark:block">
                                                <img src="../assets/images/logo-dark.png" alt=""
                                                    class="block mx-auto dark:hidden">
                                            </a>
                                            <div class="mt-5">
                                                <img src="../assets/images/auth/sign-in.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="col-span-12 rounded-b-md lg:col-span-6 group-data-[theme-color=violet]:bg-violet-700 group-data-[theme-color=sky]:bg-sky-700 group-data-[theme-color=red]:bg-red-700 group-data-[theme-color=green]:bg-green-700 group-data-[theme-color=pink]:bg-pink-700 group-data-[theme-color=blue]:bg-blue-700 lg:rounded-b-none lg:ltr:rounded-r-lg rtl:rounded-l-lg">
                                        <div class="flex flex-col justify-center h-full p-12">
                                            <div class="text-center">
                                                <h5 class="text-[18.5px] text-white">Welcome Back !</h5>
                                                <p class="mt-3 text-white/80">Sign in to continue to Jobcy.</p>
                                            </div>



                                            <form action="login.php" method="post" class="mt-8">
                                                <div class="mb-5">
                                                    <label for="usernameInput" class="text-white">Username</label>
                                                    <input type="text" name="username"
                                                        class="w-full mt-1 group-data-[theme-color=violet]:bg-violet-400/40 group-data-[theme-color=sky]:bg-sky-400/40 group-data-[theme-color=red]:bg-red-400/40 group-data-[theme-color=green]:bg-green-400/40 group-data-[theme-color=pink]:bg-pink-400/40 group-data-[theme-color=blue]:bg-blue-400/40 py-2.5 rounded border-transparent placeholder:text-sm placeholder:text-gray-50 text-white"
                                                        required="" id="usernameInput"
                                                        placeholder="Enter your username">
                                                </div>

                                                <div class="mb-5">
                                                    <label for="passwordInput" class="text-white">Password</label>
                                                    <input type="password" name="userpassword"
                                                        class="w-full mt-1 group-data-[theme-color=violet]:bg-violet-400/40 group-data-[theme-color=sky]:bg-sky-400/40 group-data-[theme-color=red]:bg-red-400/40 group-data-[theme-color=green]:bg-green-400/40 group-data-[theme-color=pink]:bg-pink-400/40 group-data-[theme-color=blue]:bg-blue-400/40 py-2.5 rounded border-transparent placeholder:text-sm placeholder:text-gray-50 text-white"
                                                        id="passwordInput" placeholder="Enter your password">
                                                </div>

                                                <div><input
                                                        class="align-middle border-transparent rounded focus:ring-0 focus:ring-offset-0 group-data-[theme-color=violet]:checked:bg-violet-500 group-data-[theme-color=sky]:checked:bg-sky-500 group-data-[theme-color=red]:checked:bg-red-500 group-data-[theme-color=green]:checked:bg-green-500 group-data-[theme-color=pink]:checked:bg-pink-500 group-data-[theme-color=blue]:checked:bg-blue-500"
                                                        type="checkbox" id="flexCheckDefault">
                                                    <a href="reset-password.html"
                                                        class="text-white ltr:float-right rtl:float-left">Forgot
                                                        Password?</a>
                                                    <label class="text-white align-middle"
                                                        for="flexCheckDefault">Remember me</label>
                                                </div>

                                                <div class="my-8 text-center">
                                                    <button type="submit" value="submit" name="login"
                                                        class="btn w-full bg-white text-gray-900 font-medium border-transparent hover:-translate-y-1.5 duration-500 ease">Sign
                                                        In
                                                    </button>
                                                </div>
                                            </form>
                                            <div class="text-center">
                                                <p class="text-white">Didn't have any account ? <a href="sign-up.php"
                                                        class="text-white underline fw-medium"> Sign Up </a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>


    <script src="https://unicons.iconscout.com/release/v4.0.0/script/monochrome/bundle.js"></script>
    <script src="../assets/libs/@popperjs/core/umd/popper.min.js"></script>
    <script src="../assets/libs/simplebar/simplebar.min.js"></script>


    <script src="../assets/js/pages/switcher.js"></script>

    <script src="../assets/js/app.js"></script>

</body>

</html>