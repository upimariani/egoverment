<!-- Contact Start -->
<!-- Contact Start -->
<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-3 text-white mb-4 animated slideInDown">Login Masyarakat</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Login</a></li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <p class="fs-5 fw-bold text-primary">Login Masyarakat</p>
                <h1 class="display-5 mb-5">Login</h1>
                <?php
                if ($this->session->userdata('error')) {
                ?>
                    <p class="text-danger"><?= $this->session->userdata('error') ?></p>
                <?php
                }
                ?>
                <p class="mb-4">Silahkan melakukan login sebelum melakukan pengajuan surat</p>
                <form action="<?= base_url('Masyarakat/cLogin/login') ?>" method="POST">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" name="nik" class="form-control" id="name" placeholder="Masukkan NIK anda" required>
                                <label for="name">NIK</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary py-3 px-4" type="submit">Login</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- Contact End -->