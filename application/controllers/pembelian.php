<?php

class Pembelian extends CI_Controller
{ 
    function __construct(){
        parent:: __construct();
        $this->load->model('model_pembelian');
        $this->load->model('model_pembelian_detail');
        $this->load->model('model_nominal');
        $this->load->model('model_kategori');
        $this->load->model('model_proveder');
    }

    function index(){
        $this->load->view('pembelian/form_pembelian');
    }

    function post()
    {
        if(isset($_POST['submit'])){
            //proses nominal
            $nominal    = $this->input->post('id_nominal');
            $kategori   = $this->input->post('id_kategori');
            $proveder   = $this->input->post('id_proveder');
            $deskripsi  = $this->input->post('deskripsi');
            $hpp        = $this->input->post('hpp');
            $qty        = $this->input->post('qty');
            $data       = array('id_nominal'=>$nama,
                                'id_kategori'=>$kategori,
                                'id_proveder'=>$proveder,
                                'deskripsi'=>$deskripsi,
                                'hpp'=>$hpp,
                                'stok'=>$stok);
            $this->model_pembelian->post($data);
            redirect('pembelian');
        }
        else{
            $this->load->model('model_kategori');
            $data['kategori']= $this->model_kategori->tampilkan_data()->result();
            $this->load->model('model_proveder');
            $data['proveder']= $this->model_proveder->tampilkan_data()->result();
            $this->load->view('nominal/form_input',$data);
            $data['record']  = $this->model_nominal->get_one($id)->row_array();
            $this->load->view('pembelian/form_pembelian',$data);
        }
    }
}