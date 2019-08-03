<main role="main" class="container">
	<?php
	if (!empty($barang)) {
		$no = 1;
		?>
		<table id="TableData" class="table table-striped">
			<thead>
				<tr>
					<th>NO</th>
					<th>Kode Barang</th>
					<th>Nama Barang</th>
					<th>Stok</th>
					<th>Harga</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($barang as $s => $d) {
					?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $d['kd_barang']; ?></td>
						<td><?php echo $d['nm_barang']; ?></td>
						<td>
							<?php
							if (empty($d['jml_barang'])) {
								echo $d['jml_barang'];
							} elseif (empty($d['jml_barang'])) {
								echo "0";
							} else {
								echo $d['jml_barang'];
							}

							?>
						</td>
						<td><?php echo $d['harga']; ?></td>
						<td><a href="<?php echo base_url(); ?>index.php/barang/detil/<?php echo $d['kd_barang']; ?>">
								<button class="btn btn-primary">Detil</button>
							</a> | <a href="<?php echo base_url(); ?>index.php/barang/edit/<?php echo $d['kd_barang']; ?>">
								<button class="btn btn-secondary">Edit</button>
							</a> | <a class="btn btn-danger" href="<?php echo base_url(); ?>index.php/barang/hapus/<?php echo $d['kd_barang']; ?>">Hapus</a>
						</td>

					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
		<a href="<?php echo base_url(); ?>index.php/barang/tambah"><button class="btn btn-primary">Tambah</button></a>
	<?php
	} else {
		?>
		<h3>Data Barang Kosong</h3>
		<a href="<?php echo base_url(); ?>index.php/barang/tambah"><button>Tambah</button></a>
	<?php
	}

	?>
</main>