<!-- Dashboard Style -->

<div class="insights">
	<!-- Start Data Produk -->
	<div class="kelas">
		<span class="material-symbols-outlined"> database </span>
		<a href="<?= base_url('admin/data_barang'); ?>">
			<span class="material-symbols-outlined" id="edit"> edit</span>
		</a>
		<div class="middle">
			<div class="left">
				<h3>Data Produk</h3>
				<h1><?= $barang; ?></h1>
			</div>
		</div>
		<small class="text-muted">Flavia-Food</small>
	</div>
	<!-- End Data Produk -->

	<!-- Start Invoices -->
	<div class="siswa">
		<span class="material-symbols-outlined" style="background-color: var(--color-success);"> receipt_long </span>
		<a href="<?= base_url('admin/invoice'); ?>">
			<span class="material-symbols-outlined" id="edit"> edit</span>
		</a>
		<div class="middle">
			<div class="left">
				<h3>Invoices</h3>
				<h1><?= $invoice; ?></h1>
			</div>
		</div>
		<small class="text-muted">Flavia-Food</small>
	</div>
	<!-- End Invoices -->

	<!-- Start Menu -->
	<div class="pengajar">
		<span class="material-symbols-outlined" style="background-color: var(--color-danger);"> folder </span>
		<a href="<?= base_url('menu'); ?>">
			<span class="material-symbols-outlined" id="edit"> edit</span>
		</a>
		<div class="middle">
			<div class="left">
				<h3>Menu</h3>
				<h1><?= $menu; ?></h1>
			</div>
		</div>
		<small class="text-muted">Flavia-Food</small>
	</div>
	<!-- End Menu -->

	<!-- Start Sub Menu -->
	<div class="kalender">
		<span class="material-symbols-outlined"> folder_open </span>
		<a href="<?= base_url('menu/submenu'); ?>">
			<span class="material-symbols-outlined" id="edit"> edit</span>
		</a>
		<div class="middle">
			<div class="left">
				<h3>Sub Menu</h3>
				<h1><?= $submenu; ?></h1>
			</div>
		</div>
		<small class="text-muted">Flavia-Food</small>
	</div>
	<!-- End Sub Menu -->

	<!-- Start Sub Menu -->
	<div class="kalender">
		<span class="material-symbols-outlined" style="background-color: var(--color-success);"> person </span>
		<a href="<?= base_url('admin/dashboard_admin/datauser'); ?>">
			<span class="material-symbols-outlined" id="edit"> edit</span>
		</a>
		<div class="middle">
			<div class="left">
				<h3>User</h3>
				<h1><?= $datauser; ?></h1>
			</div>
		</div>
		<small class="text-muted">Flavia-Food</small>
	</div>
	<!-- End Sub Menu -->
	
	<!-- Start Sub Menu -->
	<div class="kalender">
		<span class="material-symbols-outlined" style="background-color: var(--color-danger);"> group_add </span>
		<a href="<?= base_url('admin/dashboard_admin/role'); ?>">
			<span class="material-symbols-outlined" id="edit"> edit</span>
		</a>
		<div class="middle">
			<div class="left">
				<h3>Role</h3>
				<h1><?= $role; ?></h1>
			</div>
		</div>
		<small class="text-muted">Flavia-Food</small>
	</div>
	<!-- End Sub Menu -->

</div>

<!-- Profil Start -->
<div class="main-bottom">
	<div class="profil">
		<div class="photo">
			<img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" />
			<h1>Fauzan Rahmani Ahdan</h1>
		</div>
		<div class="nickname">
			<h1>Profil Admin</h1>
			<div class="name">
				<h2>Nickname</h2>
				<div class="longname">
					<p><?= $user['name']; ?></p>
				</div>
				<h2>Email</h2>
				<div class="longname">
					<p><?= $user['email']; ?></p>
				</div>
				<div class="button">
					<a href="<?= base_url('admin/myprofile'); ?>" id="cta-profile"
						>My Profile</a
					>
					<a
						href="<?= base_url('admin/myprofile/editprofile'); ?>"
						id="cta-edit"
						>Edit Profil</a
					>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Profil End -->
