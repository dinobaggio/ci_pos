<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ci_pos extends CI_Model {

    public function list_barang () {
        $query = $this->db->get('barang');
        return $query->result_array();
    }

    public function tambah_barang($nama_barang, $stok_barang) {
        $query = "INSERT INTO barang (nama_barang, stok_barang, created)
        VALUES ('$nama_barang', '$stok_barang', NOW())";
        $this->db->query($query);

        return true;
    }

}

/* End of file Ci_pos.php */
