<main role="main" class="container">
	<form method="POST" action="<?php echo base_url();?>index.php/customer/aksiedit" class=""> 
		<table class="table">
			<tr>
				<td>
				Kode customer</td>
				<td>:</td>
				<td><input class="form-control" type="text" size="30" name="kd_customer" value="<?php echo $dtl['kd_customer'];?>" readOnly=true/></td>
			</tr>
			<tr>
				<td>
				Nama customer</td>
				<td>:</td>
				<td><input type="text" class="form-control" size="30" name="username" value="<?php echo $dtl['username'];?>"/></td>
			</tr>
			<tr>
				<td>
				Alamat customer</td>
				<td>:</td>
				<td><input type="text" class="form-control" size="30" name="alamat" value="<?php echo $dtl['alamat'];?>"/></td>
			</tr>
			<tr>
				<td>
				No Telp</td>
				<td>:</td>
				<td><input type="text" class="form-control" size="30" name="no_tlp" value="<?php echo $dtl['no_tlp'];?>"/></td>
			</tr>
		</table>
		<input type="submit" value="Simpan" class="btn btn-primary" />
		</form>
	</main>