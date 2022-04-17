<?php

session_start();
include "../settings/helper_methods.php";
?>


<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Construction Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <title>Admin Login</title>
    <link rel="icon" type="image/png" href="../images/favicon.png">

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
    <style>
        .admin-bg {
            background-image: linear-gradient(45deg, #292b2c 25%, #FFB600 25%, #FFB600 50%, #292b2c 50%, #292b2c 75%, #FFB600 75%, #FFB600 100%);
            background-size: 56.57px 56.57px;
        }

        .admin-footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .px-12half {
            padding-top: 6.25vh;
            padding-bottom: 6.25vh;
        }

        .middle-content-div {
            height: 75vh;
        }

        .min-vh-50 {
            min-height: 50vh;
        }
    </style>
</head>

<body class="bg-dark">
    <div id="mainContainer" class="bg-dark">

        <div class="container-fluid admin-header admin-bg px-12half shadow-lg"></div>

        <div id="mainContainer" class="d-flex middle-content-div bg-dark justify-content-center align-items-center">
            <div class="card shadow-lg border w-50 min-vh-50 border">
                <div class="d-flex card-header admin-bg justify-content-center align-content-center">
                    <h3 class="text-danger text-center shadow-lg bg-light p-2 rounded-pill">Admin Login Panel</h3>
                </div>
                <div class="card-body">
                    <div class="m-3 p-3 alert alert-danger">
                        This page only for authorized users and B.U.R. Company Administrators.
                    </div>
                    <form action="../settings/admin_login.php?islem=giris" method="post" class="container d-flex flex-column justify-content-center">
                        <div class="input-group mb-2">
                            <label for="username" class="input-group-text input-prepend">Username</label>
                            <input id="username" type="text" name="username" class="form-control input-group-append" required>
                        </div>
                        <div class="input-group mb-2">
                            <label for="password" class="input-group-text input-prepend">Password</label>
                            <input id="password" type="text" name="password" class="form-control input-group-append" required>
                        </div>
                        <input type="submit" class="btn btn-warning btn-lg" value="Login">
                    </form>
                </div>
            </div>
        </div>

        <div class="admin-bg admin-footer px-12half text-center shadow-lg"></div>

    </div>
</body>

</html>