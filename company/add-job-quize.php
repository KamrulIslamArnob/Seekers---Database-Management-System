
<!DOCTYPE html>
<html lang="en" dir="ltr" data-mode="light" class="scroll-smooths group" data-theme-color="violet">

<head>
    <meta charset="utf-8" />
    <title>Add Quize | Jobcy - Admin & Dashboard Template</title>
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
                                <h3 class="mb-4 text-[26px]">Add Quize </h3>
                                <div class="page-next">
                                    <nav class="inline-block" aria-label="breadcrumb text-center">
                                        <ol class="flex flex-wrap justify-center text-sm font-medium uppercase">
                                            <li><a href="index.html">Home</a></li>
                                            <li><i class="bx bxs-chevron-right align-middle px-2.5"></i><a
                                                    href="javascript:void(0)">Profile</a></li>
                                            <li class="active" aria-current="page"><i
                                                    class="bx bxs-chevron-right align-middle px-2.5"></i>Add Quize 
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
       <form action="process_job_post.php" method="post">

   <?php for ($i = 1; $i <= 2; $i++) : ?>
    <div class="mb-3">
        <label for="question<?= $i ?>">Question <?= $i ?>:</label>
        <textarea class="form-control" id="question<?= $i ?>" name="question<?= $i ?>"<?= ($i <= 5) ? ' required' : '' ?>></textarea>
    </div>

    <div class="mb-3">
        <label for="option1<?= $i ?>">Option 1:</label>
        <input type="text" class="form-control" id="option1<?= $i ?>" name="option1<?= $i ?>" required>
    </div>

    <div class="mb-3">
        <label for="option2<?= $i ?>">Option 2:</label>
        <input type="text" class="form-control" id="option2<?= $i ?>" name="option2<?= $i ?>" required>
    </div>

    <div class="mb-3">
        <label for="option3<?= $i ?>">Option 3:</label>
        <input type="text" class="form-control" id="option3<?= $i ?>" name="option3<?= $i ?>" required>
    </div>

    <div class="mb-3">
        <label for="option4<?= $i ?>">Option 4:</label>
        <input type="text" class="form-control" id="option4<?= $i ?>" name="option4<?= $i ?>" required>
    </div>

    <div class="mb-3">
        <label for="correctOption<?= $i ?>">Correct Option:</label>
        <input type="text" class="form-control" id="correctOption<?= $i ?>" name="correctOption<?= $i ?>" required>
    </div>
<?php endfor; ?>


    <button type="submit" class="btn btn-primary text-dark">Post Job</button>
</form>



            </section>
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