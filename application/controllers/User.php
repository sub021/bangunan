<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('user_m');
    }

    public function index()
	{
        $data['data_user'] = $this->user_m->get();
		$this->template->load('template/template','user/user_data',$data);
	}

    public function add()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[tb_user.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('pwd_conf', 'konfirmasi Password', 'required|min_length[5]|matches[password]',
        array('matches' => '%s tidak sesuai dengan password')
    );
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('level', 'level', 'required');
        $this->form_validation->set_message('is_unique', '{field} telah di gunakan');
        $this->form_validation->set_message('required', '%s masih kosong silahkan isi');
        $this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
        $this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

        if ($this->form_validation->run() == FALSE)
        {
            $this->template->load('template/template','user/user_form_add');
        }
        else
        {
            $post=$this->input->post(null,TRUE);
            $this->user_m->add($post);
            if($this->db->affected_rows() > 0){
                echo  "<script>
                alert('data Berhasil disimpan');
                
            </script>";
            }
            echo "<script>
                
                window.location='".site_url('user')."';
            </script>";
        }
        
    }

    public function edit($id)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required|callback_username_check');
        if($this->input->post('password')){
            $this->form_validation->set_rules('password', 'Password', 'min_length[5]');
            $this->form_validation->set_rules('pwd_conf', 'konfirmasi Password', 'min_length[5]|matches[password]',
        array('matches' => '%s tidak sesuai dengan password')
         );
        }

        if($this->input->post('pwd_conf')){
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
            $this->form_validation->set_rules('pwd_conf', 'konfirmasi Password', 'required|min_length[5]|matches[password]',
            array('matches' => '%s tidak sesuai dengan password')
            );
            }
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('level', 'level', 'required');
        $this->form_validation->set_message('is_unique', '{field} telah di gunakan');
        $this->form_validation->set_message('required', '%s masih kosong silahkan isi');
        $this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
        $this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

        if ($this->form_validation->run() == FALSE)
        {
            $query= $this->user_m->get($id);
            if($query->num_rows() > 0){
                $data['row']=$query->row();
                $this->template->load('template/template','user/user_form_edit',$data);
            } else{
                echo  "<script>
                alert('data Tidak ditemukan');
                window.location='".site_url('user')."';
            </script>";
            }
        }else{
            $post=$this->input->post(null,TRUE);
            $this->user_m->edit($post);
            if($this->db->affected_rows() > 0){
                echo  "<script>
                alert('data Berhasil di Edit');
                
            </script>";
            }
            echo "<script>
                window.location='".site_url('user')."';
            </script>";
        }
        
    }

    function username_check()
    {
        $post=$this->input->post(null,TRUE);
        $query = $this->db->query("SELECT * FROM tb_user Where username = '$post[username]' AND id_user != '$post[id_user]'");
        if($query->num_rows() > 0){
        $this->form_validation->set_message('username_check', '{field} ini sudah dipakai silahkan ganti');
        return FALSE;
        } else{
            return TRUE;
        }
    }

    public function del()
    {
        $id=$this->input->post('id_user');
        $this->user_m->del($id);
        if($this->db->affected_rows() > 0){
            echo  "<script>
            alert('data Berhasil dihapus');
            
        </script>";
        }
        echo "<script>
            
            window.location='".site_url('user')."';
        </script>";
    }


    public function simpan_pengaduan()
	{
				
					$data['username'] = $this->input->post('username');
					$data['alamat'] = $this->input->post('alamat');
					$data['password'] = $this->input->post('password');
					$data['nama'] = $this->input->post('nama');
					// $data['alamat'] = $this->input->post('alamt');
					// $data['hal_yang_diadukan'] = $this->input->post('diadukan');

					$result = $this->user_m->add_user($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('home'));
					}
	}
}
