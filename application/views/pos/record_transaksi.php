<?php

foreach ($all_struk as $struk) {
    $id_struk = $struk->id_struk;
    $all_transaksi = $this->Ci_pos->list_transaksi_struk($id_struk);
    if ($struk->id_pelanggan == 0) {
        $nama_pelanggan = 'anonymous';
    } else {
        $pelanggan = $this->Ci_pos->table_pelanggan($struk->id_pelanggan);
        $nama_pelanggan = $pelanggan->nama_pelanggan;
    }
    echo "<h3>Struk".$id_struk."</h3>";
    echo "Nama Pelanggan: ".$nama_pelanggan."<br/><br/>";
    foreach ($all_transaksi as $transaksi) {
        $id_barang = $transaksi->id_barang;
        $barang = $this->Ci_pos->list_barang_transaksi($id_barang);
        echo "Nama Barang: ".$barang->nama_barang."<br/>";
        echo "Jumlah: ".$transaksi->jumlah_barang."<br/>";
        echo "Harga satuan: ".$barang->harga_barang."<br/>";
        echo "Harga Total: ".$transaksi->jumlah_harga."<br/>";
        echo "<br/>";
    }

    echo "Jumlah barang: ".$struk->total_barang."<br/>";
    echo "Jumlah harga: ".$struk->total_harga."<br/>";
    echo "<br/><hr/>";
}