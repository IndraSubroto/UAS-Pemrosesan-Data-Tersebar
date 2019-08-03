<main role="main" class="container">
	<form action="<?php echo base_url(); ?>index.php/barang/aksiedit" method="post">
		<table class="table table-striped">
			<tr>
				<td>
					Kode Barang</td>
				<td>:</td>
				<td>
					<input class="form-control kd_barang" type="text" size="30" name="kd_barang" value="<?php echo $dtl['kd_barang']; ?>" readOnly=true />
				</td>
			</tr>
			<tr>
				<td>
					Nama Barang</td>
				<td>:</td>
				<td><input class="form-control nm_barang" type="text" size="30" name="nm_barang" value="<?php echo $dtl['nm_barang']; ?>" /></td>
			</tr>
			<tr>
				<td>
					Jumlah Barang</td>
				<td>:</td>
				<td><input class="form-control jml_barang" type="text" size="30" name="jml_barang" value="<?php echo $dtl['jml_barang']; ?>" /></td>
			</tr>
			<tr>
				<td>
					Harga Barang</td>
				<td>:</td>
				<td><input class="form-control harga" type="text" size="30" name="harga" value="<?php echo $dtl['harga']; ?>" /></td>
			</tr>

		</table>
		<button class="btn btn-primary">Ubah Data!</button>
	</form>
</main>