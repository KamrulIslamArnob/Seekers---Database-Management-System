<?php
require_once '../../database/crud/DBConnection.php';

session_start();
$userId = $_SESSION['user_id'];

if (!isset($_SESSION["username"])) {
    header("Location: http://localhost/Seekers---job-portal-using-php-tailwind-mysql/index.php");
} else if (isset($_SESSION["username"]) and $_SESSION["role"] == 'admin') {
    header("Location: http://localhost/Seekers---job-portal-using-php-tailwind-mysql/admin/dashboard-admin.php");
}

$dbConnection = new DBConnection();
$conn = $dbConnection->conn;

// Fetch user data
$userSql = "SELECT
    id,
    name,
    user_name,
    email,
    role,
    status,
    address,
    phone,
    map_location,
    profile_picture
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

$blogIdFromUrl = $_GET['blog_id'];

// Fetch blog data
$blogSql = "SELECT
    blog_id,
    blog_title,
    blog_tagline,
    blog_text,
    blog_genre,
    blog_cover,
    created_at,
    updated_at
FROM
    blogs
WHERE
     blog_id = $blogIdFromUrl";

$blogResult = $conn->query($blogSql);

if ($blogResult->num_rows > 0) {
    $blogData = $blogResult->fetch_assoc();
    //print_r($blogData);
} else {
    $blogData = [];
}


// Fetch blog data
$blogSql1 = "SELECT
    blog_id,
    blog_title,
    blog_tagline,
    blog_text,
    blog_genre,
    blog_cover,
    created_at,
    updated_at
FROM
    blogs
";

$blogResult1 = $conn->query($blogSql1);

if ($blogResult1->num_rows > 0) {
    $blogData1 = $blogResult1->fetch_all(MYSQLI_ASSOC);
    //print_r($blogData);
} else {
    $blogData1 = [];
}


function parseHashTags($text)
{

    $pattern = '/#(.*?)#/';

    $replacement = function ($matches) {
        $content = $matches[1];
        return "<h1>$content</h1>";
    };

    // Perform the replacement
    $parsedText = preg_replace_callback($pattern, $replacement, $text);

    return $parsedText;
}

//echo $text = parseHashTags($blogData['blog_text']);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" data-mode="light" class="scroll-smooths group" data-theme-color="violet">

<head>
    <meta charset="utf-8" />
    <title>Blog details | Seekers</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta content="Tailwind Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="Themesbrand" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="../../assets/images/favicon.ico" />


    <!-- Swiper Css -->
    <link rel="stylesheet" href="../../assets/libs/swiper/swiper-bundle.min.css">

    <link rel="stylesheet" href="../../assets/css/icons.css" />
    <link rel="stylesheet" href="../../assets/css/tailwind.css" />




</head>

<body class="bg-white dark:bg-neutral-800">



    <div class="main-content">
        <div class="page-content">

            <section
                class="pt-28 lg:pt-44 pb-28 group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500 dark:bg-neutral-900 bg-[url('../images/home/page-title.png')] bg-center bg-cover relative">
                <div class="container mx-auto">
                    <div class="grid">
                        <div class="col-span-12">
                            <div class="text-center text-white">
                                <h3 class="mb-4 text-[26px]">Blog Details</h3>
                                <div class="page-next">
                                    <nav class="inline-block" aria-label="breadcrumb text-center">
                                        <ol class="flex flex-wrap justify-center text-sm font-medium uppercase">

                                            <li><a href="javascript:void(0)">Blog</a></li>
                                            <li class="active" aria-current="page"><i
                                                    class="bx bxs-chevron-right align-middle px-2.5"></i>Blog Details
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
            <section class="py-16">
                <div class="container mx-auto">
                    <div class="grid grid-cols-12 md:gap-8">
                        <div class="col-span-12 md:col-span-6 md:col-start-4">
                            <div class="text-center">

                                <h3 class="text-gray-900 text-[26px] dark:text-white">
                                    <?php echo $blogData['blog_title']; ?>
                                </h3>
                            </div>
                        </div>
                    </div>



                    <div class="grid grid-cols-12 mt-8 md:gap-14">
                        <div class="col-span-12 lg:col-span-8">
                            <div class="swiper blogdetailSlider">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="assets/images/blog/img-11.jpg" alt="" class="rounded-lg">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="assets/images/blog/img-14.jpg" alt="" class="rounded-lg">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="assets/images/blog/img-15.jpg" alt="" class="rounded-lg">
                                    </div>
                                </div>
                            </div>
                            <ul class="flex flex-wrap items-center mt-3 mb-0 text-gray-500">
                                <li>
                                    <div class="flex items-center">
                                        <div class="shrink-0">
                                            <img src="../../.<?php echo $userData['profile_picture']; ?>" alt=""
                                                class="w-12 h-12 rounded-full">
                                        </div>
                                        <div class="ltr:ml-3 rtl:mr-3">
                                            <a href="../portfolio/index.php" class="text-gray-900 dark:text-white">
                                                <h6 class="mb-0 dark:text-gray-300">By
                                                    <?php echo $userData['name']; ?>
                                                </h6>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="ltr:ml-3 rtl:mr-3">
                                    <div class="flex items-center">
                                        <div class="shrink-0">
                                            <i class="uil uil-calendar-alt"></i>
                                        </div>
                                        <div class="ltr:ml-2 rtl:mr-2">
                                            <?php

                                            $rawDate = $blogData['created_at'];
                                            $formattedDate = date("M d, Y", strtotime($rawDate));

                                            // Output the formatted date
                                            echo '<p class="mb-0 dark:text-gray-300">' . $formattedDate . '</p>';
                                            ?>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                            <div class="mt-4">

                                <?php echo $text = parseHashTags($blogData['blog_text']); ?>


                                <div class="flex items-center my-4">
                                    <div class="shrink-0">
                                        <b class="text-gray-900 dark:text-gray-50">Tags:</b>
                                    </div>
                                    <div class="ltr:ml-2 rtl:mr-2 flex-grow-1">
                                        <a href="javascript:void(0)"
                                            class="px-1.5 py-0.5 mt-1 text-sm font-medium text-green-500 bg-green-500/20 rounded">
                                            <?php echo $blogData['blog_genre']; ?>
                                        </a>
                                    </div>
                                </div>
                                <ul class="flex gap-2 mb-0 md:justify-end">
                                    <li>
                                        <b class="text-gray-900 dark:text-gray-50">Share post:</b>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"
                                            class="p-2.5 rounded bg-violet-500/20 text-violet-500">
                                            <i class="uil uil-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"
                                            class="p-2.5 rounded bg-green-500/20 text-green-500">
                                            <i class="uil uil-whatsapp"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"
                                            class="p-2.5 rounded bg-violet-500/20 text-violet-500">
                                            <i class="uil uil-linkedin-alt"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" class="p-2.5 rounded bg-red-500/20 text-red-500">
                                            <i class="uil uil-envelope"></i>
                                        </a>
                                    </li>
                                </ul>


                            </div>

                            <!-- Related Blog Posts -->

                            <div class="mt-8">
    <h5 class="pb-3 text-gray-900 border-b border-gray-100/50 dark:text-gray-50 dark:border-zinc-700">
        Related Blog Posts
    </h5>
    <div class="pb-5 mt-8 swiper blogSlider">
        <div class="pb-8 swiper-wrapper">
            <?php foreach ($blogData1 as $blogItem): ?>
                <div class="swiper-slide">
                    <div class="relative overflow-hidden rounded-md group/blogpost">
                        <img src="blogCRUD/uploads/<?php echo $blogItem['blog_cover']; ?>" alt=""
                            class="w-full h-[400px] object-cover duration-500 ease scale-110 rounded-md group-hover/blogpost:-translate-x-4 group-hover/blogpost:transition-all">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50"></div>
                        <div class="absolute bottom-3 ltr:left-3 rtl:right-3">
                            <a href="blog-details.php?blog_id=<?php echo $blogItem['blog_id']; ?>" class="text-white">
                                <h5><?php echo $blogItem['blog_title']; ?></h5>
                            </a>
                            <p class="mt-1 text-gray-200">
                                <a href="blog-author.html" class="font-bold text-white-50">
                                    <?php echo $blogItem['created_at']; ?> - 5 mins ago
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>




                        </div>




                    </div>


                </div>
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

    <!-- Swiper Js -->
    <script src="../../assets/libs/swiper/swiper-bundle.min.js"></script>

    <!-- Blog Init Js -->
    <script src="../../assets/js/pages/blog-details.init.js"></script>

    <script src="../../assets/js/pages/nav&tabs.js"></script>

    <script src="../../assets/js/app.js"></script>

</body>

</html>