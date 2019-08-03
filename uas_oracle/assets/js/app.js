$(document).ready(function () {
  $('#TableData').DataTable();
});


/*-------------------------------------------------*/
//supplier
$(function () {
  $(".typeahead").autocomplete({
    //source: "../api/get_supplier", // path to the get_birds method
    source: $('.typeahead').attr('data-link'),
    select: function (event, ui) {
      // Set autocomplete element to display the label
      this.value = ui.item.label;

      // Store value in hidden field
      $('.supplierKd').val(ui.item.value);
      //console.log(ui.item.value);
      // Prevent default behaviour
      return false;
    }
  });
});

//Barang/*===============================
$(function () {
  $(".brgInput").autocomplete({
    //source: "../api/get_supplier", // path to the get_birds method
    source: $('.brgInput').attr('data-link'),
    select: function (event, ui) {
      // Set autocomplete element to display the label
      this.value = ui.item.label;
      //$('.brgInput').val(ui.item.Label);
      // Store value in hidden field
      $('.barangKd').val(ui.item.value);
      //console.log(ui.item.value);
      // Prevent default behaviour
      return false;
    }
  });

  $('.qty').keyup(function () {
    var qty = $('.qty').val();
    var harga = $('.harga').val();
    $('.total').val(qty * harga);
  });
  $('.harga').keyup(function () {
    var qty = $('.qty').val();
    var harga = $('.harga').val();
    $('.total').val(qty * harga);
  });
});

/*

$(function(){
	$(this).closest("tr").find(".brgInput").autocomplete({
		source: $('.brgInput').attr('data-link'),
    	 select: function (event, ui) {
      	// Set autocomplete element to display the label
     	 this.value = ui.item.label;

     	 // Store value in hidden field
     	 $('.barangKd').val(ui.item.value);
      	//console.log(ui.item.value);
      	// Prevent default behaviour
     	 return false;
   }
	});
});

*/
// Edit Barang Ajax
$('.editBtn').on('click', function (e) {
  e.preventDefault();
  var kd_barang = $('.kd_barang').val();
  var nm_barang = $('.nm_barang').val();
  var jml_barang = $('.jml_barang').val();
  var harga = $('.harga').val();
  $.ajax({
    type: "POST",
    url: $('.editBtn').attr('act-prc'),
    data: {
      'kd_barang': kd_barang,
      'nm_barang': nm_barang,
      'jml_barang': jml_barang,
      'harga': harga
    },
    dataType: 'json',
    success: function (success) {
      if (success == 'success') {
        alert('Data masuk ke database');
        //location.reload();
        window.location.replace('../../barang');
      }
    }
  });

});
//pembelian Ajax
$('.actPembelian').on('click', function (z) {
  z.preventDefault();
  var kodetransaksi = $('.transaksiKd').val();
  var total = $('.total').val();
  var qty = $('.qty').val();
  var harga = $('.harga').val();
  var kd_barang = $('.barangKd').val();
  var kodesupplier = $('.supplierKd').val();
  var nm_barang = $('.brgInput').val();
  var namasupplier = $('.typeahead').val();
  //Post Ajax
  $.ajax({
    type: "POST",
    url: $('.actPembelian').attr('act-prc'),
    data: {
      'notransaksi': kodetransaksi,
      'kd_barang': kd_barang,
      'kodesupplier': kodesupplier,
      'qty': qty,
      'harga': harga,
      'total': total

    },
    dataType: 'json',
    success: function (response) {
      if (response == 'success') {
        alert('Data masuk ke database');
        //location.reload();
        window.location.replace('../pembelian');
      }
    }
  });
});

/*Penjualan JS */

$(function () {
  $(".custName").autocomplete({
    //source: "../api/get_supplier", // path to the get_birds method
    source: $('.custName').attr('data-link'),
    select: function (event, ui) {
      // Set autocomplete element to display the label
      this.value = ui.item.label;

      // Store value in hidden field
      $('.customerKd').val(ui.item.value);
      //console.log(ui.item.value);
      // Prevent default behaviour
      return false;
    }
  });
});


$('.jualTambah').on('click', function (z) {
  z.preventDefault();
  var kodetransaksi = $('.transaksiKd').val();
  var total = $('.total').val();
  var qty = $('.qty').val();
  var harga = $('.harga').val();
  var kd_barang = $('.barangKd').val();
  var kodecustomer = $('.customerKd').val();
  var nm_barang = $('.brgInput').val();
  var namacustomer = $('.custName').val();

  $('#tableJual tbody:last').append('<tr><td>' + kodetransaksi + '</td><td>' + kd_barang + '</td><td>' + kodecustomer + '</td><td>' + nm_barang + '</td><td>' + namacustomer + '</td><td>' + qty + '</td><td>' + harga + '</td><td>' + total + '</td></tr>');

  $('.custName').prop('disabled', true);
  $('.total').val('');
  $('.qty').val('');
  $('.harga').val('');
  $('.barangKd').val('');
  $('.brgInput').val('');
});

$('.jualBtnTransaksi').on('click', function (b) {
  b.preventDefault();
  var table = document.querySelector('#tableJual');
  var data = parseTable(table);
  var jsonData = { json: JSON.stringify(data) };
  //console.log(data);
  $.ajax({
    type: "POST",
    url: $('.jualBtnTransaksi').attr('act-link'),
    data: jsonData,
    dataType: 'json',
    success: function (success) {
      alert('Penjualan Berhasil');
      location.reload();
    }
  });
});

/*===========================================================================
$('.beliTambah').on('click',function(e){
  e.preventDefault();
        //simpan variable
        //alert($('.total').val());
        var kodetransaksi = $('.transaksiKd').val();
        var total         = $('.total').val();
        var qty           = $('.qty').val();
        var harga         = $('.harga').val();
        var kd_barang    = $('.barangKd').val();
        var kodesupplier  = $('.supplierKd').val();
        var nm_barang    = $('.brgInput').val();
        var namasupplier  = $('.typeahead').val();
        //tambah Baris

        //alert(kodesupplier);

        $('#tableBeli tbody:last').append('<tr><td>'+kodetransaksi+'</td><td>'+kd_barang+'</td><td>'+kodesupplier+'</td><td>'+nm_barang+'</td><td>'+namasupplier+'</td><td>'+qty+'</td><td>'+harga+'</td><td>'+total+'</td></tr>');


        
        $('.total').val('');
        $('.qty').val('');
        $('.harga').val('');
        $('.barangKd').val('');
        $('.supplierKd').val('');
        $('.brgInput').val('');
        $('.typeahead').val('');

});



$('.btnTransaksi').on('click',function(b){
    b.preventDefault();
    var table     = document.querySelector('#tableBeli');
    var data      = parseTable(table);
    var jsonData  = {json: JSON.stringify(data)};
    //console.log(data);
    $.ajax({
        type: "POST",
        url: $('.btnTransaksi').attr('act-link'), 
        data: jsonData,
        dataType: 'json'
    });
}); */

//hapus barangK

$('.hpsBr').on('click', function (a) {
  a.preventDefault();
  $.ajax({
    type: 'POST',
    url: $('.hpsBr').attr('act-link'),
    data: {
      'id': $('.hpsBr').attr('key')
    },
    success: function () {
      alert('Sukses Hapus');
      location.reload();
    }
  });
});