<!-- News -->
<section id="news" class="news">
    <div class="container">
        <div class="row text-center">
            <div class="col-12">
                <h3 class="section-sub-title">Güncel Haberler</h3>
            </div>
        </div>
        <!--/ Title row end -->

        <div id="haberler-tab" class="row">

            <div id="prelaoder" class="h-100 w-100 text-cemter container d-flex align-items-center display-3 justify-content-center pb-5">
                <h1 class="display-3">Yükleniyor ...</h1>
            </div>

        </div>

        <!--/ Content row end -->

    </div>
    <!--/ Container end -->
</section>

<script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
<script>
    let haberler_tab = document.querySelector("#haberler-tab");
    let html = "";
    let haberler = [];
    (() => {
        $.ajax({
            url: "./admin/crud-ajax.php?action=read&section=haberler",
            type: "GET",
            success: function(data) {
                haberler = JSON.parse(data);
                haberler.forEach((haber) => {
                    html +=
                        `<div class="col-lg-4 col-md-6 mb-4">
                        <div class="latest-post">
                            <div class="latest-post-media">
                                <a href="haber-detay.php?id=${haber.haber_id}" class="latest-post-img">
                                    <img class="img-fluid" src="images/news/news${haber.haber_id}.jpg" alt="img">
                                </a>
                            </div>
                            <div class="post-body">
                                <h4 class="post-title">
                                    <a href="haber-detay.php?id=${haber.haber_id}" class="d-inline-block">${haber.baslik} </a>
                                </h4>
                                <div class="latest-post-meta">
                                    <p><small> ${haber.icerik.slice(0,59)}...</small></p>
                                    <span class="post-item-date">
                                        <i class="fa fa-clock-o"></i> ${haber.yayin_tarihi}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>`;
                });
            }
        }).then(() => {
            haberler_tab.innerHTML = html;
        });
    })();
</script>