<!-- Edit Style -->

<div class="edit-brg">
  <form action="<?= base_url('admin/data_barang/editbarang/'.$barang['id']); ?>" method="post">
        
      <input type="hidden" name="id" value="<?= $barang['id']; ?>" id="id">
      
      <div class="input">
        <label for="nama_brg">Nama Barang</label>
        <input type="text" name="nama_brg" value="<?= $barang['nama_brg']; ?>" id="nama_brg">
      </div>
      
      <div class="input">
        <label for="keterangan">Keterangan</label>
        <input type="text" name="keterangan" value="<?= $barang['keterangan']; ?>" id="keterangan">
      </div>
      
      <div class="input">
        <label for="kategori">Kategori</label>
        <select name="kategori" id="kategori">
          <option>Select Kategori</option>
          <option value="junkfood">Junkfood</option>
          <option value="pizza">Pizza</option>
          <option value="mie">Mie</option>
          <option value="drink">Drink</option>
          <option value="icecream">Ice Cream</option>
        </select>
      </div>
      
      <div class="input">
        <label for="harga">Harga</label>
        <input type="text" name="harga" value="<?= $barang['harga']; ?>" id="harga">
      </div>
      
      <div class="input">
        <label for="stok">Stok</label>
        <input type="text" name="stok" value="<?= $barang['stok']; ?>" id="stok">
      </div>
      
      <div class="button">
        <button class="save" type="submit">Save</button>
        <a href="<?= base_url('admin/data_barang/'); ?>" class="cancel">Cancel</a>
      </div>
    </form>
</div>