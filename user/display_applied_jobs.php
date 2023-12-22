<?php
// Include the database connection class
//require_once($_SERVER['DOCUMENT_ROOT'] . '/Seekers---job-portal-using-php-tailwind-mysql/database/crud/DBConnection.php');
require_once '../database/crud/DBConnection.php';
class JobManager {
    private $db;

    public function __construct() {
        $this->db = new DBConnection();
    }

      

public function getJobs() {

    $currentUserId = $_SESSION['user_id'];
    $userId = $this->db->conn->real_escape_string($currentUserId);

$sql = "SELECT *
        FROM jobs
        WHERE status = 2
          AND (applied_users = '' OR FIND_IN_SET('$userId', applied_users) > 0);";


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
    $currentUser = $_SESSION['user_id'];
    $appliedUsers = explode(',', $jobData['applied_users']);
       // Output HTML for each job
       
        echo '<div class="p-5 border border-gray-100/50 rounded-md relative hover:-translate-y-1.5 transition-all duration-500 ease-in-out group-data-[theme-color=violet]:hover:border-violet-500 group-data-[theme-color=sky]:hover:border-sky-500 group-data-[theme-color=red]:hover:border-red-500 group-data-[theme-color=green]:hover:border-green-500 group-data-[theme-color=pink]:hover:border-pink-500 group-data-[theme-color=blue]:hover:border-blue-500 hover:shadow-md hover:shadow-gray-100/30 dark:border-neutral-600 dark:hover:shadow-neutral-900">';
        echo '<div class="grid grid-cols-12">';
        echo '<div class="col-span-12 lg:col-span-1">';
        echo '<a href="company-details.html"><img src="assets/images/featured-job/img-01.png" alt="" class="img-fluid rounded-3"></a>';
        echo '</div>';
        echo '<div class="col-span-12 lg:col-span-9">';
        echo '<div class="mt-4 lg:mt-0">';
        echo '<h5 class="mb-1 text-17"><a href="job-details.php?job_id=' . $jobData['id'] . '" class="text-gray-900 dark:text-gray-50">' . $jobData['jobTitle'] . '<small class="font-normal text-gray-500"> (' . $jobData['experience'] . ' Exp.)</small></a></h5>';
        echo '<ul class="flex gap-3 mb-0">';
        echo '<li class=""><p class="mb-0 text-sm text-gray-500 dark:text-gray-300">' . $jobData['industry'] . '</p></li>';
        echo '<li class=""><p class="mb-0 text-sm text-gray-500 dark:text-gray-300"><i class="mdi mdi-map-marker"></i> ' . $jobData['location'] . '</p></li>';
        echo '<li class=""><p class="mb-0 text-sm text-gray-500 dark:text-gray-300"><i class="uil uil-wallet"></i> $' . $jobData['offerSalary'] . ' / month</p></li>';
        echo '</ul>';
        echo '<div class="flex flex-wrap gap-2 mt-3">';
        echo '<span class="px-2 py-0.5 mt-1 font-medium text-red-500 rounded bg-red-500/20 text-13">' . $jobData['employeeType'] . '</span>';
        echo '<span class="px-2 py-0.5 mt-1 font-medium text-yellow-500 rounded bg-yellow-500/20 text-13">Urgent</span>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '<div class="items-center col-span-12 lg:col-span-2">';
        echo '<ul class="flex flex-wrap gap-3 mt-4 lg:mt-0">';
        echo '<li class="w-10 h-10 text-lg leading-10 text-center text-blue-500 rounded-full bg-blue-500/20" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Approve" data-bs-original-title="Approve">';
        if (in_array($currentUser, $appliedUsers)) {
            echo '<span class="text-center avatar-sm primary-bg-subtle d-inline-block rounded-circle fs-18">Applied</span>';
        } else {
            echo '<a href="apply.php?job_id=' . $jobData['id'] . '" class="text-center avatar-sm primary-bg-subtle d-inline-block rounded-circle fs-18" onclick="return confirm(\'Are you sure you want to apply this job?\')">Apply</a>';
        }
        echo '</li>';
      echo '</li>';

        echo '</li>';
        echo '</ul>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
}

// Example usage:
$jobManager = new JobManager();
$jobManager->getJobs();
?>