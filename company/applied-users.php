<!DOCTYPE html>
<html lang="en" dir="ltr" data-mode="light" class="scroll-smooths group" data-theme-color="violet">

<head>
    <meta charset="utf-8" />
    <title>Applied Users</title>
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


    if (!isset($_SESSION['username'])) {
        header("Location:http://localhost/Seekers---job-portal-using-php-tailwind-mysql/index.php");

    } else if ($_SESSION['role'] == 'admin') {
        header("Location:http://localhost/Seekers---job-portal-using-php-tailwind-mysql/admin/dashboard-admin.php");
    }


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
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-y-5">
                        <?php
                        //require_once($_SERVER['DOCUMENT_ROOT'] . '/Seekers---job-portal-using-php-tailwind-mysql/database/crud/DBConnection.php');
                       // require_once($_SERVER['DOCUMENT_ROOT'] . '/Seekers---job-portal-using-php-tailwind-mysql/company/JobManager.php');

                        require_once '../database/crud/DBConnection.php';
                        require_once 'JobManager.php';

                        $currentUserId = $_SESSION['user_id'];
                        $companyId = $currentUserId;

                        $jobManager = new JobManager();
                        $appliedUsers = $jobManager->getAppliedUsers($companyId);

                        if ($appliedUsers) {
                            foreach ($appliedUsers as $appliedUser) {
                                echo '<div class="mt-10">';
                                echo '<p><b>Job Title : </b>' . $appliedUser['job_title'] . '</p>';
                                echo '<div class="border rounded-md border-gray-100/50 dark:border-neutral-600 p-5 relative">';
                                echo '<div class="flex mb-4">';
                                echo '<div class="relative shrink-0">';
                                echo '<img src="../assets/images/user/img-01.jpg" alt="" class="w-16 h-16 rounded">';
                                echo '</div>';
                                echo '<div class="ltr:ml-3 rtl:mr-3">';
                                echo '<a href="candidate-details.html">';
                                echo '<h5 class="mb-2 text-17 dark:text-white">' . $appliedUser['user_details']['name'] . '</h5>';
                                echo '</a>';
                                echo '</div>';
                                echo '</div>';
                                echo '<ul class="flex items-center justify-between"></ul>';
                                echo '<div class="mt-4">';
                                echo '<p>Score: ' . $appliedUser['score'] . '</p>';
                                echo '</div>';
                                echo '<div class="mt-6">';
                                echo '<td>';
                                echo '<button class="w-full text-white border-transparent btn group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500 hover:-translate-y-2"  onclick="downloadCV(' . $appliedUser['user_id'] . ')">Download CV</button>';
                                echo '</td>';


                            

                                echo '<a href="#" class="w-full text-white border-transparent btn group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500 hover:-translate-y-2" ';
                                echo 'data-user-id="' . $appliedUser['user_id'] . '" ';
                                echo 'data-application-id="' . $appliedUser['applicant_id'] . '" ';
                                echo 'data-job-id="' . $appliedUser['job_id'] . '" ';
                                echo 'onclick="hireNowHandler(this)"><i class="mdi mdi-account-check"></i> Hire Now</a>';
                            
                                echo '<a href="#" class="w-full text-white border-transparent btn group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500 hover:-translate-y-2" ';
                                echo 'data-user-id="' . $appliedUser['user_id'] . '" ';
                                echo 'data-application-id="' . $appliedUser['applicant_id'] . '" ';
                                echo 'data-job-id="' . $appliedUser['job_id'] . '" ';
                                echo 'onclick="rejectNowHandler(this)">Reject</a>';


                                echo '<a href="../user/portfolio/index.php?$userId=' . $appliedUser['user_id'] . '" class="w-full mt-2 border-transparent btn group-data-[theme-color=violet]:bg-violet-500/20 group-data-[theme-color=sky]:bg-sky-500/20 group-data-[theme-color=red]:bg-red-500/20 group-data-[theme-color=green]:bg-green-500/20 group-data-[theme-color=pink]:bg-pink-500/20 group-data-[theme-color=blue]:bg-blue-500/20 group-data-[theme-color=violet]:text-violet-500 group-data-[theme-color=sky]:text-sky-500 group-data-[theme-color=red]:text-red-500 group-data-[theme-color=green]:text-green-500 group-data-[theme-color=pink]:text-pink-500 group-data-[theme-color=blue]:text-blue-500 hover:-translate-y-1 group-data-[theme-color=violet]:hover:bg-violet-500 group-data-[theme-color=violet]:hover:text-white group-data-[theme-color=sky]:hover:bg-sky-500 group-data-[theme-color=sky]:hover:text-white group-data-[theme-color=red]:hover:bg-red-500 group-data-[theme-color=red]:hover:text-white group-data-[theme-color=green]:hover:bg-green-500 group-data-[theme-color=green]:hover:text-white group-data-[theme-color=pink]:hover:bg-pink-500 group-data-[theme-color=pink]:hover:text-white group-data-[theme-color=blue]:hover:bg-blue-500 group-data-[theme-color=blue]:hover:text-white hover:ring group-data-[theme-color=violet]:hover:ring-violet-500/20 group-data-[theme-color=sky]:hover:ring-sky-500/20 group-data-[theme-color=red]:hover:ring-red-500/20 group-data-[theme-color=green]:hover:ring-green-500/20 group-data-[theme-color=pink]:hover:ring-pink-500/20 group-data-[theme-color=blue]:hover:ring-blue-500/20"><i class="mdi mdi-eye"></i> View Profile</a>';

                                echo '</div>';
                                echo '<div class="absolute px-2 text-white bg-violet-500 top-2 ltr:right-0 rtl:left-0">';
                                echo '<span class="relative text-xs font-medium uppercase">Applicant</span>';
                                echo '<div class="after:contant[] ltr:after:border-r-[11px] rtl:after:border-l-[11px] after:absolute after:border-b-[12px] ltr:after:-left-[11px] rtl:after:-right-[11.5px] after:top-0 after:border-t-[11.5px] after:border-t-transparent after:border-violet-500 after:border-b-transparent"></div>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                            }
                        } else {
                            echo 'No applied users found.';
                        }
                        ?>
                    </div>
                </div>
            </section>
            <!-- End grid -->





        </div>
    </div>


    <?php
    include('../user/footer.php');
    ?>
    <script>
        function downloadCV(userId) {
            // Redirect to the download_cv.php script with the user ID
            window.location.href = 'download_cv.php?user_id=' + userId;
        }
    </script>

    <!-- <script>
        document.getElementById('hireNowLink').addEventListener('click', function (e) {
            e.preventDefault();

            // Make an AJAX request to send-hire-email.php
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'send-hire-mail.php', true);

            xhr.onload = function () {
                if (xhr.status == 200) {
                    console.log(xhr.responseText);
                } else {
                    console.error('Error sending email');
                }
            };

            xhr.send();
        });
    </script> -->

    <script>
function hireNowHandler(button) {
    var userID = button.getAttribute('data-user-id');
    var applicationID = button.getAttribute('data-application-id');
    var jobID = button.getAttribute('data-job-id');

    // Make an AJAX request to hire-action.php with parameters in the URL
    fetch('hire-action.php?user_id=' + userID + '&application_id=' + applicationID + '&job_id=' + jobID)
        .then(response => response.text())
        .then(data => {
            console.log(data); // Output the response for debugging
            // You can add logic here to show a success message to the user if needed
        })
        .catch(error => {
            console.error('Error hiring', error);
            // Handle error scenario if needed
        });
}

function rejectNowHandler(button) {
    var userID = button.getAttribute('data-user-id');
    var applicationID = button.getAttribute('data-application-id');
    var jobID = button.getAttribute('data-job-id');

    // Make an AJAX request to reject-action.php with parameters in the URL
    fetch('reject-action.php?user_id=' + userID + '&application_id=' + applicationID + '&job_id=' + jobID)
        .then(response => response.text())
        .then(data => {
            console.log(data); // Output the response for debugging
            // You can add logic here to show a success message to the user if needed
        })
        .catch(error => {
            console.error('Error rejecting', error);
            // Handle error scenario if needed
        });
}
</script>




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