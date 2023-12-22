<?php

require_once '../../database/crud/DBConnection.php';

session_start();
// if (!isset($_SESSION["username"])) {
//   header("Location:http://localhost/Seekers---job-portal-using-php-tailwind-mysql/index.php");
// } else if (isset($_SESSION["username"]) and $_SESSION["role"] == 'admin') {
//   header("Location:http://localhost/Seekers---job-portal-using-php-tailwind-mysql/admin/dashboard-admin.php");
// }

$dbConnection = new DBConnection(); // Create an instance of DBConnection
$conn = $dbConnection->conn; // Use the $conn property from the DBConnection instance

$userId = isset($_GET['$userId']) ? $_GET['$userId'] : $_SESSION['user_id'];


$sql = "SELECT
    u.id,
    u.name,
    u.user_name,
    u.email,
    u.email_verified_at,
    u.password,
    u.role,
    u.status,
    u.remember_token,
    u.created_at,
    u.updated_at,
    u.DOB,
    u.LastLogin,
    u.address,
    u.profile_picture,
    u.designation,
    u.phone,
    u.tagline,
    u.cv,
    u.Nationality,
    u.Freelance,
    u.map_location,
    GROUP_CONCAT(DISTINCT s.skill_name) AS skills,
    GROUP_CONCAT(DISTINCT ls.language_name) AS languages,
    p.project_id,
    p.project_name,
    p.description AS project_description,
    p.project_link,
    e.experience_id,
    e.job_title,
    e.company,
    e.start_date AS experience_start_date,
    e.end_date AS experience_end_date,
    e.description AS experience_description,
    edu.edu_id,
    edu.name AS education_name,
    edu.degree,
    edu.city,
    edu.start_date AS education_start_date,
    edu.end_date AS education_end_date,
    edu.description AS education_description
FROM
    users u
LEFT JOIN skills s ON u.id = s.skill_id
LEFT JOIN projects p ON u.id = p.id
LEFT JOIN language_skills ls ON u.id = ls.id
LEFT JOIN experience e ON u.id = e.id
LEFT JOIN education edu ON u.id = edu.edu_id
WHERE
    u.id = $userId
GROUP BY
    u.id, u.name, u.user_name, u.email, u.email_verified_at, u.password,
    u.role, u.status, u.remember_token, u.created_at, u.updated_at,
    u.DOB, u.LastLogin, u.address, u.profile_picture, u.designation, u.phone,
    u.tagline, u.cv, u.Nationality, u.Freelance, u.map_location,
    p.project_id, p.project_name, p.description, p.project_link, e.experience_id, e.job_title, e.company, e.start_date, e.end_date, e.description,
    edu.edu_id,edu.name, edu.degree, edu.city, edu.start_date, edu.end_date, edu.description;

";


$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // it has all the data based on user id
  $user = $result->fetch_assoc();

} else {
  echo "User not found";
}

$conn->close();

?>




<!DOCTYPE html>
<html lang="en" class="scroll-smooth dark" dir="ltr">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Portfolio</title>

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

  <!-- Preloader start -->
  <div id="preloader">
    <div class="loader--border"></div>
  </div>
  <!-- Preloader end -->

  <!-- Mobile Menu nav start -->
  <div
    class="md:block hidden fixed z-[98] bg-white dark:bg-dark_accent1 py-4 px-4 w-full mx-auto bottom-0 shadow-[0_0_25px_0_rgba(196,206,213,0.5)] dark:shadow-[-10px_0_20px_0_rgba(0,0,0,0.1)]">
    <nav>
      <ul class="flex justify-around items-center">
        <li>
          <a href="index-2-dark.html"
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
          <a href="about-dark.html"
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
          <a href="services-dark.html"
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
          <a href="portfolio-dark.html"
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
          <a href="blog-dark.html"
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
          <a href="contact-dark.html"
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

  <div
    class="h-full bg-[url('../images/hero-bg-img.png')] bg-cover bg-no-repeat bg-center bg-[#DAEEF1] dark:bg-[url('../images/home2-hero-bg-dark.png')] dark:bg-dark_primary_bg md:pb-[90px]">
    <!-- Header area start -->
    <header class="absolute w-full left-0 top-0 py-7">
      <div class="container mx-auto">
        <div class="flex justify-between items-center">
          <div class="logo">
            <a href="../dashboard-user.php"><b class="lg:text-[60px] only-md:text-[40px] sm:text-[28px] font-bold font-heebo text-heading dark:text-white">Portfolio.</b></a>
          </div>
          <div class="block">
            <button
              class="dark--version bg-accent1 w-[50px] h-[50px] text-white flex justify-center items-center rounded-full"
              id="light__to--dark">
              <svg xmlns="http://www.w3.org/2000/svg" class="dark--mode__icon ionicon max-w-[25px] fill-white"
                viewBox="0 0 512 512">
                <title>Moon</title>
                <path
                  d="M264 480A232 232 0 0132 248c0-94 54-178.28 137.61-214.67a16 16 0 0121.06 21.06C181.07 76.43 176 104.66 176 136c0 110.28 89.72 200 200 200 31.34 0 59.57-5.07 81.61-14.67a16 16 0 0121.06 21.06C442.28 426 358 480 264 480z" />
              </svg>

              <svg xmlns="http://www.w3.org/2000/svg" class="light--mode__icon ionicon max-w-[25px] fill-white"
                viewBox="0 0 512 512">
                <title>Sunny</title>
                <path
                  d="M256 118a22 22 0 01-22-22V48a22 22 0 0144 0v48a22 22 0 01-22 22zM256 486a22 22 0 01-22-22v-48a22 22 0 0144 0v48a22 22 0 01-22 22zM369.14 164.86a22 22 0 01-15.56-37.55l33.94-33.94a22 22 0 0131.11 31.11l-33.94 33.94a21.93 21.93 0 01-15.55 6.44zM108.92 425.08a22 22 0 01-15.55-37.56l33.94-33.94a22 22 0 1131.11 31.11l-33.94 33.94a21.94 21.94 0 01-15.56 6.45zM464 278h-48a22 22 0 010-44h48a22 22 0 010 44zM96 278H48a22 22 0 010-44h48a22 22 0 010 44zM403.08 425.08a21.94 21.94 0 01-15.56-6.45l-33.94-33.94a22 22 0 0131.11-31.11l33.94 33.94a22 22 0 01-15.55 37.56zM142.86 164.86a21.89 21.89 0 01-15.55-6.44l-33.94-33.94a22 22 0 0131.11-31.11l33.94 33.94a22 22 0 01-15.56 37.55zM256 358a102 102 0 11102-102 102.12 102.12 0 01-102 102z" />
              </svg>
            </button>

          </div>
        </div>
      </div>
    </header>
    <!-- Header area end -->

    <!-- Main wrapper start -->
    <main>
      <!-- Hero section start -->
      <section class="h-full lg:min-h-screen flex justify-center items-center overflow-hidden" id="home">
        <div
          class="container mx-auto flex sm:flex-col items-center justify-center  sm:pt-[120px] only-md:pt-[150px] md:pb-[50px] lg:pt-[165px] lg:pb-[100px] sm:pb-[70px]">

          <!-- Profile content and nav start -->
          <div
            class="flex items-center ltr:xl:pl-[65px] ltr:lg:pl-[50px] ltr:only-md:pl-[40px] rtl:xl:pr-[65px] rtl:lg:pr-[50px] rtl:only-md:pr-[40px] flex-grow sm:mt-[30px] sm:text-center">

            <!-- profile content start -->
            <div class="grow">
              <span class="text-accent1 text-[24px] font-semibold italic pb-[5px]">HELLO I'M</span>
              <h2
                class="lg:text-[60px] only-md:text-[40px] sm:text-[28px] font-bold font-heebo text-heading dark:text-white">

                <?php echo $user['name']; ?>

              </h2>
              <h3 class="font-heebo font-normal text-primary dark:text-white">
                <?php echo $user['tagline']; ?>

              </h3>
              <p class="lg:text-[20px] md:text-[16px] text-paragraph dark:text-slate-200 lg:mt-[18px] md:mt-[15px]">
                There are many variations of sum availabled <br> in alley of type and scrambled it some.</p>
              <div class="mt-7">
                <button
                  class="sm:mx-auto flex bg-accent1 lg:px-[15px] px-[12px] xl:py-[12px] py-[10px] rounded-[2rem] text-[16px] xl:text-[18px] font-medium text-white items-center transition duration-300 relative after:absolute :after:content-[''] after:bg-primary after:h-full after:w-full after:bottom-0 after:left-0 after:rounded-[2rem] after:trasition after:duration-300 after:opacity-0 hover:after:opacity-[1]">
                  <span
                    class="icon bg-[#EFEBEB] text-accent1 w-[34px] h-[34px] rounded-full flex items-center justify-center ltr:xl:mr-[15px] ltr:mr-[10px] rtl:xl:ml-[15px] rtl:ml-[10px] relative z-[8] flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="feather feather-download">
                      <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                      <polyline points="7 10 12 15 17 10"></polyline>
                      <line x1="12" y1="15" x2="12" y2="3"></line>
                    </svg>
                  </span>
                  <span
                    class="ltr:xl:pr-[5px] ltr:lg:pr-[5px] rtl:xl:pl-[5px] rtl:lg:pl-[5px] relative z-[8] flex-shrink-0">Download
                    CV</span>
                </button>

              </div>
              <div class="gap-[18px] flex-wrap mt-[30px] sm:justify-center">
                <div class="flex items-center flex-wrap gap-[15px] sm:justify-center">
                  <span
                    class="font-heebo lg:text-[22px] md:text-[18px] font-semibold shrink-0 text-primary dark:text-white">Follow
                    Me: </span>
                  <div class="flex items-center">
                    <a href="#"
                      class="w-[30px] h-[30px] flex items-center justify-center text-accent1 border border-accent1 transition duration-300 hover:bg-accent1 hover:text-white rounded-full">
                      <svg fill="currentColor" stroke="currentColor" width="13" height="14"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                        <path
                          d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z" />
                      </svg>
                    </a>
                    <a href="#"
                      class="w-[30px] h-[30px] flex items-center justify-center text-accent1 border border-accent1 transition duration-300 hover:bg-accent1 hover:text-white rounded-full ltr:ml-[10px] rtl:mr-[10px]">
                      <svg fill="currentColor" stroke="currentColor" width="13" height="14"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                        <path
                          d="M204 6.5C101.4 6.5 0 74.9 0 185.6 0 256 39.6 296 63.6 296c9.9 0 15.6-27.6 15.6-35.4 0-9.3-23.7-29.1-23.7-67.8 0-80.4 61.2-137.4 140.4-137.4 68.1 0 118.5 38.7 118.5 109.8 0 53.1-21.3 152.7-90.3 152.7-24.9 0-46.2-18-46.2-43.8 0-37.8 26.4-74.4 26.4-113.4 0-66.2-93.9-54.2-93.9 25.8 0 16.8 2.1 35.4 9.6 50.7-13.8 59.4-42 147.9-42 209.1 0 18.9 2.7 37.5 4.5 56.4 3.4 3.8 1.7 3.4 6.9 1.5 50.4-69 48.6-82.5 71.4-172.8 12.3 23.4 44.1 36 69.3 36 106.2 0 153.9-103.5 153.9-196.8C384 71.3 298.2 6.5 204 6.5z" />
                      </svg>
                    </a>
                    <a href="#"
                      class="w-[30px] h-[30px] flex items-center justify-center text-accent1 border border-accent1 transition duration-300 hover:bg-accent1 hover:text-white rounded-full ltr:ml-[10px] rtl:mr-[10px]">
                      <svg fill="currentColor" stroke="currentColor" width="13" height="14"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path
                          d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z" />
                      </svg>
                    </a>
                    <a href="#"
                      class="w-[30px] h-[30px] flex items-center justify-center text-accent1 border border-accent1 transition duration-300 hover:bg-accent1 hover:text-white rounded-full ltr:ml-[10px] rtl:mr-[10px]">
                      <svg fill="currentColor" stroke="currentColor" width="13" height="14"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path
                          d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                      </svg>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <!-- profile content end -->

            <!-- Menu nav start -->
            <div class="md:hidden">
              <nav>
                <ul>
                  <li>
                    <a href="index.php?$userId=<?php echo $userId; ?>"
                      class="menu__nav--item bg-accent1 w-11 h-11 rounded-full text-white flex items-center justify-center relative transition-all duration-400">
                      <span class="relative z-10">
                        <svg width="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                          <path
                            d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z" />
                        </svg>
                      </span>
                      <span
                        class="absolute bg-accent1 h-11 rounded-[30px] ltr:rounded-tr-none ltr:rounded-br-none rtl:rounded-tl-none rtl:rounded-bl-none py-[13px] px-7 flex items-center font-bold ltr:right-3 rtl:left-3 transition-all duration-300 opacity-0 font-heebo text-[16px] invisible">HOME</span>
                    </a>
                  </li>

                  <li class="mt-5">
                    <a href="about.php?$userId=<?php echo $userId; ?>"
                      class="menu__nav--item bg-white w-11 h-11 rounded-full text-white flex items-center justify-center relative transition-all duration-400">
                      <span class="relative z-10">
                        <svg class="text-accent1" width="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 448 512">
                          <path
                            d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0S96 57.3 96 128s57.3 128 128 128zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                        </svg>
                      </span>
                      <span
                        class="absolute bg-accent1 h-11 rounded-[30px] ltr:rounded-tr-none ltr:rounded-br-none rtl:rounded-tl-none rtl:rounded-bl-none py-[13px] px-7 flex items-center font-bold ltr:right-3 rtl:left-3 transition-all duration-300 opacity-0 font-heebo text-[16px] invisible">ABOUT</span>
                    </a>
                  </li>
                  <li class="mt-5">
                    <a href="services.php?$userId=<?php echo $userId; ?>"
                      class="menu__nav--item bg-white w-11 h-11 rounded-full text-white flex items-center justify-center relative transition-all duration-400">
                      <span class="relative z-10">
                        <svg class="text-accent1" width="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 512 512">
                          <path
                            d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336c44.2 0 80-35.8 80-80s-35.8-80-80-80s-80 35.8-80 80s35.8 80 80 80z" />
                        </svg>
                      </span>
                      <span
                        class="absolute bg-accent1 h-11 rounded-[30px] ltr:rounded-tr-none ltr:rounded-br-none rtl:rounded-tl-none rtl:rounded-bl-none py-[13px] px-7 flex items-center font-bold ltr:right-3 rtl:left-3 transition-all duration-300 opacity-0 font-heebo text-[16px] invisible">SERVICES</span>
                    </a>
                  </li>
                  <li class="mt-5">
                    <a href="portfolio.php?$userId=<?php echo $userId; ?>"
                      class="menu__nav--item bg-white w-11 h-11 rounded-full text-white flex items-center justify-center relative transition-all duration-400">
                      <span class="relative z-10">
                        <svg class="text-accent1" width="16" fill="currentColor" stroke="currentColor"
                          xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                          <path
                            d="M184 48H328c4.4 0 8 3.6 8 8V96H176V56c0-4.4 3.6-8 8-8zm-56 8V96H64C28.7 96 0 124.7 0 160v96H192 320 512V160c0-35.3-28.7-64-64-64H384V56c0-30.9-25.1-56-56-56H184c-30.9 0-56 25.1-56 56zM512 288H320v32c0 17.7-14.3 32-32 32H224c-17.7 0-32-14.3-32-32V288H0V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V288z" />
                        </svg>
                      </span>
                      <span
                        class="absolute bg-accent1 h-11 rounded-[30px] ltr:rounded-tr-none ltr:rounded-br-none rtl:rounded-tl-none rtl:rounded-bl-none py-[13px] px-7 flex items-center font-bold ltr:right-3 rtl:left-3 transition-all duration-300 opacity-0 font-heebo text-[16px] invisible">PORTFOLIO</span>
                    </a>
                  </li>
                  <li class="mt-5">
                    <a href="blog.php?$userId=<?php echo $userId; ?>"
                      class="menu__nav--item bg-white w-11 h-11 rounded-full text-white flex items-center justify-center relative transition-all duration-400">
                      <span class="relative z-10">
                        <svg class="text-accent1" width="16" fill="currentColor" stroke="currentColor"
                          xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                          <path
                            d="M446.6 222.7c-1.8-8-6.8-15.4-12.5-18.5-1.8-1-13-2.2-25-2.7-20.1-.9-22.3-1.3-28.7-5-10.1-5.9-12.8-12.3-12.9-29.5-.1-33-13.8-63.7-40.9-91.3-19.3-19.7-40.9-33-65.5-40.5-5.9-1.8-19.1-2.4-63.3-2.9-69.4-.8-84.8.6-108.4 10C45.9 59.5 14.7 96.1 3.3 142.9 1.2 151.7.7 165.8.2 246.8c-.6 101.5.1 116.4 6.4 136.5 15.6 49.6 59.9 86.3 104.4 94.3 14.8 2.7 197.3 3.3 216 .8 32.5-4.4 58-17.5 81.9-41.9 17.3-17.7 28.1-36.8 35.2-62.1 4.9-17.6 4.5-142.8 2.5-151.7zm-322.1-63.6c7.8-7.9 10-8.2 58.8-8.2 43.9 0 45.4.1 51.8 3.4 9.3 4.7 13.4 11.3 13.4 21.9 0 9.5-3.8 16.2-12.3 21.6-4.6 2.9-7.3 3.1-50.3 3.3-26.5.2-47.7-.4-50.8-1.2-16.6-4.7-22.8-28.5-10.6-40.8zm191.8 199.8l-14.9 2.4-77.5.9c-68.1.8-87.3-.4-90.9-2-7.1-3.1-13.8-11.7-14.9-19.4-1.1-7.3 2.6-17.3 8.2-22.4 7.1-6.4 10.2-6.6 97.3-6.7 89.6-.1 89.1-.1 97.6 7.8 12.1 11.3 9.5 31.2-4.9 39.4z" />
                        </svg>
                      </span>
                      <span
                        class="absolute bg-accent1 h-11 rounded-[30px] ltr:rounded-tr-none ltr:rounded-br-none rtl:rounded-tl-none rtl:rounded-bl-none py-[13px] px-7 flex items-center font-bold ltr:right-3 rtl:left-3 transition-all duration-300 opacity-0 font-heebo text-[16px] invisible">BLOG</span>
                    </a>
                  </li>
                  <li class="mt-5">
                    <a href="contact.php?$userId=<?php echo $userId; ?>"
                      class="menu__nav--item bg-white w-11 h-11 rounded-full text-white flex items-center justify-center relative transition-all duration-400">
                      <span class="relative z-10">
                        <svg class="text-accent1" width="16" fill="currentColor" stroke="currentColor"
                          xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                          <path
                            d="M96 0C60.7 0 32 28.7 32 64V448c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H96zM208 288h64c44.2 0 80 35.8 80 80c0 8.8-7.2 16-16 16H144c-8.8 0-16-7.2-16-16c0-44.2 35.8-80 80-80zm96-96c0 35.3-28.7 64-64 64s-64-28.7-64-64s28.7-64 64-64s64 28.7 64 64zM512 80c0-8.8-7.2-16-16-16s-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16V80zM496 192c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm16 144c0-8.8-7.2-16-16-16s-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16V336z" />
                        </svg>
                      </span>
                      <span
                        class="absolute bg-accent1 h-11 rounded-[30px] ltr:rounded-tr-none ltr:rounded-br-none rtl:rounded-tl-none rtl:rounded-bl-none py-[13px] px-7 flex items-center font-bold ltr:right-3 rtl:left-3 transition-all duration-300 opacity-0 font-heebo text-[16px] invisible">CONTACT</span>
                    </a>
                  </li>

                </ul>
              </nav>
            </div>
            <!-- Menu nav end -->

          </div>
          <!-- Profile content and nav end -->

          <!-- Profile media start -->
          <div class="max-w-[405px] order-first">
            <div
              class="relative after:bg-white after:w-full after:bottom-0 after:left-0 after:content[''] after:h-[75%] after:absolute after:rounded-xl">
              <!-- Profile image start -->
              <div class="text-center pb-6 relative z-10 sm:px-4 lg:px-11">
                <div class="pb-5">
                  <img
                    class="md:w-[250px] md:h-[250px] lg:w-[290px] lg:h-[290px] rounded-full mx-auto border border-accent1 p-1"
                    src="
                    <?php
                      echo "../".$user['profile_picture'];
                      ?>
                    " alt="">
                </div>
                <h4 class="text-primary">
                  <?php echo $user['name']; ?>
                </h4>
                <span>
                  <?php echo $user['designation']; ?>
                </span>
              </div>
              <!-- Profile image end -->

              <!-- Profile contact info  start -->
              <div class="border-t border-[#ddd] py-6 px-12 z-10 relative">
                <!-- Single contact start -->
                <div class="flex items-center">
                  <span
                    class="border border-accent1 text-accent1 w-9 h-9 rounded-full flex items-center justify-center">
                    <svg class="max-w-5" width="16" height="34" fill="currentColor" stroke="currentColor"
                      xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                      <path
                        d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z" />
                    </svg>
                  </span>
                  <span class="ltr:pl-4 rtl:pr-4 text-[18px]">
                    <a class="hover:text-accent1">+880
                      <?php echo $user['phone']; ?>
                    </a>
                  </span>
                </div>
                <!-- Single contact -->

                <!-- Single contact start -->
                <div class="flex items-center mt-5">
                  <span
                    class="border border-accent1 text-accent1 w-9 h-9 rounded-full flex items-center justify-center">
                    <svg class="max-w-5" xmlns="http://www.w3.org/2000/svg" width="16" height="28" viewBox="0 0 24 24"
                      fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="feather feather-mail">
                      <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                      <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                  </span>
                  <span class="ltr:pl-4 rtl:pr-4 text-[15px]">
                    <a class="hover:text-accent1" href="mailto:exampal@gmail.com"><?php echo $user['email']; ?></a>
                  </span>
                </div>
                <!-- Single contact -->

                <!-- Single contact start -->
                <div class="flex items-center mt-5">
                  <span
                    class="border border-accent1 text-accent1 w-9 h-9 rounded-full flex items-center justify-center">
                    <svg class="max-w-5" width="16" height="34" fill="currentColor" stroke="currentColor"
                      xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                      <path
                        d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 256c-35.3 0-64-28.7-64-64s28.7-64 64-64s64 28.7 64 64s-28.7 64-64 64z" />
                    </svg>
                  </span>
                  <span class="ltr:pl-4 rtl:pr-4 text-[18px]">
                  <?php echo $user['address']; ?>
                  </span>
                </div>
                <!-- Single contact -->

              </div>
              <!-- Profile contact info  end -->

            </div>
          </div>
          <!-- Profile media start -->

        </div>
      </section>
      <!-- Hero section end -->
    </main>
    <!-- Main wrapper end -->


  </div>


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