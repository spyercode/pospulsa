<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
  public function cekLogin()
  {
    //Jika tidak ada session (username) maka alihkan ke controller login
    if (!$this->session->userdata('username')) {
      redirect('authentication/auth/login');
    }
  }
}