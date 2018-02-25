<div id='isi_keranjang'>

    <table id='table'>
        <tr>
        <th>Nama Barang</th>
        <th>Jumlah Barang</th>
        <th><button onclick='clear_barang()'>Clear</button></th>
        </tr>
                 
    </table>

</div>

<script>
let table = document.getElementById('table');
let isi_keranjang = document.getElementById("isi_keranjang");
if (localStorage.keranjang != null) {
    let data = validasi_keranjang();
    if (data) {
        for (let i=0;i<data.length;i++) {
            let tr = document.createElement("tr");
            let td_nama = document.createElement("td");
            let td_jumlah = document.createElement("td");

            let text_nama = document.createTextNode(data[i].nama_barang);
            let text_jumlah = document.createTextNode(data[i].jumlah);
            td_nama.appendChild(text_nama);
            td_jumlah.appendChild(text_jumlah);

            tr.appendChild(td_nama);
            tr.appendChild(td_jumlah);

            table.appendChild(tr);


        }
    } else {
        isi_keranjang.innerHTML = "<h1>Tidak ada barang</h1>";
    }
} else {
    isi_keranjang.innerHTML = "<h1>Tidak ada barang</h1>";

}


function validasi_keranjang() {
    let keranjang = JSON.parse(localStorage.keranjang);
    let filter_keranjang = [];
    for(let i=0;i<keranjang.length;i++){
        if(keranjang[i] != null) {
            filter_keranjang.push(keranjang[i]);
        }
    }
    if(filter_keranjang[0] == null) {
        localStorage.clear();
        return false;
    } else {
        return filter_keranjang;
    }
}

</script>