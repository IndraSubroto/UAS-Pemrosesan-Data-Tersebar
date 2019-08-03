<main role="main" class="container">
<!--	<form method="post" action="<?php echo base_url();?>index.php/pembelian/aksitambah">-->
		<div>
	<table class="table table-striped">
			<tr>
				<td>
				Nama Supplier</td>
				<td>:</td>
				<td><input class="form-control typeahead" type="text" size="30" name="nm_supplier" data-link="<?php echo base_url();?>index.php/api/get_supplier"/>
				<input type="hidden" name="kodesupplier" class="form-control supplierKd" value="" id="kdSupplier"/>
						<!--<input type="text" id="country" autocomplete="on" data-toogle="dropdown" name="country" class="form-control" placeholder="Type to get an Ajax call of Countries">        
                    <ul class="dropdown-menu txtcountry" style="margin-left:15px;margin-right:0px;" role="menu" aria-labelledby="dropdownMenu"  id="DropdownCountry"></ul>-->

				</td>
			</tr>
			<tr>
				<td>
				Nama Barang</td>
				<td>:</td>
				<td><input class="form-control brgInput" type="text" size="30" id="namabarang" name="nm_barang" data-link="<?php echo base_url();?>index.php/api/get_barang"/>
				<input type="hidden" name="kodebarang" class="form-control barangKd" value="" id="kdBarang" />
						<!--<input type="text" id="country" autocomplete="on" data-toogle="dropdown" name="country" class="form-control" placeholder="Type to get an Ajax call of Countries">        
                    <ul class="dropdown-menu txtcountry" style="margin-left:15px;margin-right:0px;" role="menu" aria-labelledby="dropdownMenu"  id="DropdownCountry"></ul>-->

				</td>
			</tr>
			<tr>
				<td>
				QTY</td>
				<td>:</td>
				<td><input class="form-control qty" type="text" size="30" name="jml" /></td>
			</tr>
			<tr>
				<td>
				Harga Satuan</td>
				<td>:</td>
				<td><input class="form-control harga" type="text" size="30" name="harga" /></td>
			</tr>

		</table>
		<!--<input type="submit" class="btn btn-primary" value="Simpan"/>-->
		<button class="btn btn-secondary actPembelian" act-prc="<?php echo base_url();?>index.php/pembelian/aksipembelian">Proses Pembelian!</button> 
		</div>
		<hr>
		
</main>