<div id='isi_keranjang'>

    <table id='table'>
        <tr>
        <th>Nama Barang</th>
        <th>Jumlah Barang</th>
        <th>Harga Barang</th>
        <th>Jumlah Harga</th>
        <th><button onclick='clear_barang()'>Clear</button></th>
        </tr> 
    </table>
    <hr>
    <div id='div_jumlah'></div>
    <div id='div_harga'></div>
    <input type="hidden" id='inp_barang' />
    <input type="hidden" id='inp_harga' />

    <button id='proses_beli'>Proses Pembelian</button>

</div>

<script>
let table = document.getElementById('table');
let isi_keranjang = document.getElementById("isi_keranjang");
let div_jumlah = document.getElementById('div_jumlah');
let div_harga = document.getElementById('div_harga');
let inp_barang = document.getElementById('inp_barang');
let inp_harga = document.getElementById('inp_harga');
let tmbl_beli = document.getElementById('proses_beli');

if (localStorage.keranjang != null) {
    let data = filter_keranjang();
    let total_barang = 0;
    let total_harga = 0;
    
    if (data) {
        for (let i=0;i<data.length;i++) {
            let harga_barang = Number(data[i].harga_barang);
            let jumlah_barang = Number(data[i].jumlah_barang);
            let jumlah_harga = Number(data[i].jumlah_harga);

            let tr = document.createElement("tr");
            let td_nama = document.createElement("td");
            let td_jumlah = document.createElement("td");
            let td_harga = document.createElement("td");
            let td_total = document.createElement("td");

            let text_nama = document.createTextNode(data[i].nama_barang);
            let text_jumlah = document.createTextNode(jumlah_barang);
            let text_harga = document.createTextNode(harga_barang);
            let text_total = document.createTextNode(jumlah_harga);

            td_nama.appendChild(text_nama);
            td_jumlah.appendChild(text_jumlah);
            td_harga.appendChild(text_harga);
            td_total.appendChild(text_total);


            tr.appendChild(td_nama);
            tr.appendChild(td_jumlah);
            tr.appendChild(td_harga);
            tr.appendChild(td_total);

            table.appendChild(tr);
            
            total_barang = total_barang + jumlah_barang;
            total_harga = total_harga + jumlah_harga;
        }
        
        div_jumlah.innerHTML = "Total Barang: "+total_barang;
        div_harga.innerHTML = "Total Harga: Rp. "+total_harga;
        inp_barang.value = total_barang;
        inp_harga.value = total_harga;

    } else {
        isi_keranjang.innerHTML = "<h1>Tidak ada barang</h1>";
    }
} else {
    isi_keranjang.innerHTML = "<h1>Tidak ada barang</h1>";

}

tmbl_beli.onclick = function (){
    let inp_barang = document.getElementById('inp_barang');
    let inp_harga = document.getElementById('inp_harga');

    kirim_data({
        'total_barang':inp_barang.value,
        'total_harga':inp_harga.value
    });
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