<div class="container w-100 h-100 overflow-auto">
    <section id="main-container" class="main-container">
        <div class="container">
            <div class="row" class="w-100 overflow-auto clearfix">

                <div class="col-xl-3 col-lg-4">
                    <div class="sidebar sidebar-left">
                        <div class="widget">
                            <h3 class="widget-title text-white">Hakkımızda</h3>
                            <ul class="nav service-menu text-monospace">
                                <li><a onclick="return myFunc()" id="tarihcemiz" class="option rounded" href="#tarihcemiz">Tarihçemiz</a></li>
                                <li><a onclick="return myFunc()" id="vizyonumuz" class="option rounded" href="#vizyonumuz">Vizyonumuz</a></li>
                                <li><a onclick="return myFunc()" id="misyonumuz" class="option rounded" href="#misyonumuz">Misyonumuz</a></li>
                                <li><a onclick="return myFunc()" id="degerlerimiz" class="option rounded" href="#degerlerimiz">Değerlerimiz</a></li>
                                <li><a onclick="return myFunc()" id="genel-Mudurun-Mesaji" class="option rounded" href="#genel-Mudurun-Mesaji">Genel Müdürün Mesajı</a></li>
                                <li><a onclick="return myFunc()" id="baskanin-Mesaji" class="option rounded" href="#baskanin-Mesaji">Başkanın Mesajı</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8 col-lg-8">
                    <div class="content-inner-page">
                        <div class="gap-40"></div>

                        <h2 id="baslik" class="column-title mrt-0 text-white">Hakkımızda bölümü düzenleme aracı</h2>

                        <form class="row w-100 h-100">
                            <div class="col-md-12 w-100 h-100">
                                <div id="alertMessage" class="alert alert-danger p-3">
                                    Hakkımızda bölümünde düzenlemek istediğiniz içeriği sol taraftan seçebilirsiniz.
                                </div>

                                <div id="editSection" class=" w-100 alert alert-warning mb-5 clearfix" style="display: none; min-height: 50%;">
                                    <form action="" method="post">
                                        <textarea id="info" class="form-control text-dark bg-light rounded p-3 h-50">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam, quos, quisquam.
                                        </textarea>
                                        <button type="submit" class="float-right btn btn-success my-2">Kaydet</button>
                                    </form>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
<script>
    let alertMessage = document.getElementById('alertMessage');
    let editSection = document.getElementById('editSection');
    window.addEventListener("hashchange", function(e) {
        alertMessage.style.display = "none";
        editSection.style.display = "block";
        let url = window.location.href.split("#")[1]; //burada url çubuğunda yazan adresi ve #'tan sonrasını kesip o kısmı aldım
        let baslik = document.getElementById("baslik"); //burada baslik id'si ile baslik bölümünü çağırdım
        baslik.innerText = url.replaceAll("-", " ") + " bölümünde düzenleme aracı"; //urlden aldığım #tan sonraki ksııdmaki -'leri kaldırıp yerine boşluk ekledim başlığa yazdım
    });

    var option = document.querySelectorAll(".option");
    option.forEach(function(item) {
        item.addEventListener("click", function(e) {
            option.forEach(function(item) {
                item.classList.remove("bg-warning");
            });
            e.target.classList.add("bg-warning");
        });
    });

    // option.forEach((item) => {
    //     item.addEventListener("click", (e) => {
    //         let currentItem = e.target.id;
    //         $.get("edit_db_ajax.php?" + currentItem, function(data) {
    //             let response = JSON.parse(data);
    //             console.log(data);
    //         });
    //         e.preventDefault(); 
    //     });
    // });

    function myFunc() {
        console.log("test");
    }
</script>