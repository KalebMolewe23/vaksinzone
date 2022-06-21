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
        <span class="text"><i class='bx bx-windows'></i> Setting Sosmed</span>
    </div>

    <main>
        <section class="section-p1">
        
            <table class="table table-bordered table-striped" id="datatable">
                <thead>
                    <tr>
                        <th>
                            <center>No.</center>
                        </th>
                        <th>
                            <center>Header 1</center>
                        </th>
                        <th>
                            <center>Header 2</center>
                        </th>
                        <th>
                            <center>Title</center>
                        </th>
                        <th>
                            <center>Body</center>
                        </th>
                        <th>
                            <center>Footer</center>
                        </th>
                        <th>
                            <center>Marquee</center>
                        </th>
                        <th width="200px">
                            <center>Action</center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($tentang as $value) { ?>
                        <tr>
                            <td align="center"><?= $no++ ?></td>
                            <td align="center"><?= $value->header1 ?></td>
                            <td align="center"><?= $value->header2 ?></td>
                            <td align="center"><?= $value->title ?></td>
                            <td align="center"><?= $value->body ?></td>
                            <td align="center"><?= $value->footer ?></td>
                            <td align="center"><?= $value->marquee ?></td>
                            <td align="center">
                                <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal_edit_sosmed" href="<?= base_url('admin/editsosmed/' . $value->id_about) ?>"><strong><i class='bx bx-plus-circle'></i>Edit</strong></button></a><br><br>
                                <?= anchor('admin/deletesosmed/' . $value->id_about, '<div class="btn btn-danger btn-sm"><i class="bx bxs-trash-alt"></i> Hapus</div>') ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <!-- ============ MODAL ADD SOSMED =============== -->
            <div class="modal fade" id="modal_add_new" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="myModalLabel">Tambah Sosmed</h3>
                        </div>
                        <form class="form-horizontal" method="post" action="<?= base_url('admin/simpan_sosmed'); ?>">
                            <div class="modal-body">

                                <div class="form-group">
                                    <label class="control-label col-xs-3">Nama Social Media</label>
                                    <div class="col-xs-8">
                                        <input name="nama_sosmed" class="form-control" type="text" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-xs-3">Link Social Media</label>
                                    <div class="col-xs-8">
                                        <input name="link" class="form-control" type="text" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-xs-3">Icon</label>
                                    <div class="col-xs-8">
                                        <select name="icon" class="form-control" required>
                                            <option value="">-Pilih Icon-</option>
                                            <option value="fab fa-facebook">Facebook</option>
                                            <option value="fab fa-twitter">Twitter</option>
                                            <option value="fab fa-instagram">Instagram</option>
                                            <option value="fab fa-pinterest-p">Pinterest</option>
                                            <option value="fab fa-youtube">Youtube</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-xs-3">Status</label>
                                    <div class="col-xs-8">
                                        <select name="status" class="form-control" required>
                                            <option value="">-Status-</option>
                                            <option value="1">Aktif</option>
                                            <option value="0">Tidak Aktif</option>
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                                <button class="btn btn-info">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--END MODAL ADD SOSMED-->

            <!-- ============ MODAL EDIT SOSMED =============== -->
            <div class="modal fade" id="modal_edit_sosmed" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="myModalLabel">Tambah Sosmed</h3>
                        </div>
                        <form class="form-horizontal" method="post" action="<?= base_url('admin/editsosmed'); ?>">
                            <div class="modal-body">

                                <div class="form-group">
                                    <label class="control-label col-xs-3">Nama Social Media</label>
                                    <div class="col-xs-8">
                                        <input name="nama_sosmed" class="form-control" type="text" value="<?= $value->nama_sosmed ?>" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-xs-3">Link Social Media</label>
                                    <div class="col-xs-8">
                                        <input name="link" class="form-control" type="text" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-xs-3">Icon</label>
                                    <div class="col-xs-8">
                                        <select name="icon" class="form-control" required>
                                            <option value="">-Pilih Icon-</option>
                                            <option value="fab fa-facebook">Facebook</option>
                                            <option value="fab fa-twitter">Twitter</option>
                                            <option value="fab fa-instagram">Instagram</option>
                                            <option value="fab fa-pinterest-p">Pinterest</option>
                                            <option value="fab fa-youtube">Youtube</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-xs-3">Status</label>
                                    <div class="col-xs-8">
                                        <select name="status" class="form-control" required>
                                            <option value="">-Status-</option>
                                            <option value="1">Aktif</option>
                                            <option value="0">Tidak Aktif</option>
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                                <button class="btn btn-info">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--END MODAL EDIT SOSMED-->

        </section>
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