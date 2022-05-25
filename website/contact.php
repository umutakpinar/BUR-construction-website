<html lang="tr">

<head>
    <meta charset="utf-8">
    <title>İletişim Bilgilerimiz</title> <!-- Bu kısımda sayfa başlığı girilecek -->

    <?php include('head-req.php'); ?>
</head>

<body class="body-inner">
    <?php include('topbar.php'); ?>
    <?php include('header.php'); ?>
    <!-- Contact Page Banner -->
    <div id="banner-area" class="banner-area" style="background-image:url(images/banner/banner1.jpg)">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title">İletişim</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="/index.php">Anasayfa</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">İletişim</li>
                                </ol>
                            </nav>
                        </div>
                    </div><!-- Col end -->
                </div><!-- Row end -->
            </div><!-- Container end -->
        </div><!-- Banner text end -->
    </div><!-- Banner area end -->

    <!-- Contact Page Main -->
    <section id="main-container" class="main-container">
        <div class="container">

            <div class="row text-center">
                <div class="col-12">
                    <h2 class="section-title">BUR İnşaat</h2>
                    <h3 class="section-sub-title">Bilgilerimiz</h3>
                </div>
            </div>
            <!--/ Title row end -->

            <div class="row">
                <div class="col-md-4">
                    <div class="ts-service-box-bg text-center h-100">
                        <span class="ts-service-icon icon-round">
                            <i class="fas fa-map-marker-alt mr-0"></i>
                        </span>
                        <div class="ts-service-box-content">
                            <h4>Ofis Adresimiz</h4>
                            <p>39100 BUR İnşaat, Kırklareli/Türkiye</p>
                        </div>
                    </div>
                </div><!-- Col 1 end -->

                <div class="col-md-4">
                    <div class="ts-service-box-bg text-center h-100">
                        <span class="ts-service-icon icon-round">
                            <i class="fa fa-envelope mr-0"></i>
                        </span>
                        <div class="ts-service-box-content">
                            <h4>Email</h4>
                            <p>office@burinsaat.com</p>
                        </div>
                    </div>
                </div><!-- Col 2 end -->

                <div class="col-md-4">
                    <div class="ts-service-box-bg text-center h-100">
                        <span class="ts-service-icon icon-round">
                            <i class="fa fa-phone-square mr-0"></i>
                        </span>
                        <div class="ts-service-box-content">
                            <h4>Bizi Arayın</h4>
                            <p>(+90) 555-555-5555</p>
                        </div>
                    </div>
                </div><!-- Col 3 end -->

            </div><!-- 1st row end -->

            <div class="gap-60"></div>

            <div class="gap-40"></div>

            <div class="row">
                <div class="col-md-12">
                    <h3 class="column-title">Bize ulaşın</h3>
                    <form id="contact-form" action="#" method="post" role="form">
                        <div class="error-container"></div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Ad Soyad</label>
                                    <input class="form-control form-control-name" name="name" id="adSoyad" type="text" required placeholder="Adınız... (A-Z/a-z)" minlength="3" pattern="[a-zA-Z\s]+">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control form-control-email" name="email" id="email" type="email" required placeholder="example@email.com">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Konu</label>
                                    <input class="form-control form-control-subject" name="subject" id="konu" placeholder="Konu" minlength="3" pattern="[a-zA-Z\s]+" required>

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Mesaj</label>
                            <textarea class="form-control form-control-message" name="message" id="mesaj" placeholder="Mesajınızı yazınız... (Maks. 500)" rows="10" required></textarea>
                        </div>
                        <div class="text-right"><br>
                            <button id="mesajGonder" class="btn btn-primary solid blank" onclick="return gonder()">Gönder</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section><!-- Main container end -->

    <?php include('footer.php'); ?>
    <?php include('js-files.php'); ?>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script>
        function gonder() {
            let adSoyad = document.getElementById("adSoyad").value;
            let email = document.getElementById("email").value;
            let konu = document.getElementById("konu").value;
            let mesaj = document.getElementById("mesaj").value;
            $.ajax({
                url: "./admin/crud-ajax.php?action=insert&section=iletisim",
                type: "POST",
                data: {
                    adSoyad: adSoyad,
                    email: email,
                    konu: konu,
                    mesaj: mesaj
                },
                success: function() {
                    location.reload();
                }
            }).then(() => {
                alert("Mesajınız başarıyla gönderildi.");
            });
        }
    </script>
</body>

</html>