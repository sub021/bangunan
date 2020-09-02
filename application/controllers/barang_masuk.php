<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_masuk extends CI_Controller {

    
        function __construct()
        {
            parent::__construct();
            check_not_login();
            $this->load->model('barang_masuk_m');
            $this->load->model('barang_m');
            $this->load->model('supplier_m');
        }
    
        public function index()
        {
            $data['data_barang_masuk'] = $this->barang_masuk_m->get();
            $this->template->load('template/template','barang_masuk/barang_masuk_data',$data);
        }
    
        public function add()
        {
            $this->load->library('form_validation');
            // $this->form_validation->set_rules('kode_barang', 'Kode barang', 'required|is_unique[tb_barang.kode_barang]');
            $this->form_validation->set_rules('harga', 'Harga Beli', 'required');
            $this->form_validation->set_rules('qty', 'Qty', 'required');
            $this->form_validation->set_rules('total', 'Total', 'required');
            $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
            // $this->form_validation->set_message('is_unique', '{field} telah di gunakan');
            $this->form_validation->set_message('required', '%s masih kosong silahkan isi');
            // $this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
            $this->form_validation->set_error_delimiters('<span class="help-block">','</span>');
    
            if ($this->form_validation->run() == FALSE)
            {
                // $db=$this->barang_m->cekkodebarang();
                // $nourut=substr($db,3,4);
                // $kodegen= $nourut + 1;
                // $data = array('kode_barang'=>$kodegen);
                $data['data_supplier']= $this->supplier_m->get();
                $data['data_barang'] = $this->barang_m->get();
                $this->template->load('template/template','barang_masuk/barang_masuk_form_add',$data);
            }
            else
            {
                $post=$this->input->post(null,TRUE);
                $this->barang_masuk_m->add($post);
                if($this->db->affected_rows() > 0){
                    echo  "<script>
                    alert('data Berhasil disimpan');
                    
                </script>";
                }
                echo "<script>
                    
                    window.location='".site_url('barang_masuk')."';
                </script>";
            }
            
        }
    
        public function edit($id)
        {
            $this->load->library('form_validation');
            // $this->form_validation->set_rules('username', 'Username', 'required|callback_username_check');
            // $this->form_validation->set_rules('kode_barang', 'Kode barang', 'required|is_unique[tb_barang.kode_barang]');
            $this->form_validation->set_rules('harga', 'Harga Beli', 'required');
            $this->form_validation->set_rules('qty', 'Qty', 'required');
            $this->form_validation->set_rules('total', 'Total', 'required');
            $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
            $this->form_validation->set_message('required', '%s masih kosong silahkan isi');
    
            if ($this->form_validation->run() == FALSE)
            {
                $query= $this->barang_masuk_m->get($id);
                if($query->num_rows() > 0){
                    $data['data_supplier']= $this->supplier_m->get();
                    $data['data_barang'] = $this->barang_m->get();
                    $data['row']=$query->row();
                    $this->template->load('template/template','barang_masuk/barang_masuk_form_edit',$data);
                } else{
                    echo  "<script>
                    alert('data Tidak ditemukan');
                    window.location='".site_url('barang_masuk')."';
                </script>";
                }
            }else{
                $post=$this->input->post(null,TRUE);
                $this->barang_masuk_m->edit($post);
                if($this->db->affected_rows() > 0){
                    echo  "<script>
                    alert('data Berhasil di Edit');
                    
                </script>";
                }
                echo "<script>
                    window.location='".site_url('barang_masuk')."';
                </script>";
            }
            
        }
    
        public function del()
        {
            $id=$this->input->post('id_masuk');
            $this->barang_masuk_m->del($id);
            if($this->db->affected_rows() > 0){
                echo  "<script>
                alert('data Berhasil dihapus');
                
            </script>";
            }
            echo "<script>
                
                window.location='".site_url('barang_masuk')."';
            </script>";
        }
    
        public function laporan()
        {
            $this->template->load('template/template','barang_masuk/barang_masuk_laporan');
        }

        public function cetak()
        {
            $data['data_barang_masuk'] = $this->barang_masuk_m->get();
            $this->load->view('barang_masuk/laporan',$data);
        }

        public  function cetak2()
        {
            $tgl1=date('Y-m-d',strtotime($this->input->post('tanggal1')));
            $tgl2=date('Y-m-d',strtotime($this->input->post('tanggal2')));
            $this->db->from('tb_barang_masuk');
            $this->db->join('tb_barang','tb_barang.id_barang = tb_barang_masuk.id_barang');
            $this->db->join('tb_supplier','tb_supplier.id_supplier = tb_barang_masuk.id_supplier');
            $this->db->where('tanggal BETWEEN"'.$tgl1.'"and"'.$tgl2.'"');
            $data['data_barang_masuk']=$this->db->get();
            $this->load->view('barang_masuk/laporan',$data);
        }

    }
    


