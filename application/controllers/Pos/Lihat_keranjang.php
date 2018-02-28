<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Lihat_keranjang extends CI_Controller {

    public function index()
    {
        if ($this->session->pelanggan) {
            $pelanggan = json_decode($this->session->pelanggan);
            $data['id_pelanggan'] = $pelanggan->id_pelanggan;
            //var_dump($pelanggan);
        } else {
            $data['id_pelanggan'] = '0';
        }
        $data['title'] = "Lihat Keranjang";
        $this->load->view("template/header", $data);
        $this->load->view("pos/lihat_keranjang");
        $this->load->view("template/footer");
    }

}

/* End of file Lihat_keranjang.php */
