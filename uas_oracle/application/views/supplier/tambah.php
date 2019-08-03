<main role="main" class="container">
	<form method="POST" action="<?php echo base_url();?>index.php/supplier/tambah/proses"> 
		<table class="table">
			<tr>
				<td>
				Nama Supplier</td>
				<td>:</td>
				<td><input type="text" class="form-control" size="30" name="nm_supplier" /></td>
			</tr>
			<tr>
				<td>
				Alamat Supplier</td>
				<td>:</td>
				<td><input type="text" class="form-control" size="30" name="alamat" /></td>
			</tr>
			<tr>
				<td>
				No Telp</td>
				<td>:</td>
				<td><input type="text" class="form-control" size="30" name="no_tlp" /></td>
			</tr>
		</table>
		<input type="submit" class="btn btn-primary" value="Simpan" />
		</form>
		</p>
</main>