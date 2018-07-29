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
            <h3 class="panel-title"><i class="fa fa-dashboard"></i> Nominal</h3>
        </div>
        <div class="panel-body">
            <!-- Awal panel -->
            <!-- Awal Coding Lihat Data -->

            <div class="row">
                <div class="col-sm-3"><?php
                    echo anchor('nominal/post', 'Tambah Nominal', array('class' => 'btn btn-success btn-sm'))?></div>
                 <?php echo form_open('nominal/cari'); ?>
                <div class="col-md-4">
                    <input type="text" name="cari" class="form-control">
                </div>
                <div class="col-md-4">
                    <button type="submit" name="submit" class="btn btn-danger">Cari data</button>
                </div>
             </div>
            <?php echo form_close(); ?>
            <hr>
            <table class="table table-striped">
                <tr><th><center>No</center></th><th><center>Nama Pulsa</center></th><th><center>Ketegori Pulsa</center></th><th><center>Proveder Pulsa</center></th><th><center>Deskripsi Pulsa</center></th><th><center>Harga Pokok</center></th><th><center>Harga Jual</center></th><th><center>Stok Pulsa</center></th><th colspan="2"><center>Operasi</center></th></tr>
                <?php
                $no = 1 + $this->uri->segment(3);
                foreach ($record as $r) {
                    echo "<tr>
					            <td width='10'>$no</td>
					            <td>$r->nama_nominal</td>
					            <td>$r->nama_kategori</td>
					            <td>$r->nama_proveder</td>
					            <td>$r->deskripsi</td>
					            <td>$r->hpp</td>
					            <td>$r->harga_jual</td>
					            <td>$r->stok</td>
					            <td width='10'>" . anchor('nominal/edit/' . $r->id_nominal, 'Edit',array('class'=>'btn btn-info')) . "</td>
					            <td width='10'>" . anchor('nominal/delete/' . $r->id_nominal, 'Delete',array('class'=>'btn btn-danger')) . "</td>
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