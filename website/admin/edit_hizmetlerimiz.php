<div class="rounded p-4 bg-secondary text-dark h-85 overflow-auto">

    <div class="bg-light rounded container row p-2 mx-auto overflow-auto d-flex h-100">

        <div id="hizmetlerimiz-tab" class="h-100 w-100">

            <div id="prelaoder" class="h-100 w-100 text-cemter container d-flex align-items-center display-3 justify-content-center">
                <h1 class="display-3">Yükleniyor ...</h1>
            </div>

        </div>

    </div>

</div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
<script>
    let hizmetlerimiz_tab = document.querySelector("#hizmetlerimiz-tab");
    let hizmetler = [];
    let html = "";
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
                                <a title="Hizmet Bilgisi Düzenle" onclick="return hizmetiDuzenle(id='${hizmet.hizmet_id}')" class="col-lg-1 col-md-6 btn-warning p-2 rounded text-center border">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a title="Hizmeti Sil" onclick="return hizmetiSil(id='${hizmet.hizmet_id}')" class="col-lg-1 btn-danger col-md-6 p-2 rounded text-center border">
                                    <i class="fa fa-trash-alt"></i>
                                </a>

                            </div>
                            <hr>`;
                });
                html += `<div title="Yeni Hizmet Ekle" onclick = "return hizmetEkle()" class="row p-2 bg-light shadow border text-center m-1 rounded d-flex align-items-center justify-content-center">
                                <a class="btn-lg btn-success p-2 w-100"> <b>EKLE</b> <i class="fa fa-plus"></i></a>
                        </div>
                        <hr>`;
                hizmetlerimiz_tab.innerHTML = html;
            }
        });
    })();


    function hizmetiDuzenle(id) {
        hizmetlerimiz_tab.classList.add("d-none");
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

    function hizmetEkle() {
        hizmetlerimiz_tab.classList.add("d-none");
    }
</script>