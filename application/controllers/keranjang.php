<?php
class Keranjang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('barang_m');
        $this->load->model('invoice_m');
        check_not_login_user();
    }

    public function tambah_kekeranjang($id)
    {
        $barang = $this->barang_m->find($id);

        $data = array(
            'id'      => $barang->id_barang,
            'qty'     => 1,
            'price'   => $barang->harga_jual,
            'name'    => $barang->nama_barang

        );

        $this->cart->insert($data);
        redirect('home');
    }


    public function detail_keranjang()
    {
        $this->template->load('template/template_user','keranjang/keranjang');
       
       
    }

    public function hapus_keranjang()
    {
        $this->cart->destroy();
        redirect('home');
    }

    public function pembayaran()
    {
        // $this->load->view('templates/header');
        // $this->load->view('templates/sidebar');
        // $this->load->view('pembayaran');
        // $this->load->view('templates/footer');
        $this->template->load('template/template_user','keranjang/pembayaran');
    }
    public function proses_pesanan()
    {
        $is_processed = $this->invoice_m->index();
        if ($is_processed) {
            $this->cart->destroy();
  
            $this->template->load('template/template_user','keranjang/proses_pesan');
        } else {
            echo " Maaf pesanan anda gagal diproses!";
        }
    }

    public function detail($id_barang)
    {
        $data['barang'] = $this->barang_m->detail_brg($id_barang);
        // $this->load->view('templates/header');
        // $this->load->view('templates/sidebar');
        // $this->load->view('detail_brg', $data);
        $this->template->load('template/template_user','keranjang/detail_keranjang', $data);
        // $this->load->view('templates/footer');
    }
}
