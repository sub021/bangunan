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
        //    $params['stok']= $post['stok']; 
           $params['harga_jual']= $post['harga'];
           $params['gambar']= $this->_uploadImage();
           $this->db->insert('tb_barang',$params);
    }

    public function edit($post)
    {
            $params['kode_barang']= $post['kode_barang']; 
            $params['nama_barang']= $post['nama'];
            // $params['stok']= $post['stok']; 
            $params['harga_jual']= $post['harga'];
            $params['gambar']= $this->_uploadImage();
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

    private function _uploadImage()
    {

        $hash = md5(date('s'));
        $config['upload_path']          = './assets/barang/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            =  $hash;
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB
        $config['encrypt_name']         = TRUE;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            return $this->upload->data("file_name");
        }
        return "default.jpg";
    }


}


