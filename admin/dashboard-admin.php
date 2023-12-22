<?php
require_once '../database/crud/UserCRUD.php';
require_once '../database/crud/DBConnection.php';

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

?>
<!DOCTYPE html>
<html lang="en" dir="ltr" data-mode="light" class="scroll-smooths group" data-theme-color="violet">

<head>
    <meta charset="utf-8" />
    <title>Dashboard | Admin </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta content="Tailwind Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="Themesbrand" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico" />


    <link rel="stylesheet" href="../assets/libs/choices.js/public/assets/styles/choices.min.css">

    <!-- Swiper Css -->
    <link rel="stylesheet" href="../assets/libs/swiper/swiper-bundle.min.css">


    <link rel="stylesheet" href="../assets/css/icons.css" />
    <link rel="stylesheet" href="../assets/css/tailwind.css" />


    <style>
        .h-seekers {
            color: rgb(12, 20, 39);
            font-size: 1.5rem;
            border-top: 2px solid red;
            border-left: 2px solid red;
            border-right: 2px solid red;
            border-radius: 0.5rem;
        }
    </style>

</head>


<body class="bg-white dark:bg-neutral-800">


    <?php
    include('nav1.php');
    ?>




    

    <div class="main-content">
        <div class="page-content">
            <!-- start home -->
            <section
                class="relative group-data-[theme-color=violet]:bg-violet-500/20 group-data-[theme-color=sky]:bg-sky-500/20 group-data-[theme-color=red]:bg-red-500/20 group-data-[theme-color=green]:bg-green-500/20 group-data-[theme-color=pink]:bg-pink-500/20 group-data-[theme-color=blue]:bg-blue-500/20 py-28 dark:bg-violet-500/20">
                <div class="container mx-auto">
                    <div class="grid items-center grid-cols-12 gap-10">
                        <div class="col-span-12 lg:col-span-7">
                            <div class="mb-3 ltr:mr-14 rtl:ml-14">
                                <h6 class="mb-3 text-sm text-gray-900 uppercase dark:text-gray-50">We have 150,000+ live
                                    jobs</h6>
                                <h1 class="mb-3 text-5xl font-semibold leading-tight text-gray-900 dark:text-gray-50">
                                    Find your dream jobs <br> with <span
                                        class="font-bold group-data-[theme-color=violet]:text-violet-500 group-data-[theme-color=sky]:text-sky-500 group-data-[theme-color=red]:text-red-500 group-data-[theme-color=green]:text-green-500 group-data-[theme-color=pink]:text-pink-500 group-data-[theme-color=blue]:text-blue-500">Seekers</span>
                                </h1>
                                <p class="text-lg font-light text-gray-500 whitespace-pre-line dark:text-gray-300">Find
                                    jobs, create trackable resumes and enrich your
                                    applications.Carefully crafted after analyzing the needs of different
                                    industries.</p>
                            </div>
                            <form action="#">
                                <div class="registration-form">
                                    <div class="grid grid-cols-12">
                                        <div class="col-span-12 xl:col-span-4">
                                            <div class="mt-3 rounded-l filter-search-form filter-border mt-md-0">
                                                <i class="uil uil-briefcase-alt"></i>
                                                <input type="search" id="job-title"
                                                    class="md:w-full filter-input-box placeholder:text-gray-100 placeholder:text-13 dark:text-gray-100"
                                                    placeholder="Job, Company name...">
                                            </div>
                                        </div><!--end col-->
                                        <div class="col-span-12 xl:col-span-4">
                                            <div class="mt-3 filter-search-form mt-md-0">
                                                <i class="uil uil-map-marker"></i>
                                                <select class="form-select" data-trigger name="choices-single-location"
                                                    id="choices-single-location" aria-label="Default select example">
                                                    <option value="AF">Afghanistan</option>
                                                    <option value="AX">&Aring;land Islands</option>
                                                    <option value="AL">Albania</option>
                                                    <option value="DZ">Algeria</option>
                                                    <option value="AS">American Samoa</option>
                                                    <option value="AD">Andorra</option>
                                                    <option value="AO">Angola</option>
                                                    <option value="AI">Anguilla</option>
                                                    <option value="AQ">Antarctica</option>
                                                    <option value="AG">Antigua and Barbuda</option>
                                                    <option value="AR">Argentina</option>
                                                    <option value="AM">Armenia</option>
                                                    <option value="AW">Aruba</option>
                                                    <option value="AU">Australia</option>
                                                    <option value="AT">Austria</option>
                                                    <option value="AZ">Azerbaijan</option>
                                                    <option value="BS">Bahamas</option>
                                                    <option value="BH">Bahrain</option>
                                                    <option value="BD">Bangladesh</option>
                                                    <option value="BB">Barbados</option>
                                                    <option value="BY">Belarus</option>
                                                    <option value="BE">Belgium</option>
                                                    <option value="BZ">Belize</option>
                                                    <option value="BJ">Benin</option>
                                                    <option value="BM">Bermuda</option>
                                                    <option value="BT">Bhutan</option>
                                                    <option value="BO">Bolivia, Plurinational State of</option>
                                                    <option value="BA">Bosnia and Herzegovina</option>
                                                    <option value="BW">Botswana</option>
                                                    <option value="BV">Bouvet Island</option>
                                                    <option value="BR">Brazil</option>
                                                    <option value="IO">British Indian Ocean Territory</option>
                                                    <option value="BN">Brunei Darussalam</option>
                                                    <option value="BG">Bulgaria</option>
                                                    <option value="BF">Burkina Faso</option>
                                                    <option value="BI">Burundi</option>
                                                    <option value="KH">Cambodia</option>
                                                    <option value="CM">Cameroon</option>
                                                    <option value="CA">Canada</option>
                                                    <option value="CV">Cape Verde</option>
                                                    <option value="KY">Cayman Islands</option>
                                                    <option value="CF">Central African Republic</option>
                                                    <option value="TD">Chad</option>
                                                    <option value="CL">Chile</option>
                                                    <option value="CN">China</option>
                                                    <option value="CX">Christmas Island</option>
                                                    <option value="CC">Cocos (Keeling) Islands</option>
                                                    <option value="CO">Colombia</option>
                                                    <option value="KM">Comoros</option>
                                                    <option value="CG">Congo</option>
                                                    <option value="CD">Congo, the Democratic Republic of the</option>
                                                    <option value="CK">Cook Islands</option>
                                                    <option value="CR">Costa Rica</option>
                                                    <option value="CI">C&ocirc;te d'Ivoire</option>
                                                    <option value="HR">Croatia</option>
                                                    <option value="CU">Cuba</option>
                                                    <option value="CY">Cyprus</option>
                                                    <option value="CZ">Czech Republic</option>
                                                    <option value="DK">Denmark</option>
                                                    <option value="DJ">Djibouti</option>
                                                    <option value="DM">Dominica</option>
                                                    <option value="DO">Dominican Republic</option>
                                                    <option value="EC">Ecuador</option>
                                                    <option value="EG">Egypt</option>
                                                    <option value="SV">El Salvador</option>
                                                    <option value="GQ">Equatorial Guinea</option>
                                                    <option value="ER">Eritrea</option>
                                                    <option value="EE">Estonia</option>
                                                    <option value="ET">Ethiopia</option>
                                                    <option value="FK">Falkland Islands (Malvinas)</option>
                                                    <option value="FO">Faroe Islands</option>
                                                    <option value="FJ">Fiji</option>
                                                    <option value="FI">Finland</option>
                                                    <option value="FR">France</option>
                                                    <option value="GF">French Guiana</option>
                                                    <option value="PF">French Polynesia</option>
                                                    <option value="TF">French Southern Territories</option>
                                                    <option value="GA">Gabon</option>
                                                    <option value="GM">Gambia</option>
                                                    <option value="GE">Georgia</option>
                                                    <option value="DE">Germany</option>
                                                    <option value="GH">Ghana</option>
                                                    <option value="GI">Gibraltar</option>
                                                    <option value="GR">Greece</option>
                                                    <option value="GL">Greenland</option>
                                                    <option value="GD">Grenada</option>
                                                    <option value="GP">Guadeloupe</option>
                                                    <option value="GU">Guam</option>
                                                    <option value="GT">Guatemala</option>
                                                    <option value="GG">Guernsey</option>
                                                    <option value="GN">Guinea</option>
                                                    <option value="GW">Guinea-Bissau</option>
                                                    <option value="GY">Guyana</option>
                                                    <option value="HT">Haiti</option>
                                                    <option value="HM">Heard Island and McDonald Islands</option>
                                                    <option value="VA">Holy See (Vatican City State)</option>
                                                    <option value="HN">Honduras</option>
                                                    <option value="HK">Hong Kong</option>
                                                    <option value="HU">Hungary</option>
                                                    <option value="IS">Iceland</option>
                                                    <option value="IN">India</option>
                                                    <option value="ID">Indonesia</option>
                                                    <option value="IR">Iran, Islamic Republic of</option>
                                                    <option value="IQ">Iraq</option>
                                                    <option value="IE">Ireland</option>
                                                    <option value="IM">Isle of Man</option>
                                                    <option value="IL">Israel</option>
                                                    <option value="IT">Italy</option>
                                                    <option value="JM">Jamaica</option>
                                                    <option value="JP">Japan</option>
                                                    <option value="JE">Jersey</option>
                                                    <option value="JO">Jordan</option>
                                                    <option value="KZ">Kazakhstan</option>
                                                    <option value="KE">Kenya</option>
                                                    <option value="KI">Kiribati</option>
                                                    <option value="KP">Korea, Democratic People's Republic of</option>
                                                    <option value="KR">Korea, Republic of</option>
                                                    <option value="KW">Kuwait</option>
                                                    <option value="KG">Kyrgyzstan</option>
                                                    <option value="LA">Lao People's Democratic Republic</option>
                                                    <option value="LV">Latvia</option>
                                                    <option value="LB">Lebanon</option>
                                                    <option value="LS">Lesotho</option>
                                                    <option value="LR">Liberia</option>
                                                    <option value="LY">Libyan Arab Jamahiriya</option>
                                                    <option value="LI">Liechtenstein</option>
                                                    <option value="LT">Lithuania</option>
                                                    <option value="LU">Luxembourg</option>
                                                    <option value="MO">Macao</option>
                                                    <option value="MK">Macedonia, the former Yugoslav Republic of
                                                    </option>
                                                    <option value="MG">Madagascar</option>
                                                    <option value="MW">Malawi</option>
                                                    <option value="MY">Malaysia</option>
                                                    <option value="MV">Maldives</option>
                                                    <option value="ML">Mali</option>
                                                    <option value="MT">Malta</option>
                                                    <option value="MH">Marshall Islands</option>
                                                    <option value="MQ">Martinique</option>
                                                    <option value="MR">Mauritania</option>
                                                    <option value="MU">Mauritius</option>
                                                    <option value="YT">Mayotte</option>
                                                    <option value="MX">Mexico</option>
                                                    <option value="FM">Micronesia, Federated States of</option>
                                                    <option value="MD">Moldova, Republic of</option>
                                                    <option value="MC">Monaco</option>
                                                    <option value="MN">Mongolia</option>
                                                    <option value="ME">Montenegro</option>
                                                    <option value="MS">Montserrat</option>
                                                    <option value="MA">Morocco</option>
                                                    <option value="MZ">Mozambique</option>
                                                    <option value="MM">Myanmar</option>
                                                    <option value="NA">Namibia</option>
                                                    <option value="NR">Nauru</option>
                                                    <option value="NP">Nepal</option>
                                                    <option value="NL">Netherlands</option>
                                                    <option value="AN">Netherlands Antilles</option>
                                                    <option value="NC">New Caledonia</option>
                                                    <option value="NZ">New Zealand</option>
                                                    <option value="NI">Nicaragua</option>
                                                    <option value="NE">Niger</option>
                                                    <option value="NG">Nigeria</option>
                                                    <option value="NU">Niue</option>
                                                    <option value="NF">Norfolk Island</option>
                                                    <option value="MP">Northern Mariana Islands</option>
                                                    <option value="NO">Norway</option>
                                                    <option value="OM">Oman</option>
                                                    <option value="PK">Pakistan</option>
                                                    <option value="PW">Palau</option>
                                                    <option value="PS">Palestinian Territory, Occupied</option>
                                                    <option value="PA">Panama</option>
                                                    <option value="PG">Papua New Guinea</option>
                                                    <option value="PY">Paraguay</option>
                                                    <option value="PE">Peru</option>
                                                    <option value="PH">Philippines</option>
                                                    <option value="PN">Pitcairn</option>
                                                    <option value="PL">Poland</option>
                                                    <option value="PT">Portugal</option>
                                                    <option value="PR">Puerto Rico</option>
                                                    <option value="QA">Qatar</option>
                                                    <option value="RE">R&eacute;union</option>
                                                    <option value="RO">Romania</option>
                                                    <option value="RU">Russian Federation</option>
                                                    <option value="RW">Rwanda</option>
                                                    <option value="BL">Saint Barth&eacute;lemy</option>
                                                    <option value="SH">Saint Helena, Ascension and Tristan da Cunha
                                                    </option>
                                                    <option value="KN">Saint Kitts and Nevis</option>
                                                    <option value="LC">Saint Lucia</option>
                                                    <option value="MF">Saint Martin (French part)</option>
                                                    <option value="PM">Saint Pierre and Miquelon</option>
                                                    <option value="VC">Saint Vincent and the Grenadines</option>
                                                    <option value="WS">Samoa</option>
                                                    <option value="SM">San Marino</option>
                                                    <option value="ST">Sao Tome and Principe</option>
                                                    <option value="SA">Saudi Arabia</option>
                                                    <option value="SN">Senegal</option>
                                                    <option value="RS">Serbia</option>
                                                    <option value="SC">Seychelles</option>
                                                    <option value="SL">Sierra Leone</option>
                                                    <option value="SG">Singapore</option>
                                                    <option value="SK">Slovakia</option>
                                                    <option value="SI">Slovenia</option>
                                                    <option value="SB">Solomon Islands</option>
                                                    <option value="SO">Somalia</option>
                                                    <option value="ZA">South Africa</option>
                                                    <option value="GS">South Georgia and the South Sandwich Islands
                                                    </option>
                                                    <option value="ES">Spain</option>
                                                    <option value="LK">Sri Lanka</option>
                                                    <option value="SD">Sudan</option>
                                                    <option value="SR">Suriname</option>
                                                    <option value="SJ">Svalbard and Jan Mayen</option>
                                                    <option value="SZ">Swaziland</option>
                                                    <option value="SE">Sweden</option>
                                                    <option value="CH">Switzerland</option>
                                                    <option value="SY">Syrian Arab Republic</option>
                                                    <option value="TW">Taiwan, Province of China</option>
                                                    <option value="TJ">Tajikistan</option>
                                                    <option value="TZ">Tanzania, United Republic of</option>
                                                    <option value="TH">Thailand</option>
                                                    <option value="TL">Timor-Leste</option>
                                                    <option value="TG">Togo</option>
                                                    <option value="TK">Tokelau</option>
                                                    <option value="TO">Tonga</option>
                                                    <option value="TT">Trinidad and Tobago</option>
                                                    <option value="TN">Tunisia</option>
                                                    <option value="TR">Turkey</option>
                                                    <option value="TM">Turkmenistan</option>
                                                    <option value="TC">Turks and Caicos Islands</option>
                                                    <option value="TV">Tuvalu</option>
                                                    <option value="UG">Uganda</option>
                                                    <option value="UA">Ukraine</option>
                                                    <option value="AE">United Arab Emirates</option>
                                                    <option value="GB">United Kingdom</option>
                                                    <option value="US">United States</option>
                                                    <option value="UM">United States Minor Outlying Islands</option>
                                                    <option value="UY">Uruguay</option>
                                                    <option value="UZ">Uzbekistan</option>
                                                    <option value="VU">Vanuatu</option>
                                                    <option value="VE">Venezuela, Bolivarian Republic of</option>
                                                    <option value="VN">Viet Nam</option>
                                                    <option value="VG">Virgin Islands, British</option>
                                                    <option value="VI">Virgin Islands, U.S.</option>
                                                    <option value="WF">Wallis and Futuna</option>
                                                    <option value="EH">Western Sahara</option>
                                                    <option value="YE">Yemen</option>
                                                    <option value="ZM">Zambia</option>
                                                    <option value="ZW">Zimbabwe</option>
                                                </select>
                                            </div>
                                        </div><!--end col-->
                                        <div class="col-span-12 xl:col-span-4">
                                            <div class="h-full mt-3">
                                                <button
                                                    class="btn group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500 border rounded-lg border-transparent ltr:xl:rounded-l-none rtl:xl:rounded-r-none w-full py-[18px] text-white"
                                                    type="submit"><i class="uil uil-search me-1"></i> Find Job</button>
                                            </div>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </div>
                            </form>
                        </div>
                        <div class="col-span-12 lg:col-span-5">
                            <div class="relative mt-5 mt-lg-0 ms-xl-5">
                                <div>
                                    <div class="absolute z-20 text-white text-8xl -top-12 -left-12">
                                        <i class="mdi mdi-format-quote-open"></i>
                                    </div>
                                    <div
                                        class="text-8xl absolute -top-[3.2rem] -left-[3.2rem] z-30 group-data-[theme-color=violet]:text-violet-500 group-data-[theme-color=sky]:text-sky-500 group-data-[theme-color=red]:text-red-500 group-data-[theme-color=green]:text-green-500 group-data-[theme-color=pink]:text-pink-500 group-data-[theme-color=blue]:text-blue-500">
                                        <i class="mdi mdi-format-quote-open "></i>
                                    </div>
                                </div>
                                <div class="swiper homeslider">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="text-center home-slide-box">
                                                <img src="../assets/images/home/img-02.png" alt=""
                                                    class="max-w-full rounded-3">
                                                <div class="bg-overlay"></div>
                                                <div class="absolute bottom-0 p-4">
                                                    <h2 class="text-white font-secound fw-normal">" It looks perfect on
                                                        all major browsers, tablets,
                                                        and mobile devices."</h2>
                                                    <h6 class="text-white">- MichaeL Drake</h6>
                                                </div>
                                            </div>
                                        </div><!--swiper-slide-->
                                        <div class="swiper-slide">
                                            <div class="text-center home-slide-box">
                                                <img src="../assets/images/home/img-03.png" alt=""
                                                    class="max-w-full rounded-3">
                                                <div class="bg-overlay"></div>
                                                <div class="absolute bottom-0 p-4">
                                                    <h2 class="text-white font-secound fw-normal">" This template is
                                                        well organized and very easy to
                                                        customize. "</h2>
                                                    <h6 class="text-white">- Charles Dickens</h6>
                                                </div>
                                            </div>
                                        </div><!--swiper-slide-->
                                        <div class="swiper-slide">
                                            <div class="text-center home-slide-box">
                                                <img src="../assets/images/home/img-04.png" alt=""
                                                    class="max-w-full rounded-3">
                                                <div class="bg-overlay"></div>
                                                <div class="absolute bottom-0 p-4">
                                                    <h2 class="text-white font-secound fw-normal">" All your client
                                                        websites if you are an agency or
                                                        freelancer. "</h2>
                                                    <h6 class="text-white">- Rebecca Swartz</h6>
                                                </div>
                                            </div>
                                        </div><!--swiper-slide-->
                                    </div><!--end sw-->
                                </div><!--end swiper-->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end home -->



            <!-- start blog -->
            <section class="py-20 bg-gray-50 dark:bg-neutral-700">
                <div class="container mx-auto">
                    <div class="grid grid-cols-1 gap-5">
                        <div class="mb-5 text-center">
                            <h3 class="mb-3 text-3xl text-gray-900 dark:text-gray-50">Quick Career Tips</h3>
                            <p class="mb-5 text-gray-500 whitespace-pre-line dark:text-gray-300">Post a job to tell us
                                about your project. We'll quickly match you with the right <br> freelancers.</p>
                        </div>
                    </div>


                    <div class="grid grid-cols-12 gap-5">
                        <?php foreach ($blogData1 as $blogItem): ?>
                            <div class="col-span-12 md:col-span-6 lg:col-span-4">
                                <div
                                    class="p-2 mt-3 transition-all duration-500 bg-white rounded shadow-lg shadow-gray-100/50 card dark:bg-neutral-800 dark:shadow-neutral-600/20 group/blog">
                                    <div class="relative overflow-hidden">
                                        <img src="../user/blog/blogCRUD/uploads/<?php echo $blogItem['blog_cover']; ?>" alt=""
                                            class="rounded">
                                        <div
                                            class="absolute inset-0 hidden transition-all duration-500 rounded-md bg-black/30 group-hover/blog:block">
                                        </div>
                                        <div
                                            class="hidden text-white transition-all duration-500 top-2 left-2 group-hover/blog:block author group-hover/blog:absolute">
                                            <p class="mb-0 "><i class="mdi mdi-account text-light"></i> <a
                                                    href="javascript:void(0)" class="text-light user">Dirio Walls</a></p>
                                            <p class="mb-0 text-light date"><i class="mdi mdi-calendar-check"></i>
                                                <?php echo date('d F, Y', strtotime($blogItem['created_at'])); ?>
                                            </p>
                                        </div>
                                        <div
                                            class="hidden bottom-2 right-2 group-hover/blog:block author group-hover/blog:absolute">
                                            <ul class="mb-0 list-unstyled">
                                                <li class="list-inline-item"><a href="javascript:void(0)"
                                                        class="text-white"><i class="mdi mdi-heart-outline me-1"></i> 33</a>
                                                </li>
                                                <li class="list-inline-item"><a href="javascript:void(0)"
                                                        class="text-white"><i class="mdi mdi-comment-outline me-1"></i>
                                                        08</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="p-5">
                                        <a href="blog-details.php?blog_id=<?php echo $blogItem['blog_id']; ?>"
                                            class="primary-link">
                                            <h5 class="mb-1 text-gray-900 fs-17 dark:text-gray-50">
                                                <?php echo $blogItem['blog_title']; ?>
                                            </h5>
                                        </a>
                                        <p class="mb-3 text-gray-500 dark:text-gray-300">
                                            <?php echo $blogItem['blog_tagline']; ?>
                                        </p>
                                        <a href="blog-details.php?blog_id=<?php echo $blogItem['blog_id']; ?>"
                                            class="font-medium group-data-[theme-color=violet]:text-violet-500 group-data-[theme-color=sky]:text-sky-500 group-data-[theme-color=red]:text-red-500 group-data-[theme-color=green]:text-green-500 group-data-[theme-color=pink]:text-pink-500 group-data-[theme-color=blue]:text-blue-500">Read
                                            more <i class="align-middle mdi mdi-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>



                </div>
            </section>
            <!-- end blog -->



        </div>
    </div>


    <?php
    include('footer.php');
    ?>


    <script src="https://unicons.iconscout.com/release/v4.0.0/script/monochrome/bundle.js"></script>
    <script src="../assets/libs/@popperjs/core/umd/popper.min.js"></script>
    <script src="../assets/libs/simplebar/simplebar.min.js"></script>


    <script src="../assets/js/pages/switcher.js"></script>

    <script src="../assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>

    <script src="../assets/js/pages/job-list.init.js"></script>

    <script src="../assets/js/pages/dropdown&modal.init.js"></script>

    <!-- Swiper Js -->
    <script src="../assets/libs/swiper/swiper-bundle.min.js"></script>
    <script src="../assets/js/pages/swiper.init.js"></script>

    <script src="../assets/js/pages/nav&tabs.js"></script>

    <script src="../assets/js/app.js"></script>

</body>

</html>