<?php
  class Model_user extends CI_Model {

    //mengambil tabel user
    public $table = 'user';

    public function cekAkun($username, $password)
    {
      //cari username lalu lakukan validasi
      $this->db->where('username', $username);
      $query = $this->db->get($this->table)->row();

      //jika bernilai 1 maka user tidak ditemukan
      if (!$query) return 1;

      //jika bernilai 2 maka user tidak aktif
      if ($query->active == 0) return 2;

      //jika bernilai 3 maka password salah
      $hash = $query->password;
      if (md5($password) != $hash) return 3;

      return $query;
    }

    function tampil_data()
    {
      $query="SELECT u.id_user, u.nama_lengkap, u.username, u.level, u.active, u.last_login
            FROM user as u";
      return $this->db->query($query);
    }

    function post($data)
    {
      $this->db->insert('user',$data);
    }

    function get_one($id)
    {
      $param = array('id_user'=>$id);
      return $this->db->get_where('user',$param);
    }

    function level_enum($user = '', $level = '')
    {
        $enums = array();
        if ($user == '' || $level == '') return $enums;
        $CI =& get_instance();
        preg_match_all("/'(.*?)'/", $CI->db->query("SHOW COLUMNS FROM {$user} LIKE '{$level}'")->row()->Type, $matches);
        foreach ($matches[1] as $key => $value) {
            $enums[$value] = $value; 
        }
        return $enums;
    }  

  }