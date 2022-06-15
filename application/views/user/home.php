<section id="header">
    <?php foreach ($image as $img) : ?>
        <a href="<?= base_url("user"); ?>"><img src="<?= base_url("assets/logo/".$img->nama_logo) ?>" class="logo" alt="" width="150px"></a>
    <?php endforeach; ?>

    <div>
        <ul id="navbar">
            <li><a class="active" href="<?= base_url("user"); ?>"><strong>Home</strong></a></li>
            <li><a href="<?= base_url("user/daerah_vaksinasi"); ?>"><strong>Puskesmas</strong></a></li>
            <li><a href="<?= base_url("user/tampilan_data"); ?>"><strong>Vaksinasi</strong></a></li>
            <li><a href="<?= base_url("home/about"); ?>"><strong>Tentang Kami</strong></a></li>
            <li><a href="<?= base_url("auth/logout"); ?>"><strong>Keluar</strong></a>
                <a href="#" id="close"><i class="fas fa-times"></i></a>
        </ul>
    </div>
    <div id="mobile">
        <i id="bar" class="fas fa-outdent"></i>
    </div>
</section>

<section id="banner-home" class="section-p1">
    <img class="mySlides" src="<?= base_url("assets/image/vaksinbanner.png") ?>" width="1200px">
    <img class="mySlides" src="<?= base_url("assets/image/vaksinbanner2.png") ?>" width="1200px">
    <img class="mySlides" src="<?= base_url("assets/image/vaksinbanner3.png") ?>" width="1200px">
</section>

<section class="section-p1">
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
    </div>
</section>

<section class="section-p1">
    <div class="preloader">
        <div class="loading">
            <img src="<?= base_url('assets/image/loading.gif'); ?>" width="120">
            <p><strong>Harap Tunggu</strong></p>
        </div>
    </div>
</section>

<section class="section-p1">
    <div class="container">
        <ol style="list-style-type:square; width: 800px;">
            <li style="float: left; color:red; width: 200px; padding: 2px 0px;">Zona Merah</li>
            <li style="float: left; color:yellow; width: 200px; padding: 2px 0px;">Zona Kuning</li>
            <li style="float: left; color:green; width: 200px; padding: 2px 0px;">Zona Hijau</li>
        </ol>
    </div><br><br>
    <div class="map-wrapper" id="map" style="width: 1200px; height: 500px;"></div>
</section>

<section class="section-p1">
    <h4><strong>[Zona Merah]</strong></h4>
    <div class="row">
        <div id="piechart" style="width: 700px; height: 400px;"></div>
        <div class="map-wrapper" id="mapmerah" style="width: 400px; height: 400px;"></div>
    </div>
</section>

<section class="section-p1">
    <h4><strong>[Zona Kuning]</strong></h4>
    <div class="row">
        <div id="piechart2" style="width: 700px; height: 400px;"></div>
        <div class="map-wrapper" id="mapkuning" style="width: 400px; height: 400px;"></div>
    </div>
</section>

<section class="section-p1">
    <h4><strong>[Zona Hijau]</strong></h4>
    <div class="row">
        <div id="piechart3" style="width: 700px; height: 400px;"></div>
        <div class="map-wrapper" id="maphijau" style="width: 400px; height: 400px;"></div>
    </div>
</section>

<!-- js map zona keseluruhan -->
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

<!-- js piechart merah-->
<script>
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Zona', 'Total'],
            <?php
            foreach ($vaksinm as $v) {
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

<!-- js zona merah -->
<script>
    var mapmerah = L.map('mapmerah').setView([-7.944518, 112.619456], 13);

    var tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1
    }).addTo(mapmerah);

    <?php foreach ($lowokwarumerah as $data => $valuemerah) { ?>
        $.getJSON("<?= base_url('assets/maps/' . $valuemerah->geojson) ?>", function(data) {
            geoLayer = L.geoJson(data, {
                style: function(feater) {
                    return {
                        opacity: 0.5,
                        color: '#FF0000',
                        fillcolor: '#FF0000',
                    }
                },
            }).addTo(mapmerah);

            geoLayer.eachLayer(function(layer) {
                layer.bindPopup("Kel. <?= $valuemerah->nama_kelurahan ?><br>Vaksin -1: <?= number_format($valuemerah->pers_vaksin_gel1) ?>%<br>Vaksin -2: <?= number_format($valuemerah->pers_vaksin_gel2) ?>%<br>Vaksin -3: <?= number_format($valuemerah->pers_vaksin_gel3) ?>%");
            });
        });

    <?php } ?>
</script>

<!-- js piechart kuning-->
<script>
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Zona', 'Total'],
            <?php
            foreach ($vaksink as $v) {
                echo "['" . '' . "'," . $v['total'] . "],";
            }
            ?>
        ]);
        var options = {
            title: 'Data Merah Belum Vaksin | Data Biru Sudah Vaksin',
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

        chart.draw(data, options);
    }
</script>

<!-- js zona kuning -->
<script>
    var mapkuning = L.map('mapkuning').setView([-7.944518, 112.619456], 13);

    var tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1
    }).addTo(mapkuning);

    <?php foreach ($lowokwarukuning as $data => $valuekuning) { ?>
        $.getJSON("<?= base_url('assets/maps/' . $valuekuning->geojson) ?>", function(data) {
            geoLayer = L.geoJson(data, {
                style: function(feater) {
                    return {
                        opacity: 0.5,
                        color: 'yellow',
                        fillcolor: 'yellow',
                    }
                },
            }).addTo(mapkuning);

            geoLayer.eachLayer(function(layer) {
                layer.bindPopup("Kel. <?= $valuekuning->nama_kelurahan ?><br>Vaksin -1: <?= number_format($valuekuning->pers_vaksin_gel1) ?>%<br>Vaksin -2: <?= number_format($valuekuning->pers_vaksin_gel2) ?>%<br>Vaksin -3: <?= number_format($valuekuning->pers_vaksin_gel3) ?>%");
            });
        });

    <?php } ?>
</script>

<!-- js piechart hijau-->
<script>
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Zona', 'Total'],
            <?php
            foreach ($vaksinh as $v) {
                echo "['" . '' . "'," . $v['total'] . "],";
            }
            ?>
        ]);
        var options = {
            title: 'Data Merah Belum Vaksin | Data Biru Sudah Vaksin',
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart3'));

        chart.draw(data, options);
    }
</script>

<!-- js zona hijau -->
<script>
    var maphijau = L.map('maphijau').setView([-7.944518, 112.619456], 13);

    var tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1
    }).addTo(maphijau);

    <?php foreach ($lowokwaruhijau as $data => $valuehijau) { ?>
        $.getJSON("<?= base_url('assets/maps/' . $valuehijau->geojson) ?>", function(data) {
            geoLayer = L.geoJson(data, {
                style: function(feater) {
                    return {
                        opacity: 0.5,
                        color: 'green',
                        fillcolor: 'green',
                    }
                },
            }).addTo(maphijau);

            geoLayer.eachLayer(function(layer) {
                layer.bindPopup("Kel. <?= $valuehijau->nama_kelurahan ?><br>Vaksin -1: <?= number_format($valuehijau->pers_vaksin_gel1) ?>%<br>Vaksin -2: <?= number_format($valuehijau->pers_vaksin_gel2) ?>%<br>Vaksin -3: <?= number_format($valuehijau->pers_vaksin_gel3) ?>%");
            });
        });

    <?php } ?>
</script>

<!-- js slider image -->
<script>
    var myIndex = 0;
    carousel();

    function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length) {
            myIndex = 1
        }
        x[myIndex - 1].style.display = "block";
        setTimeout(carousel, 5000); // Change image every 2 seconds
    }
</script>

<script>
    const bar = document.getElementById('bar');
    const close = document.getElementById('close');
    const nav = document.getElementById('navbar');

    if (bar) {
        bar.addEventListener('click', () => {
            nav.classList.add('active');
        })
    }

    if (close) {
        close.addEventListener('click', () => {
            nav.classList.remove('active');
        })
    }
</script>

<!-- javascript loading -->
<script>
    $(document).ready(function() {
        $(".preloader").fadeOut();
    })
</script>

<!-- <script>
    alert('Selamat datang, <?= $user['nama_user'] ?>.');
</script> -->