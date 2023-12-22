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


    <style>
        .text-role {
            color: white;
            margin-left: 1rem;
        }


    </style>

</head>

<body class="bg-white dark:bg-neutral-800">


   
<div class="main-content">
        <div class="page-content">

            <section
                class="flex items-center justify-center min-h-screen py-10 group-data-[theme-color=violet]:bg-violet-500/10 group-data-[theme-color=sky]:bg-sky-500/10 group-data-[theme-color=red]:bg-red-500/10 group-data-[theme-color=green]:bg-green-500/10 group-data-[theme-color=pink]:bg-pink-500/10 group-data-[theme-color=blue]:bg-blue-500/10 dark:bg-neutral-700">
                <div class="container mx-auto">
                    <div class="grid grid-cols-12">
                        <div class="col-span-12 lg:col-span-10 lg:col-start-2">
                            <div class="flex flex-col bg-white rounded-lg dark:bg-neutral-800">
                                <div class="grid flex-col grid-cols-12">
                                    <div class="col-span-6 ltr:rounded-l-lg rtl:rounded-r-lg">
                                        <div class="p-10">
                                            <a href="index.html">
                                                <img src="../assets/images/logo-light.png" alt=""
                                                    class="hidden mx-auto dark:block">
                                                <img src="../assets/images/logo-dark.png" alt=""
                                                    class="block mx-auto dark:hidden">
                                            </a>
                                            <div class="mt-5">
                                                <img src="../assets/images/auth/sign-up.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="col-span-12 rounded-b-md lg:col-span-6 group-data-[theme-color=violet]:bg-violet-700 group-data-[theme-color=sky]:bg-sky-700 group-data-[theme-color=red]:bg-red-700 group-data-[theme-color=green]:bg-green-700 group-data-[theme-color=pink]:bg-pink-700 group-data-[theme-color=blue]:bg-blue-700 lg:rounded-b-none lg:ltr:rounded-r-lg rtl:rounded-l-lg">
                                        <div class="flex flex-col justify-center h-full p-12">
                                            <div class="text-center">
                                                <h5 class="text-[18.5px] text-white">Let's Get Started</h5>
                                                <p class="mt-3 text-gray-50">Sign Up and get access to all the features
                                                    of Jobcy</p>
                                            </div>
                                            <!-- Using php for register  -->

                                            <form action="register.php" method="post" class="mt-8">
                                                <div class="mb-5">
                                                    <label for="usernameInput" class="text-white">Username</label>
                                                    <input type="text" name="username"
                                                        class="w-full mt-1 group-data-[theme-color=violet]:bg-violet-400/40 group-data-[theme-color=sky]:bg-sky-400/40 group-data-[theme-color=red]:bg-red-400/40 group-data-[theme-color=green]:bg-green-400/40 group-data-[theme-color=pink]:bg-pink-400/40 group-data-[theme-color=blue]:bg-blue-400/40 py-2.5 rounded border-transparent placeholder:text-sm placeholder:text-gray-50 text-white"
                                                        required="" id="usernameInput"
                                                        placeholder="Enter your username">
                                                </div>
                                                <div class="mb-5">
                                                    <label for="passwordInput" class="text-white">Email</label>
                                                    <input type="email" name="useremail"
                                                        class="w-full mt-1 group-data-[theme-color=violet]:bg-violet-400/40 group-data-[theme-color=sky]:bg-sky-400/40 group-data-[theme-color=red]:bg-red-400/40 group-data-[theme-color=green]:bg-green-400/40 group-data-[theme-color=pink]:bg-pink-400/40 group-data-[theme-color=blue]:bg-blue-400/40 py-2.5 rounded border-transparent placeholder:text-sm placeholder:text-gray-50 text-white"
                                                        required="" id="emailInput" placeholder="Enter your email">
                                                </div>
                                                <div class="mb-5">
                                                    <label for="emailInput" class="text-white">Password</label>
                                                    <input type="password" name="userpassword"
                                                        class="w-full mt-1 group-data-[theme-color=violet]:bg-violet-400/40 group-data-[theme-color=sky]:bg-sky-400/40 group-data-[theme-color=red]:bg-red-400/40 group-data-[theme-color=green]:bg-green-400/40 group-data-[theme-color=pink]:bg-pink-400/40 group-data-[theme-color=blue]:bg-blue-400/40 py-2.5 rounded border-transparent placeholder:text-sm placeholder:text-gray-50 text-white"
                                                        id="passwordInput" placeholder="Enter your password">
                                                </div>
                                                 <div class="mb-5">
                                                    <label for="rolename" class="text-white mr-5">Choose your
                                                        role:</label>
                                                    <input type="radio" name="role" value="User"
                                                        class="mt-1 group-data-[theme-color=violet]:bg-violet-400/40 group-data-[theme-color=sky]:bg-sky-400/40 group-data-[theme-color=red]:bg-red-400/40 group-data-[theme-color=green]:bg-green-400/40 group-data-[theme-color=pink]:bg-pink-400/40 group-data-[theme-color=blue]:bg-blue-400/40 py-2.5 rounded border-transparent placeholder:text-sm placeholder:text-gray-50 text-white"
                                                        id="" placeholder=""><span class="text-role">Job Seeker</span>
                                                    <input type="radio" name="role" value="Company"
                                                        class="mt-1 group-data-[theme-color=violet]:bg-violet-400/40 group-data-[theme-color=sky]:bg-sky-400/40 group-data-[theme-color=red]:bg-red-400/40 group-data-[theme-color=green]:bg-green-400/40 group-data-[theme-color=pink]:bg-pink-400/40 group-data-[theme-color=blue]:bg-blue-400/40 py-2.5 rounded border-transparent placeholder:text-sm placeholder:text-gray-50 text-white"
                                                        id="" placeholder=""><span class="text-role">Company</span>
                                                </div> 
                                             <div class="mb-5"> 


                                                <div class="mb-4">
                                                    <div><input
                                                            class="align-middle border-transparent rounded focus:ring-0 focus:ring-offset-0 group-data-[theme-color=violet]:checked:bg-violet-500 group-data-[theme-color=sky]:checked:bg-sky-500 group-data-[theme-color=red]:checked:bg-red-500 group-data-[theme-color=green]:checked:bg-green-500 group-data-[theme-color=pink]:checked:bg-pink-500 group-data-[theme-color=blue]:checked:bg-blue-500"
                                                            type="checkbox" id="flexCheckDefault">
                                                        <label class="text-white align-middle" for="flexCheckDefault">I
                                                            agree to the <a href="javascript:void(0)"
                                                                class="pb-1 text-white underline align-middle">Terms and
                                                                conditions</a></label>
                                                    </div>
                                                </div>

                                                <div class="my-5 text-center">
                                                    <button type="submit" value="register" name="submit"
                                                        class="btn w-full bg-white text-gray-900 font-medium border-transparent hover:-translate-y-1.5 duration-500 ease">Sign
                                                        Up
                                                    </button>
                                                </div>
                                            </form>
                                            <div class="text-center">
                                                <p class="text-white">Already a member ? <a href="sign-in.php"
                                                        class="text-white underline fw-medium"> Sign In </a></p>
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