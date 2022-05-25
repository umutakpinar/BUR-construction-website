<html lang="tr">

<head>
    <meta charset="utf-8">
    <title>Proje Detay</title>

    <?php include('head-req.php'); ?>
</head>

<body class="body-inner">
    <?php include('topbar.php'); ?>
    <?php include('header.php'); ?>

    <div id="banner-area" class="banner-area" style="background-image:url(images/banner/banner1.jpg)">

    </div>
    <section id="main-container" class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-12">


                    <div id="project-wrapper" class="row ">
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
        let banner_area = document.querySelector("#banner-area");
        let selected_id = "<?= $_GET["project_id"] ?>";
        let selected_table = "<?= $_GET["projects"] ?>";
        let tableName = "";
        let projeler = [];
        let info = "";
        let selected_proje;
        let html = "";
        let project_wrapper = document.querySelector("#project-wrapper");
        (() => {
            if (selected_table == 'ger_projelerimiz') {
                tableName = 'Gerçekleştirilmiş Projeler';
                info = "projects"
            } else if (selected_table == 'gel_projelerimiz') {
                tableName = 'Gelecek Projeler';
                info = "projects2";
            }
            $.ajax({
                url: "./admin/crud-ajax.php?action=read&section=" + selected_table,
                type: "GET",
                success: function(data) {
                    projeler = JSON.parse(data);
                    selected_proje = projeler.find(proje => proje.project_id == selected_id);
                }
            }).then(() => {

                banner_area.innerHTML =
                    `
                    <div class="banner-text">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="banner-heading">
                                        <h1 class="banner-title">${selected_proje.baslik}</h1>
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb justify-content-center">
                                                <li class="breadcrumb-item"><a href="./index.php">Anasayfa</a></li>
                                                <li class="breadcrumb-item"> <a href="./${info}.php "> ${tableName} </a></li>
                                                <li class="breadcrumb-item active" aria-current="page">${selected_proje.baslik}</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`;

                project_wrapper.innerHTML =
                    `<div class="post-content post-single col-lg-12">
                        <div class="post-media post-image text-center">
                            <img loading="lazy" src="images/${info}/${selected_id}.jpg" class="img-fluid" alt="post-image">
                        </div>

                        <div class="post-body">
                            <div class="entry-header">
                                <div class="post-meta">
                                    <span class="post-author">
                                        <i class="far fa-user"></i><a> B.U.R. İnşaat </a>
                                    </span>
                                    <span class="post-cat">
                                        <i class="far fa-folder-open"></i><a href="./${info}.php"> ${tableName}</a>
                                    </span>
                                    <span class="post-meta-date"><i class="fas fa-info-cirle"></i> ${selected_proje.info} </span>
                                </div>
                                <h2 class="entry-title">
                                    ${selected_proje.baslik}
                                </h2>
                            </div>

                            <div class="entry-content">
                                ${selected_proje.icerik}
                            </div>

                            <div class="tags-area d-flex align-items-center justify-content-between">
                                <div class="post-tags">
                                    ${selected_proje.info.split(",").map(tag => `<a>${tag}</a>`).join("")}
                                </div>
                            </div>

                        </div>
                    </div>`;

            });
        })();
    </script>
</body>

</html>