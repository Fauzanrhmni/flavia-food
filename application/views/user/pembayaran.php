<!-- Checkout Style -->

<div class="kembali">
	<!-- <a href="<?= base_url('dashboard/detail_keranjang'); ?>" class="btn-kembali"> -->
	<button class="btn-kembali" id="btnKembali">
		<span class="material-symbols-outlined"> arrow_back_ios </span>
		<h3>Kembali</h3>
	</button>

	<script>
    document.getElementById('btnKembali').addEventListener('click', function() {
        // Menggunakan window.history untuk kembali ke halaman sebelumnya
        window.history.back();
    });
	</script>

</div>

<div class="payment">
  <div class="payment-check">
    <div class="check-pay">
      <h2>Ringkasan Pembayaran</h2>

      <form action="<?= base_url() ?>dashboard/order_process" method="post">
			<div class="detail">
				<div class="detail-order">
					<h3>Produk</h3>
				</div>
        <?php 
        foreach ($this->cart->contents() as $item) : ?>
				<div class="detail-order">
          <div class="price-food">
            <div class="item"><?= $item['qty'] ?></div>
						<p class="harga"><?= $item['name'] ?></p>
					</div>
					<p>Rp. <?= number_format($item['price'], 0,',','.') ?></p>
				</div>
        <?php endforeach; ?>
				
				<div class="detail-order">
					<p>Jasa Pengiriman</p>
					<p>Kurir Flavia</p>
				</div>
				<div class="detail-order">
					<p>Pembayaran</p>
					<div id="hasilPilihan"></div>
				</div>
				<div class="detail-order">
					<p>Ongkir <span class="free">Free</span></p>
					<p>Rp. 0</p>
				</div>
				<div class="detail-order">
					<p>Biaya Lainnya <span class="info">i</span></p>
					<p>Rp. <?= number_format($biaya, 0,',','.') ; ?></p>
				</div>

        <?php
        $totalbayar = 0;
        if ($keranjang = $this->cart->contents())
        {
          foreach ($keranjang as $item)
          {
            $totalbayar = $totalbayar + $biaya + $item['subtotal'];
          }
        ?>

				<div class="detail-order">
					<p>Price Total</p>
					<p>Rp. <?= number_format($totalbayar, 0,',','.') ; ?></p>
				</div>
				<div class="notes">
					<h3>Catatan</h3>
					<textarea name="notes" placeholder="Write a notes"></textarea>
				</div>
				<button class="btn-alamat" id="input-alamat">Input Alamat</button>
			</div>
		</div>

		<div class="btn-modal" id="modal-alamat">
			<div class="input-data">
				<h2>Input Alamat Pengiriman</h2>
				<div class="check-form">

						<div class="form-group">
							<input type="text" placeholder="Nama Lengkap" name="nama" required/>
						</div>

						<div class="form-group">
							<input type="text" placeholder="Alamat Lengkap" name="alamat" required/>
						</div>

						<div class="form-group">
							<input type="text" placeholder="No.Telepon/Whatsapp" name="contact" required/>
						</div>

						<input type="hidden" name="email" value="<?= $this->session->userdata('email'); ?>"/>

						<div class="form-group">
							<select
								name="pembayaran"
								id="pembayaran"
								onchange="tampilkanPilihan()"
							>
								<option value="" selected disabled>Select Pembayaran</option>
								<option value="COD">COD</option>
								<option value="DANA">DANA - XXXXXXXXXXXX</option>
								<option value="OVO">OVO - XXXXXXXXXXXX</option>
							</select>
						</div>

						<button type="submit" class="btn-alamat">Pesan</button>
						<button class="btn-cancel">Cancel</button>

						<script>
							function tampilkanPilihan() {
								// Dapatkan elemen select
								var selectElem = document.getElementById("pembayaran");

								// Dapatkan nilai pilihan yang dipilih
								var nilaiPilihan = selectElem.value;

								// Tampilkan nilai pilihan di elemen dengan id "hasilPilihan"
								var hasilElem = document.getElementById("hasilPilihan");
								hasilElem.innerHTML = nilaiPilihan;
							}
						</script>
						<script>
							// Modal Box
							const itemInputData = document.querySelector("#modal-alamat");
							const btnAlamat = document.querySelectorAll("#input-alamat");

							btnAlamat.forEach((btn) => {
								btn.onclick = (e) => {
									itemInputData.style.display = "flex";
									e.preventDefault();
								};
							});

							// Klik tombol close modal
							document.querySelector(
								".payment .input-data .check-form .btn-cancel"
							).onclick = (e) => {
								itemInputData.style.display = "none";
								e.preventDefault();
							};
						</script>
					</form>
        
					<?php 
					} else
					{
						echo '<div class="validation-failed">Keranjang Anda Masih Kosong!!</div>';
					} ?>
					
				</div>
			</div>
		</div>
	</div>
</div>