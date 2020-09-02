
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class transaksi_m extends CI_Model {
    
    public function cekkodebarang()
    {
        $this->db->select_Max('status','kodebarang');
        $query=$this->db->get('tb_penjualan');
        $hasil = $query->row();
        return $hasil->kodebarang;
    }
     
    public function del($id)
	{
        $this->db->where("id_jual",$id);
        $this->db->delete('tb_penjualan');
    }
}