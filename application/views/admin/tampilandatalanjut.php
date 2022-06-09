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
        <span class="text"><i class='bx bxs-home'></i> Home</span>
    </div>

    <main>

        <div class="container">
            <br>
            <center>
                <h4><strong>Informasi Data Vaksinasi Kecamatan Lowokwaru </strong></h4>
            </center><br>
        </div>

        <a class="btn btn-primary" href="<?= base_url("admin/interasi_lanjut"); ?>"><i class='bx bx-loader-circle'></i> Proses Iterasi Selanjutnya</a></br></br>
        </div>
        <?php


        $c1a = "";
        $c1b = "";
        $c1c = "";

        $c2a = "";
        $c2b = "";
        $c2c = "";

        $c3a = "";
        $c3b = "";
        $c3c = "";
        foreach ($centroid->result_array() as $c) {
            $c1a = $c['c1a'];
            $c1b = $c['c1b'];
            $c1c = $c['c1c'];

            $c2a = $c['c2a'];
            $c2b = $c['c2b'];
            $c2c = $c['c2c'];

            $c3a = $c['c3a'];
            $c3b = $c['c3b'];
            $c3c = $c['c3c'];
        }

        $c1a_b = "";
        $c1b_b = "";
        $c1c_b = "";

        $c2a_b = "";
        $c2b_b = "";
        $c2c_b = "";

        $c3a_b = "";
        $c3b_b = "";
        $c3c_b = "";

        $hc1 = 0;
        $hc2 = 0;
        $hc3 = 0;

        $no = 0;
        $arr_c1 = array();
        $arr_c2 = array();
        $arr_c3 = array();

        $arr_c1_temp = array();
        $arr_c2_temp = array();
        $arr_c3_temp = array();

        ?>
        <div class="table-responsive">
            <table id="table_data" class="table table-bordered table-admin">
                <tr align="center">
                    <td rowspan="2">No.</td>
                    <td rowspan="2">Nama Puskesmas</td>
                    <td rowspan="2">Kelurahan</td>
                    <td rowspan="2">Belum Vaksin G-1</td>
                    <td rowspan="2">Belum Vaksin G-2</td>
                    <td rowspan="2">Belum Vaksin G-3</td>
                    <td colspan="3">Centroid 1</td>
                    <td colspan="3">Centroid 2</td>
                    <td colspan="3">Centroid 3</td>
                    <td rowspan="2">C1</td>
                    <td rowspan="2">C2</td>
                    <td rowspan="2">C3</td>
                </tr>
                <tr align="center">
                    <td><?php echo $c1a; ?></td>
                    <td><?php echo $c1b; ?></td>
                    <td><?php echo $c1c; ?></td>
                    <td><?php echo $c2a; ?></td>
                    <td><?php echo $c2b; ?></td>
                    <td><?php echo $c2c; ?></td>
                    <td><?php echo $c3a; ?></td>
                    <td><?php echo $c3b; ?></td>
                    <td><?php echo $c3c; ?></td>
                </tr>
                <?php
                foreach ($data_vaksin->result_array() as $s) { ?>
                    <tr>
                        <td><?php echo $s['id_vaksin']; ?></td>
                        <td><?php echo $s['nama_puskesmas']; ?></td>
                        <td><?php echo $s['nama_kelurahan']; ?></td>
                        <td><?php echo $s['bvaksin_gel1']; ?></td>
                        <td><?php echo $s['bvaksin_gel2']; ?></td>
                        <td><?php echo $s['bvaksin_gel3']; ?></td>

                        <td colspan="3"><?php
                                        $hc1 = sqrt(pow(($s['bvaksin_gel1'] - $c1a), 2) + pow(($s['bvaksin_gel2'] - $c1b), 2) + pow(($s['bvaksin_gel3'] - $c1c), 2));
                                        echo $hc1;
                                        ?></td>
                        <td colspan="3"><?php
                                        $hc2 = sqrt(pow(($s['bvaksin_gel1'] - $c2a), 2) + pow(($s['bvaksin_gel2'] - $c2b), 2) + pow(($s['bvaksin_gel3'] - $c2c), 2));
                                        echo $hc2;
                                        ?></td>
                        <td colspan="3"><?php
                                        $hc3 = sqrt(pow(($s['bvaksin_gel1'] - $c3a), 2) + pow(($s['bvaksin_gel2'] - $c3b), 2) + pow(($s['bvaksin_gel3'] - $c3c), 2));
                                        echo $hc3;
                                        ?></td>
                        <?php

                        if ($hc1 <= $hc2) {
                            if ($hc1 <= $hc3) {
                                $arr_c1[$no] = 1;
                            } else {
                                $arr_c1[$no] = '0';
                            }
                        } else {
                            $arr_c1[$no] = '0';
                        }

                        if ($hc2 <= $hc1) {
                            if ($hc2 <= $hc3) {
                                $arr_c2[$no] = 1;
                            } else {
                                $arr_c2[$no] = '0';
                            }
                        } else {
                            $arr_c2[$no] = '0';
                        }

                        if ($hc3 <= $hc1) {
                            if ($hc3 <= $hc2) {
                                $arr_c3[$no] = 1;
                            } else {
                                $arr_c3[$no] = '0';
                            }
                        } else {
                            $arr_c3[$no] = '0';
                        }

                        $arr_c1_temp[$no] = $s['bvaksin_gel1'];
                        $arr_c2_temp[$no] = $s['bvaksin_gel2'];
                        $arr_c3_temp[$no] = $s['bvaksin_gel3'];

                        $warna1 = "";
                        $warna2 = "";
                        $warna3 = "";
                        ?>
                        <?php if ($arr_c1[$no] == 1) {
                            $warna1 = '#FFFF00';
                        } else {
                            $warna1 = '#ccc';
                        } ?><td bgcolor="<?php echo $warna1; ?>"><?php echo $arr_c1[$no]; ?></td>
                        <?php if ($arr_c2[$no] == 1) {
                            $warna2 = '#FFFF00';
                        } else {
                            $warna2 = '#ccc';
                        } ?><td bgcolor="<?php echo $warna2; ?>"><?php echo $arr_c2[$no]; ?></td>
                        <?php if ($arr_c3[$no] == 1) {
                            $warna3 = '#FFFF00';
                        } else {
                            $warna3 = '#ccc';
                        } ?><td bgcolor="<?php echo $warna3; ?>"><?php echo $arr_c3[$no]; ?></td>
                    </tr>
                <?php
                    $q = "insert into centroid_temp(iterasi,id_vaksin,c1,c2,c3) values('" . $id . "','" . $s['id_vaksin'] . "','" . $arr_c1[$no] . "','" . $arr_c2[$no] . "','" . $arr_c3[$no] . "')";
                    $this->db->query($q);

                    $no++;
                }

                //centroid baru 1.a
                $jum = 0;
                $arr = array();
                for ($i = 0; $i < count($arr_c1); $i++) {
                    $arr[$i] = $arr_c1_temp[$i] * $arr_c1[$i];
                    if ($arr_c1[$i] == 1) {
                        $jum++;
                    }
                }
                $c1a_b = array_sum($arr) / $jum;

                //centroid baru 1.b
                $jum = 0;
                $arr = array();
                for ($i = 0; $i < count($arr_c2); $i++) {
                    $arr[$i] = $arr_c2_temp[$i] * $arr_c1[$i];
                    if ($arr_c1[$i] == 1) {
                        $jum++;
                    }
                }
                $c1b_b = array_sum($arr) / $jum;

                //centroid baru 1.c
                $jum = 0;
                $arr = array();
                for ($i = 0; $i < count($arr_c3); $i++) {
                    $arr[$i] = $arr_c3_temp[$i] * $arr_c1[$i];
                    if ($arr_c1[$i] == 1) {
                        $jum++;
                    }
                }
                $c1c_b = array_sum($arr) / $jum;




                //centroid baru 2.a
                $jum = 0;
                $arr = array();
                for ($i = 0; $i < count($arr_c1); $i++) {
                    $arr[$i] = $arr_c1_temp[$i] * $arr_c2[$i];
                    if ($arr_c2[$i] == 1) {
                        $jum++;
                    }
                }
                $c2a_b = array_sum($arr) / $jum;



                //centroid baru 2.b
                $jum = 0;
                $arr = array();
                for ($i = 0; $i < count($arr_c2); $i++) {
                    $arr[$i] = $arr_c2_temp[$i] * $arr_c2[$i];
                    if ($arr_c2[$i] == 1) {
                        $jum++;
                    }
                }
                $c2b_b = array_sum($arr) / $jum;

                //centroid baru 2.c
                $jum = 0;
                $arr = array();
                for ($i = 0; $i < count($arr_c3); $i++) {
                    $arr[$i] = $arr_c3_temp[$i] * $arr_c2[$i];
                    if ($arr_c2[$i] == 1) {
                        $jum++;
                    }
                }
                $c2c_b = array_sum($arr) / $jum;




                //centroid baru 3.a
                $jum = 0;
                $arr = array();
                for ($i = 0; $i < count($arr_c1); $i++) {
                    $arr[$i] = $arr_c1_temp[$i] * $arr_c3[$i];
                    if ($arr_c3[$i] == 1) {
                        $jum++;
                    }
                }
                $c3a_b = array_sum($arr) / $jum;

                //centroid baru 3.b
                $jum = 0;
                $arr = array();
                for ($i = 0; $i < count($arr_c2); $i++) {
                    $arr[$i] = $arr_c2_temp[$i] * $arr_c3[$i];
                    if ($arr_c3[$i] == 1) {
                        $jum++;
                    }
                }
                $c3b_b = array_sum($arr) / $jum;

                //centroid baru 3.c
                $jum = 0;
                $arr = array();
                for ($i = 0; $i < count($arr_c3); $i++) {
                    $arr[$i] = $arr_c3_temp[$i] * $arr_c3[$i];
                    if ($arr_c3[$i] == 1) {
                        $jum++;
                    }
                }
                $c3c_b = array_sum($arr) / $jum;


                $q = "insert into hasil_centroid(c1a,c1b,c1c,c2a,c2b,c2c,c3a,c3b,c3c) values('" . $c1a_b . "','" . $c1b_b . "','" . $c1c_b . "','" . $c2a_b . "','" . $c2b_b . "','" . $c2c_b . "','" . $c3a_b . "','" .
                    $c3b_b . "','" . $c3c_b . "')";
                $this->db->query($q);

                ?>
            </table>
        </div>
    </main>
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