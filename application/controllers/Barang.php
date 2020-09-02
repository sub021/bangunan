<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

    
        function __construct()
        {
            parent::__construct();
            check_not_login();
            $this->load->model('barang_m');
        }
    
        public function index()
        {
            $data['data_barang'] = $this->barang_m->get();
            $this->template->load('template/template','barang/barang_data',$data);
        }
    
        public function add()
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('kode_barang', 'Kode barang', 'required|is_unique[tb_barang.kode_barang]');
            $this->form_validation->set_rules('nama', 'Nama Barang', 'required');
            $this->form_validation->set_rules('stok', 'Stok', 'required');
            $this->form_validation->set_rules('harga', 'Harga Jual', 'required');
            $this->form_validation->set_message('is_unique', '{field} telah di gunakan');
            $this->form_validation->set_message('required', '%s masih kosong silahkan isi');
            // $this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
            $this->form_validation->set_error_delimiters('<span class="help-block">','</span>');
    
            if ($this->form_validation->run() == FALSE)
            {
                $db=$this->barang_m->cekkodebarang();
                $nourut=substr($db,3,4);
                $kodegen= $nourut + 1;
                $data = array('kode_barang'=>$kodegen);
                $this->template->load('template/template','barang/barang_form_add',$data);
            }
            else
            {
                $post=$this->input->post(null,TRUE);
                $this->barang_m->add($post);
                if($this->db->affected_rows() > 0){
                    echo  "<script>
                    alert('data Berhasil disimpan');
                    
                </script>";
                }
                echo "<script>
                    
                    window.location='".site_url('barang')."';
                </script>";
            }
            
        }
    
        public function edit($id)
        {
            $this->load->library('form_validation');
            // $this->form_validation->set_rules('username', 'Username', 'required|callback_username_check');
            // $this->form_validation->set_rules('kode_barang', 'Kode barang', 'required|is_unique[tb_barang.kode_barang]');
            $this->form_validation->set_rules('nama', 'Nama Barang', 'required');
            $this->form_validation->set_rules('stok', 'Stok', 'required');
            $this->form_validation->set_rules('harga', 'Harga Jual', 'required');
            $this->form_validation->set_message('is_unique', '{field} telah di gunakan');
            $this->form_validation->set_message('required', '%s masih kosong silahkan isi');
    
            if ($this->form_validation->run() == FALSE)
            {
                $query= $this->barang_m->get($id);
                if($query->num_rows() > 0){
                    $data['row']=$query->row();
                    $this->template->load('template/template','barang/barang_form_edit',$data);
                } else{
                    echo  "<script>
                    alert('data Tidak ditemukan');
                    window.location='".site_url('user')."';
                </script>";
                }
            }else{
                $post=$this->input->post(null,TRUE);
                $this->barang_m->edit($post);
                if($this->db->affected_rows() > 0){
                    echo  "<script>
                    alert('data Berhasil di Edit');
                    
                </script>";
                }
                echo "<script>
                    window.location='".site_url('barang')."';
                </script>";
            }
            
        }
    
        public function del()
        {
            $id=$this->input->post('id_barang');
            $this->barang_m->del($id);
            if($this->db->affected_rows() > 0){
                echo  "<script>
                alert('data Berhasil dihapus');
                
            </script>";
            }
            echo "<script>
                
                window.location='".site_url('barang')."';
            </script>";
        }


        public function laporan()
        {
            $this->template->load('template/template','barang/barang_laporan');
        }

        public function cetak()
        {
            $data['data_barang'] = $this->barang_m->get();
            $this->load->view('barang/laporan',$data);
        }
    
    }
    


