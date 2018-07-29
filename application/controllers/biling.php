<?php

class Biling extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('html');
    }

    public function index() {
        $this->load->view('biling/biling');
    }

    public function form_autocomplit() {
        $nominal = $_GET['nominal'];
        $sql = "select * from nominal where id_nominal='$nominal'";
        $nom = $this->db->query($sql)->row_Array();
        $data = array(
            'harga_jual' => $nom['harga_jual']
        );
        echo json_encode($data);
    }
    
    public function form() {
        $nominal = $_GET['nom'];
        $sql = "select * from nominal where id_nominal='$nominal'";
        $nom = $this->db->query($sql)->row_Array();
        $data = array(
            'harga_jual' => $nom['harga_jual']
        );
        echo json_encode($data);
    }
    
    public function isi() {
        $nominal = $_GET['nomi'];
        $sql = "select * from nominal where id_nominal='$nominal'";
        $nom = $this->db->query($sql)->row_Array();
        $data = array(
            'harga_jual' => $nom['harga_jual']
        );
        echo json_encode($data);
    }

    public function add() {
        if (isset($_POST['submit'])) {
            $data = array(
                'no_hp' => $this->input->post('no_hp'),
                'id_nominal' => $this->input->post('nominal'),
                'harga_pulsa' => $this->input->post('harga'),
                'id_kategori' => $this->input->post('id_kategori'),
                'id_provider' => $this->input->post('proveder')
            );
            $this->db->insert('transaksi',$data);
            redirect('biling');
        } else {

            $this->load->view('biling/biling');
        }
    }
    
    public function paket() {
        
        if (isset($_POST['submit'])) {
            $data = array(
                'no_hp' => $this->input->post('no_hp'),
                'id_nominal' => $this->input->post('nominal'),
                'harga_pulsa' => $this->input->post('harga'),
                'id_kategori' => $this->input->post('id_kategori'),
                'id_provider' => $this->input->post('proveder')
            );
            $this->db->insert('transaksi',$data);
            redirect('biling');
        } else {

            $this->load->view('biling/biling');
        }
    }
    
    
    public function listrik() {
        
        if (isset($_POST['submit'])) {
            $data = array(
                'no_hp' => $this->input->post('no_hp'),
                'id_nominal' => $this->input->post('nominal'),
                'harga_pulsa' => $this->input->post('harga'),
                'id_kategori' => $this->input->post('id_kategori'),
                'id_provider' => $this->input->post('proveder')
            );
            $this->db->insert('transaksi',$data);
            redirect('biling');
        } else {

            $this->load->view('biling/biling');
        }
    }
    

}
