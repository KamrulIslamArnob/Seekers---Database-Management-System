

<?php
require_once '../../database/crud/DBConnection.php';

session_start();
$userId = isset($_GET['$userId']) ? $_GET['$userId'] : $_SESSION['user_id'];

    
    if(!isset($_SESSION["username"])){
        header("Location:http://localhost/Seekers---job-portal-using-php-tailwind-mysql/index.php");
    }else if(isset($_SESSION["username"]) AND $_SESSION["role"]=='admin'){
        header("Location:http://localhost/Seekers---job-portal-using-php-tailwind-mysql/admin/dashboard-admin.php");
    }
    
    
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
    blog_tagline,
    blog_text,
    blog_genre,
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
    //print_r($blogData);
} else {
    $blogData = [];
}


?>


<!DOCTYPE html>
<html lang="en" class="scroll-smooth dark" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Morex - Personal Portfolio HTML Template</title>
 
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/portfolio_assets/images/favicon.ico">
   <!-- Google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Heebo:wght@300;400;500;600;700;800;900&family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300&display=swap"
    rel="stylesheet">

  <!-- Plugins css -->
  <link rel="stylesheet" href="../../assets/portfolio_assets/css/mobilemenu.css" />
  <!-- <link rel="stylesheet" href="./assets/portfolio_assets/css/glightbox.min.css" /> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
  <!-- Tailwind css -->
  <link rel="stylesheet" href="../../assets/portfolio_assets/css/styles.css" />
  <style>
    .ml-10{
      margin-left:8rem;
      padding-top:1.9rem;
      color:white;
    }
  </style>
    <script>
      // On page load or when changing themes, best to add inline in `head` to avoid FOUC
      if (localStorage.getItem("theme-color") === "dark" || (!("theme-color" in localStorage) && window.matchMedia("(prefers-color-scheme: dark)").matches)) {
        document.documentElement.classList.add("dark");
      } 
      if (localStorage.getItem("theme-color") === "light") {
        document.documentElement.classList.remove("dark");
      } 
    </script>
  </head>
  <body class="font-rubik dark:bg-dark_primary_bg">
  <div class="ml-10">
      <a href="../dashboard-user.php"><h2 >Seekers</h2></a>
  </div>
    <!-- Preloader start -->
    <div id="preloader">
        <div class="loader--border"></div>
    </div>
    <!-- Preloader end -->

   <!-- Collapsible navigation start -->
   <div class="toggle__navigation fixed ltr:left-[30px] rtl:right-[30px] top-[30px] z-50 pointer-events-none md:hidden">
    <button
      class="toggle__navigation--button bg-accent1 w-[60px] h-[60px] rounded-full absolute z-50 top-0 ltr:left-0 rtl:right-0 overflow-hidden pointer-events-auto whitespace-nowrap"
      aria-label="Menu navigation">
      <span
        class="left-[50%] top-[50%] bottom-auto right-auto translate-x-[-50%] translate-y-[-50%] absolute w-5 h-[2px] bg-white after:absolute after:content[''] after:left-0 after:top-0 after:w-5 after:h-[2px] after:bg-white after:translate-y-[6px] before:absolute before:content[''] before:left-0 before:top-0 before:w-5 before:h-[2px] before:bg-white before:translate-y-[-6px]"></span>
    </button>
    <ul class="toggle__nav--menu relative z-20 invisible text-left pt-[53px] pb-[22px]">

      <li>
        <a href="index.php?$userId=<?php echo $userId; ?>" class="flex items-center">
          <span class="relative z-10 ltr:pl-5 rtl:pr-5 toggle__nav--menu-icon opacity-0 text-accent1">
            <svg width="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
              <path
                d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z" />
            </svg>
          </span>
          <span
            class="toggle__nav--menu--label-wrapper relative block h-[45px] leading-[45px] text-primary dark:text-white uppercase text-[16px] before:content[''] before:absolute before:w-[3px] before:h-[16px] before:top-[50%] ltr:before:left-[20px] rtl:before:right-[18px]">
            <span class="toggle__nav--menu--label font-bold font-heebo block opacity-0">Home</span>
          </span>
        </a>
      </li>

      <li class="active">
        <a href="about.php?$userId=<?php echo $userId; ?>" class="flex items-center">
          <span class="relative z-10 ltr:pl-5 rtl:pr-5 toggle__nav--menu-icon opacity-0 text-accent1">
            <svg width="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
              <path
                d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0S96 57.3 96 128s57.3 128 128 128zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
            </svg>
          </span>
          <span
            class="toggle__nav--menu--label-wrapper relative block h-[45px] leading-[45px] text-primary dark:text-white uppercase text-[16px] before:content[''] before:absolute before:w-[3px] before:h-[16px] before:top-[50%] ltr:before:left-[20px] rtl:before:right-[18px]">
            <span class="toggle__nav--menu--label font-bold font-heebo block opacity-0">About</span>
          </span>
        </a>
      </li>

      <li>
        <a href="services.php?$userId=<?php echo $userId; ?>" class="flex items-center">
          <span class="relative z-10 ltr:pl-5 rtl:pr-5 toggle__nav--menu-icon opacity-0 text-accent1">
            <svg width="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
              <path
                d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336c44.2 0 80-35.8 80-80s-35.8-80-80-80s-80 35.8-80 80s35.8 80 80 80z" />
            </svg>
          </span>
          <span
            class="toggle__nav--menu--label-wrapper relative block h-[45px] leading-[45px] text-primary dark:text-white uppercase text-[16px] before:content[''] before:absolute before:w-[3px] before:h-[16px] before:top-[50%] ltr:before:left-[20px] rtl:before:right-[18px]">
            <span class="toggle__nav--menu--label font-bold font-heebo block opacity-0">Services</span>
          </span>
        </a>
      </li>

      <li>
        <a href="portfolio.php?$userId=<?php echo $userId; ?>" class="flex items-center">
          <span class="relative z-10 ltr:pl-5 rtl:pr-5 toggle__nav--menu-icon opacity-0 text-accent1">
            <svg width="16" fill="currentColor" stroke="currentColor" xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 512 512">
              <path
                d="M184 48H328c4.4 0 8 3.6 8 8V96H176V56c0-4.4 3.6-8 8-8zm-56 8V96H64C28.7 96 0 124.7 0 160v96H192 320 512V160c0-35.3-28.7-64-64-64H384V56c0-30.9-25.1-56-56-56H184c-30.9 0-56 25.1-56 56zM512 288H320v32c0 17.7-14.3 32-32 32H224c-17.7 0-32-14.3-32-32V288H0V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V288z" />
            </svg>
          </span>
          <span
            class="toggle__nav--menu--label-wrapper relative block h-[45px] leading-[45px] text-primary dark:text-white uppercase text-[16px] before:content[''] before:absolute before:w-[3px] before:h-[16px] before:top-[50%] ltr:before:left-[20px] rtl:before:right-[18px]">
            <span class="toggle__nav--menu--label font-bold font-heebo block opacity-0">Portfolio</span>
          </span>
        </a>
      </li>

      <li>
        <a href="blog.php?$userId=<?php echo $userId; ?>" class="flex items-center">
          <span class="relative z-10 ltr:pl-5 rtl:pr-5 toggle__nav--menu-icon opacity-0 text-accent1">
            <svg width="16" fill="currentColor" stroke="currentColor" xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 448 512">
              <path
                d="M446.6 222.7c-1.8-8-6.8-15.4-12.5-18.5-1.8-1-13-2.2-25-2.7-20.1-.9-22.3-1.3-28.7-5-10.1-5.9-12.8-12.3-12.9-29.5-.1-33-13.8-63.7-40.9-91.3-19.3-19.7-40.9-33-65.5-40.5-5.9-1.8-19.1-2.4-63.3-2.9-69.4-.8-84.8.6-108.4 10C45.9 59.5 14.7 96.1 3.3 142.9 1.2 151.7.7 165.8.2 246.8c-.6 101.5.1 116.4 6.4 136.5 15.6 49.6 59.9 86.3 104.4 94.3 14.8 2.7 197.3 3.3 216 .8 32.5-4.4 58-17.5 81.9-41.9 17.3-17.7 28.1-36.8 35.2-62.1 4.9-17.6 4.5-142.8 2.5-151.7zm-322.1-63.6c7.8-7.9 10-8.2 58.8-8.2 43.9 0 45.4.1 51.8 3.4 9.3 4.7 13.4 11.3 13.4 21.9 0 9.5-3.8 16.2-12.3 21.6-4.6 2.9-7.3 3.1-50.3 3.3-26.5.2-47.7-.4-50.8-1.2-16.6-4.7-22.8-28.5-10.6-40.8zm191.8 199.8l-14.9 2.4-77.5.9c-68.1.8-87.3-.4-90.9-2-7.1-3.1-13.8-11.7-14.9-19.4-1.1-7.3 2.6-17.3 8.2-22.4 7.1-6.4 10.2-6.6 97.3-6.7 89.6-.1 89.1-.1 97.6 7.8 12.1 11.3 9.5 31.2-4.9 39.4z" />
            </svg>
          </span>
          <span
            class="toggle__nav--menu--label-wrapper relative block h-[45px] leading-[45px] text-primary dark:text-white uppercase text-[16px] before:content[''] before:absolute before:w-[3px] before:h-[16px] before:top-[50%] ltr:before:left-[20px] rtl:before:right-[18px]">
            <span class="toggle__nav--menu--label font-bold font-heebo block opacity-0">Blog</span>
          </span>
        </a>
      </li>

      <li>
        <a href="contact.php?$userId=<?php echo $userId; ?>" class="flex items-center">
          <span class="relative z-10 ltr:pl-5 rtl:pr-5 toggle__nav--menu-icon opacity-0 text-accent1">
            <svg width="16" fill="currentColor" stroke="currentColor" xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 512 512">
              <path
                d="M96 0C60.7 0 32 28.7 32 64V448c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H96zM208 288h64c44.2 0 80 35.8 80 80c0 8.8-7.2 16-16 16H144c-8.8 0-16-7.2-16-16c0-44.2 35.8-80 80-80zm96-96c0 35.3-28.7 64-64 64s-64-28.7-64-64s28.7-64 64-64s64 28.7 64 64zM512 80c0-8.8-7.2-16-16-16s-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16V80zM496 192c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm16 144c0-8.8-7.2-16-16-16s-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16V336z" />
            </svg>
          </span>
          <span
            class="toggle__nav--menu--label-wrapper relative block h-[45px] leading-[45px] text-primary dark:text-white uppercase text-[16px] before:content[''] before:absolute before:w-[3px] before:h-[16px] before:top-[50%] ltr:before:left-[20px] rtl:before:right-[18px]">
            <span class="toggle__nav--menu--label font-bold font-heebo block opacity-0">Contact</span>
          </span>
        </a>
      </li>

    </ul>
    <span aria-hidden="true"
      class="toggle__nav--menu--bg absolute z-10 top-0 ltr:left-0 rtl:right-0 w-[60px] h-[60px] rounded-[30px] bg-white"></span>
  </div>
  <!-- Collapsible navigation end -->

    <!-- Dark and light button start -->
    <div class="fixed ltr:md:right-[15px] rtl:md:left-[15px] md:top-[15px] ltr:lg:right-[30px] rtl:lg:left-[30px] lg:top-[30px] z-50">
      <button class="dark--version bg-accent1 md:w-[45px] md:h-[45px] lg:w-[60px] lg:h-[60px] text-white flex justify-center items-center rounded-full shadow-[0_2px_5px_rgba(0,0,0,0.15)]" id="light__to--dark">
        <svg xmlns="http://www.w3.org/2000/svg" class="dark--mode__icon ionicon md:max-w-[20px] max-w-[25px] fill-white" viewBox="0 0 512 512"><title>Moon</title><path d="M264 480A232 232 0 0132 248c0-94 54-178.28 137.61-214.67a16 16 0 0121.06 21.06C181.07 76.43 176 104.66 176 136c0 110.28 89.72 200 200 200 31.34 0 59.57-5.07 81.61-14.67a16 16 0 0121.06 21.06C442.28 426 358 480 264 480z"/></svg>
        
        <svg xmlns="http://www.w3.org/2000/svg" class="light--mode__icon ionicon md:max-w-[20px] lg:max-w-[25px] fill-white" viewBox="0 0 512 512"><title>Sunny</title><path d="M256 118a22 22 0 01-22-22V48a22 22 0 0144 0v48a22 22 0 01-22 22zM256 486a22 22 0 01-22-22v-48a22 22 0 0144 0v48a22 22 0 01-22 22zM369.14 164.86a22 22 0 01-15.56-37.55l33.94-33.94a22 22 0 0131.11 31.11l-33.94 33.94a21.93 21.93 0 01-15.55 6.44zM108.92 425.08a22 22 0 01-15.55-37.56l33.94-33.94a22 22 0 1131.11 31.11l-33.94 33.94a21.94 21.94 0 01-15.56 6.45zM464 278h-48a22 22 0 010-44h48a22 22 0 010 44zM96 278H48a22 22 0 010-44h48a22 22 0 010 44zM403.08 425.08a21.94 21.94 0 01-15.56-6.45l-33.94-33.94a22 22 0 0131.11-31.11l33.94 33.94a22 22 0 01-15.55 37.56zM142.86 164.86a21.89 21.89 0 01-15.55-6.44l-33.94-33.94a22 22 0 0131.11-31.11l33.94 33.94a22 22 0 01-15.56 37.55zM256 358a102 102 0 11102-102 102.12 102.12 0 01-102 102z"/></svg>
      </button>
      
    </div>
    <!-- Dark and light button end -->


    <!-- Mobile Menu nav start -->
    <div class="md:block hidden fixed z-[98] bg-white dark:bg-dark_accent1 py-4 px-4 w-full mx-auto bottom-0 shadow-[0_0_25px_0_rgba(196,206,213,0.5)] dark:shadow-[-10px_0_20px_0_rgba(0,0,0,0.1)]">
      <nav>
        <ul class="flex justify-around items-center">
          <li>
            <a href="index-2-dark.html" class="mobile--menu__nav--item bg-accent1 w-11 h-11 rounded-full text-white flex items-center justify-center relative transition-all duration-400">
              <span class="relative z-10">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="23" viewBox="0 0 22 23">
                  <text id="_" data-name="" transform="translate(0 19)" fill="currentColor" font-size="21.018" font-family="icofont, IcoFont" letter-spacing="0.015em"><tspan x="0" y="0"></tspan></text>
                </svg>
              </span>
            </a>
          </li>
          <li >
            <a href="about-dark.html" class="mobile--menu__nav--item bg-accent1 w-11 h-11 rounded-full text-white flex items-center justify-center relative transition-all duration-400">
              <span class="relative z-10">
                <svg class="text-white" xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
                  <text id="_" data-name="" transform="translate(0 14)" fill="currentColor" font-size="16.241" font-family="icofont, IcoFont" letter-spacing="0.015em"><tspan x="0" y="0"></tspan></text>
                </svg>
              </span>
            </a>
          </li>
          <li >
            <a href="services-dark.html" class="mobile--menu__nav--item bg-accent1 w-11 h-11 rounded-full text-white flex items-center justify-center relative transition-all duration-400">
              <span class="relative z-10">
                <svg class="text-white" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 17 17">
                  <text id="_" data-name="" transform="translate(0 14)" fill="currentColor" font-size="16.241" font-family="icofont, IcoFont" letter-spacing="0.015em"><tspan x="0" y="0"></tspan></text>
                </svg>
              </span>
            </a>
          </li>
          <li >
            <a href="portfolio-dark.html" class="mobile--menu__nav--item bg-accent1 w-11 h-11 rounded-full text-white flex items-center justify-center relative transition-all duration-400">
              <span class="relative z-10">
                <svg class="text-white" xmlns="http://www.w3.org/2000/svg" width="20" height="25" viewBox="0 0 37 40">
                  <text id="_" data-name="" transform="translate(0 32)" fill="currentColor" font-size="36.378" font-family="icofont, IcoFont"><tspan x="0" y="0"></tspan></text>
                </svg>
              </span>
            </a>
          </li>
          <li >
            <a href="blog-dark.html" class="mobile--menu__nav--item bg-accent1 w-11 h-11 rounded-full text-white flex items-center justify-center relative transition-all duration-400">
              <span class="relative z-10">
                <svg class="text-white" xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
                  <text id="_" data-name="" transform="translate(0 14)" fill="currentColor" font-size="16.241" font-family="icofont, IcoFont" letter-spacing="0.015em"><tspan x="0" y="0"></tspan></text>
                </svg>
                
              </span>
            </a>
          </li>
          <li >
            <a href="contact-dark.html" class="mobile--menu__nav--item bg-accent1 w-11 h-11 rounded-full text-white flex items-center justify-center relative transition-all duration-400">
              <span class="relative z-10">
                <svg class="text-white" xmlns="http://www.w3.org/2000/svg" width="22" height="25" viewBox="0 0 22 25">
                  <text id="_" data-name=" " transform="translate(0 20)" fill="currentColor" font-size="16.241" font-family="icofont, IcoFont" letter-spacing="0.015em"><tspan x="0" y="0"></tspan><tspan y="0" font-size="18.896" font-family="SegoeUI, Segoe UI"> </tspan></text>
                </svg>
              </span>
            </a>
          </li>

        </ul>
      </nav>
    </div>
    <!-- Mobile Menu nav end -->

    <!-- Main wrapper start -->
    <main class="md:pb-[90px]">

      <!-- Breadcrumb section start -->
      <section class="pt-[70px] lg:pt-20">
        <div class="container mx-auto">
            <div class="text-center relative">
                <h1 class="text-[40px] only-md:text-[55px] lg:text-[70px] stroke-white	text-white font-heebo font-bold title-stroke opacity-[0.15] leading-[1] uppercase">Blog</h1>
                <span class="text-primary dark:text-white  text-[25px] only-md:text-[35px] lg:text-[40px] font-heebo font-extrabold absolute left-0 right-0 bottom-0 uppercase">Blog</span>
            </div>
        </div>
      </section>
      <!-- Breadcrumb section end -->
    

      <!-- Blog section start -->
      <section class="py-[70px] lg:py-[100px]" id="blog">
        <div class="container mx-auto">


          <div class="grid grid-cols-1 only-md:grid-cols-2 lg:grid-cols-3 gap-[30px]">

            
          <?php
// Assuming $blogData is an array containing blog post data
foreach ($blogData as $blogItem) {
    // Assuming you have the necessary data for each blog post
    $blogId = $blogItem['blog_id'];
    $blogTitle = $blogItem['blog_title'];
    $blogCover = $blogItem['blog_cover'];
    $createdAt = $blogItem['created_at'];
    $updatedAt = $blogItem['updated_at'];
    $blogGenre = $blogItem['blog_genre'];
    $blogTagline = $blogItem['blog_tagline'];
    
?>
    <!-- loop start here -->
    <div class="blog__card shadow-[0_0_50px_0_rgba(196,206,213,0.2)] hover:shadow-[0_0_100px_0_rgba(196,206,213,0.7)] dark:shadow-[0_0_20px_0_rgba(0,0,0,0.1)] dark:hover:shadow-[0_0_50px_0_rgba(0,0,0,0.2)] transition duration-500">
        <a class="block popup-modal--open" href="#">
            <!-- blog image -->
            <div class="overflow-hidden">
                <span class="block">
                    <img class="blog__thumb w-full transition duration-300" src="../blogCRUD/uploads/<?php echo $blogItem['blog_cover']; ?>" alt="">
                </span>
            </div>
            <!-- blog image end -->

            <!-- blog content -->
            <div class="p-[30px]">
                <div class="mb-[15px]">
                    <span class="bg-accent1_rgb text-[14px] uppercase py-1 px-[6px] text-accent1 dark:text-white dark:bg-accent1 hover:bg-accent1 hover:text-white transition-all duration-300">
                        <?php echo $blogGenre; ?>
                    </span>
                </div>
                <div>
                    <h3 class="text-[25px] leading-7 font-heebo font-bold">
                        <span class="text-primary hover:text-accent1 dark:text-white dark:hover:text-accent1 transition-all duration-300"> <a href="../blog/blog-details.php?blog_id=<?php echo $blogId; ?>"><?php echo $blogTitle; ?></a></span>
              
                    </h3>
                    <p class="mt-[15px] text-paragraph dark:text-slate-200 text-[17px]">
                        <?php echo $blogTagline; ?>
                    </p>
                </div>
            </div>
            <!-- blog content end -->
        </a>

        <!-- Blog popup start -->
        <!-- ... (remaining popup content) ... -->
        <!-- Blog popup end -->
    </div>
    <!-- loop end here -->
<?php } ?>

        

          </div>
        </div>          
      </section>
      <!-- Blog section end -->
      
    </main>
    <!-- Main wrapper end -->


  <!-------- Plugins js ------>

  <!-- Swiper js -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

  <!-- imagesloaded js -->
  <script src="../../assets/portfolio_assets/js/imagesloaded.pkgd.min.js" defer></script>

  <!-- Isotope js -->
  <script src="../../assets/portfolio_assets/js/isotope.pkgd.min.js" defer></script>

  <!-- Custom js -->
  <script src="../../assets/portfolio_assets/js/script.js" defer></script>

    <script>
      // On page load or when changing themes, best to add inline in `head` to avoid FOUC
      if (localStorage.getItem("theme-color") === "dark" || (!("theme-color" in localStorage) && window.matchMedia("(prefers-color-scheme: dark)").matches)) {
        document.getElementById("light__to--dark")?.classList.add("dark--version");
      } 
      if (localStorage.getItem("theme-color") === "light") {
        document.getElementById("light__to--dark")?.classList.remove("dark--version");
      } 
    </script>
  </body>
</html>