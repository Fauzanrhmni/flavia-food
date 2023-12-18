<!-- Cart Style -->

<div class="kembali">
	<a href="<?= base_url('dashboard'); ?>" class="btn-kembali">
		<span class="material-symbols-outlined"> arrow_back_ios </span>
		<h3>Kembali</h3>
	</a>
</div>

<div class="transaksi">
	<?php 
  foreach ($invoice as $key => $item) :?>
	<div class="detail">
		<div class="title">
			<div class="product-title">
				<h1><?= $item->nama ?></h1>
				<a href="<?= base_url('dashboard/detail_pesanan/'). $item->id; ?>"
					><span class="material-symbols-outlined" id="visi"> visibility </span></a
				>
			</div>
			<div class="jumlah">
				<label>Alamat Pengiriman</label>
				<h4><?= $item->alamat ?></h4>
			</div>
			
			<div class="product-price">
				<div class="price">
					<label>Tanggal Pemesanan</label>
					<h4><?= $item->tgl_pesan ?></h4>
				</div>
				<div class="price">
					<label>Batas Pembayaran</label>
					<h4><?= $item->batas_bayar ?></h4>
				</div>
			</div>
		</div>
	</div>
	<?php endforeach; ?>
</div>
