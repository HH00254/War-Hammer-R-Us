<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['profile-settings-button']) && $_SERVER["REQUEST_METHOD"] === "POST")
{
    $user_id        = $_SESSION['user_id'];
    $users_uid      = $_SESSION['users_uid'];
    $profiles_about = filter_input(INPUT_POST, 'profile-settings-about', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $intro_title    = filter_input(INPUT_POST, 'profile-settings-title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $intro_text     = filter_input(INPUT_POST, 'profile-settings-intro', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // Instantiate ProfileInfoContr class
    include  '../classes/dbh.classes.php';
    include  '../classes/profileinfo.classes.php';
    include  '../classes/profileinfo-contr.classes.php';


    $profile_info = new ProfileInfoContr($user_id, $users_uid);

    $profile_info->updateProfileInfo($profiles_about, $intro_title, $intro_text);

    // Going to back to fron page
    header("location: ../profile.php?error=none");
    exit();
}

