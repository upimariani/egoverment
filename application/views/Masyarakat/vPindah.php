<!-- Contact Start -->
<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-3 text-white mb-4 animated slideInDown">Pengajuan Surat</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Surat Pindah</a></li>
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
                <h1 class="display-5 mb-5">Keterangan Pindah</h1>
                <?php
                if ($this->session->userdata('error')) {
                ?>
                    <p class="text-danger"><?= $this->session->userdata('error') ?></p>
                <?php
                }
                ?>
                <p class="mb-4">Silahkan mengisi data pengajuan surat keterangan pindah</p>
                <form action="<?= base_url('Masyarakat/cPindah/daftar/' . $domisili->id_masyarakat) ?>" method="POST">
                    <h3>DATA KEPINDAHAN</h3>
                    <hr>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select name="alasan" class="form-control" required>
                                    <option value="1">1. Pekerjaan</option>
                                    <option value="2">2. Pendidikan</option>
                                    <option value="3">3. Keamanan</option>
                                    <option value="4">4. Kesehatan</option>
                                    <option value="5">5. Perumahan</option>
                                    <option value="6">6. Keluarga</option>
                                    <option value="7">7. Lainnya</option>
                                </select>
                                <label for="name">Alasan Pindah</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="alamat" class="form-control" required>
                                <label for="name">Alamat Tujuan</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="rt" class="form-control" required>
                                <label for="name">RT</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="rw" class="form-control" required>
                                <label for="name">RW</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="desa" class="form-control" required>
                                <label for="name">Desa/Kelurahan</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="kec" class="form-control" required>
                                <label for="name">Kecamatan</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="kab" class="form-control" required>
                                <label for="name">Kabupaten</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="prov" class="form-control" required>
                                <label for="name">Provinsi</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="kode_pos" class="form-control" required>
                                <label for="name">Kode Pos</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select name="jenis" class="form-control" required>
                                    <option value="1">Kep. Keluarga</option>
                                    <option value="2">Kep. Keluarga dan Seluruh Anggota</option>
                                    <option value="2">Kep. Keluarga dan Sebagian Anggota</option>
                                    <option value="2">Anggota Keluarga</option>
                                </select>
                                <label for="name">Jenis Pindah</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select name="stat_tidak" class="form-control" required>
                                    <option value="1">1. Numpang KK</option>
                                    <option value="2">2. Membuat KK Baru</option>
                                    <option value="3">3. Nomor KK Tetap</option>
                                </select>
                                <label for="name">Status Kartu Keluarga yang Tidak Pindah</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select name="stat_iya" class="form-control" required>
                                    <option value="1">1. Numpang KK</option>
                                    <option value="2">2. Membuat KK Baru</option>
                                    <option value="3">3. Nomor KK Tetap</option>
                                </select>
                                <label for="name">Status Kartu Keluarga yang Pindah</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <select name="antar" class="form-control" required>
                                    <option value="1">1. Antar Desa</option>
                                    <option value="2">2. Antar Kecamatan</option>
                                    <option value="3">3. Antar Provinsi</option>
                                </select>
                                <label for="name">Permohonan Pindah Antar</label>
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