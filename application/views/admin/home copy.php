<!-- menu -->
<nav>
    <div class="logo"><a href="<?= base_url("admin"); ?>"><font color="white"><i class="fab fa-vimeo-v"></i>aksinzone.com</font></a></div>
    <ul>
        <li><a href="<?= base_url("admin"); ?>"><strong>Home</strong></a></li>
        <li><a href="<?= base_url("admin/daerah_vaksinasi"); ?>"><strong>Informasi Puskesmas</strong></a></li>
        <li><a href="<?= base_url("admin/add_data"); ?>"><strong>Data Vaksinasi</strong></a></li>
        <li><a href="<?= base_url("admin/tampilan_data"); ?>"><strong>Perhitungan K-Means</strong></a></li>
        <li><a href="<?= base_url("auth/logout"); ?>"><strong>Log Out</strong></a></li>
    </ul>

    <div class="menu-toggle">
        <input type="checkbox" />
        <span></span>
        <span></span>
        <span></span>
    </div>

</nav>

<section>

    <div class="container">

        <br>

        <center>
            <h3><strong>Data Daerah Kec. Lowokwaru</strong></h3>
        </center>
        <br>
        <table class="table table-bordered table_hover table-striped table-responsive">
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
                <th>
                    <center>Alamat</center>
                </th>
                <th>
                    <center>Kode Pos</center>
                </th>
            </tr>

            <?php $no = 1;
            foreach ($lowokwaru as $inv) : ?>
                <tr>
                    <td align="center"><?= $no++ ?></td>
                    <td align="center"><?= $inv->nama_puskesmas ?></td>
                    <td align="center"><?= $inv->nama_kelurahan ?></td>
                    <td align="center"><?= $inv->alamat ?></td>
                    <td align="center"><?= $inv->kode_pos ?></td>
                </tr>
            <?php endforeach; ?>
        </table><br>

        <center>
            <h4><strong>Peta Vaksinasi</strong></h4>
        </center><br>

        <div align="center">
            <div class="map-wrapper" id="map" style="width: 600px; height: 400px;"></div>
        </div>

        <br>
        <center>
            <h4><strong>Zona Vaksinasi</strong></h4>
        </center><br>

        <div class="row">
            &nbsp;&nbsp;&nbsp;&nbsp;<div class="card bg-dark text-black" style="width:30%">
                <img class="card-img" src="<?= base_url("/assets/user/img/zonahijauh.jpg"); ?>" alt="Card image" style="width:100%">
                <div class="card-img-overlay">
                    <h5 class="card-title"><strong>Zona Hijau</strong></h5>
                    <p class="card-text"><strong>16%</strong></p>
                    <a href="<?= base_url("admin/zona_hijau"); ?>"><button type="button" class="btn btn-primary"><i class="fas fa-hand-pointer"></i> Pilih</button></a>
                </div>
            </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="card bg-dark text-black" style="width:30%">
                <img class="card-img" src="<?= base_url("/assets/user/img/zonakuning.jpg"); ?>" alt="Card image" style="width:100%">
                <div class="card-img-overlay">
                    <h5 class="card-title"><strong>Zona Kuning</strong></h5>
                    <p class="card-text"><strong>58%</strong></p>
                    <a href="<?= base_url("admin/zona_kuning"); ?>"><button type="button" class="btn btn-primary"><i class="fas fa-hand-pointer"></i> Pilih</button></a>
                </div>
            </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="card bg-dark text-white" style="width:30%">
                <img class="card-img" src="<?= base_url("/assets/user/img/zonamerah.jpg"); ?>" alt="Card image" style="width:100%">
                <div class="card-img-overlay">
                    <h5 class="card-title"><strong>Zona Merah</strong></h5>
                    <p class="card-text"><strong>25%</strong></p>
                    <a href="<?= base_url("admin/zona_merah"); ?>"><button type="button" class="btn btn-primary"><i class="fas fa-hand-pointer"></i> Pilih</button></a>
                </div>
            </div>

        </div><br>

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

    <?php foreach ($lowokwarudata as $data => $value) { ?>

        $.getJSON("<?= base_url('/assets/maps/' . $value->geojson) ?>", function(data) {
            geoLayer = L.geoJson(data, {
                style: function(feater) {
                    return {
                        opacity: 0.1,
                        color: 'blue',
                        fillcolor: 'blue',
                    }
                },
            }).addTo(map);

            geoLayer.eachLayer(function(layer) {
                layer.bindPopup("Kel. <?= $value->nama_kelurahan ?><br>Zona : Hijau<br>Persentase : 16%");
            });

        });

    <?php } ?>

    <?php foreach ($lowokwarudata1 as $data1 => $value1) { ?>

        $.getJSON("<?= base_url('/assets/maps/' . $value1->geojson) ?>", function(data1) {
            geoLayer = L.geoJson(data1, {
                style: function(feater) {
                    return {
                        opacity: 0.1,
                        color: 'blue',
                        fillcolor: 'blue',
                    }
                },
            }).addTo(map);

            geoLayer.eachLayer(function(layer) {
                layer.bindPopup("Kel. <?= $value1->nama_kelurahan ?><br>Zona : Kuning<br>Persentase : 58%");
            });

        });

    <?php } ?>

    <?php foreach ($lowokwarudata2 as $data2 => $value2) { ?>

        $.getJSON("<?= base_url('/assets/maps/' . $value2->geojson) ?>", function(data2) {
            geoLayer = L.geoJson(data2, {
                style: function(feater) {
                    return {
                        opacity: 0.1,
                        color: 'blue',
                        fillcolor: 'blue',
                    }
                },
            }).addTo(map);

            geoLayer.eachLayer(function(layer) {
                layer.bindPopup("Kel. <?= $value2->nama_kelurahan ?><br>Zona : Merah<br>Persentase : 25%");
            });

        });

    <?php } ?>

    <?php foreach ($puskesmas as $data1 => $value1) { ?>
        L.marker([<?= $value1->latitude ?>, <?= $value1->longitude ?>]).addTo(map).bindPopup("Nama Puskesmas : <?= $value->nama_puskesmas ?>");
    <?php } ?>
</script>

<script>
    alert("Selamat Datang Admin");
</script>