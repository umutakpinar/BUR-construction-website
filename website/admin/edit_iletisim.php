<div class="rounded p-4 bg-secondary text-dark h-85 overflow-auto">

    <div class="bg-light rounded container row p-2 mx-auto overflow-auto d-flex h-100">

        <div id="iletisim-tab" class="h-100 w-100">

            <div id="prelaoder" class="h-100 w-100 text-cemter container d-flex align-items-center display-3 justify-content-center">
                <h1 class="display-3">Yükleniyor ...</h1>
            </div>

        </div>

        <div id="mesajDetay" class=" container h-100 w-100 d-none">

            <div id="prelaoder" class="h-100 w-100 text-cemter container d-flex align-items-center display-3 justify-content-center">
                <h1 class="display-3">Yükleniyor ...</h1>
            </div>

        </div>

    </div>

</div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
<script>
    let user = "<?= $_SESSION["username"] ?>";
    let iletisim_tab = document.querySelector("#iletisim-tab");
    let mesajlar = [];
    let html = "";
    let mesajDetay = document.querySelector("#mesajDetay");

    (() => {
        $.ajax({
            url: "crud-ajax.php?action=read&section=iletisim",
            type: "GET",
            success: function(data) {
                mesajlar = JSON.parse(data);
            }
        }).then(() => {
            mesajlar.forEach((mesaj) => {
                html +=
                    `<div id="mesaj-item" class="col-12 p-2 border shadow rounded d-flex align-content-center row mx-auto">

                        <div title="Mesaj Id" class="col-lg-1 col-md-1 bg-info rounded p-2 text-center">
                            ${mesaj.iletisim_id}
                        </div>
                        <div title="Gönderen - Konu " class="col-lg-9 col-md-11 p-2 fa-indent text-center">
                            ${mesaj.adSoyad} - ${mesaj.konu}
                        </div>
                        <a title="Mesaj Bilgisi Görüntüle" onclick="return goruntuleMesaj(id='${mesaj.iletisim_id}')" class="col-lg-1 col-md-6 btn-warning p-2 rounded text-center border">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a title="Mesajı Sil" onclick="return mesajiSil(id='${mesaj.iletisim_id}')" class="col-lg-1 btn-danger col-md-6 p-2 rounded text-center border">
                            <i class="fa fa-trash-alt"></i>
                        </a>

                    </div>
                    <hr>`;
            });
            iletisim_tab.innerHTML = html;
        });
    })();

    function goruntuleMesaj(id) {
        iletisim_tab.classList.add("d-none");
        mesajDetay.classList.remove("d-none");
        let selected_mesaj = mesajlar.find(mesaj => mesaj.iletisim_id == id);
        html =
            `
            <form class="d-flex flex-column justify-content-between align-content-center h-90">
                <span class="text-center mt-1"> <b>Mesaj Detayı</b> <i class="fa fa-eye"></i> </span>
                <div class="input-group">
                    <label for="id" title="Mesaj ID'si" class="input-group-prepend input-group-text rounded-0 rounded-left">ID</label>
                    <input type="text" title="Mesaj ID" id="id" class="form-control input-group-append rounded-0 rounded-right" value="${selected_mesaj.iletisim_id}" readonly>
                </div>
                <div class="input-group">
                    <label for="gonderen" title="Gönderen" class="input-group-prepend input-group-text rounded-0 rounded-left">Gönderen</label>
                    <input type="text" title="Gönderen İsmi" id="gonderen" class="form-control input-group-append rounded-0 rounded-right" value="${selected_mesaj.adSoyad} " readonly>
                </div>
                <div class="input-group">
                    <label for="mail" title="Gönderen Mail Adresi" class="input-group-prepend input-group-text rounded-0 rounded-left">Gönderen</label>
                    <input type="text" title="Mail " id="mail" class="form-control input-group-append rounded-0 rounded-right" value="${selected_mesaj.email}" readonly>
                </div>
                <div class="input-group">
                    <label for="konu" title="Mesaj Konusu" class="input-group-prepend input-group-text rounded-0 rounded-left">Konu</label>
                    <input type="text" title="Konu" id="konu" class="form-control input-group-append rounded-0 rounded-right" value="${selected_mesaj.konu} " readonly>
                </div>
                <div class="input-group h-25">
                    <label for="icerik" title="Mesaj" class="input-group-prepend input-group-text rounded-0 rounded-left clearfix">İçerik</label>
                    <textarea id="icerik" title="Mesaj İçeriği" class="form-control input-group-append h-100 rounded-0 rounded-right" readonly>${selected_mesaj.mesaj}</textarea>
                </div>
                <div class="d-flex flex-row justify-content-sm-center justify-content-lg-end clearfix">
                    <button type="button" onclick="return mesajiSil(id='${selected_mesaj.iletisim_id}')" class="btn btn-danger rounded mr-2"><i class="fa fa-trash-alt"></i></button>
                    <button onclick="return geriDon()" type="button" title="Mesajlar ekranına geri dön" class="btn-lg btn-warning"><i class="fa fa-arrow-left"></i></button>
                </div>
            </form>
        `;
        mesajDetay.innerHTML = html;
    }

    function geriDon() {
        location.reload();
    }

    function mesajiSil(id) {
        let answer = confirm(`${id} Numaralı Mesajı Kalıcı Olarak Silmek İstediğinize Emin misiniz?`);
        if (answer) {
            $.ajax({
                url: "crud-ajax.php?action=delete&section=iletisim",
                type: "POST",
                data: "iletisim_id=" + id,
                success: function() {
                    alert("Mesaj silindi!");
                }
            }).then(() => {
                let user = "<?= $_SESSION["username"] ?>";
                $.ajax({
                    url: "logger.php?action=log",
                    type: "POST",
                    data: {
                        log_description: `${user} tarafından, ${id} id'li mesaj, iletisim tablosundan silindi!`,
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
</script>