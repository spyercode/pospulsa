<?php

class Model_pembelian_detail extends CI_model{
	
	function insert_temp()
	{
		$id_nominal		= $_GET['id_nominal'];
		$id_kategori	= $_GET['id_kategori'];
		$id_proveder	= $_GET['id_proveder'];
		$hpp			= $_GET['hpp'];
		$harga_jual		= $_GET['harga_jual'];
		$qty			= $_GET['subtotal'];
		$subtotal		= $hpp*$qty;
		$data			= array(
							'status'=>0,
							'id_kategori'	=>$id_kategori,
							'id_proveder'	=>$id_proveder,
							'id_nominal'	=>$id_nominal,
							'hpp'			=>$hpp,
							'qty'			=>$qty,
							'subtotal'		=>$subtotal,
							);
		$check= $this->db->get_where();
	}
}
?>