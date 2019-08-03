<main role="main" class="container">
		<table class="table table-striped">
			<tr>
				<td>
				Kode Supplier</td>
				<td>:</td>
				<td><?php echo $dtl['id_supplier'];?></td>
			</tr>
			<tr>
				<td>
				Nama Supplier</td>
				<td>:</td>
				<td><?php echo $dtl['nm_supplier'];?></td>
			</tr>
			<tr>
				<td>
				Alamat Supplier</td>
				<td>:</td>
				<td><?php echo $dtl['alamat'];?></td>
			</tr>
			<tr>
				<td>
				No Telp</td>
				<td>:</td>
				<td><?php echo $dtl['no_tlp'];?></td>
			</tr>
		</table>
		<a href="<?php echo base_url();?>index.php/supplier"><button class="btn btn-primary">Kembali</button></a>
</main>