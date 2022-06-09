<marquee scrollamount="5"><strong>Daftar Kelurahan Lowokwaru : Jatimulyo, Lowokwaru, Tulusrejo, Mojolangu, Tunjungsekar, Tasikmadu, Tunggulwulung, Dinoyo, Merjosari, Tlogomas, Ketawanggede, Sumbersari</strong></marquee>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container">
        <!-- Brand/logo -->
        <a class="navbar-brand" href="<?= base_url("admin") ?>">
            <img src="<?= base_url("assets/img/vaksinzone.png") ?>" alt="logo" style="width:130px;">
        </a>

        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url("admin") ?>">Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url("admin/daerah_vaksinasi") ?>">Daerah Vaksinasi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url("admin/add_data") ?>">Tambah Data Vaksinasi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url("admin/tampilan_data") ?>">Proses K-Means</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url("auth/logout") ?>">Keluar</a>
            </li>

        </ul>
    </div>
</nav>

    <!-- MAIN -->
    <div class="container">
        <br>
        <center>
            <h4><strong>Informasi Data Vaksinasi Kecamatan Lowokwaru </strong></h4>
        </center><br>

        <a class="btn btn-primary" href="<?= base_url("admin/tampilan_data"); ?>">Kembali</a>&nbsp;<a class="btn btn-success" href="<?= base_url("admin/iterasi_kmeans"); ?>">Proses K-Means</a></br>
        </br>

        <div class="table-responsive">
            <table id="table_data" class="table table-bordered table-striped table-admin">
                <tr>
                    <td>Centroid 1</td>
                    <td>Zona Merah</td>
                    <td><?php echo $c1; ?></td>
                </tr>
                <tr>
                    <td>Centroid 2</td>
                    <td>Zona Kuning</td>
                    <td><?php echo $c2; ?></td>
                </tr>
                <tr>
                    <td>Centroid 3</td>
                    <td>Zona Hijau</td>
                    <td><?php echo $c3; ?></td>
                </tr>
            </table>
        </div>
        <br>

        <div class="table-responsive">
            <table id="table_data" class="table table-bordered table-striped table-admin">
                <tr align="center">
                    <td>No Puskesmas</td>
                    <td>Nama Kelurahan</td>
                    <td>Vaksin 1</td>
                    <td>Vaksin 2</td>
                    <td>Vaksin 3</td>
                    <td>Persentase</td>
                    <td colspan="3">Distance</td>
                    <td>Zona</td>
                </tr>
                <?php foreach ($data_vaksin->result_array() as $s) { ?>
                    <tr>
                        <td><?php echo $s['id_vaksin']; ?></td>
                        <td><?php echo $s['nama_kelurahan']; ?></td>
                        <td><?php echo $s['jumlah']; ?></td>
                        <td><?php echo $s['total_vaksin1']; ?></td>
                        <td><?php echo $s['total_vaksin2']; ?></td>
                        <td><?php echo $s['total_vaksin3']; ?></td>
                        <td><?php echo $s['d1']; ?></td>
                        <td><?php echo $s['d2']; ?></td>
                        <td><?php echo $s['d3']; ?></td>
                        <td><?php echo $s['zona']; ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>