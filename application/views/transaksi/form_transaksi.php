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
} else {
    $this->load->view('template/sidebaradmin');
};
?>
<!-- Akhir sidebar admin -->
<?php
echo form_open('transaksi/add');
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
                        <div class="col-sm-2">
                            <input name="no_hp" id="no_hp" required="" placeholder="Masukkan no hp" onkeyup="otomatis()" class="form-control">
                        
                        </div>       
                        <div class="col-sm-2">
                            <input name="nominal" id="nama_nominal" required="" placeholder="Masukkan nama nominal pulsa" readonly="" class="form-control">
                            <input type="hidden" name="id_nominal" id="id_nominal"> 
                        </div>
                        <div class="col-sm-2">
                            <input name="kategori" id="nama_kategori" required="" placeholder="kategori" readonly="" class="form-control">
                            <input type="hidden" name="id_kategori" id="id_kategori" placeholder="kategori" readonly="" class="form-control">
                        </div>
                        <div class="col-sm-2">
                            <input name="provedor" id="nama_proveder" required="" placeholder="provedor" readonly="" class="form-control">
                       </div>
                        <div class="col-sm-1">
                            <input type="text" name="qty" placeholder="QTY" required="" value="1" class="form-control" readonly="">
                        </div>  
                        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                        <?php echo anchor('transaksi/selesai_belanja', 'Selesai', array('class' => 'btn btn-success')) ?>
                    </td></tr>
            </table>
            <?php echo form_close(); ?>

            <div class="col-md-13">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-money"></i> Detail Transaksi</h3>
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
                            <?php
                            $kurang=1;
                            $a=0;
                            $total=0;
                            $no = 1;
                            foreach ($nominal as $row):
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row->nama_nominal; ?></td>

                                    <td><?php echo $row->nama_kategori; ?></td>
                                    
                                    <td><?php echo $row->nama_proveder; ?></td>
                                    
                                    <td><?php echo $a=$row->qty-$kurang; ?></td>
                                    <td><?php echo $row->harga_pulsa; ?></td>
                                    <td><?php echo $total=$row->harga_pulsa*$a; ?></td>
                                    <td><?php echo anchor('transaksi/batal/'.$row->id_transaksi,'CANCEL', array('class' => 'btn btn-danger')) ?></td>
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
<!-- Akhir Dashboard admin -->
<!-- Awal footer -->


<script type="text/javascript">
    function otomatis() {
        var no_hp = $("#no_hp").val();
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url() ?>transaksi/form_autocomplit',
            data: 'no_hp=' + no_hp,
            success: function (data) {
                var json = data,
                        obj = JSON.parse(json);
                $("#nama_nominal").val(obj.nama_nominal);
                $("#nama_kategori").val(obj.nama_kategori);
                $("#id_nominal").val(obj.id_nominal);
                $("#id_kategori").val(obj.id_kategori);
                $("#nama_proveder").val(obj.nama_proveder);
                $("#id_transaksi").val(obj.id_transaksi);

            }
        });
    }
</script>
<?php
$this->load->view('template/foot')
?>
<!-- Akhir footer -->