<?php
class Model_pembelian extends CI_Model
{
	function post($data)
	{
		$this->db->insert('nominal',$data);
	}

	function get_one($id)
	{
		$param = array('id_nominal'=>$id);
		return $this->db->get_where('nominal',$param);
	}


}