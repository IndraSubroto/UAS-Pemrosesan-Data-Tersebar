<main role="main" class="container">
	<?php
	if (!empty($customer)) {
		$no = 1;
		?>
		<table id="TableData" class="table table-striped">
			<thead>
				<tr>
					<th>NO</th>
					<th>Nama Customer</th>
					<th>Alamat Customer</th>
					<th>No Tlp Customer</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($customer as $s => $d) {
					?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $d['username']; ?></td>
						<td><?php echo $d['alamat']; ?></td>
						<td><?php echo $d['no_tlp']; ?></td>
						<td><a href="<?php echo base_url(); ?>index.php/customer/detil/<?php echo $d['kd_customer']; ?>">Detil</a> | <a href="<?php echo base_url(); ?>index.php/customer/edit/<?php echo $d['kd_customer']; ?>">Edit</a> | <a href="<?php echo base_url(); ?>index.php/customer/hapus/<?php echo $d['kd_customer']; ?>">Hapus</a></td>

					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
		<a href="<?php echo base_url(); ?>index.php/customer/tambah"><button class="btn btn-primary">Tambah</button></a>
	<?php
	} else {
		?>
		<h3>Customer Kosong</h3>
		<a href="<?php echo base_url(); ?>index.php/customer/tambah"><button>Tambah</button></a>
	<?php
	}

	?>
</main>