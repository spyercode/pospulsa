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
            <h3 class="panel-title"><i class="fa fa-dashboard"></i> Proveder</h3>
        </div>
        <div class="panel-body">
            <!-- Awal panel -->
            <!-- Awal Coding Lihat Data -->
            <div class="row">
                <div class="col-sm-3">
                    <?php
                    echo anchor('proveder/post', 'Tambah proveder', array('class' => 'btn btn-success btn-sm'))
                    ?>

                </div>
                <?php echo form_open('proveder/cari') ?>
                <div class="col-md-4">
                    <input type="text" name="cari" class="form-control">
                </div>
                <div class="col-md-4">
                    <button type="submit" name="submit" class="btn btn-danger">Cari data</button>
                </div>
                <?php echo form_close(); ?>
            </div>

            <hr>
            <table class="table table-striped">
                <tr><th><center>No</center></th><th><center>Nama proveder</center></th><th colspan="2"><center>Pilihan</center></th></tr>
                <?php
                $no = 1 + $this->uri->segment(3);
                foreach ($record->result() as $r) {
                    echo "<tr>
					            <td width='10'>$no</td>
					            <td>$r->nama_proveder</td>
					            <td width='10'>" . anchor('proveder/edit/' . $r->id_proveder, 'Edit',array('class'=>'btn btn-info')) . "</td>
					            <td width='10'>" . anchor('proveder/delete/' . $r->id_proveder, 'Delete',array('class'=>'btn btn-danger'))."</td>
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