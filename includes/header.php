<?php 
ini_set('display_errors', true);
error_reporting(E_ALL);
session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>youth care</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/icon.png" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->

    <!--________________-->

    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!--________________-->

    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">



    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center ">
        <div class="container d-flex align-items-center justify-content-between">

            <a href="index.php" class="logo d-flex align-items-center me-auto me-lg-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1>Y<span>.</span>C</h1>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li class=""><a href="index.php">Home</a></li>
                    <li><a href="Activities.php">Activities</a></li>
                    <li><a href="Trips.php">Trips</a></li>
                    <li><a href="Courses.php">Courses</a></li>
                    <li><a href="Inventions.php">Inventions</a></li>
                    <?php if (isset($_SESSION["loged_in"]) && $_SESSION["loged_in"]==1) {  ?>
                        <li><a href="profile.php">Profile</a></li>
                    <?php }?>

                    <?php if (isset($_SESSION["loged_in"]) && $_SESSION["loged_in"]==1) { if (isset($_SESSION["is_admin"]) && $_SESSION["is_admin"]==1) {  ?>

                        <li><a href="admin.php">Admin</a></li>
                    <?php }}?>

                    <?php if (isset($_SESSION["loged_in"]) && $_SESSION["loged_in"]==1) {  ?>

                        <li><a href="log_out.php" class="text-danger">Log out</a></li>
                    <?php }?>

                </ul>
            </nav>
            <!-- .navbar -->
            <?php if (!isset($_SESSION["loged_in"]) || $_SESSION["loged_in"]==0) {?>
            <a class="btn-book-a-table" href="./logIn.php">get in touch</a>
            <?php } ?>
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        </div>
    </header>
    <!-- End Header -->
