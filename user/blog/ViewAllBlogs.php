<?php
require_once '../../database/crud/UserCRUD.php';
require_once '../../database/crud/DBConnection.php';

session_start();
$userId = $_SESSION['user_id'];

$dbConnection = new DBConnection();
$conn = $dbConnection->conn;


if (!isset($_SESSION['username'])) {
    header("Location:http://localhost/Seekers---job-portal-using-php-tailwind-mysql/index.php");

} else if (!isset($_SESSION['username']) and $_SESSION['role'] == 'admin') {
    header("Location:http://localhost/Seekers---job-portal-using-php-tailwind-mysql/admin/dashboard-admin.php");
} else if (!isset($_SESSION['username']) and $_SESSION['role'] == 'company') {
    header("Location:http://localhost/Seekers---job-portal-using-php-tailwind-mysql/user/dashboard-user.php");
}



$userCRUD = new CRUD('');
$userId = $_SESSION['user_id'];
$userData = $userCRUD->getUserWithDetails($userId);
//print_r($userData);

$blogSql1 = "SELECT
b.blog_id,
b.blog_title,
b.blog_tagline,
b.blog_text,
b.blog_genre,
b.blog_cover,
b.created_at,
b.updated_at,
u.profile_picture,
u.name,
u.designation
FROM
blogs b
JOIN
users u ON b.user_id = u.id
";

$blogResult1 = $conn->query($blogSql1);

if ($blogResult1->num_rows > 0) {
    $blogData1 = $blogResult1->fetch_all(MYSQLI_ASSOC);
    //print_r($blogData);
} else {
    $blogData1 = [];
}


?>

<!DOCTYPE html>
<html lang="en" dir="ltr" data-mode="light" class="scroll-smooths group" data-theme-color="violet">

<head>
    <meta charset="utf-8" />
    <title>All Blogs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta content="Tailwind Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="Themesbrand" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="../../assets/images/favicon.ico" />


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
                            
                                <h3 class="mb-4 text-[26px]">All Blog</h3>
                                <div class="page-next">
                                    <nav class="inline-block" aria-label="breadcrumb text-center">
                                        <ol class="flex flex-wrap justify-center text-sm font-medium uppercase">
                                            <li><a href="../dashboard-user.php">Home</a></li>
                                            <li class="active" aria-current="page"><i
                                                    class="bx bxs-chevron-right align-middle px-2.5"></i>All Blog
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
                    <div class="grid grid-cols-12 gap-y-5 sm:gap-8">
                        <?php foreach ($blogData1 as $blogItem): ?>
                            <div class="col-span-12 md:col-span-6 lg:col-span-4">
                                <div class="p-2 overflow-hidden border-0 shadow card blog-masonry-box">
                                    <div class="relative overflow-hidden">
                                        <img src="blogCRUD/uploads/<?php echo $blogItem['blog_cover']; ?>" alt=""
                                            class="object-cover w-full duration-500 ease-in-out scale-110 rounded-md hover:-translate-x-2 hover:transition-all">
                                    </div>
                                    <div class="p-4 card-body">
                                        <p class="mb-2 text-gray-500 dark:text-gray-300"><b>
                                            <?php echo $blogItem['blog_genre']; ?>
                                        </b> <i
                                                class="mdi mdi-circle-medium"></i>
                                            <?php echo date('M d, Y', strtotime($blogItem['created_at'])); ?>
                                        </p>
                                        <a href="blog-details.php?blog_id=<?php echo $blogItem['blog_id']; ?>"
                                            class="text-gray-900 group-data-[theme-color=violet]:hover:text-violet-500 group-data-[theme-color=sky]:hover:text-sky-500 group-data-[theme-color=red]:hover:text-red-500 group-data-[theme-color=green]:hover:text-green-500 group-data-[theme-color=pink]:hover:text-pink-500 group-data-[theme-color=blue]:hover:text-blue-500 transition-all duration-300 ease-in-out dark:text-gray-50">
                                            <h5>
                                                <?php echo $blogItem['blog_title']; ?>
                                            </h5>
                                        </a>
                                        <div class="flex items-center mt-4">
                                            <div class="shrink-0">
                                                <img src="
                                                <?php if ($blogItem['profile_picture'] == '') {
                                                    echo 'blogCRUD/uploads/default.png';
                                                } else {
                                                    echo '../'.$blogItem['profile_picture'];
                                                } ?>
                                                
                                                " alt=""
                                                    class="w-10 h-10 rounded-full">
                                            </div>
                                            <div class="ltr:ml-3 rtl:mr-3">
                                                <a href="blog-author.html">
                                                    <h6 class="mb-1 text-gray-900 text-16 dark:text-gray-50">
                                                        <?php echo $blogItem['name']; ?>
                                                    </h6>
                                                </a>
                                                <p class="mb-0 text-sm text-gray-500 dark:text-gray-300">
                                                    <?php echo $blogItem['designation']; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
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

    <script src="../../assets/libs/masonry-layout/masonry.pkgd.min.js"></script>

    <script src="../../assets/js/pages/nav&tabs.js"></script>

    <script src="../../assets/js/app.js"></script>

</body>

</html>