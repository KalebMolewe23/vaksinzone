<section id="header">
    <?php foreach ($image as $img) : ?>
        <a href="<?= base_url("user"); ?>"><img src="<?= base_url("assets/logo/" . $img->nama_logo) ?>" class="logo" alt="" width="150px"></a>
    <?php endforeach; ?>

    <div>
        <ul id="navbar">
            <li><a href="<?= base_url("user"); ?>"><strong>Home</strong></a></li>
            <li><a href="<?= base_url("user/daerah_vaksinasi"); ?>"><strong>Puskesmas</strong></a></li>
            <li><a href="<?= base_url("user/tampilan_data"); ?>"><strong>Vaksinasi</strong></a></li>
            <li><a class="active" href="<?= base_url("user/about"); ?>"><strong>Tentang Kami</strong></a></li>
            <li><a href="<?= base_url("auth/logout"); ?>"><strong>Keluar</strong></a>
                <a href="#" id="close"><i class="fas fa-times"></i></a>
        </ul>
    </div>
    <div id="mobile">
        <i id="bar" class="fas fa-outdent"></i>
    </div>
</section>

<?php foreach($tentang as $value) {?>
<?php } ?>
<section id="page-header" class="about-header">
    <h2><?= $value->header1; ?></h2>
    <p><?= $value->header2; ?></p>
</section>

<section id="about-head" class="section-p1">
    <img src="<?= base_url('assets/image/bgabout.png'); ?>" alt="">
    <div>
        <h2><?= $value->title; ?></h2>
        <p><?= $value->body; ?></p>
        <abbr title=""><?= $value->footer; ?></abbr>
    
        <br><br>
        <marquee bgcolor="#ccc" loop="-1" scrollamount="5" width="100%"><?= $value->marquee; ?></marquee>
    
    </div>
</section>

<section id="about-app" class="section-p1">

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