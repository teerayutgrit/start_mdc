<?php 

ob_start();
session_start();
date_default_timezone_set('Asia/Bangkok');

// Regenerate session ID to prevent session fixation attacks
if (!isset($_SESSION['initiated'])) {
    session_regenerate_id();
    $_SESSION['initiated'] = true;
}

// Check if the user is logged in
if (empty($_SESSION['User_Name'])) {
    // Secure way to destroy the session
    session_unset();
    session_destroy();
    // Redirect securely without using HTML <script> tags
    header('Location: login.html');
    exit(); // Ensure no further code is executed
} else {
    // Use htmlspecialchars to prevent XSS attacks if these variables are used in HTML
    $userid = htmlspecialchars($_SESSION["User_id"], ENT_QUOTES, 'UTF-8');
    $deptsys = htmlspecialchars($_SESSION["department"], ENT_QUOTES, 'UTF-8');
    $user_name = htmlspecialchars($_SESSION["User_Name"], ENT_QUOTES, 'UTF-8');
    $Permission_user = htmlspecialchars($_SESSION["Permission"], ENT_QUOTES, 'UTF-8');
}
?>