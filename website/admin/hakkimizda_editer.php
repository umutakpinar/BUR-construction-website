<?php

include("../settings/Connector.php");
session_start();
include "../settings/helper_methods.php";
if (session("login") == false) {
    header("Location: login.php");
}

?>

<html lang="en">

<head>
    <!-- Mobile Specific Metas
================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Construction Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <!-- Favicon
================================================== -->
    <link rel="icon" type="image/png" href="images/favicon.png">

    <!-- CSS
================================================== -->
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
</head>

<body>
    <div class="container">
        <section id="main-container" class="main-container">
            <div class="container">
                <div class="row">

                    <div class="col-xl-3 col-lg-4">
                        <div class="sidebar sidebar-left">
                            <div class="widget">
                                <h3 class="widget-title">Hakkımızda</h3>
                                <ul class="nav service-menu">
                                    <li class="active"><a href="#">Tarihçemiz</a></li>
                                    <li><a href="vizyonumuz.php">Vizyonumuz</a></li>
                                    <li><a href="misyonumuz.php">Misyonumuz</a></li>
                                    <li><a href="degerlerimiz.php">Değerlerimiz</a></li>
                                    <li><a href="genel-mudurun-mesaji.php">Genel Müdürün Mesajı</a></li>
                                    <li><a href="baskanin-mesaji.php">Başkanın Mesajı</a></li>
                                </ul>
                            </div><!-- Widget end -->



                        </div><!-- Sidebar end -->
                    </div><!-- Sidebar Col end -->

                    <div class="col-xl-8 col-lg-8">
                        <div class="content-inner-page">

                            <div class="gap-40"></div>

                            <h2 class="column-title mrt-0">Tarihçemiz</h2>

                            <div class="row">
                                <div class="col-md-12">
                                    <p style="text-indent: 3vh;">B.U.R. Şirketler Topluluğu’nun ilk ve lider şirketi olan B.U.R. İnşaat ve Ticaret A.Ş., 1966 yılında uluslararası genel müteahhitlik firması olarak kurulmuş ve faaliyetinin başlangıcından bu yana büyük çaplı ve yüksek teknoloji ürünü birçok uluslararası proje ile adını duyurmuştur. 1980-1990 döneminde B.U.R. İnşaat ve Ticaret A.Ş., uluslararası platformlardaki faaliyetlerini, gerçekleştirdiği Mühendislik-Tedarik-İnşaat esaslı “Anahtar Teslim” projeler ile petrol üreticisi ülkelere, özellikle Suudi Arabistan Krallığı’na kaydırmış ve ulaşılan başarı seviyesi ile Uluslararası Türk Müteahhitler arasında üstün bir pozisyon kazanmıştır. 90’lı yıllarda ise, ulaşılan pozisyonun da bir sonucu olarak, B.U.R. İnşaat ve Ticaret A.Ş. uluslararası faaliyetlerini, alt şirketleri aracılığıyla Rusya Federasyonuna ve Bağımsız Devletler Topluluğu üyesi ülkelere yöneltmiştir. 1991 yılında, Sovyetler Birliği’nin dağılmasından yalnızca bir yıl sonra, Türkmenistan’da ilk taahhüt projesi yüklenilmiş ve bölgede faaliyete geçen ilk batılı şirketler arasında yer alınmıştır. 2000'li yıllara gelindiğinde ise Orta Doğu ve Kuzey Afrika ülkeleri ilgi sahasının odağı hâline gelmiş, bu dönem süresince yurt dışı çalışmalarına paralel olarak yurt içi çalışmalarına da tüm hızıyla devam etmiş, Türkiye'nin önde gelen üstyapı ve altyapı yatırımları çerçevesinde pek çok proje referanslar arasına katılmıştır. 2019 yılı itibariyle, B.U.R. İnşaat ve Ticaret A.Ş.’nin faaliyet sahası, üstün teknolojik ve idari altyapısı, inşaat sektöründeki lider pozisyonu, 10.000’i aşkın teknik ve idari personeli, güçlü makina-ekipman parkı ve finansman temin kabiliyetlerine paralel olarak üç kıtada 15 ülkeye yayılmış bulunmaktadır. 1966 yılında Ankara merkezli olarak kurulmuş ve 2015 yılında İstanbul’da bulunan yeni genel merkezine taşınmış olan B.U.R. İnşaat ve Ticaret A.Ş., 35'e yakın bağlı şirket ve ortaklıktan oluşan B.U.R. Grubu’nun çekirdek şirketi olup, 10 Milyar ABD Doları mertebesine ulaşan referans proje portföyü ve 13 Milyar ABD Dolarını aşan devam eden proje stoku ile sektörünün hemen her dalında önemli projelere imza atmaya devam etmektedir. B.U.R. İnşaat, ABD’li “Engineering News Record” tarafından yayınlanan Dünyanın En Büyük Küresel Müteahhitleri ve Dünyanın En Büyük Uluslararası Müteahhitleri listelerinin her ikisinde de yer almaktadır. B.U.R. İnşaat ve Ticaret A.Ş, sahip olduğu geniş uzmanlık alanı ile, dünya genelindeki büyük çaplı altyapı ve üstyapı projelerinin başarı ile sonuçlandırılmasında önemli paya sahiptir. B.U.R. İnşaat’ın Merkez ve Projelerindeki faaliyetlerinin, ISO 9001 Kalite Yönetim Sistemi, ISO 14001 Çevre Yönetim Sistemi ve ISO 45001 İş Sağlığı ve Güvenliği Yönetim Sistemi şartlarına uygunluğu UKAS ve TÜRKAK akreditasyonuna sahip uluslararası bağımsız belgelendirme firması tarafından periyodik olarak denetlenerek belgelendirilmektedir. B.U.R. İnşaat ve Ticaret A.Ş., bu katalogda kısaca değinilen çalışmaları ve başarılarla dolu geçmişinin haklı gururunu, kuruluşunun ilk gününden itibaren kaybetmediği genç ve dinamik ruh ile emin adımlarla geleceğe taşımaktadır.</p>
                                </div><!-- col end -->
                            </div><!-- 1st row end-->
                        </div><!-- Content inner end -->
                    </div><!-- Content Col end -->
                </div><!-- Main row end -->
            </div><!-- Conatiner end -->
        </section><!-- Main container end -->

    </div>
</body>

</html>