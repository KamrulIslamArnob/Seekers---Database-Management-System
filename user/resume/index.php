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
$userData = $userCRUD-> getAllResumeshow($userId);
//print_r($userData);


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> CV Builder Tool </title>
  <style>
    a{
      color:black;
    }
  </style>
  <!-- App favicon -->
  <link rel="shortcut icon" href="../../assets/images/favicon.ico" />

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../../assets/libs/choices.js/public/assets/styles/choices.min.css">
  <link rel="stylesheet" href="../../assets/css/icons.css" />
  <link rel="stylesheet" href="../../assets/css/tailwind.css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/datetime/1.5.1/css/dataTables.dateTime.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/searchbuilder/1.6.0/css/searchBuilder.bootstrap4.min.css" rel="stylesheet">

  <!-- jQuery and Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

  <!-- DataTables JS -->
  <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/datetime/1.5.1/js/dataTables.dateTime.min.js"></script>
  <script src="https://cdn.datatables.net/searchbuilder/1.6.0/js/dataTables.searchBuilder.min.js"></script>
  <script src="https://cdn.datatables.net/searchbuilder/1.6.0/js/searchBuilder.bootstrap4.min.js"></script>
  <style>
    a {
      text-decoration: none !important;
    }
  </style>
</head>

<body class="bg-white dark:bg-neutral-800">

  <div class=" hidden px-5 mx-auto border-gray-200 container-fluid lg:px-24 bg-gray-50 md:block dark:bg-neutral-600">
    <div class=" grid items-center grid-cols-12">
      <div class="col-span-7">
        <ul class="flex items-center py-3">
          <li class="ltr:mr-4 rtl:ml-4">
            <p class="mb-0 text-gray-800 text-13 dark:text-gray-50">
              <?php echo (date("Y-m-d", time())); ?> <i class="mdi mdi-map-marker"></i><a href="javascript:void(0)"
                class="font-medium">New Caledonia</a>
            </p>
          </li>
          <li>
            <ul class="flex flex-wrap gap-4 text-gray-800 ">
              <li
                class="transition-all duration-200 ease-in hover:text-green-500 dark:text-gray-50 dark:hover:text-green-500">
                <a href="javascript:void(0)" class="social-link"><i class="uil uil-whatsapp"></i></a></li>
              <li
                class="transition-all duration-200 ease-in hover:text-green-500 dark:text-gray-50 dark:hover:text-green-500">
                <a href="javascript:void(0)" class="social-link"><i class="uil uil-facebook-messenger-alt"></i></a></li>
              <li
                class="transition-all duration-200 ease-in hover:text-green-500 dark:text-gray-50 dark:hover:text-green-500">
                <a href="javascript:void(0)" class="social-link"><i class="uil uil-instagram"></i></a></li>
              <li
                class="transition-all duration-200 ease-in hover:text-green-500 dark:text-gray-50 dark:hover:text-green-500">
                <a href="javascript:void(0)" class="social-link"><i class="uil uil-envelope"></i></a></li>
              <li
                class="transition-all duration-200 ease-in hover:text-green-500 dark:text-gray-50 dark:hover:text-green-500">
                <a href="javascript:void(0)" class="social-link"><i class="uil uil-twitter-alt"></i></a></li>
            </ul>
          </li>
        </ul>
      </div>
      <div class="col-span-5 ltr:ml-auto rtl:mr-auto">
        <ul class="flex items-center gap-4">

          <li>
            <div class="relative hidden dropdown language sm:block">

              <div
                class="absolute top-auto z-50 hidden w-40 list-none bg-white rounded shadow dropdown-menu -left-20 dark:bg-neutral-700"
                id="navNotifications">
                <ul class="border border-gray-50 dark:border-gray-700" aria-labelledby="navNotifications">
                  <li>
                    <a href="#"
                      class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50/50 dark:text-gray-200 dark:hover:bg-neutral-600/50 dark:hover:text-white"><img
                        src="../assets/images/flags/us.jpg" alt="user-image" class="inline-block h-3 mr-1"> <span
                        class="align-middle">English</span></a>
                  </li>
                  <li>
                    <a href="#"
                      class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50/50 dark:text-gray-200 dark:hover:bg-neutral-600/50 dark:hover:text-white"><img
                        src="../assets/images/flags/spain.jpg" alt="user-image" class="inline-block h-3 mr-1"> <span
                        class="align-middle">Spanish</span></a>
                  </li>
                  <li>
                    <a href="#"
                      class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50/50 dark:text-gray-200 dark:hover:bg-neutral-600/50 dark:hover:text-white"><img
                        src="../assets/images/flags/germany.jpg" alt="user-image" class="inline-block h-3 mr-1"> <span
                        class="align-middle">German</span></a>
                  </li>
                  <li>
                    <a href="#"
                      class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50/50 dark:text-gray-200 dark:hover:bg-neutral-600/50 dark:hover:text-white"><img
                        src="../assets/images/flags/italy.jpg" alt="user-image" class="inline-block h-3 mr-1"> <span
                        class="align-middle">Italian</span></a>
                  </li>
                </ul>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="mx-auto  container-fluid shadow-md">
    <div class="flex flex-wrap items-center justify-around mx-auto">

      <a href="../dashboard-user.php" class="flex items-center">
        <img src="../../assets/images/logo-dark.png" alt="" class="logo-dark h-[22px] block dark:hidden">
        <img src="../../assets/images/logo-light.png" alt="" class="logo-dark h-[22px] hidden dark:block">
      </a>


      <div>
      <ul class="flex items-center mb-10 font-medium lg:mt-0 lg:mb-0 lg:items-center lg:flex-row" id="navigation-menu">
    <li class="relative">
        <div class="dropdown">
            <button class="btn text-gray-800 lg:px-4 dropdown-toggle dark:text-gray-50 lg:h-[70px]" id="jobsDropdown"
                data-bs-toggle="dropdown">
                Jobs
            </button>
            <ul class="dropdown-menu" aria-labelledby="jobsDropdown">
                <!-- Dropdown content for "Jobs" -->
                <li><a class="dropdown-item" href="../manage-and-apply.php">MANAGE & APPLY</a></li>
                <li><a class="dropdown-item" href="../bookmark-jobs.php">BOOKMARK JOBS</a></li>
                <li><a class="dropdown-item" href="../search.php">SEARCH</a></li>
            </ul>
        </div>
    </li>
    <li class="relative">
        <div class="dropdown">
            <button class="btn text-gray-800 lg:px-4 dropdown-toggle dark:text-gray-50 lg:h-[70px]" id="aboutDropdown"
                data-bs-toggle="dropdown">
                <a href="#">About Us</a>
            </button>
            
        </div>
    </li>
    <li class="relative">
        <div class="dropdown">
            <button class="btn text-gray-800 lg:px-4 dropdown-toggle dark:text-gray-50 lg:h-[70px]" id="homeDropdown"
                data-bs-toggle="dropdown">
                Resume & Portfolio
            </button>
            <ul class="dropdown-menu" aria-labelledby="homeDropdown">
                
                <!-- Dropdown content for "Home" -->
                <li><a class="dropdown-item" href="../profile/edit-portfolio.php">EDIT PORTFOLIO</a></li>
                <li><a class="dropdown-item" href="../profile/index.php">HOME</a></li>
                <li><a class="dropdown-item" href="../profile/about.php">ABOUT</a></li>
                <li><a class="dropdown-item" href="../profile/blog.php">BLOG</a></li>
                <li><a class="dropdown-item" href="../profile/services.php">SERVICES</a></li>
                <li><a class="dropdown-item" href="../profile/portfolio.php">PROJECT</a></li>
                <li><a class="dropdown-item" href="../profile/contact.php">CONTACT</a></li>
                <li><a class="dropdown-item" href="index.php">EDIT RESUME</a></li>
            </ul>
            
        </div>
    </li>
    <li class="relative">
        <div class="dropdown">
            <button class="btn text-gray-800 lg:px-4 dropdown-toggle dark:text-gray-50 lg:h-[70px]" id="homeDropdown"
                data-bs-toggle="dropdown">
                Blogs
            </button>
            <ul class="dropdown-menu" aria-labelledby="homeDropdown">
                
                <!-- Dropdown content for "Home" -->
                <li><a class="dropdown-item" href="../blog/blogCRUD/blogs-create.php">WRITE BLOG</a></li>
                <li><a class="dropdown-item" href="../blog/blogCRUD/blogs-update.php">EDIT BLOG</a></li>
                <li><a class="dropdown-item" href="../blog/ViewAllBlogs.php">ALL BLOGS</a></li>
                <li><a class="dropdown-item" href="../blog/Blogs.php">MY BLOGS</a></li>
                
            </ul>
            
        </div>
    </li>
    <li class="relative">
        <div class="dropdown">
            <button class="btn text-gray-800 lg:px-4 dropdown-toggle dark:text-gray-50 lg:h-[70px]" id="homeDropdown"
                data-bs-toggle="dropdown">
                <a class="" href="../portfolio/contact.php"> Contact</a>
            </button>
            
            
        </div>
    </li>
    <!-- Add more dropdowns for other buttons as needed -->
</ul>

      </div>


      <div>
        <div class="relative dropdown ltr:mr-4 rtl:ml-4">
          <button type="button" class="flex items-end px-4  dropdown-toggle" id="page-header-user-dropdown"
            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <img class="w-8 h-8 rounded-full ltr:xl:mr-2 rtl:xl:ml-2" src="../../assets/images/user/img-02.jpg"
              alt="Header Avatar">
            <span class="hidden fw-medium xl:block dark:text-gray-50">
              <?php echo $_SESSION['username'] ?>
            </span>
          </button>
          <ul
            class="absolute top-auto z-50 hidden w-48 p-3 list-none bg-white border rounded shadow-lg dropdown-menu border-gray-500/20 xl:ltr:-left-3 ltr:-left-32 rtl:-right-3 dark:bg-neutral-800"
            id="profile/log" aria-labelledby="navNotifications">
            <li class="p-2 dropdown-item group/dropdown dark:text-gray-300">
              <a class="text-15 font-medium text-gray-800  group-data-[theme-color=violet]:group-hover/dropdown:text-violet-500 group-data-[theme-color=sky]:group-hover/dropdown:text-sky-500 group-data-[theme-color=red]:group-hover/dropdown:text-red-500 group-data-[theme-color=green]:group-hover/dropdown:text-green-500 group-data-[theme-color=pink]:group-hover/dropdown:text-pink-500 group-data-[theme-color=blue]:group-hover/dropdown:text-blue-500 group-hover:pl-1.5 transition-all duration-300 ease-in dark:text-gray-50"
                href="../manage-jobs.php">Manage Jobs</a>
            </li>
            <li class="p-2 dropdown-item group/dropdown dark:text-gray-300">
              <a class="text-15 font-medium text-gray-800 group-data-[theme-color=violet]:group-hover/dropdown:text-violet-500 group-data-[theme-color=sky]:group-hover/dropdown:text-sky-500 group-data-[theme-color=red]:group-hover/dropdown:text-red-500 group-data-[theme-color=green]:group-hover/dropdown:text-green-500 group-data-[theme-color=pink]:group-hover/dropdown:text-pink-500 group-data-[theme-color=blue]:group-hover/dropdown:text-blue-500 group-hover:pl-1.5 transition-all duration-300 ease-in dark:text-gray-50"
                href="../bookmark-jobs.php">Bookmarks Jobs</a>
            </li>
            <li class="p-2 dropdown-item group/dropdown dark:text-gray-300">
              <a class="text-15 font-medium text-gray-800 group-data-[theme-color=violet]:group-hover/dropdown:text-violet-500 group-data-[theme-color=sky]:group-hover/dropdown:text-sky-500 group-data-[theme-color=red]:group-hover/dropdown:text-red-500 group-data-[theme-color=green]:group-hover/dropdown:text-green-500 group-data-[theme-color=pink]:group-hover/dropdown:text-pink-500 group-data-[theme-color=blue]:group-hover/dropdown:text-blue-500 group-hover:pl-1.5 transition-all duration-300 ease-in dark:text-gray-50"
                href="../profile/profile.php">My Profile</a>
            </li>
            <li class="p-2 dropdown-item group/dropdown dark:text-gray-300">
              <a class="text-15 font-medium text-gray-800 group-data-[theme-color=violet]:group-hover/dropdown:text-violet-500 group-data-[theme-color=sky]:group-hover/dropdown:text-sky-500 group-data-[theme-color=red]:group-hover/dropdown:text-red-500 group-data-[theme-color=green]:group-hover/dropdown:text-green-500 group-data-[theme-color=pink]:group-hover/dropdown:text-pink-500 group-data-[theme-color=blue]:group-hover/dropdown:text-blue-500 group-hover:pl-1.5 transition-all duration-300 ease-in dark:text-gray-50"
                href="../../auth/sign-out.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </div>


  </div>
  </div>


  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="card rounded my-2 py-2">
          <div class="card-body">
            <h4 class="text-dark pt-2 text-center">My Resumes</h4>
            <hr>




            <table class="table table-bordered table-stripped table-hover">
    <thead>
        <tr>
            <th>Resume ID</th>
            <th>User ID</th>
            <th>Resume Title</th>
            <!-- Add more headers for other fields as needed -->
            <th>Update</th>
            <th>Delete</th>
            <th>Preview</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($userData)) {
            foreach ($userData as $resume) { ?>
                <tr>
                    <td><?php echo $resume['resume_id']; ?></td>
                    <td><?php echo $resume['user_id']; ?></td>
                    <td><?php echo $resume['resume_title']; ?></td>
                    <!-- Add more cells for other fields as needed -->
                    <td><a href="updateData.php?action=edit&resume_id=<?php echo $resume['resume_id']; ?>&user_id=<?php echo $resume['user_id']; ?>" class="no-underline">Edit</a></td>
                    <td><a href="resume.php?action=delete&resume_id=<?php echo $resume['resume_id']; ?>&user_id=<?php echo $resume['user_id']; ?>" class="no-underline">Delete</a></td>
                    <td><a href="resume.php?action=preview&resume_id=<?php echo $resume['resume_id']; ?>&user_id=<?php echo $resume['user_id']; ?>" class="no-underline">Preview</a></td>
                </tr>
            <?php }
        } else { ?>
            <tr>
                <td colspan="6">No resume data available.</td>
            </tr>
        <?php } ?>
    </tbody>
</table>





          </div>
        </div>
        <div class=" mt-3">
          <a href="add_row.php" class="no-underline btn btn-primary">Add Resume</a>
        </div>
        <div class="mb-10">

        </div>
      </div>
    </div>
  </div>

  <?php include('../footer.php'); ?>

  <!-- DataTables Initialization -->
  <script>
    $(document).ready(function () {
      $('table').DataTable();
    });
  </script>

  <!-- Other JS scripts -->
  <script src="https://unicons.iconscout.com/release/v4.0.0/script/monochrome/bundle.js"></script>
  <script src="../../assets/libs/@popperjs/core/umd/popper.min.js"></script>
  <script src="../../assets/libs/simplebar/simplebar.min.js"></script>
  <script src="../../assets/js/pages/switcher.js"></script>
  <script src="../../assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
  <script src="../../assets/js/pages/candidate.init.js"></script>
  <script src="../../assets/js/pages/dropdown&modal.init.js"></script>
  <script src="../../assets/js/pages/nav&tabs.js"></script>
  <script src="../../assets/js/app.js"></script>
</body>

</html>