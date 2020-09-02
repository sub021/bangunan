<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_m extends CI_Model {


    public function get($id=null)
    {
        $this->db->from('tb_barang');
        if($id != null){
        $this->db->where('id_barang', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
           $params['kode_barang']= $post['kode_barang']; 
           $params['nama_barang']= $post['nama'];
           $params['stok']= $post['stok']; 
           $params['harga_jual']= $post['harga'];
           $this->db->insert('tb_barang',$params);
    }

    public function edit($post)
    {
            $params['kode_barang']= $post['kode_barang']; 
            $params['nama_barang']= $post['nama'];
            $params['stok']= $post['stok']; 
            $params['harga_jual']= $post['harga'];
           $this->db->where('id_barang',$post['id_barang']);
           $this->db->update('tb_barang',$params);
    }

    
    public function del($id)
	{
        $this->db->where("id_barang",$id);
        $this->db->delete('tb_barang');
    }
    
    public function cekkodebarang()
    {
        $this->db->select_Max('kode_barang','kodebarang');
        $query=$this->db->get('tb_barang');
        $hasil = $query->row();
        return $hasil->kodebarang;
    }
    public function find($id)
    {
        $result = $this->db->where('id_barang', $id)
            ->limit(1)
            ->get('tb_barang');

        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }

    public function detail_brg($id_barang)
    {
        $result = $this->db->where('id_barang', $id_barang)->get('tb_barang');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }


}


