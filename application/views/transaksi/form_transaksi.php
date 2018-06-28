<?php
$this->load->view('template/head');
?>

<!-- CSS -->
<!--tambahkan custom css disini-->
<!-- iCheck -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
  <script src="<?php echo base_url('assets/js/jquery.min.js') ?>" type="text/javascript"></script>
  <script src="<?php echo base_url('assets/js/popper.min.js') ?>" type="text/javascript"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
<!-- Akhir CSS -->

<!-- Awal sidebar admin -->
<?php
if ($this->session->userdata('level') == "karyawan") {
    $this->load->view('template/sidebar');
    }
    else {
    $this->load->view('template/sidebaradmin');
    };
?>
<!-- Akhir sidebar admin -->
<?php
echo form_open('transaksi');
?>
<!-- Awal Dashboard admin -->
<div class="col-md-9">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="fa fa-money"></i> Form Transaksi</h3>
        </div>
        <div class="panel-body">
<!-- Awal panel -->
<!-- Awal Coding Lihat Data -->
            <table class="table table-bordered">
              <tr><td>
              <div class="col-sm-8">

                <input list="nominal" name="nominal" placeholder="Masukkan nama nominal pulsa" class="form-control">
              </div>
              <div class="col-sm-1">
                <input type="text" name="qty" placeholder="QTY" class="form-control">
              </div>
                  <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                  <?php echo anchor('transaksi/selesai_belanja','Selesai',array('class'=>'btn btn-success')) ?>
              </td></tr>
            </table>

    <div class="col-md-13">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="fa fa-money"></i> Detail Transaksi</h3>
        </div>
        <div class="panel-body">
          <table class="table table-bordered">
            <tr><th>No</th><th>Nama Pulsa</th><th>Kategori</th><th>Provider</th><th>Qty</th><th>Harga</th><th>Subtotal</th><th>Cancel</th></tr>
            <tr><td colspan="7"><p align="right">Total</p></td><td></td></tr>
          </table>
            <datalist id="nominal">
            <?php
              foreach ($nominal->result() as $n)
              {
              echo "<option value='$n->nama_nominal'>";
              }
            ?>
            </datalist>
        </div>
      </div>
    </div>
  </div>
</div>



            
<!-- Akhir Coding Lihat Data -->
    </div>
  </div>
</div>
<!-- Akhir Dashboard admin -->
<!-- Awal footer -->
<?php
$this->load->view('template/foot')
?>
<!-- Akhir footer -->