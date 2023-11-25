<!-- User Style -->

    <!-- Main Start -->
    <main class="hero">
      <div class="heading">
        <h1>Hi, Flavia</h1>
        <h2>Jelajahi Makanan dan Minuman Favorit Anda</h2>
      </div>

      <div class="search">
        <span class="material-symbols-outlined"> search </span>
        <input type="search" name="search" id="search" placeholder="Search.." />
      </div>

      <div class="content">
        <?php foreach ($barang as $brg) : ?>
        <div class="product">
          <div class="img-product">
            <img src="<?= base_url().'/upload/'.$brg->gambar ?>" class="img-button" />
            <span class="material-symbols-outlined" id="favorite"> favorite </span>
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

    <!-- Model Box Item Detail Start -->
    <div class="modal" id="item-detail-modal">
      <div class="modal-container">
        <a href="#" class="close-icon"><span class="material-symbols-outlined"> close </span></a>
        <div class="modal-img">
          <div class="img">
            <img src="../img/burger2.png" alt="Product 1" />
          </div>
          <div class="location">
            <div class="label">
              <div class="label-flavia">
                <label>Flavia</label>
                <label>(4.8) <span>17.5k reviews</span></label>
              </div>
              <div class="label-location">
                <label>Tasikmalaya</label>
                <a href="#" class="cta">visit store</a>
              </div>
            </div>
          </div>
        </div>

        <div class="modal-detail">
          <div class="title">
            <label class="arrival">New Arrival</label>
            <h1><?= $brg->nama_brg ?></h1>
            <label>Rating</label>
          </div>

          <h2>IDR 25K</h2>

          <div class="saus">
            <h3>Gratis Saus</h3>
            <div class="saus-produk">
              <label class="cta">Mustard</label>
              <label class="cta">Kecap</label>
              <label class="cta">Tomat</label>
            </div>
          </div>

          <div class="deskripsi">
            <h3>Deskripsi</h3>
            <p>
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde
              possimus dolor temporibus laudantium nihil sunt commodi ut
              laboriosam quae maiores.
            </p>
          </div>

          <div class="detail">
            <h3>Detail</h3>
            <div class="details">
              <p>Dikirim dari <b>Tasikmalaya</b></p>
              <p>Jasa Kirim <b>Gratis</b></p>
              <p><b>100%</b> Original Produk</p>
            </div>
          </div>
        </div>

        <div class="modal-order">
          <div class="order">
            <h2>Detail Order</h2>

            <div class="detail-order">
              <div class="quantity">
                <label>Jumlah</label>
                <div class="jumlah">
                  <label class="minplus">-</label>
                  <label>2</label>
                  <label class="minplus">+</label>
                </div>
              </div>

              <div class="harga">
                <label>Saus</label>
                <label>Mustard</label>
              </div>

              <div class="harga">
                <label>Harga</label>
                <label>IDR 25K</label>
              </div>

              <div class="harga">
                <label>Ongkir <span class="cta">Free Ongkir</span></label>
                <label>0</label>
              </div>

              <div class="harga">
                <label>Biaya Lainnya <span class="biaya-lain">i</span></label>
                <label>3K</label>
              </div>

              <div class="notes">
                <label>Catatan</label>
                <input
                  type="text"
                  name="notes"
                  id="notes"
                  placeholder="Write a notes"
                />
              </div>
            </div>

            <div class="total">
              <label>Sub Total</label>
              <label>10.000</label>
            </div>

            <div class="like-buy">
              <a href="#" class="like">O</a>
              <a href="#" class="buy">Buy Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Model Box Item Detail End -->
        <?php endforeach;?>
      </div>
    </main>
    <!-- Main End -->
    



