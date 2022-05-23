<div class="rounded p-4 bg-secondary text-dark h-85 overflow-auto">

    <div class="bg-light rounded container row p-2 mx-auto overflow-auto d-flex h-100">

        <div id="hizmetlerimiz-tab" class="h-100 w-100">

            <div id="prelaoder" class="h-100 w-100 text-cemter container d-flex align-items-center display-3 justify-content-center">
                <h1 class="display-3">Yükleniyor ...</h1>
            </div>

        </div>

        <div id="hizmetEkle" class=" container h-100 w-100 d-none">

        </div>

        <div id="hizmetiDuzenle" class="container h-100 w-100 d-none">

        </div>

    </div>

</div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
<script>
    let user = "<?= $_SESSION["username"] ?>";
    let hizmetlerimiz_tab = document.querySelector("#hizmetlerimiz-tab");
    let hizmetler = [];
    let html = "";
    let hizmetEkle = document.querySelector("#hizmetEkle");
    let hizmetiDuzenle = document.querySelector("#hizmetiDuzenle");
    (() => {
        $.ajax({
            url: "crud-ajax.php?action=read&section=hizmetlerimiz",
            type: "GET",
            success: function(data) {
                hizmetler = JSON.parse(data);
                hizmetler.forEach(hizmet => {
                    html += `<div id="hizmet-item" class="col-12 p-2 border shadow rounded d-flex align-content-center row mx-auto">

                                <div title="Hizmet Id" class="col-lg-1 col-md-1 bg-info rounded p-2 text-center">
                                    ${hizmet.hizmet_id}
                                </div>
                                <div title="Hizmet Başlığı" class="col-lg-9 col-md-11 p-2 fa-indent text-center">
                                    ${hizmet.hizmet_adi}
                                </div>
                                <a title="Hizmet Bilgisi Düzenle" onclick="return editHizmet(id='${hizmet.hizmet_id}')" class="col-lg-1 col-md-6 btn-warning p-2 rounded text-center border">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a title="Hizmeti Sil" onclick="return hizmetiSil(id='${hizmet.hizmet_id}')" class="col-lg-1 btn-danger col-md-6 p-2 rounded text-center border">
                                    <i class="fa fa-trash-alt"></i>
                                </a>

                            </div>
                            <hr>`;
                });
                html += `<div title="Yeni Hizmet Ekle" onclick = "return yeniHizmetEkle()" class="row p-2 bg-light shadow border text-center m-1 rounded d-flex align-items-center justify-content-center">
                                <a class="btn-lg btn-success p-2 w-100"> <b>EKLE</b> <i class="fa fa-plus"></i></a>
                        </div>
                        <hr>`;
                hizmetlerimiz_tab.innerHTML = html;
            }
        });
    })();


    function editHizmet(id) {
        hizmetlerimiz_tab.classList.add("d-none");
        hizmetiDuzenle.classList.remove("d-none");
        let selected_hizmet = hizmetler.find(hizmet => hizmet.hizmet_id == id);
        html = `
            <form class="d-flex flex-column justify-content-between align-content-center h-90">
                <span class="text-center mt-1"> <b>Hizmet Düzenleme Arayüzü</b> <i class="fa fa-edit"></i> </span>
                <div class="input-group">
                    <label for="id" title="Hizmet ID'si" class="input-group-prepend input-group-text rounded-0 rounded-left">ID</label>
                    <input type="text" title="Bu alana düzenleme yapamazsınız." id="id" class="form-control input-group-append rounded-0 rounded-right" value="${selected_hizmet.hizmet_id}"; disabled="disabled">
                </div>
                <div class="input-group">
                    <label for="baslik" title="Hizmet Başlığı" class="input-group-prepend input-group-text rounded-0 rounded-left">Baslik</label>
                    <input type="text" title="Hizmet Başlığı" id="baslik" class="form-control input-group-append rounded-0 rounded-right" value="${selected_hizmet.hizmet_adi}">
                </div>
                <div class="input-group h-25">
                    <label for="icerik" title="Açıklama" class="input-group-prepend input-group-text rounded-0 rounded-left clearfix">İçerik</label>
                    <textarea id="icerik" title="Açıklama" class="form-control input-group-append h-100 rounded-0 rounded-right">${selected_hizmet.aciklama}</textarea>
                </div>
                <div class="d-flex flex-row justify-content-sm-center justify-content-lg-end clearfix">
                    <button onclick="return saveEditService(id='${id}')" type="button" title="Hizmet Veritabanına Kaydet" class="btn-lg btn-success mr-sm-0 mr-md-2 mr-lg-2">Kaydet</button>
                    <button onclick="return cancelSaving()" type="button" title="Ekleme İşlemini İptal Et" class="btn-lg btn-danger">İptal</button>
                </div>
            </form>`;
        hizmetiDuzenle.innerHTML = html;
    }

    function saveEditService(id) {
        let hizmet_adi = document.querySelector("#baslik").value;
        let aciklama = document.querySelector("#icerik").value;
        $.ajax({
            url: "crud-ajax.php?action=update&section=hizmetlerimiz",
            type: "POST",
            data: {
                hizmet_id: id,
                hizmet_adi: hizmet_adi,
                aciklama: aciklama
            },
            success: function(data) {
                alert("Hizmet Başarıyla Güncellendi");
            }
        }).then(() => {
            $.ajax({
                url: "logger.php?action=log",
                type: "POST",
                data: {
                    log_description: `${id}'li hizmet, ${user} tarafından güncellendi.`,
                    admin_name: `${user}`
                },
                success: function() {
                    alert("Log Kaydedildi");
                }
            }).then(() => {
                location.reload();
            });
        });
    }

    function hizmetiSil(id) {
        let answer = confirm(`${id} Numaralı Hizmeti Kalıcı Olarak Silmek İstediğinize Emin misiniz?`);
        if (answer) {
            $.ajax({
                url: "crud-ajax.php?action=delete&section=hizmetlerimiz",
                type: "POST",
                data: "hizmet_id=" + id,
                success: function() {
                    alert("Hizmet silindi!");
                }
            }).then(() => {
                let user = "<?= $_SESSION["username"] ?>";
                $.ajax({
                    url: "logger.php?action=log",
                    type: "POST",
                    data: {
                        log_description: `${user} tarafından, ${id} id'li hizmet, hizmetler tablosundan silindi!`,
                        admin_name: `${user}`
                    },
                    success: function() {
                        console.log("Log kaydı alındı!");
                    }
                }).then(() => {
                    location.reload();
                });
            });
        }
    }

    function yeniHizmetEkle() {
        hizmetlerimiz_tab.classList.add("d-none");
        hizmetEkle.classList.remove("d-none");
        html = `
            <form class="d-flex flex-column justify-content-between align-content-center h-90">
                <span class="text-center mt-1"> <b>Yeni Hizmet Ekleme Arayüzü</b> <i class="fa fa-plus"></i> </span>
                <div class="input-group">
                    <label for="id" title="Hizmet ID'si" class="input-group-prepend input-group-text rounded-0 rounded-left">ID</label>
                    <input type="text" title="Bu alana düzenleme yapamazsınız. Id değeri sistem tarafınfan otomatik olarak atanır." id="id" class="form-control input-group-append rounded-0 rounded-right" disabled="disabled">
                </div>
                <div class="input-group">
                    <label for="baslik" title="Hizmet Başlığı" class="input-group-prepend input-group-text rounded-0 rounded-left">Baslik</label>
                    <input type="text" title="Hizmet Başlığı" id="baslik" class="form-control input-group-append rounded-0 rounded-right">
                </div>
                <div class="input-group h-25">
                    <label for="icerik" title="Açıklama" class="input-group-prepend input-group-text rounded-0 rounded-left clearfix">İçerik</label>
                    <textarea id="icerik" title="Açıklama" class="form-control input-group-append h-100 rounded-0 rounded-right"></textarea>
                </div>
                <div class="d-flex flex-row justify-content-sm-center justify-content-lg-end clearfix">
                    <button onclick="return saveNewService()" type="button" title="Hizmeti Veritabanına Ekle" class="btn-lg btn-success mr-sm-0 mr-md-2 mr-lg-2">Kaydet</button>
                    <button onclick="return cancelSaving()" type="button" title="Ekleme İşlemini İptal Et" class="btn-lg btn-danger">İptal</button>
                </div>
            </form>`;
        hizmetEkle.innerHTML = html;
    }

    function saveNewService() {
        let baslik = document.querySelector("#baslik").value;
        let icerik = document.querySelector("#icerik").value;
        $.ajax({
            url: "crud-ajax.php?action=insert&section=hizmetlerimiz",
            type: "POST",
            data: {
                hizmet_adi: baslik,
                aciklama: icerik
            },
            success: function() {
                alert("Hizmet başarıyla eklendi!");
            }
        }).then(() => {
            $.ajax({
                url: "logger.php?action=log",
                type: "POST",
                data: {
                    log_description: `${user} tarafından, ${baslik} adlı hizmet, hizmetler tablosuna eklendi!`,
                    admin_name: `${user}`
                },
                success: function() {
                    console.log("Log kaydı alındı!");
                }
            }).then(() => {
                location.reload();
            });
        });
    }

    function cancelSaving() {
        let result = confirm("Yaptığınız değişikleri iptal etmek istiyor musunuz? Düzenlemeleriniz kaybolacaktır!");
        if (result == true) {
            console.log("Düzenleme işlemi iptal edildi.")
            location.reload();
        } else {
            console.log("Düzenlemeye devam ediliyor.");
        }
    }
</script>