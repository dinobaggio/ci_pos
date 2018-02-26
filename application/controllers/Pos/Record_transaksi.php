<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Record_transaksi extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Ci_pos");
    }
    

    public function index()
    {
        $data['title'] = "Record Transaksi";
        $data['all_struk'] = $this->Ci_pos->list_struk();

        $this->load->view('template/header', $data);
        $this->load->view('pos/record_transaksi', $data);
        $this->load->view('template/footer');
    }

}

/* End of file Record_transaksi.php */
