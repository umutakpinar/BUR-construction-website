<html lang="tr">

<head>
    <meta charset="utf-8">
    <title>!!!!!!!!!!!!</title> <!-- Bu kısımda sayfa başlığı girilecek -->

    <?php include('head-req.php'); ?>
</head>

<body class="body-inner">
    <?php include('topbar.php'); ?>
    <?php include('header.php'); ?>

    <div id="banner-area" class="banner-area" style="background-image:url(images/banner/banner1.jpg)">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title">Project</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="./index.php">Anasayfa</a></li>
                                    <li class="breadcrumb-item"><a href="./projects2.php">Gelecek Projeler</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Her bir projenin main kısmı buraları da db'den çekmeyi unutma şimdilik oluşturmadım
        ancak dbye oto bağanmak için hazır bir .php dosyası lazım include edip istediğim yerde 
        kullanabileyim diye bu konu hakkında buğrayla konuşmayı unutma -->
    <section id="main-container" class="main-container">
        <div class="container">

            <div class="row">
                <div class="col-lg-8">
                    <div id="page-slider" class="page-slider small-bg">
                        <div class="item">
                            <img loading="lazy" class="img-fluid" src="images/projects/project5.jpg" alt="project-image" />
                        </div>

                        <div class="item">
                            <img loading="lazy" class="img-fluid" src="images/projects/project4.jpg" alt="project-image" />
                        </div>
                    </div><!-- Page slider end -->
                </div><!-- Slider col end -->

                <div class="col-lg-4 mt-5 mt-lg-0">

                    <h3 class="column-title mrt-0">Capital Teltway Building</h3>
                    <p>Morbi turpis nisl, auctor ut nisl vel, pellentesque euismod nunc nunc accumsan imperdiet.</p>

                    <ul class="project-info list-unstyled">
                        <li>
                            <p class="project-info-label">Client</p>
                            <p class="project-info-content">Pransbay Powers Authority</p>
                        </li>
                        <li>
                            <p class="project-info-label">Architect</p>
                            <p class="project-info-content">Dlarke Pelli Incorp</p>
                        </li>
                        <li>
                            <p class="project-info-label">Location</p>
                            <p class="project-info-content">McLean, VA</p>
                        </li>
                        <li>
                            <p class="project-info-label">Size</p>
                            <p class="project-info-content">65,000 SF</p>
                        </li>
                        <li>
                            <p class="project-info-label">Year Completed</p>
                            <p class="project-info-content">2015</p>
                        </li>
                        <li>
                            <p class="project-info-label">Categories</p>
                            <p class="project-info-content">Commercial, Interiors</p>
                        </li>
                    </ul>

                </div><!-- Content col end -->

            </div><!-- Row end -->

        </div><!-- Conatiner end -->
    </section><!-- Main container end -->

    <?php include('footer.php'); ?>
    <?php include('js-files.php'); ?>
</body>

</html>