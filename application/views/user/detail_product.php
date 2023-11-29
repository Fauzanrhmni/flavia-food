<!-- Model Box Item Detail Start -->
<div class="kembali">
	<a href="<?= base_url('dashboard'); ?>" class="btn-kembali">
		<span class="material-symbols-outlined"> arrow_back_ios </span>
		<h3>Kembali</h3>
	</a>
</div>

<?php foreach ($barang as $brg) : ?>

<div class="modal">
	<div class="modal-container">
		<div class="modal-img">
			<div class="img">
				<img src="<?= base_url(). 'upload/'. $brg->gambar ?>" alt="Product 1" />
			</div>
			<div class="location">
				<div class="label">
					<div class="label-flavia">
						<div class="icon">
							<img
								src="<?= base_url() ?>assets/img/icon.svg"
								class="flavia-icon"
							/>
							<label>Flavia</label>
							<span class="material-symbols-outlined" id="verified">
								verified
							</span>
						</div>
					</div>
					<div class="label-location">
						<div class="tasik">
							<span class="material-symbols-outlined"> location_on </span>
							<label>Tasikmalaya</label>
						</div>
						<a href="#" class="cta">visit store</a>
					</div>
				</div>
			</div>
		</div>

		<div class="modal-detail">
			<div class="title">
				<label class="arrival"><?= $brg->kategori ?></label>
				<h1><?= $brg->nama_brg ?></h1>
				<label class="rating">
					<span class="material-symbols-outlined"> star </span>
					<span class="material-symbols-outlined"> star </span>
					<span class="material-symbols-outlined"> star </span>
					<span class="material-symbols-outlined"> star </span>
					<span class="material-symbols-outlined"> star </span>
				</label>
			</div>

			<h2>
				Rp.
				<?= number_format($brg->harga, 0,',','.') ?>
			</h2>

			<div class="saus">
				<h3>Gratis Saus</h3>
				<div class="saus-produk">
					<button class="cta" id="button1">Mustard</button>
					<button class="cta" id="button2">Chili</button>
					<button class="cta" id="button3">Tomato</button>
				</div>
			</div>

			<div class="deskripsi">
				<h3>Deskripsi</h3>
				<p><?= $brg->keterangan ?></p>
			</div>

			<div class="detail">
				<h3>Detail</h3>
				<div class="details">
					<p>
						<span class="material-symbols-outlined"> inventory_2 </span>
						Stok <b><?= $brg->stok ?></b>
					</p>
					<p>
						<span class="material-symbols-outlined"> location_on </span>
						Dikirim dari
						<b>Tasikmalaya</b>
					</p>
					<p>
						<span class="material-symbols-outlined"> local_shipping </span>
						Jasa Kirim
						<b>Gratis</b>
					</p>
					<p>
						<span class="material-symbols-outlined"> beenhere </span>
						<b>100%</b>
						Original Produk
					</p>
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
							<button id="minus" class="minplus">-</button>
              <!-- <?= $jumlah = '<label id="counter">1</label>' ; ?> -->
              <label id="quantity">0</label>
							<!-- <label id="counter"><?= $jumlah = 1; ?></label> -->
							<button id="plus" class="minplus">+</button>
						</div>
					</div>

					<div class="harga">
						<label>Saus</label>
						<label id="result"></label>
					</div>

					<div class="harga">
						<label>Harga</label>
						<label id="harga"
							>Rp.
							<?= number_format($brg->harga, 0,',','.') ?></label
						>
					</div>

					<div class="harga">
						<label>Ongkir <span class="cta">Free</span></label>
						<label>Rp. 0</label>
					</div>

					<div class="harga">
						<label>Biaya Lainnya <span class="biaya-lain">i</span></label>
						<label
							>Rp.
							<?= number_format($biaya, 0,',','.') ?></label
						>
					</div>
				</div>

				<div class="total">
					<label>Sub Total</label>
					<label id="subtotal"></label>
				</div>

				<div class="like-buy">
					<?= anchor('dashboard/addkeranjang/'.$brg->id, '<button class="like">
						<span class="material-symbols-outlined">
							shopping_cart
						</span></button
					>')?>
					<a href="<?= base_url('dashboard/checkout'); ?>" class="buy">Buy Now</a>
				</div>
			</div>
		</div>
	</div>
</div>


<script>
	document.getElementById("button1").addEventListener("click", function () {
		showValue("Mustard");
	});

	document.getElementById("button2").addEventListener("click", function () {
		showValue("Chili");
	});

	document.getElementById("button3").addEventListener("click", function () {
		showValue("Tomato");
	});

	function showValue(value) {
		// Mengakses elemen div dengan id "result"
		var resultDiv = document.getElementById("result");

		// Menampilkan nilai di dalam elemen div
		resultDiv.innerHTML = value;
	}

  var quantity = 0;
  var harga = <?= json_encode($brg->harga); ?>;

  document.getElementById('plus').addEventListener('click', function() {
    quantity++;
    updateQuantityAndTotal();
  });
          
  document.getElementById('minus').addEventListener('click', function() {
    if (quantity > 1) {
      quantity--;
      updateQuantityAndTotal();
      }
    });
          
  function updateQuantityAndTotal() {
    var quantityElement = document.getElementById('quantity');
    var totalHargaElement = document.getElementById('subtotal');

    
    
    quantityElement.textContent = quantity;
    
    var totalHarga = quantity * harga + <?= json_encode($biaya); ?>

    totalHargaElement.textContent = 'Rp. ' + formatRupiah(totalHarga);
  }

  function formatRupiah(angka) {
    var reverse = angka.toString().split('').reverse().join('');
    var ribuan = reverse.match(/\d{1,3}/g);
    var formatted = ribuan.join('.').split('').reverse().join('');
    return formatted;
  }

</script>

<?php endforeach; ?>



<!-- Model Box Item Detail End -->
