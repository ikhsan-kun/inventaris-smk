@extends('layouts.app')

@section('content')

<div class="p-8">

    <!-- HEADER -->
    <header class="flex justify-between items-center mb-6">

        <div>

            <h2 class="text-2xl font-semibold text-slate-800">
                Data Master Barang
            </h2>

            <p class="text-sm text-slate-400 mt-2">
                Kelola stok dan informasi barang inventaris SMK Al-Irsyad
            </p>

        </div>

    </header>

    <!-- TOP ACTION -->
    <div class="flex justify-end mb-5">

        <form
            method="GET"
            action="{{ route('barang.index') }}"
            id="searchForm"
            class="relative">

            <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>

            <input
                type="text"
                name="search"
                id="searchInput"
                value="{{ request('search') }}"
                placeholder="Cari barang..."
                class="pl-10 pr-4 py-2 rounded-xl border border-slate-200 bg-white text-sm outline-none focus:ring-2 focus:ring-[#2f5d50]/20 focus:border-[#2f5d50] w-56 transition-all duration-300"
            >

        </form>

    </div>

    <!-- TABLE -->
    <div class="bg-white rounded-2xl overflow-hidden border border-slate-300 shadow-sm">

        <table class="min-w-full divide-y divide-slate-200">

            <!-- HEAD -->
            <thead class="bg-[#2f5d50] text-white border border-[#3f7465]">

                <tr class="text-[11px] uppercase font-semibold tracking-widest">

                    <th class="px-4 py-3 border border-[#3f7465] text-center text-xs w-[3%]">
                        No
                    </th>

                    <th class="px-4 py-3 border border-[#3f7465] text-center text-xs w-[7%]">
                        Foto
                    </th>

                    <th class="px-4 py-3 border border-[#3f7465] text-left text-xs w-[20%]">
                        Nama Barang
                    </th>

                    <th class="px-4 py-3 text-left border border-[#3f7465]">
                        Kategori
                    </th>

                    <th class="px-4 py-3 text-left border border-[#3f7465]">
                        Lokasi
                    </th>

                    <th class="px-4 py-3 text-center border border-[#3f7465]">
                        Jumlah
                    </th>

                    <th class="px-4 py-3 text-center border border-[#3f7465]">
                        Action
                    </th>

                </tr>

            </thead>

            <!-- BODY -->
            <tbody id="tableBody">

                @forelse($barangs as $item)

                @php
                    $no = ($loop->index + 1);
                @endphp

                <tr class="hover:bg-slate-50 transition-all duration-300">

                    <!-- NO -->
                    <td class="px-4 py-3 text-center text-xs text-slate-600 border border-slate-200">

                        {{ $no }}

                    </td>

                    <!-- FOTO -->
                    <td class="px-4 py-3 border border-slate-200">

                        <img
                            src="{{ asset('foto-barang/' . $item->foto) }}"
                            class="w-10 h-10 object-cover rounded-xl border border-slate-200"
                        >

                    </td>

                    <!-- BARANG -->
                    <td class="px-4 py-3 border border-slate-200">

                        <h2 class="font-medium text-slate-700 text-xs">
                            {{ $item->nama_barang }}
                        </h2>

                        <p class="text-xs text-slate-500 mt-1">
                            {{ $item->kode_barang }}
                        </p>

                    </td>

                    <!-- KATEGORI -->
                    <td class="px-4 py-3 border border-slate-200">

                        <span class="px-2 py-1 rounded-full bg-[#edf5f2] text-[#2f5d50] text-xs font-medium">

                            {{ $item->kategori }}

                        </span>

                    </td>

                    <!-- LOKASI -->
                    <td class="px-4 py-3 text-xs text-slate-600 border border-slate-200">

                        {{ $item->lokasi }}

                    </td>

                    <!-- JUMLAH -->
                    <td class="px-4 py-3 border border-slate-200">

                        <span class="text-xs font-medium text-slate-700">

                            {{ $item->stok }} Unit

                        </span>

                    </td>

                    <!-- AKSI -->
                    <td class="px-4 py-3 border border-slate-200">

                        <div class="flex justify-center gap-2">

                            <!-- DETAIL -->
                            <button
                                onclick="openDetail(
                                    '{{ asset('foto-barang/' . $item->foto) }}',
                                    '{{ $item->nama_barang }}',
                                    '{{ $item->kode_barang }}',
                                    '{{ $item->kategori }}',
                                    '{{ $item->lokasi }}',
                                    '{{ $item->stok }}',
                                    '{{ $item->kondisi }}',
                                    '{{ $item->keterangan }}'
                                )"
                                class="w-8 h-8 rounded-xl bg-orange-50 text-orange-500 hover:bg-orange-500 hover:text-white transition-all duration-300 flex items-center justify-center">

                                <i class="fas fa-eye text-sm"></i>

                            </button>

                            <!-- QR -->
                            <button
                            onclick="openQRModal(
                                '{{ url('/detail-barang-qr/'.$item->id) }}',
                                '{{ $item->nama_barang }}',
                                '{{ $item->kode_barang }}'
                            )"
                            class="w-8 h-8 rounded-xl bg-[#edf5f2] text-[#2f5d50] hover:bg-[#2f5d50] hover:text-white transition-all duration-300 flex items-center justify-center">

                                <i class="fas fa-qrcode text-sm"></i>

                            </button>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="7"
                        class="text-center py-14 text-slate-300 text-sm italic">

                        Belum ada data barang.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

<!-- MODAL DETAIL -->
<div id="detailModal"
     class="fixed inset-0 bg-black/30 backdrop-blur-sm hidden items-center justify-center z-50 p-6">

    <div class="bg-white w-full max-w-3xl rounded-3xl shadow-2xl overflow-hidden relative">

        <!-- CLOSE -->
        <button onclick="closeDetail()"
                class="absolute top-5 right-6 text-slate-400 hover:text-red-500 transition-all duration-300 z-10">

            <i class="fas fa-times text-lg"></i>

        </button>

        <div class="flex items-center h-[500px]">

            <!-- FOTO -->
            <div class="w-[40%] h-full bg-slate-50 flex items-center justify-center p-8">

                <img id="detailFoto"
                    src=""
                    class="max-h-[280px] object-contain rounded-2xl drop-shadow-sm">

            </div>

            <!-- DETAIL -->
            <div class="flex-1 h-full p-8 overflow-y-auto">

                <h1 class="text-3xl font-medium text-slate-800 tracking-tight mb-8">
                    Detail Barang
                </h1>

                <div class="space-y-6">

                    <!-- NAMA -->
                    <div>

                        <p class="text-xs uppercase tracking-[0.15em] text-slate-300 mb-2 font-semibold">
                            Nama Barang
                        </p>

                        <h2 id="detailNama"
                        class="text-base font-medium text-slate-700 leading-tight">
                        </h2>

                    </div>

                    <!-- KODE -->
                    <div>

                        <p class="text-xs uppercase tracking-[0.15em] text-slate-300 mb-2 font-semibold">
                            Kode Barang
                        </p>

                        <h2 id="detailKode"
                        class="text-sm font-medium text-slate-700">
                        </h2>

                    </div>

                    <!-- KATEGORI -->
                    <div>

                        <p class="text-xs uppercase tracking-[0.15em] text-slate-300 mb-3 font-semibold">
                            Kategori
                        </p>

                        <span id="detailKategori"
                            class="inline-block px-4 py-2 bg-[#edf5f2] text-[#2f5d50] rounded-full text-xs font-medium">
                        </span>

                    </div>

                    <!-- LOKASI -->
                    <div>

                        <p class="text-xs uppercase tracking-[0.15em] text-slate-300 mb-2 font-semibold">
                            Lokasi Penyimpanan
                        </p>

                        <h2 id="detailLokasi"
                        class="text-sm font-medium text-slate-700">
                        </h2>

                    </div>

                    <div class="grid grid-cols-2 gap-6">

                        <!-- STOK -->
                        <div>

                            <p class="text-xs uppercase tracking-[0.15em] text-slate-300 mb-2 font-semibold">
                                Stok
                            </p>

                            <h2 id="detailStok"
                            class="text-base font-medium text-slate-700">
                            </h2>

                        </div>

                        <!-- KONDISI -->
                        <div>

                            <p class="text-xs uppercase tracking-[0.15em] text-slate-300 mb-2 font-semibold">
                                Kondisi
                            </p>

                            <h2 id="detailKondisi"
                            class="text-base font-medium text-slate-700">
                            </h2>

                        </div>

                    </div>

                    <!-- KETERANGAN -->
                    <div>

                        <p class="text-xs uppercase tracking-[0.15em] text-slate-300 mb-2 font-semibold">
                            Keterangan
                        </p>

                        <div class="bg-slate-50 rounded-2xl p-5">

                            <p id="detailKeterangan"
                            class="text-slate-600 leading-relaxed text-sm">
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

<script>

let qrUrlBarang = '';
let qrKodeBarang = '';
let qrNamaBarang = '';

function openDetail(foto, nama, kode, kategori, lokasi, stok, kondisi, keterangan)
{
    document.getElementById('detailFoto').src = foto;
    document.getElementById('detailNama').innerText = nama;
    document.getElementById('detailKode').innerText = kode;
    document.getElementById('detailKategori').innerText = kategori;
    document.getElementById('detailLokasi').innerText = lokasi;
    document.getElementById('detailStok').innerText = stok + ' Unit';
    document.getElementById('detailKondisi').innerText = kondisi;
    document.getElementById('detailKeterangan').innerText = keterangan;

    document.getElementById('detailModal').classList.remove('hidden');
    document.getElementById('detailModal').classList.add('flex');
}

function closeDetail()
{
    document.getElementById('detailModal').classList.remove('flex');
    document.getElementById('detailModal').classList.add('hidden');
}

function toggleAnggotaMenu() {

    const menu = document.getElementById('anggotaMenu');

    menu.classList.toggle('hidden');

}

function openQRModal(url,nama,kode)
{
qrUrlBarang = url;
qrKodeBarang = kode;
qrNamaBarang = nama;

    document
    .getElementById('qrModal')
    .classList.remove('hidden');

    document
    .getElementById('qrModal')
    .classList.add('flex');

    document
    .getElementById('qrBarangNama')
    .innerText = nama;

    document
    .getElementById('qrcodeBarang')
    .innerHTML = '';

    new QRCode(
        document.getElementById('qrcodeBarang'),
        {
            text:url,
            width:200,
            height:200
        }
    );
}

function closeQRModal()
{
    document
    .getElementById('qrModal')
    .classList.remove('flex');

    document
    .getElementById('qrModal')
    .classList.add('hidden');
}
function printQRBarang()
{
    let qr =
        document.getElementById('qrcodeBarang').innerHTML;

    let win =
        window.open('', '', 'width=900,height=700');

    win.document.write(`
    <html>

    <head>

        <title>QR Code Barang</title>

        <style>

            body{
                font-family:Arial,sans-serif;
                display:flex;
                justify-content:center;
                align-items:center;
                height:100vh;
                margin:0;
            }

            .card{
                width:420px;
                border:2px solid #000;
                border-radius:12px;
                padding:15px;
                display:flex;
                gap:15px;
                align-items:center;
            }

            .left{
                width:110px;
                flex-shrink:0;
                text-align:center;
            }

            .left img{
                width:90px !important;
                height:90px !important;
            }

            .right{
                flex:1;
            }

            .title{
                font-size:13px;
                font-weight:700;
                text-align:center;
                border-bottom:1px solid #ccc;
                padding-bottom:6px;
                margin-bottom:8px;
            }

            .info{
                font-size:11px;
                line-height:1.5;
            }

        </style>

    </head>

    <body>

        <div class="card">

            <div class="left">

                ${qr}

            </div>

            <div class="right">

                <div class="title">
                    Barang Milik SMK Al-Irsyad Kota Tegal
                </div>

                <div class="info">

                    <p>
                        <b>Nama Barang :</b>
                        ${qrNamaBarang}
                    </p>

                    <p>
                        <b>Kode Barang :</b>
                        ${qrKodeBarang}
                    </p>

                    <p>
                        <b>Tanggal Cetak :</b>
                        ${new Date().toLocaleDateString('id-ID')}
                    </p>

                </div>

            </div>

        </div>

    </body>

    </html>
    `);

    win.document.close();

    setTimeout(() => {
        win.print();
    }, 500);
}

document.getElementById('searchInput').addEventListener('keyup', function () {

    let keyword = this.value.toLowerCase();

    let rows = document.querySelectorAll('#tableBody tr');

    rows.forEach(function(row) {

        let text = row.innerText.toLowerCase();

        if(text.includes(keyword)) {

            row.style.display = '';

        } else {

            row.style.display = 'none';

        }

    });

});

</script>

<div id="qrModal"
class="hidden fixed inset-0 bg-black/20 backdrop-blur-[2px]
items-center justify-center p-4 z-50">

    <div class="bg-white w-full max-w-sm rounded-2xl p-6 shadow-xl relative">

        <button
        onclick="closeQRModal()"
        class="absolute top-4 right-4 text-slate-400 hover:text-red-500">

            <i class="fas fa-times"></i>

        </button>

        <h2 class="text-lg font-semibold text-slate-800 mb-2">
            QR Code Barang
        </h2>

        <p
        id="qrBarangNama"
        class="text-xs text-slate-400 mb-4">
        </p>

        <div
        id="qrcodeBarang"
        class="flex justify-center">
        </div>

        <button
        onclick="printQRBarang()"
        class="w-full mt-5 py-2.5 bg-[#2f5d50]
        text-white rounded-xl font-medium text-sm
        hover:bg-[#23463c] transition-all">

            Cetak QR

        </button>

    </div>

</div>
@endsection