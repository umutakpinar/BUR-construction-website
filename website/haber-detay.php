<html lang="tr">

<head>
    <meta charset="utf-8">
    <title>Haber Detayı</title>

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

                <div id="haber_icerik" class="container w-100 mb-5 mb-lg-0">

                    <div class="w-100 mt-5 text-cemter container d-flex align-items-center display-3 justify-content-center pb-5">
                        <h1 class="display-3">Yükleniyor ...</h1>
                    </div>

                </div>

            </div>
    </section>



    <?php include('footer.php'); ?>
    <?php include('js-files.php'); ?>
</body>


<script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
<script>
    let banner_area = document.querySelector("#banner-area");
    let selected_id = "<?= $_GET["id"] ?>";
    let haberler = [];
    let selected_haber;
    let html = "";
    let haber_icerik = document.querySelector("#haber_icerik");
    (() => {
        $.ajax({
            url: "./admin/crud-ajax.php?action=read&section=haberler",
            type: "GET",
            success: function(data) {
                haberler = JSON.parse(data);
                selected_haber = haberler.find(haber => haber.haber_id == selected_id);
            }
        }).then(() => {

            banner_area.innerHTML =
                `
                <div class="banner-text">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="banner-heading">
                                    <h1 class="banner-title">Haberler</h1>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb justify-content-center">
                                            <li class="breadcrumb-item"><a href="./index.php">Anasayfa</a></li>
                                            <li class="breadcrumb-item"><a href="./haber.php">Haberler</a></li>
                                            <li class="breadcrumb-item"><a href="#">${selected_haber.baslik}</a></li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`;
        }).then(() => {
            haber_icerik.innerHTML =
                `<div class="post-content post-single col-lg-12">
                        <div class="post-media post-image text-center">
                            <img loading="lazy" src="images/news/news${selected_id}.jpg" class="img-fluid" alt="post-image">
                        </div>

                        <div class="post-body">
                            <div class="entry-header">
                                <div class="post-meta">
                                    <span class="post-author">
                                        <i class="far fa-user"></i><a> B.U.R. Admin </a>
                                    </span>
                                    <span class="post-cat">
                                        <i class="far fa-folder-open"></i><a href="./haber.php"> Haberler</a>
                                    </span>
                                    <span class="post-meta-date"><i class="far fa-calendar"></i> <!-- Buraya db'den gelen haber tarihi eklenecek --> </span>
                                </div>
                                <h2 class="entry-title">
                                    ${selected_haber.baslik}
                                </h2>
                            </div>

                            <div class="entry-content">
                                ${selected_haber.icerik}
                            </div>

                            <div class="tags-area d-flex align-items-center justify-content-between">
                                <div class="post-tags">
                                    ${selected_haber.tags.split(",").map(tag => `<a>${tag}</a>`).join("")}
                                </div>
                            </div>

                        </div>
                    </div>`;
        });
    })();
</script>

</html>