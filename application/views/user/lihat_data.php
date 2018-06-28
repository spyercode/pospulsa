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
          <h3 class="panel-title"><i class="fa fa-dashboard"></i> User</h3>
        </div>
        <div class="panel-body">
<!-- Awal panel -->
<!-- Awal Coding Lihat Data -->
			<?php
			echo anchor('user/post','Tambah User',array('class'=>'btn btn-success btn-sm'))
			?>
			<hr>
			<table class="table table-striped">
				<tr><th><center>No</center></th><th><center>Nama Lengkap</center></th><th><center>Username</center></th><th><center>Level</center></th><th><center>Aktif</center></th><th colspan="2"><center>Pilihan</center></th></tr>
				<?php
					    $no=1+$this->uri->segment(3);
					    foreach ($record as $r)
					    {
					    	if ($r->active=='1'){ $active = "Aktif";} else {$active="Non Aktif";}
					        echo "<tr>
					            <td width='10'>$no</td>
					            <td>$r->nama_lengkap</td>
					            <td>$r->username</td>
					            <td>$r->level</td>
					            <td>".$active."</td>
					            <td width='10'>".anchor('user/edit/'.$r->id_user,'Edit')."</td>
					            <td width='10'>".anchor('user/delete/'.$r->id_user,'Delete')."</td>
					            </tr>";
					        $no++;
					    }
					    ?>
			</table>
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