<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Surat Pengajuan Surat Keterangan Kelahiran</h1>

                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Surat Keterangan Kelahiran</li>
                    </ol>
                </div>

            </div>

        </div>

        <?php
        if ($this->session->userdata('success')) {
        ?>
            <div class="callout callout-success">
                <h5>Sukses!</h5>
                <p><?= $this->session->userdata('success') ?></p>
            </div>
        <?php
        }
        ?>

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Pengajuan Surat Keterangan Kelahiran</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
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
                                    foreach ($ket_kelahiran as $key => $value) {
                                        if ($value->stat_lahir == '0') {
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
                                                        <span class="badge badge-warning">Menunggu Konfirmasi</span>
                                                    <?php
                                                    } else if ($value->stat_lahir == '1') {
                                                    ?>
                                                        <span class="badge badge-info">Selesai</span>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a href="<?= base_url('KepalaDesa/cKonfirmasi/konfrm_lahir/' . $value->id_ket_kelahiran) ?>" class="btn btn-warning">Konfirmasi</a>
                                                    </div>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
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
                                </tfoot>
                            </table>
                            <button onclick="window.print()" class="btn btn-default"><i class="fas fa-print"></i> Print</button>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>