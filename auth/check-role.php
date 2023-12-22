<?php

    if(isset($_SESSION['username']) AND $_SESSION['role']=='user'){
        header("Location:http://localhost/Seekers---job-portal-using-php-tailwind-mysql/user/dashboard-user.php");
    }else if(isset($_SESSION['username']) AND $_SESSION['role']=='admin')
    {
        header("Location:http://localhost/Seekers---job-portal-using-php-tailwind-mysql/admin/dashboard-admin.php");
    }
    
    // else if(isset($_SESSION['username']) AND $_SESSION['role']=='company')
    // {
    //     header("Location:http://localhost/Seekers---job-portal-using-php-tailwind-mysql/user/dashboard-user.php");
    // }

?>