<?php
//require_once($_SERVER['DOCUMENT_ROOT'] . '/Seekers---job-portal-using-php-tailwind-mysql/admin/JobManager.php');
require_once 'JobManager.php';

//$jobManager = new JobManager();
//$jobCategories = $jobManager->getAllJobCategories();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr" data-mode="light" class="scroll-smooths group" data-theme-color="violet">

<head>
    <meta charset="utf-8" />
    <title>Create Job | Jobcy - Company & Dashboard Template</title>
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
                                <h3 class="mb-4 text-[26px]">Create Jobs</h3>
                                <div class="page-next">
                                    <nav class="inline-block" aria-label="breadcrumb text-center">
                                        <ol class="flex flex-wrap justify-center text-sm font-medium uppercase">
                                            <li><a href="index.html">Home</a></li>
                                    
                                            <li class="active" aria-current="page"><i
                                                    class="bx bxs-chevron-right align-middle px-2.5"></i>Create Jobs
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
                     <div class="container mt-5">
        <form action="process_initial_job_form.php" method="post">

            <div class="mb-3">
                <label for="jobTitle" class="form-label">Job Title:</label>
                <input type="text" class="form-control" id="jobTitle" value="Software Developer" name="jobTitle" required>
            </div>
            
              <div class="mb-3">
                <label for="jobCategory">Job Category:</label>
                <select class="form-select" id="jobCategory" name="jobCategory" required>
                <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                    
                </select>
            </div>

            <div class="mb-3">
                <label for="vacancy" class="form-label">Amount of Vacancy:</label>
                <input type="number" value="5"  class="form-control" id="vacancy" name="vacancy" required>
            </div>

            <div class="mb-3">
                <label for="experience" class="form-label">Experience Needed:</label>
                <input type="text" value="5 years+" class="form-control" id="experience" name="experience" required>
            </div>

            <div class="mb-3">
                <label for="employeeType" class="form-label">Employee Type:</label>
                <input type="text" value="Full Time" class="form-control" id="employeeType" name="employeeType" required>
            </div>

            <div class="mb-3">
                <label for="position" class="form-label">Position:</label>
                <input type="text" value="Software Developer" class="form-control" id="position" name="position" required>
            </div>

            <div class="mb-3">
                <label for="offerSalary" class="form-label">Offer Salary:</label>
                <input type="text" value="50000 BDT" class="form-control" id="offerSalary" name="offerSalary" required>
            </div>

            <div class="mb-3">
                <label for="jobDescription" class="form-label">Job Description:</label>
                <textarea class="form-control" value="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." id="jobDescription" name="jobDescription" required></textarea>
            </div>

            <div class="mb-3">
                <label for="responsibilities" class="form-label">Responsibilities:</label>
                <textarea class="form-control" id="responsibilities" name="responsibilities" required>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</textarea>
            </div>

            <div class="mb-3">
                <label for="qualification" class="form-label">Qualification:</label>
                <textarea class="form-control" id="qualification" name="qualification" required>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</textarea>
            </div>

            <div class="mb-3">
                <label for="skillExperience" class="form-label">Skill & Experience:</label>
                <textarea class="form-control" id="skillExperience" name="skillExperience" required>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</textarea>
            </div>

            <div class="mb-3">
                <label for="keywords" class="form-label">Keywords:</label>
                <input type="text" value="IT" class="form-control" id="keywords" name="keywords" required>
            </div>

            <div class="mb-3">
                <label for="location" class="form-label">Location:</label>
                <input type="text" value="Dhaka,Bangladesh" class="form-control" id="location" name="location" required>
            </div>

            <div class="mb-3">
                <label for="industry" class="form-label">Industry (Govt/Private):</label>
                <select class="form-select" id="industry" name="industry" required>
                    <option selected value="govt">Government</option>
                    <option value="private">Private</option>
                </select>
            </div>

         

            <button type="submit" class="btn btn-primary text-dark">Submit</button>
        </form>
    </div>

                </div>
            </section>
            <!-- End grid -->

        </div>
    </div>


  <?php
        include('../user/footer.php');
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