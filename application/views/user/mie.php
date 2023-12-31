<!-- User Style -->

    <!-- Main Start -->
    <main class="hero">
      <div class="heading">
        <h1>Hi, <?= $user['name']; ?></h1>
        <h2>Jelajahi Makanan dan Minuman Favorit Anda</h2>
      </div>

      <form action="<?= base_url('dashboard/search'); ?>" method="get">
        <div class="search">
          <span class="material-symbols-outlined"> search </span>
          <input type="text" name="keyword" id="keyword" placeholder="Search.." />
          <button type="submit"></button>
        </div>
      </form>

      <div class="content">
        <?php foreach ($mie as $brg) : ?>
        <div class="product">
          <div class="img-product">
            <img src="<?= base_url().'/upload/'.$brg->gambar ?>" class="img-button" />
            <?= anchor('dashboard/detail_product/'.$brg->id, '<span class="material-symbols-outlined" id="visibility"> visibility </span>')?>
          </div>

          <div class="product-name">
            <h2><?= $brg->nama_brg ?></h2>
          </div>

          <div class="rating">
            <span class="material-symbols-outlined"> star </span>
            <span class="material-symbols-outlined"> star </span>
            <span class="material-symbols-outlined"> star </span>
            <span class="material-symbols-outlined"> star </span>
            <span class="material-symbols-outlined"> star </span>
            <span class="value">(10)</span>
          </div>

          <div class="info">
            <div class="price">
              <h3>Price</h3>
              <h2>Rp. <?= number_format($brg->harga, 0,',','.') ?></h2>
            </div>

            <?= anchor('dashboard/addkeranjang/'.$brg->id, '<button class="tambah">Tambah</button>')?>
          </div>
        </div>
        <?php endforeach;?>
      </div>
    </main>
    <!-- Main End -->
