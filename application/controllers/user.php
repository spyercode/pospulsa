<?php

class User extends CI_Controller {
	
	function __construct() {
        parent::__construct();
        $this->load->model('model_user');

    }

	function index()
	{
		$data['record']= $this->model_user->tampil_data()->result();
		$this->load->view('user/lihat_data',$data);
	}

	function post()
	{
		if(isset($_POST['submit'])){
            // proses data
            $nama       =  $this->input->post('nama',true);
            $username   =  $this->input->post('username',true);
            $password   =  $this->input->post('password',true);
            $level 		=  $this->input->post('level',true);
            $data       =  array(   'nama_lengkap'=>$nama,
                                    'username'=>$username,
                                    'password'=>md5($password),
                                    'level'	=>$level);
            $this->db->insert('user',$data);
            redirect('user');
        }
        else{
            //$this->load->view('operator/form_input');
            //$data['level']= $this->model_user->tampil_data()->result();
            $this->load->view('user/form_input');
        }
    }

	function edit()
	{
		if(isset($_POST['submit'])){
			//proses user
			$id 		= $this->input->post('id',true);
			$nama 		= $this->input->post('nama',true);
			$username	= $this->input->post('username',true);
			$password	= $this->input->post('password',true);
			$level		= $this->input->post('level',true);
			$active		= $this->input->post('active',true);

			
			if (empty($password)) {
			$data 	= array('nama_lengkap'=>$nama,
			 					'username'=>$username,
			 					 'level'=>$level, 'active'=>$active);
			}
			 else{
			$data 	= array('nama_lengkap'=>$nama,
								'username'=>$username,
			 					'password'=>md5($password),
			 					'level'  =>$level,
			 					'active'=>$active);
			 }
			 //print_r($data);
			 $this->db->where('id_user',$id);
			 $this->db->update('user',$data);
			 redirect('user');
		}
		else{
			$id= $this->uri->segment(3);
			$data['level']   =  $this->model_user->tampil_data()->result();
			//$data['aktif']   =  $this->model_user->tampil_data()->result();
			$data['record']= $this->model_user->get_one($id)->row_array();
			//$this->load->view('user/form_edit',$data);
			$this->load->view('user/form_edit',$data);		}
	}

	function delete()
	{
		$id= $this->uri->segment(3);
		$this->db->where('id_user',$id);
		$this->db->delete('user');
		redirect('user');
	}

	/*function level_emum()
	{
		$data = field_enums('user', 'level');
		print_r($data);
		$this->load->view('user/form_edit',$data);
	}
	*/

}