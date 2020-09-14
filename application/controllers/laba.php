<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laba extends CI_Controller {

    function __construct()
        {
            parent::__construct();
            check_not_login();
            $this->load->model('barang_keluar_m');
            $this->load->model('barang_m');
            $this->load->model('transaksi_m');
        }

    public function laporan()
        {
            $this->template->load('template/template','laba/laba_laporan');
        }

        public function cetak()
        {
            $data['data_penjualan']=$this->transaksi_m->get();
            $data['data_pembelian']=$this->transaksi_m->get1();
            $this->load->view('laba/laba',$data);
        }
}

