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
          <h3 class="panel-title"><i class="fa fa-dashboard"></i> Edit User</h3>
        </div>
        <div class="panel-body">
<!-- Awal panel -->
<!-- Awal Coding Data -->
			<?php
				echo form_open('user/edit');
			?>
			<input type="hidden" value="<?php echo $record['id_user']?>" name="id">
				<table class="table table-striped">
					<tr><td width="130">Nama Lengkap</td>
						<td><div class="col-sm-4""><input type="text" name="nama" placeholder="Nama lengkap" class="form-control" value="<?php echo $record['nama_lengkap']?>"></div>
						</td></tr>
						<tr><td width="130">Username</td>
						<td><div class="col-sm-4""><input type="text" name="username" placeholder="Username" class="form-control" value="<?php echo $record['username']?>"></div>
						</td></tr>
						<tr><td width="130">Password</td>
						<td><div class="col-sm-4""><input type="password" name="password" placeholder="Password" class="form-control" value=""></div>
						</td></tr>
						<tr><td width="130">Level</td>
					        <td><div class="col-sm-4"">
					        	 <select name="level" class="form-control">
					               <option value='karyawan'<?php if ($record['level']=='karyawan')
					               {
					               	echo " selected";
					               } 
					               else {
					               	echo "";
					               }
					               ?>>karyawan</option>
					               <option value='admin'
					               <?php if ($record['level']=='admin')
					               {
					               	echo " selected";
					               } 
					               else {
					               	echo "";
					               }
					               ?>
					               >admin</option>
					            </select>
					       </td></tr>
					       <tr><td width="130">Aktif</td>
					        <td><div class="col-sm-4"">
					        	 <select name="active" class="form-control">
					                <option value='1'>1</option>
					               <option value='0'>0</option>
					            </select>
					       </td></tr>
					    <tr><td colspan="2"><button type="submit" class="btn btn-primary btn-sm" name="submit">Simpan</button>
        				<?php echo anchor('user','Kembali',array('class'=>'btn btn-primary btn-sm'))?></td></tr>
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