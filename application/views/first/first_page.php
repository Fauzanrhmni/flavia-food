<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!-- My Icon -->
		<link rel="icon" href="<?= base_url('assets/'); ?>img/icon.svg" />

		<title><?= $title; ?></title>

		<!-- My Style -->
		<link rel="stylesheet" href="<?= base_url(); ?>assets/css/user.css" />

		<!-- Material Icon -->
		<link
			rel="stylesheet"
			href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
		/>
		<link
			rel="stylesheet"
			href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0"
		/>
	</head>
	<body>
		<!-- Sidebar Start -->
		<aside class="sidebar">
			<a href="<?= base_url('first') ?>"
				><img src="<?= base_url() ?>assets/img/logo.svg" class="logo"
			/></a>
			<div class="filter">
				<h2>Filter</h2>
				<h2>Kategori</h2>

				<div class="kategori">
					<div class="checkbox">
						<a href="<?= base_url('first/start') ?>">
							<span class="material-symbols-outlined"> fastfood </span>
							Junkfood
						</a>
					</div>

					<div class="checkbox">
						<a href="<?= base_url('first/start') ?>">
							<span class="material-symbols-outlined"> local_pizza </span>
							Pizza
						</a>
					</div>

					<div class="checkbox">
						<a href="<?= base_url('first/start') ?>">
							<span class="material-symbols-outlined"> ramen_dining </span>
							Mie
						</a>
					</div>

					<div class="checkbox">
						<a href="<?= base_url('first/start') ?>">
							<span class="material-symbols-outlined"> local_cafe </span>
							Drink
						</a>
					</div>

					<div class="checkbox">
						<a href="<?= base_url('first/start') ?>">
							<span class="material-symbols-outlined"> mode_cool </span>
							Ice Cream
						</a>
					</div>
				</div>
			</div>
		</aside>
		<!-- Sidebar End -->

		<!-- Navbar Start -->
		<nav class="navbar">
			<div class="navbar-nav">
				<h1><?= $title2; ?></h1>
				<div class="profil">

					<style>
						.login-signup {
							display: flex;
							align-items: center;
							justify-content: space-between;
							width: 15rem;
						}

						.signup {
							padding: 0.5rem 2rem;
							background-color: var(--white);
							font-family: "Poppins", sans-serif;
							font-weight: 500;
							color: var(--yellow);
							border: 2px solid var(--yellow);
							border-radius: 0.6rem;
						}

						.login {
							padding: 0.6rem 2rem;
							background-color: var(--yellow);
							font-family: "Poppins", sans-serif;
							font-weight: 500;
							color: var(--white);
							border-radius: 0.6rem;
						}

						.signup:hover {
							color: var(--white);
							background-color: var(--yellow);
							border: 2px solid var(--yellow);
						}

						.login:hover {
							background-color: #e1b400;
							color: var(--white);
						}
					</style>
					<div class="login-signup">
						<?= anchor('first/start', '<button class="signup">Sign Up</button>') ?>
						<?= anchor('first/start', '<button class="login">Log In</button>') ?>
					</div>
				</div>
			</div>
		</nav>
		<!-- Navbar End -->

		<!-- Main Start -->
		<main class="hero">
			<div class="search">
				<span class="material-symbols-outlined"> search </span>
				<input type="search" name="search" id="search" placeholder="Search.." />
			</div>

			<div class="content">
				<?php foreach ($barang as $brg) : ?>
				<div class="product">
					<div class="img-product">
						<img
							src="<?= base_url().'/upload/'.$brg->gambar ?>"
							class="img-button"
						/>
						<?= anchor('first/detail_product/'.$brg->id, '<span
							class="material-symbols-outlined"
							id="visibility"
						>
							visibility </span
						>')?>
					</div>

					<div class="product-name">
						<h2><?= $brg->nama_brg ?></h2>
					</div>

					<div class="rating">
						<span class="material-symbols-outlined"> star </span>
						<span class="material-symbols-outlined"> star </span>
						<span class="material-symbols-outlined"> star </span>
						<span class="material-symbols-outlined"> star </span>
						<span class="material-symbols-outlined"> star </span>
						<span class="value">(10)</span>
					</div>

					<div class="info">
						<div class="price">
							<h3>Price</h3>
							<h2>
								Rp.
								<?= number_format($brg->harga, 0,',','.') ?>
							</h2>
						</div>

						<?= anchor('first/start', '<button
							class="tambah"
						>
							Tambah</button
						>')?>
					</div>
				</div>
				<?php endforeach;?>
			</div>
		</main>
		<!-- Main End -->

		<!-- Footer Start -->
		<footer class="footer">
			<div class="credit">
				<p>
					Created by <a href="#">Flavia Food</a> | &copy;
					<?= date('Y'); ?>.
				</p>
			</div>
		</footer>
		<!-- Footer End -->

		<!-- My Javascript -->
		<script src="<?= base_url('assets/'); ?>js/script.js"></script>
	</body>
</html>
