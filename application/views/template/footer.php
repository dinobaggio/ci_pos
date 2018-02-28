<script>
    dalam_keranjang();
        function keranjang (data) {
            if (localStorage.keranjang == null ){
                localStorage.setItem("keranjang", '[]');
            }
            let id = data.id_barang;
            let stok_barang = data.stok_barang;
            let el_jumlah = document.getElementById('jumlah'+id);
            let el_tombol = document.getElementById('tombol'+id);
            let el_cancel = document.getElementById('cancel'+id);
            let el_tutup = document.getElementById('tutup'+id);
            let jumlah_harga = Number(data.harga_barang) * Number(el_jumlah.value);
            
            if (el_jumlah.value != '') {
                if (el_jumlah.value > stok_barang) {
                    alert('jumlah barang '+data.nama_barang+' tidak boleh lebih dari stok barang');
                } else {
                    let array = JSON.parse(localStorage.keranjang);
                    array[data.index] = {
                        'id_barang' : id,
                        'nama_barang': data.nama_barang,
                        'harga_barang': data.harga_barang,
                        'jumlah_harga' : jumlah_harga,
                        'jumlah_barang' : el_jumlah.value
                    };
                    
                    localStorage.keranjang = JSON.stringify(array);
                    dalam_keranjang();// info notif tombol example lihat keranjang (1)
                    el_jumlah.disabled = true;
                    el_tombol.disabled = true;
                    el_tutup.style.display = 'none';
                    el_cancel.style.display = '';
                }
            }

            
        }

        function pilih_barang (data) {
            let id = data.id_barang;
            let el_input = document.getElementById('input'+id);
            let el_pilih = document.getElementById('pilih'+id);
            let el_tombol = document.getElementById('tombol'+id);
            let el_tutup = document.getElementById('tutup'+id);
            let el_jumlah = document.getElementById('jumlah'+id);

            el_input.style.display = '';
            el_tombol.style.display = '';
            el_tutup.style.display = '';
            el_pilih.style.display = 'none';
            el_jumlah.value = 1;

        }

        function tutup_pilih (data) {
            let id = data.id_barang;
            let el_input = document.getElementById('input'+id);
            let el_pilih = document.getElementById('pilih'+id);
            let el_tombol = document.getElementById('tombol'+id);
            let el_tutup = document.getElementById('tutup'+id);

            el_input.style.display = 'none';
            el_tombol.style.display = 'none';
            el_tutup.style.display = 'none';
            el_pilih.style.display = '';
            
        }

        function cancel (data) {
            let id = data.id_barang;
            let el_jumlah = document.getElementById('jumlah'+id);
            let el_tombol = document.getElementById('tombol'+id);
            let el_cancel = document.getElementById('cancel'+id);
            let el_tutup = document.getElementById('tutup'+id);
            if (el_jumlah.value != '') {
                let array = JSON.parse(localStorage.keranjang);
                array[data.index] = null;
                localStorage.keranjang = JSON.stringify(array);
            } 

            dalam_keranjang(); // info notif tombol example lihat keranjang (1)

            el_jumlah.disabled = false;
            el_tombol.disabled = false;
            el_cancel.style.display = 'none';
            el_tutup.style.display = '';
        }

        function kirim_data (total) {
            let http = new XMLHttpRequest();
            let data = localStorage.keranjang;
            let konfirmasi = confirm("yakin ingin memproses?");
            if (konfirmasi) {
                if (data != null) {
                    data = JSON.parse(data);
                    let filter_data = data.filter(function (keranjang) {
                        return keranjang != null
                    });
                    data = JSON.stringify(filter_data);
                    total = JSON.stringify(total);
                    if (filter_data[0] != null) {
                        http.onreadystatechange = function () {
                            let status = this.status;
                            let readyState = this.readyState;
                            let response = this.response;
                            let responseText = this.responseText;

                            if (status === 200 && readyState == 4) {
                                transaksi();
                            }
                        };
                        http.open("POST", "<?= base_url('pos/transaksi')?>");
                        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        http.send("keranjang="+data+"&total="+total);
                    } else {
                        alert('tidak ada barang dalam keranjang!');
                        localStorage.clear();
                    }
                    
                } else {
                    alert('tidak ada barang dalam keranjang!');
                }
            }
            
        }

        function dalam_keranjang () {
            let keranjang = localStorage.keranjang;
            let tombol_keranjang = document.getElementById('tombol_keranjang');
            
            if(keranjang != null) {
                keranjang = JSON.parse(keranjang);
                keranjang = keranjang.filter(function (keranjang) {
                    return keranjang != null;
                });
                if(keranjang[0] != null) {
                    let total_item = keranjang.length;
                    tombol_keranjang.innerHTML = "Lihat Keranjang ("+total_item+")";
                    console.log('keranjang ada isinya!');
                } else {
                    tombol_keranjang.innerHTML = "Lihat Keranjang";
                }
            }
        }

        

        function transaksi () {
            window.open("<?= base_url('pos/transaksi') ?>", "_self");
        }

        function home() {
            window.open("<?= base_url('pos/home') ?>", "_self");
        }

        function lihat_barang () {
            window.open("<?= base_url('pos/list_barang') ?>", "_self");
        }

        function tambah_barang () {
            window.open("<?= base_url('pos/tambah_barang') ?>", "_self");
        }
        function lihat_keranjang () {
            window.open("<?= base_url('pos/lihat_keranjang') ?>", "_self");
        }

        function clear_barang () {
            localStorage.clear();
            window.open("<?= base_url('pos/list_barang') ?>", "_self");
        }

        function record_transaksi () {
            window.open("<?= base_url('pos/record_transaksi') ?>", "_self");
        }
        </script>
    </div>
</body>
</html>