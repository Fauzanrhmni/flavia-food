    <div class="table">
          <?= $this->session->flashdata('message'); ?>
          <table class="table-submenu">
            <tr>
              <th>#</th>
              <th>Nama Customer</th>
              <th>Produk</th>
              <th>Jumlah</th>
              <th>Bukti</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>

            <?php
            foreach ($pesanan as $key => $item) : ?>

            <tr>
              <td><?= $key + 1 ?></td>
              <td><?= $item->nama_pemesan ?></td>
              <td><?= $item->nama_brg ?></td>
              <td><?= $item->jumlah ?></td>
              <td>
                <a href="#">sadasf</a>
              </td>
              <td>
                <?php
                switch ($item->status) {
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
                    <div style="font-size: 1rem; font-weight: 600; color: var(--color-success); padding: 0.3rem 1rem; border-radius: 0.8rem; border: 2px solid var(--color-success);">Dikirim</div>
                    </div>';
                    break;
                  case '3':
                    echo '<div style="display: flex; align-items: center;">
                    <div style="font-size: 1rem; font-weight: 600; color: var(--color-blue); padding: 0.3rem 1rem; border-radius: 0.8rem; border: 2px solid var(--color-blue);">Diterima</div>
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
                  <!-- <?= anchor('admin/invoice/detail_invoice/'. $item->id, '<button class="cta-warning"><span class="material-symbols-outlined"> visibility </span></button>') ?>
                  <?= anchor('admin/invoice/deleteinvoice/'. $item->id, '<button class="cta-danger"><span class="material-symbols-outlined"> delete </span></button>') ?> -->
                  <?php 
                  switch ($item->status) {
                    case '0':
                      echo '<button class="cta-danger"><span class="material-symbols-outlined"> done </span></button>';

                      echo anchor('admin/invoice/update_status/'. $item->id . '/1', '<button class="cta-gray"><span class="material-symbols-outlined"> inventory_2 </span></button>');

                      echo anchor('admin/invoice/update_status/'. $item->id . '/2', '<button class="cta-gray"><span class="material-symbols-outlined"> local_shipping </span></button>');

                      echo anchor('admin/invoice/update_status/'. $item->id . '/3', '<button class="cta-gray"><span class="material-symbols-outlined"> order_approve </span></button>');
                      break;
                    case '1':
                      echo anchor('admin/invoice/update_status/'. $item->id . '/0', '<button class="cta-gray"><span class="material-symbols-outlined"> done </span></button>');

                      echo '<button class="cta-warning"><span class="material-symbols-outlined"> inventory_2 </span></button>';

                      echo anchor('admin/invoice/update_status/'. $item->id . '/2','<button class="cta-gray"><span class="material-symbols-outlined"> local_shipping </span></button>');

                      echo anchor('admin/invoice/update_status/'. $item->id . '/3', '<button class="cta-gray"><span class="material-symbols-outlined"> order_approve </span></button>');
                      break;
                    case '2':
                      echo anchor('admin/invoice/update_status/'. $item->id . '/0', '<button class="cta-gray"><span class="material-symbols-outlined"> done </span></button>');

                      echo anchor('admin/invoice/update_status/'. $item->id . '/1', '<button class="cta-gray"><span class="material-symbols-outlined"> inventory_2 </span></button>');
                      
                      echo '<button class="cta-success"><span class="material-symbols-outlined"> local_shipping </span></button>';

                      echo anchor('admin/invoice/update_status/'. $item->id . '/3', '<button class="cta-gray"><span class="material-symbols-outlined"> order_approve </span></button>');
                      break;
                    case '3':
                      echo anchor('admin/invoice/update_status/'. $item->id . '/0','<button class="cta-gray"><span class="material-symbols-outlined"> done </span></button>');

                      echo anchor('admin/invoice/update_status/'. $item->id . '/1', '<button class="cta-gray"><span class="material-symbols-outlined"> inventory_2 </span></button>');

                      echo anchor('admin/invoice/update_status/'. $item->id . '/2', '<button class="cta-gray"><span class="material-symbols-outlined"> local_shipping </span></button>');

                      echo '<button class="cta-blue"><span class="material-symbols-outlined"> order_approve </span></button>';
                      break;
                    default:
                      #delete button
                      echo anchor('admin/invoice/hapus_pesanan/'. $item->id , '<button class="cta-danger"><span class="material-symbols-outlined"> delete </span></button>');
                      break;
                  }
                  ?>
                </div>
              </td>
            </tr>
            <?php endforeach; ?>

          </table>
        </div>
        
