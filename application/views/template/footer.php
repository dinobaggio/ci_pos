<script>
        function keranjang (nama_barang, id_barang, id_tombol, id_jumlah, id_cancel, index) {
            if (localStorage.keranjang == null ){
                localStorage.setItem("keranjang", '[]');
            }
            let el_jumlah = document.getElementById(id_jumlah);
            let el_tombol = document.getElementById(id_tombol);
            let el_cancel = document.getElementById(id_cancel);
            
            if (el_jumlah.value != '') {
                let array = JSON.parse(localStorage.keranjang);
                array[index] = {
                    'id_barang' : id_barang,
                    'nama_barang': nama_barang,
                    'jumlah' : el_jumlah.value
                };
                
                localStorage.keranjang = JSON.stringify(array);
            }

            el_jumlah.disabled = true;
            el_tombol.disabled = true;
            el_cancel.style.display = '';
        }

        function cancel (id_jumlah, id_tombol, id_cancel, index) {
            let el_jumlah = document.getElementById(id_jumlah);
            let el_tombol = document.getElementById(id_tombol);
            let el_cancel = document.getElementById(id_cancel);
            if (el_jumlah.value != '') {
                let array = JSON.parse(localStorage.keranjang);
                array[index] = null;
                localStorage.keranjang = JSON.stringify(array);
            }

            el_jumlah.disabled = false;
            el_tombol.disabled = false;
            el_cancel.style.display = 'none';
        }

        function kirim_data () {
            let http = new XMLHttpRequest();
            let data = localStorage.keranjang;
            let filter_data = [];
            if (data != null) {
                data = JSON.parse(data);
                for (let i=0;i<keranjang.length;i++) {
                    if (data[i] != null) {
                        filter_data.push(data[i]);
                    }
                }
                data = JSON.stringify(filter_data);
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
                    http.send("keranjang="+data);
                } else {
                    alert('tidak ada barang dalam keranjang!');
                    localStorage.clear();
                }
                
            } else {
                alert('tidak ada barang dalam keranjang!');
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
        </script>
    </div>
</body>
</html>