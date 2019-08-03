<main role="main" class="container">
		</p>
		</p>
		</p>
		<hr>
			<h4>Data Penjualan</h4>
		<hr>
		<table class="table table-striped">
			<tr>
				<td>
				No Transaksi</td>
				<td>:</td>
				<td>
				
				<span class="label"><?php echo $dtl->notransaksi;?></span>

				</td>

			</tr>
			<tr>
				<td>
				No PO</td>
				<td>:</td>
				<td><span class="label"><?php echo $dtl->no_po;?></span></td>
			</tr>
			<tr>
				<td>
				Nama Customer</td>
				<td>:</td>
				<td>
				<span class="label"><?php echo $dtl->namacustomer;?></span>
				</td>
			</tr>
			<tr>
				<td>
				Tanggal Transaksi Penjualan</td>
				<td>:</td>
				<td>
				<span class="label"><?php echo $dtl->tanggal;?></span>
				</td>
			</tr>
		
		</table>


		</p>
		</p>
		</p>
		<hr>
			<h4>Daftar Item</h4>
		<hr>
		<?php

		if(empty($jualDtl)){

		}else{
			?>
				<table class="table table-striped table-bordered dataTable" id="TableData">
					<thead>
						<tr>
							<th>NO</th>
							<th>Nama Barang</th>
							<th>jumlah</th>
							<th>harga</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$no = 1;
							foreach($jualDtl as $d){
								?>
								<tr>
									<td><?php echo $no++;?></td>
									<td><?php echo $d['nm_barang'];?></td>
									<td><?php echo $d['jml'];?></td>
									<td><?php echo $d['harga'];?></td>
								</tr>

								<?php 
							}

						?>
					</tbody>

				</table>
			<?php
		}
		?>
		<a href="<?php echo base_url();?>index.php/penjualan/"><btn class="btn btn-primary">Kembali!</btn></a>
				


		
	</main>