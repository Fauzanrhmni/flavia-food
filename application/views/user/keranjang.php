<!-- Cart Style -->

<div class="kembali">
  <a href="<?= base_url('dashboard'); ?>" class="btn-kembali">
    <span class="material-symbols-outlined"> arrow_back_ios </span>
    <h3>Kembali</h3>
  </a>
  <a href="<?= base_url('dashboard/delete_cart'); ?>" class="btn-delete">
    <span class="material-symbols-outlined"> delete </span>
    <h3>Hapus Semua</h3>
  </a>
</div>

<div class="keranjang">

  <?php foreach ($this->cart->contents() as $items) : ?>
  <div class="product-item">
    <img src="<?= base_url('upload/' . $items['options']['img']); ?>">
    <div class="title">
      <div class="product-title">
        <h1><?= $items['name'] ?></h1>
        <a href="<?= base_url('dashboard/delete_item/' . $items['rowid']); ?>"><span class="material-symbols-outlined"> delete </span></a>
      </div>
      <div class="jumlah">
        <label>Jumlah</label>
        <h4><?= $items['qty'] ?></h4>
      </div>
      <div class="product-price">
        <div class="price">
          <label>Price</label>
          <h4>Rp. <?= number_format($items['price'], 0,',','.') ?></h4>
        </div>
        <div class="price">
          <label>Price Total</label>
          <h4>Rp. <?= number_format($items['subtotal'], 0,',','.') ?></h4>
        </div>
      </div>
    </div>
  </div>
  <?php endforeach; ?>  
</div>

<div class="bayar">
  <div class="total">
    <label>Total Bayar</label>
    <h4>Rp. <?= number_format($this->cart->total(), 0,',','.') ?></h4>
  </div>
  <a href="<?= base_url('dashboard/checkout'); ?>" class="checkout">
    Checkout
  </a>
</div>

