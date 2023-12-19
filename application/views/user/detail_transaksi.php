<!-- Cart Style -->

<div class="kembali">
	<a href="<?= base_url('dashboard'); ?>" class="btn-kembali">
		<span class="material-symbols-outlined"> arrow_back_ios </span>
		<h3>Kembali</h3>
	</a>
</div>

<div class="transaksi">
	<?php if (empty($invoice)) : ?>
	<?php else : ?>
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

			<div class="product-price" style="margin-bottom: 1rem;">
				<div class="price">
					<label>Tanggal Pemesanan</label>
					<h4><?= $item->tgl_pesan ?></h4>
				</div>
				<div class="price">
					<label>Batas Pembayaran</label>
					<h4><?= $item->batas_bayar ?></h4>
				</div>
			</div>

			<div class="product-price">
				<div class="jumlah">
					<label>Alamat Pengiriman</label>
					<h4><?= $item->alamat ?></h4>
				</div>
				<div class="price">
					<label>Status</label>
					<h4>
						<?php
							switch ($item->status) {
								case '0':
									echo '<div style="font-size: 1rem; font-weight: 600; color: var(--red); padding: 0.3rem 0.5rem; border-radius: 0.8rem; border: 2px solid var(--red); width: 11rem; text-align: center;">Sedang Diproses</div>';
									break;
								case '1':
									echo '<div style="font-size: 1rem; font-weight: 600; color: var(--yellow); padding: 0.3rem 0.5rem; border-radius: 0.8rem; border: 2px solid var(--yellow); width: 7rem; text-align: center">Dikemas</div>';
									break;
								case '2':
									echo anchor('dashboard/update_status_user/'. $item->id . '/3', '<div style="font-size: 1rem; font-weight: 600; color: var(--blue); padding: 0.3rem 0.5rem; border-radius: 0.8rem; border: 2px solid var(--blue); width: 6rem; text-align: center">Dikirim</div>');
									break;
								case '3':
									echo '<div style="font-size: 1rem; font-weight: 600; color: var(--green); padding: 0.3rem 0.5rem; border-radius: 0.8rem; border: 2px solid var(--green); width: 7rem; text-align: center">Diterima</div>';
									break;
								default:
									echo '<div style="font-size: 1rem; font-weight: 600; color: var(--red); padding: 0.3rem 0.5rem; border-radius: 0.8rem; border: 2px solid var(--red); width: 11rem; text-align: center">Tidak Valid</div>';
									break;
							}
						?>
					</h4>
				</div>
			</div>
		</div>
	</div>
	<?php endforeach; ?>
	<?php endif; ?>
</div>
