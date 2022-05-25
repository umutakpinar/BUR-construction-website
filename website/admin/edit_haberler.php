<div class="rounded p-4 bg-secondary text-dark h-85 overflow-auto">

    <div class="bg-light rounded container row p-2 mx-auto overflow-auto d-flex h-100">

        <div id="haberler-tab" class="h-100 w-100">

            <div id="prelaoder" class="h-100 w-100 text-cemter container d-flex align-items-center display-3 justify-content-center">
                <h1 class="display-3">Yükleniyor ...</h1>
            </div>

        </div>

        <div id="haberEkle" class=" container h-100 w-100 d-none">

        </div>

        <div id="haberiDuzenle" class="container h-100 w-100 d-none">

        </div>

    </div>

</div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
<script>
    let user = "<?= $_SESSION["username"] ?>";
    let haberler_tab = document.querySelector("#haberler-tab");
    let haberler = [];
    let html = "";
    let haberEkle = document.querySelector("#haberEkle");
    let haberiDuzenle = document.querySelector("#haberiDuzenle");

    (() => {
        $.ajax({
            url: "crud-ajax.php?action=read&section=haberler",
            type: "GET",
            success: function(data) {
                haberler = JSON.parse(data);
            }
        }).then(() => {
            haberler.forEach((haber) => {
                html +=
                    `<div id="haber-item" class="col-12 p-2 border shadow rounded d-flex align-content-center row mx-auto">

                        <div title="Haber Id" class="col-lg-1 col-md-1 bg-info rounded p-2 text-center">
                            ${haber.haber_id}
                        </div>
                        <div title="Haber Başlığı" class="col-lg-9 col-md-11 p-2 fa-indent text-center">
                            ${haber.baslik}
                        </div>
                        <a title="Haber Bilgisi Düzenle" onclick="return editHaber(id='${haber.haber_id}')" class="col-lg-1 col-md-6 btn-warning p-2 rounded text-center border">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a title="Haberi Sil" onclick="return haberiSil(id='${haber.haber_id}')" class="col-lg-1 btn-danger col-md-6 p-2 rounded text-center border">
                            <i class="fa fa-trash-alt"></i>
                        </a>

                    </div>
                    <hr>`;
            })
            html +=
                `<div title="Yeni Haber Ekle" onclick = "return yeniHaberEkle()" class="row p-2 bg-light shadow border text-center m-1 rounded d-flex align-items-center justify-content-center">
                    <a class="btn-lg btn-success p-2 w-100"> <b>EKLE</b> <i class="fa fa-plus"></i></a>
                </div>
                <hr>`;
            haberler_tab.innerHTML = html;
        });
    })();

    function editHaber(id) {
        haberler_tab.classList.add("d-none");
        haberiDuzenle.classList.remove("d-none");
        let selected_haber = haberler.find(haber => haber.haber_id == id);
        html = `
            <form class="d-flex flex-column justify-content-between align-content-center h-90">
                <span class="text-center mt-1"> <b>Haber Düzenleme Arayüzü</b> <i class="fa fa-edit"></i> </span>
                <div class="input-group">
                    <label for="id" title="Haber ID'si" class="input-group-prepend input-group-text rounded-0 rounded-left">ID</label>
                    <input type="text" title="Bu alana düzenleme yapamazsınız." id="id" class="form-control input-group-append rounded-0 rounded-right" value="${selected_haber.haber_id}"; disabled="disabled">
                </div>
                <div class="input-group">
                    <label for="baslik" title="Haber Başlığı" class="input-group-prepend input-group-text rounded-0 rounded-left">Baslik</label>
                    <input type="text" title="Haber Başlığı" id="baslik" class="form-control input-group-append rounded-0 rounded-right" value="${selected_haber.baslik}">
                </div>
                <div class="input-group">
                    <label for="tags" title="Haber Tagleri" class="input-group-prepend input-group-text rounded-0 rounded-left">Tags</label>
                    <input type="text" title="Haber Tagleri arasında virgül kullanınız!" id="tags" class="form-control input-group-append rounded-0 rounded-right" value="${selected_haber.tags}">
                </div>
                <div class="input-group h-25">
                    <label for="icerik" title="İçerik" class="input-group-prepend input-group-text rounded-0 rounded-left clearfix">İçerik</label>
                    <textarea id="icerik" title="İçerik" class="form-control input-group-append h-100 rounded-0 rounded-right">${selected_haber.icerik}</textarea>
                </div>
                <div class="d-flex flex-row justify-content-sm-center justify-content-lg-end clearfix">
                    <button onclick="return saveEditHaber(id='${id}')" type="button" title="Haberi Veritabanına Kaydet" class="btn-lg btn-success mr-sm-0 mr-md-2 mr-lg-2">Kaydet</button>
                    <button onclick="return cancelSaving()" type="button" title="Ekleme İşlemini İptal Et" class="btn-lg btn-danger">İptal</button>
                </div>
            </form>`;
        haberiDuzenle.innerHTML = html;
    }

    function saveEditHaber(id) {
        let haber_adi = document.querySelector("#baslik").value;
        let haber_icerik = document.querySelector("#icerik").value;
        let haber_tags = document.querySelector("#tags").value;
        console.log(id, haber_adi, haber_icerik, haber_tags);
        $.ajax({
            url: "crud-ajax.php?action=update&section=haberler",
            type: "POST",
            data: {
                haber_id: id,
                baslik: haber_adi,
                icerik: haber_icerik, //bu kısımda hata olaiblir adlandırmalara tekrar bak
                tags: haber_tags
            },
            success: function(data) {
                alert("Haber Başarıyla Güncellendi");
            }
        }).then(() => {
            $.ajax({
                url: "logger.php?action=log",
                type: "POST",
                data: {
                    log_description: `${id}'li haber, ${user} tarafından güncellendi.`,
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

    function cancelSaving() {
        let result = confirm("Yaptığınız değişikleri iptal etmek istiyor musunuz? Düzenlemeleriniz kaybolacaktır!");
        if (result == true) {
            console.log("Düzenleme işlemi iptal edildi.")
            location.reload();
        } else {
            console.log("Düzenlemeye devam ediliyor.");
        }
    }

    function haberiSil(id) {
        let answer = confirm(`${id} Numaralı Haberi Kalıcı Olarak Silmek İstediğinize Emin misiniz?`);
        if (answer) {
            $.ajax({
                url: "crud-ajax.php?action=delete&section=haberler",
                type: "POST",
                data: "haber_id=" + id,
                success: function() {
                    alert("Haber silindi!");
                }
            }).then(() => {
                let user = "<?= $_SESSION["username"] ?>";
                $.ajax({
                    url: "logger.php?action=log",
                    type: "POST",
                    data: {
                        log_description: `${user} tarafından, ${id} id'li haber, haberler tablosundan silindi!`,
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

    function yeniHaberEkle() {
        haberler_tab.classList.add("d-none");
        haberEkle.classList.remove("d-none");
        html = `
            <form class="d-flex flex-column justify-content-between align-content-center h-90">
                <span class="text-center mt-1"> <b>Yeni Haber Ekleme Arayüzü</b> <i class="fa fa-plus"></i> </span>
                <div class="input-group">
                    <label for="id" title="Haber ID'si" class="input-group-prepend input-group-text rounded-0 rounded-left">ID</label>
                    <input type="text" title="Bu alana düzenleme yapamazsınız. Id değeri sistem tarafınfan otomatik olarak atanır." id="id" class="form-control input-group-append rounded-0 rounded-right" disabled="disabled">
                </div>
                <div class="input-group">
                    <label for="baslik" title="Haber Başlığı" class="input-group-prepend input-group-text rounded-0 rounded-left">Baslik</label>
                    <input type="text" title="Haber Başlığı" id="baslik" class="form-control input-group-append rounded-0 rounded-right">
                </div>
                <div class="input-group">
                    <label for="tags" title="Haber Tagleri" class="input-group-prepend input-group-text rounded-0 rounded-left">Tags</label>
                    <input type="text" title="Haber Tagleri arasında virgül kullanınız!" id="tags" class="form-control input-group-append rounded-0 rounded-right">
                </div>
                <div class="input-group h-25">
                    <label for="icerik" title="Açıklama" class="input-group-prepend input-group-text rounded-0 rounded-left clearfix">İçerik</label>
                    <textarea id="icerik" title="Açıklama" class="form-control input-group-append h-100 rounded-0 rounded-right"></textarea>
                </div>
                <div class="d-flex flex-row justify-content-sm-center justify-content-lg-end clearfix">
                    <button onclick="return saveNewHaber()" type="button" title="Haberi Veritabanına Ekle" class="btn-lg btn-success mr-sm-0 mr-md-2 mr-lg-2">Kaydet</button>
                    <button onclick="return cancelSaving()" type="button" title="Ekleme İşlemini İptal Et" class="btn-lg btn-danger">İptal</button>
                </div>
            </form>`;
        haberEkle.innerHTML = html;
    }

    function saveNewHaber() {
        let haber_baslik = document.querySelector("#baslik").value;
        let haber_icerik = document.querySelector("#icerik").value;
        let haber_tags = document.querySelector("#tags").value;
        $.ajax({
            url: "crud-ajax.php?action=insert&section=haberler",
            type: "POST",
            data: {
                baslik: haber_baslik,
                icerik: haber_icerik,
                tags: haber_tags
            },
            success: function() {
                alert("Haber başarıyla eklendi!");
            }
        }).then(() => {
            $.ajax({
                url: "logger.php?action=log",
                type: "POST",
                data: {
                    log_description: `${user} tarafından, ${baslik} adlı haber, haberler tablosuna eklendi!`,
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
</script>