<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

    
        function __construct()
        {
            parent::__construct();
            check_not_login();
            $this->load->model('barang_m');
            $this->load->model('transaksi_m');
        }
        public function index()
        {
            $this->db->select('*');
                $this->db->from('tb_penjualan');
                $this->db->join('tb_barang','tb_barang.id_barang = tb_penjualan.id_barang');
                $this->db->join('tb_pelanggan','tb_pelanggan.id_pelanggan = tb_penjualan.id_pelanggan');
                $this->db->where('status',1);
                $data['data']=$this->db->get();
                $this->template->load('template/template','transaksi/transaksi_tabel',$data);
        }

        public function tambah()
        {

            $this->load->library('form_validation');
            $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
            if ($this->form_validation->run() == FALSE)
            {
                $this->db->select('*');
                $this->db->from('tb_penjualan');
                $this->db->join('tb_barang','tb_barang.id_barang = tb_penjualan.id_barang');
                $this->db->where('status',0);
                $data['penjualan']=$this->db->get();
                $data['data_barang']=$this->barang_m->get();
                $data['data_pelanggan']=$this->db->get('tb_pelanggan');
                
                $this->template->load('template/template','transaksi/transaksi_data',$data);
            } else{
                
                $data=[
                    'id_barang' => $this->input->post('id_barang'),
                    'jumlah' => $this->input->post('jumlah'),
                    'id_pelanggan' => $this->input->post('id_pelanggan'),

                ];
                $this->db->insert('tb_penjualan',$data);
                redirect('transaksi/tambah');

            }
                
        }
        public function tambah_barang()
            {
                $data=[
                    'id_barang' => $this->input->post('id_barang'),
                    'jumlah' => $this->input->post('jumlah'),
                    'id_pelanggan' => $this->input->post('id_pelanggan'),

                ];
                $this->db->insert('tb_penjualan',$data);
                redirect('transaksi');
            }

            public function cancel()
            {
                $id=$this->uri->segment(3);
                $this->db->where('id_jual',$id);
                $this->db->delete('tb_penjualan');
                redirect('Transaksi/tambah');
            }
            public function selesai()
            {
                $db=$this->transaksi_m->cekkodebarang();
                $nourut=substr($db,3,4);
                $kodegen= $nourut + 1;
                
                $update=[
                    'status'=>1
                ];
                $this->db->where('status',0);
                $this->db->update('tb_penjualan',$update);
                redirect('Transaksi');
            }


            public function laporan()
            {
                $this->template->load('template/template','transaksi/transaksi_laporan');
            }
    
            public function cetak()
            {
                $this->db->from('tb_penjualan');
                $this->db->join('tb_barang','tb_barang.id_barang = tb_penjualan.id_barang');
                $this->db->join('tb_pelanggan','tb_pelanggan.id_pelanggan = tb_penjualan.id_pelanggan');
                $this->db->where('status',1);
                $data['data_jual']=$this->db->get();
                $this->load->view('transaksi/laporan',$data);
            }
            public function laporan_online()
            {
                $this->template->load('template/template','barang/barang_laporan');
            }

            public  function cetak2()
            {
                $tgl1=date('Y-m-d',strtotime($this->input->post('tanggal1')));
                $tgl2=date('Y-m-d',strtotime($this->input->post('tanggal2')));
                // $this->db->from('tb_penjualan');
                // $this->db->join('tb_barang','tb_barang.id_barang = tb_penjualan.id_barang');
                // $this->db->join('tb_pelanggan','tb_pelanggan.id_pelanggan = tb_penjualan.id_pelanggan');
                // $this->db->where('tanggal BETWEEN "'.$tgl1.'"and"'.$tgl2.'"');
                $data['data_jual']=$this->db->query("SELECT * FROM tb_penjualan,tb_barang,tb_pelanggan WHERE tb_barang.id_barang = tb_penjualan.id_barang 
                AND tb_pelanggan.id_pelanggan = tb_penjualan.id_pelanggan 
                AND status = 1 and tanggal BETWEEN '".$tgl1."' and '".$tgl2."'");
                // $this->db->where('status',1);
                // $this->db->where('tanggal BETWEEN',$tgl1);
                // $data['data_jual']=$this->db->get();
                $this->load->view('transaksi/laporan',$data);
            }
    
            public function cetak_online()
            {
                $data['data_barang'] = $this->barang_m->get();
                $this->load->view('barang/laporan',$data);
            }
            public function del()
            {
            $id=$this->input->post('id_jual');
            $this->transaksi_m->del($id);
            if($this->db->affected_rows() > 0){
                echo  "<script>
                alert('data Berhasil dihapus');
                
            </script>";
            }
            echo "<script>
                
                window.location='".site_url('transaksi')."';
            </script>";
            }
}