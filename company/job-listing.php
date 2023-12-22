
<?php
    session_start();
    if(!isset($_SESSION['username'])) {
        header("Location:http://localhost/Seekers---job-portal-using-php-tailwind-mysql/index.php");

    }else if(!isset($_SESSION['username']) AND $_SESSION['role']=='admin'){
        header("Location:http://localhost/Seekers---job-portal-using-php-tailwind-mysql/admin/dashboard-admin.php");
    }else if(!isset($_SESSION['username']) AND $_SESSION['role']=='user'){
        header("Location:http://localhost/Seekers---job-portal-using-php-tailwind-mysql/user/dashboard-user.php");
    }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" data-mode="light" class="scroll-smooths group" data-theme-color="violet">
    <head>
        <meta charset="utf-8" />
        <title>index-1 | Jobcy - Admin & Dashboard Template</title>
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
        <link rel="shortcut icon" href="../assets/images/favicon.ico" />


         <link rel="stylesheet" href="../assets/libs/choices.js/public/assets/styles/choices.min.css">

        <link rel="stylesheet" href="../assets/css/icons.css" />
        <link rel="stylesheet" href="../assets/css/tailwind.css" />
    
    <body class="bg-white dark:bg-neutral-800">


    <?php include('nav.php');?>


                <div class="fixed z-40 flex flex-col gap-3 ltr:left-0 rtl:right-0 top-[330px]">
                    <!-- light-dark mode button -->
                    <a href="javascript: void(0);" id="ltr-rtl" class="z-40 px-3 py-3 font-medium text-white transition-all duration-300 ease-linear group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500 text-14 hover:bg-violet-700 ltr:rounded-r rtl:rounded-l" onclick="changeMode(event)">
                                <span class="ltr:hidden">LTR</span>
                                <span  class="rtl:hidden">RTL</span>
                            </a>  
           
                </div> 
        
                <div class="fixed transition-all duration-300 ease-linear top-[27.5rem] switcher" id="style-switcher">
                    <div class="w-48 p-4 bg-white shadow-md" >
                        <div>
                            <h3 class="mb-2 font-semibold text-gray-900 text-16">Select your color</h3>
                            <ul class="flex gap-3 ">
                                <li>
                                    <a class="h-10 w-10 bg-[#815DF2] block rounded-full" data-color="violet" href="javascript: void(0);"></a>
                                </li>
                                <li>
                                    <a class="h-10 w-10 bg-[#69cdf1] block rounded-full" data-color="sky" href="javascript: void(0);"></a>
                                </li>
                                <li>
                                    <a class="h-10 w-10 bg-[#dd4948] block rounded-full" data-color="red" href="javascript: void(0);"></a>
                                </li>
                            </ul>
                            <ul class="flex gap-3 mt-4">
                                <li>
                                    <a class="h-10 w-10 bg-[#38c284] block rounded-full" data-color="green" href="javascript: void(0);"></a>
                                </li>
                                 <li>
                                    <a class="h-10 w-10 bg-[#e35490] block rounded-full" data-color="pink"  href="javascript: void(0);"></a>
                                </li>
                                <li>
                                    <a class="h-10 w-10 bg-[#5276f4] block rounded-full" data-color="blue" href="javascript: void(0);"></a>
                                </li>
                            </ul>
                        </div>

                        <div class="mt-5">
                            <h3 class="mb-2 font-semibold text-gray-900 text-16">Light/dark Layout</h3>
                            <div class="flex justify-center mt-2">
                                   <!-- light-dark mode button -->
                                <a href="javascript: void(0);" id="mode" class="z-40 px-6 py-2 font-normal text-white transition-all duration-300 ease-linear rounded text-14 bg-zinc-800" onclick="changeMode(event)">
                                    <i class="hidden text-xl uil uil-brightness dark:text-white dark:inline-block"></i>
                                    <i class="inline-block text-xl uil uil-moon dark:text-zinc-800 dark:hidden"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div> 
                <!-- light-dark mode button -->
                <a href="javascript: void(0);" onclick="toggleSwitcher()" class="fixed z-40 flex flex-col gap-3 px-4 py-3 font-normal text-white group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500 top-96 text-14 ltr:rounded-r rtl:rounded-l">
                    <i class="text-xl mdi mdi-cog mdi-spin"></i>
                </a> 

        <div class="main-content">
            <div class="page-content">

                <section class="pt-28 lg:pt-44 pb-28 group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500 dark:bg-neutral-900 bg-[url('../images/home/page-title.png')] bg-center bg-cover relative" >
                    <div class="container mx-auto">
                        <div class="grid">
                            <div class="col-span-12">
                                <div class="text-center text-white">
                                    <h3 class="mb-4 text-[26px]">Job List 2</h3>
                                    <div class="page-next">
                                        <nav class="inline-block" aria-label="breadcrumb text-center">
                                            <ol class="flex flex-wrap justify-center text-sm font-medium uppercase">
                                                <li><a href="index.html">Home</a></li>
                                                <li><i class="bx bxs-chevron-right align-middle px-2.5"></i><a href="javascript:void(0)">Company</a></li>
                                                <li class="active" aria-current="page"><i class="bx bxs-chevron-right align-middle px-2.5"></i> Job List 2</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <img src="../assets/images/about/shape.png" alt="" class="absolute block bg-cover -bottom-0 dark:hidden">
                    <img src="../assets/images/about/shape-dark.png" alt="" class="absolute hidden bg-cover -bottom-0 dark:block">
                </section>
                
                <!-- Start team -->
                    <section class="py-16">
                        <div class="container mx-auto">
                            <div class="grid grid-cols-12 xl:gap-10 gap-y-12">
                                <div class="col-span-12 xl:col-span-9">
                                    <div class="job-list-header">
                                         <form action="#">
                                            <div class="grid grid-cols-12 gap-3">
                                                <div class="col-span-12 xl:col-span-3">
                                                    <div class="relative filler-job-form">
                                                        <i class="uil uil-briefcase-alt"></i>
                                                        <input type="search" class="w-full filter-job-input-box dark:text-gray-100" id="exampleFormControlInput1" placeholder="Job, company... ">
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-span-12 xl:col-span-3">
                                                    <div class="relative filler-job-form">
                                                        <i class="uil uil-location-point"></i>
                                                        <select class="form-select" data-trigger name="choices-single-location" id="choices-single-location" aria-label="Default select example">
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
                                                            <option value="MK">Macedonia, the former Yugoslav Republic of</option>
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
                                                            <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
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
                                                            <option value="GS">South Georgia and the South Sandwich Islands</option>
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
                                                </div>
                                                <!--end col-->
                                                <div class="col-span-12 xl:col-span-3">
                                                    <div class="relative filler-job-form">
                                                        <i class="uil uil-clipboard-notes"></i>
                                                        <select class="form-select " data-trigger name="choices-single-categories" id="choices-single-categories" aria-label="Default select example">
                                                            <option value="4">Accounting</option>
                                                            <option value="1">IT & Software</option>
                                                            <option value="3">Marketing</option>
                                                            <option value="5">Banking</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-span-12 xl:col-span-3">
                                                    <a href="javascript:void(0)" class="w-full text-white border-transparent btn group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500 focus:ring focus:ring-custom-500/30"><i class="uil uil-filter"></i> Fliter</a>
                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!--end grid-->
                                        </form>
                                    </div>
                                    <div class="mt-8">
                                        <h6 class="mb-4 text-gray-900 dark:text-gray-50">Popular</h6>
                                        <ul class="flex flex-wrap gap-3">
                                            <li class="border p-[6px] border-gray-100/50 rounded group/joblist dark:border-gray-100/20">
                                                <div class="flex items-center">
                                                    <div class="h-8 w-8 text-center group-data-[theme-color=violet]:bg-violet-500/20 group-data-[theme-color=sky]:bg-sky-500/20 group-data-[theme-color=red]:bg-red-500/20 group-data-[theme-color=green]:bg-green-500/20 group-data-[theme-color=pink]:bg-pink-500/20 group-data-[theme-color=blue]:bg-blue-500/20 leading-[2.4] rounded group-data-[theme-color=violet]:text-violet-500 group-data-[theme-color=sky]:text-sky-500 group-data-[theme-color=red]:text-red-500 group-data-[theme-color=green]:text-green-500 group-data-[theme-color=pink]:text-pink-500 group-data-[theme-color=blue]:text-blue-500 text-sm font-medium">
                                                        20
                                                    </div>
                                                    <a href="javascript:void(0)" class="text-gray-900 ltr:ml-2 rtl:mr-2 dark:text-gray-50">
                                                        <h6 class="mb-0 transition-all duration-300 fs-14 group-data-[theme-color=violet]:group-hover/joblist:text-violet-500 group-data-[theme-color=sky]:group-hover/joblist:text-sky-500 group-data-[theme-color=red]:group-hover/joblist:text-red-500 group-data-[theme-color=green]:group-hover/joblist:text-green-500 group-data-[theme-color=pink]:group-hover/joblist:text-pink-500 group-data-[theme-color=blue]:group-hover/joblist:text-blue-500">UI/UX designer</h6>
                                                    </a>
                                                </div>
                                            </li>
                                            <li class="border p-[6px] border-gray-100/50 rounded group/joblist dark:border-gray-100/20">
                                                <div class="flex items-center">
                                                    <div class="h-8 w-8 text-center group-data-[theme-color=violet]:bg-violet-500/20 group-data-[theme-color=sky]:bg-sky-500/20 group-data-[theme-color=red]:bg-red-500/20 group-data-[theme-color=green]:bg-green-500/20 group-data-[theme-color=pink]:bg-pink-500/20 group-data-[theme-color=blue]:bg-blue-500/20 leading-[2.4] rounded group-data-[theme-color=violet]:text-violet-500 group-data-[theme-color=sky]:text-sky-500 group-data-[theme-color=red]:text-red-500 group-data-[theme-color=green]:text-green-500 group-data-[theme-color=pink]:text-pink-500 group-data-[theme-color=blue]:text-blue-500 text-sm font-medium">
                                                        18
                                                    </div>
                                                    <a href="javascript:void(0)" class="text-gray-900 ltr:ml-2 rtl:mr-2 dark:text-gray-50">
                                                        <h6 class="mb-0 transition-all duration-300 fs-14 group-data-[theme-color=violet]:group-hover/joblist:text-violet-500 group-data-[theme-color=sky]:group-hover/joblist:text-sky-500 group-data-[theme-color=red]:group-hover/joblist:text-red-500 group-data-[theme-color=green]:group-hover/joblist:text-green-500 group-data-[theme-color=pink]:group-hover/joblist:text-pink-500 group-data-[theme-color=blue]:group-hover/joblist:text-blue-500">HR manager</h6>
                                                    </a>
                                                </div>
                                            </li>
                                            <li class="border p-[6px] border-gray-100/50 rounded group/joblist dark:border-gray-100/20">
                                                <div class="flex items-center">
                                                    <div class="h-8 w-8 text-center group-data-[theme-color=violet]:bg-violet-500/20 group-data-[theme-color=sky]:bg-sky-500/20 group-data-[theme-color=red]:bg-red-500/20 group-data-[theme-color=green]:bg-green-500/20 group-data-[theme-color=pink]:bg-pink-500/20 group-data-[theme-color=blue]:bg-blue-500/20 leading-[2.4] rounded group-data-[theme-color=violet]:text-violet-500 group-data-[theme-color=sky]:text-sky-500 group-data-[theme-color=red]:text-red-500 group-data-[theme-color=green]:text-green-500 group-data-[theme-color=pink]:text-pink-500 group-data-[theme-color=blue]:text-blue-500 text-sm font-medium">
                                                        10
                                                    </div>
                                                    <a href="javascript:void(0)" class="text-gray-900 ltr:ml-2 rtl:mr-2 dark:text-gray-50">
                                                        <h6 class="mb-0 transition-all duration-300 fs-14 group-data-[theme-color=violet]:group-hover/joblist:text-violet-500 group-data-[theme-color=sky]:group-hover/joblist:text-sky-500 group-data-[theme-color=red]:group-hover/joblist:text-red-500 group-data-[theme-color=green]:group-hover/joblist:text-green-500 group-data-[theme-color=pink]:group-hover/joblist:text-pink-500 group-data-[theme-color=blue]:group-hover/joblist:text-blue-500">Product manager</h6>
                                                    </a>
                                                </div>
                                            </li>
                                            <li class="border p-[6px] border-gray-100/50 rounded group/joblist dark:border-gray-100/20">
                                                <div class="flex items-center">
                                                    <div class="h-8 w-8 text-center group-data-[theme-color=violet]:bg-violet-500/20 group-data-[theme-color=sky]:bg-sky-500/20 group-data-[theme-color=red]:bg-red-500/20 group-data-[theme-color=green]:bg-green-500/20 group-data-[theme-color=pink]:bg-pink-500/20 group-data-[theme-color=blue]:bg-blue-500/20 leading-[2.4] rounded group-data-[theme-color=violet]:text-violet-500 group-data-[theme-color=sky]:text-sky-500 group-data-[theme-color=red]:text-red-500 group-data-[theme-color=green]:text-green-500 group-data-[theme-color=pink]:text-pink-500 group-data-[theme-color=blue]:text-blue-500 text-sm font-medium">
                                                        15
                                                    </div>
                                                    <a href="javascript:void(0)" class="text-gray-900 ltr:ml-2 rtl:mr-2 dark:text-gray-50">
                                                        <h6 class="mb-0 transition-all duration-300 fs-14 group-data-[theme-color=violet]:group-hover/joblist:text-violet-500 group-data-[theme-color=sky]:group-hover/joblist:text-sky-500 group-data-[theme-color=red]:group-hover/joblist:text-red-500 group-data-[theme-color=green]:group-hover/joblist:text-green-500 group-data-[theme-color=pink]:group-hover/joblist:text-pink-500 group-data-[theme-color=blue]:group-hover/joblist:text-blue-500">Sales manager</h6>
                                                    </a>
                                                </div>
                                            </li>
                                            <li class="border p-[6px] border-gray-100/50 rounded group/joblist dark:border-gray-100/20">
                                                <div class="flex items-center">
                                                    <div class="h-8 w-8 text-center group-data-[theme-color=violet]:bg-violet-500/20 group-data-[theme-color=sky]:bg-sky-500/20 group-data-[theme-color=red]:bg-red-500/20 group-data-[theme-color=green]:bg-green-500/20 group-data-[theme-color=pink]:bg-pink-500/20 group-data-[theme-color=blue]:bg-blue-500/20 leading-[2.4] rounded group-data-[theme-color=violet]:text-violet-500 group-data-[theme-color=sky]:text-sky-500 group-data-[theme-color=red]:text-red-500 group-data-[theme-color=green]:text-green-500 group-data-[theme-color=pink]:text-pink-500 group-data-[theme-color=blue]:text-blue-500 text-sm font-medium">
                                                        28
                                                    </div>
                                                    <a href="javascript:void(0)" class="text-gray-900 ltr:ml-2 rtl:mr-2 dark:text-gray-50">
                                                        <h6 class="mb-0 transition-all duration-300 fs-14 group-data-[theme-color=violet]:group-hover/joblist:text-violet-500 group-data-[theme-color=sky]:group-hover/joblist:text-sky-500 group-data-[theme-color=red]:group-hover/joblist:text-red-500 group-data-[theme-color=green]:group-hover/joblist:text-green-500 group-data-[theme-color=pink]:group-hover/joblist:text-pink-500 group-data-[theme-color=blue]:group-hover/joblist:text-blue-500">Developer</h6>
                                                    </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="space-y-8 mt-14">
                                        <div class="relative overflow-hidden transition-all duration-500 ease-in-out bg-white border rounded-md border-gray-100/50 group/jobs group-data-[theme-color=violet]:hover:border-violet-500 group-data-[theme-color=sky]:hover:border-sky-500 group-data-[theme-color=red]:hover:border-red-500 group-data-[theme-color=green]:hover:border-green-500 group-data-[theme-color=pink]:hover:border-pink-500 group-data-[theme-color=blue]:hover:border-blue-500 hover:-translate-y-2 dark:bg-neutral-900 dark:border-neutral-600">
                                            <div class="p-6">
                                                <div class="grid grid-cols-12 gap-5">
                                                    <div class="col-span-12 lg:col-span-1">
                                                        <div class="px-2 mb-4 text-center mb-md-0">
                                                            <a href="company-details.html"><img src="../assets/images/featured-job/img-01.png" alt="" class="mx-auto img-fluid rounded-3"></a>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-span-10">
                                                        <h5 class="mb-1 fs-17"><a href="job-details.html" class="dark:text-gray-50">HTML Developer</a> 
                                                            <small class="font-normal text-gray-500 dark:text-gray-300">(0-2 Yrs Exp.)</small>
                                                        </h5>
                                                        <ul class="flex flex-wrap mb-0 lg:gap-3 gap-y-3">
                                                            <li>
                                                                <p class="mb-0 text-sm text-gray-500 dark:text-gray-300">Jobcy Technology Pvt.Ltd</p>
                                                            </li>
                                                            <li>
                                                                <p class="mb-0 text-sm text-gray-500 dark:text-gray-300"><i class="mdi mdi-map-marker"></i> California</p>
                                                            </li>
                                                            <li>
                                                                <p class="mb-0 text-sm text-gray-500 dark:text-gray-300"><i class="uil uil-wallet"></i> $250 - $800 / month</p>
                                                            </li>
                                                        </ul>
                                                        <div class="mt-4">
                                                            <div class="flex flex-wrap gap-1.5">
                                                                <span class="bg-green-500/20 text-green-500 text-11 px-2 py-0.5 font-medium rounded">Full Time</span>
                                                                <span class="bg-yellow-500/20 text-yellow-500 text-11 px-2 py-0.5 font-medium rounded">Urgent</span>
                                                                <span class="bg-sky-500/20 text-sky-500 text-11 px-2 py-0.5 font-medium rounded">Private</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end row-->
                                            </div>
                                            <div class="px-4 py-3 bg-gray-50 dark:bg-neutral-700">
                                                <div class="grid grid-cols-12">
                                                    <div class="col-span-12 lg:col-span-6">
                                                        <ul class="flex flex-wrap gap-2 text-gray-700 dark:text-gray-50">
                                                            <li><i class="uil uil-tag"></i> Keywords :</li>
                                                            <li><a href="javascript:void(0)" class="primary-link text-muted">Ui designer</a>,</li>
                                                            <li><a href="javascript:void(0)" class="primary-link text-muted">developer</a></li>
                                                        </ul>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-span-12 mt-2 lg:col-span-6 lg:mt-0">
                                                        <div class="ltr:lg:text-right rtl:lg:text-left dark:text-gray-50">
                                                            <a href="#applyNow" data-bs-toggle="modal">Apply Now <i class="mdi mdi-chevron-double-right"></i></a>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                </div>
                                                <!--end row-->
                                            </div>
                                            <div class="absolute top-4 ltr:right-4 rtl:left-4">
                                                <div class="w-8 h-8 text-center text-white bg-red-600 rounded">
                                                    <a href="javascript:void(0)"><i class="uil uil-heart-alt text-lg leading-[1.9]"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="relative overflow-hidden transition-all duration-500 ease-in-out bg-white border rounded-md border-gray-100/50 group group-data-[theme-color=violet]:hover:border-violet-500 group-data-[theme-color=sky]:hover:border-sky-500 group-data-[theme-color=red]:hover:border-red-500 group-data-[theme-color=green]:hover:border-green-500 group-data-[theme-color=pink]:hover:border-pink-500 group-data-[theme-color=blue]:hover:border-blue-500 hover:-translate-y-2 dark:bg-neutral-900 dark:border-neutral-600">
                                            <div class="p-6">
                                                <div class="grid grid-cols-12 gap-5">
                                                    <div class="col-span-12 lg:col-span-1">
                                                        <div class="px-2 mb-4 text-center mb-md-0">
                                                            <a href="company-details.html"><img src="../assets/images/featured-job/img-02.png" alt="" class="mx-auto img-fluid rounded-3"></a>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-span-10">
                                                        <h5 class="mb-1 fs-17"><a href="job-details.html" class="dark:text-gray-50">Marketing Director</a> 
                                                            <small class="font-normal text-gray-500 dark:text-gray-300">(2-4 Yrs Exp.)</small>
                                                        </h5>
                                                        <ul class="flex flex-wrap mb-0 lg:gap-3 gap-y-3">
                                                            <li>
                                                                <p class="mb-0 text-sm text-gray-500 dark:text-gray-300">Jobcy Technology Pvt.Ltd</p>
                                                            </li>
                                                            <li>
                                                                <p class="mb-0 text-sm text-gray-500 dark:text-gray-300"><i class="mdi mdi-map-marker"></i> New York</p>
                                                            </li>
                                                            <li>
                                                                <p class="mb-0 text-sm text-gray-500 dark:text-gray-300"><i class="uil uil-wallet"></i>$250 - $800 / month </p>
                                                            </li>
                                                        </ul>
                                                        <div class="mt-4">
                                                            <div class="flex flex-wrap gap-1.5">
                                                                <span class="bg-red-500/20 text-red-500 text-11 px-2 py-0.5 font-medium rounded">Part Time</span>
                                                                <span class="bg-sky-500/20 text-sky-500 text-11 px-2 py-0.5 font-medium rounded">Private</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end row-->
                                            </div>
                                            <div class="px-4 py-3 bg-gray-50 dark:bg-neutral-700">
                                                <div class="grid grid-cols-12">
                                                    <div class="col-span-12 lg:col-span-6">
                                                        <ul class="flex flex-wrap gap-2 text-gray-700 dark:text-gray-50">
                                                            <li><i class="uil uil-tag"></i> Keywords :</li>
                                                            <li><a href="javascript:void(0)" class="primary-link text-muted"> Marketing</a>,</li>
                                                            <li><a href="javascript:void(0)" class="primary-link text-muted">business</a></li>
                                                        </ul>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-span-12 mt-2 lg:col-span-6 lg:mt-0">
                                                        <div class="ltr:lg:text-right rtl:lg:text-left dark:text-gray-50">
                                                            <a href="#applyNow" data-bs-toggle="modal">Apply Now <i class="mdi mdi-chevron-double-right"></i></a>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                </div>
                                                <!--end row-->
                                            </div>
                                            <div class="absolute top-4 ltr:right-4 rtl:left-4">
                                                <div class="w-8 h-8 text-center text-gray-100 transition-all duration-300 bg-transparent border rounded border-gray-100/50 hover:bg-red-600 hover:border-transparent hover:text-white">
                                                    <a href="javascript:void(0)"><i class="uil uil-heart-alt text-lg leading-[1.8]"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="relative overflow-hidden transition-all duration-500 ease-in-out bg-white border rounded-md border-gray-100/50 group group-data-[theme-color=violet]:hover:border-violet-500 group-data-[theme-color=sky]:hover:border-sky-500 group-data-[theme-color=red]:hover:border-red-500 group-data-[theme-color=green]:hover:border-green-500 group-data-[theme-color=pink]:hover:border-pink-500 group-data-[theme-color=blue]:hover:border-blue-500 hover:-translate-y-2 dark:bg-neutral-900 dark:border-neutral-600">
                                            <div class="p-6">
                                                <div class="grid grid-cols-12 gap-5">
                                                    <div class="col-span-12 lg:col-span-1">
                                                        <div class="px-2 mb-4 text-center mb-md-0">
                                                            <a href="company-details.html"><img src="../assets/images/featured-job/img-03.png" alt="" class="mx-auto img-fluid rounded-3"></a>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-span-10">
                                                        <h5 class="mb-1 fs-17"><a href="job-details.html" class="dark:text-gray-50">HTML Developer</a> 
                                                            <small class="font-normal text-gray-500 dark:text-gray-300"> (2-4 Yrs Exp.)    </small>
                                                        </h5>
                                                        <ul class="flex flex-wrap mb-0 lg:gap-3 gap-y-3">
                                                            <li>
                                                                <p class="mb-0 text-sm text-gray-500 dark:text-gray-300">Jobcy Technology Pvt.Ltd</p>
                                                            </li>
                                                            <li>
                                                                <p class="mb-0 text-sm text-gray-500 dark:text-gray-300"><i class="mdi mdi-map-marker"></i> California</p>
                                                            </li>
                                                            <li>
                                                                <p class="mb-0 text-sm text-gray-500 dark:text-gray-300"><i class="uil uil-wallet"></i>$250 - $800 / month </p>
                                                            </li>
                                                        </ul>
                                                        <div class="mt-4">
                                                            <div class="flex flex-wrap gap-1.5">
                                                                <span class="bg-violet-500/20 text-violet-500 text-11 px-2 py-0.5 font-medium rounded">Freelance</span>
                                                                <span class="bg-sky-500/20 text-sky-500 text-11 px-2 py-0.5 font-medium rounded">Internship</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end row-->
                                            </div>
                                            <div class="px-4 py-3 bg-gray-50 dark:bg-neutral-700">
                                                <div class="grid grid-cols-12">
                                                    <div class="col-span-12 lg:col-span-6">
                                                        <ul class="flex flex-wrap gap-2 text-gray-700 dark:text-gray-50">
                                                            <li><i class="uil uil-tag"></i> Keywords :</li>
                                                            <li><a href="javascript:void(0)" class="primary-link text-muted"> Marketing</a>,</li>
                                                            <li><a href="javascript:void(0)" class="primary-link text-muted">business</a></li>
                                                        </ul>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-span-12 mt-2 lg:col-span-6 lg:mt-0">
                                                        <div class="ltr:lg:text-right rtl:lg:text-left dark:text-gray-50">
                                                            <a href="#applyNow" data-bs-toggle="modal">Apply Now <i class="mdi mdi-chevron-double-right"></i></a>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                </div>
                                                <!--end row-->
                                            </div>
                                            <div class="absolute top-4 ltr:right-4 rtl:left-4">
                                                <div class="w-8 h-8 text-center text-white bg-red-600 rounded">
                                                    <a href="javascript:void(0)"><i class="uil uil-heart-alt text-lg leading-[1.9]"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="relative overflow-hidden transition-all duration-500 ease-in-out bg-white border rounded-md border-gray-100/50 group group-data-[theme-color=violet]:hover:border-violet-500 group-data-[theme-color=sky]:hover:border-sky-500 group-data-[theme-color=red]:hover:border-red-500 group-data-[theme-color=green]:hover:border-green-500 group-data-[theme-color=pink]:hover:border-pink-500 group-data-[theme-color=blue]:hover:border-blue-500 hover:-translate-y-2 dark:bg-neutral-900 dark:border-neutral-600">
                                            <div class="p-6">
                                                <div class="grid grid-cols-12 gap-5">
                                                    <div class="col-span-12 lg:col-span-1">
                                                        <div class="px-2 mb-4 text-center mb-md-0">
                                                            <a href="company-details.html"><img src="../assets/images/featured-job/img-04.png" alt="" class="mx-auto img-fluid rounded-3"></a>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-span-10">
                                                        <h5 class="mb-1 fs-17"><a href="job-details.html" class="dark:text-gray-50">Product Sales Specialist</a> 
                                                            <small class="font-normal text-gray-500 dark:text-gray-300"> (5+ Yrs Exp.)</small>
                                                        </h5>
                                                        <ul class="flex flex-wrap mb-0 lg:gap-3 gap-y-3">
                                                            <li>
                                                                <p class="mb-0 text-sm text-gray-500 dark:text-gray-300">Jobcy Technology Pvt.Ltd</p>
                                                            </li>
                                                            <li>
                                                                <p class="mb-0 text-sm text-gray-500 dark:text-gray-300"><i class="mdi mdi-map-marker"></i> California</p>
                                                            </li>
                                                            <li>
                                                                <p class="mb-0 text-sm text-gray-500 dark:text-gray-300"><i class="uil uil-wallet"></i>$250 - $800 / month</p>
                                                            </li>
                                                        </ul>
                                                        <div class="mt-4">
                                                            <div class="flex flex-wrap gap-1.5">
                                                                <span class="bg-green-500/20 text-green-500 text-11 px-2 py-0.5 font-medium rounded">Full Time</span>
                                                                <span class="bg-sky-500/20 text-sky-500 text-11 px-2 py-0.5 font-medium rounded">Private</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end row-->
                                            </div>
                                            <div class="px-4 py-3 bg-gray-50 dark:bg-neutral-700">
                                                <div class="grid grid-cols-12">
                                                    <div class="col-span-12 lg:col-span-6">
                                                        <ul class="flex flex-wrap gap-2 text-gray-700 dark:text-gray-50">
                                                            <li><i class="uil uil-tag"></i> Keywords :</li>
                                                            <li><a href="javascript:void(0)" class="primary-link text-muted"> Ui designer</a>,</li>
                                                            <li><a href="javascript:void(0)" class="primary-link text-muted"> developer</a></li>
                                                        </ul>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-span-12 mt-2 lg:col-span-6 lg:mt-0">
                                                        <div class="ltr:lg:text-right rtl:lg:text-left dark:text-gray-50">
                                                            <a href="#applyNow" data-bs-toggle="modal">Apply Now <i class="mdi mdi-chevron-double-right"></i></a>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                </div>
                                                <!--end row-->
                                            </div>
                                            <div class="absolute top-4 ltr:right-4 rtl:left-4">
                                                <div class="w-8 h-8 text-center text-gray-100 transition-all duration-300 bg-transparent border rounded border-gray-100/50 hover:bg-red-600 hover:border-transparent hover:text-white">
                                                    <a href="javascript:void(0)"><i class="uil uil-heart-alt text-lg leading-[1.8]"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="relative overflow-hidden transition-all duration-500 ease-in-out bg-white border rounded-md border-gray-100/50 group group-data-[theme-color=violet]:hover:border-violet-500 group-data-[theme-color=sky]:hover:border-sky-500 group-data-[theme-color=red]:hover:border-red-500 group-data-[theme-color=green]:hover:border-green-500 group-data-[theme-color=pink]:hover:border-pink-500 group-data-[theme-color=blue]:hover:border-blue-500 hover:-translate-y-2 dark:bg-neutral-900 dark:border-neutral-600">
                                            <div class="p-6">
                                                <div class="grid grid-cols-12 gap-5">
                                                    <div class="col-span-12 lg:col-span-1">
                                                        <div class="px-2 mb-4 text-center mb-md-0">
                                                            <a href="company-details.html"><img src="../assets/images/featured-job/img-05.png" alt="" class="mx-auto img-fluid rounded-3"></a>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-span-10">
                                                        <h5 class="mb-1 fs-17"><a href="job-details.html" class="dark:text-gray-50">Product Designer</a> 
                                                            <small class="font-normal text-gray-500 dark:text-gray-300"> (0-5 Yrs Exp.)</small>
                                                        </h5>
                                                        <ul class="flex flex-wrap mb-0 lg:gap-3 gap-y-3">
                                                            <li>
                                                                <p class="mb-0 text-sm text-gray-500 dark:text-gray-300">Creative Agency</p>
                                                            </li>
                                                            <li>
                                                                <p class="mb-0 text-sm text-gray-500 dark:text-gray-300"><i class="mdi mdi-map-marker"></i> California</p>
                                                            </li>
                                                            <li>
                                                                <p class="mb-0 text-sm text-gray-500 dark:text-gray-300"><i class="uil uil-wallet"></i>$250 - $800 / month</p>
                                                            </li>
                                                        </ul>
                                                        <div class="mt-4">
                                                            <div class="flex flex-wrap gap-1.5">
                                                                <span class="bg-sky-500/20 text-sky-500 text-11 px-2 py-0.5 font-medium rounded"> Internship</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end row-->
                                            </div>
                                            <div class="px-4 py-3 bg-gray-50 dark:bg-neutral-700">
                                                <div class="grid grid-cols-12">
                                                    <div class="col-span-12 lg:col-span-6">
                                                        <ul class="flex flex-wrap gap-2 text-gray-700 dark:text-gray-50">
                                                            <li><i class="uil uil-tag"></i> Keywords :</li>
                                                            <li><a href="javascript:void(0)" class="primary-link text-muted"> developer</a></li>
                                                        </ul>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-span-12 mt-2 lg:col-span-6 lg:mt-0">
                                                        <div class="ltr:lg:text-right rtl:lg:text-left dark:text-gray-50">
                                                            <a href="#applyNow" data-bs-toggle="modal">Apply Now <i class="mdi mdi-chevron-double-right"></i></a>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                </div>
                                                <!--end row-->
                                            </div>
                                            <div class="absolute top-4 ltr:right-4 rtl:left-4">
                                                <div class="w-8 h-8 text-center text-gray-100 transition-all duration-300 bg-transparent border rounded border-gray-100/50 hover:bg-red-600 hover:border-transparent hover:text-white">
                                                    <a href="javascript:void(0)"><i class="uil uil-heart-alt text-lg leading-[1.8]"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="relative overflow-hidden transition-all duration-500 ease-in-out bg-white border rounded-md border-gray-100/50 group group-data-[theme-color=violet]:hover:border-violet-500 group-data-[theme-color=sky]:hover:border-sky-500 group-data-[theme-color=red]:hover:border-red-500 group-data-[theme-color=green]:hover:border-green-500 group-data-[theme-color=pink]:hover:border-pink-500 group-data-[theme-color=blue]:hover:border-blue-500 hover:-translate-y-2 dark:bg-neutral-900 dark:border-neutral-600">
                                            <div class="p-6">
                                                <div class="grid grid-cols-12 gap-5">
                                                    <div class="col-span-12 lg:col-span-1">
                                                        <div class="px-2 mb-4 text-center mb-md-0">
                                                            <a href="company-details.html"><img src="../assets/images/featured-job/img-06.png" alt="" class="mx-auto img-fluid rounded-3"></a>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-span-10">
                                                        <h5 class="mb-1 fs-17"><a href="job-details.html" class="dark:text-gray-50">Project Manager</a> 
                                                            <small class="font-normal text-gray-500 dark:text-gray-300"> (0-2 Yrs Exp.)</small>
                                                        </h5>
                                                        <ul class="flex flex-wrap mb-0 lg:gap-3 gap-y-3">
                                                            <li>
                                                                <p class="mb-0 text-sm text-gray-500 dark:text-gray-300">Jobcy Technology Pvt.Ltd</p>
                                                            </li>
                                                            <li>
                                                                <p class="mb-0 text-sm text-gray-500 dark:text-gray-300"><i class="mdi mdi-map-marker"></i> California</p>
                                                            </li>
                                                            <li>
                                                                <p class="mb-0 text-sm text-gray-500 dark:text-gray-300"><i class="uil uil-wallet"></i>$250 - $800 / month</p>
                                                            </li>
                                                        </ul>
                                                        <div class="mt-4">
                                                            <div class="flex flex-wrap gap-1.5">
                                                                <span class="bg-green-500/20 text-green-500 text-11 px-2 py-0.5 font-medium rounded"> Full Time</span>
                                                                <span class="bg-yellow-500/20 text-yellow-500 text-11 px-2 py-0.5 font-medium rounded"> Urgent</span>
                                                                <span class="bg-sky-500/20 text-sky-500 text-11 px-2 py-0.5 font-medium rounded"> Private</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end row-->
                                            </div>
                                            <div class="px-4 py-3 bg-gray-50 dark:bg-neutral-700">
                                                <div class="grid grid-cols-12">
                                                    <div class="col-span-12 lg:col-span-6">
                                                        <ul class="flex flex-wrap gap-2 text-gray-700 dark:text-gray-50">
                                                            <li><i class="uil uil-tag"></i> Keywords :</li>
                                                            <li><a href="javascript:void(0)" class="primary-link text-muted"> Ui designer</a>,</li>
                                                            <li><a href="javascript:void(0)" class="primary-link text-muted"> developer</a></li>
                                                        </ul>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-span-12 mt-2 lg:col-span-6 lg:mt-0">
                                                        <div class="ltr:lg:text-right rtl:lg:text-left dark:text-gray-50">
                                                            <a href="#applyNow" data-bs-toggle="modal">Apply Now <i class="mdi mdi-chevron-double-right"></i></a>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                </div>
                                                <!--end row-->
                                            </div>
                                            <div class="absolute top-4 ltr:right-4 rtl:left-4">
                                                <div class="w-8 h-8 text-center text-gray-100 transition-all duration-300 bg-transparent border rounded border-gray-100/50 hover:bg-red-600 hover:border-transparent hover:text-white">
                                                    <a href="javascript:void(0)"><i class="uil uil-heart-alt text-lg leading-[1.8]"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="relative overflow-hidden transition-all duration-500 ease-in-out bg-white border rounded-md border-gray-100/50 group group-data-[theme-color=violet]:hover:border-violet-500 group-data-[theme-color=sky]:hover:border-sky-500 group-data-[theme-color=red]:hover:border-red-500 group-data-[theme-color=green]:hover:border-green-500 group-data-[theme-color=pink]:hover:border-pink-500 group-data-[theme-color=blue]:hover:border-blue-500 hover:-translate-y-2 dark:bg-neutral-900 dark:border-neutral-600">
                                            <div class="p-6">
                                                <div class="grid grid-cols-12 gap-5">
                                                    <div class="col-span-12 lg:col-span-1">
                                                        <div class="px-2 mb-4 text-center mb-md-0">
                                                            <a href="company-details.html"><img src="../assets/images/featured-job/img-07.png" alt="" class="mx-auto img-fluid rounded-3"></a>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-span-10">
                                                        <h5 class="mb-1 fs-17"><a href="job-details.html" class="dark:text-gray-50">HTML Developer</a> 
                                                        </h5>
                                                        <ul class="flex flex-wrap mb-0 lg:gap-3 gap-y-3">
                                                            <li>
                                                                <p class="mb-0 text-sm text-gray-500 dark:text-gray-300">Jobcy Technology Pvt.Ltd</p>
                                                            </li>
                                                            <li>
                                                                <p class="mb-0 text-sm text-gray-500 dark:text-gray-300"><i class="mdi mdi-map-marker"></i> California</p>
                                                            </li>
                                                            <li>
                                                                <p class="mb-0 text-sm text-gray-500 dark:text-gray-300"><i class="uil uil-wallet"></i>$250 - $800 / month</p>
                                                            </li>
                                                        </ul>
                                                        <div class="mt-4">
                                                            <div class="flex flex-wrap gap-1.5">
                                                                <span class="bg-violet-500/20 text-violet-500 text-11 px-2 py-0.5 font-medium rounded"> Freelance</span>
                                                                <span class="bg-yellow-500/20 text-yellow-500 text-11 px-2 py-0.5 font-medium rounded"> Urgent</span>
                                                                <span class="bg-sky-500/20 text-sky-500 text-11 px-2 py-0.5 font-medium rounded"> Private</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end row-->
                                            </div>
                                            <div class="px-4 py-3 bg-gray-50 dark:bg-neutral-700">
                                                <div class="grid grid-cols-12">
                                                    <div class="col-span-12 lg:col-span-6">
                                                        <ul class="flex flex-wrap gap-2 text-gray-700 dark:text-gray-50">
                                                            <li><i class="uil uil-tag"></i> Keywords :</li>
                                                            <li><a href="javascript:void(0)" class="primary-link text-muted"> Ui designer</a>,</li>
                                                            <li><a href="javascript:void(0)" class="primary-link text-muted"> developer</a></li>
                                                        </ul>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-span-12 mt-2 lg:col-span-6 lg:mt-0">
                                                        <div class="ltr:lg:text-right rtl:lg:text-left dark:text-gray-50">
                                                            <a href="#applyNow" data-bs-toggle="modal">Apply Now <i class="mdi mdi-chevron-double-right"></i></a>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                </div>
                                                <!--end row-->
                                            </div>
                                            <div class="absolute top-4 ltr:right-4 rtl:left-4">
                                                <div class="w-8 h-8 text-center text-gray-100 transition-all duration-300 bg-transparent border rounded border-gray-100/50 hover:bg-red-600 hover:border-transparent hover:text-white">
                                                    <a href="javascript:void(0)"><i class="uil uil-heart-alt text-lg leading-[1.8]"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="relative overflow-hidden transition-all duration-500 ease-in-out bg-white border rounded-md border-gray-100/50 group group-data-[theme-color=violet]:hover:border-violet-500 group-data-[theme-color=sky]:hover:border-sky-500 group-data-[theme-color=red]:hover:border-red-500 group-data-[theme-color=green]:hover:border-green-500 group-data-[theme-color=pink]:hover:border-pink-500 group-data-[theme-color=blue]:hover:border-blue-500 hover:-translate-y-2 dark:bg-neutral-900 dark:border-neutral-600">
                                            <div class="p-6">
                                                <div class="grid grid-cols-12 gap-5">
                                                    <div class="col-span-12 lg:col-span-1">
                                                        <div class="px-2 mb-4 text-center mb-md-0">
                                                            <a href="company-details.html"><img src="../assets/images/featured-job/img-08.png" alt="" class="mx-auto img-fluid rounded-3"></a>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-span-10">
                                                        <h5 class="mb-1 fs-17"><a href="job-details.html" class="dark:text-gray-50">Business Associate</a> 
                                                        </h5>
                                                        <ul class="flex flex-wrap mb-0 lg:gap-3 gap-y-3">
                                                            <li>
                                                                <p class="mb-0 text-sm text-gray-500 dark:text-gray-300">Jobcy Technology Pvt.Ltd</p>
                                                            </li>
                                                            <li>
                                                                <p class="mb-0 text-sm text-gray-500 dark:text-gray-300"><i class="mdi mdi-map-marker"></i> California</p>
                                                            </li>
                                                            <li>
                                                                <p class="mb-0 text-sm text-gray-500 dark:text-gray-300"><i class="uil uil-wallet"></i>$250 - $800 / month</p>
                                                            </li>
                                                        </ul>
                                                        <div class="mt-4">
                                                            <div class="flex flex-wrap gap-1.5">
                                                                <span class="bg-red-500/20 text-red-500 text-11 px-2 py-0.5 font-medium rounded"> Part Time</span>
                                                                <span class="bg-yellow-500/20 text-yellow-500 text-11 px-2 py-0.5 font-medium rounded"> Urgent</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end row-->
                                            </div>
                                            <div class="px-4 py-3 bg-gray-50 dark:bg-neutral-700">
                                                <div class="grid grid-cols-12">
                                                    <div class="col-span-12 lg:col-span-6">
                                                        <ul class="flex flex-wrap gap-2 text-gray-700 dark:text-gray-50">
                                                            <li><i class="uil uil-tag"></i> Keywords :</li>
                                                            <li><a href="javascript:void(0)" class="primary-link text-muted"> Ui designer</a>,</li>
                                                            <li><a href="javascript:void(0)" class="primary-link text-muted"> developer</a></li>
                                                        </ul>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-span-12 mt-2 lg:col-span-6 lg:mt-0">
                                                        <div class="ltr:lg:text-right rtl:lg:text-left dark:text-gray-50">
                                                            <a href="#applyNow" data-bs-toggle="modal">Apply Now <i class="mdi mdi-chevron-double-right"></i></a>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                </div>
                                                <!--end row-->
                                            </div>
                                            <div class="absolute top-4 ltr:right-4 rtl:left-4">
                                                <div class="w-8 h-8 text-center text-gray-100 transition-all duration-300 bg-transparent border rounded border-gray-100/50 hover:bg-red-600 hover:border-transparent hover:text-white">
                                                    <a href="javascript:void(0)"><i class="uil uil-heart-alt text-lg leading-[1.8]"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-12">
                                        <div class="col-span-12">
                                            <ul class="flex justify-center gap-2 mt-8">
                                                <li class="w-12 h-12 text-center border rounded-full cursor-default border-gray-100/50 dark:border-gray-100/20">
                                                    <a class="cursor-auto" href="javascript:void(0)" tabindex="-1">
                                                        <i class="mdi mdi-chevron-double-left text-16 leading-[2.8] dark:text-white"></i>
                                                    </a>
                                                </li>
                                                <li class="w-12 h-12 text-center text-white border border-transparent rounded-full cursor-pointer group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500">
                                                    <a class="text-16 leading-[2.8]" href="javascript:void(0)">1</a>
                                                </li>
                                                <li class="w-12 h-12 text-center text-gray-900 transition-all duration-300 border rounded-full cursor-pointer border-gray-100/50 hover:bg-gray-100/30 focus:bg-gray-100/30 dark:border-gray-100/20 dark:text-gray-50 dark:hover:bg-gray-500/20">
                                                    <a class="text-16 leading-[2.8]" href="javascript:void(0)">2</a>
                                                </li>
                                                <li class="w-12 h-12 text-center text-gray-900 transition-all duration-300 border rounded-full cursor-pointer border-gray-100/50 hover:bg-gray-100/30 focus:bg-gray-100/30 dark:border-gray-100/20 dark:text-gray-50 dark:hover:bg-gray-500/20">
                                                    <a class="text-16 leading-[2.8]" href="javascript:void(0)">3</a>
                                                </li>
                                                <li class="w-12 h-12 text-center text-gray-900 transition-all duration-300 border rounded-full cursor-pointer border-gray-100/50 hover:bg-gray-100/30 focus:bg-gray-100/30 dark:border-gray-100/20 dark:text-gray-50 dark:hover:bg-gray-500/20">
                                                    <a class="text-16 leading-[2.8]" href="javascript:void(0)">4</a>
                                                </li>
                                                <li class="w-12 h-12 text-center text-gray-900 transition-all duration-300 border rounded-full cursor-pointer border-gray-100/50 hover:bg-gray-100/30 focus:bg-gray-100/30 dark:border-gray-100/20 dark:text-gray-50 dark:hover:bg-gray-500/20">
                                                    <a href="javascript:void(0)" tabindex="-1">
                                                        <i class="mdi mdi-chevron-double-right text-16 leading-[2.8]"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!--end col-->
                                    </div>
                                </div>
                                <div class="col-span-12 space-y-5 lg:col-span-3">
                                    <div data-tw-accordion="collapse">
                                        <div class="text-gray-700 accordion-item">
                                            <h6>
                                                <button type="button" class="flex items-center justify-between w-full px-4 py-2 font-medium text-left accordion-header group-data-[theme-color=violet]:bg-violet-500/20 group-data-[theme-color=sky]:bg-sky-500/20 group-data-[theme-color=red]:bg-red-500/20 group group-data-[theme-color=green]:bg-green-500/20 group-data-[theme-color=pink]:bg-pink-500/20 group-data-[theme-color=blue]:bg-blue-500/20 active">
                                                    <span class="text-gray-900 dark:text-gray-50">Location</span>
                                                    <i class="mdi mdi-chevron-down text-xl group-[.active]:rotate-180 text-gray-900 dark:text-gray-50"></i>
                                                </button>
                                            </h6>
        
                                            <div class="block accordion-body">
                                                <div class="p-5">
                                                    <div class="mb-3">
                                                        <form class="relative">
                                                            <input class="border rounded-md border-gray-100/50 placeholder:text-13 placeholder:text-gray-300 dark:bg-neutral-700 dark:border-gray-100/20 dark:text-gray-300" type="search" placeholder="Search...">
                                                            <button class="absolute bg-transparent border-0 top-3 ltr:right-0 rtl:left-0 ltr:mr-2 rtl:ml-2" type="submit"><span class="text-gray-500 mdi mdi-magnify"></span></button>
                                                        </form>
                                                    </div>
                                                    <div class="area-range">
                                                        <div class="mb-3 form-label dark:text-gray-300">Area Range: <span class="mt-2 example-val" id="slider1-span">9.00</span> miles</div>
                                                        <div id="slider1" class="noUi-target noUi-ltr noUi-horizontal noUi-txt-dir-ltr"> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-tw-accordion="collapse">
                                        <div class="text-gray-700 accordion-item dark:text-gray-300">
                                            <h6>
                                                <button type="button" class="flex items-center justify-between w-full px-4 py-2 font-medium text-left accordion-header group-data-[theme-color=violet]:bg-violet-500/20 group-data-[theme-color=sky]:bg-sky-500/20 group-data-[theme-color=red]:bg-red-500/20 group group-data-[theme-color=green]:bg-green-500/20 group-data-[theme-color=pink]:bg-pink-500/20 group-data-[theme-color=blue]:bg-blue-500/20 group active">
                                                    <span class="text-gray-900 text-15 dark:text-gray-50"> Work experience</span>
                                                    <i class="mdi mdi-chevron-down text-xl group-[.active]:rotate-180 text-gray-900 dark:text-gray-50"></i>
                                                </button>
                                            </h6>
                                            <div class="block accordion-body">
                                                <div class="p-5">
                                                    <div class="mt-2">
                                                        <input class="rounded cursor-pointer group-data-[theme-color=violet]:checked:bg-violet-500 group-data-[theme-color=sky]:checked:bg-sky-500 group-data-[theme-color=red]:checked:bg-red-500 group-data-[theme-color=green]:checked:bg-green-500 group-data-[theme-color=pink]:checked:bg-pink-500 group-data-[theme-color=blue]:checked:bg-blue-500 focus:ring-0 focus:ring-offset-0 dark:bg-neutral-600 dark:checked:bg-violet-500/20" type="checkbox" value="" id="flexCheckChecked1">
                                                        <label class="text-gray-500 cursor-pointer ltr:ml-2 rtl:mr-2 dark:text-gray-300">No experience</label>
                                                    </div>
                                                    <div class="mt-2">
                                                        <input class="rounded cursor-pointer group-data-[theme-color=violet]:checked:bg-violet-500 group-data-[theme-color=sky]:checked:bg-sky-500 group-data-[theme-color=red]:checked:bg-red-500 group-data-[theme-color=green]:checked:bg-green-500 group-data-[theme-color=pink]:checked:bg-pink-500 group-data-[theme-color=blue]:checked:bg-blue-500 focus:ring-0 focus:ring-offset-0 dark:bg-neutral-600 dark:checked:bg-violet-500/20" checked type="checkbox" value="" id="flexCheckChecked1">
                                                        <label class="text-gray-500 cursor-pointer ltr:ml-2 rtl:mr-2 dark:text-gray-300">0-3 years</label>
                                                    </div>
                                                    <div class="mt-2">
                                                        <input class="rounded cursor-pointer group-data-[theme-color=violet]:checked:bg-violet-500 group-data-[theme-color=sky]:checked:bg-sky-500 group-data-[theme-color=red]:checked:bg-red-500 group-data-[theme-color=green]:checked:bg-green-500 group-data-[theme-color=pink]:checked:bg-pink-500 group-data-[theme-color=blue]:checked:bg-blue-500 focus:ring-0 focus:ring-offset-0 dark:bg-neutral-600 dark:checked:bg-violet-500/20" type="checkbox" value="" id="flexCheckChecked1">
                                                        <label class="text-gray-500 cursor-pointer ltr:ml-2 rtl:mr-2 dark:text-gray-300">3-6 years</label>
                                                    </div>
                                                    <div class="mt-2">
                                                        <input class="rounded cursor-pointer group-data-[theme-color=violet]:checked:bg-violet-500 group-data-[theme-color=sky]:checked:bg-sky-500 group-data-[theme-color=red]:checked:bg-red-500 group-data-[theme-color=green]:checked:bg-green-500 group-data-[theme-color=pink]:checked:bg-pink-500 group-data-[theme-color=blue]:checked:bg-blue-500 focus:ring-0 focus:ring-offset-0 dark:bg-neutral-600 dark:checked:bg-violet-500/20" type="checkbox" value="" id="flexCheckChecked1">
                                                        <label class="text-gray-500 cursor-pointer ltr:ml-2 rtl:mr-2 dark:text-gray-300">More than 6 years</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-tw-accordion="collapse">
                                        <div class="text-gray-700 accordion-item dark:text-gray-300">
                                            <h6>
                                                <button type="button" class="flex items-center justify-between w-full px-4 py-2 font-medium text-left accordion-header group-data-[theme-color=violet]:bg-violet-500/20 group-data-[theme-color=sky]:bg-sky-500/20 group-data-[theme-color=red]:bg-red-500/20 group group-data-[theme-color=green]:bg-green-500/20 group-data-[theme-color=pink]:bg-pink-500/20 group-data-[theme-color=blue]:bg-blue-500/20 group active">
                                                    <span class="text-gray-900 text-15 dark:text-gray-50">Type of employment</span>
                                                    <i class="mdi mdi-chevron-down text-xl group-[.active]:rotate-180 text-gray-900 dark:text-gray-50"></i>
                                                </button>
                                            </h6>
                                            <div class="block accordion-body">
                                                <div class="p-5">
                                                    <div class="mt-2">
                                                        <input class="cursor-pointer group-data-[theme-color=violet]:checked:bg-violet-500 group-data-[theme-color=sky]:checked:bg-sky-500 group-data-[theme-color=red]:checked:bg-red-500 group-data-[theme-color=green]:checked:bg-green-500 group-data-[theme-color=pink]:checked:bg-pink-500 group-data-[theme-color=blue]:checked:bg-blue-500 focus:ring-0 focus:ring-offset-0 dark:bg-neutral-600 dark:checked:bg-violet-500/20" type="radio" checked value="" id="flexCheckChecked1">
                                                        <label class="text-gray-500 cursor-pointer ltr:ml-2 rtl:mr-2 dark:text-gray-300">No experience</label>
                                                    </div>
                                                    <div class="mt-2">
                                                        <input class="cursor-pointer group-data-[theme-color=violet]:checked:bg-violet-500 group-data-[theme-color=sky]:checked:bg-sky-500 group-data-[theme-color=red]:checked:bg-red-500 group-data-[theme-color=green]:checked:bg-green-500 group-data-[theme-color=pink]:checked:bg-pink-500 group-data-[theme-color=blue]:checked:bg-blue-500 focus:ring-0 focus:ring-offset-0 dark:bg-neutral-600 dark:checked:bg-violet-500/20" type="radio" value="" id="flexCheckChecked1">
                                                        <label class="text-gray-500 cursor-pointer ltr:ml-2 rtl:mr-2 dark:text-gray-300">0-3 years</label>
                                                    </div>
                                                    <div class="mt-2">
                                                        <input class="cursor-pointer group-data-[theme-color=violet]:checked:bg-violet-500 group-data-[theme-color=sky]:checked:bg-sky-500 group-data-[theme-color=red]:checked:bg-red-500 group-data-[theme-color=green]:checked:bg-green-500 group-data-[theme-color=pink]:checked:bg-pink-500 group-data-[theme-color=blue]:checked:bg-blue-500 focus:ring-0 focus:ring-offset-0 dark:bg-neutral-600 dark:checked:bg-violet-500/20" type="radio" value="" id="flexCheckChecked1">
                                                        <label class="text-gray-500 cursor-pointer ltr:ml-2 rtl:mr-2 dark:text-gray-300">3-6 years</label>
                                                    </div>
                                                    <div class="mt-2">
                                                        <input class="cursor-pointer group-data-[theme-color=violet]:checked:bg-violet-500 group-data-[theme-color=sky]:checked:bg-sky-500 group-data-[theme-color=red]:checked:bg-red-500 group-data-[theme-color=green]:checked:bg-green-500 group-data-[theme-color=pink]:checked:bg-pink-500 group-data-[theme-color=blue]:checked:bg-blue-500 focus:ring-0 focus:ring-offset-0 dark:bg-neutral-600 dark:checked:bg-violet-500/20" type="radio" value="" id="flexCheckChecked1">
                                                        <label class="text-gray-500 cursor-pointer ltr:ml-2 rtl:mr-2 dark:text-gray-300">More than 6 years</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-tw-accordion="collapse">
                                        <div class="text-gray-700 accordion-item dark:text-gray-300">
                                            <h6>
                                                <button type="button" class="flex items-center justify-between w-full px-4 py-2 font-medium text-left accordion-header group-data-[theme-color=violet]:bg-violet-500/20 group-data-[theme-color=sky]:bg-sky-500/20 group-data-[theme-color=red]:bg-red-500/20 group group-data-[theme-color=green]:bg-green-500/20 group-data-[theme-color=pink]:bg-pink-500/20 group-data-[theme-color=blue]:bg-blue-500/20 group active">
                                                    <span class="text-gray-900 text-15 dark:text-gray-50">Date Posted</span>
                                                    <i class="mdi mdi-chevron-down text-xl group-[.active]:rotate-180 text-gray-900 dark:text-gray-50"></i>
                                                </button>
                                            </h6>
                                            <div class="block accordion-body">
                                                <div class="p-5">
                                                    <div class="mt-2">
                                                        <input class="rounded cursor-pointer group-data-[theme-color=violet]:checked:bg-violet-500 group-data-[theme-color=sky]:checked:bg-sky-500 group-data-[theme-color=red]:checked:bg-red-500 group-data-[theme-color=green]:checked:bg-green-500 group-data-[theme-color=pink]:checked:bg-pink-500 group-data-[theme-color=blue]:checked:bg-blue-500 focus:ring-0 focus:ring-offset-0 dark:bg-zinc-600 dark:checked:bg-violet-500/20" type="checkbox" value="" id="flexCheckChecked1">
                                                        <label class="text-gray-500 cursor-pointer ltr:ml-2 rtl:mr-2 dark:text-gray-300">All</label>
                                                    </div>
                                                    <div class="mt-2">
                                                        <input class="rounded cursor-pointer group-data-[theme-color=violet]:checked:bg-violet-500 group-data-[theme-color=sky]:checked:bg-sky-500 group-data-[theme-color=red]:checked:bg-red-500 group-data-[theme-color=green]:checked:bg-green-500 group-data-[theme-color=pink]:checked:bg-pink-500 group-data-[theme-color=blue]:checked:bg-blue-500 focus:ring-0 focus:ring-offset-0 dark:bg-zinc-600 dark:checked:bg-violet-500/20" checked type="checkbox" value="" id="flexCheckChecked1">
                                                        <label class="text-gray-500 cursor-pointer ltr:ml-2 rtl:mr-2 dark:text-gray-300">Last Hour</label>
                                                    </div>
                                                    <div class="mt-2">
                                                        <input class="rounded cursor-pointer group-data-[theme-color=violet]:checked:bg-violet-500 group-data-[theme-color=sky]:checked:bg-sky-500 group-data-[theme-color=red]:checked:bg-red-500 group-data-[theme-color=green]:checked:bg-green-500 group-data-[theme-color=pink]:checked:bg-pink-500 group-data-[theme-color=blue]:checked:bg-blue-500 focus:ring-0 focus:ring-offset-0 dark:bg-zinc-600 dark:checked:bg-violet-500/20" type="checkbox" value="" id="flexCheckChecked1">
                                                        <label class="text-gray-500 cursor-pointer ltr:ml-2 rtl:mr-2 dark:text-gray-300">Last 24 hours</label>
                                                    </div>
                                                    <div class="mt-2">
                                                        <input class="rounded cursor-pointer group-data-[theme-color=violet]:checked:bg-violet-500 group-data-[theme-color=sky]:checked:bg-sky-500 group-data-[theme-color=red]:checked:bg-red-500 group-data-[theme-color=green]:checked:bg-green-500 group-data-[theme-color=pink]:checked:bg-pink-500 group-data-[theme-color=blue]:checked:bg-blue-500 focus:ring-0 focus:ring-offset-0 dark:bg-zinc-600 dark:checked:bg-violet-500/20" type="checkbox" value="" id="flexCheckChecked1">
                                                        <label class="text-gray-500 cursor-pointer ltr:ml-2 rtl:mr-2 dark:text-gray-300">Last 7 days</label>
                                                    </div>
                                                    <div class="mt-2">
                                                        <input class="rounded cursor-pointer group-data-[theme-color=violet]:checked:bg-violet-500 group-data-[theme-color=sky]:checked:bg-sky-500 group-data-[theme-color=red]:checked:bg-red-500 group-data-[theme-color=green]:checked:bg-green-500 group-data-[theme-color=pink]:checked:bg-pink-500 group-data-[theme-color=blue]:checked:bg-blue-500 focus:ring-0 focus:ring-offset-0 dark:bg-zinc-600 dark:checked:bg-violet-500/20" type="checkbox" value="" id="flexCheckChecked1">
                                                        <label class="text-gray-500 cursor-pointer ltr:ml-2 rtl:mr-2 dark:text-gray-300">Last 14 days</label>
                                                    </div>
                                                    <div class="mt-2">
                                                        <input class="rounded cursor-pointer group-data-[theme-color=violet]:checked:bg-violet-500 group-data-[theme-color=sky]:checked:bg-sky-500 group-data-[theme-color=red]:checked:bg-red-500 group-data-[theme-color=green]:checked:bg-green-500 group-data-[theme-color=pink]:checked:bg-pink-500 group-data-[theme-color=blue]:checked:bg-blue-500 focus:ring-0 focus:ring-offset-0 dark:bg-zinc-600 dark:checked:bg-violet-500/20" type="checkbox" value="" id="flexCheckChecked1">
                                                        <label class="text-gray-500 cursor-pointer ltr:ml-2 rtl:mr-2 dark:text-gray-300">Last 30 days</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-tw-accordion="collapse">
                                        <div class="text-gray-700 accordion-item dark:text-gray-300">
                                            <h6>
                                                <button type="button" class="flex items-center justify-between w-full px-4 py-2 font-medium text-left accordion-header group-data-[theme-color=violet]:bg-violet-500/20 group-data-[theme-color=sky]:bg-sky-500/20 group-data-[theme-color=red]:bg-red-500/20 group group-data-[theme-color=green]:bg-green-500/20 group-data-[theme-color=pink]:bg-pink-500/20 group-data-[theme-color=blue]:bg-blue-500/20 group active">
                                                    <span class="text-gray-900 text-15 dark:text-gray-50">Tags Cloud</span>
                                                    <i class="mdi mdi-chevron-down text-xl group-[.active]:rotate-180 text-gray-900 dark:text-gray-50"></i>
                                                </button>
                                            </h6>
                                            <div class="block accordion-body">
                                                <div class="flex flex-wrap gap-2 p-5">
                                                    <a href="javascript:void(0)" class="bg-gray-50 text-13 rounded px-2 py-0.5 font-medium text-gray-500 group-data-[theme-color=violet]:hover:bg-violet-500 group-data-[theme-color=sky]:hover:bg-sky-500 group-data-[theme-color=red]:hover:bg-red-500 group-data-[theme-color=green]:hover:bg-green-500 group-data-[theme-color=pink]:hover:bg-pink-500 group-data-[theme-color=blue]:hover:bg-blue-500 hover:text-white transition-all duration-300 ease-in-out dark:text-gray-50 dark:bg-neutral-600/40">design</a>
                                                    <a href="javascript:void(0)" class="bg-gray-50 text-13 rounded px-2 py-0.5 font-medium text-gray-500 group-data-[theme-color=violet]:hover:bg-violet-500 group-data-[theme-color=sky]:hover:bg-sky-500 group-data-[theme-color=red]:hover:bg-red-500 group-data-[theme-color=green]:hover:bg-green-500 group-data-[theme-color=pink]:hover:bg-pink-500 group-data-[theme-color=blue]:hover:bg-blue-500 hover:text-white transition-all duration-300 ease-in-out dark:text-gray-50 dark:bg-neutral-600/40">marketing</a>
                                                    <a href="javascript:void(0)" class="bg-gray-50 text-13 rounded px-2 py-0.5 font-medium text-gray-500 group-data-[theme-color=violet]:hover:bg-violet-500 group-data-[theme-color=sky]:hover:bg-sky-500 group-data-[theme-color=red]:hover:bg-red-500 group-data-[theme-color=green]:hover:bg-green-500 group-data-[theme-color=pink]:hover:bg-pink-500 group-data-[theme-color=blue]:hover:bg-blue-500 hover:text-white transition-all duration-300 ease-in-out dark:text-gray-50 dark:bg-neutral-600/40">business</a>
                                                    <a href="javascript:void(0)" class="bg-gray-50 text-13 rounded px-2 py-0.5 font-medium text-gray-500 group-data-[theme-color=violet]:hover:bg-violet-500 group-data-[theme-color=sky]:hover:bg-sky-500 group-data-[theme-color=red]:hover:bg-red-500 group-data-[theme-color=green]:hover:bg-green-500 group-data-[theme-color=pink]:hover:bg-pink-500 group-data-[theme-color=blue]:hover:bg-blue-500 hover:text-white transition-all duration-300 ease-in-out dark:text-gray-50 dark:bg-neutral-600/40">developer</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                <!-- End team -->
           
            </div>
        </div>
        
        
        <!-- start subscribe -->
        <section class="relative py-16 overflow-hidden bg-zinc-700 dark:bg-neutral-900">
            <div class="container mx-auto">
                <div class="grid items-center grid-cols-12 gap-5">
                    <div class="col-span-12 lg:col-span-7">
                        <div class="text-center lg:text-start">
                            <h4 class="text-white">Get New Jobs Notification!</h4>
                            <p class="mt-1 mb-0 text-white/50 dark:text-gray-300">Subscribe &amp; get all related jobs notification.</p>
                        </div>
                    </div>
                    <div class="z-40 col-span-12 lg:col-span-5">
                        <form class="flex" action="#">
                            <input
                                type="text" class="w-full text-gray-100 bg-transparent rounded-md border-gray-50/30 ltr:border-r-0 rtl:border-l-0 ltr:rounded-r-none rtl:rounded-l-none placeholder:text-13 placeholder:text-gray-100 dark:text-gray-100 dark:bg-white/5 dark:border-neutral-600 focus:ring-0 focus:ring-offset-0"
                                id="subscribe" placeholder="Enter your email" >
                            <button class="text-white border-transparent btn ltr:rounded-l-none rtl:rounded-r-none group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500 focus:ring focus:ring-custom-500/30" type="button" id="subscribebtn">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="absolute right-0 -top-10 -z-0 opacity-20">
                <img src="../assets/images/subscribe.png" alt="" class="img-fluid">
            </div>
        </section>
        <!-- end subscribe -->
        <!-- Footer Start -->
        <footer class="footer ">
            <!-- start footer -->
            <section class="py-12 bg-zinc-800 dark:bg-neutral-900">
                <div class="container mx-auto">
                    <div class="grid grid-cols-12 lg:gap-10">
                        <div class="col-span-12 xl:col-span-4">
                            <div class="mr-12">
                                <h4 class="text-white mb-6 text-[23px]">Jobcy</h4>
                                <p class="text-white/50 dark:text-gray-300">
                                    It is a long established fact that a reader will be of a page reader
                                    will be of at its layout.
                                </p>
                                <p class="mt-3 text-white dark:text-gray-50">Follow Us on:</p>
                                <div class="mt-5">
                                    <ul class="flex gap-3">
                                        <li class="w-8 h-8 leading-loose text-center text-gray-200 transition-all duration-300 border rounded-full cursor-pointer border-gray-200/50 hover:text-gray-50 group-data-[theme-color=violet]:hover:bg-violet-500 group-data-[theme-color=sky]:hover:bg-sky-500 group-data-[theme-color=red]:hover:bg-red-500 group-data-[theme-color=green]:hover:bg-green-500 group-data-[theme-color=pink]:hover:bg-pink-500 group-data-[theme-color=blue]:hover:bg-blue-500 hover:border-transparent">
                                            <a href="#">
                                                <i class="uil uil-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li class="w-8 h-8 leading-loose text-center text-gray-200 transition-all duration-300 border rounded-full cursor-pointer border-gray-200/50 hover:text-gray-50 group-data-[theme-color=violet]:hover:bg-violet-500 group-data-[theme-color=sky]:hover:bg-sky-500 group-data-[theme-color=red]:hover:bg-red-500 group-data-[theme-color=green]:hover:bg-green-500 group-data-[theme-color=pink]:hover:bg-pink-500 group-data-[theme-color=blue]:hover:bg-blue-500 hover:border-transparent">
                                            <a href="#">
                                                <i class="uil uil-linkedin-alt"></i>
                                            </a>
                                        </li>
                                        <li class="w-8 h-8 leading-loose text-center text-gray-200 transition-all duration-300 border rounded-full cursor-pointer border-gray-200/50 hover:text-gray-50 group-data-[theme-color=violet]:hover:bg-violet-500 group-data-[theme-color=sky]:hover:bg-sky-500 group-data-[theme-color=red]:hover:bg-red-500 group-data-[theme-color=green]:hover:bg-green-500 group-data-[theme-color=pink]:hover:bg-pink-500 group-data-[theme-color=blue]:hover:bg-blue-500 hover:border-transparent">
                                            <a href="#">
                                                <i class="uil uil-google"></i>
                                            </a>
                                        </li>
                                        <li class="w-8 h-8 leading-loose text-center text-gray-200 transition-all duration-300 border rounded-full cursor-pointer border-gray-200/50 hover:text-gray-50 group-data-[theme-color=violet]:hover:bg-violet-500 group-data-[theme-color=sky]:hover:bg-sky-500 group-data-[theme-color=red]:hover:bg-red-500 group-data-[theme-color=green]:hover:bg-green-500 group-data-[theme-color=pink]:hover:bg-pink-500 group-data-[theme-color=blue]:hover:bg-blue-500 hover:border-transparent">
                                            <a href="#">
                                                <i class="uil uil-twitter"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 mt-8 md:col-span-6 xl:col-span-2 md:mt-0">
                            <p class="mb-6 text-white text-16">Company</p>
                            <ul class="space-y-4">
                                <li class="text-sm transition-all duration-500 ease-in-out text-white/50 hover:text-gray-50 hover:text-base dark:text-gray-300 dark:hover:text-gray-50">
                                    <a href="about.html">
                                        <i class="mdi mdi-chevron-right"></i> About Us
                                    </a>
                                </li>
                                <li class="text-sm transition-all duration-500 ease-in-out text-white/50 hover:text-gray-50 hover:text-base dark:text-gray-300 dark:hover:text-gray-50">
                                    <a href="contact.html">
                                        <i class="mdi mdi-chevron-right"></i> Contact Us
                                    </a>
                                </li>
                                <li class="text-sm transition-all duration-500 ease-in-out text-white/50 hover:text-gray-50 hover:text-base dark:text-gray-300 dark:hover:text-gray-50">
                                    <a href="services.html">
                                        <i class="mdi mdi-chevron-right"></i> Services
                                    </a>
                                </li>
                                <li class="text-sm transition-all duration-500 ease-in-out text-white/50 hover:text-gray-50 hover:text-base dark:text-gray-300 dark:hover:text-gray-50">
                                    <a href="blog.html">
                                        <i class="mdi mdi-chevron-right"></i> Blog
                                    </a>
                                </li>
                                <li class="text-sm transition-all duration-500 ease-in-out text-white/50 hover:text-gray-50 hover:text-base dark:text-gray-300 dark:hover:text-gray-50">
                                    <a href="team.html">
                                        <i class="mdi mdi-chevron-right"></i> Team
                                    </a>
                                </li>
                                <li class="text-sm transition-all duration-500 ease-in-out text-white/50 hover:text-gray-50 hover:text-base dark:text-gray-300 dark:hover:text-gray-50">
                                    <a href="pricing.html">
                                        <i class="mdi mdi-chevron-right"></i> Pricing
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-span-12 mt-8 md:col-span-6 xl:col-span-2 md:mt-0">
                            <p class="mb-6 text-white text-16">For Jobs</p>
                            <ul class="space-y-4">
                                <li class="text-sm transition-all duration-500 ease-in-out text-white/50 hover:text-gray-50 hover:text-base dark:text-gray-300 dark:hover:text-gray-50">
                                    <a href="job-categories.html">
                                        <i class="mdi mdi-chevron-right"></i> Browser Categories
                                    </a>
                                </li>
                                <li class="text-sm transition-all duration-500 ease-in-out text-white/50 hover:text-gray-50 hover:text-base dark:text-gray-300 dark:hover:text-gray-50">
                                    <a href="job-list.html">
                                        <i class="mdi mdi-chevron-right"></i> Browser Jobs
                                    </a>
                                </li>
                                <li class="text-sm transition-all duration-500 ease-in-out text-white/50 hover:text-gray-50 hover:text-base dark:text-gray-300 dark:hover:text-gray-50">
                                    <a href="job-details.html">
                                        <i class="mdi mdi-chevron-right"></i> Job Details
                                    </a>
                                </li>
                                <li class="text-sm transition-all duration-500 ease-in-out text-white/50 hover:text-gray-50 hover:text-base dark:text-gray-300 dark:hover:text-gray-50">
                                    <a href="bookmark-jobs.html">
                                        <i class="mdi mdi-chevron-right"></i> Bookmark Jobs
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-span-12 mt-8 md:col-span-6 xl:col-span-2 md:mt-0">
                            <p class="mb-6 text-white text-16">For Candidates</p>
                            <ul class="space-y-4">
                                <li class="text-sm transition-all duration-500 ease-in-out text-white/50 hover:text-gray-50 hover:text-base dark:text-gray-300 dark:hover:text-gray-50">
                                    <a href="candidate-list.html">
                                        <i class="mdi mdi-chevron-right"></i> Candidate List
                                    </a>
                                </li>
                                <li class="text-sm transition-all duration-500 ease-in-out text-white/50 hover:text-gray-50 hover:text-base dark:text-gray-300 dark:hover:text-gray-50">
                                    <a href="candidate-grid.html">
                                        <i class="mdi mdi-chevron-right"></i> Candidate Grid
                                    </a>
                                </li>
                                <li class="text-sm transition-all duration-500 ease-in-out text-white/50 hover:text-gray-50 hover:text-base dark:text-gray-300 dark:hover:text-gray-50">
                                    <a href="candidate-details.html">
                                        <i class="mdi mdi-chevron-right"></i> Candidate Details
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-span-12 mt-8 md:col-span-6 xl:col-span-2 md:mt-0">
                            <p class="mb-6 text-white text-16">Support</p>
                            <ul class="space-y-4">
                                <li class="text-sm transition-all duration-500 ease-in-out text-white/50 hover:text-gray-50 hover:text-base dark:text-gray-300 dark:hover:text-gray-50">
                                    <a href="contact.html">
                                        <i class="mdi mdi-chevron-right"></i> Help Center
                                    </a>
                                </li>
                                <li class="text-sm transition-all duration-500 ease-in-out text-white/50 hover:text-gray-50 hover:text-base dark:text-gray-300 dark:hover:text-gray-50">
                                    <a href="faqs.html">
                                        <i class="mdi mdi-chevron-right"></i> FAQ'S
                                    </a>
                                </li>
                                <li class="text-sm transition-all duration-500 ease-in-out text-white/50 hover:text-gray-50 hover:text-base dark:text-gray-300 dark:hover:text-gray-50">
                                    <a href="privacy-policy.html">
                                        <i class="mdi mdi-chevron-right"></i> Privacy Policy
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end footer -->
            <!-- strat footer alt -->
            <section class="py-6 border-t bg-zinc-800 border-gray-100/10 dark:bg-neutral-900">
                <div class="container mx-auto">
                    <div class="text-center">
                        <p class="mb-0 text-center text-white/50">
                            <script>document.write(new Date().getFullYear())</script>
                            © Jobcy - Job Listing Page
                                Template by
                            <a href="https://themeforest.net/search/themesdesign" target="_blank" class="underline transition-all duration-300 hover:text-gray-50">Themesdesign</a>
                        </p>
                    </div>
                </div>
            </section>
            <!-- end footer alt -->
        </footer>
        <!-- end Footer -->


     <script src="https://unicons.iconscout.com/release/v4.0.0/script/monochrome/bundle.js"></script>
     <script src="../assets/libs/@popperjs/core/umd/popper.min.js"></script>
     <script src="../assets/libs/simplebar/simplebar.min.js"></script>



    <script src="../assets/js/pages/switcher.js"></script>
  
     <script src="../assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>

     <script src="../assets/js/pages/job-list.init.js"></script>

    <script src="../assets/js/pages/dropdown&modal.init.js"></script>

    <!-- Nouislider Js -->
        <script src="../assets/libs/nouislider/nouislider.min.js"></script>

        <script src="../assets/js/pages/area-filter-range.init.js"></script>

    <script src="../assets/js/pages/nav&tabs.js"></script>

    <script src="../assets/js/app.js"></script>
    
</body>
</html>