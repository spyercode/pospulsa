<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		//memanggil function dari MY_Controller
		$this->cekLogin();
		//validasi jika session dengan level karyawan mengakses halaman ini maka akan dialihkan ke halaman karyawan
		if ($this->session->userdata('level') == "karyawan") {
			redirect('karyawan/karyawan');
		}
	}

	public function index(){
		$this->load->view('Admin/Dashboard');
	}
}