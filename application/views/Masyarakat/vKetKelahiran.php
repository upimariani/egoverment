<!-- Contact Start -->
<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-3 text-white mb-4 animated slideInDown">Pengajuan Surat</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Surat Keterangan Kelahiran</a></li>
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
                <h1 class="display-5 mb-5">Keterangan Kelahiran</h1>
                <?php
                if ($this->session->userdata('error')) {
                ?>
                    <p class="text-danger"><?= $this->session->userdata('error') ?></p>
                <?php
                }
                ?>
                <p class="mb-4">Silahkan mengisi data pengajuan surat keterangan kelahiran</p>
                <form action="<?= base_url('Masyarakat/cKetLahir/daftar/' . $domisili->id_masyarakat) ?>" method="POST">
                    <h3>BAYI/ANAK</h3>
                    <hr>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="nama_bayi" id="name" class="form-control" required>
                                <label for="name">Nama Bayi</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select name="jk" class="form-control" id="name" required>
                                    <option value="1">Laki - Laki</option>
                                    <option value="2">Perempuan</option>
                                </select>
                                <label for="name">Jenis Kelamin Bayi</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select name="tmpt_dilahirkan" id="name" class="form-control" required>
                                    <option value="1">1. RS</option>
                                    <option value="2">2. Puskesmas</option>
                                    <option value="3">3. Polindes</option>
                                    <option value="4">4. Rumah</option>
                                    <option value="5">5. Lainnya</option>
                                </select>
                                <label for="name">Tempat Dilahirkan</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="tmpt_kelahiran" id="name" class="form-control" required>
                                <label for="name">Tempat Kelahirkan</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="ttl" id="name" class="form-control" required>
                                <label for="name">Hari dan Tanggal Lahir</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="pukul" id="name" class="form-control" required>
                                <label for="name">Pukul</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select name="jenis_kelahiran" id="name" class="form-control" required>
                                    <option value="1">1. Tunggal</option>
                                    <option value="2">2. Kembar 2</option>
                                    <option value="3">3. Kembar 3</option>
                                    <option value="4">4. Kembar 5</option>
                                    <option value="5">5. Lainnya</option>
                                </select>
                                <label for="name">Jenis Kelahiran</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select name="kelahiran_ke" id="name" class="form-control" required>
                                    <option value="1">1.</option>
                                    <option value="2">2.</option>
                                    <option value="3">3.</option>
                                    <option value="4">4.</option>
                                </select>
                                <label for="name">Kelahiran Ke</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <select name="penolong" id="name" class="form-control" required>
                                    <option value="1">1. Dokter</option>
                                    <option value="2">2. Bidan/Perawat</option>
                                    <option value="3">3. Dukun</option>
                                    <option value="4">4. Lainnya</option>
                                </select>
                                <label for="name">Penolong Kelahiran</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" id="name" name="berat" class="form-control" required>
                                <label for="name">Berat Bayi</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" id="name" name="panjang" class="form-control" required>
                                <label for="name">Panjang Bayi</label>
                            </div>
                        </div>
                        <h3>STATUS PERNIKAHAN</h3>
                        <hr>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" id="name" name="tgl_kawin" class="form-control" required>
                                <label for="name">Tanggal Pencatatan Perkawinan</label>
                            </div>
                        </div>
                        <h3>SAKSI I</h3>
                        <hr>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="nik_1" id="name" class="form-control" required>
                                <label for="name">NIK</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="nama_saksi1" id="name" class="form-control" required>
                                <label for="name">Nama Lengkap</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="umur_1" id="name" class="form-control" required>
                                <label for="name">Umur</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="pekerjaan_1" id="name" class="form-control" required>
                                <label for="name">Pekerjaan</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" name="alamat_1" id="name" class="form-control" required>
                                <label for="name">Alamat</label>
                            </div>
                        </div>
                        <h3>SAKSI II</h3>
                        <hr>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="nik_2" id="name" class="form-control" required>
                                <label for="name">NIK</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="nama_saksi2" id="name" class="form-control" required>
                                <label for="name">Nama Lengkap</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="umur_2" id="name" class="form-control" required>
                                <label for="name">Umur</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="pekerjaan_2" id="name" class="form-control" required>
                                <label for="name">Pekerjaan</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" name="alamat_2" id="name" class="form-control" required>
                                <label for="name">Alamat</label>
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