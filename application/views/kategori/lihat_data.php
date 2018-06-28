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
          <h3 class="panel-title"><i class="fa fa-dashboard"></i> Kategori</h3>
        </div>
        <div class="panel-body">
<!-- Awal panel -->
<!-- Awal Coding Lihat Data -->
			<?php
			echo anchor('kategori/post','Tambah Kategori',array('class'=>'btn btn-success btn-sm'))
			?>
			<hr>
			<table class="table table-striped">
				<tr><th><center>No</center></th><th><center>Nama Kategori</center></th><th colspan="2"><center>Pilihan</center></th></tr>
				<?php
					    $no=1+$this->uri->segment(3);
					    foreach ($record->result() as $r)
					    {
					        echo "<tr>
					            <td width='10'>$no</td>
					            <td>$r->nama_kategori</td>
					            <td width='10'>".anchor('kategori/edit/'.$r->id_kategori,'Edit')."</td>
					            <td width='10'>".anchor('kategori/delete/'.$r->id_kategori,'Delete')."</td>
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