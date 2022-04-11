<html lang="tr">

<head>
    <meta charset="utf-8">
    <title>404 NOT FOUND</title>

    <?php include('head-req.php'); ?>
</head>

<body class="body-inner">
    <?php include('topbar.php'); ?>
    <?php include('header.php'); ?>

    <!-- 404 Page -->
    <section id="main-container" class="main-container">
        <div class="container">

            <div class="row">

                <div class="col-12">
                    <div class="error-page text-center">
                        <div class="error-code">
                            <h2><strong>404</strong></h2>
                        </div>
                        <div class="error-message">
                            <h3>Oops... Page Not Found!</h3>
                        </div>
                        <div class="error-body">
                            Try using the button below to go to main page of the site <br>
                            <a href="index.php" class="btn btn-primary">Back to Home Page</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <?php include('footer.php'); ?>
    <?php include('js-files.php'); ?>
</body>

</html>