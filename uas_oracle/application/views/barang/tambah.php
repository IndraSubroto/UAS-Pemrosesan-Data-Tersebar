<main role="main" class="container">
	<form method="POST" action="<?php echo base_url();?>index.php/barang/tambah/proses">
		<table class="table table-striped">
			<tr>
				<td>
					Nama Barang</td>
				<td>:</td>
				<td><input class="form-control" type="text" size="30" name="nm_barang" /></td>
			</tr>
			<tr>
				<td>
					Jumlah Barang</td>
				<td>:</td>
				<td><input class="form-control jmlBarang" type="text" size="30" name="jml_barang" /></td>
			</tr>
			<tr>
				<td>
					Harga Barang</td>
				<td>:</td>
				<td><input class="form-control" type="text" size="30" name="harga" /></td>
			</tr>
		</table>
		<input type="submit" class="btn btn-primary" value="Simpan" />
	</form>
</main>