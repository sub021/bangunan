<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

    
        function __construct()
        {
            parent::__construct();
            check_not_login();
            $this->load->model('pelanggan_m');
        }
    
        public function index()
        {
            $data['data_pelanggan'] = $this->pelanggan_m->get();
            $this->template->load('template/template','pelanggan/pelanggan_data',$data);
        }

        public function non_konfirmasi($id)
        {
            $data=array(
                'status'=>"non_konfirmasi"
            );
            $this->pelanggan_m->update($id, $data);
            // $this->session->set_flashdata('message','Supplier telah DiBlokir');
            redirect(site_url('pelanggan'));
        }
    
        public function konfirmasi($id)
        {
            $data=array(
                'status'=>"konfirmasi"
            );
            $this->pelanggan_m->update($id, $data);
            // $this->session->set_flashdata('message','Supplier Unblokier');
            redirect(site_url('pelanggan'));
        }
}