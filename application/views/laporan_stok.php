<center><p><b>LAPORAN TRANSAKSI PENJUALAN PULSA</b></p></center>

<center><p>LAWU CELLULAR</p></center>

<center><p>29/06/2018</p></center>
<center>
<table border="1" cellspacing="0" cellpadding="0" > 
<tbody>
<tr>
<td><p>No.</p></td>
<td><p>Tanggal</p></td>
<td><p>Kategori</p>

<p>Pulsa</p></td>
<td><p>Provider</p></td>
<td><p>Nominal Pulsa</p></td>
<td><p>stok pulsa</p></td>

</tr>
<tr>
 <?php 
 $keseluruhan=0;
 $harga=0;
 $no=1;
foreach ($laporan as $row):
  ?>
<td valign="top" ><p><?php echo $no ?></p></td>
<td valign="top" ><p><?php echo $row->tanggal; ?></p></td>
<td valign="top" ><p><?php echo $row->nama_kategori; ?></p></td>
<td valign="top" ><p><?php echo $row->nama_proveder; ?></p></td>
<td valign="top" ><p><?php echo $row->nama_nominal; ?></p></td>
<td valign="top" ><p><?php echo $row->qty; ?></p></td>
</tr>
<?php $no++;
$keseluruhan=$keseluruhan+($row->harga_pokok*$row->qty);
?>
<?php endforeach; ?>
</tbody>
</table>
</center>