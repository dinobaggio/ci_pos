<h1>Tambah Barang </h1>
<?= $info ?>
<div id='tambah_barang'>

    <form method="post" action="<?= base_url('pos/tambah_barang/proses_tambah')?>">
        Nama Barang: <input type="text" name="nama_barang"> <br/>
        Stok Barang: <input type="number" name='stok_barang'> <br/>
        <input type="submit" value='submit'>
    </form>

</div>