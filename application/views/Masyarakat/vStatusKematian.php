<!-- Contact Start -->
<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-3 text-white mb-4 animated slideInDown">Pengajuan Surat</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Surat Kematian</a></li>
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
                <h1 class="display-5 mb-5">Keterangan Kematian</h1>
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
                            <th>Tanggal Meninggal</th>
                            <th>Akibat Meninggal</th>
                            <th>Di</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Status Pengajuan</th>
                            <th class="text-center">Action</th>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($status['kematian'] as $key => $value) {
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value->no_kk ?></td>
                                <td><?= $value->nama_lengkap ?></td>
                                <td><?= $value->tgl_meninggal ?></td>
                                <td><?= $value->akibat ?></td>
                                <td><?= $value->tempat ?></td>
                                <td><?= $value->tgl_pengajuan_kematian ?></td>
                                <td><?php if ($value->stat_kematian == '0') {
                                    ?>
                                        <span>Menunggu Dicetak</span>
                                    <?php
                                    } else if ($value->stat_kematian == '1') {
                                    ?>
                                        <span>Selesai</span>
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="<?= base_url('Admin/cKematian/cetak/' . $value->id_kematian) ?>" class="btn btn-warning">Cetak Surat</a>
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