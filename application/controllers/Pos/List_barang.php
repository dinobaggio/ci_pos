<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class List_barang extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Ci_pos');
    }

    public function index()
    {
        $data['smua_barang'] = $this->Ci_pos->list_barang();
        $data['title'] = "List Barang";

        $this->load->view('template/header', $data);
        $this->load->view('pos/list_barang', $data);
        $this->load->view('template/footer', $data);
    }

}

/* End of file List_barang.php */
