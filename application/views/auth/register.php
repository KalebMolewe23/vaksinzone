<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    <div class="login-brand">
                        <img src="<?= base_url('assets/img/logovaksin.jpg') ?>" alt="logo" width="300" class="shadow-light rounded-circle">
                    </div>

                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Register</h4>
                        </div>

                        <div class="card-body">
                            <form method="POST" class="user" action="<?= base_url('auth/register') ?>">
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="nama_user">Nama Lengkap</label>
                                        <input id="nama_user" type="text" class="form-control" name="nama_user" value="<?= set_value('nama_user'); ?>" autofocus>
                                        <?= form_error('nama_user', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="kontak">No. Telp</label>
                                        <input id="kontak" type="text" class="form-control" name="kontak" value="<?= set_value('kontak'); ?>">
                                        <?= form_error('kontak', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control" name="email" value="<?= set_value('email'); ?>">
                                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                    <div class="invalid-feedback">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="password1" class="d-block">Password</label>
                                        <input id="password1" type="password" class="form-control" name="password1">
                                        <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="password2" class="d-block">Password Confirmation</label>
                                        <input id="password2" type="password" class="form-control" name="password2">
                                    </div>
                                </div>

                                <div class="form-divider">
                                    Lokasi Rumah
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label>Kecamatan</label>
                                        <select class="form-control selectric" name="id_kecamatan" id="id_kecamatan" required>
                                            <option value="1">Lowokwaru</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Keluarahan</label>
                                        <select class="form-control selectric" name="id_kelurahan" id="id_kelurahan" required>
                                            <option value="">-Pilih Kelurahan-</option>
                                            <?php
                                            foreach ($kecamatan as $data) {
                                                echo "<option value='" . $data->id_kelurahan . "'>" . $data->nama_kelurahan . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label>Alamat</label>
                                        <input type="text" class="form-control" name="alamat" value="<?= set_value('alamat'); ?>">
                                        <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Kode Pos</label>
                                        <input type="text" class="form-control" name="kode_pos" value="<?= set_value('kode_pos'); ?>">
                                        <?= form_error('kode_pos', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <a href="<?= base_url('auth'); ?>">Sudah Memiliki Akun?</a>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Register
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="simple-footer">
                        Copyright &copy; Stisla 2018
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="<?php echo base_url("js/jquery.min.js"); ?>" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $("#loading").hide();

        $("#id_kecamatan").change(function() {
            $("#id_kelurahan").val().hide();
            $("#loading").show();

            $.ajax({
                type: "POST",
                url: "<?php echo base_url("auth/get_kelurahan"); ?>",
                data: {
                    id_kecamatan: $("#id_kecamatan").val()
                },
                dataType: "json",
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response) {
                    $("#loading").hide();
                    $("#id_kelurahan").html(response.list_kelurahan).show();
                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error          
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error        
                }
            });
        });
    });
</script>