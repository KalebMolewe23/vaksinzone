<section id="header">
    <?php foreach ($image as $img) : ?>
        <a href="<?= base_url("user"); ?>"><img src="<?= base_url("assets/logo/" . $img->nama_logo) ?>" class="logo" alt="" width="150px"></a>
    <?php endforeach; ?>
    <div>
        <ul id="navbar">
            <li><a href="<?= base_url("user"); ?>"><strong>Home</strong></a></li>
            <li><a href="<?= base_url("user/daerah_vaksinasi"); ?>"><strong>Puskesmas</strong></a></li>
            <li><a class="active" href="<?= base_url("user/tampilan_data"); ?>"><strong>Vaksinasi</strong></a></li>
            <li><a href="<?= base_url("user/about"); ?>"><strong>Tentang Kami</strong></a></li>
            <li><a href="<?= base_url("auth/logout"); ?>"><strong>Keluar</strong></a>
                <a href="#" id="close"><i class="fas fa-times"></i></a>
        </ul>
    </div>
    <div id="mobile">
        <i id="bar" class="fas fa-outdent"></i>
    </div>
</section>

<section id="banner-home" class="section-p1">
    <img class="mySlides" src="<?= base_url("assets/image/vaksin1.png") ?>" width="1200px">
    <img class="mySlides" src="<?= base_url("assets/image/vaksin2.png") ?>" width="1200px">
    <img class="mySlides" src="<?= base_url("assets/image/vaksin3.png") ?>" width="1200px">
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
    <center>
        <h4><strong>Informasi Data Vaksinasi Kecamatan Lowokwaru </strong></h4>
    </center><br>

    <a class="btn btn-primary" href="<?= base_url("user/print_data_vaksin") ?>"><i class="fas fa-print"></i> Print</a><br><br>

    <table class="table table-bordered table-striped">
        <tr>
            <th>
                <center>No.</center>
            </th>
            <th>
                <center>Nama Kelurahan</center>
            </th>
            <th>
                <center>Nama Puskesmas</center>
            </th>
            <th>
                <center>jumlah_penduduk</center>
            </th>
            <th>
                <center>Belum Vaksin G-1</center>
            </th>
            <th>
                <center>Belum Vaksin G-2</center>
            </th>
            <th>
                <center>Belum Vaksin G-3</center>
            </th>
            <th>
                <center>Status Zona</center>
            </th>
        </tr>

        <?php $no = 1;
        foreach ($lowokwaru as $inv) : ?>
            <tr>
                <td align="center"><?= $no++ ?></td>
                <td align="center"><?= $inv->nama_kelurahan ?></td>
                <td align="center"><?= $inv->nama_puskesmas ?></td>
                <td align="center"><?= $inv->jumlah_penduduk ?></td>
                <td align="center"><?= $inv->bvaksin_gel1 ?></td>
                <td align="center"><?= $inv->bvaksin_gel2 ?></td>
                <td align="center"><?= $inv->bvaksin_gel3 ?></td>
                <td align="center">Hijau</td>
            </tr>
        <?php endforeach; ?>
    </table><br>

    <table class="table table-bordered table-striped">
        <tr>
            <th>
                <center>No.</center>
            </th>
            <th>
                <center>Nama Kelurahan</center>
            </th>
            <th>
                <center>Nama Puskesmas</center>
            </th>
            <th>
                <center>jumlah_penduduk</center>
            </th>
            <th>
                <center>Belum Vaksin G-1</center>
            </th>
            <th>
                <center>Belum Vaksin G-2</center>
            </th>
            <th>
                <center>Belum Vaksin G-3</center>
            </th>
            <th>
                <center>Status Zona</center>
            </th>
        </tr>

        <?php $no = 1;
        foreach ($lowokwaru1 as $inv1) : ?>
            <tr>
                <td align="center"><?= $no++ ?></td>
                <td align="center"><?= $inv1->nama_kelurahan ?></td>
                <td align="center"><?= $inv1->nama_puskesmas ?></td>
                <td align="center"><?= $inv1->jumlah_penduduk ?></td>
                <td align="center"><?= $inv1->bvaksin_gel1 ?></td>
                <td align="center"><?= $inv1->bvaksin_gel2 ?></td>
                <td align="center"><?= $inv1->bvaksin_gel3 ?></td>
                <td align="center">Kuning</td>
            </tr>
        <?php endforeach; ?>
    </table><br>

    <table class="table table-bordered table-striped">
        <tr>
            <th>
                <center>No.</center>
            </th>
            <th>
                <center>Nama Kelurahan</center>
            </th>
            <th>
                <center>Nama Puskesmas</center>
            </th>
            <th>
                <center>jumlah_penduduk</center>
            </th>
            <th>
                <center>Belum Vaksin G-1</center>
            </th>
            <th>
                <center>Belum Vaksin G-2</center>
            </th>
            <th>
                <center>Belum Vaksin G-3</center>
            </th>
            <th>
                <center>Status Zona</center>
            </th>
        </tr>

        <?php $no = 1;
        foreach ($lowokwaru2 as $inv2) : ?>
            <tr>
                <td align="center"><?= $no++ ?></td>
                <td align="center"><?= $inv2->nama_kelurahan ?></td>
                <td align="center"><?= $inv2->nama_puskesmas ?></td>
                <td align="center"><?= $inv2->jumlah_penduduk ?></td>
                <td align="center"><?= $inv2->bvaksin_gel1 ?></td>
                <td align="center"><?= $inv2->bvaksin_gel2 ?></td>
                <td align="center"><?= $inv2->bvaksin_gel3 ?></td>
                <td align="center">Merah</td>
            </tr>
        <?php endforeach; ?>
    </table>

</section>

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

<script>
    $(document).ready(function() {
        $(".preloader").fadeOut();
    })
</script>