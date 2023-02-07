<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
	<!-- Brand Logo -->
	<a href="index3.html" class="brand-link">
		<img src="<?= base_url('asset/AdminLTE/') ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light">Desa Kertawana</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="<?= base_url('asset/AdminLTE/') ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block">Kepala Desa Kertawana</a>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->



				<li class="nav-header">Konfirmasi Pengajuan Surat </li>
				<li class="nav-item">
					<a href="<?= base_url('KepalaDesa/cKonfirmasi') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cDomisili') {
																							echo 'active';
																						}  ?>">
						<i class="nav-icon far fa-circle text-danger"></i>
						<p class="text">Surat Domisili</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('KepalaDesa/cKonfirmasi/ket_lahir') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cKetLahir') {
																										echo 'active';
																									}  ?>">
						<i class="nav-icon far fa-circle text-warning"></i>
						<p>Surat Keterangan Kelahiran</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('KepalaDesa/cKonfirmasi/pindah') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cPindah') {
																									echo 'active';
																								}  ?>">
						<i class="nav-icon far fa-circle text-info"></i>
						<p>Surat Pindah</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('KepalaDesa/cKonfirmasi/sktm') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cSktm') {
																									echo 'active';
																								}  ?>">
						<i class="nav-icon far fa-circle text-primary"></i>
						<p>Surat SKTM</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('KepalaDesa/cKonfirmasi/sku') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cSku') {
																								echo 'active';
																							}  ?>">
						<i class="nav-icon far fa-circle text-default"></i>
						<p>Surat SKU</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('KepalaDesa/cKonfirmasi/kematian') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cKematian') {
																										echo 'active';
																									}  ?>">
						<i class="nav-icon far fa-circle text-primary"></i>
						<p>Surat Kematian</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('KepalaDesa/cKonfirmasi/rumah') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cBmr') {
																									echo 'active';
																								}  ?>">
						<i class="nav-icon far fa-circle text-danger"></i>
						<p>Surat Status Rumah</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('KepalaDesa/cKonfirmasi/kawin') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cBMenikah') {
																									echo 'active';
																								}  ?>">
						<i class="nav-icon far fa-circle text-warning"></i>
						<p>Surat Belum Menikah</p>
					</a>
				</li>

				<li class="nav-header">LOGOUT </li>
				<li class="nav-item">
					<a href="<?= base_url('Admin/cLogin/logout') ?>" class="nav-link">
						<i class="nav-icon fas fa-sign-out-alt"></i>
						<p class="text">LogOut</p>
					</a>
				</li>
			</ul>
		</nav>
	</div>
</aside>