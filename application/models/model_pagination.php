<?php
function data($number,$offset){
		return $query = $this->db->get('nominal',$number,$offset)->result();		
	}
 
	function jumlah_data(){
		return $this->db->get('nominal')->num_rows();
	}
?>