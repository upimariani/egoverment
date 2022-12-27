<!-- Contact Start -->
<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-3 text-white mb-4 animated slideInDown">Pengajuan Surat</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Surat Keterangan Status Kawin</a></li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-12 wow fadeIn" data-wow-delay="0.1s">
                <p class="fs-5 fw-bold text-primary">Pengajuan Surat</p>
                <h1 class="display-5 mb-5">Keterangan Status Kawin</h1>
                <?php
                if ($this->session->userdata('error')) {
                ?>
                    <p class="text-danger"><?= $this->session->userdata('error') ?></p>
                <?php
                }
                ?>
                <p class="mb-4">Silahkan mengisi data pengajuan surat keterangan status kawin</p>
                <form action="<?= base_url('Masyarakat/cMenikah/daftar/' . $domisili->id_masyarakat) ?>" method="POST">
                    <h3>STATUS KAWIN</h3>
                    <hr>
                    <div class="row g-3">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <select name="status" id="name" class="form-control" required>
                                    <option value="Belum Kawin">1. Belum Kawin</option>
                                    <option value="Sudah Menikah">2. Sudah Menikah</option>
                                    <option value="Cerai Mati">3. Cerai Mati</option>
                                    <option value="Cerai Hidup">4. Cerai Hidup</option>
                                </select>
                                <label for="name">Status Kawin</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary py-3 px-4" type="submit">Daftar</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- Contact End -->