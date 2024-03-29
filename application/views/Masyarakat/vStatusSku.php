<!-- Contact Start -->
<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-3 text-white mb-4 animated slideInDown">Pengajuan Surat</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Surat Keterangan Usaha</a></li>
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
                <h1 class="display-5 mb-5">Keterangan Usaha</h1>
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
                            <th>Nama Usaha</th>
                            <th>Jenis Usaha</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Status Pengajuan</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($status['sku'] as $key => $value) {
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value->no_kk ?></td>
                                <td><?= $value->nama_lengkap ?></td>
                                <td><?= $value->nama_usaha ?></td>
                                <td><?= $value->jenis_usaha ?></td>
                                <td><?= $value->tgl_pengajuan_sku ?></td>
                                <td><?php if ($value->stat_usaha == '0') {
                                    ?>
                                        <span>Menunggu Dikonfirmasi</span>
                                    <?php
                                    } else if ($value->stat_usaha == '1') {
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
                                        if ($value->stat_usaha == '1') {
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