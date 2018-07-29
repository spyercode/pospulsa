<?php

class Transaksi extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('model_nominal', 'model_transaksi'));
    }

    function index() {
        if (isset($POST['submit'])) {
            $this->model_transaksi->simpan_nominal();
            redirect('transaksi');
        } else {
            $data['nominal'] = $this->db->query("SELECT tr.id_transaksi,pr.nama_proveder,tr.harga_pulsa,tr.qty,tr.no_hp,nm.id_nominal,kk.id_kategori, nm.nama_nominal,kk.nama_kategori FROM `transaksi` as tr, nominal as nm, kategori as kk,proveder as pr WHERE tr.id_kategori=kk.id_kategori AND pr.id_proveder=tr.id_provider AND tr.id_nominal=nm.id_nominal and status=1 and detail=0 ")->result();
            $this->load->view('transaksi/form_transaksi', $data);
        }
    }

    function add() {
        if (isset($_POST['submit'])) {
            $data = array(
                'qty' => $this->input->post('qty'),
                'user_id'=> $this->session->userdata('id_user')
            );
            $status = 0;
            $this->db->where('status', $status);
            $this->db->update('transaksi', $data);
            $no_hp= $this->input->post('no_hp');
            $this->db->query("update transaksi set status=1 where no_hp=$no_hp");
            $chek=$this->db->get_where('transaksi', array('no_hp' => $no_hp));
            if ($chek->num_rows()>0) {
                  $sql="update transaksi set qty=qty+".$this->input->post('qty')." where no_hp='$no_hp'";
                  $this->db->query($sql);
            }
            redirect('transaksi');
        }
    }

    public function tampil() {
        $data['nom'] = $this->db->query("SELECT pr.nama_proveder,tr.harga_pulsa,tr.qty,tr.no_hp,nm.id_nominal,kk.id_kategori, nm.nama_nominal,kk.nama_kategori FROM `transaksi` as tr, nominal as nm, kategori as kk,proveder as pr WHERE tr.id_kategori=kk.id_kategori AND pr.id_proveder=tr.id_provider AND tr.id_nominal=nm.id_nominal")->result();
        $this->load->view('transaksi/form_transaksi', $data);
    }

    public function form_autocomplit() {
        $no_hp = $_GET['no_hp'];
        $sql = "SELECT tr.id_transaksi, tr.status,p.nama_proveder, tr.no_hp,nm.id_nominal,kk.id_kategori, nm.nama_nominal,kk.nama_kategori FROM `transaksi` as tr, nominal as nm, kategori as kk,proveder as p WHERE tr.id_kategori=kk.id_kategori AND tr.id_nominal=nm.id_nominal and tr.id_provider=p.id_proveder AND tr.detail=0 AND tr.no_hp=$no_hp";
        $nom = $this->db->query($sql)->row_Array();
        $data = array(
            'no_hp' => $nom['no_hp'],
            'nama_nominal' => $nom['nama_nominal'],
            'nama_kategori' => $nom['nama_kategori'],
            'id_nominal' => $nom['id_nominal'],
            'id_kategori' => $nom['id_kategori'],
            'nama_proveder'=>$nom['nama_proveder']
        );
        echo json_encode($data);
    }
    
    public function batal(){
        $id= $this->uri->segment(3);
        $this->db->where('id_transaksi',$id);
        $this->db->delete('transaksi');
        redirect('transaksi');
    }
    
    public function selesai_belanja() {
     $status=1;
     $this->db->query("update transaksi set detail=$status where status=1");
     redirect('transaksi');
    }

}
