<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Lihat_keranjang extends CI_Controller {

    public function index()
    {
        $this->load->view("template/header");
        $this->load->view("pos/lihat_keranjang");
        $this->load->view("template/footer");
    }

}

/* End of file Lihat_keranjang.php */
