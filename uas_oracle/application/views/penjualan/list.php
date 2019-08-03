<main role="main" class="container">
		<?php 
			if(!empty($beli)){
				$no = 1;
				?>
					<table id="TableData" class="table table-striped">
						<thead>
						<tr>
							<th>NO</th>
							<th>Kode Transaksi</th>
							<th>Nama Barang</th>
							<th>Nama Customer</th>
							<th>Tanggal</th>
						</tr>
						</thead>
						<tbody>
						<?php
							foreach ($beli as $s => $d) {
								?>
									<tr>
										<td><?php echo $no++;?></td>
										<td><?php echo $d['kd_transaksi'];?></td>
										<td><?php echo $d['nm_barang'];?></td>
										<td><?php echo $d['username'];?></td>
										<td><?php echo $d['tgl'];?></td>
									</tr>
								<?php 
							}
						?>
						</tbody>
					</table>
				<?php
			}else{
				?>
					<h3>Data pembelian kosong</h3>
				<?php
			}

		?>
</main>