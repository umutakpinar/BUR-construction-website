<?php

session_start();
include "../settings/helper_methods.php";
if (session("login") == false) {
    header("Location: login.php");
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>

<!-- Bootstrap -->
<!-- <link rel="stylesheet" href="./website/plugins/bootstrap/bootstrap.min.css"> -->
<link rel="stylesheet" href="../plugins/bootstrap/bootstrap.min.css" />
<!-- FontAwesome -->
<link rel="stylesheet" href="../plugins/fontawesome/css/all.min.css">
<!-- Animation -->
<link rel="stylesheet" href="../plugins/animate-css/animate.css">
<!-- slick Carousel -->
<link rel="stylesheet" href="../plugins/slick/slick.css">
<link rel="stylesheet" href="../plugins/slick/slick-theme.css">
<!-- Colorbox -->
<link rel="stylesheet" href="../plugins/colorbox/colorbox.css">
<!-- Template styles-->
<link rel="stylesheet" href="../css/style.css">

<body>
    <div class="d-flex">
        <div id="header" class="row container bg-warning">
            header
        </div>
        <div id="main" class="row container">
            <div id="navbar-left" class="container bg-danger w-25 h-100">
                left navbar
            </div>
            <div id="right-section" class="container w-75 h-100">
                right section
            </div>
        </div>
        <div id="footer" class="row container bg-warning">
            footer
        </div>
    </div>
    <!-- Welcome to your panel. You logged in succesfully. <br> <?= "Welcome" . $_SESSION["username"] ?> -->
</body>

</html>