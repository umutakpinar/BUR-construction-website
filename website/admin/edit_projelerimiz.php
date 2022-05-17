<div class="container text-dark ">
    <div class="container shadow-lg text-white">
        <div class="row d-flex justify-content-sm-between">
            <a href="#ger_projeler" id="ger_project" class="project-tab col-md-6 col-lg-6 text-light rounded-top bg-secondary border-bottom-0 p-3 text-center">
                Gerçekleştirilmiş Projeler
            </a>
            <a href="#gel_projeler" id="gel_project" class="project-tab col-md-5 col-lg-5 text-jight rounded-top bg-secondary border-bottom-0 p-3 text-center">
                Gelecek Projeler
            </a>
        </div>
        <div id="list-selected-tab" class="row h-75">
            <div class="rounded-bottom bg-secondary border-top-0 w-100 h-100 p-3">

                <div id="alert" class="alert alert-danger p-3">
                    Lütfen düzenlemek istediğiniz proje sekmesini seçiniz.
                </div>


                <div id="show-projects" class="container bg-light border rounded p-3 d-none h-100 text-dark overflow-auto">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum fugit facilis doloremque recusandae neque sunt corrupti! A voluptates animi atque totam impedit esse minima sit. Tenetur, cumque reprehenderit nihil quia atque excepturi! Ullam, quasi aperiam? Vel dicta minima fuga, asperiores temporibus quis rerum voluptates officia repellat, nisi dignissimos magnam reprehenderit tempora, dolor necessitatibus est nostrum. Tempora quisquam quae voluptatem quia totam aliquam enim molestiae aperiam exercitationem nemo, culpa delectus veniam incidunt omnis earum iusto fugit harum. Ipsam, nemo magnam in numquam odio nihil ad aperiam cum alias eligendi exercitationem quo vel laboriosam. Facere, cumque repellendus blanditiis omnis eveniet modi minima soluta saepe dolorem alias reiciendis dolore voluptatibus perspiciatis beatae natus nobis ipsam nisi itaque iste corrupti, debitis, sapiente ipsa? Aliquid nulla suscipit quam vitae tenetur aut. Alias ex iure impedit suscipit culpa inventore qui repellendus. Accusamus facere veniam ipsa dolores aliquam, iusto eum inventore sunt nulla tempore animi dolorem rerum deserunt sit vel voluptas dignissimos consequuntur minima amet quod! Ullam qui est corrupti ipsum ipsa alias repellat, officiis mollitia consequuntur iure ea incidunt optio harum sunt maiores? Cumque et, maiores ipsa alias sed, natus totam dolores impedit fugit quam esse aut laborum quo quisquam commodi eligendi eum repellat omnis ipsum quasi! Soluta necessitatibus repellat vero accusamus enim sint aliquid, optio similique iure vitae officiis id suscipit veritatis error quisquam maiores modi. Quia ex cumque nostrum deserunt id distinctio nobis ea, illo dolores et repellendus error nisi quaerat! Sequi, sed molestias totam quam quasi error consequatur obcaecati assumenda saepe iste atque commodi magnam similique vero explicabo, veniam ipsum aut, qui aperiam iusto incidunt nostrum dolorum minima nesciunt! Voluptatibus fugiat eligendi, voluptas eaque, rerum dolorem, tempora dignissimos repudiandae laborum perferendis odit libero cupiditate hic sunt animi neque harum incidunt aliquid repellat quam. Tempora veniam quia est, nisi doloremque atque iusto. Molestiae, necessitatibus?
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
    projeler.forEach(function(item) {
        item.addEventListener("click", function(e) {
            //seçilen sekme arkaplnını değiştir ve alerti kaldır
            projeler.forEach(function(it) {
                it.classList.add("bg-dark");
                it.classList.remove("bg-warning");
            });

            e.target.classList.remove("bg-dark");
            e.target.classList.add("bg-warning");

            alert.style.display = "none";

            show_projects.classList.remove("d-none");
            //--------------------------------

            //seçilen sekmeye göre list-selected-tab öğesinin içeriğini değiştir
            if (e.target.id == "ger_project") {
                console.log("Gerçekleştirilmiş Projeleri Düzenleme Seçildi");

            } else if (e.target.id == "gel_project") {
                console.log("Gelecek Projeleri Düzenleme Seçildi");
            }

            //--------------------------------
        });
    });
</script>