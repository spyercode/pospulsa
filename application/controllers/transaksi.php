 <?php

class Transaksi extends CI_Controller{
	function __construct() {
        parent::__construct();
        $this->load->model(array('model_nominal','model_transaksi'));
    }

	function index()
	{
		if (isset($POST['submit']))
		{
			$this->model_transaksi->simpan_nominal();
			redirect('transaksi');
		} 
		else
		{
			$data['nominal']= $this->model_nominal->tampil_data();
			$this->load->view('transaksi/form_transaksi',$data);
		}
	}
}