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

                <div title="Proje Düzenleme Arayüzü" id="edit-project" class="bg-light border rounded py-2 px-4 text-dark d-none overflow-auto">



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
    let edit_project = document.querySelector("#edit-project");
    var tableName;
    projeler.forEach(function(item) {
        item.addEventListener("click", function(e) {
            let html = "";
            tableName = e.target.id;
            edit_project.classList.add("d-none");

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
                            <a title="Projeyi Düzenle" onclick="return editProject(id=${item.project_id})"  class="col-xs-2 col-md-1 border-right btn-lg m-0 btn-warning text-center">
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

                            <a title="Bu bölüme yeni bir proje ekle" onclick="return addProject()" class="col-12 border-right btn-lg m-0 btn-success text-center">
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
                    let user = "<?= $_SESSION["username"] ?>";

                    $.ajax({ //log kaydı alıyoruz
                        url: "logger.php?action=log",
                        type: "POST",
                        data: {
                            log_description: `${user} tarafından, ${projectId} id'li proje, ${tableName} tablosundan silindi!`,
                            admin_name: `${user}`
                        },
                        success: function() {
                            console.log("Log kaydı alındı!");
                        }
                    });
                    console.log(`${projectId} numaralı proje başarıyla veritabanından silindi!`);
                    location.reload();
                }
            });
        } else {
            console.log("İşlem iptal edildi .");
        }

    }


    async function editProject(id) {

        projeler.forEach(function(item) { //bunu eklemek zorundaydım ki aşağıdaki iptal butonunun bir anlamı olsun
            item.classList.add("inactiveLink");
        });

        show_projects.classList.add("d-none"); //önceki sayfanınn görünrülüğünü kaldırdım
        edit_project.classList.remove("d-none"); //düzenleme sayfamın görünürlüğünü açtım ki üzerinde gözükmesin

        let html = "";
        let editing_project;

        $.ajax({ //burada asenkron bir işlem olduğu için bu itemler dbden çekilene kadar beklesin diye bu işlemler bitttikten sonra then kullandım ki kod akıp gitmesin beklesin burası tamamlanınca devamını gerçekleştirsin
            url: "crud-ajax.php?action=read&section=" + tableName,
            type: "GET",
            success: function(data) {
                let myArr = JSON.parse(data);
                editing_project = myArr.find(item => item.project_id == id);
            }
        }).then(() => {
            html +=
                `
                    <form class="d-flex flex-column justify-content-between align-content-center h-90">
                        <span class="text-center mt-1"> <b>Proje Düzenleme Arayüzü</b> <i class="fa fa-edit"></i> </span>
                        <div class="input-group">
                            <label for="id" title="Proje ID'si" class="input-group-prepend input-group-text rounded-0 rounded-left">ID</label>
                            <input type="text" title="Proje ID'si" id="id" class="form-control input-group-append rounded-0 rounded-right" disabled="disabled" value="${editing_project.project_id}">
                        </div>
                        <div class="input-group">
                            <label for="baslik" title="Proje Başlığı" class="input-group-prepend input-group-text rounded-0 rounded-left">Baslik</label>
                            <input type="text" title="Proje Başlığı" id="baslik" class="form-control input-group-append rounded-0 rounded-right" value="${editing_project.baslik}">
                        </div>

                        <div class="input-group">
                            <label for="info" title="Proje Bilgisi" class="input-group-prepend input-group-text rounded-0 rounded-left">Info</label>
                            <input id="info" title="Proje Bilgisi" class="form-control input-group-append rounded-0 rounded-right" value="${editing_project.info}">
                        </div>
                        <div class="input-group h-25">
                            <label for="icerik" title="Açıklama" class="input-group-prepend input-group-text rounded-0 rounded-left clearfix">İçerik</label>
                            <textarea id="icerik" title="Açıklama" class="form-control input-group-append h-100 rounded-0 rounded-right">${editing_project.icerik}</textarea>
                        </div>
                        <div class="d-flex flex-row justify-content-sm-center justify-content-lg-end clearfix">
                            <button onclick="return saveProject(id='${id}')" type="button" title="Projeyi Güncelle" class="btn btn-success mr-sm-0 mr-md-2 mr-lg-2">Kaydet</button>
                            <button onclick="return cancelProject()" type="button" title="Güncelleme İşlemini İptal Et" class="btn btn-danger">İptal</button>
                        </div>
                    </form>`;

            edit_project.innerHTML = html;
        });
    }

    function cancelProject() {
        let result = confirm("Yaptığınız değişikleri iptal etmek istiyor musunuz? Düzenlemeleriniz kaybolacaktır!");
        if (result == true) {
            console.log("Düzenleme işlemi iptal edildi.")
            location.reload();
        } else {
            console.log("Düzenlemeye devam ediliyor.");
        }
    }

    function saveProject(id) {
        let project_id = id;
        let baslik = document.getElementById("baslik").value;
        let info = document.getElementById("info").value;
        let icerik = document.getElementById("icerik").value;

        $.ajax({
            url: "crud-ajax.php?action=update&section=" + tableName,
            type: "POST",
            data: {
                project_id: project_id,
                baslik: baslik,
                info: info,
                icerik: icerik
            },
            success: function() {

                $.ajax({ //log kaydı 
                    url: "logger.php?action=log",
                    type: "POST",
                    data: {
                        log_description: `${user} tarafından, ${tableName} tablosundaki ${project_id} id'li proje güncellendi!`,
                        admin_name: `${user}`
                    },
                    success: function() {
                        console.log("Log kaydı alındı!");
                    }
                });

                console.log(`${tableName} tablosundaki ${project_id} numaralı proje başarıyla güncellendi!`); //LOG KAYDI EKLE
                location.reload();
            }
        });
    }

    function addProject() {
        projeler.forEach(function(item) { //bunu eklemek zorundaydım ki aşağıdaki iptal butonunun bir anlamı olsun
            item.classList.add("inactiveLink");
        });

        show_projects.classList.add("d-none"); //önceki sayfanınn görünrülüğünü kaldırdım
        edit_project.classList.remove("d-none"); //düzenleme sayfamın görünürlüğünü açtım ki üzerinde gözükmesin

        let html = "";
        let editing_project;

        html +=
            `
                    <form class="d-flex flex-column justify-content-between align-content-center h-90">
                        <span class="text-center mt-1"> <b>Proje Ekleme Arayüzü</b> <i class="fa fa-edit"></i> </span>
                        <div class="input-group">
                            <label for="id" title="Proje ID'si" class="input-group-prepend input-group-text rounded-0 rounded-left">ID</label>
                            <input type="text" title="Proje ID'si" id="id" class="form-control input-group-append rounded-0 rounded-right" disabled="disabled">
                        </div>
                        <div class="input-group">
                            <label for="baslik" title="Proje Başlığı" class="input-group-prepend input-group-text rounded-0 rounded-left">Baslik</label>
                            <input type="text" title="Proje Başlığı" id="baslik" class="form-control input-group-append rounded-0 rounded-right">
                        </div>

                        <div class="input-group">
                            <label for="info" title="Proje Bilgisi" class="input-group-prepend input-group-text rounded-0 rounded-left">Info</label>
                            <input id="info" title="Proje Bilgisi" class="form-control input-group-append rounded-0 rounded-right">
                        </div>
                        <div class="input-group h-25">
                            <label for="icerik" title="Açıklama" class="input-group-prepend input-group-text rounded-0 rounded-left clearfix">İçerik</label>
                            <textarea id="icerik" title="Açıklama" class="form-control input-group-append h-100 rounded-0 rounded-right"></textarea>
                        </div>
                        <div class="d-flex flex-row justify-content-sm-center justify-content-lg-end clearfix">
                            <button onclick="return saveNewProject()" type="button" title="Projeyi Ekle" class="btn btn-success mr-sm-0 mr-md-2 mr-lg-2">Ekle</button>
                            <button onclick="return cancelProject()" type="button" title="Ekleme İşlemini İptal Et" class="btn btn-danger">İptal</button>
                        </div>
                    </form>`;

        edit_project.innerHTML = html;

    }

    function saveNewProject() {
        let baslik = document.getElementById("baslik").value;
        let info = document.getElementById("info").value;
        let icerik = document.getElementById("icerik").value;

        $.ajax({
            url: "crud-ajax.php?action=insert&section=" + tableName,
            type: "POST",
            data: {
                baslik: baslik,
                info: info,
                icerik: icerik
            },
            success: function() {

                $.ajax({ //log kaydı 
                    url: "logger.php?action=log",
                    type: "POST",
                    data: {
                        log_description: `${user} tarafından ${tableName} tablosuna yeni bir proje eklendi!`,
                        admin_name: `${user}`
                    },
                    success: function() {
                        console.log("Log kaydı alındı!");
                        location.reload();
                    }
                });
            }
        });
    }
</script>