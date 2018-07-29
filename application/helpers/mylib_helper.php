<?php

function cmb_dinamis($name, $table, $field, $pk, $selected = NULL, $extra = NULL) {
    $ci = &get_instance();
    $cmb = "<select name='$name' class='form-control' $extra>";
    $data = $ci->db->get($table)->result();
    foreach ($data as $row){
        $cmb .= "<option value='".$row->$pk ."'";
        $cmb .= $selected == $row->$pk ? 'selected' : '';
        $cmb .= ">" . $row->$field . "</option>";
    }
    $cmb .= "</select>";
    return $cmb;
}

function chek_seesion(){
    $ci=&get_instance();
    $session=$ci->session->userdata('status_login');
    if($session!='ok') {
        redirect('Auth');
    }
}

?>