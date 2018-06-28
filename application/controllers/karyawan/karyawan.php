<?php

class Karyawan extends MY_Controller{
	
	public function __construct(){
		parent::__construct();

		//memanggil function dari controller MY_Controller
		$this->cekLogin();

		//validasi jika session dengan lavel admin mengakses halaman ini maka akan dialihkan ke halaman manager
		if ($this->session->userdata('level') == "admin") {
			redirect('admin/admin');
		}
	}
	
	public function index(){
		$this->load->view('Karyawan/Dashboard');
	}
}
?>