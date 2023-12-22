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

    <?php
    include_once 'JobManager.php';
    $jobManager = new JobManager();
    $jobId = $_GET['job_id']; 

    $jobData = $jobManager->getJobById($jobId);
?>


    <div class="main-content">
        <div class="page-content">

            <section
                class="pt-28 lg:pt-44 pb-28 group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500 dark:bg-neutral-900 bg-[url('../images/home/page-title.png')] bg-center bg-cover relative">
                <div class="container mx-auto">
                    <div class="grid">
                        <div class="col-span-12">
                            <div class="text-center text-white">
                                <h3 class="mb-4 text-[26px]">Edit Jobs</h3>
                                <div class="page-next">
                                    <nav class="inline-block" aria-label="breadcrumb text-center">
                                        <ol class="flex flex-wrap justify-center text-sm font-medium uppercase">
                                            <li><a href="index.html">Home</a></li>
                                    
                                            <li class="active" aria-current="page"><i
                                                    class="bx bxs-chevron-right align-middle px-2.5"></i>Edit Jobs
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
 <form action="process_job_edit.php" method="post">
       <input type="hidden" name="job_id" value="<?php echo $jobId; ?>">
    <div class="mb-3">
        <label for="jobTitle" class="form-label">Job Title:</label>
        <input type="text" class="form-control" id="jobTitle" value="<?php echo $jobData['jobTitle']; ?>" name="jobTitle" required>
    </div>

    <div class="mb-3">
        <label for="vacancy" class="form-label">Amount of Vacancy:</label>
        <input type="number" value="<?php echo $jobData['vacancy']; ?>" class="form-control" id="vacancy" name="vacancy" required>
    </div>

    <div class="mb-3">
        <label for="experience" class="form-label">Experience Needed:</label>
        <input type="text" value="<?php echo $jobData['experience']; ?>" class="form-control" id="experience" name="experience" required>
    </div>

    <div class="mb-3">
        <label for="employeeType" class="form-label">Employee Type:</label>
        <input type="text" value="<?php echo $jobData['employeeType']; ?>" class="form-control" id="employeeType" name="employeeType" required>
    </div>

    <div class="mb-3">
        <label for="position" class="form-label">Position:</label>
        <input type="text" value="<?php echo $jobData['position']; ?>" class="form-control" id="position" name="position" required>
    </div>

    <div class="mb-3">
        <label for="offerSalary" class="form-label">Offer Salary:</label>
        <input type="text" value="<?php echo $jobData['offerSalary']; ?>" class="form-control" id="offerSalary" name="offerSalary" required>
    </div>

    <div class="mb-3">
        <label for="jobDescription" class="form-label">Job Description:</label>
        <textarea class="form-control" id="jobDescription" name="jobDescription" required><?php echo $jobData['jobDescription']; ?></textarea>
    </div>

    <div class="mb-3">
        <label for="responsibilities" class="form-label">Responsibilities:</label>
        <textarea class="form-control" id="responsibilities" name="responsibilities" required><?php echo $jobData['responsibilities']; ?></textarea>
    </div>

    <div class="mb-3">
        <label for="qualification" class="form-label">Qualification:</label>
        <textarea class="form-control" id="qualification" name="qualification" required><?php echo $jobData['qualification']; ?></textarea>
    </div>

    <div class="mb-3">
        <label for="skillExperience" class="form-label">Skill & Experience:</label>
        <textarea class="form-control" id="skillExperience" name="skillExperience" required><?php echo $jobData['skillExperience']; ?></textarea>
    </div>

    <div class="mb-3">
        <label for="keywords" class="form-label">Keywords:</label>
        <input type="text" value="<?php echo $jobData['keywords']; ?>" class="form-control" id="keywords" name="keywords" required>
    </div>

    <div class="mb-3">
        <label for="location" class="form-label">Location:</label>
        <input type="text" value="<?php echo $jobData['location']; ?>" class="form-control" id="location" name="location" required>
    </div>

    <div class="mb-3">
        <label for="industry" class="form-label">Industry (Govt/Private):</label>
        <select class="form-select" id="industry" name="industry" required>
            <option value="govt" <?php echo ($jobData['industry'] === 'govt') ? 'selected' : ''; ?>>Government</option>
            <option value="private" <?php echo ($jobData['industry'] === 'private') ? 'selected' : ''; ?>>Private</option>
        </select>
    </div>



    <button type="submit" class="btn btn-primary text-dark">Edit Job</button>
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