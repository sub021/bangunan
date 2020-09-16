<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_m extends CI_Model {

    public $table ='tb_pelanggan';

    public function get($id=null)
    {
        $this->db->from('tb_pelanggan');
        if($id != null){
        $this->db->where('id_pelanggan', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function update($id,$data)
    {
        $this->db->where('id_pelanggan' ,$id);
        $this->db->update($this->table,$data);
    }
}