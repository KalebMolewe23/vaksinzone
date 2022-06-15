<section id="header">
    <?php foreach ($image as $img) : ?>
        <a href="<?= base_url("user"); ?>"><img src="<?= base_url("assets/logo/" . $img->nama_logo) ?>" class="logo" alt="" width="150px"></a>
    <?php endforeach; ?>
    <div>
        <ul id="navbar">
            <li><a href="<?= base_url("user"); ?>"><strong>Home</strong></a></li>
            <li><a class="active" href="<?= base_url("user/daerah_vaksinasi"); ?>"><strong>Puskesmas</strong></a></li>
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
    <img class="mySlides" src="<?= base_url("assets/image/dinoyo.png") ?>" width="1200px">
    <img class="mySlides" src="<?= base_url("assets/image/kendalsari.png") ?>" width="1200px">
    <img class="mySlides" src="<?= base_url("assets/image/mojolangu.png") ?>" width="1200px">
</section>

<section class="section-p1">
    <div class="preloader">
        <div class="loading">
            <img src="<?= base_url('assets/image/loading.gif'); ?>" width="120">
            <p><strong>Harap Tunggu</strong></p>
        </div>
    </div>
</section>

<!-- MAIN -->
<section class="section-p1">
    <center>
        <h4><strong>Informasi Vaksinasi Kecamatan Lowokwaru</strong></h4>
    </center><br>

    <a href="<?= base_url("user/print_info_vaksin") ?>"><button class="btn btn-success" type="button"><i class="fa fa-print" aria-hidden="true"></i> Print</button></a>
    <br><br>

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