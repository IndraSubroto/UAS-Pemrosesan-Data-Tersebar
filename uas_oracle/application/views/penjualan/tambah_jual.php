<main role="main" class="container">
<!--	<form method="post" action="<?php echo base_url();?>index.php/pembelian/aksitambah">-->
		<div>
	<table class="table table-striped">
			<tr>
				<td>
				Kode Transaksi</td>
				<td>:</td>
				<td><input class="form-control transaksiKd" type="text" size="30" name="notransaksi" value="<?php echo generateKdJual();?>" readOnly=true/></td>
			</tr>
			<tr>
				<td>
				Nama Customer</td>
				<td>:</td>
				<td><input class="form-control custName" type="text" size="30" name="namacustomer" data-link="<?php echo base_url();?>index.php/api/get_customer"/>
				<input type="hidden" name="kodecustomer" class="form-control customerKd" value="" id="kdCustomer"/>
						
				</td>
			</tr>
			<tr>
				<td>
				Nama Barang</td>
				<td>:</td>
				<td><input class="form-control brgInput" type="text" size="30" id="namabarang" name="namabarang" data-link="<?php echo base_url();?>index.php/api/get_barang"/>
				<input type="hidden" name="kodebarang" class="form-control barangKd" value="" id="kdBarang" />
						<!--<input type="text" id="country" autocomplete="on" data-toogle="dropdown" name="country" class="form-control" placeholder="Type to get an Ajax call of Countries">        
                    <ul class="dropdown-menu txtcountry" style="margin-left:15px;margin-right:0px;" role="menu" aria-labelledby="dropdownMenu"  id="DropdownCountry"></ul>-->

				</td>
			</tr>
			<tr>
				<td>
				QTY</td>
				<td>:</td>
				<td><input class="form-control qty" type="text" size="30" name="qty" /></td>
			</tr>
			<tr>
				<td>
				Harga Satuan</td>
				<td>:</td>
				<td><input class="form-control harga" type="text" size="30" name="harga" /></td>
			</tr>
			<tr>
				<td>
				Total</td>
				<td>:</td>
				<td><input class="form-control total" type="text" size="30" name="total" readonly="true" /></td>
			</tr>
		</table>
		<!--<input type="submit" class="btn btn-primary" value="Simpan"/>-->
		<button class="btn btn-secondary jualTambah">Tambah Barang</button> | <button class="btn btn-primary jualBtnTransaksi" act-link="<?php echo base_url();?>index.php/penjualan/aksijual">Transaksi!</button>
		</div>
		<hr>
		<div>
		<table class="table table-striped" id="tableJual">
		<thead>
			<tr>
				<th>Kode Transaksi</th>
				<th>Kode Barang</th>
				<th>Kode Customer</th>
				<th>Nama Barang</th>
				<th>Supplier</th>
				<th>QTY</th>
				<th>Jumlah</th>
				<th>total</th>
			</tr>
		</thead>
		<tbody>
			
		</tbody>
		</table>
		</div>
		<hr>
</main>