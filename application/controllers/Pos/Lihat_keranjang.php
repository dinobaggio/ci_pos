<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Lihat_keranjang extends CI_Controller {

    public function index()
    {
        $data['title'] = "Lihat Keranjang";
        $this->load->view("template/header", $data);
        $this->load->view("pos/lihat_keranjang");
        $this->load->view("template/footer");
    }

}

/* End of file Lihat_keranjang.php */
