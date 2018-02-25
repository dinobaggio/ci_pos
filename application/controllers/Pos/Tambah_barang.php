<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Tambah_barang extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Ci_pos');
    }

    public function index($info='', $title='Tambah barang')
    {
        $data['info'] = $info;
        $data['title'] = $title;
        
        $this->load->view("template/header", $data);
        $this->load->view("pos/tambah_barang", $data);
        $this->load->view("template/footer", $data);
    }

    public function proses_tambah() {
        if(isset($_POST)) {
            $nama_barang = $this->input->post('nama_barang');
            $stok_barang = $this->input->post('stok_barang');
            if (!empty($nama_barang) && !empty($stok_barang)) {
                $tugas = $this->Ci_pos->tambah_barang($nama_barang, $stok_barang);
                if($tugas) {

                    $this->index('sukses memasukan data');

                } else {
                    $this->index('gagal memasukan barang');
                }
            }

        }
    }

}

/* End of file Tambah_barang.php */
