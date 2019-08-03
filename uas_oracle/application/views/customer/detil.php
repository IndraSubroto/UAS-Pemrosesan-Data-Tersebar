<main class="container" role="main">
		<table class="table">
			<tr>
				<td>
				Kode customer</td>
				<td>:</td>
				<td><?php echo $dtl['kd_customer'];?></td>
			</tr>
			<tr>
				<td>
				Nama customer</td>
				<td>:</td>
				<td><?php echo $dtl['username'];?></td>
			</tr>
			<tr>
				<td>
				Alamat customer</td>
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
		<a href="<?php echo base_url();?>index.php/customer"><button class="btn btn-secondary">Kembali</button></a>
</main>