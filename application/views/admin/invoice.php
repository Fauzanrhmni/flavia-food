    <div class="table">
          <div class="print" style="display: flex;">
            <a target="_blank" href=" <?= base_url('admin/invoice/print'); ?>" style="display: flex; align-items: center; justify-content: center; padding: 0.3rem 0.7rem; background-color: var(--color-blue); border-radius: 0.5rem; color: var(--color-white); font-weight: 500; margin-right: 0.5rem;"><span class="material-symbols-outlined"> print </span></a>
            <a target="_blank" href=" <?= base_url('admin/invoice/export_pdf'); ?>" style="display: flex; align-items: center; justify-content: center; padding: 0.3rem 0.7rem; background-color: var(--color-danger); border-radius: 0.5rem; color: var(--color-white); font-weight: 500;"><span class="material-symbols-outlined"> picture_as_pdf </span></a>
          </div>
          <?= $this->session->flashdata('message'); ?>
          <?php if (empty($invoice)) : ?>
            <table class="table-submenu">
              <tr>
                <th>#</th>
                <th>Nama Customer</th>
                <th>Alamat Pengiriman</th>
                <!-- <th>Tanggal Pemesanan</th>
                <th>Batas Pembayaran</th> -->
                <th>Status</th>
                <th>Status Aksi</th>
                <th>Aksi</th>
              </tr>
            </table>
          <?php else : ?>
          <table class="table-submenu">
            <tr>
              <th>#</th>
              <th>Nama Customer</th>
              <th>Alamat Pengiriman</th>
              <!-- <th>Tanggal Pemesanan</th>
              <th>Batas Pembayaran</th> -->
              <th>Status</th>
              <th>Status Aksi</th>
              <th>Aksi</th>
            </tr>

            <?php 
            $i = 1;
            foreach ($invoice as $inv) :?>

            <tr>
              <td><?= $i++ ?></td>
              <td><?= $inv->nama ?></td>
              <td><?= $inv->alamat ?></td>

              <td>
              <?php
                switch ($inv->status) {
                  case '0':
                    echo '<div style="display: flex; align-items: center;">
                    <div style="font-size: 1rem; font-weight: 600; color: var(--color-danger); padding: 0.3rem 1rem; border-radius: 0.8rem; border: 2px solid var(--color-danger);">Proses</div>
                    </div>';
                    break;
                  case '1':
                    echo '<div style="display: flex; align-items: center;">
                    <div style="font-size: 1rem; font-weight: 600; color: var(--color-warning); padding: 0.3rem 1rem; border-radius: 0.8rem; border: 2px solid var(--color-warning);">Dikemas</div>
                    </div>';
                    break;
                  case '2':
                    echo '<div style="display: flex; align-items: center;">
                    <div style="font-size: 1rem; font-weight: 600; color: var(--color-blue); padding: 0.3rem 1rem; border-radius: 0.8rem; border: 2px solid var(--color-blue);">Dikirim</div>
                    </div>';
                    break;
                  case '3':
                    echo '<div style="display: flex; align-items: center;">
                    <div style="font-size: 1rem; font-weight: 600; color: var(--color-success); padding: 0.3rem 1rem; border-radius: 0.8rem; border: 2px solid var(--color-success);">Diterima</div>
                    </div>';
                    break;
                  default:
                    echo '<div style="display: flex; align-items: center;">
                    <div style="font-size: 1rem; font-weight: 600; color: var(--color-danger); padding: 0.3rem 1rem; border-radius: 0.8rem; border: 2px solid var(--color-danger);">Tidak Valid</div>
                    </div>';
                    break;
                } 
                ?>
              </td>

              <td>
                <div class="button" style="display: flex;">
                <?php 
                  switch ($inv->status) {
                    case '0':
                      echo '<button class="cta-danger"><span class="material-symbols-outlined"> done </span></button>';

                      echo anchor('admin/invoice/update_status/'. $inv->id . '/1', '<button class="cta-gray"><span class="material-symbols-outlined"> inventory_2 </span></button>');

                      echo anchor('admin/invoice/update_status/'. $inv->id . '/2', '<button class="cta-gray"><span class="material-symbols-outlined"> local_shipping </span></button>');

                      echo anchor('admin/invoice/update_status/'. $inv->id . '/3', '<button class="cta-gray"><span class="material-symbols-outlined"> order_approve </span></button>');
                      break;
                    case '1':
                      echo anchor('admin/invoice/update_status/'. $inv->id . '/0', '<button class="cta-gray"><span class="material-symbols-outlined"> done </span></button>');

                      echo '<button class="cta-warning"><span class="material-symbols-outlined"> inventory_2 </span></button>';

                      echo anchor('admin/invoice/update_status/'. $inv->id . '/2','<button class="cta-gray"><span class="material-symbols-outlined"> local_shipping </span></button>');

                      echo anchor('admin/invoice/update_status/'. $inv->id . '/3', '<button class="cta-gray"><span class="material-symbols-outlined"> order_approve </span></button>');
                      break;
                    case '2':
                      echo anchor('admin/invoice/update_status/'. $inv->id . '/0', '<button class="cta-gray"><span class="material-symbols-outlined"> done </span></button>');

                      echo anchor('admin/invoice/update_status/'. $inv->id . '/1', '<button class="cta-gray"><span class="material-symbols-outlined"> inventory_2 </span></button>');
                      
                      echo '<button class="cta-blue"><span class="material-symbols-outlined"> local_shipping </span></button>';

                      echo anchor('admin/invoice/update_status/'. $inv->id . '/3', '<button class="cta-gray"><span class="material-symbols-outlined"> order_approve </span></button>');
                      break;
                    case '3':
                      echo anchor('admin/invoice/update_status/'. $inv->id . '/0','<button class="cta-gray"><span class="material-symbols-outlined"> done </span></button>');

                      echo anchor('admin/invoice/update_status/'. $inv->id . '/1', '<button class="cta-gray"><span class="material-symbols-outlined"> inventory_2 </span></button>');

                      echo anchor('admin/invoice/update_status/'. $inv->id . '/2', '<button class="cta-gray"><span class="material-symbols-outlined"> local_shipping </span></button>');

                      echo '<button class="cta-success"><span class="material-symbols-outlined"> order_approve </span></button>';
                      break;
                    default:
                      #delete button
                      echo anchor('admin/invoice/hapus_pesanan/'. $inv->id , '<button class="cta-danger"><span class="material-symbols-outlined"> delete </span></button>');
                      break;
                  }
                ?>
                </div>
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
          <?php endif; ?>
        </div>
        
