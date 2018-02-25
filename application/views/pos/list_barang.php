<h1>List Barang</h1>
    <div id='list_barang'>
            <table>
                <tr>
                <th>Nama Barang</th>
                <th>Stok Barang</th>
                <th><button onclick='clear_barang()'>Clear</button></th>
                </tr>
                <?php 
                    $i = 0;
                    foreach ($smua_barang as $barang) {
                        $id = $barang['id_barang'];
                        $nama = $barang['nama_barang'];
                        $stok_barang = $barang['stok_barang'];
                        $index = $i;
                        $i++;
                        $id_jumlah = "jumlah".$id;
                        $id_tombol = "tombol".$id;
                        $id_cancel = "cancel".$id;

                        echo "<tr>";
                        echo "<td>".$nama."</td>";
                        echo "<td>".$stok_barang."</td>";
                        echo "<td>masukan jumlah <input  type='number' id='$id_jumlah' size='3' style='width:80px'></td>";
                        
                        ?>
                        <td>
                        <button onclick="keranjang(<?= 
                        "'$nama','$id', 
                        '$id_tombol', 
                        '$id_jumlah', 
                        '$id_cancel',  
                        '$index'"
                        ?>)" 
                        id="<?= $id_tombol ?>">
                            masukan keranjang</button>
                        </td>

                        <td>
                            <button style='display:none' 
                            onclick="cancel(<?= "
                            '$id_jumlah', 
                            '$id_tombol', 
                            '$id_cancel',  
                            '$index'" 
                            ?>)"
                            id="<?= $id_cancel ?>">cancel</button>
                        </td>

                        <?php
                        echo "</tr>";
                    } // akhir foreach
                ?>
            </table>
            <input type='submit' value='beli' onclick='kirim_data()' />
            <script>
                cek_keranjang();

                function cek_keranjang () {
                    if (localStorage.keranjang != null ) {
                        let keranjang = JSON.parse(localStorage.keranjang);
                        let filter_keranjang = [];
                        for (let i=0;i<keranjang.length;i++) {
                            if (keranjang[i] != null) {
                                filter_keranjang.push(keranjang[i]);
                            }
                        }
                        if (filter_keranjang[0] != null) {
                            for (let i=0; i<filter_keranjang.length;i++) {
                                let id = filter_keranjang[i].id_barang;
                                let jumlah = filter_keranjang[i].jumlah;
                                let el_tombol = document.getElementById("tombol"+id);
                                let el_jumlah = document.getElementById("jumlah"+id);
                                let el_cancel = document.getElementById("cancel"+id);
                                if (el_tombol != null &&
                                    el_jumlah != null &&
                                    el_cancel != null) {
                                        el_tombol.disabled = true;
                                        el_jumlah.disabled = true;
                                        el_jumlah.value = jumlah;
                                        el_cancel.style.display = '';
                                    }
                            }
                        } else {
                            localStorage.keranjang = '[]';
                        }
                    }
                }
            </script>

        