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
	public function status()
	{
		$this->load->model('invoice_m');
		$data['diproses']=$this->invoice_m->diproses();
		$data['disiapkan']=$this->invoice_m->disiapkan();
		$data['dikirim']=$this->invoice_m->dikirim();
		$data['diambil']=$this->invoice_m->diambil();
		$data['selesai']=$this->invoice_m->selesai();
		$this->template->load('template/template_user','status_transaksi',$data);
	}
	
}


