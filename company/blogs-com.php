<?php
require_once '../../database/crud/DBConnection.php';

session_start();
$userId = $_SESSION['user_id'];

// if (!isset($_SESSION["username"])) {
//     header("Location: http://localhost/Seekers---job-portal-using-php-tailwind-mysql/index.php");
// } else if (isset($_SESSION["username"]) and $_SESSION["role"] == 'admin') {
//     header("Location: http://localhost/Seekers---job-portal-using-php-tailwind-mysql/admin/dashboard-admin.php");
// }

$dbConnection = new DBConnection(); 
$conn = $dbConnection->conn;

// Fetch user data
$userSql = "SELECT
    id,
    name,
    user_name
FROM
    users
WHERE
    id = $userId";

$userResult = $conn->query($userSql);

if ($userResult->num_rows > 0) {
    $userData = $userResult->fetch_assoc();
} else {
    $userData = [];
}

// Fetch blog data
$blogSql = "SELECT
    blog_id,
    blog_title,
    blog_cover,
    created_at,
    updated_at
FROM
    blogs
WHERE
    user_id = $userId";

$blogResult = $conn->query($blogSql);

if ($blogResult->num_rows > 0) {
    $blogData = $blogResult->fetch_all(MYSQLI_ASSOC);
} else {
    $blogData = [];
}


?>



<!DOCTYPE html>
<html lang="en" dir="ltr" data-mode="light" class="scroll-smooths group" data-theme-color="violet">
    <head>
        <meta charset="utf-8" />
        <title>Blog | Seekers</title>
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
        <link rel="shortcut icon" href="../../assets/images/logo-dark.png" />


        <link rel="stylesheet" href="../../assets/css/icons.css" />
        <link rel="stylesheet" href="../../assets/css/tailwind.css" />




    </head>

   
    
    <body class="bg-white dark:bg-neutral-800">
 

        <div class="main-content">
            <div class="page-content">

                <section class="pt-28 lg:pt-44 pb-28 group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500 dark:bg-neutral-900 bg-[url('../images/home/page-title.png')] bg-center bg-cover relative" >
                    <div class="container mx-auto">
                        <div class="grid">
                            <div class="col-span-12">
                                <div class="relative text-center text-white">
                                    <h3 class="mb-4 text-[26px]">Blog Modern</h3>
                                    <div class="page-next">
                                        <nav class="inline-block" aria-label="breadcrumb text-center">
                                            <ol class="flex justify-center text-sm font-medium uppercase">
                                                <li><a href="index.html">Home</a></li>
                                                <li><i class="bx bxs-chevron-right align-middle px-2.5"></i><a href="javascript:void(0)">Blog</a></li>
                                                <li class="active" aria-current="page"><i class="bx bxs-chevron-right align-middle px-2.5"></i>Blog Modern</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <img src="../../assets/images/about/shape.png" alt="" class="absolute block bg-cover -bottom-0 dark:hidden">
                    <img src="../../assets/images/about/shape-dark.png" alt="" class="absolute hidden bg-cover -bottom-0 dark:block">
                </section>

                <!-- Start grid -->

                    <section class="py-16">
                        <div class="container mx-auto">


                        <div class="grid grid-cols-6 gap-y-8 md:gap-8">
    <?php foreach ($blogData as $blogItem): ?>
        <div class="col-span-12 mt-4 md:col-span-6 lg:col-span-8">
            <div class="relative overflow-hidden rounded-md group/modern">
                <img src="blogCRUD/uploads/<?php echo $blogItem['blog_cover']; ?>" alt="" class="w-full h-[400px] object-cover duration-500 ease-in-out scale-110 rounded-md group-hover/modern:-translate-x-2 group-hover/modern:transition-all">
                <div class="absolute inset-0 bg-gradient-to-t from-black/50"></div>
                <div class="absolute bottom-3 ltr:left-3 rtl:right-3">
                    <a href="blog-details.php?blog_id=<?php echo $blogItem['blog_id']; ?>" class="text-white">
                        <h5 class="card-title"><?php echo $blogItem['blog_title']; ?></h5>
                    </a>
                    <p class="mt-1 text-gray-100">
    <?php
        $authorName = $userData['name'];
        
        // Calculate time ago
        $createdAt = new DateTime($blogItem['created_at']);
        $currentTime = new DateTime();
        $interval = $createdAt->diff($currentTime);

        $timeAgo = '';
        if ($interval->y > 0) {
            $timeAgo = $interval->y . ' years ago';
        } elseif ($interval->m > 0) {
            $timeAgo = $interval->m . ' months ago';
        } elseif ($interval->d > 0) {
            $timeAgo = $interval->d . ' days ago';
        } elseif ($interval->h > 0) {
            $timeAgo = $interval->h . ' hours ago';
        } elseif ($interval->i > 0) {
            $timeAgo = $interval->i . ' minutes ago';
        } else {
            $timeAgo = 'just now';
        }
    ?>

    <a href="../portfolio/index.php" class="font-bold text-white-50">
        <?php echo $authorName; ?>
    </a> - <?php echo $timeAgo; ?>
</p>

                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>


                            

                            <ul class="flex justify-center gap-2 mt-14">
                                <li class="w-12 h-12 text-center border rounded-full cursor-default border-gray-100/50 dark:border-zinc-600 dark:border-gray-100/20">
                                    <a class="cursor-auto" href="javascript:void(0)" tabindex="-1">
                                        <i class="mdi mdi-chevron-double-left text-16 leading-[2.8] dark:text-gray-50"></i>
                                    </a>
                                </li>
                                <li class="w-12 h-12 text-center text-white border border-transparent rounded-full cursor-pointer group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500">
                                    <a class="text-16 leading-[2.8]" href="javascript:void(0)">1</a>
                                </li>
                                <li class="w-12 h-12 text-center text-gray-900 transition-all duration-300 border rounded-full cursor-pointer border-gray-100/50 dark:border-zinc-600 hover:bg-gray-100/30 focus:bg-gray-100/30 dark:border-gray-100/20 dark:text-gray-50 dark:hover:bg-gray-500/20">
                                    <a class="text-16 leading-[2.8]" href="javascript:void(0)">2</a>
                                </li>
                                <li class="w-12 h-12 text-center text-gray-900 transition-all duration-300 border rounded-full cursor-pointer border-gray-100/50 dark:border-zinc-600 hover:bg-gray-100/30 focus:bg-gray-100/30 dark:border-gray-100/20 dark:text-gray-50 dark:hover:bg-gray-500/20">
                                    <a class="text-16 leading-[2.8]" href="javascript:void(0)">3</a>
                                </li>
                                <li class="w-12 h-12 text-center text-gray-900 transition-all duration-300 border rounded-full cursor-pointer border-gray-100/50 dark:border-zinc-600 hover:bg-gray-100/30 focus:bg-gray-100/30 dark:border-gray-100/20 dark:text-gray-50 dark:hover:bg-gray-500/20">
                                    <a class="text-16 leading-[2.8]" href="javascript:void(0)">4</a>
                                </li>
                                <li class="w-12 h-12 text-center text-gray-900 transition-all duration-300 border rounded-full cursor-pointer border-gray-100/50 dark:border-zinc-600 hover:bg-gray-100/30 focus:bg-gray-100/30 dark:border-gray-100/20 dark:text-gray-50 dark:hover:bg-gray-500/20">
                                    <a href="javascript:void(0)" tabindex="-1">
                                        <i class="mdi mdi-chevron-double-right text-16 leading-[2.8]"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </section>
                <!-- End grid -->
          
            </div>
        </div>

        <?php
    include('../footer.php');
    ?>


     <script src="https://unicons.iconscout.com/release/v4.0.0/script/monochrome/bundle.js"></script>
     <script src="../../assets/libs/@popperjs/core/umd/popper.min.js"></script>
     <script src="../../assets/libs/simplebar/simplebar.min.js"></script>


    <script src="../../assets/js/pages/switcher.js"></script>

    <script src="../../assets/js/pages/dropdown&modal.init.js"></script>

    <script src="../../assets/js/pages/nav&tabs.js"></script>

    <script src="../../assets/js/app.js"></script>
    
</body>
</html>
