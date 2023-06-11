<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Surat Pengajuan Surat Domisili</h1>

                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Surat Domisili</li>
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
                            <h3 class="card-title">Informasi Pengajuan Surat Domisili</h3>
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
                                        <th>Surat Pengantar</th>

                                        <th>Status Pengajuan</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($domisili as $key => $value) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $value->no_kk ?></td>
                                            <td><?= $value->nama_lengkap ?></td>
                                            <td><?= $value->tgl_pengajuan_dom ?></td>
                                            <td><a href="<?= base_url('asset/pengantar/' . $value->surat_pengantar) ?>"><?= $value->surat_pengantar ?></a></td>

                                            <td><?php if ($value->stat_dom == '0') {
                                                ?>
                                                    <span class="badge badge-warning">Menunggu Konfirmasi</span>
                                                <?php
                                                } else if ($value->stat_dom == '1') {
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
                                                    <a href="<?= base_url('Admin/cDomisili/cetak/' . $value->id_domisili) ?>" class="btn btn-warning">Cetak Surat</a>
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

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <form action="<?= base_url('Admin/cMasyarakat/insertMasyarakat') ?>" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Masukkan Data Masyarakat</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>No Kartu Keluarga</label>
                        <input type="text" name="no_kk" class="form-control" placeholder="Enter ..." required>
                    </div>
                    <div class="form-group">
                        <label>NIK</label>
                        <input type="text" name="nik" class="form-control" placeholder="Enter ..." required>
                    </div>
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" placeholder="Enter ..." required>
                    </div>
                    <div class="form-group">
                        <label>Tempat, Tanggal Lahir</label>
                        <input type="text" name="ttl" class="form-control" placeholder="Enter ..." required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select class="form-control" name="jk">
                            <option value="Laki - Laki">Laki - Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" class="form-control" placeholder="Enter ..." required>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>RT</label>
                                <input type="text" name="rt" class="form-control" placeholder="Enter ..." required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>RW</label>
                                <input type="text" name="rw" class="form-control" placeholder="Enter ..." required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Kelurahan/Desa</label>
                        <input type="text" name="desa" class="form-control" placeholder="Enter ..." required>
                    </div>
                    <div class="form-group">
                        <label>Kecamatan</label>
                        <input type="text" name="kec" class="form-control" placeholder="Enter ..." required>
                    </div>
                    <div class="form-group">
                        <label>Agama</label>
                        <input type="text" name="agama" class="form-control" placeholder="Enter ..." required>
                    </div>
                    <div class="form-group">
                        <label>Status Kawin</label>
                        <select class="form-control" name="stat_kawin">
                            <option value="Belum Menikah">Belum Menikah</option>
                            <option value="Menikah">Menikah</option>
                            <option value="Cerai Mati">Cerai Mati</option>
                            <option value="Cerai Hidup">Cerai Hidup</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Pekerjaan</label>
                        <input type="text" name="pekerjaan" class="form-control" placeholder="Enter ..." required>
                    </div>
                    <div class="form-group">
                        <label>Nama Ayah</label>
                        <input type="text" name="nama_ayah" class="form-control" placeholder="Enter ..." required>
                    </div>
                    <div class="form-group">
                        <label>Nama Ibu</label>
                        <input type="text" name="nama_ibu" class="form-control" placeholder="Enter ..." required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->