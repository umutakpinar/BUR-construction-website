<?php

session_start();
include "../settings/helper_methods.php";
if (session("login") == false) {
    header("Location: login.php");
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
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
        ::-webkit-scrollbar {
            width: 0.5rem;
        }

        ::-webkit-scrollbar-thumb {
            background-color: #FFB600;
        }

        ::-webkit-scrollbar-track {
            background-color: #F5F5F5;
        }

        ::-webkit-scrollbar-corner {
            border-radius: 20px;
        }

        body {
            font-size: 100% !important;
        }

        @media screen and (max-width: 320px) {

            /* 320px'e akdar bu kodlar çalışsın!*/
            body {
                font-size: 0.9rem !important;
            }
        }

        @media screen and (min-width: 320px) {

            /* 320px ve üzeri */
            body {
                font-size: 1.0rem !important;
            }
        }

        @media screen and (min-width: 480px) {

            /* #480px ve üzeri */
            body {
                font-size: 1.1rem !important;
            }
        }

        @media screen and (min-width: 600px) {

            /* #600px ve üzeri */
            body {
                font-size: 1.2rem !important;
            }
        }

        @media screen and (min-width: 768px) {

            /* #768px ve üzeri */
            body {
                font-size: 1.3rem !important;
            }
        }

        @media screen and (min-width: 900px) {

            /* #900px ve üzeri */
            body {
                font-size: 1.4rem !important;
            }
        }

        @media screen and (min-width: 1024px) {

            /* #1024px ve üzeri */
            body {
                font-size: 1.5rem !important;
            }
        }

        @media screen and (min-width: 1200px) {

            /* #1200px ve üstünde bu kodlar çalışsın hem min-width vererek git mobile öncelik ver mobil kodlarını yukarıda yaz! Sadece ilk kodun max-width değeri ver diğerleri min-width; */
            body {
                font-size: 1.6rem !important;
            }
        }

        .left-side {
            display: none;
            background-color: #282b2a;
            height: 100vh;
            border-right: #FFB600 1px solid;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1;
            padding: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .side-button {
            background-color: #282b2a;
            padding: 1vh;
            border-top: 1px #FFB600 solid;
            border-bottom: 1px #FFB600 solid;
            border-right: 1px #FFB600 solid;
            border-radius: 0px 5px 5px 0px;
            margin-bottom: 10px;
            cursor: pointer;
            z-index: 1;
            position: fixed;
            left: 0vw;
        }

        .right-side {
            background-color: #23282D;
            height: 100vh;
            position: fixed;
            top: 0;
            right: 0;
            z-index: 0;
            padding: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        #header-sec {
            background-image: linear-gradient(45deg, #292b2c 12.5%, #FFB600 12.5%, #FFB600 25%, #292b2c 25%, #292b2c 37.5%, #FFB600 37.5%, #FFB600 50%,
                    #292b2c 50%, #292b2c 62.5%, #FFB600 62.5%, #FFB600 75%, #292b2c 75%, #292b2c 87.5%, #FFB600 87.5%, #FFB600);
            border: #FFB600 solid 1px;
        }

        .active-list-item {
            background-color: red !important;
        }

        .text-white {
            color: white;
        }

        .bg-blue {
            background-color: #007BFF;
        }

        .h-67 {
            height: 67%;
        }

        .h-90 {
            height: 90%;
        }

        .inactiveLink {
            pointer-events: none;
            cursor: default;
        }
    </style>
</head>

<body>
    <div class="container-fluid bg-dark h-100">
        <div class="row">
            <div class="left-side col-4 py-3">
                <!-- left side -->
                <div class="container h-100">
                    <ul class="list-unstyled h-100 text-center py-5 d-flex flex-column justify-content-around text-dark">
                        <span style="color: darkorange;"> Aktif Admin: <span style="color: red;"> <?= $_SESSION["username"] ?></span></span>
                        <span style="color: darkorange;">Düzenlemek istediğiniz bölümü seçin: </span>
                        <li class="d-block"><a id="projelerimiz" class="list-item bg-warning p-1 rounded ws-50 d-block" href="?edit=projelerimiz"> Projelerimiz</a></li>
                        <li class="d-block"><a id="hizmetlerimiz" class="list-item bg-warning p-1 rounded ws-50 d-block" href="?edit=hizmetlerimiz"> Hizmetlerimiz</a></li>
                        <li class="d-block"><a id="haberler" class="list-item bg-warning p-1 rounded ws-50 d-block" href="?edit=haberler"> Haberler</a></li>
                        <li class="d-block"><a id="iletisim" class="list-item bg-warning p-1 rounded ws-50 d-block" href="?edit=iletisim"> İletişim</a></li>
                        <form action="../settings/admin_login.php?islem=cikis" method="post" class="d-flex justify-content-center align-items-center">
                            <button type="submit" class="btn-lg ws-50 btn-danger text-white">Logout</button>
                        </form>
                    </ul>
                </div>
            </div>
            <a onclick="toggle()" class="side-button mt-1" style="left: 0vw;">
                <i class="display-5 fas fa-arrow-right" style="color: darkorange;"></i>
            </a>
            <div class="right-side col-12">
                <!-- right side -->
                <div class="container">
                    <div id="header-sec" class="jumbotron row p-0 pt-3 text-center align-items-center">
                        <h3 class="col text-danger"><a href="./panel.php"> B.U.R. Admin Panel</a></h3>
                    </div>
                    <div id="main-container" class="">
                        <!-- BURADA KALDIN!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
                        <?php //Burada eğer url barında # veya boş ise bunu göster onun dışında edit= id yazan id ne ise o seçeneğin .php dosyasını göster
                        if (isset($_GET["edit"])) {
                            $edit = $_GET["edit"];
                            if ($edit == "projelerimiz") {
                                include "edit_projelerimiz.php";
                            } elseif ($edit == "haberler") {
                                include "edit_haberler.php";
                            } elseif ($edit == "iletisim") {
                                include "edit_iletisim.php";
                            } elseif ($edit == "hizmetlerimiz") {
                                include "edit_hizmetlerimiz.php";
                            }
                        } else {
                            echo '<div class="alert alert-danger p-5" role="alert">
                            <span>
                                B.U.R. İnşaat Admin Yönetim Paneline hoşgeldiniz <b><?= session("username") ?></b> .
                                <br>
                                Sol üstteki ok butonuna basarak açılan menüden değişiklik yapmak istediğiniz bölümü seçin.
                            </span>
                        </div>';
                        }
                        //daha sonra burada sol menüdeki başlıkalrdan hangisi urlye gönderilmişse ona göre burayı düzenleeycek kodu yazdır
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        //immediately invoked function expression tanımladım sayfa yenilendiğinde bu sayfadaki get işlemini alacak (url abrında yazan işlemi ?'den sonrakini yani)
        (() => {
            let url = window.location.href;
            if (url.includes("?edit=")) {
                var this_page_get_process = url.split("?")[1]; //urlyi komple alıp split ile ? işaretinden sonraik kısmı yani get değerini adlım edit = header şeklinde
                this_page_get_process = this_page_get_process.split("=")[1]; // daha sonra ='i ikiye bölüp ikinci kısmını adlım header (aslında yuakrıda direkt oalrak = işareti ile bölümleme yapılabilirdi.)
                var listItems = document.querySelectorAll(".list-item"); //list itemlerini alıyorum
                listItems.forEach((item) => {
                    if (item.id == this_page_get_process) { //burada list itemlerindeki idleri kontrol ediyorum. eğer idleri eşleşiyorsa classı active-list-item olarak ekliyorum.
                        item.classList.add("active-list-item");
                    }
                });
            }
        })();

        var x = document.querySelector(".left-side");
        var btn = document.querySelector(".side-button");

        function toggle() {
            if (x.style.display === "none" || btn.style.left === "0vw") {
                x.style.display = "block";
                btn.style.left = "33vw";
            } else {
                x.style.display = "none";
                btn.style.left = "0vw";
            }
        }
    </script>

</body>

</html>