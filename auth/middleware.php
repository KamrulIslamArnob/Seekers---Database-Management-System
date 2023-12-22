<?php

class Middleware {
    public static function startSession() {
      //  session_start();

        // Regenerate session ID to prevent session fixation attacks
        if (!isset($_SESSION['initiated'])) {
          //  session_regenerate_id(true);
            $_SESSION['initiated'] = true;
        }
    }

    public static function checkLoggedIn() {
        if (isset($_SESSION['username'])) {
            return true;
        } else {
            return false;
        }
    }

    public static function checkRole($requiredRole, $customRedirectLocation = null) {
        // Check if the user is logged in
        if (!isset($_SESSION['username'])) {
            header("Location: ../auth/login.php");
            exit();
        }
    
        // Check if the user has the required role
    if ($_SESSION['role'] !== $requiredRole) {
        // Debug statement
        echo "Current Role: {$_SESSION['role']}, Required Role: $requiredRole";

        // Redirect to the specified location or display an error message
        if ($customRedirectLocation !== null) {
            header("Location: $customRedirectLocation");
        } else {
            header("Location: ../auth/access-denied.php");
        }
        exit();
    }
    }
    
}

?>
