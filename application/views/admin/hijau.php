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
                    <i class='bx bx-cog'></i>
                    <span class="link_name">Setting</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Setting</a></li>
                <li><a href="<?= base_url("admin/logo"); ?>">Logo</a></li>
                <li><a href="<?= base_url("admin/sosmed"); ?>">Social Media</a></li>
                <li><a href="<?= base_url("admin/about"); ?>">About</a></li>
                <li><a href="<?= base_url("admin/footer"); ?>">Footer</a></li>
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
                            <font color='#ffffff'>Data User</font>
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
        <span class="text"><i class='bx bxs-map-pin'></i> Zona Hijau</span>
    </div>

    <main>
        <div class="container">

            <br>

            <center>
                <h3><strong>Data Daerah Kec. Lowokwaru</strong></h3>
            </center>
            <br>
            <table class="table table-bordered table_hover table-striped">
                <tr>
                    <th>
                        <center>No.</center>
                    </th>
                    <th>
                        <center>Nama Puskesmas</center>
                    </th>
                    <th>
                        <center>Nama Kelurahan</center>
                    </th>
                </tr>

                <?php $no = 1;
                foreach ($lowokwaru as $inv) : ?>
                    <tr>
                        <td align="center"><?= $no++ ?></td>
                        <td align="center"><?= $inv->nama_puskesmas ?></td>
                        <td align="center">Kel. <?= $inv->nama_kelurahan ?></td>
                    </tr>
                <?php endforeach; ?>
            </table><br>

            <center>
                <h4><strong>Peta Vaksinasi</strong></h4>
            </center><br>

            <div class="row">
                <div id="piechart" style="width: 700px; height: 400px;"></div>
                <div class="map-wrapper" id="map" style="width: 400px; height: 400px;"></div>
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

<script src="<?= base_url("/assets/user/js/script.js"); ?>"></script>

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
                        color: '#00FF00',
                        fillcolor: '#00FF00',
                    }
                },
            }).addTo(map);

            geoLayer.eachLayer(function(layer) {
                layer.bindPopup("Kel. <?= $value->nama_kelurahan ?><br>Vaksin -1: <?= number_format($value->pers_vaksin_gel1) ?>%<br>Vaksin -2: <?= number_format($value->pers_vaksin_gel2) ?>%<br>Vaksin -3: <?= number_format($value->pers_vaksin_gel3) ?>%");
            });
        });

    <?php } ?>
</script>

<script>
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Zona', 'Total'],
            <?php
            foreach ($vaksin as $v) {
                echo "['" . '' . "'," . $v['total'] . "],";
            }
            ?>
        ]);
        var options = {
            title: 'Data Merah Belum Vaksin | Data Biru Sudah Vaksin',
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }
</script>

<!-- javascript loading -->
<script>
    $(document).ready(function() {
        $(".preloader").fadeOut();
    })
</script>

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