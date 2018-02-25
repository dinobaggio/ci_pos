<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

    public function index()
    {
        $keranjang = $this->input->post('keranjang');
        
        if ($keranjang) {
            $data = array(
                'keranjang' => $keranjang
            );
            //print_r($keranjang);
            $this->session->set_userdata($data);
            
            //$this->session->unset_userdata('keranjang');
        }
        //$this->load->view('pos/cek_keranjang');
        echo $this->session->keranjang;
    }

}

/* End of file Transaksi.php */
