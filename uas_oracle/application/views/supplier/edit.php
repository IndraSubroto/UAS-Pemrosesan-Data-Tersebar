<main role="main" class="container">
	<form method="POST" action="<?php echo base_url();?>index.php/supplier/aksiedit"> 
		<table class="table">
			<tr>
				<td>
				Kode Supplier</td>
				<td>:</td>
				<td><input type="text" size="30" name="id_supplier" value="<?php echo $dtl['id_supplier'];?>" readOnly=true/></td>
			</tr>
			<tr>
				<td>
				Nama Supplier</td>
				<td>:</td>
				<td><input type="text" class="form-control" size="30" name="nm_supplier" value="<?php echo $dtl['nm_supplier'];?>"/></td>
			</tr>
			<tr>
				<td>
				Alamat Supplier</td>
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
		<input type="submit" class="btn btn-primary" value="Simpan" />
		</form>
		</p>
</main>