<div class="sidebar close">
    <div class="logo-details">
        <i class='bx bx-user-circle'></i>
        <span class="logo_name">VAKSINZONE</span>
    </div>
    <ul class="nav-links">
        <li>
            <a href="<?= base_url("admin"); ?>">
                <i class='bx bx-grid-alt'></i>
                <span class="link_name">Home</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="<?= base_url("admin"); ?>">home</a></li>
            </ul>
        </li>
        <li>
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bx-map-alt'></i>
                    <span class="link_name">Data Zona</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Data Zona</a></li>
                <li><a href="<?= base_url("admin/zona_merah"); ?>">Zona Merah</a></li>
                <li><a href="<?= base_url("admin/zona_kuning"); ?>">Zona Kuning</a></li>
                <li><a href="<?= base_url("admin/zona_hijau"); ?>">Zona Hijau</a></li>
            </ul>
        </li>
        <li>
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bxs-book-content'></i>
                    <span class="link_name">Informasi</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Data Zona</a></li>
                <li><a href="<?= base_url("admin/daerah_vaksinasi"); ?>">Lokasi Puskesmas</a></li>
                <li><a href="<?= base_url("admin/add_data"); ?>">Data Vaksinasi</a></li>
            </ul>
        </li>
        <li>
            <a href="<?= base_url("admin/tampilan_data"); ?>">
                <i class='bx bx-desktop'></i>
                <span class="link_name">K-Means</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="<?= base_url("admin/tampilan_data"); ?>">K-Means</a></li>
            </ul>
        </li>
        <li>
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bxs-user-account'></i>
                    <span class="link_name">Data User</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Data Zona</a></li>
                <li><a href="<?= base_url("admin/data_admin"); ?>">Admin</a></li>
                <li><a href="<?= base_url("admin/data_user"); ?>">User</a></li>
            </ul>
        </li>
        <li>
            <div class="profile-details">
                <div class="profile-content">
                    <i class='bx bx-user-pin'></i>
                </div>
                <div class="name-job">
                    <div class="profile_name"></div>
                    <div class="job"><a href="<?= base_url("admin/profil"); ?>">
                            <font color='#ffffff'>DATA PROGRAMMER</font>
                        </a></div>
                </div>
                <a href="<?= base_url("auth/logout"); ?>"><i class='bx bx-log-out'></i></a>
            </div>
        </li>
    </ul>
</div>

<section class="home-section">

    <div class="home-content">
        <i class='bx bx-menu'></i>
        <span class="text"><i class='bx bxs-home'></i> Home</span>
    </div>

    <main>
        <div class="container-fluid">
            <div class="container">
                <h3><strong>Data Vaksinasi COVID-19</strong></h3>
                <p>[Kecamatan lowokwaru]</p><br>
                <div class="row">
                    <div class="col-sm">
                        <div class="card">
                            <div class="card-header">
                                <strong>Total Vaksinasi Dosis 1</strong>
                            </div>
                            <div class="card-body">
                                <?php $sum = 0;
                                foreach ($vaksin as $inv) : ?>
                                <?php endforeach; ?>
                                <center><?= $sum += round(($inv->total / $inv->totalp) * 100, 0); ?>%</center>
                                <?php $nilaivaksin1 = $sum; ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: <?= $nilaivaksin1; ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="card">
                            <div class="card-header">
                                <strong>Total Vaksinasi Dosis 2</strong>
                            </div>
                            <div class="card-body">
                                <?php $sum = 0;
                                foreach ($vaksin1 as $inv1) : ?>
                                <?php endforeach; ?>
                                <center><?= $sum += round(($inv1->total / $inv1->totalp) * 100, 0); ?>%</center>
                                <?php $nilaivaksin2 = $sum; ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: <?= $nilaivaksin2; ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="card">
                            <div class="card-header">
                                <strong>Total Vaksinasi Dosis 3</strong>
                            </div>
                            <div class="card-body">
                                <?php $sum = 0;
                                foreach ($vaksin2 as $inv2) : ?>
                                <?php endforeach; ?>
                                <center><?= $sum += round(($inv2->total / $inv2->totalp) * 100, 0); ?>%</center>
                                <?php $nilaivaksin3 = $sum; ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: <?= $nilaivaksin3; ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><br><br>
                <h3><strong>Data Pemetaan Kecamatan Lowokwaru</strong></h3>
                <div class="container">
                    <ol style="list-style-type:square; width: 600px;">
                        <li style="float: left; color:red; width: 200px; padding: 2px 0px;">Zona Merah</li>
                        <li style="float: left; color:yellow; width: 200px; padding: 2px 0px;">Zona Kuning</li>
                        <li style="float: left; color:green; width: 200px; padding: 2px 0px;">Zona Hijau</li>
                    </ol>
                </div><br><br>
                <div class="map-wrapper" id="map" style="width: 1110px; height: 800px;"></div>
            </div>
        </div>
    </main>

</section>

<section class="section-p1">
    <div class="preloader">
        <div class="loading">
            <img src="<?= base_url('assets/image/loading.gif'); ?>" width="120">
            <p><strong>Harap Tunggu</strong></p>
        </div>
    </div>
</section>

<script>
    let arrow = document.querySelectorAll(".arrow");
    for (var i = 0; i < arrow.length; i++) {
        arrow[i].addEventListener("click", (e) => {
            let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
            arrowParent.classList.toggle("showMenu");
        });
    }
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".bx-menu");
    console.log(sidebarBtn);
    sidebarBtn.addEventListener("click", () => {
        sidebar.classList.toggle("close");
    });
</script>

<script>
    var map = L.map('map').setView([-7.944518, 112.619456], 13);

    var tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1
    }).addTo(map);

    <?php foreach ($lowokwaru as $data => $value) { ?>
        $.getJSON("<?= base_url('assets/maps/' . $value->geojson) ?>", function(data) {
            geoLayer = L.geoJson(data, {
                style: function(feater) {
                    return {
                        opacity: 0.5,
                        color: 'yellow',
                        fillcolor: '#FFFF00',
                    }
                },
            }).addTo(map);

            geoLayer.eachLayer(function(layer) {
                layer.bindPopup("Kel. <?= $value->nama_kelurahan ?><br>Vaksin -1: <?= number_format($value->pers_vaksin_gel1) ?>%<br>Vaksin -2: <?= number_format($value->pers_vaksin_gel2) ?>%<br>Vaksin -3: <?= number_format($value->pers_vaksin_gel3) ?>%");
            });
        });

    <?php } ?>

    <?php foreach ($lowokwaru2 as $data => $value1) { ?>
        $.getJSON("<?= base_url('assets/maps/' . $value1->geojson) ?>", function(data) {
            geoLayer = L.geoJson(data, {
                style: function(feater) {
                    return {
                        opacity: 0.5,
                        color: 'red',
                        fillcolor: '#FFFF00',
                    }
                },
            }).addTo(map);

            geoLayer.eachLayer(function(layer) {
                layer.bindPopup("Kel. <?= $value1->nama_kelurahan ?><br>Vaksin -1: <?= number_format($value1->pers_vaksin_gel1) ?>%<br>Vaksin -2: <?= number_format($value1->pers_vaksin_gel2) ?>%<br>Vaksin -3: <?= number_format($value1->pers_vaksin_gel3) ?>%");
            });
        });

    <?php } ?>

    <?php foreach ($lowokwaru3 as $data => $value2) { ?>
        $.getJSON("<?= base_url('assets/maps/' . $value2->geojson) ?>", function(data) {
            geoLayer = L.geoJson(data, {
                style: function(feater) {
                    return {
                        opacity: 0.5,
                        color: 'green',
                        fillcolor: '#FFFF00',
                    }
                },
            }).addTo(map);

            geoLayer.eachLayer(function(layer) {
                layer.bindPopup("Kel. <?= $value2->nama_kelurahan ?><br>Vaksin -1: <?= number_format($value2->pers_vaksin_gel1) ?>%<br>Vaksin -2: <?= number_format($value2->pers_vaksin_gel2) ?>%<br>Vaksin -3: <?= number_format($value2->pers_vaksin_gel3) ?>%");
            });
        });

    <?php } ?>
</script>

<!-- javascript loading -->
<script>
    $(document).ready(function() {
        $(".preloader").fadeOut();
    })
</script>

<!-- <script>
    alert("Selamat Datang Admin");
</script> -->