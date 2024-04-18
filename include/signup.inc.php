<?php

if (isset($_POST['create_account_button']) && $_SERVER["REQUEST_METHOD"] === "POST") 
{
    
    $city_id            = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $users_uid          = filter_input(INPUT_POST, 'user_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $user_first_name    = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $user_last_name     = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $users_email        = strtolower(trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL)));
    $users_email_repeat = strtolower(trim(filter_input(INPUT_POST, 'email_repeat', FILTER_SANITIZE_EMAIL)));
    $user_address       = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $province_code      = $_POST['province'];
    $postal_code        = filter_input(INPUT_POST, 'postal_code', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $users_pwd          = $_POST['password'];
    $users_pwd_repeat   = $_POST['password_repeat'];
    $cardholder_name    = filter_input(INPUT_POST, 'card_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $card_number_token  = filter_input(INPUT_POST, 'card_number', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $expiration_date    =  $_POST['datepicker'];

    //Instantiate SignupContr class
    require_once  '../classes/dbh.classes.php';
    require_once  '../classes/signup.classes.php';
    require_once  '../classes/signup-contr.classes.php';

    $signup = new SignupContr($city_id,
                              $users_uid,
                              $user_first_name,
                              $user_last_name,
                              $users_email,
                              $users_email_repeat,
                              $user_address,
                              $postal_code,
                              $users_pwd,
                              $users_pwd_repeat,
                              $cardholder_name,
                              $card_number_token,
                              $expiration_date,
                              $notes = '',
                              $role_id = 1);

    // Running error handlers and user signup
    $signup->signupUser();

    // Create a new profile
    $retrieved_user_id = $signup->fetchUserID($users_uid);

    // Instantiate ProfileInfoContr class
    require_once  '../classes/profileinfo.classes.php';
    require_once  '../classes/profileinfo-contr.classes.php';

    $profile_info = new ProfileInfoContr($retrieved_user_id, $users_uid);
    $profile_info->setDefaultProfileInfo();

    // Going to back to fron page
    header("location: ../index.php?error=none");
}