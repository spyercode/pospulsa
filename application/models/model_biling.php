<?php

class Model_Biling extends CI_Model
{
	
	function simpan_nominal()
	{
		$nama_nominal	= $this->input->post('nominal');
		$idnominal		= $this->db->get_where('nominal',array('nama_nominal'=>$nama_nominal))->row_array();
		$data			= array('id_nominal'=>$idnominal['id_nominal'],
								'qty'=>$qty,
								'harga_jual'=>$id_barang['harga_jual'],
								'status'=>'0');
		$this->db->insert('transaksi_detail',$data);
	}
	}
}