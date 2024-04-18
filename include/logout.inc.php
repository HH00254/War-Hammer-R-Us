<?php
session_start();
session_unset();

// Set the cookie with an expiration time in the past to delete it
if (isset($_COOKIE['user_log'])) 
{
    unset($_COOKIE['user_log']);
    setcookie('user_log', '',  time() - 3600, '/');
}

session_destroy();

// Going to back to fron page
header("location: ../index.php?error=none");
exit();