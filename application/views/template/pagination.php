<?php
public function pagination(){
        $jumlah_data = $this->model_pagination->jumlah_data();
        $config['base_url'] = base_url().'nominal/lihat_data';
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 10;
        $from = $this->uri->segment(3);
        $this->pagination->initialize($config);     
        $data['nominal'] = $this->model_nominal->data($config['per_page'],$from);
        $this->load->view('nominal/lihat_data',$data);
    }
?>