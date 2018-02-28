<h1>List Barang</h1>
    <div id='list_barang'>
            <table>
                <tr>
                <th>Nama Barang</th>
                <th>Stok Barang</th>
                <th>Harga Barang</th>
                <th><button onclick='clear_barang()'>Clear</button></th>
                </tr>
                <?php 
                    $i = 0;
                    foreach ($smua_barang as $barang) {
                        $id = $barang['id_barang'];
                        $nama = $barang['nama_barang'];
                        $stok_barang = $barang['stok_barang'];
                        $harga_barang = $barang['harga_barang'];
                        $index = $i;
                        $i++;
                        $id_jumlah = "jumlah".$id;
                        $id_tombol = "tombol".$id;
                        $id_cancel = "cancel".$id;
                        $id_input = "input".$id;
                        $id_pilih = "pilih".$id;
                        $id_tutup = "tutup".$id;

                        echo "<tr>";
                        echo "<td>".$nama."</td>";
                        echo "<td>".$stok_barang."</td>";
                        echo "<td>".$harga_barang."</td>";
                        
                        ?>
                        <td id="<?= $id_pilih ?>"><button onclick="pilih_barang({
                            'id_barang':'<?= $id ?>'
                        })">Pilih</button>
                        </td>

                        <td id="<?= $id_input?>" style='display:none;'>
                            masukan jumlah <input  type='number' id='<?= $id_jumlah?>' size='3' style='width:80px' >
                        </td>

                        <td>
                        <button onclick="keranjang({
                            'id_barang':'<?= $id ?>',
                            'nama_barang':'<?= $nama ?>',
                            'stok_barang': '<?= $stok_barang?>',
                            'harga_barang': '<?= $harga_barang ?>',
                            'index':'<?= $index ?>'
                        })" 
                        id="<?= $id_tombol ?>" style="display:none;">
                            masukan keranjang</button>
                        </td>

                        <td>
                            <button onclick="tutup_pilih({
                                'id_barang':'<?= $id ?>'
                            })"
                            id="<?= $id_tutup ?>" style="display:none">X</button>

                            <button style='display:none' 
                            onclick = "cancel({
                                'id_barang':'<?= $id ?>',
                                'index':'<?= $index?>'
                            })"
                            id="<?= $id_cancel ?>">cancel</button>
                        </td>

                <?php
                        echo "</tr>";
                    } // akhir foreach
                ?>
            </table>
            <script>
                cek_keranjang();

                function cek_keranjang () {
                    if (localStorage.keranjang != null ) {
                        let keranjang = JSON.parse(localStorage.keranjang);
                        let filter = keranjang.filter(function (keranjang) {
                            return keranjang != null;
                        });
                        if (filter[0] != null) {
                            for (let i=0; i<filter.length;i++) {
                                let id = filter[i].id_barang;
                                let jumlah_barang = filter[i].jumlah_barang;
                                let el_tombol = document.getElementById("tombol"+id);
                                let el_jumlah = document.getElementById("jumlah"+id);
                                let el_cancel = document.getElementById("cancel"+id);
                                let el_pilih = document.getElementById("pilih"+id);
                                let el_input = document.getElementById("input"+id);
                                if (el_tombol != null &&
                                    el_jumlah != null &&
                                    el_cancel != null) {
                                        el_tombol.disabled = true;
                                        el_jumlah.disabled = true;
                                        el_jumlah.value = jumlah_barang;
                                        el_pilih.style.display = 'none';
                                        el_tombol.style.display = '';
                                        el_input.style.display = '';
                                        el_cancel.style.display = '';
                                    }
                            }
                        } else {
                            localStorage.keranjang = '[]';
                        }
                    }
                }
            </script>

        