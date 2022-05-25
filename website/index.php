<html lang="tr">

<head>
    <meta charset="utf-8">
    <title>BUR İnşaat</title>

    <?php include('head-req.php'); ?>
</head>

<body class="body-inner">
    <?php include('topbar.php'); ?>
    <?php include('header.php'); ?>
    <?php include('main.php '); ?>
    <?php include('footer.php'); ?>
    <?php include('js-files.php'); ?>

    <script>
        (async () => {

        })().then(() => {
            let slick_dots = document.querySelectorAll(".slick-dots");
            slick_dots.forEach(item => item.classList.add("bg-dark"));
        });
    </script>

</body>



</html>