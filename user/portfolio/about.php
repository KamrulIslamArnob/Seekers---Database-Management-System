<?php
require_once '../../database/crud/DBConnection.php';

session_start();
if (!isset($_SESSION["username"])) {
  header("Location:http://localhost/Seekers---job-portal-using-php-tailwind-mysql/index.php");
} else if (isset($_SESSION["username"]) and $_SESSION["role"] == 'admin') {
  header("Location:http://localhost/Seekers---job-portal-using-php-tailwind-mysql/admin/dashboard-admin.php");
}

$dbConnection = new DBConnection(); // Create an instance of DBConnection
$conn = $dbConnection->conn; // Use the $conn property from the DBConnection instance

$userId = isset($_GET['$userId']) ? $_GET['$userId'] : $_SESSION['user_id'];

// Query to fetch data from the users table
$userSql = "SELECT
  u.id AS user_id,
  u.name,
  u.user_name,
  u.email,
  u.DOB,
  u.LastLogin,
  u.address,
  u.profile_picture,
  u.designation,
  u.about,
  u.phone,
  u.tagline,
  u.cv,
  u.Nationality,
  u.Freelance,
  u.Map_location,
  u.Facebook,
  u.Github,
  u.Linkedin,
  u.Whatsapp,
  u.experience_working
FROM
  users u
WHERE
  u.id = $userId";

$userResult = $conn->query($userSql);

if ($userResult->num_rows > 0) {
  // Fetch user data
  $userData = $userResult->fetch_assoc();
} else {
  echo "User not found";
  exit; // Exit if user not found
}

// Query to fetch language skills data
$languageSql = "SELECT
  l.language_id,
  l.language_name
FROM
  language_skills l
WHERE
  l.id = $userId";

$languageResult = $conn->query($languageSql);

if ($languageResult->num_rows > 0) {
  // Fetch language skills data
  $languageData = $languageResult->fetch_all(MYSQLI_ASSOC);

  // Extract language names into an array
  $languageNames = array_column($languageData, 'language_name');

  // Concatenate language names with a comma and space
  $concatenatedLanguages = implode(', ', $languageNames);
} else {
  $concatenatedLanguages = ''; // Set to an empty string if no language skills found
}



// Query to fetch experience data
$experienceSql = "SELECT
  e.experience_id,
  e.job_title,
  e.company,
  e.start_date AS experience_start_date,
  e.end_date AS experience_end_date,
  e.description AS experience_description
FROM
  experience e
WHERE
  e.id = $userId";

$experienceResult = $conn->query($experienceSql);

if ($experienceResult->num_rows > 0) {
  // Fetch experience data
  $experienceData = $experienceResult->fetch_all(MYSQLI_ASSOC);
  //print_r($experienceData);
} else {
  $experienceData = [];
}

// Query to fetch education data
$educationSql = "SELECT
  edu.edu_id,
  edu.name AS education_name,
  edu.degree AS education_degree,
  edu.city AS education_city,
  edu.start_date AS education_start_date,
  edu.end_date AS education_end_date,
  edu.Description AS education_description
FROM
  education edu
WHERE
  edu.user_id = $userId";

$educationResult = $conn->query($educationSql);

if ($educationResult->num_rows > 0) {
  // Fetch education data
  $educationData = $educationResult->fetch_all(MYSQLI_ASSOC);
 // print_r($educationData);
} else {
  $educationData = []; // Set to empty array if no education data found
}

// Query to fetch skills data
$skillsSql = "SELECT
  s.skill_id,
  s.skill_name,
  s.Skill_level
FROM
  skills s
WHERE
  s.user_id = $userId";

$skillsResult = $conn->query($skillsSql);

if ($skillsResult->num_rows > 0) {
  // Fetch skills data
  $skillsData = $skillsResult->fetch_all(MYSQLI_ASSOC);
} else {
  $skillsData = []; // Set to empty array if no skills data found
}

// Close the database connection
$conn->close();
?>

<!-- Now you can use the fetched data in your HTML/PHP code as needed -->




<!DOCTYPE html>
<html lang="en" class="scroll-smooth dark" dir="ltr">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title> Portfolio | Seekers </title>

  <link rel="shortcut icon" type="image/x-icon" href="../../assets/portfolio_assets/images/favicon.ico">

  <!-- Google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Heebo:wght@300;400;500;600;700;800;900&family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300&display=swap"
    rel="stylesheet">

  <!-- Plugins css -->
  <link rel="stylesheet" href="../../assets/portfolio_assets/css/mobilemenu.css" />
  <!-- <link rel="stylesheet" href="./assets/css/glightbox.min.css" /> -->
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
  <div
    class="fixed ltr:md:right-[15px] rtl:md:left-[15px] md:top-[15px] ltr:lg:right-[30px] rtl:lg:left-[30px] lg:top-[30px] z-50">
    <button
      class="dark--version bg-accent1 md:w-[45px] md:h-[45px] lg:w-[60px] lg:h-[60px] text-white flex justify-center items-center rounded-full shadow-[0_2px_5px_rgba(0,0,0,0.15)]"
      id="light__to--dark">
      <svg xmlns="http://www.w3.org/2000/svg" class="dark--mode__icon ionicon md:max-w-[20px] max-w-[25px] fill-white"
        viewBox="0 0 512 512">
        <title>Moon</title>
        <path
          d="M264 480A232 232 0 0132 248c0-94 54-178.28 137.61-214.67a16 16 0 0121.06 21.06C181.07 76.43 176 104.66 176 136c0 110.28 89.72 200 200 200 31.34 0 59.57-5.07 81.61-14.67a16 16 0 0121.06 21.06C442.28 426 358 480 264 480z" />
      </svg>

      <svg xmlns="http://www.w3.org/2000/svg"
        class="light--mode__icon ionicon md:max-w-[20px] lg:max-w-[25px] fill-white" viewBox="0 0 512 512">
        <title>Sunny</title>
        <path
          d="M256 118a22 22 0 01-22-22V48a22 22 0 0144 0v48a22 22 0 01-22 22zM256 486a22 22 0 01-22-22v-48a22 22 0 0144 0v48a22 22 0 01-22 22zM369.14 164.86a22 22 0 01-15.56-37.55l33.94-33.94a22 22 0 0131.11 31.11l-33.94 33.94a21.93 21.93 0 01-15.55 6.44zM108.92 425.08a22 22 0 01-15.55-37.56l33.94-33.94a22 22 0 1131.11 31.11l-33.94 33.94a21.94 21.94 0 01-15.56 6.45zM464 278h-48a22 22 0 010-44h48a22 22 0 010 44zM96 278H48a22 22 0 010-44h48a22 22 0 010 44zM403.08 425.08a21.94 21.94 0 01-15.56-6.45l-33.94-33.94a22 22 0 0131.11-31.11l33.94 33.94a22 22 0 01-15.55 37.56zM142.86 164.86a21.89 21.89 0 01-15.55-6.44l-33.94-33.94a22 22 0 0131.11-31.11l33.94 33.94a22 22 0 01-15.56 37.55zM256 358a102 102 0 11102-102 102.12 102.12 0 01-102 102z" />
      </svg>
    </button>

  </div>
  <!-- Dark and light button end -->

  <!-- Mobile Menu nav start -->
  <div
    class="md:block hidden fixed z-[98] bg-white dark:bg-dark_accent1 py-4 px-4 w-full mx-auto bottom-0 shadow-[0_0_25px_0_rgba(196,206,213,0.5)] dark:shadow-[-10px_0_20px_0_rgba(0,0,0,0.1)]">
    <nav>
      <ul class="flex justify-around items-center">
        <li>
          <a href="index.php"
            class="mobile--menu__nav--item bg-accent1 w-11 h-11 rounded-full text-white flex items-center justify-center relative transition-all duration-400">
            <span class="relative z-10">
              <svg width="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                <path
                  d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z" />
              </svg>
            </span>
          </a>
        </li>
        <li>
          <a href="about.php"
            class="mobile--menu__nav--item bg-accent1 w-11 h-11 rounded-full text-white flex items-center justify-center relative transition-all duration-400">
            <span class="relative z-10">
              <svg class="text-white" width="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 448 512">
                <path
                  d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0S96 57.3 96 128s57.3 128 128 128zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
              </svg>
            </span>
          </a>
        </li>
        <li>
          <a href="services.php"
            class="mobile--menu__nav--item bg-accent1 w-11 h-11 rounded-full text-white flex items-center justify-center relative transition-all duration-400">
            <span class="relative z-10">
              <svg class="text-white" width="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 512 512">
                <path
                  d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336c44.2 0 80-35.8 80-80s-35.8-80-80-80s-80 35.8-80 80s35.8 80 80 80z" />
              </svg>
            </span>
          </a>
        </li>
        <li>
          <a href="portfolio.php"
            class="mobile--menu__nav--item bg-accent1 w-11 h-11 rounded-full text-white flex items-center justify-center relative transition-all duration-400">
            <span class="relative z-10">
              <svg class="text-white" width="16" fill="currentColor" stroke="currentColor"
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path
                  d="M184 48H328c4.4 0 8 3.6 8 8V96H176V56c0-4.4 3.6-8 8-8zm-56 8V96H64C28.7 96 0 124.7 0 160v96H192 320 512V160c0-35.3-28.7-64-64-64H384V56c0-30.9-25.1-56-56-56H184c-30.9 0-56 25.1-56 56zM512 288H320v32c0 17.7-14.3 32-32 32H224c-17.7 0-32-14.3-32-32V288H0V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V288z" />
              </svg>
            </span>
          </a>
        </li>
        <li>
          <a href="blog.php"
            class="mobile--menu__nav--item bg-accent1 w-11 h-11 rounded-full text-white flex items-center justify-center relative transition-all duration-400">
            <span class="relative z-10">
              <svg class="text-white" width="16" fill="currentColor" stroke="currentColor"
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path
                  d="M446.6 222.7c-1.8-8-6.8-15.4-12.5-18.5-1.8-1-13-2.2-25-2.7-20.1-.9-22.3-1.3-28.7-5-10.1-5.9-12.8-12.3-12.9-29.5-.1-33-13.8-63.7-40.9-91.3-19.3-19.7-40.9-33-65.5-40.5-5.9-1.8-19.1-2.4-63.3-2.9-69.4-.8-84.8.6-108.4 10C45.9 59.5 14.7 96.1 3.3 142.9 1.2 151.7.7 165.8.2 246.8c-.6 101.5.1 116.4 6.4 136.5 15.6 49.6 59.9 86.3 104.4 94.3 14.8 2.7 197.3 3.3 216 .8 32.5-4.4 58-17.5 81.9-41.9 17.3-17.7 28.1-36.8 35.2-62.1 4.9-17.6 4.5-142.8 2.5-151.7zm-322.1-63.6c7.8-7.9 10-8.2 58.8-8.2 43.9 0 45.4.1 51.8 3.4 9.3 4.7 13.4 11.3 13.4 21.9 0 9.5-3.8 16.2-12.3 21.6-4.6 2.9-7.3 3.1-50.3 3.3-26.5.2-47.7-.4-50.8-1.2-16.6-4.7-22.8-28.5-10.6-40.8zm191.8 199.8l-14.9 2.4-77.5.9c-68.1.8-87.3-.4-90.9-2-7.1-3.1-13.8-11.7-14.9-19.4-1.1-7.3 2.6-17.3 8.2-22.4 7.1-6.4 10.2-6.6 97.3-6.7 89.6-.1 89.1-.1 97.6 7.8 12.1 11.3 9.5 31.2-4.9 39.4z" />
              </svg>
            </span>
          </a>
        </li>
        <li>
          <a href="contact.php"
            class="mobile--menu__nav--item bg-accent1 w-11 h-11 rounded-full text-white flex items-center justify-center relative transition-all duration-400">
            <span class="relative z-10">
              <svg class="text-white" width="16" fill="currentColor" stroke="currentColor"
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path
                  d="M96 0C60.7 0 32 28.7 32 64V448c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H96zM208 288h64c44.2 0 80 35.8 80 80c0 8.8-7.2 16-16 16H144c-8.8 0-16-7.2-16-16c0-44.2 35.8-80 80-80zm96-96c0 35.3-28.7 64-64 64s-64-28.7-64-64s28.7-64 64-64s64 28.7 64 64zM512 80c0-8.8-7.2-16-16-16s-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16V80zM496 192c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm16 144c0-8.8-7.2-16-16-16s-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16V336z" />
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
          <h1
            class="text-[40px] only-md:text-[55px] lg:text-[70px] stroke-white	text-white font-heebo font-bold title-stroke opacity-[0.15] leading-[1] uppercase">
            About Me</h1>
          <span
            class="text-primary dark:text-white text-[25px] only-md:text-[35px] lg:text-[40px] font-heebo font-extrabold absolute left-0 right-0 bottom-0 uppercase">
            About <span class="text-accent1">Me</span></span>
        </div>
      </div>
    </section>
    <!-- Breadcrumb section end -->

    <!-- About me section start -->
    <section
      class="dark:bg-dark_primary_bg py-[70px] lg:py-[100px] border-b-[1px] border-[#DDDDDD] dark:border-b dark:border-dark_accent1"
      id="about">
      <div class="container mx-auto">
        <div class="flex justify-between sm:flex-wrap sm:flex-col-reverse">
          <div class="w-full lg:max-w-[550px]">
            <div>
              <span class="text-accent1 text-[20px] lg:text-[24px] font-medium mb-[10px] lg:mb-[5px]">ABOUT ME</span>
              <h2
                class="text-[24px] only-md:text-[32px] lg:text-[48px] font-bold font-heebo leading-[36px] lg:leading-[58px] text-[#000248] dark:text-white ltr:lg:pr-[50px] rtl:lg:pl-[50px]">
                <?php echo $userData['tagline'] ?></h2>
            </div>
            <div class="mt-[30px]">
              <h3 class="text-accent1 text-[20px] lg:text-[24px] font-medium ">PERSONAL INFOS:</h3>
              <ul class="flex justify-between flex-wrap mt-[18px]">
                <li
                  class="text-paragraph dark:text-slate-200 w-full xs:max-w-[100%]  max-w-[50%] ltr:pl-[18px] rtl:pr-[18px] my-[10px] relative before:absolute before:content-[''] before:bg-accent1 before:w-[6px] before:h-[6px] ltr:before:left-0 rtl:before:right-0 before:top-[8px] before:rounded-full after:absolute after::content-[''] after:w-4 after:h-4 after:border-2 after:border-accent1 ltr:after:left-[-5px] rtl:after:right-[-5px] after:top-[3px] after:border-solid after:rounded-full text-[17px]">
                  Name: <?php echo $userData['name'] ?></li>



                <li
                  class="text-paragraph dark:text-slate-200 w-full xs:max-w-[100%]  max-w-[50%] ltr:pl-[18px] rtl:pr-[18px] my-[10px] relative before:absolute before:content-[''] before:bg-accent1 before:w-[6px] before:h-[6px] ltr:before:left-0 rtl:before:right-0 before:top-[8px] before:rounded-full after:absolute after::content-[''] after:w-4 after:h-4 after:border-2 after:border-accent1 ltr:after:left-[-5px] rtl:after:right-[-5px] after:top-[3px] after:border-solid after:rounded-full text-[17px]">
                  Address: <?php echo $userData['address'] ?></li>

                <li
                  class="text-paragraph dark:text-slate-200 w-full xs:max-w-[100%]  max-w-[50%] ltr:pl-[18px] rtl:pr-[18px] my-[10px] relative before:absolute before:content-[''] before:bg-accent1 before:w-[6px] before:h-[6px] ltr:before:left-0 rtl:before:right-0 before:top-[8px] before:rounded-full after:absolute after::content-[''] after:w-4 after:h-4 after:border-2 after:border-accent1 ltr:after:left-[-5px] rtl:after:right-[-5px] after:top-[3px] after:border-solid after:rounded-full text-[17px]">
                  Phone: <?php echo $userData['phone'] ?></li>



                <li
                  class="text-paragraph dark:text-slate-200 w-full xs:max-w-[100%]  max-w-[50%] ltr:pl-[18px] rtl:pr-[18px] my-[10px] relative before:absolute before:content-[''] before:bg-accent1 before:w-[6px] before:h-[6px] ltr:before:left-0 rtl:before:right-0 before:top-[8px] before:rounded-full after:absolute after::content-[''] after:w-4 after:h-4 after:border-2 after:border-accent1 ltr:after:left-[-5px] rtl:after:right-[-5px] after:top-[3px] after:border-solid after:rounded-full text-[17px]">
                  Email: <?php echo $userData['email'] ?></li>

                <li
                  class="text-paragraph dark:text-slate-200 w-full xs:max-w-[100%]  max-w-[50%] ltr:pl-[18px] rtl:pr-[18px] my-[10px] relative before:absolute before:content-[''] before:bg-accent1 before:w-[6px] before:h-[6px] ltr:before:left-0 rtl:before:right-0 before:top-[8px] before:rounded-full after:absolute after::content-[''] after:w-4 after:h-4 after:border-2 after:border-accent1 ltr:after:left-[-5px] rtl:after:right-[-5px] after:top-[3px] after:border-solid after:rounded-full text-[17px]">
                  Nationality: <?php echo $userData['Nationality'] ?></li>



                <li
                  class="text-paragraph dark:text-slate-200 w-full xs:max-w-[100%]  max-w-[50%] ltr:pl-[18px] rtl:pr-[18px] my-[10px] relative before:absolute before:content-[''] before:bg-accent1 before:w-[6px] before:h-[6px] ltr:before:left-0 rtl:before:right-0 before:top-[8px] before:rounded-full after:absolute after::content-[''] after:w-4 after:h-4 after:border-2 after:border-accent1 ltr:after:left-[-5px] rtl:after:right-[-5px] after:top-[3px] after:border-solid after:rounded-full text-[17px]">
                  Freelance: <?php echo $userData['Freelance'] ?></li>

                <li
                  class="text-paragraph dark:text-slate-200 w-full xs:max-w-[100%]  max-w-[50%] ltr:pl-[18px] rtl:pr-[18px] my-[10px] relative before:absolute before:content-[''] before:bg-accent1 before:w-[6px] before:h-[6px] ltr:before:left-0 rtl:before:right-0 before:top-[8px] before:rounded-full after:absolute after::content-[''] after:w-4 after:h-4 after:border-2 after:border-accent1 ltr:after:left-[-5px] rtl:after:right-[-5px] after:top-[3px] after:border-solid after:rounded-full text-[17px]">
                  Languages: <?php echo $concatenatedLanguages ?></li></li>
              </ul>
              <a href="contact.php" class="btn solid-btn text-accent1 mt-[35px] inline-block">Hire Me</a>
            </div>
          </div>
          <div class="sm:mb-[50px]">
            <div class="relative">
              <img class="relative z-10 sm:mx-auto" src="../../<?php echo $userData['profile_picture'] ?>" alt="">
              <span
                class="absolute sm:w-[100px] sm:h-[100px] only-md:w-[150px] only-md:h-[150px] lg:w-[200px] lg:h-[200px] xl:w-[250px] xl:h-[250px] border-[8px] lg:border-[13px] border-accent1 rounded-full xs:bottom-[-25%] sm:bottom-[-12%] bottom-[-18%] ltr:sm:left-[3%] ltr:left-[-18%] rtl:sm:right-[3%] rtl:right-[-18%] animateUpDown"></span>
            </div>
            <div class="text-center mt-[30px]">
              <h4 class="font-heebo text-[50px] lg:text-[80px] font-bold leading-[1] text-white title-stroke"> <?php echo $userData['experience_working'] ?>+</h4>
              <span
                class="font-bold sm:text-[20px] only-md:text-[24px] lg:text-[30px] font-heebo text-primary dark:text-white">Years of Experience
      </span>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- About me section end -->

    <!--  Resume section start -->
    <section class="lg:py-[100px] md:py-[70px]">
      <div class="container mx-auto">
        <!-- Section title start -->
        <div class="flex justify-between items-center gap-[20px] lg:gap-[30px] mb-[55px] md:flex-wrap md:text-center">
          <div class="max-w-full lg:max-w-[575px]  w-full">
            <span class="text-accent1 text-[20px] lg:text-[24px] font-medium mb-[10px] lg:mb-[5px]">EXPERICNCE AND
              EDUCATION</span>
            <h2
              class="text:[28px] lg:text-[48px] font-bold font-heebo leading-[36x] lg:leading-[58px] text-[#000248] dark:text-white">
              Resume of Experience
              and Education
            </h2>
          </div>

        </div>
        <!-- Section title end -->

        <!-- Resume wrapper start -->
        <div class="flex flex-wrap">

          <!-- Skill -->
          <div class="w-full max-w-[50%] sm:max-w-full flex-grow">
            <div class="relative ltr:pl-[30px] rtl:pr-[30px]">
              <!-- border line -->
              <div class="absolute w-[1px] ltr:left-0 rtl:right-0 top-[10px] bottom-[5px] bg-accent1"></div>
             

              <?php foreach ($experienceData as $experience): ?>
                <div
                  class="flex ltr:pr-[50px] ltr:sm:pr-[0] ltr:lg:pr-[70px rtl:pl-[50px] rtl:sm:pl-[0] rtl:lg:pl-[70px relative">
                  <span
                    class="absolute w-[20px] h-[20px] ltr:left-[-40px] rtl:right-[-40px] top-[10px] bg-accent1 rounded-full z-10 before:absolute before:bg-white before:w-[16px] before:h-[16px] before:rounded-full ltr:before:left-[2px] rtl:before:right-[2px] before:top-[2px]"></span>
                  <div class="w-[70px] h-[70px]">
                    <span class="w-[50px] h-[50px] bg-accent1 text-white flex items-center rounded-full justify-center">
                      <svg width="25" height="40" fill="currentColor" stroke="currentColor"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path
                          d="M184 48H328c4.4 0 8 3.6 8 8V96H176V56c0-4.4 3.6-8 8-8zm-56 8V96H64C28.7 96 0 124.7 0 160v96H192 320 512V160c0-35.3-28.7-64-64-64H384V56c0-30.9-25.1-56-56-56H184c-30.9 0-56 25.1-56 56zM512 288H320v32c0 17.7-14.3 32-32 32H224c-17.7 0-32-14.3-32-32V288H0V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V288z" />
                      </svg>
                    </span>
                  </div>
                  <div class="flex-grow ltr:pl-[15px] rtl:pr-[15px]">
                    <div class="flex items-center only-md:flex-col only-md:items-start 2xs:flex-col 2xs:items-start">
                      <h3 class="font-heebo 2xs:text-[18px] text-[20px] lg:text-[25px] text-primary dark:text-white">
                        <?= $experience['job_title'] ?>
                      </h3>
                      <span
                        class="bg-accent1 text-white text-[13px] rounded-[30px] px-[15px] py-[5px] uppercase ltr:ml-[15px] rtl:mr-[15px] ltr:only-md:ml-0 only-md:my-[5px] ltr:2xs:ml-0 rtl:only-md:m-0 rtl:2xs:mr-0 2xs:my-[5px] text-center">
                        <?= $experience['company'] ?>
                      </span>
                    </div>
                    <p class="text-paragraph dark:text-slate-200 mt-[10px] text-[17px]">
                      <?= $experience['experience_description'] ?>
                    </p>
                    <span
                      class="text-[17px] font-medium text-accent1 relative ltr:pl-[20px] rtl:pr-[20px] before:absolute before:bg-accent1 before:w-[7px] before:h-[7px] ltr:before:left-0 rtl:before:right-0 before:top-[50%] before:translate-y-[-50%] mt-[20px] block">
                      <?= $experience['experience_start_date'] ?>
                    </span>
                  </div>
                </div>
              <?php endforeach; ?>


              <!-- ------------------------------------------------------------------------- -->
              <!-- loop end  -->



            </div>
          </div>


          <!-- Education -->
          <div class="w-full max-w-[50%] sm:max-w-full flex-grow  sm:mt-[40px]">
            <div class="relative ltr:pl-[30px] rtl:pr-[30px]">
              <!-- border line -->
              <div class="absolute w-[1px] ltr:left-0 rtl:right-0 top-[10px] bottom-[5px] bg-accent1"></div>
              


              <?php foreach ($educationData as $education): ?>
                <div
                  class="flex ltr:pr-[50px] ltr:sm:pr-[0] ltr:lg:pr-[70px rtl:pl-[50px] rtl:sm:pl-[0] rtl:lg:pl-[70px relative">
                  <span
                    class="absolute w-[20px] h-[20px] ltr:left-[-40px] rtl:right-[-40px] top-[10px] bg-accent1 rounded-full z-10 before:absolute before:bg-white before:w-[16px] before:h-[16px] before:rounded-full ltr:before:left-[2px] rtl:before:right-[2px] before:top-[2px]"></span>
                  <div class="w-[70px] h-[70px]">
                    <span class="w-[50px] h-[50px] bg-accent1 text-white flex items-center rounded-full justify-center">
                      <svg width="25" height="44" fill="currentColor" stroke="currentColor"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                        <path
                          d="M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9v28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5V291.9c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496.7 262.6 354.5 314c-11.1 4-22.8 6-34.5 6s-23.5-2-34.5-6L143.3 262.6 128 408z" />
                      </svg>
                    </span>
                  </div>
                  <div class="flex-grow ltr:pl-[15px] rtl:pr-[15px]">
                    <div class="flex items-center only-md:flex-col only-md:items-start 2xs:flex-col 2xs:items-start">
                      <h3 class="font-heebo 2xs:text-[18px] text-[20px] lg:text-[25px] text-primary dark:text-white">
                        <?= $education['education_name'] ?>
                      </h3>
                      <span
                        class="bg-accent1 text-white text-[13px] rounded-[30px] px-[15px] py-[5px] uppercase ltr:ml-[15px] rtl:mr-[15px] ltr:only-md:ml-0 only-md:my-[5px] ltr:2xs:ml-0 rtl:only-md:m-0 rtl:2xs:mr-0 2xs:my-[5px] text-center">
                        <?= $education['education_degree'] ?>
                      </span>
                    </div>
                    <p class="text-paragraph dark:text-slate-200 mt-[10px] text-[17px]">
                      <?= $education['education_description'] ?>
                    </p>
                    <span
                      class="text-[17px] font-medium text-accent1 relative ltr:pl-[20px] rtl:pr-[20px] before:absolute before:bg-accent1 before:w-[7px] before:h-[7px] ltr:before:left-0 rtl:before:right-0 before:top-[50%] before:translate-y-[-50%] mt-[20px] block">
                      <?= $education['education_start_date'] ?>
                    </span>
                  </div>
                </div>
              <?php endforeach; ?>



              <!-- ================== -->

              <!-- loop end  -->
              <!-- Single resume end -->





            </div>
          </div>
          <!-- Education -->
        </div>
        <!-- Resume wrapper end -->
      </div>
    </section>
    <!--  Resume section end -->

    <!--  Skill section start -->
    <section class="lg:pb-[100px] md:pb-[70px]">
      <div class="container mx-auto">
        <!-- Section title start -->
        <div class="flex justify-between items-center gap-[20px] lg:gap-[30px] mb-[55px] md:flex-wrap md:text-center">
          <div class="max-w-full lg:max-w-[575px]  w-full">
            <span class="text-accent1 text-[20px] lg:text-[24px] font-medium mb-[10px] lg:mb-[5px]">SKILLs</span>
            <h2
              class="text:[28px] lg:text-[48px] font-bold font-heebo leading-[36x] lg:leading-[58px] text-[#000248] dark:text-white">
              Skill of Best Masters
              Software Skills.
            </h2>
          </div>
          <div class="md:grow">
            
          </div>
        </div>
        <!-- Section title end -->

        <!-- Resume wrapper start -->
        <div class="flex justify-between items-center gap-[20px] lg:gap-[30px] md:flex-wrap md:text-center">

<?php
$count = 0; // Initialize a counter to track the number of skills in a row
foreach ($skillsData as $skill):
    // Start a new row for every 3 skills
    if ($count % 3 === 0): ?>
        <div class="max-w-full lg:max-w-[472px] w-full only-md:px-7 sm:px-5">
    <?php endif; ?>

    <div class="relative mb-7">
        <div class="flex justify-between mb-1">
            <span class="text-lg font-medium text-primary dark:text-white"><?= $skill['skill_name'] ?></span>
            <span class="text-xs font-medium text-white bg-accent1 dark:text-white absolute py-1.5 px-1.5 bottom-6 rounded-sm before:absolute before:content-[''] before:bg-accent1 before:w-5 before:h-5 before:clip-polygon before:top-4 ltr:before:left-2 rtl:before:right-2 before:-z-10 ltr:left-[calc(60%_-_20px)] rtl:right-[calc(60%_-_20px)]"><?= $skill['Skill_level'] ?>%</span>
        </div>
        <div class="w-full bg-gray-200 rounded-full h-[10px] dark:bg-gray-700 flex items-center">
            <div class="bg-accent1 h-[6px] rounded-full mx-[2px]" style="width: <?= $skill['Skill_level'] ?>%"></div>
        </div>
    </div>

    <?php
    $count++; // Increment the counter
    // Close the row div for every 3 skills
    if ($count % 3 === 0): ?>
        </div>
    <?php endif; ?>

<?php endforeach; ?>

</div>




      </div>


      </div>
      <!-- Resume wrapper end -->
      </div>
    </section>
    <!--  Skill section end -->

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