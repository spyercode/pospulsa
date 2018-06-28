<!DOCTYPE html>
<html>
<head>
  <title> Sistem Informasi Penjualan Pulsa</title>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
  <script src="<?php echo base_url('assets/js/jquery.min.js') ?>" type="text/javascript"></script>
  <script src="<?php echo base_url('assets/js/popper.min.js') ?>" type="text/javascript"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"></button>
      <a class="navbar-brand"><h4><b>Promo Lawu Cellular Saat Ini:</b></h4></a>
      <marquee behavior="scroll" scrollamount="15" direction="left" width="900">
        <h3><p class="black">[Promo Paket Data] Telkomsel 1GB: 22 Ribu | Telkomsel 2GB: 40 Ribu  |  Telkomsel 6GB: 55 Ribu  |  Telkomsel 11GB: 62 Ribu  |  Indosat 1GB: 15 Ribu  |  Indosat 2GB: 22 Ribu  |  Tri 1GB: 15 Ribu  |  Tri 2GB: 22 Ribu  |  Tri 30GB: 72 Ribu  |  Axis 1GB: 15 Ribu  | Axis 2GB: 22 Ribu  |  Axis 3GB:  32 Ribu</p></h3>
      </marquee>
    </div>
  </div>
</nav>
<!--Awal panel-->
<div class="container">
  <div class="panel-group">
    <div class="panel panel-primary">
      <div class="panel-heading"><h4><center>Selamat Datang di Lawu Cellular. :) Silahkan Pilih Jenis Pulsa</center></h4></div>
      <div class="panel-body"></div>
      <!--Awal nav-tabs-->
        <div class="container">
          <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">Pulsa Regular</a></li>
            <li><a data-toggle="tab" href="#menu1">Paket Data</a></li>
            <li><a data-toggle="tab" href="#menu2">Listrik PLN</a></li>
          </ul>
        <div class="tab-content">
          <div id="home" class="tab-pane fade in active">
            <!--Awal form input-->
        <div class="container">
        <form>
          <div class="form-group row">
            <div class="col-xs-4">
              <label for="ex3">Masukkan Nomor HP</label>
              <input class="form-control" id="ex2" type="text">
            </div>
            <div class="col-xs-4">
              <label for="ex3">Pilih Nominal</label>
              <input class="form-control" id="ex3" type="text">
            </div>
            <div class="col-xs-2">
              <label for="disabledInput" for="ex1">Harga Pulsa</label>
              <input class="form-control" id="disabledInput" type="text" disabled>
            </div>
              <div class="col-xs-2">
              <label for="ex1">Klik Beli Pulsa</label>
              <button type="submit" class="btn btn-primary" id="ex1">Beli Pulsa</button>
              <!--Awal modal-->
              <!--Akhir modal-->
            </div>
          </div>
        </form>
      </div>
        <!--Akhir form input-->
          </div>
          <div id="menu1" class="tab-pane fade">
            <!--Awal form input-->
        <div class="container">
        <form>
          <div class="form-group row">
            <div class="col-xs-4">
              <label for="ex3">Masukkan Nomor HP</label>
              <input class="form-control" id="ex2" type="text">
            </div>
            <div class="col-xs-4">
              <label for="ex3">Pilih Nominal</label>
              <input class="form-control" id="ex3" type="text">
            </div>
            <div class="col-xs-2">
              <label for="disabledInput" for="ex1">Harga Paket Data</label>
              <input class="form-control" id="disabledInput" type="text" disabled>
            </div>
              <div class="col-xs-2">
              <label for="ex1">Klik Beli Paket</label>
              <button type="submit" class="btn btn-primary" id="ex1">Beli Paket</button>
            </div>
          </div>
        </form>
      </div>
        <!--Akhir form input-->
          </div>
          <div id="menu2" class="tab-pane fade">
            <!--Awal form input-->
        <div class="container">
        <form>
          <div class="form-group row">
            <div class="col-xs-4">
              <label for="ex3">Masukkan No. Meter/ID Pelanggan</label>
              <input class="form-control" id="ex2" type="text">
            </div>
            <div class="col-xs-4">
              <label for="ex3">Pilih Nominal</label>
              <input class="form-control" id="ex3" type="text">
            </div>
            <div class="col-xs-2">
              <label for="disabledInput" for="ex1">Harga Token PLN</label>
              <input class="form-control" id="disabledInput" type="text" disabled>
            </div>
              <div class="col-xs-2">
              <label for="ex1">Klik Beli Token</label>
              <button type="submit" class="btn btn-primary" id="ex1">Beli Token</button>
            </div>
          </div>
        </form>
      </div>
        <!--Akhir form input-->
          </div>
        </div>
      </div>
      <!--Akhir nav-tab-->
        <hr>
    </div>
  </div>
</div>


<!-- Trigger the modal with a button -->
<div class="container-fluid bg-3 text-center">    
  <h3>JANGAN LEWATKAN PROMO HARI INI!</h3>
  <div class="row">
    <div class="col-sm-3">
      <p><b>Promo Power Bank Real Capacity</b></p>
      <img src="<?php echo base_url(); ?>assets/images/pb.png" class="img-responsive" style="width:100%" alt="Image">
    </div>
    <div class="col-sm-3"> 
      <p><b>Promo Flash Disk 8GB Termurah</b></p>
      <img src="<?php echo base_url(); ?>assets/images/fd.png" class="img-responsive" style="width:100%" alt="Image">
    </div>
    <div class="col-sm-3"> 
      <p><b>Promo Memory 16GB V-Gen Original</b></p>
      <img src="<?php echo base_url(); ?>assets/images/memory.png" class="img-responsive" style="width:100%" alt="Image">
    </div>
    <div class="col-sm-3">
      <p><b>Promo Headset Super Bass</b></p>
      <img src="<?php echo base_url(); ?>assets/images/hf.png" class="img-responsive" style="width:100%" alt="Image">
    </div>
  </div>
</div><br>
</body>
</html>