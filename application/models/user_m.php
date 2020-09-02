<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {

    // protected $_table = 'tb_user';

    public function login($post){
        $this->db->select("*");
        $this->db->from("tb_user");
        $this->db->where('username', $post['username']);
        $this->db->where('password', md5($post['password']));
        $query=$this->db->get();
        return $query;
    }
public function login_user($post)
{
    
        $this->db->select("*");
        $this->db->from("tb_pelanggan");
        $this->db->where('username', $post['username']);
        $this->db->where('password', md5($post['password']));
        $query=$this->db->get();
        return $query;

}
    // public function get_all(){
    //     $query = $this->db->get('tb_user');
    //     return $query;
    // }

    public function get($id=null)
    {
        $this->db->from('tb_user');
        if($id != null){
        $this->db->where('id_user', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function get_user($id=null)
    {
        $this->db->from('tb_pelanggan');
        if($id != null){
        $this->db->where('id_pelanggan', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
           $params['username']= $post['username']; 
           $params['password']= md5($post['password']);
           $params['nama']= $post['nama']; 
           $params['level']= $post['level'];
           $this->db->insert('tb_user',$params);
    }
    public function add_user($data)
    {
        $this->db->insert('tb_pelanggan', $data);
        return true;
    }
    

    public function edit($post)
    {
           $params['username']= $post['username']; 
           if(!empty($post['password'])){
               $params['password']= md5($post['password']);
           }
           $params['nama']= $post['nama']; 
           $params['level']= $post['level'];
           $this->db->where('id_user',$post['id_user']);
           $this->db->update('tb_user',$params);
    }

    
    public function del($id)
	{
        $this->db->where("id_user",$id);
        $this->db->delete('tb_user');
	}
}