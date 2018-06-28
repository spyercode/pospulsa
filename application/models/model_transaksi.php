<?php

class Model_transaksi extends CI_Model
{
	function simpan_nominal()
	{
		$nama_nominal	= $this->input->post('nominal');
		$qty			= $this->input->post('qty');
		$idnominal		= $this->db->get_where('nominal',array('nama_nominal'=>$nama_nominal))->row_array();
		$data			= array('id_nominal'=>$id_nominal['id_nominal'],
								'qty'=>$qty,
								'harga_jual'=>$id_nominal['harga_jual'],
								'status'=>'0');
		$this->db->insert('transaksi_detail',$data);
	}
}