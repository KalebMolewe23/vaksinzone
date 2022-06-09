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
        <span class="text"><i class='bx bxs-data'></i> Iterasi K-Means</span>
    </div>

    <main>
        <div class="container margin-b70">
            <div class="row" id="body-row">

                <!-- MAIN -->
                <div class="container">
                    <br>
                    <h3><strong>Hasil Iterasi</strong></h3>
                    <div id="body">
                        <?php
                        foreach ($q->result_array() as $hq) {
                        ?>
                            <center>
                                <h3>Iterasi ke-<?php echo $hq['iterasi']; ?></h3>
                            </center>
                            <div class="table-responsive">
                                <table id="table_data" class="table table-bordered table-admin">
                                    <tr align="center">
                                        <td>C1</td>
                                        <td>C2</td>
                                        <td>C3</td>
                                    </tr>
                                    <?php
                                    $q2 = $this->db->query('select * from centroid_temp where iterasi=' . $hq['iterasi'] . '');
                                    foreach ($q2->result() as $tq) {
                                        $warna1 = "";
                                        $warna2 = "";
                                        $warna3 = "";
                                        if ($tq->c1 == 1) {
                                            $warna1 = '#FFFF00';
                                        } else {
                                            $warna1 = '#EAEAEA';
                                        }
                                        if ($tq->c2 == 1) {
                                            $warna2 = '#FFFF00';
                                        } else {
                                            $warna2 = '#EAEAEA';
                                        }
                                        if ($tq->c3 == 1) {
                                            $warna3 = '#FFFF00';
                                        } else {
                                            $warna3 = '#EAEAEA';
                                        }
                                    ?>
                                        <tr align="center">
                                            <td bgcolor="<?php echo $warna1; ?>"><?php echo $tq->c1; ?></td>
                                            <td bgcolor="<?php echo $warna2; ?>"><?php echo $tq->c2; ?></td>
                                            <td bgcolor="<?php echo $warna3; ?>"><?php echo $tq->c3; ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </table>
                            </div>
                        <?php
                        }
                        ?>
                    </div><br>

                    <h3><strong>Hasil Iterasi Disetiap Daerah</strong></h3>

                    <div class="table-responsive">
                        <table id="table_data" class="table table-bordered table-admin">
                            <tr align="center">
                                <td>No. </td>
                                <td>Kelurahan</td>
                                <td>Zona Hijau</td>
                                <td>Zona Kuning</td>
                                <td>Zona Merah</td>
                            </tr>

                            <?php $no = 1;
                            foreach ($vaksin1 as $inv1) : ?>
                                <tr>
                                    <td align="center"><?= $no++ ?></td>
                                    <td align="center"><?= $inv1->nama_kelurahan ?></td>
                                    <td align="center"><?= $inv1->c1 ?></td>
                                    <td align="center"><?= $inv1->c2 ?></td>
                                    <td align="center"><?= $inv1->c3 ?></td>
                                </tr>
                            <?php endforeach; ?>

                        </table>
                    </div>

                </div>
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

<!-- javascript loading -->
<script>
    $(document).ready(function() {
        $(".preloader").fadeOut();
    })
</script>