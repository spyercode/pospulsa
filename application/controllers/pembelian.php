<?php

class Pembelian extends CI_Controller {

    function __construct() {
        parent:: __construct();
        $this->load->model('model_pembelian');
        $this->load->model('model_pembelian_detail');
        $this->load->model('model_nominal');
        $this->load->model('model_kategori');
        $this->load->model('model_proveder');
    }

    function index() {
        $data['transaksi']= $this->db->query("SELECT tp.id,n.nama_nominal,k.nama_kategori,p.nama_proveder,tp.qty,tp.harga_pokok FROM transaksi_pembelian AS tp, kategori as k, proveder as p, nominal as n WHERE tp.id_kategori=k.id_kategori AND tp.id_provider=p.id_proveder AND tp.id_nominal=n.id_nominal AND tp.status=0")->result();
        $this->load->view('pembelian/form_pembelian',$data);
    }

    function post() {
        if (isset($_POST['submit'])) {
             $data=array(
                 'id_nominal' => $this->input->post('nominal'),
                 'id_kategori'=> $this->input->post('kategori'),
                 'id_provider'=> $this->input->post('proveder'),
                 'dekripsi'   => $this->input->post('deskripsi'),
                 'harga_pokok'=> $this->input->post('hpp'),
                 'qty'        => $this->input->post('stok'),
                 'user_id'    => $this->session->userdata('id_user')
                 );
                 $this->db->insert('transaksi_pembelian',$data);
                 redirect('pembelian');
        } else {
            $this->load->view('pembelian/form_pembelian');
        }
    }
    
    public function cancel() {
        $id= $this->uri->segment(3);
        $this->db->where('id',$id);
        $this->db->delete('transaksi_pembelian');
        redirect('pembelian');
    }

}
