<main role="main" class="container">
	<form method="POST" action="<?php echo base_url();?>index.php/customer/tambah/proses"> 
		<table class="table table-striped">
			<tr>
				<td>
				Nama customer</td>
				<td>:</td>
				<td><input class="form-control" type="text" size="30" name="username" /></td>
			</tr>
			<tr>
				<td>
				Alamat customer</td>
				<td>:</td>
				<td><input class="form-control" type="text" size="30" name="alamat" /></td>
			</tr>
			<tr>
				<td>
				No Telp</td>
				<td>:</td>
				<td><input class="form-control" type="text" size="30" name="no_tlp" /></td>
			</tr>
		</table>
		<input type="submit" class="btn btn-primary" value="Simpan" /> 
		</form>
	</main>