<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>Aplikasi Penjualan</title>
    <link href="<?php echo base_url();?>bower_components/bootstrap4/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/app.css" rel="stylesheet">
    <link href="<?php echo base_url();?>bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>bower_components/datatables/media/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>bower_components/select2/dist/css/select2.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>bower_components/jquery-ui/themes/base/jquery-ui.min.css" rel="stylesheet">
  </head>
  <body>
  <header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light" >
  <a class="navbar-brand" href="#">Aplikasi Penjualan</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>index.php/barang">Barang</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>index.php/customer">Customer</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>index.php/supplier">Supplier</a>
      </li>
      <!--<li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>-->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Transaksi
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?php echo base_url();?>index.php/penjualan">Penjualan</a>
          <a class="dropdown-item" href="<?php echo base_url();?>index.php/pembelian">Pembelian</a>
          <!--<a class="dropdown-item" href="#">Something else here</a>-->
        </div>
      </li>
    </ul>
  </div>
</nav>
</header>
