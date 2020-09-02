<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class supplier extends CI_Controller {

    
        function __construct()
        {
            parent::__construct();
            check_not_login();
            $this->load->model('supplier_m');
        }
    
        public function index()
        {
            $data['data_supplier'] = $this->supplier_m->get();
            $this->template->load('template/template','supplier/supplier_data',$data);
        }
    
        public function add()
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('kode_supplier', 'Kode supplier', 'required|is_unique[tb_supplier.kode_supplier]');
            $this->form_validation->set_rules('nama', 'Nama supplier', 'required');
            $this->form_validation->set_rules('kota', 'Kota', 'required');
            $this->form_validation->set_rules('alamat', 'alamat', 'required');
            $this->form_validation->set_rules('telp', 'No Telp', 'required|min_length[10]|max_length[16]');
            $this->form_validation->set_message('is_unique', '{field} telah di gunakan');
            $this->form_validation->set_message('required', '%s masih kosong silahkan isi');
            $this->form_validation->set_message('min_length', '{field} minimal 10 karakter');
            $this->form_validation->set_message('max_length', '{field} maximal 16 karakter');
            $this->form_validation->set_error_delimiters('<span class="help-block">','</span>');
    
            if ($this->form_validation->run() == FALSE)
            {
                $db=$this->supplier_m->cekkodesupplier();
                $nourut=substr($db,3,4);
                $kodegen= $nourut + 1;
                $data = array('kode_supplier'=>$kodegen);
                $this->template->load('template/template','supplier/supplier_form_add',$data);
            }
            else
            {
                $post=$this->input->post(null,TRUE);
                $this->supplier_m->add($post);
                if($this->db->affected_rows() > 0){
                    echo  "<script>
                    alert('data Berhasil disimpan');
                    
                </script>";
                }
                echo "<script>
                    
                    window.location='".site_url('supplier')."';
                </script>";
            }
            
        }
    
        public function edit($id)
        {
            $this->load->library('form_validation');
            // $this->form_validation->set_rules('username', 'Username', 'required|callback_username_check');
            // $this->form_validation->set_rules('kode_supplier', 'Kode supplier', 'required|is_unique[tb_supplier.kode_supplier]');
            $this->form_validation->set_rules('kode_supplier', 'Kode supplier', 'required|is_unique[tb_supplier.kode_supplier]');
            $this->form_validation->set_rules('nama', 'Nama supplier', 'required');
            $this->form_validation->set_rules('kota', 'Kota', 'required');
            $this->form_validation->set_rules('alamat', 'alamat', 'required');
            $this->form_validation->set_rules('telp', 'No Telp', 'required|min_length[10]|max_length[16]');
            $this->form_validation->set_message('is_unique', '{field} telah di gunakan');
            $this->form_validation->set_message('required', '%s masih kosong silahkan isi');
            $this->form_validation->set_message('min_length', '{field} minimal 10 karakter');
            $this->form_validation->set_message('max_length', '{field} maximal 16 karakter');
            $this->form_validation->set_error_delimiters('<span class="help-block">','</span>');
    
            if ($this->form_validation->run() == FALSE)
            {
                $query= $this->supplier_m->get($id);
                if($query->num_rows() > 0){
                    $data['row']=$query->row();
                    $this->template->load('template/template','supplier/supplier_form_edit',$data);
                } else{
                    echo  "<script>
                    alert('data Tidak ditemukan');
                    window.location='".site_url('supplier')."';
                </script>";
                }
            }else{
                $post=$this->input->post(null,TRUE);
                $this->supplier_m->edit($post);
                if($this->db->affected_rows() > 0){
                    echo  "<script>
                    alert('data Berhasil di Edit');
                    
                </script>";
                }
                echo "<script>
                    window.location='".site_url('supplier')."';
                </script>";
            }
            
        }
    
        public function del()
        {
            $id=$this->input->post('id_supplier');
            $this->supplier_m->del($id);
            if($this->db->affected_rows() > 0){
                echo  "<script>
                alert('data Berhasil dihapus');
                
            </script>";
            }
            echo "<script>
                
                window.location='".site_url('supplier')."';
            </script>";
        }

        public function laporan()
        {
            $this->template->load('template/template','supplier/supplier_laporan');
        }

        public function cetak()
        {
            $data['data_supplier'] = $this->supplier_m->get();
            $this->load->view('supplier/laporan',$data);
        }
    
    }
    


