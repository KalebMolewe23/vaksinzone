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
        <span class="text"><i class='bx bxs-virus'></i> Data Vaksinasi</span>
    </div>

    <main>
        <div class="container">
            <br>
            <center>
                <h4><strong>Informasi Data Vaksinasi Kecamatan Lowokwaru </strong></h4>
            </center><br>

            <a href="<?= base_url('admin/data_vaksin') ?>"><button class="btn btn-primary" type="button"><i class='bx bx-plus-circle'></i> Tambah Data</button></a><br><br>

            <center><?= $this->session->flashdata('message') ?></center><br>

            <table class="table table-bordered table-striped" id="datatable">
                <thead>
                    <tr>
                        <th>
                            <center>No.</center>
                        </th>
                        <th>
                            <center>Kelurahan</center>
                        </th>
                        <th>
                            <center>Puskesmas</center>
                        </th>
                        <th>
                            <center>jumlah penduduk</center>
                        </th>
                        <th>
                            <center>Belum Vaksin G-1</center>
                        </th>
                        <th>
                            <center>Persentase G-1</center>
                        </th>
                        <th>
                            <center>Belum Vaksin G-2</center>
                        </th>
                        <th>
                            <center>Persentase G-2</center>
                        </th>
                        <th>
                            <center>Belum Vaksin G-3</center>
                        </th>
                        <th>
                            <center>Persentase G-3</center>
                        </th>
                        <th width="200px">
                            <center>Action</center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($vaksin as $inv) : ?>
                        <tr>
                            <td align="center"><?= $no++ ?></td>
                            <td align="center"><?= $inv->nama_kelurahan ?></td>
                            <td align="center"><?= $inv->nama_puskesmas ?></td>
                            <td align="center"><?= $inv->jumlah_penduduk ?></td>
                            <td align="center"><?= $inv->bvaksin_gel1 ?></td>
                            <td align="center"><?= number_format($inv->pers_vaksin_gel1) ?>%</td>
                            <td align="center"><?= $inv->bvaksin_gel2 ?></td>
                            <td align="center"><?= number_format($inv->pers_vaksin_gel2) ?>%</td>
                            <td align="center"><?= $inv->bvaksin_gel3 ?></td>
                            <td align="center"><?= number_format($inv->pers_vaksin_gel3) ?>%</td>
                            <td align="center">
                                <?= anchor('admin/editvaksin/' . $inv->id_vaksin, '<div class="btn btn-primary btn-sm"><i class="bx bx-edit" ></i> Ubah</div>') ?>
                                <?= anchor('admin/deletedatavaksin/' . $inv->id_vaksin, '<div class="btn btn-danger btn-sm"><i class="bx bxs-trash-alt"></i> Hapus</div>') ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').DataTable();
    });
</script>

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