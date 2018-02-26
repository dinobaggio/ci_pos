<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Ci_pos');
    }
    

    public function index()
    {
        $keranjang = $this->input->post('keranjang');
        $total = $this->input->post('total');
        
        if ($keranjang) {
            $data = array(
                'keranjang' => $keranjang,
                'total' => $total
            );
            //print_r($keranjang);
            $this->session->set_userdata($data);
            
        } else {
            if($this->session->keranjang && $this->session->total) {
                $keranjang = json_decode($this->session->keranjang);
                $total = json_decode($this->session->total);

                if($this->proses_transaksi($keranjang, $total)) {
                    $data['title'] = "Sukses";
                    $data['info'] = "Sukses Transaksi";
                } else {
                    $data['title'] = "Gagal";
                    $data['info'] = "Gagal Transaksi";
                }

                $this->load->view('template/header', $data);
                $this->load->view('pos/sukses_transaksi', $data);
                $this->load->view('template/footer');
                $this->hapus_session();
            } else {
                header('Location:'. base_url('pos/home'));
            }
        }

        
    }

    public function hapus_session () {
        $data = array('keranjang', 'total');
        $this->session->unset_userdata($data);
    }

    public function proses_transaksi ($keranjang, $total) {
        $id_struk = $this->Ci_pos->buat_struk($total->total_harga, $total->total_barang);
        for ($i=0;$i<count($keranjang);$i++) {
            $this->Ci_pos->buat_transaksi(
                $keranjang[$i]->id_barang,
                $id_struk,
                $keranjang[$i]->jumlah_barang,
                $keranjang[$i]->jumlah_harga
            );
        }

        return true;

    }

}

/* End of file Transaksi.php */
