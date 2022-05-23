<html lang="tr">

<head>
    <meta charset="utf-8">
    <title>Gerçekleştirilmiş Projeler</title> <!-- Bu kısımda sayfa başlığı girilecek -->

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
                            <h1 class="banner-title">Gerçekleştirilmiş Projeler</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
                                    <li class="breadcrumb-item"><a href="#">Projeler</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Gerçekleştirilmiş Projeler</li>
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


                    <div id="project-wrapper" class="row shuffle-wrapper">
                        <div id="prelaoder" class="h-100 w-100 text-cemter container d-flex align-items-center display-3 justify-content-center pb-5">
                            <h1 class="display-3">Yükleniyor ...</h1>
                        </div>
                    </div>


                </div>

            </div><!-- Content row end -->

        </div><!-- Conatiner end -->
    </section><!-- Main container end -->

    <?php include('footer.php'); ?>
    <?php include('js-files.php'); ?>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script>
        (() => {
            $.get("ajax-get-projects.php?projects=ger_projelerimiz", function(data, status) {
                let projects = JSON.parse(data);
                console.clear();
                console.log("DB Bağlantı Durumu: ", status);
                let preparedHTML = "";
                projects.forEach(project => {
                    preparedHTML += `<div id="project-preview" class="col-lg-4 col-md-6 shuffle-item">
                                        <div class="project-img-container">
                                            <a class="gallery-popup" href="images/projects/${project.project_id}.jpg">
                                                <img class="img-fluid" src="images/projects/${project.project_id}.jpg" alt="project-image">
                                                <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                                            </a>
                                            <div class="project-item-info">
                                                <div class="project-item-info-content">
                                                    <h3 class="project-item-title">
                                                        <a href="inspect-project.php?projects=ger_projelerimiz&project_id=${project.project_id}"> ${project.baslik}</a>
                                                    </h3>
                                                    <p class="project-cat">${project.info}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`;
                });
                $("#project-wrapper").html(preparedHTML);
            });
        })();
    </script>
</body>

</html>