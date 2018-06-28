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
          <h3 class="panel-title"><i class="fa fa-dashboard"></i> Edit Proveder</h3>
        </div>
        <div class="panel-body">
<!-- Awal panel -->
<!-- Awal Coding Data -->
			<?php
				echo form_open('proveder/edit');
			?>
			<input type="hidden" value="<?php echo $record['id_proveder']?>" name="id">
				<table class="table table-bordered">
					<tr><td width="130">Nama Proveder</td>
						<td><div class="col-sm-4""><input type="text" name="proveder" placeholder="proveder" class="form-control" value="<?php echo $record['nama_proveder']?>"></div>
						</td></tr>
						 <tr><td colspan="2"><button type="submit" class="btn btn-primary btn-sm" name="submit">Simpan</button> 
						 <?php echo anchor('proveder','Kembali',array('class'=>'btn btn-primary btn-sm'))?></td></tr>
				</table>
						</form>
<!-- Akhir Coding  Data -->
    </div>
  </div>
</div>
<!-- Akhir Dashboard admin -->
<!-- Awal footer -->
<?php
$this->load->view('template/foot')
?>
<!-- Akhir footer -->