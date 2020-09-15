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
            $query=$this->db->query("SELECT tgl_pemesanan FROM tb_penjualan GROUP BY year(tgl_pemesanan)");
            $data['tahun']=$query;
            $this->template->load('template/template','laba/laba_laporan',$data);
        }

        public function cetak()
        {
            $data['data_penjualan']=$this->transaksi_m->get();
            $data['data_pembelian']=$this->transaksi_m->get1();
            $this->load->view('laba/laba',$data);
        }
        public function cetak2()
        {
            
            $bulan=$this->input->post('bulan');
            $tahun=$this->input->post('tahun');
            $data['periode']=$data=array(
                'bulan'=>$bulan,
                'tahun'=>$tahun,
            );
            $this->db->from('tb_penjualan');
            $this->db->join('tb_barang','tb_barang.id_barang = tb_penjualan.id_barang');
            $this->db->join('tb_invoice','tb_invoice.id_invoice= tb_penjualan.id_invoice_p');
            $this->db->where('month(tgl_pemesanan)',$bulan);
            $this->db->where('year(tgl_pemesanan)',$tahun);
            $data['data_penjualan']=$this->db->get();
            $this->db->from('tb_barang_masuk');
            $this->db->join('tb_barang','tb_barang.id_barang = tb_barang_masuk.id_barang');
            $this->db->join('tb_supplier','tb_supplier.id_supplier= tb_barang_masuk.id_supplier');
            $this->db->where('month(tgl_masuk)',$bulan);
            $this->db->where('year(tgl_masuk)',$tahun);
            $data['data_pembelian']=$this->db->get();
            
            $this->load->view('laba/laba2',$data);

        }
}

