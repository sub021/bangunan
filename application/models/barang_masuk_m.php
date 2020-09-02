<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_masuk_m extends CI_Model { 


    public function get($id=null)
    {
        $this->db->from('tb_barang_masuk');
        $this->db->join('tb_barang','tb_barang.id_barang = tb_barang_masuk.id_barang');
        $this->db->join('tb_supplier','tb_supplier.id_supplier = tb_barang_masuk.id_supplier');
        if($id != null){
        $this->db->where('id_masuk', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
           $params['id_barang']= $post['id_barang'];
           $params['id_supplier']= $post['id_supplier']; 
           $params['harga_beli']= $post['harga'];
           $params['qty']= $post['qty']; 
           $params['total']= $post['total'];
           $params['tanggal']= $post['tanggal'];
           $this->db->insert('tb_barang_masuk',$params);
    }

    public function edit($post)
    {
        $params['id_barang']= $post['id_barang'];
        $params['id_supplier']= $post['id_supplier']; 
        $params['harga_beli']= $post['harga'];
        $params['qty']= $post['qty']; 
        $params['total']= $post['total'];
        $params['tanggal']= $post['tanggal'];
           $this->db->where('id_masuk',$post['id_masuk']);
           $this->db->update('tb_barang_masuk',$params);
    }

    
    public function del($id)
	{
        $this->db->where("id_masuk",$id);
        $this->db->delete('tb_barang_masuk');
    }
    
    // public function cekkodebarang()
    // {
    //     $this->db->select_Max('kode_barang','kodebarang');
    //     $query=$this->db->get('tb_barang');
    //     $hasil = $query->row();
    //     return $hasil->kodebarang;
    // }

    // public function cetaktgl($post)
    // {
    //     $tgl1=date('Y-m-d',strtotime($post['tanggal1']));
    //     $tgl2=date('Y-m-d',strtotime($post['tanggal2']));
    //     $this->db->from('tb_barang_masuk');
    //     $this->db->join('tb_barang','tb_barang.id_barang = tb_barang_masuk.id_barang');
    //     $this->db->join('tb_supplier','tb_supplier.id_supplier = tb_barang_masuk.id_supplier');
    //     $this->db->where('tanggal BETWEEN"'.$tgl1.'"and"'.$tgl2.'"');
    //     $query = $this->db->get();
    //     return $query;
    // }
}


