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

		<link rel="stylesheet" href="<?= base_url(); ?>assets/css/detail_product.css" />

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
			<a href="<?= base_url('dashboard') ?>"
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
					<div class="icon">
						<a href="<?= base_url('first/start') ?>"
							><span
								class="material-symbols-outlined"
								style="color: var(--black)"
							>
								shopping_cart
							</span></a
						>
						<div class="numb">
							0
						</div>
					</div>

					<div class="icon">
						<a href="<?= base_url('first/start') ?>">
							<span class="material-symbols-outlined" style="color: black;"> event_note </span>
						</a>
					</div>

					<style>
						.login-signin {
							display: flex;
							align-items: center;
							justify-content: space-between;
							width: 14rem;
						}

						.signin {
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
						
						.signin:hover {
							color: var(--white);
							background-color: var(--yellow);
							border: 2px solid var(--yellow);
						}
						
						.login:hover {
							background-color: #e1b400;
							color: var(--white);
						}
						
						.kembali {
							display: flex;
							justify-content: space-between;
							align-items: center;
							margin-top: 6rem;
							width: 74%;
							margin-left: 22%;
							margin-right: 4%;
						}
						
						.kembali .btn-kembali {
							display: flex;
							justify-content: center;
							align-items: center;
						  font-family: "Poppins", sans-serif;
							padding: 0.7rem 1rem;
							background-color: var(--yellow);
							border-radius: 0.5rem;
							color: var(--white);
						}
						
						.kembali .btn-kembali h3 {
							font-size: 1rem;
							font-weight: 500;
						}
						.kembali .btn-kembali:hover {
							background-color: #e1b400;
						}
					</style>
					<div class="login-signin">
						<?= anchor('first/start', '<button class="signin">Sign In</button>') ?>
						<?= anchor('first/start', '<button class="login">Log In</button>') ?>
					</div>
				</div>
			</div>
		</nav>

<!-- Model Box Item Detail Start -->
<div class="kembali">
	<a href="<?= base_url('first'); ?>" class="btn-kembali">
		<span class="material-symbols-outlined"> arrow_back_ios </span>
		<h3>Kembali</h3>
	</a>
</div>

<?php foreach ($barang as $brg) : ?>

<div class="modal">
	<div class="modal-container">
		<div class="modal-img">
			<div class="img">
				<img src="<?= base_url(). 'upload/'. $brg->gambar ?>" alt="Product 1" />
			</div>
			<div class="location">
				<div class="label">
					<div class="label-flavia">
						<div class="icon">
							<img
								src="<?= base_url() ?>assets/img/icon.svg"
								class="flavia-icon"
							/>
							<label>Flavia</label>
							<span class="material-symbols-outlined" id="verified">
								verified
							</span>
						</div>
					</div>
					<div class="label-location">
						<div class="tasik">
							<span class="material-symbols-outlined"> location_on </span>
							<label>Tasikmalaya</label>
						</div>
						<a href="https://www.google.com/maps/place/Universitas+Bina+Sarana+Informatika+Kampus+Tasikmalaya+(UBSI+Tasikmalaya)/@-7.3278977,108.219542,15.25z/data=!4m14!1m7!3m6!1s0x2e6f575ac796e5bd:0x1266496f1d655684!2sUniversitas+Bina+Sarana+Informatika+Kampus+Tasikmalaya+(UBSI+Tasikmalaya)!8m2!3d-7.3279553!4d108.2267338!16s%2Fg%2F1tfw0glp!3m5!1s0x2e6f575ac796e5bd:0x1266496f1d655684!8m2!3d-7.3279553!4d108.2267338!16s%2Fg%2F1tfw0glp?entry=ttu" target="_blank" class="cta">visit store</a>
					</div>
				</div>
			</div>
		</div>

		<div class="modal-detail">
			<div class="title">
				<label class="arrival"><?= $brg->kategori ?></label>
				<h1><?= $brg->nama_brg ?></h1>
				<label class="rating">
					<span class="material-symbols-outlined"> star </span>
					<span class="material-symbols-outlined"> star </span>
					<span class="material-symbols-outlined"> star </span>
					<span class="material-symbols-outlined"> star </span>
					<span class="material-symbols-outlined"> star </span>
				</label>
			</div>

			<h2>
				Rp.
				<?= number_format($brg->harga, 0,',','.') ?>
			</h2>

			<div class="saus">
				<h3>Gratis Saus</h3>
				<div class="saus-produk">
					<button class="cta" id="button1">Mustard</button>
					<button class="cta" id="button2">Chili</button>
					<button class="cta" id="button3">Tomato</button>
				</div>
			</div>

			<div class="deskripsi">
				<h3>Deskripsi</h3>
				<p><?= $brg->keterangan ?></p>
			</div>

			<div class="detail">
				<h3>Detail</h3>
				<div class="details">
					<p>
						<span class="material-symbols-outlined"> inventory_2 </span>
						Stok <b><?= $brg->stok ?></b>
					</p>
					<p>
						<span class="material-symbols-outlined"> location_on </span>
						Dikirim dari
						<b>Tasikmalaya</b>
					</p>
					<p>
						<span class="material-symbols-outlined"> local_shipping </span>
						Jasa Kirim
						<b>Gratis</b>
					</p>
					<p>
						<span class="material-symbols-outlined"> beenhere </span>
						<b>100%</b>
						Original Produk
					</p>
				</div>
			</div>
		</div>

		<div class="modal-order">
			<div class="order">
				<h2>Detail Order</h2>
        
				<div class="detail-order">
					<div class="quantity">
						<label>Jumlah</label>
						<div class="jumlah">
							<button id="minus" class="minplus">-</button>
              <!-- <?= $jumlah = '<label id="counter">1</label>' ; ?> -->
              <label id="quantity">0</label>
							<!-- <label id="counter"><?= $jumlah = 1; ?></label> -->
							<button id="plus" class="minplus">+</button>
						</div>
					</div>

					<div class="harga">
						<label>Saus</label>
						<label id="result"></label>
					</div>

					<div class="harga">
						<label>Harga</label>
						<label id="harga"
							>Rp.
							<?= number_format($brg->harga, 0,',','.') ?></label
						>
					</div>

					<div class="harga">
						<label>Ongkir <span class="cta">Free</span></label>
						<label>Rp. 0</label>
					</div>

					<div class="harga">
						<label>Biaya Lainnya <span class="biaya-lain">i</span></label>
						<label
							>Rp.
							<?= number_format($biaya, 0,',','.') ?></label
						>
					</div>
				</div>

				<div class="total">
					<label>Sub Total</label>
					<label id="subtotal"></label>
				</div>

				<div class="like-buy">
					<?= anchor('first/start/'.$brg->id, '<button class="like">
						<span class="material-symbols-outlined">
							shopping_cart
						</span></button
					>')?>
					<a href="<?= base_url('first/start'); ?>" class="buy">Buy Now</a>
				</div>
			</div>
		</div>
	</div>
</div>


<script>
	document.getElementById("button1").addEventListener("click", function () {
		showValue("Mustard");
	});

	document.getElementById("button2").addEventListener("click", function () {
		showValue("Chili");
	});

	document.getElementById("button3").addEventListener("click", function () {
		showValue("Tomato");
	});

	function showValue(value) {
		// Mengakses elemen div dengan id "result"
		var resultDiv = document.getElementById("result");

		// Menampilkan nilai di dalam elemen div
		resultDiv.innerHTML = value;
	}

  var quantity = 0;
  var harga = <?= json_encode($brg->harga); ?>;

  document.getElementById('plus').addEventListener('click', function() {
    quantity++;
    updateQuantityAndTotal();
  });
          
  document.getElementById('minus').addEventListener('click', function() {
    if (quantity > 1) {
      quantity--;
      updateQuantityAndTotal();
      }
    });
          
  function updateQuantityAndTotal() {
    var quantityElement = document.getElementById('quantity');
    var totalHargaElement = document.getElementById('subtotal');

    
    
    quantityElement.textContent = quantity;
    
    var totalHarga = quantity * harga + <?= json_encode($biaya); ?>

    totalHargaElement.textContent = 'Rp. ' + formatRupiah(totalHarga);
  }

  function formatRupiah(angka) {
    var reverse = angka.toString().split('').reverse().join('');
    var ribuan = reverse.match(/\d{1,3}/g);
    var formatted = ribuan.join('.').split('').reverse().join('');
    return formatted;
  }

</script>

<?php endforeach; ?>

<!-- Model Box Item Detail End -->

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
