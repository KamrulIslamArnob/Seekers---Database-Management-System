-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2023 at 10:26 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seekers_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `user_id`, `job_id`, `company_id`, `status`, `score`) VALUES
(49, 3, 31, 2, '1', 2),
(51, 3, 35, 2, '2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `blog_id` bigint(20) UNSIGNED NOT NULL,
  `blog_title` varchar(255) NOT NULL,
  `blog_tagline` varchar(255) DEFAULT NULL,
  `blog_text` varchar(2000) NOT NULL,
  `blog_genre` varchar(255) NOT NULL,
  `blog_cover` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`blog_id`, `blog_title`, `blog_tagline`, `blog_text`, `blog_genre`, `blog_cover`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'GOO D', 'fdsfd', '#changed -What makes the best co-working space?#\nObjectively pursue diverse catalysts for change for interoperable meta-services. Distinctively re-engineer revolutionary meta-services and premium architectures. Intrinsically incubate intuitive opportunities and real-time potentialities. Appropriately communicate one-to-one technology.\n\nHome renovations, especially those involving plentiful of demolition can be a very dusty affair. The same is true as we experience the emotional sensation of stress from our first instances of social rejection ridicule. We quickly learn to fear and thus automatically avoid potentially stressful situations of all kinds, including the most common of all making mistakes.\n\n#\"A business consulting agency is involved in the planning, implementation, and education of businesses.\"#\n\n— Creative Agency Alice Mellor\n##Whether article spirits new her covered hastily sitting her. Money witty books nor son add. Chicken age had evening believe but proceed pretend mrs. At missed advice my it no sister. Miss told ham dull knew see she spot near can. Spirit her entire her called.##\n\nThe advantage of its Latin origin and the relative meaninglessness of Lorum Ipsum is that the text does not attract attention to itself or distract the viewer\'s attention from the layout.', 'fdsfdsf', '1702747475_657ddd53273fd_quiz_3-01.png', 3, '2023-12-16 12:12:25', '2023-12-16 12:24:35'),
(3, 'fdsv', 'fvfdsvf', '#Changed -What makes the best co-working space?#\n\nObjectively pursue diverse catalysts for change for interoperable meta-services. Distinctively re-engineer revolutionary meta-services and premium architectures. Intrinsically incubate intuitive opportunities and real-time potentialities. Appropriately communicate one-to-one technology.\n\nHome renovations, especially those involving plentiful of demolition can be a very dusty affair. The same is true as we experience the emotional sensation of stress from our first instances of social rejection ridicule. We quickly learn to fear and thus automatically avoid potentially stressful situations of all kinds, including the most common of all making mistakes.\n\n#\"A business consulting agency is involved in the planning, implementation, and education of businesses.\"#\n\n— Creative Agency Alice Mellor\n##Whether article spirits new her covered hastily sitting her. Money witty books nor son add. Chicken age had evening believe but proceed pretend mrs. At missed advice my it no sister. Miss told ham dull knew see she spot near can. Spirit her entire her called.\n\nThe advantage of its Latin origin and the relative meaninglessness of Lorum Ipsum is that the text does not attract attention to itself or distract the viewer\'s attention from the layout.', 'svsd', '1702749273_657de45909341_232.png', 3, '2023-12-16 12:54:33', NULL),
(4, 'srfsd53tg', 'regrefg', 'fdgerg', 'ergredsfrg', '1702753720_657df5b895c56_grand_finale_of_2023_judges_of_this_contest_artboard.png', 3, '2023-12-16 13:45:14', '2023-12-16 14:08:40'),
(5, 'fcf', 'fdsfsdf', '#Changed -What makes the best co-working space?#\r\n\r\nObjectively pursue diverse catalysts for change for interoperable meta-services. Distinctively re-engineer revolutionary meta-services and premium architectures. Intrinsically incubate intuitive opportunities and real-time potentialities. Appropriately communicate one-to-one technology.\r\n\r\nHome renovations, especially those involving plentiful of demolition can be a very dusty affair. The same is true as we experience the emotional sensation of stress from our first instances of social rejection ridicule. We quickly learn to fear and thus automatically avoid potentially stressful situations of all kinds, including the most common of all making mistakes.\r\n\r\n#\"A business consulting agency is involved in the planning, implementation, and education of businesses.\"#\r\n\r\n— Creative Agency Alice Mellor\r\n##Whether article spirits new her covered hastily sitting her. Money witty books nor son add. Chicken age had evening believe but proceed pretend mrs. At missed advice my it no sister. Miss told ham dull knew see she spot near can. Spirit her entire her called.\r\n\r\nThe advantage of its Latin origin and the relative meaninglessness of Lorum Ipsum is that the text does not attract attention to itself or distract the viewer\'s attention from the layout.', 'frewfesf', '1702753744_657df5d01e5b2_d-_prgramming-hero-design_thumbnail-how-to-become-more-productive-in-daily-life.png', 3, '2023-12-16 14:09:04', NULL),
(6, 'rwsgsdf', 'sdfdsf', '#Changed -What makes the best co-working space?#\r\n\r\nObjectively pursue diverse catalysts for change for interoperable meta-services. Distinctively re-engineer revolutionary meta-services and premium architectures. Intrinsically incubate intuitive opportunities and real-time potentialities. Appropriately communicate one-to-one technology.\r\n\r\nHome renovations, especially those involving plentiful of demolition can be a very dusty affair. The same is true as we experience the emotional sensation of stress from our first instances of social rejection ridicule. We quickly learn to fear and thus automatically avoid potentially stressful situations of all kinds, including the most common of all making mistakes.\r\n\r\n#\"A business consulting agency is involved in the planning, implementation, and education of businesses.\"#\r\n\r\n— Creative Agency Alice Mellor\r\n##Whether article spirits new her covered hastily sitting her. Money witty books nor son add. Chicken age had evening believe but proceed pretend mrs. At missed advice my it no sister. Miss told ham dull knew see she spot near can. Spirit her entire her called.\r\n\r\nThe advantage of its Latin origin and the relative meaninglessness of Lorum Ipsum is that the text does not attract attention to itself or distract the viewer\'s attention from the layout.', 'fdsfdsfd', '1702753772_657df5ec19dc4_grand_finale_of_2023_regestration_ongoing_artboard.png', 3, '2023-12-16 14:09:32', NULL),
(7, 'hbthb', 'asfasdsadsa', 'SELECT blogs.*\r\nFROM blogs\r\nLEFT JOIN users AS user_idusers ON user_idusers.id = blogs.user_id\r\nWHERE user_idusers.id = $user_id -- Replace $user_id with the actual user ID\r\nGROUP BY blogs.blog_id\r\nORDER BY blog_id ASC', 'efasdfdf', '1702754006_657df6d6a37a0_are_cse_and_programming_the_same_thing_1.png', 25, '2023-12-16 14:13:26', NULL),
(8, 'compannyy', 'vnvbn', 'ghfdgth', 'gfhgcvnh', '1702833810_657f2e92ecbdf_grand_finale_of_2023_poster-01.png', 2, '2023-12-17 12:23:30', NULL),
(9, 'DBMS TEST', 'fdfddsfffffffffffffffffffdsafdsdsfdsfdsfdsf', 'dsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsf', 'sdfdsfdsfdsf', '1702835838_657f367e6d666_ways_to_improve_your_cv_and_land_your_dream_job.png', 2, '2023-12-17 12:57:18', '2023-12-17 12:57:57');

-- --------------------------------------------------------

--
-- Table structure for table `bookmarks`
--

CREATE TABLE `bookmarks` (
  `bookmark_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `bookmark_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookmarks`
--

INSERT INTO `bookmarks` (`bookmark_id`, `user_id`, `job_id`, `bookmark_date`) VALUES
(2, 3, 14, '2023-12-16 06:05:06'),
(3, 3, 23, '2023-12-16 09:40:28');

-- --------------------------------------------------------

--
-- Table structure for table `certifications`
--

CREATE TABLE `certifications` (
  `certification_id` bigint(20) UNSIGNED NOT NULL,
  `certification_name` varchar(255) NOT NULL,
  `issuing_authority` varchar(255) NOT NULL,
  `issue_date` date NOT NULL,
  `expiration_date` date DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `certifications`
--

INSERT INTO `certifications` (`certification_id`, `certification_name`, `issuing_authority`, `issue_date`, `expiration_date`, `id`) VALUES
(1, 'Web developer', '', '2023-12-14', '2023-12-08', 25),
(2, 'Web consultbdfbdbant', '1702652440_657c6a182206e_ua.png', '2023-12-14', '2023-12-08', 3),
(4, 'Php developer', '', '2023-12-05', '0000-00-00', 25),
(6, 'sascxasc', '1702652748_657c6b4c7a3df_ua.png', '2023-12-06', '0000-00-00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `industry` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `edu_id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `degree` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`edu_id`, `user_id`, `name`, `degree`, `city`, `start_date`, `end_date`, `description`) VALUES
(1, 25, 'UIU', 'CSE', 'Dhaka', '2023-11-30', '2026-10-14', 'good change'),
(2, 3, 'BUET', 'CSE', 'Dhaka', '2023-11-30', '2027-10-15', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet iste fuga ullam saepe consequuntur harum sunt, perferendis corrupti, nostrum totam fugiat inventore necessitatibus animi fugit? Voluptas repudiandae sequi voluptatem asperiores. Accusamus, voluptates maiores magnam deleniti veniam eum natus recusandae neque facilis perferendis aut non.'),
(3, 3, 'Govt. Laboratory High School', 'SSC', 'Dhaka', '2016-06-29', '2023-10-10', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet iste fuga ullam saepe consequuntur harum sunt, perferendis corrupti, nostrum totam fugiat inventore necessitatibus animi fugit? Voluptas repudiandae sequi voluptatem asperiores. Accusamus, voluptates maiores magnam deleniti veniam eum natus recusandae neque facilis perferendis aut non.');

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `experience_id` int(11) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`experience_id`, `job_title`, `company`, `start_date`, `end_date`, `description`, `id`) VALUES
(1, 'Software Engineer', 'ABC Company', '2022-01-01', '2023-01-01', 'Worked on web development projects.', 3),
(2, 'Project Manager', 'XYZ LTD', '2020-05-01', '2021-05-01', 'Led cross-functional teams.', 3),
(3, 'Data Analyst', '123 Analytics', '2019-03-15', '2020-03-15', 'Performed data analysis tasks.', 3),
(5, 'Programming Hero', 'Phitron', '2023-12-07', '2023-12-21', 'good cahnge', 25);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `applied_users` varchar(255) DEFAULT NULL,
  `jobTitle` varchar(255) NOT NULL,
  `jobCategory` varchar(255) NOT NULL,
  `vacancy` int(11) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `employeeType` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `offerSalary` varchar(255) NOT NULL,
  `jobDescription` text NOT NULL,
  `responsibilities` text NOT NULL,
  `qualification` text NOT NULL,
  `skillExperience` text NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `industry` varchar(50) NOT NULL,
  `application_deadline` datetime DEFAULT '2023-04-12 12:09:34',
  `status` int(11) DEFAULT 1,
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `company_id`, `applied_users`, `jobTitle`, `jobCategory`, `vacancy`, `experience`, `employeeType`, `position`, `offerSalary`, `jobDescription`, `responsibilities`, `qualification`, `skillExperience`, `keywords`, `location`, `industry`, `application_deadline`, `status`, `last_updated`) VALUES
(34, 2, NULL, 'Software Developer', '1', 5, '5 years+', 'Full Time', 'Software Developer', '50000 BDT', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'IT', 'Dhaka,Bangladesh', 'govt', '2023-04-12 12:09:34', 2, '2023-12-17 19:02:31'),
(35, 2, ',3,3', 'Google DATA analyst', '1', 5, '5 years+', 'Full Time', 'Software Developer', '50000 BDT', 'rgdsf', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'IT', 'Dhaka,Bangladesh', 'govt', '2023-04-12 12:09:34', 2, '2023-12-17 19:03:40');

-- --------------------------------------------------------

--
-- Table structure for table `job_categories`
--

CREATE TABLE `job_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_categories`
--

INSERT INTO `job_categories` (`id`, `name`) VALUES
(1, 'Software Developer'),
(2, 'Graphic Designer'),
(3, 'App Development'),
(4, 'Video editing'),
(1, 'Software Developer'),
(2, 'Graphic Designer'),
(3, 'App Development'),
(4, 'Video editing'),
(0, 'asdsad');

-- --------------------------------------------------------

--
-- Table structure for table `language_skills`
--

CREATE TABLE `language_skills` (
  `language_id` int(11) NOT NULL,
  `language_name` varchar(255) NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `language_skills`
--

INSERT INTO `language_skills` (`language_id`, `language_name`, `id`) VALUES
(1, 'English', 3),
(2, 'Spanish', 3),
(3, 'French', 3),
(5, 'urdhu', 25),
(6, 'Bnegal', 25),
(7, 'english', 25);

-- --------------------------------------------------------

--
-- Table structure for table `port_contact`
--

CREATE TABLE `port_contact` (
  `contact_id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` varchar(50) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `port_contact`
--

INSERT INTO `port_contact` (`contact_id`, `user_id`, `name`, `email`, `message`, `status`) VALUES
(1, 3, 'srgerwg', 'a@a.com', 'regergrg', 'Pending'),
(2, 3, 'Kamrul Islam', 'tikegif486@wisnick.com', 'fghg', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `project_link` varchar(100) NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_keyword` varchar(255) DEFAULT NULL,
  `Languages` varchar(255) DEFAULT NULL,
  `Client` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `project_name`, `description`, `project_link`, `id`, `project_keyword`, `Languages`, `Client`) VALUES
(1, 'Seekers', 'A non-organizational job portal', 'https://github.com/KamrulIslamArnob/Seekers---job-portal-using-php-tailwind-mysql', 3, 'web', 'afasd', 'wdawd'),
(2, 'Players', 'A non-organizational cricket portal', 'https://github.com/KamrulIslamArnob/Seekers---job-portal-using-php-tailwind-mysql', 25, 'Application', NULL, NULL),
(9, 'ai', 'rgreg', 'rgfrdgfdg', 3, 'rgegfd', 'gfdg,esfds,fdfdsf,dfdsf,sdf', 'fdgfd'),
(10, 'asdasdsdd', 'sadsdsa', 'dasdsada', 3, 'dasd', 'asdsadsd', 'sadsadsad');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` int(11) NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `question` text NOT NULL,
  `option1` varchar(255) NOT NULL,
  `option2` varchar(255) NOT NULL,
  `option3` varchar(255) NOT NULL,
  `option4` varchar(255) NOT NULL,
  `correct_option` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `job_id`, `question`, `option1`, `option2`, `option3`, `option4`, `correct_option`) VALUES
(1, 2, 'werfesrf', 'r', 'rerwerw', 'erwwer', '', 'r'),
(2, 1, 'Full meaning of Http', 'hyper text tranfer protocol', 'as', 'asd', 'sd', 'h'),
(3, 3, 'asdasd', 'a', 'b', 'c', 'f', 'f'),
(1, 2, 'werfesrf', 'r', 'rerwerw', 'erwwer', '', 'r'),
(2, 1, 'Full meaning of Http', 'hyper text tranfer protocol', 'as', 'asd', 'sd', 'h'),
(3, 3, 'asdasd', 'a', 'b', 'c', 'f', 'f'),
(0, 1, 'drftgret', 'retre', 'tretret', 'retret', 'retret', 'r'),
(0, 1, 'ttretert', 'retretr', 'tretre', 'treter', 'tertrte', 't'),
(0, 24, 'hjhgj', 'jhgjh', 'hjhgj', 'hgjhgjhg', 'jhgjhg', 'j'),
(0, 24, 'jhgjhgj', 'jhgjhg', 'jhgjghj', 'jhgjhgj', 'jhgjghj', 'h'),
(0, 25, 'sdvsdv', 'd', 'sdfd', 'fds', 'fd', '1'),
(0, 25, 'rgferg', 'ergrefg', 'reger', 'gregr', 'ge', '4'),
(0, 26, 'asdads', 'dsadsa', 'sads', 'sdasd', 'asdsd', 'a'),
(0, 26, 'wesfeesdf', 'dw', 'dwd', 'sds', 'sd', 's'),
(0, 27, 'sad', 'd', 'a', 's', 'aa', 'a'),
(0, 27, 'dfwf', 'asdf', 'sad', 'sd', 's', 's'),
(0, 28, 'asdsadsad', 'sadsad', 'sadsad', 'sadsa', 'a', 'a'),
(0, 28, 'aasdsadsa', 'sdasdasd', 'sadsad', 'asdsadsa', 'aa', 'a'),
(0, 29, 'sfdgdsfgdsfdsafdfc', 'a', 'ss', 'sss', 'aa', 'a'),
(0, 29, 'dsfdsfsdfdfdsfds', 'dfdsfdsfds', 'dsfdsf', 'dsfdsf', 'b', 'b'),
(0, 30, 'sadsasadwss', 'a', 'aa', 'aa', 'aaaa', 'a'),
(0, 30, 'sadfwadawsd', 'sad', 'sdsasada', 'sadsadsad', 'aa', 'a'),
(0, 31, 'sadsad', 'sadsd', 'sdsadsad', 'sasd', 'a', 'a'),
(0, 31, 'asdsdasds', 'dsadsad', 'sadsadsad', 'sadsadsad', 'a', 'a'),
(0, 32, 'aaaaaaaaaaaaaaaaaaaa', 'a', 'aa', 'aaa', 'aaaa', 'a'),
(0, 32, 'aaadsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsds', 'c', 'v', 'xx', 'xxxx', 'c'),
(0, 33, 'a ans', 'a', 'xvfb', 'ff', 'dfb', 'a'),
(0, 33, 'b ans', 'sfdf', 'dsfdsf', 'dsfs', 'b', 'b'),
(0, 34, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'a', 'b', 'c', 'd', 'a'),
(0, 34, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'a', 'b', 'c', 'd', 'd'),
(0, 35, 'sedfsdfv', 'a', 'aa', 'aaa', 'ddd', 'a'),
(0, 35, 'asdsadsdsa', 'dsads', 'dsadsad', 'asdsad', 'd', 'd');

-- --------------------------------------------------------

--
-- Table structure for table `resume_achievements`
--

CREATE TABLE `resume_achievements` (
  `achievement_id` int(11) NOT NULL,
  `resume_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resume_achievements`
--

INSERT INTO `resume_achievements` (`achievement_id`, `resume_id`, `title`, `description`) VALUES
(2, 1, 'Innovation Challenge Winner', 'Developed and implemented a cost-effective solution that streamlined business processes.'),
(3, 1, 'Research Excellence Award', 'Published research paper in a renowned journal on advancements in artificial intelligence.'),
(4, 2, 'Community Service Recognition', 'Volunteered in disaster relief efforts, providing support to affected communities.'),
(5, 0, 'Sales Achievement of the Year', 'Exceeded sales targets by 20% through strategic planning and client relationship management.'),
(6, 2, 'Tech Expo Best Presentation', 'Showcased a groundbreaking project at a technology expo, receiving accolades for innovation.'),
(7, 0, 'Customer Satisfaction Star', 'Received consistently high customer satisfaction ratings for exceptional service.'),
(8, 3, 'Coding Competition Winner', 'Secured first place in a national coding competition, showcasing programming prowess.'),
(9, 0, 'Diversity and Inclusion Advocate', 'Initiated and led diversity and inclusion workshops, fostering a more inclusive workplace culture.'),
(10, 3, 'Startup Pitch Competition Champion', 'Pitched and secured funding for a tech startup in a regional entrepreneurship competition.');

-- --------------------------------------------------------

--
-- Table structure for table `resume_education`
--

CREATE TABLE `resume_education` (
  `education_id` int(11) NOT NULL,
  `resume_id` int(11) NOT NULL,
  `school` varchar(255) DEFAULT NULL,
  `degree` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resume_education`
--

INSERT INTO `resume_education` (`education_id`, `resume_id`, `school`, `degree`, `city`, `start_date`, `end_date`, `description`) VALUES
(1, 0, 'University of Science and Technology', 'Bachelor of Engineering in Electrical Engineering', 'City P', '2014-09-01', '2018-06-01', 'Recipient of the Dean’s List award for outstanding academic performance.'),
(2, 1, 'Business Academy', 'Master of Business Administration', 'City Q', '2017-08-01', '2019-05-01', 'Completed a thesis on corporate sustainability strategies.'),
(3, 2, 'Art Institute', 'Bachelor of Fine Arts in Graphic Design', 'City R', '2016-09-01', '2020-05-01', 'Showcased artwork in multiple gallery exhibitions.'),
(4, 0, 'Medical College', 'Doctor of Medicine', 'City S', '2015-08-01', '2021-05-01', 'Participated in medical outreach programs in underserved communities.'),
(5, 1, 'Data Science University', 'Master of Science in Data Science', 'City T', '2019-09-01', '2021-12-01', 'Published research on machine learning algorithms in a reputable journal.'),
(6, 2, 'Liberal Arts College', 'Bachelor of Arts in Psychology', 'City U', '2013-08-01', '2017-05-01', 'Interned at a counseling center, providing support to individuals in need.'),
(7, 2, 'Engineering Institute', 'Master of Science in Mechanical Engineering', 'City V', '2018-09-01', '2020-12-01', 'Conducted research on renewable energy sources.'),
(8, 0, 'Fashion School', 'Bachelor of Fashion Design', 'City W', '2015-09-01', '2019-05-01', 'Designed costumes for a local theater production.'),
(9, 9, 'Environmental Studies College', 'Bachelor of Science in Environmental Science', 'City X', '2017-08-01', '2021-05-01', 'Engaged in community projects promoting environmental sustainability.'),
(10, 10, 'Language Academy', 'Master of Arts in Linguistics', 'City Y', '2016-09-01', '2018-12-01', 'Published a thesis on the impact of language on cultural identity.');

-- --------------------------------------------------------

--
-- Table structure for table `resume_experience`
--

CREATE TABLE `resume_experience` (
  `experience_id` int(11) NOT NULL,
  `resume_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resume_experience`
--

INSERT INTO `resume_experience` (`experience_id`, `resume_id`, `title`, `company`, `location`, `start_date`, `end_date`, `description`) VALUES
(1, 1, 'Software Developer', 'Tech Innovations Inc.', 'City Alpha', '2018-06-01', '2020-12-31', 'Collaborated on the development of cutting-edge software applications.'),
(2, 0, 'Marketing Manager', 'Global Tech Solutions', 'City Beta', '2019-01-15', '2021-03-20', 'Led successful marketing campaigns, resulting in a 30% increase in client engagement.'),
(3, 0, 'Graphic Designer', 'Creative Studios Ltd.', 'City Gamma', '2017-08-01', '2019-12-31', 'Designed visually appealing graphics for various clients.'),
(4, 1, 'Medical Intern', 'City Hospital', 'City Delta', '2020-02-01', '2021-01-31', 'Assisted in various medical procedures and patient care activities.'),
(5, 6, 'Data Scientist', 'Innovate Analytics', 'City Epsilon', '2021-04-01', '2022-09-30', 'Developed predictive models for data-driven decision-making.'),
(6, 1, 'Counseling Assistant', 'Community Counseling Center', 'City Zeta', '2016-05-01', '2017-12-31', 'Provided support and assistance to individuals facing mental health challenges.'),
(7, 2, 'Research Engineer', 'Renewable Energy Solutions', 'City Eta', '2018-10-01', '2020-11-30', 'Conducted research on optimizing renewable energy sources.'),
(8, 2, 'Fashion Designer', 'Couture Creations', 'City Theta', '2017-01-01', '2019-06-30', 'Designed and created unique fashion pieces for runway shows.'),
(9, 0, 'Environmental Scientist', 'Green Earth Organization', 'City Iota', '2019-07-01', '2021-04-30', 'Implemented environmental conservation projects in local communities.'),
(10, 10, 'Linguistics Researcher', 'Language Studies Institute', 'City Kappa', '2018-02-01', '2019-11-30', 'Conducted linguistic research on language acquisition and development.');

-- --------------------------------------------------------

--
-- Table structure for table `resume_project`
--

CREATE TABLE `resume_project` (
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `resume_id` bigint(20) UNSIGNED NOT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `Description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resume_project`
--

INSERT INTO `resume_project` (`project_id`, `resume_id`, `Title`, `link`, `Description`) VALUES
(1, 0, 'E-commerce Platform Development', 'https://example.com/project1', 'Developed a scalable e-commerce platform with secure payment integration.'),
(2, 1, 'Data Analysis Dashboard', 'https://example.com/project2', 'Designed and implemented a data analysis dashboard for business intelligence.'),
(3, 2, 'Mobile App for Language Learning', 'https://example.com/project3', 'Created a mobile app to facilitate language learning with interactive features.'),
(4, 0, 'Smart Home Automation System', 'https://example.com/project4', 'Built a smart home system that allows users to control devices remotely.'),
(5, 1, 'Financial Portfolio Tracker', 'https://example.com/project5', 'Developed a web-based tool for tracking and analyzing investment portfolios.'),
(6, 2, 'Community Health Monitoring App', 'https://example.com/project6', 'Designed an app for monitoring community health indicators and providing health tips.'),
(7, 0, 'Augmented Reality Game', 'https://example.com/project7', 'Developed an augmented reality game that blends virtual and real-world elements.'),
(8, 1, 'Social Networking Platform', 'https://example.com/project8', 'Created a social networking platform with features for connecting users with similar interests.'),
(9, 2, 'E-learning Platform for STEM Subjects', 'https://example.com/project9', 'Built an online platform to facilitate STEM education through interactive courses.'),
(10, 0, 'Environmental Monitoring System', 'https://example.com/project10', 'Implemented a system for monitoring environmental parameters and generating reports.');

-- --------------------------------------------------------

--
-- Table structure for table `resume_skills`
--

CREATE TABLE `resume_skills` (
  `skill_id` bigint(20) UNSIGNED NOT NULL,
  `resume_id` bigint(20) UNSIGNED NOT NULL,
  `skill_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resume_skills`
--

INSERT INTO `resume_skills` (`skill_id`, `resume_id`, `skill_name`) VALUES
(1, 0, 'Java Programming'),
(2, 1, 'Data Analysis'),
(3, 2, 'Web Development'),
(4, 0, 'Machine Learning'),
(5, 1, 'Digital Marketing'),
(6, 2, 'Graphic Design'),
(7, 0, 'Database Management'),
(8, 1, 'Project Management'),
(9, 2, 'Mobile App Development'),
(10, 0, 'Cloud Computing');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `service_name` varchar(255) DEFAULT NULL,
  `service_description` text DEFAULT NULL,
  `service_taken` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `user_id`, `service_name`, `service_description`, `service_taken`) VALUES
(1, 25, 'Good', 'chaged', 0),
(2, 3, 'Make PHP website', 'efgweagferwg', NULL),
(3, 3, 'Web developer', 'wefewweff', NULL),
(4, 3, 'Good', 'fwefew', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `skill_id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `skill_name` varchar(255) DEFAULT NULL,
  `skill_level` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`skill_id`, `user_id`, `skill_name`, `skill_level`) VALUES
(1, 25, 'html', '40'),
(2, 3, 'css', '40'),
(3, 25, 'CSS', '90'),
(4, 25, 'css', '97'),
(5, 3, 'PHP', '100'),
(6, 3, 'JS', '50'),
(7, 3, 'Laravel', '40'),
(8, 3, 'MYsql', '90'),
(9, 3, 'Ajax', '40'),
(10, 3, 'Node.js', '90'),
(11, 3, 'Next.js', '90');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','company','user') NOT NULL DEFAULT 'user',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `DOB` datetime NOT NULL DEFAULT '2023-07-23 00:00:00',
  `LastLogin` datetime DEFAULT '2023-11-24 23:24:59',
  `address` varchar(255) NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `designation` text DEFAULT NULL,
  `about` varchar(250) NOT NULL,
  `phone` int(11) NOT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `cv` varchar(255) DEFAULT NULL,
  `Nationality` varchar(255) NOT NULL,
  `Freelance` varchar(255) DEFAULT NULL,
  `map_location` varchar(500) NOT NULL,
  `Facebook` varchar(250) NOT NULL,
  `Github` varchar(250) NOT NULL,
  `Linkedin` varchar(250) NOT NULL,
  `Whatsapp` varchar(100) NOT NULL,
  `experience_working` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_name`, `email`, `email_verified_at`, `password`, `role`, `status`, `remember_token`, `created_at`, `updated_at`, `DOB`, `LastLogin`, `address`, `profile_picture`, `designation`, `about`, `phone`, `tagline`, `cv`, `Nationality`, `Freelance`, `map_location`, `Facebook`, `Github`, `Linkedin`, `Whatsapp`, `experience_working`) VALUES
(1, 'Admin', 'admin', 'kamrulislamarnob123@gmail.com', NULL, '$2y$12$SIb97yQx4pwnIipDdDp/VeQlu7iv0CdlUc2RLv/mbGVJpFCYCtt8O', 'admin', 'active', 'AjLuMjHII4qlN4yH6UiG27gLUNh7l157cbvhtnQGBXsjBEZzmMkeREgFjqbY', NULL, NULL, '2023-07-23 00:00:00', '2023-11-24 23:24:59', 'r', '', NULL, '', 0, NULL, NULL, '', NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1824.9635855515728!2d90.41863539776362!3d23.821188679181034!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c65061cfebf3%3A0x88f707ce569d4778!2sKuril%20Bishwa%20Road!5e0!3m2!1sen!2sbd!4v1702669224518!5m2!1sen!2sbd\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '', '', '', '', '43'),
(2, 'Company', 'company', 'kislam221170@bscse.uiu.ac.bd', NULL, '$2y$12$gGbvZLs70Xm5HJj9uPX3mubaq3dDs9hiYlRS/Y.VxlOxUknw94AEe', 'company', 'active', NULL, NULL, NULL, '2023-07-23 00:00:00', '2023-11-24 23:24:59', 'gggerdg', '', NULL, '', 0, NULL, NULL, '', NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1824.9635855515728!2d90.41863539776362!3d23.821188679181034!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c65061cfebf3%3A0x88f707ce569d4778!2sKuril%20Bishwa%20Road!5e0!3m2!1sen!2sbd!4v1702669224518!5m2!1sen!2sbd\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '', '', '', '', '44'),
(3, 'Kamrul                                                                                                    Islam Arnob', 'user', 'kamrulislamarnob.ph@gmail.com', NULL, '$2y$12$W5z7JWBiEmZWlza/TKkTbuxq8LfWUs4SQFOvoqTUQLisYmn2zdw6G', 'user', 'active', NULL, '2023-12-07 16:22:25', '2023-12-07 16:22:31', '2023-07-23 00:00:00', '2023-11-24 23:24:59', 'dsa                                                                                                                                                                                                                                                            ', 'database/saved-data/user-profile-image/profile_picture_3.png', 'Community Managment Executive', '                          efewfewfgFG                          ', 1984933215, 'this is my tagline ', 'C:\\xampp\\htdocs\\Seekers---job-portal-using-php-tailwind-mysql\\database\\saved-data\\cv\\cv1.txt', '                                                                                                                                                                                                                                                               ', 'Yes', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1824.9635855515728!2d90.41863539776362!3d23.821188679181034!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c65061cfebf3%3A0x88f707ce569d4778!2sKuril%20Bishwa%20Road!5e0!3m2!1sen!2sbd!4v1702669224518!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '', '', '', '', '23'),
(25, 'rafat Ahmed', 'Arnob', 'connect.arnob@gmail.com', NULL, '$2y$10$D3NcqE/rJXcu3wCi35kSPeGEHqJAqL/QIMzo0Ur6DTa8uNGDhqbeO', 'user', 'active', NULL, NULL, NULL, '2023-12-22 00:00:00', '2023-11-24 23:24:59', '                                                                                                                                                                                                                                                               ', 'saved-data/user-profile-image/profile_picture_25.png', NULL, '     asfgraegergre   ', 0, NULL, NULL, '                                                                                                                                                                                                                                                               ', 'Yes', '<iframe src=', '', '', '', '', '12');

-- --------------------------------------------------------

--
-- Table structure for table `user_resumes`
--

CREATE TABLE `user_resumes` (
  `resume_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `resume_title` varchar(255) NOT NULL,
  `contact_information` text DEFAULT NULL,
  `summary` text DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_resumes`
--

INSERT INTO `user_resumes` (`resume_id`, `user_id`, `resume_title`, `contact_information`, `summary`, `first_name`, `middle_name`, `last_name`, `designation`, `img`, `address`, `email`) VALUES
(0, 3, 'software engineering', '01984933215', 'bkjsabkjfuvfuVFEFHG', 'kamrul ', 'islam', 'arnob', 'Developer', 'database\\saved-data\\resumeimg\\profile_picture_3.png', '1023,mirpur', 'abc@gmail.com'),
(1, 3, 'Designer', 'etryhe4y', 'ergreg', 'faiyullah', 'haque', 'emon', 'Designer', NULL, '1023,mirpur', 'abc@gmail.com'),
(2, 25, 'It officer', '01984933215', 'bkjsabkjfuvfuVFEFHG', 'rashed', 'alam', 'khan', 'Housewife', NULL, '1023,mirpur', 'abc@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`blog_id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD PRIMARY KEY (`bookmark_id`);

--
-- Indexes for table `certifications`
--
ALTER TABLE `certifications`
  ADD PRIMARY KEY (`certification_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`edu_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`experience_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language_skills`
--
ALTER TABLE `language_skills`
  ADD PRIMARY KEY (`language_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `port_contact`
--
ALTER TABLE `port_contact`
  ADD PRIMARY KEY (`contact_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `resume_achievements`
--
ALTER TABLE `resume_achievements`
  ADD PRIMARY KEY (`achievement_id`,`resume_id`),
  ADD KEY `resume_id` (`resume_id`);

--
-- Indexes for table `resume_education`
--
ALTER TABLE `resume_education`
  ADD PRIMARY KEY (`education_id`,`resume_id`),
  ADD KEY `resume_id` (`resume_id`);

--
-- Indexes for table `resume_experience`
--
ALTER TABLE `resume_experience`
  ADD PRIMARY KEY (`experience_id`,`resume_id`),
  ADD KEY `resume_id` (`resume_id`);

--
-- Indexes for table `resume_project`
--
ALTER TABLE `resume_project`
  ADD PRIMARY KEY (`project_id`,`resume_id`),
  ADD KEY `resume_id` (`resume_id`);

--
-- Indexes for table `resume_skills`
--
ALTER TABLE `resume_skills`
  ADD PRIMARY KEY (`skill_id`,`resume_id`),
  ADD KEY `resume_id` (`resume_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`skill_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_resumes`
--
ALTER TABLE `user_resumes`
  ADD PRIMARY KEY (`resume_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `blog_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `bookmarks`
--
ALTER TABLE `bookmarks`
  MODIFY `bookmark_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `certifications`
--
ALTER TABLE `certifications`
  MODIFY `certification_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `edu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `experience_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `language_skills`
--
ALTER TABLE `language_skills`
  MODIFY `language_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `port_contact`
--
ALTER TABLE `port_contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `resume_achievements`
--
ALTER TABLE `resume_achievements`
  MODIFY `achievement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `resume_education`
--
ALTER TABLE `resume_education`
  MODIFY `education_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `resume_experience`
--
ALTER TABLE `resume_experience`
  MODIFY `experience_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `resume_project`
--
ALTER TABLE `resume_project`
  MODIFY `project_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `resume_skills`
--
ALTER TABLE `resume_skills`
  MODIFY `skill_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `skill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `certifications`
--
ALTER TABLE `certifications`
  ADD CONSTRAINT `certifications_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `experience`
--
ALTER TABLE `experience`
  ADD CONSTRAINT `experience_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `language_skills`
--
ALTER TABLE `language_skills`
  ADD CONSTRAINT `language_skills_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `port_contact`
--
ALTER TABLE `port_contact`
  ADD CONSTRAINT `port_contact_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
