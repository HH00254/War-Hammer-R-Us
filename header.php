<?php
// session_destroy();
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/project.js"></script>
    <link rel="stylesheet" href="project.css"  type="text/css">
    <!-- <link rel="stylesheet" type="text/css" href="main.css"> -->

    <!-- new profile stuff  JS -->
    <script  src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script  src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

   <!-- new Date Picker stuff  JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script  src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

      <!-- Bootstrap CSS v5.2.1 -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@200;300;400;500&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
     <!-- JS Main Bootstrap--->
     <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>War Gaming R Us</title>
</head>
<body >
<div id="webpage-window-container">
    <div id="navigation-and-search-area">

    <form id="page-search" action="products.php" method="post">
        <div class="search-container">
            <input type="text"  name="search" placeholder="Search..." class="search-input">
            <!-- <a href="#" class="search-btn"> -->
                    <i class="fas fa-search" ></i>      
            <!-- </a> -->
        </div>
        </form>
        <nav id="login-navigation" class="webpage-navigation ">
            <ul class="menu-member">
                <?php if(isset($_SESSION["user_id"])): ?>
                    <li>
                        <a href="include/logout.inc.php" class="header-login-a"><Span>🔐</Span>LOGOUT</a>
                    </li>
                    <li>
                        <a href="profile.php"><span>☰</span><?php echo $_SESSION["users_uid"]; ?></a>
                    </li>
                <?php else: ?>
                    <li id="login-nav">
                        <a href="#" class="header-login-a" data-bs-toggle="modal" data-bs-target="#loginModal"><span>🔓</span>LOGIN</a>
                    </li>
                    <li >
                        <a href="signup.php"><span>☰</span>SIGN UP</a>
                    </li>
                <?php endif ?>
            </ul>
        </nav>
    </div>
    <header>
        <section id="background-container" role="banner">
        <div id="background-title">
					<h1>War Gaming R-Us</h1>
				</div>
            </section>
        <nav class="webpage-navigation" aria-label="page-nav-one">
            <ul class="menu-main">
                <li><a href="index.php">HOME</a></li>
                <li><a href="products.php">PRODUCTS</a></li>
                <li><a href="#">FEATURED SALES</a></li>
                <li><a href="community-form.php">COMMUNITY FORUM</a></li>
                <li><a href="#">MEMBER+</a></li>
            </ul>
        </nav>
    </header>
    <main id="main-content-container">

