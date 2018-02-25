<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
        $data['title'] = 'Welcome Home';
        
        $this->load->view("template/header", $data);
        $this->load->view("pos/home");
        $this->load->view("template/footer");
    }

}

/* End of file Home.php */
