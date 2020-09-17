<?php
class Invoice_m extends CI_Model
{
    function __construct(){
        parent::__construct();
        $this->load->library('upload');
    }
    public $table ='tb_invoice';
    public function add($post)
    {
        date_default_timezone_set('Asia/Jakarta');
        // $nama = $this->input->post('nama');
        // $alamat = $this->input->post('alamat');
        // $kode_invoice = $this->input->post('kode_invoice');
        // $jasa=$this->input->post('jasa');
        // $ket=$this->input->post('keterangan');
        // $gambar= $this->_uploadImage();
        $params['kode_invoice']= $post['kode_invoice'];
        $params['nama']= $post['nama'];
        $params['alamat']= $post['alamat'];
        $params['jasa']= $post['jasa'];
        $params['keterangan']= $post['keterangan'];
        // $params['gambar']= $post['image'];;
        $params['gambar']= $this->_uploadImage();
        $params['batas_byr']= date('Y-m-d', mktime(
            date('H'),
            date('i'),
            date('s'),
            date('m'),
            date('d') + 1,
            date('Y')
        ));
        $params['tgl_pesan']= date('Y-m-d');
        // $invoice = array(
        //     'kode_invoice' => $kode_invoice,
        //     'nama' => $nama,
        //     'alamat' => $alamat,
        //     'jasa'=>$jasa,
        //     'keterangan'=>$ket,
        //     'gambar'=>$this->_uploadImage(),
        //     'tgl_pesan' => date('Y-m-d'),
        //     'batas_byr' => date('Y-m-d', mktime(
        //         date('H'),
        //         date('i'),
        //         date('s'),
        //         date('m'),
        //         date('d') + 1,
        //         date('Y')
        //     )),
        // );

        $this->db->insert('tb_invoice', $params);
        $id_invoice = $this->db->insert_id();

        foreach ($this->cart->contents() as $item) {
            $harga=$item['price'];
            $qty=$item['qty'];
            $total1=$qty * $harga;
            // $total=$total1-($total1*($diskon/100));
            $data = array(
                'id_invoice_p' => $id_invoice,
                'id_barang' => $item['id'],
                // 'nm_brg' => $item['name'],
                'jumlah' => $item['qty'],
                // 'diskon' => $item['diskon'],
                'total_penjualan'=>$item['subtotal'],
                // 'harga' => $item['price'],

            );
            $this->db->insert('tb_penjualan', $data);
        }
        return TRUE;
    }

    public function tampil_data()
    {
        $result = $this->db->get('tb_invoice');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function ambil_id_invoice($id_invoice)
    {
        $result = $this->db->where('id', $id_invoice)->limit(1)->get('tb_invoice');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return false;
        }
    }

    public function ambil_id_pesanan($id_invoice)
    {
        $result = $this->db->where('id_invoice', $id_invoice)->get('tb_penjualan_online');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function cekkodebarang()
    {
        $this->db->select_Max('kode_invoice','kodebarang');
        $query=$this->db->get('tb_invoice');
        $hasil = $query->row();
        return $hasil->kodebarang;
    }

    public function get_all()
	{
		$this->db->from('tb_invoice');
		// $this->db->join('pengecer','pengecer.id_pengecer = tb_invoice.id_pengencer');
		return $this->db->get();
	}
	public function get_id($id){
		// $this->db->select('tb_penjualan.id_invoice AS id_invoicepen');
		$this->db->from('tb_penjualan');
        $this->db->join('tb_barang','tb_barang.id_barang = tb_penjualan.id_barang');
        $this->db->join('tb_invoice','tb_invoice.id_invoice = tb_penjualan.id_invoice_p');
		$this->db->where('id_invoice_p',$id);
		return $this->db->get();
    }
    
    private function _uploadImage()
    {

        // $hash = md5(date('s'));
        $config['upload_path']          = './assets/bukti/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        // $config['file_name']            =  $hash;
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB
        $config['encrypt_name']         = TRUE;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;
        // $this->load->library('upload', $config);
        $this->upload->initialize($config);
		// 		$data = array();
		// 			if($this->upload->do_upload('gambar')) {   
		// 		        $dataInfo = $this->upload->data();
		// 		        $data['gambar'] = $dataInfo['file_name'];
		// 		    }
        if ($this->upload->do_upload('gambar')) {
            return $this->upload->data("file_name");
        }
        // return "default.jpg";
        $error = array('error' => $this->upload->display_errors());
        echo '<div class="alert alert-danger">'.$error['error'].'</div>';
        // echo "Error";
    }

    public function diproses()
    {
        $nama=$this->session->userdata('nama');
        $this->db->from('tb_invoice');
        $this->db->where('status_pesanan','diproses');
        $this->db->where('nama',$nama);
        return $this->db->get();
    }

    public function disiapkan()
    {
        $nama=$this->session->userdata('nama');
        $this->db->from('tb_invoice');
        $this->db->where('status_pesanan','disiapkan');
        $this->db->where('nama',$nama);
        return $this->db->get();
    }

    public function dikirim()
    {
        $nama=$this->session->userdata('nama');
        $this->db->from('tb_invoice');
        $this->db->where('status_pesanan','dikirim');
        $this->db->where('nama',$nama);
        return $this->db->get();
    }

    public function diambil()
    {
        $nama=$this->session->userdata('nama');
        $this->db->from('tb_invoice');
        $this->db->where('status_pesanan','diambil');
        $this->db->where('nama',$nama);
        return $this->db->get();
    }

    public function selesai()
    {
        $nama=$this->session->userdata('nama');
        $this->db->from('tb_invoice');
        $this->db->where('status_pesanan','selesai');
        $this->db->where('nama',$nama);
        return $this->db->get();
    }
 

    public function update($id,$data)
    {
        $this->db->where('id_invoice' ,$id);
        $this->db->update($this->table,$data);
    }
}
