<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Admin</h1>

                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Admin</li>
                    </ol>
                </div>

            </div>

        </div>
        <button type="button" class="btn btn-app" data-toggle="modal" data-target="#modal-default">
            <i class="fas fa-plus"></i>
            Tambah Admin
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
                            <h3 class="card-title">Informasi Admin</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Admin</th>
                                        <th>Alamat Admin</th>
                                        <th>No Hp Admin</th>
                                        <th class="text-center">Akun Admin</th>
                                        <th class="text-center">Level Admin</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($admin as $key => $value) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $value->nama_admin ?></td>
                                            <td><?= $value->alamat_admin ?></td>
                                            <td><?= $value->no_hp ?></td>
                                            <td class="text-center"><span class="badge badge-warning"><?= $value->username ?></span> | <span class="badge badge-success"><?= $value->password ?></span></td>
                                            <td><?php if ($value->level_admin == '1') {
                                                    echo 'Admin';
                                                } else if ($value->level_admin == '2') {
                                                    echo 'Kasi Pemerintahan';
                                                } else if ($value->level_admin == '3') {
                                                    echo 'Kasi Kesejahteraan';
                                                } else if ($value->level_admin == '4') {
                                                    echo 'Kasi Pelayanan';
                                                } ?></td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button type="button" data-toggle="modal" data-target="#edit<?= $value->id_admin ?>" class="btn btn-warning">Edit</button>
                                                    <a href="<?= base_url('Admin/cAdmin/delete/' . $value->id_admin) ?>" class="btn btn-danger">Hapus</a>
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
                                        <th>Nama Admin</th>
                                        <th>Alamat Admin</th>
                                        <th>No Hp Admin</th>
                                        <th class="text-center">Akun Admin</th>
                                        <th class="text-center">Level Admin</th>
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
        <form action="<?= base_url('Admin/cAdmin/insertAdmin') ?>" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Masukkan Data Admin</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Admin</label>
                        <input type="text" name="nama" class="form-control" placeholder="Enter ..." required>
                    </div>
                    <div class="form-group">
                        <label>Alamat Admin</label>
                        <input type="text" name="alamat" class="form-control" placeholder="Enter ..." required>
                    </div>
                    <div class="form-group">
                        <label>No Telepon Admin</label>
                        <input type="text" name="no_hp" class="form-control" placeholder="Enter ..." required>
                    </div>
                    <div class="form-group">
                        <label>Username Admin</label>
                        <input type="text" name="username" class="form-control" placeholder="Enter ..." required>
                    </div>
                    <div class="form-group">
                        <label>Password Admin</label>
                        <input type="text" name="password" class="form-control" placeholder="Enter ..." required>
                    </div>
                    <div class="form-group">
                        <label>Level Admin</label>
                        <select class="form-control" name="level" required>
                            <option value="1">Admin</option>
                            <option value="2">Kasi Pemerintahan</option>
                            <option value="3">Kasi Kesejahteraan</option>
                            <option value="4">Kasi Pelayanan</option>
                        </select>
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
foreach ($admin as $key => $value) {
?>
    <div class="modal fade" id="edit<?= $value->id_admin ?>">
        <div class="modal-dialog">
            <form action="<?= base_url('Admin/cAdmin/updateAdmin/' . $value->id_admin) ?>" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Masukkan Data Admin</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Admin</label>
                            <input type="text" name="nama" value="<?= $value->nama_admin ?>" class="form-control" placeholder="Enter ..." required>
                        </div>
                        <div class="form-group">
                            <label>Alamat Admin</label>
                            <input type="text" name="alamat" value="<?= $value->alamat_admin ?>" class="form-control" placeholder="Enter ..." required>
                        </div>
                        <div class="form-group">
                            <label>No Telepon Admin</label>
                            <input type="text" name="no_hp" value="<?= $value->no_hp ?>" class="form-control" placeholder="Enter ..." required>
                        </div>
                        <div class="form-group">
                            <label>Username Admin</label>
                            <input type="text" name="username" value="<?= $value->username ?>" class="form-control" placeholder="Enter ..." required>
                        </div>
                        <div class="form-group">
                            <label>Password Admin</label>
                            <input type="text" name="password" value="<?= $value->password ?>" class="form-control" placeholder="Enter ..." required>
                        </div>
                        <div class="form-group">
                            <label>Level Admin</label>
                            <select class="form-control" name="level" required>
                                <option value="1" <?php if ($value->level_admin == '1') {
                                                        echo 'selected';
                                                    } ?>>Admin</option>
                                <option value="2" <?php if ($value->level_admin == '2') {
                                                        echo 'selected';
                                                    } ?>>Kasi Pemerintahan</option>
                                <option value="3" <?php if ($value->level_admin == '3') {
                                                        echo 'selected';
                                                    } ?>>Kasi Kesejahteraan</option>
                                <option value="4" <?php if ($value->level_admin == '4') {
                                                        echo 'selected';
                                                    } ?>>Kasi Pelayanan</option>
                            </select>
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