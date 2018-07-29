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
<!--Hak akses-->

<!--Akhir hak akses-->
<!-- Awal Dashboard admin -->


<div class="col-md-9">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-money"></i> Form Transaksi</h3>
        </div>
               <?php  echo form_open('pembelian/post') ?>
   
        <div class="panel-body">
            <!-- Awal panel -->
            <!-- Awal Coding Lihat Data -->
            <table class="table table-striped">
          <tr><td width="130">Pilih Nominal</td>
                  <td><div class="col-sm-4">
                          <?php echo cmb_dinamis('nominal','nominal','nama_nominal','id_nominal') ?>
                 </td></tr>
                 <tr>
                     <td width="130">Pilih Kategori</td>
                  <td>
                      <div class="col-sm-4">
                          
                          <?php echo cmb_dinamis('kategori','kategori','nama_kategori','id_kategori') ?>
                 </td></tr>
                 <tr><td width="130">Pilih Provider</td>
                  <td><div class="col-sm-4">
                          
                          <?php echo cmb_dinamis('proveder','proveder','nama_proveder','id_proveder') ?>
                 </td></tr>
                 <tr><td width="130">Deskripsi Pulsa</td>
                  <td><div class="col-sm-12"><textarea type="text" name="deskripsi" class="form-control" placeholder="Masukkan deskripsi"></textarea></div>
                 </td></tr>
                 <tr><td width="130">Harga Pokok</td>
                  <td><div class="col-sm-4"><input type="text" name="hpp" class="form-control" placeholder="Harga pokok"></div>
                 </td></tr>
                 <tr><td width="130">Qty</td>
                  <td><div class="col-sm-4"><input type="text" name="stok" class="form-control" placeholder="Qty"></div>
                 </td></tr>
              <tr><td colspan="2"><button type="submit" class="btn btn-primary btn-sm" name="submit">Simpan</button>
                  <?php echo anchor('nominal','Kembali',array('class'=>'btn btn-primary btn-sm'))?>
                  </td></tr>
          </table>
            <?php echo form_close(); ?>

            <div class="col-md-13">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-money"></i> Detail Transaksi Pembelian</h3>
                    </div>
                    <div class="panel-body">
                            <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Nama Pulsa</th>
                <th>Kategori</th>
                <th>Provider</th>
                <th>Qty</th>
                <th>Harga</th>
                <th>Subtotal</th>
                <th>Cancel</th>
            </tr>
            <tr>
                <?php 
                $total=0;
                $no=1;
                foreach ($transaksi as $row): 
                ?>
                <td><?php echo $no; ?></td>
                <td><?php echo $row->nama_nominal; ?></td>
                <td><?php echo $row->nama_kategori; ?></td>
                <td><?php echo $row->nama_proveder; ?></td>
                <td><?php echo $row->qty; ?></td>
                <td><?php echo $row->harga_pokok; ?></td>
                <td><?php echo $total=$row->qty*$row->harga_pokok; ?></td>
                <td><?php echo anchor('pembelian/cancel/'.$row->id,'Cancel', array('class' => 'btn btn-danger')) ?></td>
                 </tr>
                    <?php $no++; ?>
                
                <?php endforeach; ?>
           
          </table>
      
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Akhir Coding Lihat Data -->
</div>
</div>
</div>
<?php
$this->load->view('template/foot')
?>
<!-- Akhir footer -->