<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {

    
        function __construct()
        {
            parent::__construct();
            check_not_login();
            $this->load->model('invoice_m');
        }
    
        public function index()
        {
            $data['data_invoice'] = $this->invoice_m->get_all();
            $this->template->load('template/template','invoice/invoice_data',$data);
        }
        public function nota()
        {
            $id=$this->uri->segment(3);
            $data['data']=$this->invoice_m->get_id($id);
            $this->load->view('invoice/invoice_nota',$data);
        }

        public function laporan()
        {
            $this->template->load('template/template','invoice/laporan_pelanggan');
        }

        public function cetak_pelanggan()
        {
            // $id=$this->uri->segment(3);
            // $data['data']=$this->invoice_m->get_id($id);
            $query=$this->db->query("SELECT nama, count(nama) as jumlah FROM tb_invoice GROUP BY nama ORDER BY jumlah DESC");
            // $this->db->from('tb_invoice');
            // $this->db->order_by('nama');
            $data['data_invoice'] = $query;
            $this->load->view('invoice/cetak',$data);
        }

        public function diproses($id)
        {
            $data=array(
                'status_pesanan'=>"diproses"
            );
            $this->invoice_m->update($id, $data);
            // $this->session->set_flashdata('message','Supplier telah DiBlokir');
            redirect(site_url('invoice'));
        }

        public function disiapkan($id)
        {
            $data=array(
                'status_pesanan'=>"disiapkan"
            );
            $this->invoice_m->update($id, $data);
            // $this->session->set_flashdata('message','Supplier telah DiBlokir');
            redirect(site_url('invoice'));
        }

        public function dikirim($id)
        {
            $data=array(
                'status_pesanan'=>"dikirim"
            );
            $this->invoice_m->update($id, $data);
            // $this->session->set_flashdata('message','Supplier telah DiBlokir');
            redirect(site_url('invoice'));
        }

        public function diambil($id)
        {
            $data=array(
                'status_pesanan'=>"diambil"
            );
            $this->invoice_m->update($id, $data);
            // $this->session->set_flashdata('message','Supplier telah DiBlokir');
            redirect(site_url('invoice'));
        }


        public function selesai($id)
        {
            $data=array(
                'status_pesanan'=>"selesai"
            );
            $this->invoice_m->update($id, $data);
            // $this->session->set_flashdata('message','Supplier telah DiBlokir');
            redirect(site_url('invoice'));
        }
    }