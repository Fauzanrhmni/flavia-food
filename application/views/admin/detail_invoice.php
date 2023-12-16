		<div class="table">

      <div style="display: flex; align-items: center; margin-top: 1rem;">
        <h4 style="font-size: 1.4rem;">Detail Pesanan</h4>
        <div style="font-size: 1rem; font-weight: 600; color: var(--color-success); padding: 0.3rem 1rem; border-radius: 0.8rem; border: 2px solid var(--color-success); margin-left: 1rem;">No. Invoice : <?= $invoice->id ?></div>
      </div>

			<table class="table-submenu">
				<tr>
					<th>Id Produk</th>
					<th>Nama Produk</th>
					<th>Jumlah Pesanan</th>
					<th>Harga Satuan</th>
					<th>Harga Total</th>
				</tr>

				<?php
        $total = 0;
        $i = 1;
        foreach ($pesanan as $psn) :
          $subtotal = $psn->jumlah * $psn->harga;
          $total += $subtotal;
        ?>

				<tr>
					<td><?= $i++ ?></td>
					<td><?= $psn->nama_brg ?></td>
					<td><?= $psn->jumlah ?></td>
					<td>Rp. <?= number_format($psn->harga,0,',','.') ?></td>
					<td>Rp. <?= number_format($subtotal,0,',','.') ?></td>
				</tr>
				<?php endforeach; ?>

        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td align="right">Sub Total</td>
          <td>Rp. <?= number_format($total, 0,',','.') ?></td>
        </tr>
			</table>
      
      <div class="btn-top-table" style="margin-top: 2rem;">
			  <a href="<?= base_url('admin/invoice') ?>" class="add-new" >
          <span class="material-symbols-outlined"> arrow_back_ios </span>
          Kembali
        </a>
      </div>
		</div>
