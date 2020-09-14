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
            'name'    => $barang->nama_barang,
            'stok'     =>$barang->stok

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
        $db=$this->invoice_m->cekkodebarang();
            $nourut=substr($db,3,4);
            $kodegen= $nourut + 1;
            $data = array('kode_barang'=>$kodegen);
        $this->template->load('template/template_user','keranjang/pembayaran',$data);
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


    public function delete()
    {
        if ($this->uri->segment(3)) {

            $id = $this->uri->segment(3);

            $this->cart->remove($id);

            redirect('keranjang/detail_keranjang');
        } else {
            redirect('home');
        }
    }

    public function update_keranjang()
    {
        if ($this->uri->segment(3)) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('qty', 'Jumlah Pesanan', 'required|numeric');

            if ($this->form_validation->run() == TRUE) {
                $jumlah= $this->input->post('qty', TRUE);
                if($jumlah>100){
                    $diskon=5;
                }else{
                    $diskon=0;
                }
                $data = array(
                    // 'qty' => $this->input->post('qty', TRUE),
                    'qty' =>$jumlah,
                    'diskon' => $diskon,
                    'rowid' => $this->uri->segment(3)
                );

                $this->cart->update($data);

                redirect('keranjang/detail_keranjang');
            } else {
                // $this->template->olshop('cart');
            }
        } else {
            redirect('keranjang/detail_keranjang');
        }
    }
}
