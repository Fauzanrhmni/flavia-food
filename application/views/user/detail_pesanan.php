<!-- Cart Style -->

<div class="kembali">
	<a href="<?= base_url('dashboard/detail_transaksi/'); ?>" class="btn-kembali">
		<span class="material-symbols-outlined"> arrow_back_ios </span>
		<h3>Kembali</h3>
	</a>
</div>

<!-- Model Box Item Detail Start -->
<div class="pesanan-one">
	<div style="display: flex; align-items: center;">
		<h5>Detail Pesanan</h5>
    <div style="font-size: 1rem; font-weight: 600; color: var(--green); padding: 0.3rem 1rem; border-radius: 0.8rem; border: 2px solid var(--green); margin-left: 1rem;"><?= $invoice->nama ?></div>
  </div>

	<div class="pesanan-container">
		<table>
		<?php
    $total = 0;
		$i = 1;
		foreach ($pesanan as $psn) :
		$subtotal = $psn->jumlah * $psn->harga;
    $total += $subtotal;
		?>
			<tr>
				<td style="width: 2rem;"><?= $psn->jumlah ?>x</td>
				<td><?= $psn->nama_brg ?></td>
				<td>Rp. <?= number_format($psn->harga,0,',','.') ?></td>
				<td>Rp. <?= number_format($subtotal,0,',','.') ?></td>
			</tr>
		<?php endforeach; ?>

			<tr>
				<td></td>
				<td>Sub Total</td>
				<td></td>
				<td>Rp. <?= number_format($total, 0,',','.') ?></td>
			</tr>
		</table>
	</div>
</div>

