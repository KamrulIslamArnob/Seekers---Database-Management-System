<?php

require_once '../../database/crud/UserCRUD.php';

session_start();
if (!isset($_SESSION["username"])) {
    header("Location:http://localhost/Seekers---job-portal-using-php-tailwind-mysql/index.php");
} else if (isset($_SESSION["username"]) and $_SESSION["role"] == 'admin') {
    header("Location:http://localhost/Seekers---job-portal-using-php-tailwind-mysql/admin/dashboard-admin.php");
}

$userCRUD = new CRUD('');
$userId = $_SESSION['user_id'];
$userData = $userCRUD->getUserWithDetails($userId);




// Update user data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = $_POST['first_name'] ?? '';
    $lastName = $_POST['last_name'] ?? '';
    $profilePicture = $_POST['profile_picture'] ?? '';
    $status = $_POST['status'] ?? '';
    $email = $_POST['email'] ?? '';
    $about = $_POST['about'] ?? '';
    $languages = $_POST['languages'] ?? '';
    $location = $_POST['location'] ?? '';
    $nationality = $_POST['nationality'] ?? '';
    $freelancing = $_POST['freelancing'] ?? '';
    $resume = $_POST['resume'] ?? '';
    $mapLocation = $_POST['map_location'] ?? '';

    $fullName = trim("$firstName $lastName");

    // Update user table
    $dbConnection = new DBConnection();
    $conn = $dbConnection->conn;
    $updateUserData = [
        'name' => $fullName,
        'profile_picture' => $profilePicture,
        'status' => $status,
        'email' => $email,
        'about' => $about,
        'address' => $location,
        'Nationality' => $nationality,
        'Freelance' => $freelancing,
        'cv' => $resume,
        'map_location' => $mapLocation,
    ];

    $updateValues = [];
    foreach ($updateUserData as $key => $value) {
        if (!empty($value)) {
            $updateValues[] = "$key = '" . mysqli_real_escape_string($conn, $value) . "'";
        }
    }

    $setClause = implode(', ', $updateValues);
    //echo $setClause;
    $userId = mysqli_real_escape_string($conn, $userId);

    if (!empty($setClause)) {
        $query = "UPDATE users SET $setClause WHERE id = '$userId'";
        mysqli_query($conn, $query);
    }


    // Update language skills table
    $languageName = $_POST['language_name'] ?? '';
    $updateLanguageSkillsData = [
        'language_id' => $userData['language_id'],
        'language_name' => $languageName
    ];

    $updateValues = [];
    foreach ($updateLanguageSkillsData as $key => $value) {
        if (!empty($value)) {
            $updateValues[] = "$key = '" . mysqli_real_escape_string($conn, $value) . "'";
        }
    }

    $setClause = implode(', ', $updateValues);

    if (!empty($setClause)) {
        $query = "UPDATE language_skills SET $setClause WHERE id = '$userId'";
        mysqli_query($conn, $query);
    }


    // Update experience table
    $jobTitle = $_POST['job_title'] ?? '';
    $company = $_POST['company'] ?? '';
    $experienceStartDate = $_POST['experience_start_date'] ?? '';
    $experienceEndDate = $_POST['experience_end_date'] ?? '';
    $experienceDescription = $_POST['experience_description'] ?? '';
    $updateExperienceData = [
        'job_title' => $jobTitle,
        'company' => $company,
        'start_date' => $experienceStartDate,
        'end_date' => $experienceEndDate,
        'description' => $experienceDescription,
    ];

    $updateValues = [];
    foreach ($updateExperienceData as $key => $value) {
        if (!empty($value)) {
            $updateValues[] = "$key = '" . mysqli_real_escape_string($conn, $value) . "'";
        }
    }

    $setClause = implode(', ', $updateValues);

    if (!empty($setClause)) {
        $query = "UPDATE experience SET $setClause WHERE id = '$userId'";
        mysqli_query($conn, $query);
    }

    // Update education table
    $educationName = $_POST['education_name'] ?? '';
    $degree = $_POST['degree'] ?? '';
    $educationCity = $_POST['education_city'] ?? '';
    $educationStartDate = $_POST['education_start_date'] ?? '';
    $educationEndDate = $_POST['education_end_date'] ?? '';
    $educationDescription = $_POST['education_description'] ?? '';
    $updateEducationData = [
        'name' => $educationName,
        'degree' => $degree,
        'city' => $educationCity,
        'start_date' => $educationStartDate,
        'end_date' => $educationEndDate,
        'description' => $educationDescription,
    ];

    $updateValues = [];
    foreach ($updateEducationData as $key => $value) {
        if (!empty($value)) {
            $updateValues[] = "$key = '" . mysqli_real_escape_string($conn, $value) . "'";
        }
    }

    $setClause = implode(', ', $updateValues);

    if (!empty($setClause)) {
        $query = "UPDATE education SET $setClause WHERE id = '$userId'";
        mysqli_query($conn, $query);
    }

    // Close the database connection
    $dbConnection->conn->close();


    // Redirect to the profile page or any other page after update
    header("Location: profile.php");
}


?>

<!DOCTYPE html>
<html lang="en" dir="ltr" data-mode="light" class="scroll-smooths group" data-theme-color="violet">

<head>
    <meta charset="utf-8" />
    <title> Edit Profile </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta content="Tailwind Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="Themesbrand" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="../../assets/images/favicon.ico" />


    <link rel="stylesheet" href="../../assets/libs/choices.js/public/assets/styles/choices.min.css">

    <link rel="stylesheet" href="../../assets/css/icons.css" />
    <link rel="stylesheet" href="../../assets/css/tailwind.css" />


    <style>
        textarea {
            width: 10rem;
            height: 2.5rem;
        }

        .profile-textarea {
            width: ;
            height: 7.065rem;
        }
    </style>

</head>

<?php
include "nav1.php";
?>


<div class="main-content">
    <div class="page-content">

        <section class="pt-28 lg:pt-44 pb-28 group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500 dark:bg-neutral-900 bg-[url('../images/home/page-title.png')] bg-center bg-cover relative">
            <div class="container mx-auto">
                <div class="grid">
                    <div class="col-span-12">
                        <div class="text-center text-white">
                            <h3 class="mb-4 text-[26px]">My Profile</h3>
                            <div class="page-next">
                                <div class="edit-profile">
                                    <h4 class="text-white">Edit Profile</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <img src="../../assets/images/about/shape.png" alt="" class="absolute block bg-cover -bottom-0 dark:hidden">
            <img src="../../assets/images/about/shape-dark.png" alt="" class="absolute hidden bg-cover -bottom-0 dark:block">
        </section>

        <!-- Start grid -->
        <section class="py-20">
            <div class="container mx-auto">
                <div class="grid grid-cols-12 gap-y-10 lg:gap-10">
                    <div class="col-span-12 lg:col-span-4">
                        <div class="border rounded border-gray-100/50 dark:border-neutral-600">
                            <div class="p-5 border-b border-gray-100/50 dark:border-neutral-600">
                                <div class="text-center">
                                    <img src="
                                                <?php echo "../".$userData['profile_picture']; ?>
                                                " alt="" class="w-20 h-20 p-1 mx-auto border-2 rounded-full border-gray-200/20">
                                    <h6 class="mt-4 mb-0 text-lg text-gray-900 dark:text-gray-50">
                                        <?php echo $userData['name'] ?>
                                    </h6>
                                    <p class="mb-4 text-gray-500 dark:text-gray-300">

                                        <?php echo $userData['tagline']; ?>
                                    </p>
                                    <ul class="flex flex-wrap justify-center gap-2 mb-0">
                                        <li class="w-10 h-10 text-lg leading-10 transition-all duration-300 ease-in-out rounded bg-violet-500/20 text-violet-500 hover:bg-violet-500 hover:text-white">
                                            <a href="javascript:void(0)" class="social-link rounded-3 "><i class="uil uil-facebook-f"></i></a>
                                        </li>
                                        <li class="w-10 h-10 text-lg leading-10 transition-all duration-300 ease-in-out rounded bg-sky-500/20 text-sky-500 hover:bg-sky-500 hover:text-white">
                                            <a href="javascript:void(0)" class="social-link rounded-3 btn-soft-info"><i class="uil uil-twitter-alt"></i></a>
                                        </li>
                                        <li class="w-10 h-10 text-lg leading-10 text-green-500 transition-all duration-300 ease-in-out rounded bg-green-500/20 hover:bg-green-500 hover:text-white">
                                            <a href="javascript:void(0)" class="social-link rounded-3 btn-soft-success"><i class="uil uil-whatsapp"></i></a>
                                        </li>
                                        <li class="w-10 h-10 text-lg leading-10 text-red-500 transition-all duration-300 ease-in-out rounded bg-red-500/20 hover:bg-red-500 hover:text-white">
                                            <a href="javascript:void(0)" class="social-link rounded-3 btn-soft-danger"><i class="uil uil-phone-alt"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="p-5">
                                <div class="pb-5 border-b border-gray-100/50 dark:border-neutral-600">
                                    <h6 class="mb-5 font-semibold text-gray-900 text-17 dark:text-gray-50">Documents</h6>
                                    <ul class="">
                                        <li>
                                            <div class="flex items-center mt-4 ">
                                                <div class="text-2xl text-gray-500 shrink-0">
                                                    <i class="uil uil-file"></i>
                                                </div>
                                                <div class="ml-4">
                                                    <h6 class="mb-0 text-gray-900 text-16 dark:text-gray-50">Resume.pdf</h6>
                                                    <p class="mb-0 text-gray-500 dark:text-gray-300">1.25 MB</p>
                                                </div>
                                                <div class="ml-auto text-xl">
                                                    <a href="../../assets/images/dark-logo.png" download="" class="text-gray-500 fs-20"><i class="uil uil-import"></i></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="flex items-center mt-4 ">
                                                <div class="text-2xl text-gray-500 shrink-0">
                                                    <i class="uil uil-file"></i>
                                                </div>
                                                <div class="ml-4">
                                                    <h6 class="mb-0 text-gray-900 text-16 dark:text-gray-50">Cover-letter.pdf</h6>
                                                    <p class="mb-0 text-gray-500 dark:text-gray-300">1.25 MB</p>
                                                </div>
                                                <div class="ml-auto text-xl">
                                                    <a href="../../assets/images/dark-logo.png" download="" class="text-gray-500 fs-20"><i class="uil uil-import"></i></a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                            <div class="p-5 pt-0">
                                <h6 class="mb-3 font-semibold text-gray-900 text-17 dark:text-gray-50">Contacts</h6>
                                <ul class="mb-0">
                                    <li class="pb-3">
                                        <div class="flex">
                                            <label class="w-32 font-medium text-gray-900 dark:text-gray-50">Email</label>
                                            <div>
                                                <p class="mb-0 text-gray-500 text-break dark:text-gray-300">
                                                    <?php echo $userData['email']; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="pb-3">
                                        <div class="flex">
                                            <label class="w-32 font-medium text-gray-900 dark:text-gray-50">Phone Number</label>
                                            <div>
                                                <p class="mb-0 text-gray-500 dark:text-gray-300">
                                                    <?php echo '0' . $userData['phone']; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="pb-3">
                                        <div class="flex">
                                            <label class="w-32 font-medium text-gray-900 dark:text-gray-50">Location</label>
                                            <div>
                                                <p class="mb-0 text-gray-500 dark:text-gray-300">
                                                    <?php echo $userData['address']; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-span-12 lg:col-span-8">
                        <div class="border rounded border-gray-100/50 dark:border-neutral-600 nav-tabs bottom-border-tab">
                            <div class="px-6 py-0 border-b border-gray-100/50 dark:border-neutral-600">

                                <ul class="items-center text-sm font-medium text-center text-gray-700 nav md:flex">
                                    <li class="nav-item" role="presentation">
                                        <button class="inline-block w-full py-4 px-[18px] dark:text-gray-50" data-tw-toggle="tab" type="button" data-tw-target="settings-tab">
                                            Settings
                                        </button>
                                    </li>
                                </ul>
                            </div>

                            <div class="p-6 nav-tabs tab-pill">
                                <ul class="flex flex-wrap w-full text-sm font-medium text-center text-gray-500 nav">
                                    <li>
                                        <a href="javascript:void(0);" data-tw-toggle="tab" data-tw-target="underline-home" class="inline-block px-4 py-3 active">Profile</a>
                                    </li>

                                    
                                    <li>
                                        <a href="javascript:void(0);" data-tw-toggle="tab" data-tw-target="underline-contact" class="inline-block px-4 py-3">Skill Varification</a>
                                    </li>
                                </ul>
                                <div class="mt-5 tab-content">
                                    <div class=" tab-pane" id="underline-home">
                                        <form action="edit-profile.php" method="POST" enctype="multipart/form-data">
                                            <div>

                                                <div class="text-center">
                                                    <div class="relative mb-4">
                                                        <img src="../../assets/images/user/img-02.jpg" class="w-40 h-40 p-1 mx-auto border-2 rounded-full border-gray-100/50 dark:border-neutral-600" id="profile-img" alt="">
                                                        <div class="absolute w-8 h-8 leading-8 text-center rounded-full shadow-md bottom-2 right-[42%] z-40 bg-gray-50 dark:bg-neutral-700 dark:text-white">
                                                            <input id="profile-img-file-input" type="file" name="dp-img" class="hidden" onchange="updateProfilePicture()">
                                                            <label for="profile-img-file-input" class="">
                                                                <i class="uil uil-edit"></i>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-5">
                                                    <div class="grid grid-cols-12 gap-5">
                                                        <div class="col-span-12 lg:col-span-6">
                                                            <div class="mb-3">
                                                                <label for="firstName" class="text-sm text-gray-900 dark:text-gray-50">First Name</label>
                                                                <input type="text" name="first_name" class="w-full mt-1 text-gray-500 border rounded border-gray-100/50 text-13 dark:bg-transparent dark:border-neutral-600" id="firstName" value="
                                                                                
                                                                                ">
                                                            </div>
                                                        </div>
                                                        <!--end col-->
                                                        <div class="col-span-12 lg:col-span-6">
                                                            <div class="mb-3">
                                                                <label for="lastName" class="text-sm text-gray-900 dark:text-gray-50">Last Name</label>
                                                                <input type="text" name="last_name" class="w-full mt-1 text-gray-500 border rounded border-gray-100/50 text-13 dark:bg-transparent dark:border-neutral-600" id="lastName" value="">
                                                            </div>
                                                        </div>
                                                        <!--end col-->
                                                        <div class="col-span-12 lg:col-span-6">
                                                            <div class="mb-3">
                                                                <label for="role" class="text-sm text-gray-900 dark:text-gray-50">
                                                                    Role

                                                                </label>
                                                                <input type="text" class="w-full mt-1 text-gray-500 border rounded border-gray-100/50 text-13 dark:bg-transparent dark:border-neutral-600" id="role" value="<?php echo $userData['role']; ?> " disabled>
                                                            </div>
                                                        </div>
                                                        <!--end col-->
                                                        <div class="col-span-12 lg:col-span-6">
                                                            <div class="mb-3">
                                                                <label for="status" class="text-sm text-gray-900 dark:text-gray-50">Status</label>
                                                                <input type="text" class="w-full mt-1 text-gray-500 border rounded border-gray-100/50 text-13 dark:bg-transparent dark:border-neutral-600" id="status" value="<?php echo $userData['status']; ?>" disabled style="color: black;">

                                                            </div>
                                                        </div>
                                                        <!--end col-->
                                                        <div class="col-span-12 lg:col-span-6">
                                                            <div class="mb-3">
                                                                <label for="email" class="text-sm text-gray-900 dark:text-gray-50">Email</label>
                                                                <input type="text" name="email" class="w-full mt-1 text-gray-500 border rounded border-gray-100/50 text-13 dark:bg-transparent dark:border-neutral-600" id="email" value="<?php echo $userData['email']; ?>" style="color: black;">

                                                            </div>
                                                        </div>
                                                        <!--end col-->
                                                    </div>
                                                </div>
                                                <!--end row-->
                                            </div>
                                            <!--end account-->
                                            <div class="mt-4">
                                                <h5 class="mb-3 font-semibold text-gray-900 text-17 dark:text-gray-50">Profile</h5>
                                                <div class="grid grid-cols-12 gap-5">
                                                    <div class="col-span-12">
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlTextarea1" class="form-label dark:text-gray-300">Introduce Yourself</label>
                                                            <textarea name="about" class=" profile-textarea w-full mt-1 text-sm rounded border-gray-100/50 dark:bg-transparent dark:border-neutral-600 dark:text-gray-300" id="exampleFormControlTextarea1" rows="5"> <?php echo $userData['about']; ?> </textarea>
                                                        </div>
                                                    </div>
                                                    <!--end col-->

                                                    <div class="col-span-12 lg:col-span-6">
                                                        <div class="mb-3">
                                                            <label for="languages" class="text-sm text-gray-900 dark:text-gray-50">Languages</label>
                                                            <input type="text" name="languages" class="w-full mt-1 text-gray-500 border rounded border-gray-100/50 text-13 dark:bg-transparent dark:border-neutral-600" id="languages" value="
                                                                            <?php echo $userData['languages']; ?>
                                                                            ">
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-span-12 lg:col-span-6">
                                                        <div class="mb-3">
                                                            <label for="location" class="text-sm text-gray-900 dark:text-gray-50">Location</label>
                                                            <input type="text" name="location" class="w-full mt-1 text-gray-500 border rounded border-gray-100/50 text-13 dark:bg-transparent dark:border-neutral-600" id="location" value="
                                                                            <?php echo $userData['address']; ?>
                                                                             ">
                                                        </div>
                                                    </div>
                                                    <div class="col-span-12 lg:col-span-6">
                                                        <div class="mb-3">
                                                            <label for="nationality" class="text-sm text-gray-900 dark:text-gray-50">Nationality</label>
                                                            <input type="text" name="nationality" class="w-full mt-1 text-gray-500 border rounded border-gray-100/50 text-13 dark:bg-transparent dark:border-neutral-600" id="location" value="
                                                                            <?php echo $userData['Nationality']; ?>
                                                                            ">
                                                        </div>
                                                    </div>
                                                    <div class="col-span-12 lg:col-span-6">
                                                        <div class="mb-3">
                                                            <label for="freelancing" class="text-sm text-gray-900 dark:text-gray-50">Freelancing</label>
                                                            <div class="mb-1">
                                                                <select name="freelancing" id="freelancing" class="w-full mt-1 text-gray-500 border rounded border-gray-100/50 text-13 dark:bg-transparent dark:border-neutral-600">
                                                                    <option value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-span-12">
                                                        <div class="mb-3 ">
                                                            <div class="mb-3">
                                                                <label for="formFileLg" class="inline-block mb-2 text-neutral-700 dark:text-neutral-200">Upload your resume</label>
                                                                <input class="relative m-0 block w-full min-w-0 flex-auto cursor-pointer rounded border border-gray-100/50 bg-clip-padding pr-3 py-[0.32rem] font-normal leading-[2.15] text-neutral-700 transition duration-300 ease-in-out file:mr-2 file:-my-[0.32rem] file:cursor-pointer file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-gray-100/30 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary" id="formFileLg" type="file" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-span-12 lg:col-span-6">
                                                        <div class="mb-3">
                                                            <label for="mapLocation" class="text-sm text-gray-900 dark:text-gray-50">Map Location</label>
                                                            <input type="text" name="map_location" class="w-full mt-1 text-gray-500 border rounded border-gray-100/50 text-13 dark:bg-transparent dark:border-neutral-600" id="location" value="<?php echo $userData['map_location']; ?>">
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                </div>
                                                <!--end row-->
                                            </div>
                                            <!--end profile-->
                                            <div class="mt-4">
                                                <h5 class="mb-3 font-semibold text-gray-900 text-17 dark:text-gray-50">Social Media</h5>
                                                <div class="grid grid-cols-12 gap-5">
                                                    <div class="col-span-12 lg:col-span-6">
                                                        <div class="mb-3">
                                                            <label for="facebook" class="text-sm text-gray-900 dark:text-gray-50">Facebook</label>
                                                            <input type="text" name="facebook" class="w-full mt-1 text-gray-500 border rounded border-gray-100/50 text-13 dark:bg-transparent dark:border-neutral-600" id="facebook" value="https://www.facebook.com">
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-span-12 lg:col-span-6">
                                                        <div class="mb-3">
                                                            <label for="twitter" class="text-sm text-gray-900 dark:text-gray-50">Twitter</label>
                                                            <input type="text" name="twitter" class="w-full mt-1 text-gray-500 border rounded border-gray-100/50 text-13 dark:bg-transparent dark:border-neutral-600" id="twitter" value="https://www.twitter.com">
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-span-12 lg:col-span-6">
                                                        <div class="mb-3">
                                                            <label for="linkedin" class="text-sm text-gray-900 dark:text-gray-50">Linkedin</label>
                                                            <input type="text" name="linkedin" class="w-full mt-1 text-gray-500 border rounded border-gray-100/50 text-13 dark:bg-transparent dark:border-neutral-600" id="linkedin" value="https://www.linkedin.com">
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-span-12 lg:col-span-6">
                                                        <div class="mb-3">
                                                            <label for="whatsapp" class="text-sm text-gray-900 dark:text-gray-50">Whatsapp</label>
                                                            <input type="text" name="whatsapp" class="w-full mt-1 text-gray-500 border rounded border-gray-100/50 text-13 dark:bg-transparent dark:border-neutral-600" id="whatsapp" value="https://www.whatsapp.com">
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                </div>
                                                <!--end row-->
                                            </div>
                                            <!--end socia-media-->
                                            <div class="mt-4">
                                                <h5 class="mb-3 font-semibold text-17 dark:text-gray-50">
                                                    Change Password
                                                </h5>
                                                <div class="grid grid-cols-12 gap-5">
                                                    <div class="col-span-12">
                                                        <div class="mb-3">
                                                            <label for="current-password-input" class="text-sm text-gray-900 dark:text-gray-50">Current
                                                                password</label>
                                                            <input type="password" class="w-full mt-1 text-gray-500 border rounded border-gray-100/50 text-13 dark:bg-transparent dark:border-neutral-600" placeholder="Enter Current password" id="current-password-input">
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-span-12 lg:col-span-6">
                                                        <div class="mb-3">
                                                            <label for="new-password-input" class="text-sm text-gray-900 dark:text-gray-50">New
                                                                password</label>
                                                            <input type="password" class="w-full mt-1 text-gray-500 border rounded border-gray-100/50 text-13 dark:bg-transparent dark:border-neutral-600" placeholder="Enter new password" id="new-password-input">
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-span-12 lg:col-span-6">
                                                        <div class="mb-3">
                                                            <label for="confirm-password-input" class="text-sm text-gray-900 dark:text-gray-50">Confirm Password</label>
                                                            <input type="password" class="w-full mt-1 text-gray-500 border rounded border-gray-100/50 text-13 dark:bg-transparent dark:border-neutral-600" placeholder="Confirm Password" id="confirm-password-input">
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-span-12">
                                                        <div class="form-check">


                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                </div>
                                                <!--end row-->
                                            </div>
                                            <!--end Change-password-->
                                            <div class="mt-8 text-right">
                                                <input type="submit" name="submit" value="Update" class="text-white btn group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500 border-transparent focus:ring group-data-[theme-color=violet]:focus:ring-violet-500/20 group-data-[theme-color=sky]:focus:ring-sky-500/20 group-data-[theme-color=red]:focus:ring-red-500/20 group-data-[theme-color=green]:focus:ring-green-500/20 group-data-[theme-color=pink]:focus:ring-pink-500/20 group-data-[theme-color=blue]:focus:ring-blue-500/20">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="block hidden tab-pane" id="underline-Profile">

                                    </div>

                                    <div class="hidden tab-pane" id="underline-contact">
                                        <div class="col-span-12 lg:col-span-6">
                                            <div class="mt-4 border rounded-md border-gray-100/50 dark:border-zinc-600">
                                                <img class="rounded-t-md" src="assets/images/blog/img-01.jpg" alt="Card image cap">
                                                <div class="p-5">
                                                    <h5 class="mb-2 text-gray-900 dark:text-gray-50">Node JS</h5>
                                                    <p class="text-gray-500 dark:text-gray-300">Some quick example text to build on the card title and make
                                                        up the bulk of the card's content.</p>
                                                    <a href="javascript:void(0)" class="mt-5 text-white border-transparent btn group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500">Go somewhere</a>
                                                </div>
                                            </div><!-- end card -->
                                        </div><!-- end col -->
                                        <div class="col-span-12 lg:col-span-6">
                                            <div class="mt-4 border rounded-md border-gray-100/50 dark:border-zinc-600">
                                                <img class="rounded-t-md" src="assets/images/blog/img-01.jpg" alt="Card image cap">
                                                <div class="p-5">
                                                    <h5 class="mb-2 text-gray-900 dark:text-gray-50">Javascript</h5>
                                                    <p class="text-gray-500 dark:text-gray-300">Some quick example text to build on the card title and make
                                                        up the bulk of the card's content.</p>
                                                    <a href="javascript:void(0)" class="mt-5 text-white border-transparent btn group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500">Go somewhere</a>
                                                </div>
                                            </div><!-- end card -->
                                        </div><!-- end col -->
                                        <div class="col-span-12 lg:col-span-6">
                                            <div class="mt-4 border rounded-md border-gray-100/50 dark:border-zinc-600">
                                                <img class="rounded-t-md" src="assets/images/blog/img-01.jpg" alt="Card image cap">
                                                <div class="p-5">
                                                    <h5 class="mb-2 text-gray-900 dark:text-gray-50">Javascript</h5>
                                                    <p class="text-gray-500 dark:text-gray-300">Some quick example text to build on the card title and make
                                                        up the bulk of the card's content.</p>
                                                    <a href="javascript:void(0)" class="mt-5 text-white border-transparent btn group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500">Go somewhere</a>
                                                </div>
                                            </div><!-- end card -->
                                        </div><!-- end col -->
                                        <div class="col-span-12 lg:col-span-6">
                                            <div class="mt-4 border rounded-md border-gray-100/50 dark:border-zinc-600">
                                                <img class="rounded-t-md" src="assets/images/blog/img-01.jpg" alt="Card image cap">
                                                <div class="p-5">
                                                    <h5 class="mb-2 text-gray-900 dark:text-gray-50">Javascript</h5>
                                                    <p class="text-gray-500 dark:text-gray-300">Some quick example text to build on the card title and make
                                                        up the bulk of the card's content.</p>
                                                    <a href="javascript:void(0)" class="mt-5 text-white border-transparent btn group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500">Go somewhere</a>
                                                </div>
                                            </div><!-- end card -->
                                        </div><!-- end col -->
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


<!-- end main content-->

<?php
include('../footer.php');
?>

<script>
    function updateProfilePicture() {
        const fileInput = document.getElementById('profile-img-file-input');
        const form = new FormData();
        form.append('dp-img', fileInput.files[0]);

        fetch('update-profile-picture.php', {
                method: 'POST',
                body: form
            })
            .then(response => response.json())
            .then(data => {
                // Handle response, e.g., display a success message
                console.log(data);
            })
            .catch(error => {
                // Handle error
                console.error('Error:', error);
            });
    }
</script>


<script src="https://unicons.iconscout.com/release/v4.0.0/script/monochrome/bundle.js"></script>
<script src="../../assets/libs/@popperjs/core/umd/popper.min.js"></script>
<script src="../../assets/libs/simplebar/simplebar.min.js"></script>


<script src="../../assets/js/pages/switcher.js"></script>

<script src="../../assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>

<script src="../../assets/js/pages/job-list.init.js"></script>

<script src="../../assets/js/pages/dropdown&modal.init.js"></script>

<script src="../../assets/js/pages/nav&tabs.js"></script>

<script src="../../assets/js/app.js"></script>


</body>

</html>