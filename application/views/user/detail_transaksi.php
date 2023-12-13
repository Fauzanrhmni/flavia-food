<!-- Cart Style -->

<div class="kembali">
	<a href="<?= base_url('dashboard'); ?>" class="btn-kembali">
		<span class="material-symbols-outlined"> arrow_back_ios </span>
		<h3>Kembali</h3>
	</a>
</div>

<div class="transaksi">
	<?php 
  foreach ($invoice as $inv) :?>
	<div class="detail">
		<div class="title">
			<div class="product-title">
				<h1><?= $inv->nama ?></h1>
				<a href="#"
					><span class="material-symbols-outlined" id="visi"> visibility </span></a
				>
			</div>
			<div class="jumlah">
				<label>Alamat Pengiriman</label>
				<h4><?= $inv->alamat ?></h4>
			</div>
			<div class="product-price">
				<div class="price">
					<label>Tanggal Pemesanan</label>
					<h4><?= $inv->tgl_pesan ?></h4>
				</div>
				<div class="price">
					<label>Batas Pembayaran</label>
					<h4><?= $inv->batas_bayar ?></h4>
				</div>
			</div>
		</div>
	</div>
	<?php endforeach; ?>
</div>

<!-- Model Box Item Detail Start -->
<?php
foreach ($pesanan as $psn) :
?>
<div class="modal-pesanan" id="modal-pesanan">
	<div class="pesanan-container">
		<a href="#" class="close-icon"
			><span class="material-symbols-outlined">close</span></a
		>
		<h5>Detail Pesanan</h5>
		<div class="pesanan">
      <p>1x</p>
      <p><?= $psn->nama_brg ?></p>
      <p>Rp. 10.000</p>
      <p>Rp. 10.000</p>
    </div>
	</div>
</div>
<!-- Navbar End -->

<script>
	// Modal Box
	const pesananModal = document.querySelector("#modal-pesanan");
	const visiButton = document.querySelectorAll("#visi");

	visiButton.forEach((btn) => {
		btn.onclick = (e) => {
			pesananModal.style.display = "flex";
			e.preventDefault();
		};
	});

	// Klik tombol close modal
	document.querySelector(".modal-pesanan .close-icon").onclick = (e) => {
		pesananModal.style.display = "none";
		e.preventDefault();
	};

	// Klik di luar modal
	window.onclick = (e) => {
		if (e.target === pesananModal) {
			pesananModal.style.display = "none";
		}
	};
</script>

<?php endforeach; ?>
