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
        <span class="text"><i class='bx bxs-virus'></i> Edit Data Vaksinasi</span>
    </div>

    <main>

        <div class="container">
            <br>
            <center>
                <h4><strong>Edit Informasi Daerah Vaksinasi Kecamatan Lowokwaru</strong></h4>
            </center><br>

            <?php foreach ($daerah as $w) : ?>

                <form action=<?= base_url('admin/update') ?> method="post">

                    <input type="hidden" name="id_vaksin" class="form-control" value="<?= $w->id_vaksin ?>">

                    <div class="form_group">
                        <label>Puskesmas</label>
                        <select class="form-control selectric" name="id_puskesmas" id="id_puskesmas" required>
                            <option value="">-Pilih Puskesmas-</option>
                            <?php
                            echo "<option value='" . $w->id_puskesmas . "'>" . $w->nama_puskesmas . "</option>";
                            ?>
                        </select>
                    </div>

                    <div class="form_group">
                        <label>Kelurahan</label>
                        <select name="id_kelurahan" id="id_kelurahan" class="form-control" required>
                        </select>
                    </div>

                    <div class="form_group">
                        <label>Jumlah Penduduk</label>
                        <input class="form-control selectric" type="text" name="jumlah_penduduk" id="jumlah_penduduk" value="<?= $w->jumlah_penduduk ?>" required />
                    </div>

                    <div class="form_group">
                        <label>Vaksin Gelombang 1</label>
                        <input class="form-control selectric" type="text" name="vaksin_gel1" id="vaksin_gel1" value="<?= $w->vaksin_gel1 ?>" required />
                    </div>

                    <div class="form_group">
                        <label>Vaksin Gelombang 2</label>
                        <input class="form-control selectric" type="text" name="vaksin_gel2" id="vaksin_gel2" value="<?= $w->vaksin_gel2 ?>" required />
                    </div>

                    <div class="form_group">
                        <label>Vaksin Gelombang 3</label>
                        <input class="form-control selectric" type="text" name="vaksin_gel3" id="vaksin_gel3" value="<?= $w->vaksin_gel3 ?>" required />
                    </div>

                    <div class="form_group">
                        <input class="form-control selectric" type="hidden" name="pers_vaksin_gel1" id="pers_vaksin_gel1" value="<?= $w->pers_vaksin_gel1 ?>" required />
                    </div>

                    <div class="form_group">
                        <input class="form-control selectric" type="hidden" name="pers_vaksin_gel2" id="pers_vaksin_gel2" value="<?= $w->pers_vaksin_gel2 ?>" required />
                    </div>

                    <div class="form_group">
                        <input class="form-control selectric" type="hidden" name="pers_vaksin_gel3" id="pers_vaksin_gel3" value="<?= $w->pers_vaksin_gel3 ?>" required />
                    </div>

                    <div class="form_group">
                        <input class="form-control selectric" type="hidden" name="bvaksin_gel1" id="bvaksin_gel1" value="<?= $w->bvaksin_gel1 ?>" required />
                    </div>

                    <div class="form_group">
                        <input class="form-control selectric" type="hidden" name="bvaksin_gel2" id="bvaksin_gel2" value="<?= $w->bvaksin_gel2 ?>" required />
                    </div>

                    <div class="form_group">
                        <input class="form-control selectric" type="hidden" name="bvaksin_gel3" id="bvaksin_gel3" value="<?= $w->bvaksin_gel3 ?>" required />
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

<script type="text/javascript">
    $(document).ready(function() {
        $("#jumlah_penduduk, #vaksin_gel1, #vaksin_gel2, #vaksin_gel3, #pers_vaksin_gel1, #pers_vaksin_gel2, #pers_vaksin_gel3").keyup(function() {
            var jumlah_penduduk = $("#jumlah_penduduk").val();
            var vaksin_gel1 = $("#vaksin_gel1").val();
            var vaksin_gel2 = $("#vaksin_gel2").val();
            var vaksin_gel3 = $("#vaksin_gel3").val();

            var pers_vaksin_gel1 = ((vaksin_gel1) / (jumlah_penduduk)) * 100;
            $("#pers_vaksin_gel1").val(pers_vaksin_gel1);
            var pers_vaksin_gel2 = ((vaksin_gel2) / (jumlah_penduduk)) * 100;
            $("#pers_vaksin_gel2").val(pers_vaksin_gel2);
            var pers_vaksin_gel3 = ((vaksin_gel3) / (jumlah_penduduk)) * 100;
            $("#pers_vaksin_gel3").val(pers_vaksin_gel3);

            var bvaksin_gel1 = (jumlah_penduduk) - (vaksin_gel1);
            $("#bvaksin_gel1").val(bvaksin_gel1);
            var bvaksin_gel2 = (jumlah_penduduk) - (vaksin_gel2);
            $("#bvaksin_gel2").val(bvaksin_gel2);
            var bvaksin_gel3 = (jumlah_penduduk) - (vaksin_gel3);
            $("#bvaksin_gel3").val(bvaksin_gel3);
        });
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