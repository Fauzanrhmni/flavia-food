<!-- Barang Style -->

<div class="table">
	<?= $this->session->flashdata('message'); ?>
	<div class="btn-top-table">
		<a href="#" class="add-new">
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
					<?= anchor('dashboard/detail_product/'.$brg->id, '<button
						class="cta-warning"
					>
						<span class="material-symbols-outlined"> zoom_in </span></button
					>', array('target' => '_blank')) ?>

					<?= anchor('admin/data_barang/editbarang/'. $brg->id, '<button
						class="cta-success"
					>
						<span class="material-symbols-outlined"> edit_square </span></button
					>'); ?>
					
					<?= anchor('admin/data_barang/delete/'. $brg->id, '<button
						class="cta-danger"
					>
						<span class="material-symbols-outlined"> delete </span></button
					>'); ?>
				</div>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
</div>

<style>
	.form-addproduct {
		display: none;
		position: fixed;
		z-index: 999;
		top: 0;
		left: 0;
		width: 100%;
		height: 100vh;
		overflow: auto;
		background-color: rgba(0, 0, 0, 0.5);
	}

	.addproduct-container {
		display: block;
		position: relative;
		background-color: var(--color-white);
		margin: 4% auto;
		color: var(--color-dark);
		padding: 3rem;
		height: 37rem;
		border-radius: 1rem;
		animation: animateModal 0.5s;
	}

	.addproduct-container .input-group {
		display: flex;
		justify-content: start;
		align-items: center;
		width: 100%;
		margin-bottom: 1rem;
	}

	.addproduct-container .input-g {
		display: flex;
		align-items: center;
		width: 5rem;
		margin-bottom: 1rem;
	}

	.addproduct-container .input-g .active-check {
		display: flex;
		font-size: 1.1rem;
	}

	.addproduct-container .input-g .active-check input[type="checkbox"] {
		margin-right: 1rem;
		height: 16px;
		width: 16px;
	}

	.addproduct-container input,
	.addproduct-container .input-group .select-menu {
		width: 30rem;
		padding: 0.8rem 1rem;
		border: 1px solid var(--color-dark-variant);
		border-radius: var(--border-radius-1);
		font-family: "Poppins", sans-serif;
		font-size: 1.1rem;
	}

  /* Modal Animation */
  @keyframes animateModal {
  	from {
  		top: -300px;
  		opacity: 0;
  	}
  
  	to {
  		top: 0;
  		opacity: 1;
  	}
  }
  
  .addproduct-container .close-icon-submenu {
  	position: absolute;
  	right: 1rem;
  	top: 1rem;
  	color: black;
  	transform: scale(0.9);
  }

  .addproduct-container .close-icon-submenu:hover {
  	color: var(--color-info-dark);
  }
  
  .addproduct-container h5 {
  	font-size: 1.5rem;
  	font-weight: 500;
  	margin-bottom: 0.8rem;
  }
  
  .addproduct-container p {
  	font-size: 1rem;
  	font-weight: 500;
  	margin-bottom: 3rem;
  }
  
  .addproduct-container .btn {
  	display: flex;
  	justify-content: end;
  	text-align: center;
  }
  
  .addproduct-container .btn .cancel-submenu {
  	font-family: "Poppins", sans-serif;
  	padding: 0.5rem 1rem;
  	font-size: 1rem;
  	border-radius: 0.5rem;
  	background-color: #a9a9a9;
  	color: var(--color-white);
  }
  
  .addproduct-container .btn .cancel-submenu:hover {
  	background-color: #868686;
  }
  
  .addproduct-container .btn .submit {
  	font-family: "Poppins", sans-serif;
  	padding: 0.5rem 1rem;
  	font-size: 1rem;
  	border-radius: 0.5rem;
  	background-color: #ffcc00;
  	color: var(--color-white);
  	margin-left: 1rem;
  }
  
  .addproduct-container .btn .submit:hover {
  	background-color: #f0c000;
  }
  
</style>
<!-- Model Box Item Form Start -->
<div class="form-addproduct" id="modal-submenu">
	<div class="addproduct-container">
		<a href="#" class="close-icon-submenu"
			><span class="material-symbols-outlined">close</span></a
		>
		<h5>Add New Product</h5>
		<form
			action="<?= base_url() ?>admin/data_barang/tambah_aksi"
			method="post"
			enctype="multipart/form-data"
		>
			<div class="input-group">
				<input type="text" name="nama_brg" placeholder="Nama Barang" />
			</div>

			<div class="input-group">
				<input type="text" name="keterangan" placeholder="Keterangan" />
			</div>

			<div class="input-group">
				<select name="kategori" class="select-menu">
					<option value="junkfood">Junkfood</option>
					<option value="pizza">Pizza</option>
					<option value="mie">Mie</option>
					<option value="drink">Drink</option>
					<option value="icecream">Ice Cream</option>
				</select>
			</div>

			<div class="input-group">
				<input type="text" name="harga" placeholder="Harga Barang" />
			</div>

			<div class="input-group">
				<input type="text" name="stok" placeholder="Jumlah Stok" />
			</div>

			<div class="input-group">
				<input type="file" name="gambar" />
			</div>

			<div class="btn">
				<button class="cancel-submenu" type="button">Cancel</button>
				<button class="submit" type="submit">Add</button>
			</div>
		</form>
	</div>
</div>
<!-- Model Box Item Form End -->

<script>
	// Modal Box
	const modalBarang = document.querySelector("#modal-submenu");

	const addNewBarang = document.querySelectorAll(".add-new");

	// Add New Sub Menu Button
	addNewBarang.forEach((btn) => {
		btn.onclick = (e) => {
			modalBarang.style.display = "flex";
			e.preventDefault();
		};
	});

	// Klik tombol close modal Add New Menu
	document.querySelector(".form-addproduct .close-icon-submenu").onclick = (e) => {
		modalBarang.style.display = "none";
		e.preventDefault();
	};

	document.querySelector(".form-addproduct .cancel-submenu").onclick = (e) => {
		modalBarang.style.display = "none";
		e.preventDefault();
	};

</script>
