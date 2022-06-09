<marquee scrollamount="5"><strong>Daftar Kelurahan Lowokwaru : Jatimulyo, Lowokwaru, Tulusrejo, Mojolangu, Tunjungsekar, Tasikmadu, Tunggulwulung, Dinoyo, Merjosari, Tlogomas, Ketawanggede, Sumbersari</strong></marquee>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container">
        <!-- Brand/logo -->
        <a class="navbar-brand" href="<?= base_url("user") ?>">
            <img src="<?= base_url("assets/img/vaksinzone.png") ?>" alt="logo" style="width:130px;">
        </a>

        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url("user") ?>">Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url("user/info_vaksinasi") ?>">Informasi Daerah Vaksinasi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url("user/tampilan_data") ?>">Informasi Vaksinasi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url("user/about") ?>">Tentang Kami</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url("auth/logout") ?>">Keluar</a>
            </li>

        </ul>
    </div>
</nav>

<div class="row" id="body-row">

    <div class="container">

        <br>
        <a class="btn btn-primary" href="<?= base_url("user/print_grafik") ?>"><i class="fas fa-print"></i> Print</a><br><br>

        <center>
            <div id="piechart" style="width: 900px; height: 500px;">
        </center>

        <center>
            <h3>Hasil Proses K-means</h3>
        </center><br>

        <table id="table_data" class="table table-bordered table-admin">
            <tr align="center">
                <td>No Puskesmas</td>
                <td>Nama Puskesmas</td>
                <td>Predikat</td>
            </tr>
            <?php
            foreach ($data_hasil->result() as $h) {
            ?>
                <tr align="center">
                    <td><?php echo $h->id_vaksin; ?></td>
                    <td><?php echo $h->nama_kelurahan; ?></td>
                    <td><?php echo $h->zona; ?></td>
                </tr>
            <?php
            }
            ?>
        </table>

    </div>
</div>



<script>
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Tahun', 'Total'],
            <?php
            foreach ($vaksin as $v) {
                echo "['" . $v['zona'] . "'," . $v['total'] . "],";
            }
            ?>
        ]);
        var options = {
            title: 'Data Vaksinasi Wilayah Lowokwaru',
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }
</script>