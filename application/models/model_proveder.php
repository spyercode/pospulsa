<?php

class Model_proveder extends CI_Model{
	
	function tampilkan_data()
	{
		return $this->db->get('proveder');
	}

	function post(){
		$data=array(
					'nama_proveder'=> $this->input->post('proveder')
					);
		$this->db->insert('proveder',$data);
	}

	function edit()
    {
        $data=array(
           'nama_proveder'=>  $this->input->post('proveder')
                    );
        $this->db->where('id_proveder',$this->input->post('id'));
        $this->db->update('proveder',$data);
    }
    
    function get_one($id)
    {
        $param = array('id_proveder'=>$id);
        return $this->db->get_where('proveder',$param);
    }

    function delete($id)
    {
        $this->db->where('id_proveder',$id);
        $this->db->delete('proveder');
    }
}