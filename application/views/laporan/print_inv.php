<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- My Icon -->
    <link rel="icon" href="<?= base_url('assets/'); ?>img/icon.svg" />
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/barang.css" />
    
		<title>Print</title>

		<style>
			body {
				width: 100%;
				height: 0;
			}
			h2 {
				margin-top: 2rem;
			}

			.table .table-submenu {
				width: 100%;
			}

			th {
				text-align: left;
			}

			table {
        page-break-inside: avoid;
      }

			
		</style>
	</head>
	<body>
		<div class="table">
		<center><table class="table-submenu">
				<tr>
					<td colspan="6" align="center"><b style="font-size: 1.3rem;">Laporan Invoice Flavia Food</b></td>
				</tr>

				<tr>
					<th>No</th>
					<th>Nama Pemesan</th>
					<th>Alamat</th>
					<th>Tanggal Pesan</th>
					<th>Batas Bayar</th>
					<th>Status</th>
				</tr>
				<?php
        $no = 1;
        foreach($invoice as $inv) :
				$total_invoice = 0;?>
				<tr>
					<td><?= $no++; ?></td>
					<td><?= $inv['nama']; ?></td>
					<td><?= $inv['alamat']; ?></td>
					<td><?= $inv['tgl_pesan']; ?></td>
					<td><?= $inv['batas_bayar']; ?></td>
					<td>
						<?php 
							switch ($inv['status']) {
                case '0':
                  echo '<div style="font-size: 1rem; font-weight: 600; color: var(--color-danger);">Diproses</div>';
                  break;
                case '1':
                  echo '<div style="font-size: 1rem; font-weight: 600; color: var(--color-warning);">Dikemas</div>';
                  break;
                case '2':
                  echo '<div style="font-size: 1rem; font-weight: 600; color: var(--color-blue); ">Dikirim</div>';
                  break;
                case '3':
                  echo '<div style="font-size: 1rem; font-weight: 600; color: var(--color-success);">Diterima</div>';
                  break;
                default:
                  echo '<div style="font-size: 1rem; font-weight: 600; color: var(--color-danger);">Tidak Valid</div>';
                  break;
            };
						?>
						</td>
				</tr>
				<tr>
					<td></td>
					<td colspan="5"><b>Email : </b> <?= $inv['email']; ?></td>
				</tr>

				<tr>
					<td></td>
					<th>Jumlah Pesanan</th>
					<th colspan="2">Nama Produk</th>
					<th>Harga Satuan</th>
					<th>Harga Total</th>
				</tr>

				<?php
        $total = 0;
        $total_keseluruhan = 0;
				foreach($pesanan as $psn) :
					$subtotalsel = $psn['jumlah'] * $psn['harga'];
					$total_keseluruhan += $subtotalsel;
					if($psn['id_invoice'] == $inv['id']) {
						$subtotal = $psn['jumlah'] * $psn['harga'];
						$total_invoice += $subtotal;
				?>

				<tr>
					<td></td>
					<td>
						<?= $psn['jumlah'];
						?>
					</td>
					<td colspan="2"><?= $psn['nama_brg']; ?></td>
					<td><?= 'Rp. ' . number_format($psn['harga'],0,',','.');?></td>
					<td><?= 'Rp. ' . number_format($subtotal,0,',','.'); } ?></td>
				</tr>

				<?php endforeach; ?>
				<tr>
					<td colspan="5" align="right">Sub Total</td>
					<td><?= 'Rp. ' . number_format($total_invoice,0,',','.'); ?></td>
				</tr>
			<?php endforeach; ?>
				<tr>
					<td colspan="6" align="center"><?= '<b>' . 'Total Keseluruhan : Rp. ' . number_format($total_keseluruhan,0,',','.') . '</b>'; ?></td>
				</tr>
			</table></center>
		</div>

		<script type="text/javascript">
			window.print();
		</script>
	</body>
</html>
