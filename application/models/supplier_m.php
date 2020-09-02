<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class supplier_m extends CI_Model {


    public function get($id=null)
    {
        $this->db->from('tb_supplier');
        if($id != null){
        $this->db->where('id_supplier', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
           $params['kode_supplier']= $post['kode_supplier']; 
           $params['nama_supplier']= $post['nama'];
           $params['alamat_supplier']= $post['alamat']; 
           $params['kota_supplier']= $post['kota'];
           $params['telp_supplier']= $post['telp'];
           $this->db->insert('tb_supplier',$params);
    }

    public function edit($post)
    {
        $params['kode_supplier']= $post['kode_supplier']; 
        $params['nama_supplier']= $post['nama'];
        $params['alamat_supplier']= $post['alamat']; 
        $params['kota_supplier']= $post['kota'];
        $params['telp_supplier']= $post['telp'];
           $this->db->where('id_supplier',$post['id_supplier']);
           $this->db->update('tb_supplier',$params);
    }

    
    public function del($id)
	{
        $this->db->where("id_supplier",$id);
        $this->db->delete('tb_supplier');
    }
    
    public function cekkodesupplier()
    {
        $this->db->select_Max('kode_supplier','kodesupplier');
        $query=$this->db->get('tb_supplier');
        $hasil = $query->row();
        return $hasil->kodesupplier;
    }
}


