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
$this->load->view('template/sidebaradmin');
?>
<!-- Akhir sidebar admin -->
<!-- Awal Dashboard admin -->
<div class="col-md-9">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="fa fa-dashboard"></i> Tambah Nominal</h3>
        </div>
        <div class="panel-body">
<!-- Awal panel -->
<!-- Awal Coding Lihat Data -->
			<?php
			echo form_open('nominal/post');
			?>
				<table class="table table-striped">
					<tr><td width="130">Nominal Pulsa</td>
					        <td><div class="col-sm-4""><input type="text" name="nama_nominal" class="form-control" placeholder="Nama nominal pulsa"></div>
					       </td></tr>
					       <tr><td width="130">Kategori Pulsa</td>
					        <td><div class="col-sm-4"">
					        	 <select name="id_kategori" class="form-control">
					                <?php
					                foreach ($kategori as $k)
					                {
					                    echo "<option value='$k->id_kategori'>$k->nama_kategori</option>";
					                }
					                ?>
					            </select>
					       </td></tr>
					       <tr><td width="130">Provider Pulsa</td>
					        <td><div class="col-sm-4"">
					        	<select name="id_proveder" class="form-control">
					                <?php
					                foreach ($proveder as $p)
					                {
					                    echo "<option value='$p->id_proveder'>$p->nama_proveder</option>";
					                }
					                ?>
					            </select>
					       </td></tr>
					       <tr><td width="130">Deskripsi Pulsa</td>
					        <td><div class="col-sm-12"><textarea type="text" name="deskripsi" class="form-control" placeholder="Masukkan deskripsi"></textarea></div>
					       </td></tr>
					       <tr><td width="130">Harga Pokok</td>
					        <td><div class="col-sm-4""><input type="text" name="hpp" class="form-control" placeholder="Harga pokok"></div>
					       </td></tr>
					       <tr><td width="130">Harga Jual</td>
					        <td><div class="col-sm-4""><input type="text" name="harga_jual" class="form-control" placeholder="Harga jual"></div>
					       </td></tr>
					       <tr><td width="130">Stok</td>
					        <td><div class="col-sm-4""><input type="text" name="stok" class="form-control" placeholder="Stok"></div>
					       </td></tr>
					    <tr><td colspan="2"><button type="submit" class="btn btn-primary btn-sm" name="submit">Simpan</button>
					        <?php echo anchor('nominal','Kembali',array('class'=>'btn btn-primary btn-sm'))?>
					        </td></tr>
					</table>
					</form>
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