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
<td><p>Jumlah</p>

<p>Penjualan</p></td>
<td><p>Hpp</p></td>
<td><p>profit</p>

<p>Penjualan</p></td>
<td><p>Shif Karyawan</p></td>
</tr>
<tr>
 <?php 
 $keseluruhan=0;
 $harga=0;
 $no=1;
foreach ($laporan as $row):
    $h=$row->qty-1;
    $x[]=$h;
  ?>
<td valign="top" ><p><?php echo $no ?></p></td>
<td valign="top" ><p><?php echo $row->tanggal; ?></p></td>
<td valign="top" ><p><?php echo $row->nama_kategori; ?></p></td>
<td valign="top" ><p><?php echo $row->nama_proveder; ?></p></td>
<td valign="top" ><p><?php echo $row->nama_nominal; ?></p></td>
<td valign="top" ><p><?php echo $h; ?></p></td>
<td valign="top" ><p><?php echo $row->harga_pulsa;?></p></td>
<td valign="top" ><p><?php echo $harga=$row->harga_pulsa*$h; ?></p></td>
<td valign="top" ><?php echo $row->nama_lengkap ?></p></td>
</tr>
<?php $no++;
$keseluruhan=$keseluruhan+($row->harga_pulsa*$h);
?>
<?php endforeach; ?>
<tr>
 <?php 
 $ti=0;
 $total=$this->db->query("SELECT SUM(qty)-3 as total, SUM(harga_pulsa) AS har FROM `transaksi`")->result();  
  
 foreach ($total as $row):
 ?>
    
<td colspan="5" valign="top" ><p>TOTAL</p></td>
<td valign="top" ><p><?php echo array_sum($x) ?></p></td>
<td valign="top" ><p><?php echo $row->har ?></p></td>
<td valign="top" ><p><?php echo $keseluruhan; ?></p></td>
<td valign="top" > </td>
<td valign="top" > </td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</center>