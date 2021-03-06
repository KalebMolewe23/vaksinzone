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
        <span class="text"><i class='bx bxs-data'></i> Tampilan Data Vaksinasi</span>
    </div>

    <main>
        <div class="container">
            <br>
            <center>
                <h4><strong>Informasi Data Vaksinasi Kecamatan Lowokwaru </strong></h4>
            </center><br>

            <br>

            <a class="btn btn-primary" href="<?= base_url("admin/iterasi_kmeans"); ?>"><i class='bx bx-loader-circle'></i> Proses Data Akhir</a></br>
            </br>
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
                </tr>

                <?php $no = 1;
                foreach ($vaksin as $inv) : ?>
                    <tr>
                        <td align="center"><?= $no++ ?></td>
                        <td align="center"><?= $inv->nama_kelurahan ?></td>
                        <td align="center"><?= $inv->nama_puskesmas ?></td>
                        <td align="center"><?= $inv->jumlah_penduduk ?></td>
                        <td align="center"><?= $inv->bvaksin_gel1 ?></td>
                        <td align="center"><?= $inv->bvaksin_gel2 ?></td>
                        <td align="center"><?= $inv->bvaksin_gel3 ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
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

<!-- javascript loading -->
<script>
    $(document).ready(function() {
        $(".preloader").fadeOut();
    })
</script>