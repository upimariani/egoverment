<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Surat Pengajuan Surat Belum Menikah</h1>

                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Surat Belum Menikah</li>
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
                            <h3 class="card-title">Informasi Pengajuan Surat Status Menikah</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No Kartu Keluarga</th>
                                        <th>Atas Nama Pemohon</th>
                                        <th>Status Menikah</th>
                                        <th>Tanggal Pengajuan</th>
                                        <th>Surat Pengantar</th>
                                        <th>Status Pengajuan</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($belum_kawin as $key => $value) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $value->no_kk ?></td>
                                            <td><?= $value->nama_lengkap ?></td>
                                            <td><?= $value->stat_kawin ?></td>
                                            <td><?= $value->tgl_pengajuan_kawin ?></td>
                                            <td><a href="<?= base_url('asset/pengantar/' . $value->surat_pengantar) ?>"><?= $value->surat_pengantar ?></a></td>
                                            <td><?php if ($value->stat_surat == '0') {
                                                ?>
                                                    <span class="badge badge-warning">Menunggu Konfirmasi</span>
                                                <?php
                                                } else if ($value->stat_surat == '1') {
                                                ?>
                                                    <span class="badge badge-info">Menunggu Dicetak</span>
                                                <?php
                                                } else {
                                                ?>
                                                    <span class="badge badge-success">Selesai</span>
                                                <?php
                                                }
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="<?php if ($value->stat_surat == '1') {
                                                                ?>
                                                        <?= base_url('Admin/cBMenikah/cetak/' . $value->id_kawin) ?>
                                                        <?php
                                                                } else {
                                                        ?>  
                                                                    #
                                                                    <?php
                                                                } ?>" class="btn btn-warning">Cetak Surat</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>No Kartu Keluarga</th>
                                        <th>Atas Nama Pemohon</th>
                                        <th>Status Menikah</th>
                                        <th>Tanggal Pengajuan</th>
                                        <th>Surat Pengajuan</th>
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