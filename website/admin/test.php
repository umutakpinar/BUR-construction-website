<html lang="en">

<head>
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
    <div class="p-5">

        <!-- Bu kısmın altı alınacak edit-project classına d-none EKLENECEK! -->
        <div title="Proje Düzenleme Arayüzü" id="edit-project" class="bg-light border rounded py-2 px-4 text-dark d-none overflow-auto">


            <form class="d-flex flex-column justify-content-between align-content-center h-50">
                <span class="text-center mt-1"> <b>Proje Düzenleme Arayüzü</b> <i class="fa fa-edit"></i> </span>
                <div class="input-group">
                    <label for="id" title="Proje ID'si" class="input-group-prepend input-group-text rounded-0 rounded-left">ID</label>
                    <input type="text" title="Proje ID'si" id="id" class="form-control input-group-append rounded-0 rounded-right" disabled="disabled" value="">
                </div>
                <div class="input-group">
                    <label for="baslik" title="Proje Başlığı" class="input-group-prepend input-group-text rounded-0 rounded-left">Baslik</label>
                    <input type="text" title="Proje Başlığı" id="baslik" class="form-control input-group-append rounded-0 rounded-right" value="">
                </div>

                <div class="input-group">
                    <label for="info" title="Proje Bilgisi" class="input-group-prepend input-group-text rounded-0 rounded-left">Info</label>
                    <input id="info" title="Proje Bilgisi" class="form-control input-group-append rounded-0 rounded-right" value="">
                </div>
                <div class="input-group h-25">
                    <label for="icerik" title="Açıklama" class="input-group-prepend input-group-text rounded-0 rounded-left clearfix">İçerik</label>
                    <textarea id="icerik" title="Açıklama" class="form-control input-group-append h-100 rounded-0 rounded-right" value=""></textarea>
                </div>
                <div class="d-flex flex-row justify-content-sm-center justify-content-lg-end clearfix">
                    <button onclick="return saveProject(/*Burada id yollla tablo zaten hazırda var tabelname adı altında public değişken */)" type="button" title="Projeyi Güncelle" class="btn btn-success mr-sm-0 mr-md-2 mr-lg-2">Kaydet</button>
                    <button onclick="return cancelProject()" type="button" title="Güncelleme İşlemini İptal Et" class="btn btn-danger">İptal</button>
                </div>
            </form>

        </div>
        <!-- Bu kısmın üstü alınacak -->

    </div>

</body>

</html>