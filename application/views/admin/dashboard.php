<!-- Dashboard Style -->

<div class="insights">
	<!-- Start Jumlah Kelas -->
	<div class="kelas">
		<span class="material-symbols-outlined"> groups </span>
		<a href="#" target="_blank">
			<span class="material-symbols-outlined" id="edit"> edit</span>
		</a>
		<div class="middle">
			<div class="left">
				<h3>Jumlah Kelas</h3>
				<h1>2</h1>
			</div>
		</div>
		<small class="text-muted">Tahun Ajaran 2022-2023</small>
	</div>
	<!-- End Jumlah Kelas -->

	<!-- Start Jumlah Siswa -->
	<div class="siswa">
		<span class="material-symbols-outlined"> group </span>
		<a href="#" target="_blank">
			<span class="material-symbols-outlined" id="edit"> edit</span>
		</a>
		<div class="middle">
			<div class="left">
				<h3>Jumlah Siswa</h3>
				<h1>34</h1>
			</div>
		</div>
		<small class="text-muted">Tahun Ajaran 2022-2023</small>
	</div>
	<!-- End Jumlah Siswa -->

	<!-- Start Jumlah Pengajar -->
	<div class="pengajar">
		<span class="material-symbols-outlined"> group </span>
		<a href="#" target="_blank">
			<span class="material-symbols-outlined" id="edit"> edit</span>
		</a>
		<div class="middle">
			<div class="left">
				<h3>Jumlah Pengajar</h3>
				<h1>6</h1>
			</div>
		</div>
		<small class="text-muted">Tahun Ajaran 2022-2023</small>
	</div>
	<!-- End Jumlah Pengajar -->

	<!-- Start Jumlah Kalender -->
	<div class="kalender">
		<span class="material-symbols-outlined"> calendar_month </span>
		<a href="#" target="_blank">
			<span class="material-symbols-outlined" id="edit"> edit</span>
		</a>
		<div class="middle">
			<div class="left">
				<h3>Kalender Akademik</h3>
				<h1>6</h1>
			</div>
		</div>
		<small class="text-muted">Tahun Ajaran 2022-2023</small>
	</div>
	<!-- End Jumlah Kalender -->
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
