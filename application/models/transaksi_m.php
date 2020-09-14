
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
    public function cari($id)
    {
        $query = $this->db->get_where('tb_barang', array('kode_barang' => $id));
        return $query;
    }
    public function get()
    {
        $this->db->from('tb_penjualan');
        $this->db->join('tb_barang','tb_barang.id_barang = tb_penjualan.id_barang');
        $this->db->join('tb_invoice','tb_invoice.id_invoice= tb_penjualan.id_invoice_p');
        return $this->db->get();
    }

    public function get1()
    {
        $this->db->from('tb_barang_masuk');
        $this->db->join('tb_barang','tb_barang.id_barang = tb_barang_masuk.id_barang');
        $this->db->join('tb_supplier','tb_supplier.id_supplier= tb_barang_masuk.id_supplier');
        return $this->db->get();
    }
}