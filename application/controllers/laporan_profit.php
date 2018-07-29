<?php
 class laporan_profit extends CI_Controller{
     
     function index(){
         $data['laporan']=$this->db->query("SELECT u.nama_lengkap,DATE(tr.tanggal) AS tanggal,pr.nama_proveder,tr.harga_pulsa,tr.qty,tr.no_hp,nm.nama_nominal,kk.nama_kategori FROM `transaksi` as tr, user as u, nominal as nm, kategori as kk,proveder as pr WHERE tr.id_kategori=kk.id_kategori AND pr.id_proveder=tr.id_provider AND tr.id_nominal=nm.id_nominal and tr.user_id=u.id_user AND status=1 and detail=1")->result();
         $this->load->view('laporan_profit',$data);
     }
 }
