<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasboard extends CI_Controller {


	public function index()
	{
		check_not_login();
		$this->db->from('tb_penjualan');
		$this->db->join('tb_barang','tb_barang.id_barang=tb_penjualan.id_barang');
		// $this->db->select_sum('jumlah');
		$query=$this->db->get();
		// $query = $this->db->query("SELECT nm_brg,sum(jumlah) as jumlah FROM pemesanan GROUP BY nm_brg")->result();
    	$x['hasil'] = $query;
		$this->template->load('template/template','dasboard',$x);
	}

	

}
