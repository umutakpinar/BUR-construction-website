<div class="container text-dark ">
    <div class="container shadow-lg text-white">
        <div class="row d-flex justify-content-sm-between">

            <a href="#ger_projeler" id="ger_projelerimiz" class="project-tab col-md-6 col-lg-6 text-light rounded-top bg-secondary border-bottom-0 p-3 text-center">
                Gerçekleştirilmiş Projeler
            </a>
            <a href="#gel_projeler" id="gel_projelerimiz" class="project-tab col-md-5 col-lg-5 text-jight rounded-top bg-secondary border-bottom-0 p-3 text-center">
                Gelecek Projeler
            </a>

        </div>
        <div id="list-selected-tab" class="row h-67 mb-5">
            <div class="rounded-bottom bg-secondary border-top-0 w-100 h-100 p-3">

                <div id="alert" class="alert alert-danger p-3">
                    Lütfen düzenlemek istediğiniz proje sekmesini seçiniz.
                </div>


                <div id="show-projects" class="container bg-light border rounded py-2 px-4 d-none h-100 text-dark overflow-auto">

                </div>

            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
<script>
    let projeler = document.querySelectorAll(".project-tab");
    let alert = document.querySelector("#alert");
    let list_selected_tab = document.querySelector("#list-selected-tab");
    let show_projects = document.querySelector("#show-projects");
    var tableName;
    projeler.forEach(function(item) {
        item.addEventListener("click", function(e) {
            let html = "";
            tableName = e.target.id;

            function getAndShowProjects() {
                $.get("crud-ajax.php?action=read&section=" + e.target.id, function(data, status) {
                    console.log("status: " + status);
                    let arrData = JSON.parse(data);
                    arrData.forEach(function(item) {
                        html +=
                            `<div class="project-item border rounded d-flex row align-items-center justify-content-between p-2 shadow">

                            <div title="Proje id" class="col-xs-2 col-md-1 rounded bg-info p-2 text-center">
                                ${item.project_id}
                            </div>
                            <div title="Proje İsmi" class="col-xs-6 col-md-9 p-2">
                                ${item.baslik}
                            </div>
                            <a title="Projeyi Düzenle" href="buraya-edit-sayfası-linki.php?edit=${e.target.id}&item_id=${item.project_id}" class="col-xs-2 col-md-1 border-right btn-lg m-0 btn-warning text-center">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a title="Projeyi Sil" onclick="return deleteProject(id=${item.project_id})" class="col-xs-2 col-md-1 btn-lg btn-danger m-0 text-center">
                                <i class="fas fa-trash-alt"></i>
                            </a>

                        </div>

                        <hr>`;
                    });
                    html +=
                        `<div class="project-item border rounded d-flex row align-items-center justify-content-between p-2 shadow">

                            <a title="Bu bölüme yeni bir proje ekle" href="buraya-proje-ekleme-sayfası-linki.php?create=${e.target.id}" class="col-12 border-right btn-lg m-0 btn-success text-center">
                                <b>EKLE</b>  <i class="fas fa-plus"></i>
                            </a>

                        </div>`;
                    show_projects.innerHTML = html;
                });
            }


            //seçilen sekme arkaplnını değiştir ve alerti kaldır
            projeler.forEach(function(it) {
                it.classList.add("bg-dark");
                it.classList.remove("bg-warning");
            });

            e.target.classList.remove("bg-dark");
            e.target.classList.add("bg-warning");

            alert.style.display = "none";

            show_projects.classList.remove("d-none");
            show_projects.innerHTML = "";
            //--------------------------------

            //seçilen sekmeye göre list-selected-tab öğesinin içeriğini değiştir
            if (e.target.id == "ger_projelerimiz") {
                //console.clear();
                console.log("Gerçekleştirilmiş Projeleri Düzenleme Seçildi");
                getAndShowProjects();
            } else if (e.target.id == "gel_projelerimiz") {
                //console.clear();
                console.log("Gelecek Projeleri Düzenleme Seçildi");
                getAndShowProjects();
            }

            //--------------------------------
        });
    });


    function deleteProject(id) {
        let projectId = id;
        let islem = confirm(`${projectId} numaralı projeyi silmek istediğinize emin misiniz? Bu işlem geri alınamaz!`);
        if (islem == true) {
            $.ajax({
                url: "crud-ajax.php?action=delete&id=" + projectId + "&section=" + tableName,
                type: "POST",
                data: "project_id=" + projectId,
                success: function() {
                    location.reload();
                    console.log(`${projectId} numaralı proje başarıyla veritabanından silindi!`);
                }
            });
        } else {
            console.log("İşlem iptal edildi .");
        }

    }
</script>