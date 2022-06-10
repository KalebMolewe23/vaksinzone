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
        <span class="text"><i class='bx bx-plus-medical'></i> Edit Data Puskesmas</span>
    </div>

    <main>
        <div class="container">
            <br>
            <center>
                <h4><strong> Tambah Daerah Vaksinasi </strong></h4>
            </center><br>

            <?php foreach ($daerah as $w) : ?>

                <form action=<?= base_url('admin/edit_daerah') ?> method="post">

                    <input type="hidden" name="id_info" class="form-control" value="<?= $w->id_info ?>">

                    <div class="form_group">
                        <label>Puskesmas</label>
                        <select class="form-control selectric" name="id_puskesmas" id="id_puskesmas" value="<?= $w->id_puskesmas ?>" required>
                            <option value="">-Pilih Puskesmas-</option>
                            <?php
                            echo "<option value='" . $w->id_puskesmas . "'>" . $w->nama_puskesmas . "</option>";
                            ?>
                        </select>
                        <?= form_error('id_puskesmas', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <div class="form_group">
                        <label>Kelurahan</label>
                        <select name="id_kelurahan" id="id_kelurahan" class="form-control" value="<?= $w->id_kelurahan ?>" required>
                        </select>
                        <?= form_error('id_Kelurahan', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <div class="form_group">
                        <label>Alamat</label>
                        <input class="form-control selectric" type="text" value="<?= $w->alamat ?>" name="alamat" required />
                        <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <div class="form_group">
                        <label>Kode Pose</label>
                        <input class="form-control selectric" type="text" value="<?= $w->kode_pos ?>" name="kode_pos" required />
                        <?= form_error('kode_pos', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    </br>

                    <div class="form_group">
                        <button type="submit" class="btn btn-success"><i class='bx bxs-edit-alt'></i> Simpan</button>
                    </div>

                </form>
                <br>

            <?php endforeach; ?>

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
    $(document).ready(function() {
        $("#id_kelurahan").hide();

        loadkelurahan();
    });

    function loadkelurahan() {
        $("#id_puskesmas").change(function() {
            var getpuskesmas = $("#id_puskesmas").val();

            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "<?= base_url("admin/getdatakelurahan") ?>",
                data: {
                    puskesmas: getpuskesmas
                },
                success: function(data) {
                    console.log(data);

                    var html = "";
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].id_kelurahan + '">' + data[i].nama_kelurahan + '</option>';
                    }

                    $("#id_kelurahan").html(html);
                    $("#id_kelurahan").show();

                }
            });

        });
    }
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