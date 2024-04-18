<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['login_button']) && $_SERVER["REQUEST_METHOD"] === "POST") {

    // Grabbing the data

    if (strpos($_POST['user_login_name'], '@')) 
    {
        $users_uid = filter_input(INPUT_POST, 'user_login_name', FILTER_SANITIZE_EMAIL);
    }
    else 
    {
        $users_uid = filter_input(INPUT_POST, 'user_login_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    $pwd = $_POST['login_password'];

    //Instantiate SignupContr class
    include "../classes/dbh.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login-contr.classes.php";

    $login = new LoginContr($users_uid , $pwd);
    
    if ($_SESSION["useruid"] === $users_uid)
    {
        header("location: ../index.php?error=userisalreadyloggedin");
        exit();
    }

    // Running error handlers and user signup
    $login->loginUser();

    // Going to back to fron page
    header("location: ../index.php?error=1none");
}