<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_keluar_m extends CI_Model { 


    public function get($id=null)
    {
        $this->db->from('tb_barang_keluar');
        $this->db->join('tb_barang','tb_barang.id_barang = tb_barang_keluar.id_barang');
        // $this->db->join('tb_supplier','tb_supplier.id_supplier = tb_barang_keluar.id_supplier');
        if($id != null){
        $this->db->where('id_keluar', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
           $params['id_barang']= $post['id_barang'];
        //    $params['id_supplier']= $post['id_supplier']; 
           $params['harga_jual']= $post['harga'];
           $params['qty']= $post['qty']; 
           $params['total']= $post['total'];
           $params['tanggal']= $post['tanggal'];
           $this->db->insert('tb_barang_keluar',$params);
    }

    public function edit($post)
    {
        
        $params['id_barang']= $post['id_barang'];
        // $params['id_supplier']= $post['id_supplier']; 
        $params['harga_jual']= $post['harga'];
        $params['qty']= $post['qty']; 
        $params['total']= $post['total'];
        $params['tanggal']= $post['tanggal'];
           $this->db->where('id_keluar',$post['id_keluar']);
           $this->db->update('tb_barang_keluar',$params);
    }

    
    public function del($id)
	{
        $this->db->where("id_keluar",$id);
        $this->db->delete('tb_barang_keluar');
    }
    
    // public function cekkodebarang()
    // {
    //     $this->db->select_Max('kode_barang','kodebarang');
    //     $query=$this->db->get('tb_barang');
    //     $hasil = $query->row();
    //     return $hasil->kodebarang;
    // }
}


