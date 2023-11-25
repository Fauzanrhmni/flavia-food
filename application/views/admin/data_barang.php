<!-- Barang Style -->

        <div class="table">

          <div class="btn-top-table">
            <a href="#" class="add-new" >
              <span class="material-symbols-outlined"> add </span>
              Add Product
            </a>
          </div>

          <table class="table-submenu">
            <tr>
              <th>#</th>
              <th>Nama Barang</th>
              <th>Keterangan</th>
              <th>Kategori</th>
              <th>Harga</th>
              <th>Stok</th>
              <th>Action</th>
            </tr>

            <?php
            $no = 1;
            foreach ($barang as $brg) : ?>

            <tr>
              <td><?= $no++; ?></td>
              <td><?= $brg->nama_brg; ?></td>
              <td><?= $brg->keterangan; ?></td>
              <td><?= $brg->kategori; ?></td>
              <td><?= $brg->harga; ?></td>
              <td><?= $brg->stok; ?></td>
              <td>
                <div class="button">
                  <a href="#" class="cta-success">
                    <span class="material-symbols-outlined"> zoom_in </span>
                  </a>
                  <?= anchor('admin/data_barang/edit/'. $brg->id, '<button class="cta-edit" >
                    <span class="material-symbols-outlined"> edit_square </span>
                  </button>'); ?>
                  <?= anchor('admin/data_barang/delete/'. $brg->id, '<button href="#" class="cta-danger" >
                    <span class="material-symbols-outlined"> delete </span>
                  </button>'); ?>
                  
                </div>
              </td>
            </tr>
            <?php endforeach; ?>

          </table>
        </div>
        

        <!-- Model Box Item Form Start -->
        <div class="form-submenu" id="modal-submenu">
          <div class="submenu-container">
            <a href="#" class="close-icon-submenu"><span class="material-symbols-outlined">close</span></a>
            <h5>Add New Product</h5>
            <form action="<?= base_url() ?>admin/data_barang/tambah_aksi" method="post" enctype="multipart/form-data">
              <div class="input-group">
                <input type="text" name="nama_brg" placeholder="Nama Barang">
              </div>

              <div class="input-group">
                <input type="text" name="keterangan" placeholder="Keterangan">
              </div>

              <div class="input-group">
                <input type="text" name="kategori" placeholder="Kategori">
              </div>

              <div class="input-group">
                <input type="text" name="harga" placeholder="Harga Barang">
              </div>

              <div class="input-group">
                <input type="text" name="stok" placeholder="Jumlah Stok">
              </div>

              <div class="input-group">
                <input type="file" name="gambar">
              </div>

              <!-- <div class="input-g">
              <label class="active-check">
                <input class="form-check" type="checkbox" name="is_active" id="is_active" value="1" checked>
                Active?
              </label>
              </div> -->

              <div class="btn">
                <button class="cancel-submenu" type="button">Cancel</button>
                <button class="submit" type="submit">Add</button>
              </div>
            </form>
          </div>
        </div>
        <!-- Model Box Item Form End -->

      </main>
    </div>