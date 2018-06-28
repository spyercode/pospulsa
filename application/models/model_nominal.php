<?php

class Model_nominal extends CI_Model
{
	
	public function tampil_data()
	{
		$query="SELECT nominal.id_nominal, nominal.nama_nominal, kategori.nama_kategori, proveder.nama_proveder,nominal.deskripsi, nominal.hpp, nominal.harga_jual, nominal.stok
		FROM nominal
		JOIN proveder ON proveder.id_proveder = nominal.id_proveder
		JOIN kategori ON kategori.id_kategori = nominal.id_kategori";
		return $this->db->query($query);
	}

	function post($data)
	{
		$this->db->insert('nominal',$data);
	}

	function get_one($id)
	{
		$param = array('id_nominal'=>$id);
		return $this->db->get_where('nominal',$param);
	}

	function edit($data,$id)
	{
		$this->db->where('id_nominal',$id);
		$this->db->update('nominal',$data);
	}

	function delete($id)
	{
		$this->db->where('id_nominal',$id);
		$this->db->delete('nominal');
	}

	
}