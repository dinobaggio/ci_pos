<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Proses Transaksi</title>
</head>
<body>
    <div id='isi'>

    </div>

    <script>
    let isi = document.getElementById('isi');
        if (localStorage.keranjang == null ) {
            isi.innerHTML = "Tidak ada barang yang dipilih";
        } else {
            let keranjang = JSON.parse(localStorage.keranjang);
            let filter_keranjang = [];
            for (let i=0;i<keranjang.length;i++) {
                if (keranjang[i] != null) {
                    filter_keranjang.push(keranjang[i]);
                }
            }
            if (filter_keranjang[0] == null) {
                isi.innerHTML = "Tidak ada barang yang dipilih";
                localStorage.keranjang = '[]';
            } else {
                keranjang = JSON.stringify(filter_keranjang);
                isi.innerHTML = keranjang;
            }
            
        }
    </script>
</body>
</html>