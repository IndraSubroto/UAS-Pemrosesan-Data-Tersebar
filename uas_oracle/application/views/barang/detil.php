<main role="main" class="container">
	<table class="table table-striped">
		<tr>
			<td>
				Kode Barang</td>
			<td>:</td>
			<td>
				<span class="label"><?php echo $dtl['kd_barang']; ?></span>
			</td>
		</tr>
		<tr>
			<td>
				Nama Barang</td>
			<td>:</td>
			<td><span class="label"><?php echo $dtl['nm_barang']; ?></span></td>
		</tr>
		<tr>
			<td>
				Harga Barang</td>
			<td>:</td>
			<td>
				<span class="label"><?php echo $dtl['harga']; ?></span>
			</td>
		</tr>
	</table>
	<a href="<?php echo base_url(); ?>index.php/barang/">
		<button class="btn btn-primary">Kembali!</button>
</main>