<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Pinjam Barang</title>

    <!-- TAILWIND -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- FONT AWESOME -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- FONT -->
    <style>

        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');

        body {

            font-family: 'Plus Jakarta Sans', sans-serif;

            background:
            radial-gradient(circle at top left, #edf5f2 0%, #f8fafc 45%, #f1f5f9 100%);

        }

    </style>

</head>

<body class="min-h-screen p-8 text-slate-700">

<!-- HEADER -->
<div class="flex justify-between items-center mb-20">

        <div>

            <!-- BADGE -->
            <div class="inline-flex items-center gap-2
            card-modern border border-slate-200
            px-4 py-2 rounded-xl shadow-sm mb-5">

                <div class="w-2 h-2 rounded-xl bg-[#2f5d50]"></div>

                <span class="text-[11px] font-bold tracking-widest uppercase text-slate-500">

                    Inventaris Sekolah

                </span>

            </div>

            <!-- TITLE -->
            <h1 class="text-2xl font-semibold text-slate-800">
                Pinjam Barang
            </h1>

            <p class="text-sm text-slate-400 mt-1">
                Pilih barang inventaris yang ingin dipinjam.
            </p>

        </div>

<div class="flex items-center gap-3">

    <!-- SEARCH -->
    <div class="relative">

        <i class="fas fa-search
        absolute left-3 top-1/2
        -translate-y-1/2
        text-slate-400 text-sm"></i>

        <input
        type="text"
        id="searchBarang"
        placeholder="Cari barang..."
        class="pl-10 pr-4 py-2
        w-64
        rounded-xl
        border border-slate-200
        bg-white
        text-sm">

    </div>

    <!-- BUTTON -->
    <a href="/dashboard-peminjam"
    class="bg-[#2f5d50]
    hover:bg-[#3f7465]
    text-white
    px-4 py-2
    rounded-xl
    text-sm
    font-semibold
    flex items-center gap-2">

        <i class="fas fa-arrow-left text-xs"></i>

        Kembali

    </a>

</div>
    </div>
        <div class="bg-white rounded-2xl border border-slate-300 overflow-hidden shadow-sm">

            <div class="overflow-x-auto">

                <table class="min-w-full divide-y divide-slate-200">

                    <thead class="bg-[#2f5d50] text-white">

                    <tr class="text-[11px] uppercase font-bold tracking-wide">

                <th class="px-4 py-3 border border-[#3f7465] text-center text-xs w-[3%]">
                    No
                </th>

                <th class="px-4 py-3 border border-[#3f7465] text-center text-xs w-[7%]">
                    Foto
                </th>

                <th class="px-4 py-3 border border-[#3f7465] text-center text-xs w-[20%]">
                    Nama Barang
                </th>

                <th class="px-4 py-3 border border-[#3f7465] text-center text-xs w-[20%]">
                    Kategori
                </th>

                <th class="px-4 py-3 border border-[#3f7465] text-center text-xs w-[15%]">
                    Lokasi
                </th>

                <th class="px-4 py-3 border border-[#3f7465] text-center text-xs w-[10%]">
                    Jumlah
                </th>

                <th class="px-4 py-3 border border-[#3f7465] text-center text-xs w-[20%]">
                    Action
                </th>

            </tr>

        </thead>

<tbody class="divide-y divide-slate-100 bg-white">

            @foreach($barangs as $index => $barang)

            <tr class="barang-row border-b border-slate-200 hover:bg-slate-50">

                <!-- NO -->
                <td class="px-4 py-3 text-center text-xs text-slate-600 border border-slate-200">
                    {{ $index + 1 }}
                </td>

                <!-- FOTO -->
                <td class="px-4 py-3 border border-slate-200">

                    <img
                    src="{{ asset('foto-barang/'.$barang->foto) }}"
                    class="w-10 h-10 rounded-xl object-cover border border-slate-200">

                </td>

                <!-- NAMA -->
                <td class="px-4 py-3 border border-slate-200">

                    <h2 class="font-medium text-slate-700 text-xs">
                        {{ $barang->nama_barang }}
                    </h2>

                    <p class="text-xs text-slate-400">
                        {{ $barang->kode_barang }}
                    </p>

                </td>

                <!-- KATEGORI -->
                <td class="px-4 py-3 border border-slate-200">

                    <span class="px-2 py-1 rounded-full bg-[#edf5f2] text-[#2f5d50] text-xs font-medium">

                        {{ $barang->kategori }}

                    </span>

                </td>

                <!-- LOKASI -->
                <td class="px-4 py-3 text-xs text-slate-600 border border-slate-200">

                    {{ $barang->lokasi }}

                </td>

                <!-- STOK -->
                <td class="px-4 py-3 border border-slate-200">

                    <span class="text-xs font-medium text-slate-700">

                        {{ $barang->stok }}
                        {{ $barang->satuan }}

                    </span>

                </td>

                <!-- ACTION -->
                <td class="px-4 py-3 border border-slate-200">

                    <div class="flex justify-center gap-2">

                        <!-- DETAIL -->
                        <button
                        onclick="openDetailModal(
                        '{{ $barang->nama_barang }}',
                        '{{ $barang->kode_barang }}',
                        '{{ $barang->kategori }}',
                        '{{ $barang->stok }} {{ $barang->satuan }}',
                        '{{ $barang->kondisi }}',
                        '{{ $barang->lokasi }}',
                        '{{ $barang->keterangan }}',
                        '{{ asset('foto-barang/'.$barang->foto) }}'
                        )"
                        class="w-8 h-8
                        rounded-xl
                        bg-orange-50
                        text-orange-500
                        hover:bg-orange-100">

                            <i class="fas fa-eye text-xs"></i>

                        </button>

                        <!-- QR -->
                        <button
                        onclick="showQR(
                        '{{ $barang->kode_barang }}',
                        '{{ $barang->nama_barang }}'
                        )"
                        class="w-8 h-8
                        rounded-xl
                        bg-green-50
                        text-[#2f5d50]
                        hover:bg-green-100">

                            <i class="fas fa-qrcode"></i>

                        </button>

                        <!-- PINJAM -->
                        <button
                        onclick="openPinjamModal(
                        '{{ $barang->id }}',
                        '{{ $barang->nama_barang }}'
                        )"
                        class="px-3 h-8
                        flex items-center
                        rounded-xl
                        bg-[#2f5d50]
                        text-white
                        text-xs font-semibold
                        hover:bg-[#3f7465]">

                            Pinjam

                        </button>

                    </div>

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

    <div id="detailModal"

        class="hidden fixed inset-0

        bg-black/40

        backdrop-blur-sm

        z-50

        items-center justify-center">


    <div class="bg-white w-full max-w-sm rounded-2xl

        shadow-2xl overflow-hidden relative

        max-h-[85vh] overflow-y-auto">


    <div class="p-6">

        <div class="flex

        justify-between

        items-center

        mb-4">

    <h3 class="text-lg font-semibold text-slate-800">

        Detail Barang

    </h3>

<button

    onclick="closeDetailModal()"

        class="absolute top-5 right-5 text-slate-400 hover:text-red-500 transition-all duration-300">

        <i class="fas fa-times text-sm text-slate-500 mt-1"></i>

</button>



        </div>



        <div class="grid grid-cols-2 gap-y-4 gap-x-6 text-sm text-slate-700">



        <div class="font-medium text-slate-600">

        Nama Barang

        </div>



        <div id="detail_nama">

        -

        </div>



        <div class="font-medium text-slate-600">

            Kode Barang

        </div>



        <div id="detail_kode">

        -

        </div>



        <div class="font-medium text-slate-600">

        Kategori

        </div>



        <div id="detail_kategori">

        -

        </div>



        <div class="font-medium text-slate-600">

        Lokasi

        </div>



        <div id="detail_lokasi">

        -

        </div>



        <div class="font-medium text-slate-600">

        Kondisi

        </div>



        <div id="detail_kondisi">

        -

        </div>



        <div class="font-medium text-slate-600">

        Stok

        </div>



        <div id="detail_stok">

        -

            </div>



        <div class="font-medium text-slate-600">

        Keterangan

        </div>



                <div id="detail_keterangan">

                -

                </div>



            <div class="col-span-2 text-center mt-4">



                <h4 class="font-semibold mb-2">



                    Foto Barang



                </h4>



            <img

            id="detail_gambar"

            src=""

            class="mx-auto w-40 h-40 object-contain rounded-xl border border-slate-200">



            </div>

        </div>



        <div class="mt-5 text-right">



        <button

        onclick="closeDetailModal()"

        class="w-full py-2.5 bg-[#2f5d50] text-white rounded-xl font-medium text-sm hover:bg-[#23463c] transition-all">



        Tutup



        </button>



        </div>



        </div>



        </div>



        </div>

<script>

function openDetailModal(
nama,
kode,
kategori,
stok,
kondisi,
lokasi,
keterangan,
foto
){

    document.getElementById('detail_nama').innerText = nama;
    document.getElementById('detail_kode').innerText = kode;
    document.getElementById('detail_kategori').innerText = kategori;
    document.getElementById('detail_stok').innerText = stok;
    document.getElementById('detail_kondisi').innerText = kondisi;
    document.getElementById('detail_lokasi').innerText = lokasi;
    document.getElementById('detail_keterangan').innerText = keterangan;
    document.getElementById('detail_gambar').src = foto;

    document.getElementById('detailModal')
        .classList.remove('hidden');

    document.getElementById('detailModal')
        .classList.add('flex');
}

function closeDetailModal(){

    document.getElementById('detailModal')
    .classList.add('hidden');

    document.getElementById('detailModal')
    .classList.remove('flex');
}

function showQR(kode, nama)
{
    document.getElementById('qrNama').innerHTML =
    nama;

    document.getElementById('qrcode').innerHTML = '';

    new QRCode(
        document.getElementById('qrcode'),
        {
            text: kode,
            width: 200,
            height: 200
        }
    );

    document.getElementById('qrModal')
        .classList.remove('hidden');

    document.getElementById('qrModal')
        .classList.add('flex');
}

function closeQR()
{
    document.getElementById('qrModal')
        .classList.remove('flex');

    document.getElementById('qrModal')
        .classList.add('hidden');
}

function closeQrModal(){

    document.getElementById('qrModal')
    .classList.add('hidden');

    document.getElementById('qrModal')
    .classList.remove('flex');
}
const searchInput =
document.getElementById('searchBarang');

searchInput.addEventListener('keyup', function(){

    let keyword =
    this.value.toLowerCase();

    let rows =
    document.querySelectorAll('.barang-row');

    rows.forEach(row => {

        let text =
        row.innerText.toLowerCase();

        if(text.includes(keyword)){

            row.style.display = '';

        }else{

            row.style.display = 'none';

        }

    });

});

function openPinjamModal(
id,
nama
){

    document
    .getElementById('barang_id')
    .value = id;

    document
    .getElementById('nama_barang')
    .value = nama;

    document
    .getElementById('pinjamModal')
    .classList.remove('hidden');

    document
    .getElementById('pinjamModal')
    .classList.add('flex');
}

function closePinjamModal(){

    document
    .getElementById('pinjamModal')
    .classList.add('hidden');

    document
    .getElementById('pinjamModal')
    .classList.remove('flex');
}
</script>
<div id="qrModal"
class="fixed inset-0
bg-slate-900/50
backdrop-blur-sm
hidden items-center justify-center z-50">

    <div class="bg-white rounded-3xl p-8 w-[350px] relative">

        <button
        onclick="closeQR()"
        class="absolute right-4 top-4 text-slate-500">

            <i class="fas fa-times"></i>

        </button>

        <h3 class="text-lg font-semibold text-center mb-4">
            QR Barang
        </h3>

        <div class="flex justify-center">

            <div id="qrcode"></div>

        </div>

        <p
        id="qrNama"
        class="text-center mt-4 font-medium">
        </p>

    </div>

</div>

<div id="pinjamModal"
class="hidden fixed inset-0 bg-black/40 backdrop-blur-sm z-50 items-center justify-center">

<div class="bg-white w-full max-w-sm rounded-2xl
shadow-2xl overflow-hidden relative
max-h-[85vh] overflow-y-auto">

<button
onclick="closePinjamModal()"
class="absolute top-5 right-5 text-slate-400 hover:text-red-500 transition-all duration-300">

    <i class="fas fa-times text-sm text-slate-500 mt-1"></i>

</button>

<div class="p-6">

<form
action="/simpan-peminjaman"
method="POST"
class="space-y-4">
@csrf

<input type="hidden" name="jenis" value="barang">

<input type="hidden" name="barang_id" id="barang_id">

<h3 class="text-lg font-semibold text-slate-800">
    Form Peminjaman
</h3>

<p class="text-xs text-slate-400 mb-6">
    Ajukan peminjaman barang
</p>

<label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
    Nama Barang
</label>

<input
type="text"
id="nama_barang"
readonly
class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

<label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
    Tanggal Dipinjam
</label>

<input
type="date"
name="tanggal_pinjam"
required
value="{{ date('Y-m-d') }}"
class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

<label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
    Kondisi Saat Dipinjam
</label>

<select
name="kondisi_pinjam"
required
class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

    <option value="">--- Pilih Kondisi ---</option>

    <option value="Baik">
        Baik
    </option>

    <option value="Rusak Ringan">
        Rusak Ringan
    </option>

    <option value="Rusak Berat">
        Rusak Berat
    </option>

</select>

<label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
    Jumlah Dipinjam
</label>

<input
type="number"
name="jumlah"
min="1"
required
class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

<label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
    Keterangan
</label>

<textarea
name="keterangan"
rows="3"
class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all"></textarea>

<div class="flex gap-3 pt-2">

<button
type="submit"
class="flex-1 py-2.5 bg-[#2f5d50] text-white rounded-xl font-medium text-sm hover:bg-[#23463c] transition-all">

Ajukan

</button>

<button
type="button"
onclick="closePinjamModal()"
class="flex-1 bg-slate-200 hover:bg-slate-300 py-2 rounded-xl font-medium text-sm">

Batal

</button>

</div>

</form>

</div>

</div>

    </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

    </body>

</html>