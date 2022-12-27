<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Kepala Keluarga</h1>

                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Kepala Keluarga</li>
                    </ol>
                </div>

            </div>

        </div>
        <button type="button" class="btn btn-app" data-toggle="modal" data-target="#modal-default">
            <i class="fas fa-plus"></i>
            Tambah Data Kepala Keluarga
        </button>
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
                            <h3 class="card-title">Informasi Masyarakat</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No Kartu Keluarga</th>
                                        <th>Nomor Induk Keluarga</th>
                                        <th>Nama Lengkap</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($masyarakat as $key => $value) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $value->no_kk ?></td>
                                            <td><?= $value->nik ?></td>
                                            <td><?= $value->nama_lengkap ?></td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button type="button" data-toggle="modal" data-target="#edit<?= $value->id_masyarakat ?>" class="btn btn-warning">Edit</button>
                                                    <a href="<?= base_url('Admin/cMasyarakat/delete/' . $value->id_masyarakat) ?>" class="btn btn-danger">Hapus</a>
                                                    <a href="<?= base_url('Admin/cMasyarakat/detail/' . $value->no_kk) ?>" class="btn btn-success">Detail</a>
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
                                        <th>Nomor Induk Keluarga</th>
                                        <th>Nama Lengkap</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </tfoot>
                            </table>
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


<?php
foreach ($masyarakat as $key => $value) {
?>
    <div class="modal fade" id="edit<?= $value->id_masyarakat ?>">
        <div class="modal-dialog">
            <form action="<?= base_url('Admin/cMasyarakat/updateMasyarakat/' . $value->id_masyarakat) ?>" method="POST">
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
                            <input type="text" value="<?= $value->no_kk ?>" name="no_kk" class="form-control" placeholder="Enter ..." required>
                        </div>
                        <div class="form-group">
                            <label>NIK</label>
                            <input type="text" value="<?= $value->nik ?>" name="nik" class="form-control" placeholder="Enter ..." required>
                        </div>
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" value="<?= $value->nama_lengkap ?>" name="nama" class="form-control" placeholder="Enter ..." required>
                        </div>
                        <div class="form-group">
                            <label>Tempat, Tanggal Lahir</label>
                            <input type="text" value="<?= $value->ttl ?>" name="ttl" class="form-control" placeholder="Enter ..." required>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select class="form-control" name="jk">
                                <option value="Laki - Laki" <?php if ($value->jk == 'Laki - Laki') {
                                                                echo 'selected';
                                                            } ?>>Laki - Laki</option>
                                <option value="Perempuan" <?php if ($value->jk == 'Perempuan') {
                                                                echo 'selected';
                                                            } ?>>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" value="<?= $value->alamat ?>" name="alamat" class="form-control" placeholder="Enter ..." required>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>RT</label>
                                    <input type="text" value="<?= $value->rt ?>" name="rt" class="form-control" placeholder="Enter ..." required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>RW</label>
                                    <input type="text" value="<?= $value->rw ?>" name="rw" class="form-control" placeholder="Enter ..." required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Kelurahan/Desa</label>
                            <input type="text" value="<?= $value->kel_desa ?>" name="desa" class="form-control" placeholder="Enter ..." required>
                        </div>
                        <div class="form-group">
                            <label>Kecamatan</label>
                            <input type="text" value="<?= $value->kec ?>" name="kec" class="form-control" placeholder="Enter ..." required>
                        </div>
                        <div class="form-group">
                            <label>Agama</label>
                            <input type="text" value="<?= $value->agama ?>" name="agama" class="form-control" placeholder="Enter ..." required>
                        </div>
                        <div class="form-group">
                            <label>Status Kawin</label>
                            <select class="form-control" name="stat_kawin">
                                <option value="Belum Menikah" <?php if ($value->stat_kawin == 'Belum Menikah') {
                                                                    echo 'selected';
                                                                } ?>>Belum Menikah</option>
                                <option value="Menikah" <?php if ($value->stat_kawin == 'Menikah') {
                                                            echo 'selected';
                                                        } ?>>Menikah</option>
                                <option value="Cerai Mati" <?php if ($value->stat_kawin == 'Cerai Mati') {
                                                                echo 'selected';
                                                            } ?>>Cerai Mati</option>
                                <option value="Cerai Hidup" <?php if ($value->stat_kawin == 'Cerai Hidup') {
                                                                echo 'selected';
                                                            } ?>>Cerai Hidup</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Pekerjaan</label>
                            <input type="text" value="<?= $value->pekerjaan ?>" name="pekerjaan" class="form-control" placeholder="Enter ..." required>
                        </div>
                        <div class="form-group">
                            <label>Nama Ayah</label>
                            <input type="text" value="<?= $value->nama_ayah ?>" name="nama_ayah" class="form-control" placeholder="Enter ..." required>
                        </div>
                        <div class="form-group">
                            <label>Nama Ibu</label>
                            <input type="text" value="<?= $value->nama_ibu ?>" name="nama_ibu" class="form-control" placeholder="Enter ..." required>
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
<?php
}
?>

<!-- /.modal -->