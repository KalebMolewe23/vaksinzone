    <div id="app">
        <section class="section">
            <div class="d-flex flex-wrap align-items-stretch">
                <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
                    <div class="p-4 m-3">
                        <img src="<?= base_url('assets/img/logovaksin.jpg') ?>" alt="logo" width="200" class="shadow-light rounded-circle mb-5 mt-2">
                        <h4 class="text-dark font-weight-normal">Welcome to <span class="font-weight-bold">vaksinzone.com</span></h4>
                        <p class="text-muted">Informasi vaksinasi untuk daerah kecamatan lowokwaru Malang, Jawa Timur.</p>

                        <?= $this->session->flashdata('message') ?>

                        <form class="user" method="post" action="<?= base_url('auth'); ?>">

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="text" class="form-control" name="email" value="<?= set_value('email'); ?>">
                                <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="password" class="control-label">Password</label>
                                <input type="password" class="form-control form-control-user" id="password" name="password">
                                <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                            </div>

                            <div class="form-group text-right">

                                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right">
                                    Login
                                </button>
                            </div>

                            <div class="mt-5 text-center">
                                Belum Punya Akun? <a href="<?= base_url('auth/register'); ?>">klik disini</a>
                            </div>
                        </form>

                        <div class="text-center mt-5 text-small">
                            Copyright &copy; vaksinzone lowokwaru 💙 kota malang,jawa timur
                            <div class="mt-2">
                                <a href="#">Privacy Policy</a>
                                <div class="bullet"></div>
                                <a href="#">Terms of Service</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="<?= base_url('assets/img/unsplash/vaksinasi.jpg') ?>">
                    <div class="absolute-bottom-left index-2">
                        <div class="text-light p-5 pb-2">
                            <div class="mb-5 pb-3">
                                <h1 class="mb-2 display-4 font-weight-bold">Salam Sehat</h1>
                                <h5 class="font-weight-normal text-muted-transparent">Malang, Jawa Timur</h5>
                            </div>
                            Photo by <a class="text-light bb" target="_blank" href="http://localhost/vaksinzone/">Peduli Lindungi</a> on <a class="text-light bb" target="_blank" href="http://localhost/vaksinzone/">Opank</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>