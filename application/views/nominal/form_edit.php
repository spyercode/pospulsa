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
          <h3 class="panel-title"><i class="fa fa-dashboard"></i> Edit Nominal</h3>
        </div>
        <div class="panel-body">
<!-- Awal panel -->
<!-- Awal Coding Lihat Data -->
			<?php
			echo form_open('nominal/edit');
			?>
			<input type="hidden" name="id" value="<?php echo $record['id_nominal']?>">
			<table class="table table-striped">
			    <tr><td width="120">Nama Nominal</td>
			        <td><input type="text" class="form-control"  name="nama_nominal" value="<?php echo $record['nama_nominal']?>" placeholder="Nama nominal">
			       </td></tr>
			    <tr><td>Kategori</td><td>
            	<select name="kategori" class="form-control" >
                <?php
                foreach ($kategori as $k)
                {
                    echo "<option value='$k->id_kategori'";
                    echo $record['id_kategori']==$k->id_kategori?'selected':'';
                    echo">$k->nama_kategori</option>";
                }
                ?>
            	</select>
        		</td></tr>
        		<tr><td>Provider</td><td>
					<select name="proveder" class="form-control">
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
					    <tr><td>Harga Pokok</td>
        				<td><input type="text" class="form-control"  name="hpp" value="<?php echo $record['hpp']?>" placeholder="Harga Pokok">
       					</td></tr>
					    <tr><td>Harga Jual</td>
        				<td><input type="text" class="form-control"  name="harga_jual" value="<?php echo $record['harga_jual']?>" placeholder="Harga Jual">
       					</td></tr>
					    </td></tr>
					    <tr><td>Stok</td>
        				<td><input type="text" class="form-control"  name="harga" value="<?php echo $record['stok']?>" placeholder="Stok">
       					</td></tr>
    <tr><td colspan="2"><button type="submit" class="btn btn-primary btn-sm" name="submit">Simpan</button>
        <?php echo anchor('nominal','Kembali',array('class'=>'btn btn-primary btn-sm'))?></td></tr>
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