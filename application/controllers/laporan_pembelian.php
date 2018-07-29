<?php
 class laporan_pembelian extends CI_Controller{
     
     function index(){
         $data['laporan']=$this->db->query("SELECT DATE(tp.tanggal) AS tanggal,u.nama_lengkap, tp.id,n.nama_nominal,k.nama_kategori,p.nama_proveder,tp.qty,tp.harga_pokok FROM transaksi_pembelian AS tp, kategori as k, proveder as p, nominal as n,user as u WHERE tp.id_kategori=k.id_kategori AND tp.id_provider=p.id_proveder AND tp.id_nominal=n.id_nominal AND u.id_user=tp.user_id and tp.status=0")->result();
         $this->load->view('laporan_pembelian',$data);
     }
 }
