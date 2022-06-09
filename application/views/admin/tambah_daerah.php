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
                <h4><strong> Tambah Daerah Vaksinasi </strong></h4>
            </center><br>

            <form action=<?= base_url('admin/tambah_daerah') ?> method="post">

                <div class="form_group">
                    <label>Puskesmas</label>
                    <select class="form-control selectric" name="id_puskesmas" id="id_puskesmas" required>
                        <option value="">-Pilih Puskesmas-</option>
                        <?php
                        foreach ($lowokwaru as $data1) {
                            echo "<option value='" . $data1->id_puskesmas . "'>" . $data1->nama_puskesmas . "</option>";
                        }
                        ?>
                    </select>
                    <?= form_error('id_puskesmas', '<small class="text-danger">', '</small>'); ?>
                </div>

                <div class="form_group">
                    <label>Kelurahan</label>
                    <select name="id_kelurahan" id="id_kelurahan" class="form-control" required>
                    </select>
                    <?= form_error('id_Kelurahan', '<small class="text-danger">', '</small>'); ?>
                </div>

                <div class="form_group">
                    <label>Alamat</label>
                    <input class="form-control selectric" type="text" value="<?= set_value('alamat'); ?>" name="alamat" required />
                    <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                </div>

                <div class="form_group">
                    <label>Kode Pose</label>
                    <input class="form-control selectric" type="text" value="<?= set_value('kode_pos'); ?>" name="kode_pos" required />
                    <?= form_error('kode_pos', '<small class="text-danger">', '</small>'); ?>
                </div>

                </br>

                <div class="form_group">
                    <button type="submit" class="btn btn-success"><i class='bx bxs-save'></i> Simpan</button>
                </div>

            </form>
            <br>

        </div>
    </main>
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