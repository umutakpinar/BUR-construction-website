<html lang="tr">

<head>
    <meta charset="utf-8">
    <title>Hizmetlerimiz</title>

    <?php include('head-req.php'); ?>
</head>

<body class="body-inner">
    <?php include('topbar.php'); ?>
    <?php include('header.php'); ?>

    <!-- Services Page Banner -->
    <div id="banner-area" class="banner-area" style="background-image:url(images/banner/banner1.jpg)">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title">Hizmetlerimiz</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="./index.php">Anasayfa</a></li>
                                    <li class="breadcrumb-item"><a href="#">Hizmetlerimiz</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Services Page Main Container editlemeyi unutma 10.04.2022 01.17-->
    <section id="main-container" class="main-container pb-2 clearfix">
        <div class="container">
            <div id="hizmetler-tablo" class="row clearfix">

                <div id="prelaoder" class="h-100 w-100 text-cemter container d-flex align-items-center display-3 justify-content-center pb-5">
                    <h1 class="display-3">Yükleniyor ...</h1>
                </div>

            </div><!-- Main row end -->
        </div><!-- Conatiner end -->
    </section><!-- Main container end -->

    <?php include('footer.php'); ?>
    <?php include('js-files.php'); ?>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script>
        let hizmetler_tablo = document.getElementById('hizmetler-tablo');
        let html = "";
        let hizmetler = [];

        (() => {
            $.ajax({
                url: "./admin/crud-ajax.php?action=read&section=hizmetlerimiz",
                method: "GET",
                success: function(data) {
                    hizmetler = JSON.parse(data);
                    hizmetler.forEach((hizmet) => {
                        html +=
                            `<div class="col-lg-4 col-md-6 mb-5">
                                <div class="ts-service-box">
                                    <div class="ts-service-image-wrapper">
                                        <img loading="lazy" class="w-100" src="images/services/${hizmet.hizmet_id}service.jpg" alt="service-image">
                                    </div>
                                    <div class="d-flex">
                                        <div class="ts-service-box-img">
                                            <img loading="lazy" src="images/service-icons/service-icon${hizmet.hizmet_id}.png" alt="service-icon">
                                        </div>
                                        <div class="ts-service-info">
                                            <h3 class="service-box-title"><a href="./contact.php">${hizmet.hizmet_adi}</a></h3>
                                            <p>${hizmet.aciklama}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>`;
                    });
                    console.log(html);
                    hizmetler_tablo.innerHTML = html;
                }
            });
        })();
    </script>
</body>

</html>