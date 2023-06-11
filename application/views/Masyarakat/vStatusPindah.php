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
                <h1 class="display-5 mb-5">Pindah</h1>
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
                            <th>Alamat Tujuan</th>
                            <th>Antar</th>
                            <th>Status Pengajuan</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($status['pindah'] as $key => $value) {
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value->no_kk ?></td>
                                <td><?= $value->nama_lengkap ?></td>
                                <td><?= $value->tgl_pengajuan_pindah ?></td>
                                <td><?= $value->alamat_tujuan ?> RT. <?= $value->rt ?> / RW. <?= $value->rw ?>
                                    Desa/Kelurahan. <?= $value->desa_kel ?>
                                    Kecamatan. <?= $value->kec ?>
                                    Kab. <?= $value->kab ?> Kode Pos. <?= $value->kode_pos ?>
                                    Provinsi. <?= $value->prov ?></td>
                                <td><?php
                                    if ($value->type_pindah == '1') {
                                        echo 'Desa';
                                    } else if ($value->type_pindah == '2') {
                                        echo 'Kecamatan';
                                    } else {
                                        echo 'Provinsi';
                                    }
                                    ?></td>
                                <td><?php if ($value->stat_pindah == '0') {
                                    ?>
                                        <span>Menunggu Dikonfirmasi</span>
                                    <?php
                                    } else if ($value->stat_pindah == '1') {
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
                                        if ($value->stat_pindah == '1') {
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