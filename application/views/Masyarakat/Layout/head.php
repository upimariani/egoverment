<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DESA KERTAWANA</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;500&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url('asset/gardener/') ?>lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?= base_url('asset/gardener/') ?>lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= base_url('asset/gardener/') ?>lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url('asset/gardener/') ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= base_url('asset/gardener/') ?>css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-dark text-light px-0 py-2">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <span class="fa fa-phone-alt me-2"></span>
                    <span>085317494912</span>
                </div>
                <div class="h-100 d-inline-flex align-items-center">
                    <span class="far fa-envelope me-2"></span>
                    <span>info@desa-kertawana.kuningankab.go.id</span>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center mx-n2">
                    <span>Selamat Datang, NIK <strong><?= $this->session->userdata('nik') ?></strong></span>

                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h1 class="m-0">Desa Kertawana</h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">

                <a href="<?= base_url('Masyarakat/cHalamanUtama') ?>" class="nav-item nav-link active">Home</a>
                <?php
                if ($this->session->userdata('nik') != '') {

                ?>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pengajuan Surat</a>
                        <div class="dropdown-menu bg-light m-0">
                            <a href="<?= base_url('masyarakat/cDomisili') ?>" class="dropdown-item">Domisili</a>
                            <a href="<?= base_url('masyarakat/cKetlahir') ?>" class="dropdown-item">Keterangan Kelahiran</a>
                            <a href="<?= base_url('masyarakat/cPindah') ?>" class="dropdown-item">Pindah</a>
                            <a href="<?= base_url('masyarakat/cSktm') ?>" class="dropdown-item">SKTM</a>
                            <a href="<?= base_url('masyarakat/cSku') ?>" class="dropdown-item">SKU</a>
                            <a href="<?= base_url('masyarakat/cKematian') ?>" class="dropdown-item">Kematian</a>
                            <a href="<?= base_url('masyarakat/cBmr') ?>" class="dropdown-item">Belum Memiliki Rumah</a>
                            <a href="<?= base_url('masyarakat/cMenikah') ?>" class="dropdown-item">Belum Menikah</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Status Surat</a>
                        <div class="dropdown-menu bg-light m-0">
                            <a href="<?= base_url('masyarakat/cDomisili/status') ?>" class="dropdown-item">Domisili</a>
                            <a href="<?= base_url('masyarakat/cKetlahir/status') ?>" class="dropdown-item">Keterangan Kelahiran</a>
                            <a href="<?= base_url('masyarakat/cPindah/status') ?>" class="dropdown-item">Pindah</a>
                            <a href="<?= base_url('masyarakat/cSktm/status') ?>" class="dropdown-item">SKTM</a>
                            <a href="<?= base_url('masyarakat/cSku/status') ?>" class="dropdown-item">SKU</a>
                            <a href="<?= base_url('masyarakat/cKematian/status') ?>" class="dropdown-item">Kematian</a>
                            <a href="<?= base_url('masyarakat/cBmr/status') ?>" class="dropdown-item">Belum Memiliki Rumah</a>
                            <a href="<?= base_url('masyarakat/cMenikah/status') ?>" class="dropdown-item">Belum Menikah</a>
                        </div>
                    </div>
                <?php
                }
                ?>


            </div>
            <?php
            if ($this->session->userdata('nik') == '') {

            ?>
                <a href="<?= base_url('Masyarakat/cLogin') ?>" class="btn btn-primary py-4 px-lg-4 rounded-0 d-none d-lg-block">LOGIN<i class="fa fa-arrow-right ms-3"></i></a>

            <?php
            } else {
            ?>
                <a href="<?= base_url('Masyarakat/cLogin/logout') ?>" class="btn btn-primary py-4 px-lg-4 rounded-0 d-none d-lg-block">LOGOUT<i class="fa fa-arrow-right ms-3"></i></a>
            <?php
            }
            ?>
        </div>
    </nav>
    <!-- Navbar End -->