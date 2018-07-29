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
<td><p>qty</p></td>

<td><p>harga beli</p></td>
<td><p>jumlah beli</p></td>

<td><p>Shif Karyawan</p></td>
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
<td valign="top" ><p><?php echo $row->harga_pokok;?></p></td>
<td valign="top" ><p><?php echo $harga=$row->harga_pokok*$row->qty; ?></p></td>
<td valign="top" ><?php echo $row->nama_lengkap ?></p></td>
</tr>
<?php $no++;
$keseluruhan=$keseluruhan+($row->harga_pokok*$row->qty);
?>
<?php endforeach; ?>
<tr>
 <?php 
 $ti=0;
 $total=$this->db->query("SELECT SUM(qty) as total, SUM(harga_pokok) AS har FROM `transaksi_pembelian`")->result();  

 foreach ($total as $row):
 ?>
    
<td colspan="5" valign="top" ><p>TOTAL</p></td>
<td valign="top" ><p><?php echo $row->total ?></p></td>
<td valign="top" ><p><?php echo $row->har ?></p></td>
<td valign="top" ><p><?php echo $keseluruhan; ?></p></td>
<td valign="top" > </td>
<td valign="top" > </td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</center>