<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function login()
    {
        check_alredy_login();
        $this->load->view('login');
    }

    public function login_user()
    {
        check_alredy_login_user();
        $this->load->view('login_user');
    }
    public function daftar_user()
    {
        // check_alredy_login_user();
        $this->load->view('daftar');
    }
    public function proses_user()
    {
         $post = $this->input->post(null ,TRUE);
        if(isset($post['login'])){
            $this->load->model('user_m');
            $query= $this->user_m->login_user($post);
            if($query->num_rows() > 0){
                // echo "login berhasil";
                $row= $query->row();
                $params = array (
                    'id_pelanggan'=> $row->id_pelanggan,
                    'nama'=>$row->nama,
                    // 'level' => $row->level
                );
                 $this->session->set_userdata($params);
                echo "<script>
                alert('selamat, login berhasil');
                window.location='".site_url('home')."';
            </script>";
            } else {
                echo "<script>
                    alert('login gagal');
                    window.location='".site_url('auth/login_user')."';
                </script>";
            }
            
        }
    }
    public function proses()
    {
        $post = $this->input->post(null ,TRUE);
        if(isset($post['login'])){
            $this->load->model('user_m');
            $query= $this->user_m->login($post);
            if($query->num_rows() > 0){
                // echo "login berhasil";
                $row= $query->row();
                $params = array (
                    'id_user'=> $row->id_user,
                    'level' => $row->level
                );
                 $this->session->set_userdata($params);
                echo "<script>
                alert('selamat, login berhasil');
                window.location='".site_url('dasboard')."';
            </script>";
            } else {
                echo "<script>
                    alert('login gagal');
                    window.location='".site_url('auth/login')."';
                </script>";
            }
            
        }
    }

    public function logout()
        {
            $params = array ('id_user','level');
            $this->session->unset_userdata($params);
            redirect('auth/login');
        }
        public function logout_user()
        {
            $params = array ('id_pelanggan');
            $this->session->unset_userdata($params);
            redirect('auth/login_user');
        }
    
        public function add_user()
	{
				
					$data['username'] = $this->input->post('username');
					$data['alamat'] = $this->input->post('alamat');
					$data['password'] =md5($this->input->post('password'));
					$data['nama'] = $this->input->post('nama');
					// $data['alamat'] = $this->input->post('alamt');
					// $data['hal_yang_diadukan'] = $this->input->post('diadukan');
                    $this->load->model('user_m');
					$result = $this->user_m->add_user($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('auth/login_user'));
					}
	}
        }
    
