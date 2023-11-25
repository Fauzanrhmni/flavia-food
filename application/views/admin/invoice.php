    <div class="table">

          <table class="table-submenu">
            <tr>
              <th>#</th>
              <th>Nama Customer</th>
              <th>Alamat Pengiriman</th>
              <th>Tanggal Pemesanan</th>
              <th>Batas Pembayaran</th>
              <th>Action</th>
            </tr>

            <?php foreach ($invoice as $inv) :?>

            <tr>
              <td><?= $inv->id ?></td>
              <td><?= $inv->nama ?></td>
              <td><?= $inv->alamat ?></td>
              <td><?= $inv->tgl_pesan ?></td>
              <td><?= $inv->batas_bayar ?></td>
              <td><?= anchor('admin/invoice/detail_invoice/'. $inv->id,
              '
              <div class="button">
                  <button class="cta-edit">
                    <span class="material-symbols-outlined"> visibility </span>
                  </button>
                </div>
              ') ?>
                
              </td>
            </tr>
            <?php endforeach; ?>

          </table>
        </div>
        
      </main>
    </div>