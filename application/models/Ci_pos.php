<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ci_pos extends CI_Model {

    public function list_barang () {
        $query = $this->db->get('barang');
        return $query->result_array();
    }

    public function list_struk() {
        $query = $this->db->get('struk');
        $struk = $query->result();
        return $struk;
    }

    public function list_transaksi_struk($id_struk) {
        $query = $this->db->get_where('transaksi', array('id_struk'=>$id_struk));
        $transaksi = $query->result();
        return $transaksi;
    }

    public function list_barang_transaksi($id_barang) {
        $query = $this->db->get_where('barang', array('id_barang'=>$id_barang));
        $barang = $query->row();
        return $barang;
    }

    public function tambah_barang($nama_barang, $stok_barang, $harga_barang) {
        $query = "INSERT INTO barang (nama_barang, stok_barang, harga_barang,created)
        VALUES ('$nama_barang', '$stok_barang', '$harga_barang', NOW())";
        $this->db->query($query);

        return true;
    }

    public function buat_struk ($total_harga, $total_barang) {
        $query = "INSERT INTO struk (total_harga, total_barang, created) VALUES 
        ('$total_harga', '$total_barang', NOW())";
        $this->db->query($query);
        return $this->db->insert_id();
    }

    public function buat_transaksi ($id_barang, $id_struk, $jumlah_barang, $jumlah_harga) {
        $query = "INSERT INTO transaksi (id_barang, id_struk, jumlah_barang, jumlah_harga, created) VALUES
        ('$id_barang', '$id_struk', '$jumlah_barang', '$jumlah_harga', NOW())";
        $this->db->query($query);
    }

}

/* End of file Ci_pos.php */
