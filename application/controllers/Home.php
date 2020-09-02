<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	public function index()
	{
		// check_not_login_user();
		$this->load->model('barang_m');
		$data['barang']=$this->barang_m->get();
		$this->template->load('template/template_user','home',$data);
	}
	
}


