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
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Kartu Keluarga</th>
                            <th>Atas Nama Pemohon</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Data Bayi</th>
                            <th>Kelahiran</th>
                            <th>Tgl. Perkawinan</th>
                            <th>Saksi</th>
                            <th>Status Pengajuan</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($status['ket_lahir'] as $key => $value) {
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value->no_kk ?></td>
                                <td><?= $value->nama_lengkap ?></td>
                                <td><?= $value->create_kel ?></td>
                                <td><strong><?= $value->nama_bayi ?></strong><br>
                                    <?php if ($value->jk_bayi == '1') {
                                        echo 'Laki - Laki';
                                    } else {
                                        echo 'Perempuan';
                                    } ?><br>
                                    <?= $value->hari_tgl_lahir ?><br>
                                    <?= $value->pukul ?>
                                </td>
                                <td><?php if ($value->jenis_kel == '1') {
                                        echo 'Tunggal';
                                    } else if ($value->jenis_kel == '2') {
                                        echo 'Kembar 2';
                                    } else if ($value->jenis_kel == '3') {
                                        echo 'Kembar 3';
                                    } else if ($value->jenis_kel == '4') {
                                        echo 'Kembar 4';
                                    } else {
                                        echo 'Lainnya';
                                    } ?>
                                    <br>
                                    <strong>Anak ke- <?= $value->kelahiran_ke ?></strong>
                                </td>
                                <td>
                                    <?= $value->tgl_perkawinan
                                    ?>

                                </td>
                                <td>Saksi 1 : <?= $value->nik_saksi_satu ?><br>
                                    <?= $value->nama_saksi_satu ?><br>
                                    Saksi 2 : <?= $value->nik_saksi_dua ?><br>
                                    <?= $value->nama_saksi_dua ?></td>
                                <td><?php if ($value->stat_lahir == '0') {
                                    ?>
                                        <span>Menunggu Dikonfirmasi</span>
                                    <?php
                                    } else if ($value->stat_lahir == '1') {
                                    ?>
                                        <span>Menunggu Dicetak</span>
                                    <?php
                                    } else {
                                    ?>
                                        <span>Selesai</span>
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <?php
                                        if ($value->stat_lahir == '1') {
                                        ?>
                                            <a href="<?= base_url('Admin/cDomisili/cetak/' . $value->id_domisili) ?>" class="btn btn-warning">Cetak Surat</a>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<!-- Contact End -->