
  <div class="table">

      <div class="btn-top-table">
        <a href="<?= base_url('admin/invoice') ?>" class="add-new" >
          <span class="material-symbols-outlined"> arrow_back_ios </span>
          Kembali
        </a>
      </div>

      <div style="display: flex; align-items: center; margin-top: 2rem;">
        <h4 style="font-size: 1.4rem;">Detail Pesanan</h4>
        <div style="font-size: 1rem; font-weight: 600; color: var(--color-blue); padding: 0.3rem 1rem; border-radius: 0.8rem; border: 2px solid var(--color-blue); margin-left: 1rem;"><?= $invoice->nama ?></div>

        <?php 
          if ($invoice->status == 0) {
            echo '<div style="font-size: 1rem; font-weight: 600; color: var(--color-success); padding: 0.3rem 1rem; border-radius: 0.8rem; border: 2px solid var(--color-success); margin-left: 1rem;">Tanggal Pesan :' . $invoice->tgl_pesan . '</div>
            <div style="font-size: 1rem; font-weight: 600; color: var(--color-success); padding: 0.3rem 1rem; border-radius: 0.8rem; border: 2px solid var(--color-success); margin-left: 1rem;">Batas bayar :' . $invoice->batas_bayar . '</div>';
          } else {
            switch ($invoice->status) {
                case '1':
                  echo '<div style="font-size: 1rem; font-weight: 600; color: var(--color-warning); padding: 0.3rem 1rem; border-radius: 0.8rem; border: 2px solid var(--color-warning); margin-left: 1rem;">Dikemas</div>';
                  break;
                case '2':
                  echo '<div style="font-size: 1rem; font-weight: 600; color: var(--color-blue); padding: 0.3rem 1rem; border-radius: 0.8rem; border: 2px solid var(--color-blue); margin-left: 1rem;">Dikirim</div>';
                  break;
                case '3':
                  echo '<div style="font-size: 1rem; font-weight: 600; color: var(--color-success); padding: 0.3rem 1rem; border-radius: 0.8rem; border: 2px solid var(--color-success); margin-left: 1rem;">Diterima</div>';
                  break;
                default:
                  echo '<div style="font-size: 1rem; font-weight: 600; color: var(--color-danger); padding: 0.3rem 1rem; border-radius: 0.8rem; border: 2px solid var(--color-danger); margin-left: 1rem;">Tidak Valid</div>';
                  break;
            };
          }
        ?>
        
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
        foreach ($pesanan as $key => $psn) :
          $subtotal = $psn->jumlah * $psn->harga;
          $total += $subtotal;
        ?>

				<tr>
					<td><?= $key + 1 ?></td>
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

        <tr>
          <td colspan="5">
            <?php
            if (isset($invoice->notes) && !empty($invoice->notes)) {
              echo '<div style="display: flex; align-items: center; justify-content: center;">
              <div style="font-size: 1rem; font-weight: 600; color: var(--color-danger); padding: 0.3rem 1rem; border-radius: 0.8rem; border: 2px solid var(--color-danger);">Catatan Customer : '. $invoice->notes .'</div>
              </div>';
            } else {
              echo '<div style="display: flex; align-items: center; justify-content: center;">
              <div style="font-size: 1rem; font-weight: 600; color: var(--color-danger); padding: 0.3rem 1rem; border-radius: 0.8rem; border: 2px solid var(--color-danger);">Catatan Customer : None</div>
              </div>';
            }
            ?>
          </td>
        </tr>
			</table>
		</div>
