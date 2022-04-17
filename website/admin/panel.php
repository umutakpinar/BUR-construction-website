<?php

session_start();
include "../settings/helper_methods.php";
if (session("login")) {
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

<body>
    Welcome to your panel. You logged in succesfully.
</body>

</html>