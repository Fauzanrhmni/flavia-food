    <div class="table">
          <?= $this->session->flashdata('message'); ?>
          <table class="table-submenu">
            <tr>
              <th>#</th>
              <th>Nama Customer</th>
              <th>Alamat Pengiriman</th>
              <th>Tanggal Pemesanan</th>
              <th>Batas Pembayaran</th>
              <th>Catatan</th>
              <th>Action</th>
            </tr>

            <?php 
            $i = 1;
            foreach ($invoice as $inv) :?>

            <tr>
              <td><?= $i++ ?></td>
              <td><?= $inv->nama ?></td>
              <td><?= $inv->alamat ?></td>
              <td><?= $inv->tgl_pesan ?></td>
              <td><?= $inv->batas_bayar ?></td>
              <!-- <td><?= $inv->notes ?></td> -->
              <td>
                <?php
                if (isset($inv->notes) && !empty($inv->notes)) {
                    echo $inv->notes;
                } else {
                    echo '<div style="display: flex; align-items: center;">
                    <div style="font-size: 1rem; font-weight: 600; color: var(--color-danger); padding: 0.3rem 1rem; border-radius: 0.8rem; border: 2px solid var(--color-danger);">None</div>
                    </div>';
                }
                ?>
              </td>

              <td>
                <div class="button" style="display: flex;">
                  <?= anchor('admin/invoice/detail_invoice/'. $inv->id, '<button class="cta-warning"><span class="material-symbols-outlined"> visibility </span></button>') ?>
                  <?= anchor('admin/invoice/deleteinvoice/'. $inv->id, '<button class="cta-danger"><span class="material-symbols-outlined"> delete </span></button>') ?>
                </div>
              </td>
            </tr>
            <?php endforeach; ?>

          </table>
        </div>
        
