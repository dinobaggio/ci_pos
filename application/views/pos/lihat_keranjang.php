<div id='isi_keranjang'>

    <table id='table'>
        <tr>
        <th>Nama Barang</th>
        <th>Jumlah Barang</th>
        <th>Harga Barang</th>
        <th><button onclick='clear_barang()'>Clear</button></th>
        </tr> 
    </table>

    <div id='div_jumlah'></div>
    <div id='div_harga'></div>

</div>

<script>
let table = document.getElementById('table');
let isi_keranjang = document.getElementById("isi_keranjang");
let div_jumlah = document.getElementById('div_jumlah');
let div_harga = document.getElementById('div_harga');

if (localStorage.keranjang != null) {
    let data = filter_keranjang();
    let total_barang = 0;
    let total_harga = 0;
    
    if (data) {
        for (let i=0;i<data.length;i++) {
            let harga_barang = data[i].harga_barang;
            let jumlah_barang = data[i].jumlah;
            let tr = document.createElement("tr");
            let td_nama = document.createElement("td");
            let td_jumlah = document.createElement("td");
            let td_harga = document.createElement("td");

            let text_nama = document.createTextNode(data[i].nama_barang);
            let text_jumlah = document.createTextNode(jumlah_barang);
            let text_harga = document.createTextNode(harga_barang);

            td_nama.appendChild(text_nama);
            td_jumlah.appendChild(text_jumlah);
            td_harga.appendChild(text_harga);

            tr.appendChild(td_nama);
            tr.appendChild(td_jumlah);
            tr.appendChild(td_harga);

            table.appendChild(tr);

            harga_barang = Number(harga_barang) * Number(jumlah_barang);
            
            total_barang = Number(total_barang) + Number(jumlah_barang);
            total_harga = Number(total_harga)+Number(harga_barang);
        }
        
        div_jumlah.innerHTML = "Total Barang: "+total_barang;
        div_harga.innerHTML = "Total Harga: "+total_harga+" Rp";
    } else {
        isi_keranjang.innerHTML = "<h1>Tidak ada barang</h1>";
    }
} else {
    isi_keranjang.innerHTML = "<h1>Tidak ada barang</h1>";

}

function filter_keranjang() {
    let keranjang = JSON.parse(localStorage.keranjang);
    let filter = keranjang.filter(
        function (keranjang) {
            return keranjang != null;
        }
    );

    if(filter[0] == null) {
        localStorage.clear();
        return false;
    } else {
        return filter;
    }
}
</script>