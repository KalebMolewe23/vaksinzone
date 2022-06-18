<div class="container">
    <div class="forms-container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="<?= base_url('auth'); ?>" class="sign-in-form" method="post">
                    <h2 class="title">Sign in</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="email" placeholder="Username" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="Password" />
                    </div>
                    <input type="submit" class="btn solid" />
                </form>
                <form method="POST" action="<?= base_url('auth/register') ?>" class="sign-up-form">
                    <h2 class="title">Register</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="nama_user" placeholder="Nama Lengkap" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="text" name="kontak" placeholder="No. Telp" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" placeholder="Email" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password1" placeholder="Masukkan Password" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password2" placeholder="Konfirmasi Password" />
                    </div>
                    <input type="submit" class="btn" value="Sign up" />
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Tidak Memiliki Akun?</h3>
                    <p>Tekan Tombol DIbawah Ini</p>
                    <button class="btn transparent" id="sign-up-btn">Register</button>
                </div>

                <img src="<?= base_url("assets/img/icon/undraw_medical_research_qg4d.svg"); ?>" class="image" alt="">
            </div>

            <div class="panel right-panel">
                <div class="content">
                    <h3>Sudah Memiliki Akun?</h3>
                    <p>Login Sekarang</p>
                    <button class="btn transparent" id="sign-in-btn">Login</button>
                </div>

                <img src="<?= base_url("assets/img/icon/undraw_world_re_768g.svg"); ?>" class="image" alt="">
            </div>
        </div>

    </div>

    <script src="<?= base_url('assets/login/app.js'); ?>">