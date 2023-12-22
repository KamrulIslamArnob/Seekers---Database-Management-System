<?php
// Include the database connection class
//require_once($_SERVER['DOCUMENT_ROOT'] . '/Seekers---job-portal-using-php-tailwind-mysql/database/crud/DBConnection.php');
require_once '../database/crud/DBConnection.php';

function timeAgo($timestamp, $timezone = 'Asia/Dhaka') {
    $datetime = new DateTime($timestamp, new DateTimeZone($timezone));
    $now = new DateTime(null, new DateTimeZone($timezone));
    $interval = $datetime->diff($now);

    $suffix = ($interval->invert == 1) ? ' ago' : '';

    if ($interval->y >= 1) {
        return $interval->y . ' year' . ($interval->y > 1 ? 's' : '') . ' ago' . $suffix;
    } elseif ($interval->m >= 1) {
        return $interval->m . ' month' . ($interval->m > 1 ? 's' : '') . ' ago' . $suffix;
    } elseif ($interval->d >= 1) {
        return $interval->d . ' day' . ($interval->d > 1 ? 's' : '') . ' ago' . $suffix;
    } elseif ($interval->h >= 1) {
        return $interval->h . ' hour' . ($interval->h > 1 ? 's' : '') . ' ago' . $suffix;
    } elseif ($interval->i >= 1) {
        return $interval->i . ' minute' . ($interval->i > 1 ? 's' : '') . ' ago' . $suffix;
    } else {
        return 'just now';
    }
}

class JobManager {
    private $db;

    public function __construct() {
        $this->db = new DBConnection();
    }

    public function getJobs() {
      
        $currentUserId = $_SESSION['user_id'];
        $userId = $this->db->conn->real_escape_string($currentUserId);

$sql = "SELECT jobs.*, users.name
        FROM jobs
        LEFT JOIN users ON jobs.company_id = users.id
        WHERE jobs.status = 2
          AND (
            jobs.applied_users IS NULL
            OR jobs.applied_users = ''
            OR NOT FIND_IN_SET('$userId', jobs.applied_users)
          )";





        $result = $this->db->conn->query($sql);

        if ($result) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $this->displayJob($row);
                }
            } else {
                echo "No jobs found.";
            }
        } else {
            echo "Error executing the query: " . $this->db->conn->error;
        }
    }

    public function displayJob($jobData) {
        echo '<div class="col-span-12 md:col-span-6 lg:col-span-4">';
        echo '<div class="relative p-6 transition-all duration-300 ease-in-out border border-gray-100/50 rounded-xl hover:-translate-y-2 dark:border-neutral-600/70">';
        echo '<div>';
        echo '</div>';
        echo '<div class="absolute cursor-pointer top-5 ltr:right-5 rtl:left-5">';
        echo '<div class="w-8 h-8 text-center text-gray-100 transition-all duration-300 bg-transparent border rounded border-gray-100/50 hover:bg-red-600 hover:text-white hover:border-transparent dark:border-zinc-700">';
       echo '<a href="post-bookmark.php?job_id=' . $jobData['id'] . '">
            <i class="uil bg-warning uil-heart-alt text-lg leading-[1.8]"></i>
        </a>';
        echo '</div>';
        echo '</div>';
        echo '<div class="mt-4">';
        echo '<a href="job-details.php?job_id=' . $jobData['id'] . '" class="text-gray-900 transition-all duration-300 hover:bg-violet-500 dark:text-gray-50"><h5 class="mb-1 fs-17">' . $jobData['jobTitle'] . '</h5></a>';
         echo '<a class="text-gray-900 transition-all duration-300 hover:bg-violet-500 dark:text-gray-50"><h5 class="mb-1 fs-17">' . $jobData['location'] . '</h5></a>';
        echo '<p class="text-gray-500 dark:text-gray-300">' . $jobData['name'] . '</p>';
        echo '<ul class="flex flex-wrap gap-3 mt-4">';
        echo '<li class="">';
        echo '<span class="bg-green-500/20 text-13 text-green-500 font-medium px-1.5 py-1 rounded mt-1"> $' . $jobData['offerSalary'] . ' / month</span>';
        echo '</li>';
        echo '<li class="">';
        echo '<span class="bg-violet-500/20 text-13 text-violet-500 font-medium px-1.5 py-1 rounded mt-1">Min. ' . $jobData['experience'] . ' Exp.</span>';
        echo '</li>';
        echo '<li class="">';
        echo '<span class="bg-sky-500/20 text-13 text-sky-500 font-medium px-1.5 py-1 rounded mt-1">' . $jobData['position'] . '</span>';
        echo '</li>';
        echo '</ul>';
        echo '</div>';
        echo '<div class="mt-3 ">';
        echo '<p class="mb-5 text-gray-500 dark:text-gray-300">' . $jobData['jobDescription'] . '</p>';
        echo '<div class="flex items-center justify-between pt-4 border-t border-gray-100/50 dark:border-neutral-600/50">';
        echo '<p class="float-left text-gray-500 dark:text-gray-300">' . timeAgo($jobData['last_updated'], 'Asia/Dhaka') . '</p>';
        echo '<div class="text-right">';
        echo '<a href="apply.php?job_id=' . $jobData['id'] . '" data-bs-toggle="modal" class="btn py-1.5 px-3 text-13 group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500 border-transparent text-white">Apply Now <i class="uil uil-angle-right-b"></i></a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
}

// Example usage:
$jobManager = new JobManager();
$jobManager->getJobs();
?>