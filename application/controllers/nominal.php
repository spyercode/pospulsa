<?php

class Nominal extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('model_nominal');
        $this->load->library('pagination');
    }

    function index() {
        $data['record'] = $this->model_nominal->tampil_data()->result();
        $this->load->view('nominal/lihat_data', $data);
    }

    public function cari() {
        if (isset($_POST['submit'])) {
            $cari = $this->input->post('cari');
            $data['record'] = $this->db->query("SELECT * FROM v_nominal WHERE nama_proveder='$cari' or nama_nominal='$cari' or deskripsi='$cari' or nama_kategori='$cari' ")->result();
            $this->load->view('nominal/lihat_data', $data);
        }
    }

    function post() {
        if (isset($_POST['submit'])) {
            //proses nominal
            $nama = $this->input->post('nama_nominal');
            $deskripsi = $this->input->post('deskripsi');
            $kategori = $this->input->post('id_kategori');
            $proveder = $this->input->post('id_proveder');
            $hpp = $this->input->post('hpp');
            $harga_jual = $this->input->post('harga_jual');
            $stok = $this->input->post('stok');
            $data = array('nama_nominal' => $nama,
                'deskripsi' => $deskripsi,
                'id_kategori' => $kategori,
                'id_proveder' => $proveder,
                'hpp' => $hpp,
                'harga_jual' => $harga_jual,
                'stok' => $stok);
            $this->model_nominal->post($data);
            redirect('nominal');
        } else {
            $this->load->model('model_kategori');
            $data['kategori'] = $this->model_kategori->tampilkan_data()->result();
            $this->load->model('model_proveder');
            $data['proveder'] = $this->model_proveder->tampilkan_data()->result();
            $this->load->view('nominal/form_input', $data);
        }
    }

    function edit() {
        if (isset($POST['submit'])) {
            //Proses nominal
            $id = $this->input->post('id');
            $nama = $this->input->post('nama_nominal');
            $kategori = $this->input->post('nama_kategori');
            $proveder = $this->input->post('nama_proveder');
            $deskripsi = $this->input->post('deskripsi');
            $hpp = $this->input->post('hpp');
            $harga_jual = $this->input->post('harga_jual');
            $stok = $this->input->post('stok');
            $data = array('nama_nominal' => $nama, 'nama_kategori' => $kategori, 'nama_proveder' => $proveder,
                'deskripsi' => $deskripsi, 'hpp' => $hpp, 'jarga_jual' => $harga_jual, 'stok' => $stok);
            $this->model_nominal->edit($data, $id);
            redirect('nominal');
        } else {
            $id = $this->uri->segment(3);
            $this->load->model('model_kategori');
            $this->load->model('model_proveder');
            $data['kategori'] = $this->model_kategori->tampilkan_data()->result();
            $data['proveder'] = $this->model_proveder->tampilkan_data()->result();
            $data['record'] = $this->model_nominal->get_one($id)->row_array();
            $this->load->view('nominal/form_edit', $data);
        }
    }

    function delete() {
        $id = $this->uri->segment(3);
        $this->model_nominal->delete($id);
        redirect('nominal');
    }


}
