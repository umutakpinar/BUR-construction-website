<html lang="tr">

<head>
    <meta charset="utf-8">
    <title>Gelecek Projeler</title> <!-- Bu kısımda sayfa başlığı girilecek -->

    <?php include('head-req.php'); ?>
</head>

<body class="body-inner">
    <?php include('topbar.php'); ?>
    <?php include('header.php'); ?>

    <!-- Projects Page Banner -->
    <div id="banner-area" class="banner-area" style="background-image:url(images/banner/banner1.jpg)">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title">Gelecek Projeler</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
                                    <li class="breadcrumb-item"><a href="#">Projeler</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Gelecek Projeler</li>
                                </ol>
                            </nav>
                        </div>
                    </div><!-- Col end -->
                </div><!-- Row end -->
            </div><!-- Container end -->
        </div><!-- Banner text end -->
    </div><!-- Banner area end -->


    <!-- Projects Page Main Container -->
    <!-- NOT: Burada her bir projenin kendi php sayfasını oluşturup tıklanıldığında oraya
        yönlenebilecek (routing) işlemi yaptırmayı unutma
        Her bir sayfanın birbirinin aynısı olacağı için yalnızca bilgileri veritabanından alarak
        kullnabilirsin. Sayfalar aynı olacağından projects-single.php adında bir sayda ekledim
        Onu veritabanındaki bilgilerle doldurup kullanabilirsin. -->
    <section id="main-container" class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-12">


                    <div class="row shuffle-wrapper">
                        <div class="col-1 shuffle-sizer"></div>

                        <div class="col-lg-4 col-md-6 shuffle-item" data-groups="[&quot;government&quot;,&quot;healthcare&quot;]">
                            <div class="project-img-container">
                                <a class="gallery-popup" href="images/projects2/project10.jpg">
                                    <img class="img-fluid" src="images/projects2/project10.jpg" alt="project-image">
                                    <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                                </a>
                                <div class="project-item-info">
                                    <div class="project-item-info-content">
                                        <h3 class="project-item-title">
                                            <a href="projects-single.php"> İzmir Çiğli Tramvay Hattı Yapım İşi</a>
                                        </h3>
                                        <p class="project-cat">Tramvay Hattı Yapım İşi</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- shuffle item 1 end -->

                        <div class="col-lg-4 col-md-6 shuffle-item" data-groups="[&quot;healthcare&quot;]">
                            <div class="project-img-container">
                                <a class="gallery-popup" href="images/projects2/project20.jpg">
                                    <img class="img-fluid" src="images/projects2/project20.jpg" alt="project-image">
                                    <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                                </a>
                                <div class="project-item-info">
                                    <div class="project-item-info-content">
                                        <h3 class="project-item-title">
                                            <a href="projects-single.php">Riyadh City South Faz-4, Altyapı İşleri</a>
                                        </h3>
                                        <p class="project-cat">Altyapı Çalışması</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- shuffle item 2 end -->

                        <div class="col-lg-4 col-md-6 shuffle-item" data-groups="[&quot;infrastructure&quot;,&quot;commercial&quot;]">
                            <div class="project-img-container">
                                <a class="gallery-popup" href="images/projects2/project30.jpg">
                                    <img class="img-fluid" src="images/projects2/project30.jpg" alt="project-image">
                                    <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                                </a>
                                <div class="project-item-info">
                                    <div class="project-item-info-content">
                                        <h3 class="project-item-title">
                                            <a href="projects-single.php">Silifke - Mut (Kısım 1) Yolu Projesi</a>
                                        </h3>
                                        <p class="project-cat">2x2 Şeritli Otoyol</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- shuffle item 3 end -->

                        <div class="col-lg-4 col-md-6 shuffle-item" data-groups="[&quot;education&quot;,&quot;infrastructure&quot;]">
                            <div class="project-img-container">
                                <a class="gallery-popup" href="images/projects2/project40.jpg">
                                    <img class="img-fluid" src="images/projects2/project40.jpg" alt="project-image">
                                    <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                                </a>
                                <div class="project-item-info">
                                    <div class="project-item-info-content">
                                        <h3 class="project-item-title">
                                            <a href="projects-single.php">Eyiste Viyadüğü Projesi</a>
                                        </h3>
                                        <p class="project-cat">Dengeli Konsol Viyadük</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- shuffle item 4 end -->

                        <div class="col-lg-4 col-md-6 shuffle-item" data-groups="[&quot;infrastructure&quot;,&quot;education&quot;]">
                            <div class="project-img-container">
                                <a class="gallery-popup" href="images/projects2/project50.jpg">
                                    <img class="img-fluid" src="images/projects2/project50.jpg" alt="project-image">
                                    <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                                </a>
                                <div class="project-item-info">
                                    <div class="project-item-info-content">
                                        <h3 class="project-item-title">
                                            <a href="projects-single.php">Dubai Vista Plajı Kuleleri Bina Projesi</a>
                                        </h3>
                                        <p class="project-cat">Rezidans Projesi</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- shuffle item 5 end -->

                        <div class="col-lg-4 col-md-6 shuffle-item" data-groups="[&quot;residential&quot;]">
                            <div class="project-img-container">
                                <a class="gallery-popup" href="images/projects2/project60.jpg">
                                    <img class="img-fluid" src="images/projects2/project60.jpg" alt="project-image">
                                    <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                                </a>
                                <div class="project-item-info">
                                    <div class="project-item-info-content">
                                        <h3 class="project-item-title">
                                            <a href="projects-single.php">Cezayir Tizi Ouzou Otoyolu Projesi</a>
                                        </h3>
                                        <p class="project-cat">2x3 şeritli otoyol</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- shuffle item 6 end -->

                    </div><!-- shuffle end -->
                </div>

            </div><!-- Content row end -->

        </div><!-- Conatiner end -->
    </section><!-- Main container end -->

    <?php include('footer.php'); ?>
    <?php include('js-files.php'); ?>
</body>

</html>