<main role="main" class="container">
	<?php

	if (empty($supplier)) {
		echo "Data Supplier Kosong";
	} else {
		?>
		<table id="TableData" class="table table-striped">
			<thead>
				<tr>
					<th> NO</th>
					<th>Kode Supplier</th>
					<th>Nama Supplier</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;

				foreach ($supplier as $d) {
					?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $d['id_supplier']; ?></td>
						<td><?php echo $d['nm_supplier']; ?></td>
						<td><a href="<?php echo base_url(); ?>index.php/supplier/detil/<?php echo $d['id_supplier']; ?>">Detil</a> | <a href="<?php echo base_url(); ?>index.php/supplier/edit/<?php echo $d['id_supplier']; ?>">Edit </a> | <a href="<?php echo base_url(); ?>index.php/supplier/hapus/<?php echo $d['id_supplier']; ?>">Hapus</a></td>
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>


	<?php
	}
	?>

	<a href="<?php echo base_url(); ?>index.php/supplier/tambah"><button class="btn btn-primary">Tambah</button></a>
	</p>
</main>