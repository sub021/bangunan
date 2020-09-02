<?php

class fungsi{

    protected $ci;

    public function __construct(){
        $this->ci =& get_instance();
    }

    function user_login(){
        $this->ci->load->model('user_m');
        $id_user = $this->ci->session->userdata('id_user');
        $user_data = $this->ci->user_m->get($id_user)->row();
        return$user_data;
    }
    
    function user_login_user(){
        $this->ci->load->model('user_m');
        $id_user = $this->ci->session->userdata('id_pelanggan');
        $user_data = $this->ci->user_m->get_user($id_user)->row();
        return$user_data;
    }
}