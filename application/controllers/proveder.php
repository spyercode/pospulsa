<?php

class Proveder  extends CI_Controller{
	public function __construct(){
		parent:: __construct();
		$this->load->model('model_proveder');
	}

	function index(){
		$data['record']= $this->model_proveder->tampilkan_data();
		$this->load->view('proveder/lihat_data',$data);
	}
	

	function post()
	{
		if(isset($_POST['submit'])){
			//proses proveder
			$this->model_proveder->post();
			redirect('proveder');
		}
		else{
			$this->load->view('proveder/form_input');
		}
	}

	function edit()
	{
		if(isset($_POST['submit'])){
			//proses proveder
			$this->model_proveder->edit();
			redirect('proveder');
		}
		else{
			$id= $this->uri->segment(3);
			$data['record'] = $this->model_proveder->get_one($id)->row_array();
			$this->load->view('proveder/form_edit',$data);
		}
	}
	
	function delete()
    {
        $id=  $this->uri->segment(3);
        $this->model_proveder->delete($id);
        redirect('proveder');
    }
}