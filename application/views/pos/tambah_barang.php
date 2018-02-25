<h1>Tambah Barang </h1>
<?= $info ?>
<div id='tambah_barang'>

    <form method="post" action="<?= base_url('pos/tambah_barang/proses_tambah')?>">
    <table>
        <tr><td>Nama Barang:</td><td><input type="text" name="nama_barang"/></td></tr>
        <tr><td>Stok Barang:</td><td><input type="number" name='stok_barang'></td></tr>
        <tr><td>Harga Barang:</td><td><input type="number" name="harga_barang"></td></tr>
        <tr><td><input type="submit" value='submit'></td></tr>
    </table>
    </form>

</div>