<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        {{ $ruangan->nama_ruangan }}
    </title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body class="bg-slate-100">

<div class="max-w-7xl mx-auto p-8">

    <!-- HEADER -->

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 mb-6">

        <h1 class="text-2xl font-semibold text-slate-800">
            {{ $ruangan->nama_ruangan }}
        </h1>

        <p class="text-sm text-slate-500 mt-1">
            Informasi inventaris ruangan
        </p>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-6">

            <div>

                <p class="text-[11px] uppercase font-semibold text-slate-400">
                    Kode Ruangan
                </p>

                <p class="text-sm text-slate-700">
                    {{ $ruangan->kode_ruangan }}
                </p>

            </div>

            <div>

                <p class="text-[11px] uppercase font-semibold text-slate-400">
                    Penanggung Jawab
                </p>

                <p class="text-sm text-slate-700">
                    {{ $ruangan->penanggung_jawab }}
                </p>

            </div>

            <div>

                <p class="text-[11px] uppercase font-semibold text-slate-400">
                    Lokasi
                </p>

                <p class="text-sm text-slate-700">
                    {{ $ruangan->lokasi }}
                </p>

            </div>

            <div>

                <p class="text-[11px] uppercase font-semibold text-slate-400">
                    Kapasitas
                </p>

                <p class="text-sm text-slate-700">
                    {{ $ruangan->kapasitas }}
                </p>

            </div>

        </div>

    </div>

    <!-- BARANG -->

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden mb-6">

        <div class="bg-[#2f5d50] px-6 py-4">

            <h2 class="text-white text-sm font-medium">
                Barang di Ruangan
            </h2>

        </div>

        <div class="overflow-x-auto">

            <table class="min-w-full divide-y divide-slate-200">

                <thead>

                <tr class="bg-slate-50 text-[11px] uppercase tracking-wide text-slate-500">

                    <th class="px-4 py-3 border border-slate-200 text-center w-[5%]">
                        No
                    </th>

                    <th class="px-4 py-3 border border-slate-200 text-left w-[35px]">
                        Nama Barang
                    </th>

                    <th class="px-4 py-3 border border-slate-200 text-center w-[10%]">
                        Stok
                    </th>

                    <th class="px-4 py-3 border border-slate-200 text-center w-[20%]">
                        Kondisi
                    </th>

                    <th class="px-4 py-3 border border-slate-200 text-center w-[25%]">
                        Aksi
                    </th>

                </tr>

                </thead>

                <tbody class="divide-y divide-slate-100 bg-white">

                @forelse($barangs as $index => $barang)

                    <tr class="border-t border-slate-200">

                        <td class="px-4 py-3 border border-slate-200 text-center text-sm text-slate-500">
                            {{ $index + 1 }}
                        </td>

                        <td class="px-4 py-3 border border-slate-200 text-sm text-slate-700">
                            {{ $barang->nama_barang }}
                        </td>

                        <td class="px-4 py-3 border border-slate-200 text-center">
                            {{ $barang->stok }}
                        </td>

                        <td class="px-4 py-3 border border-slate-200 text-center">
                            {{ $barang->kondisi }}
                        </td>

                        <td class="px-4 py-3 border border-slate-200">

                            <div class="flex items-center justify-center gap-2">

                                <button
                                onclick="openDetailBarang(
                                '{{ $barang->nama_barang }}',
                                '{{ $barang->kode_barang }}',
                                '{{ $barang->kategori }}',
                                '{{ $barang->lokasi }}',
                                '{{ $barang->kondisi }}',
                                '{{ $barang->stok }}',
                                '{{ $barang->keterangan }}',
                                '{{ $barang->foto }}'
                                )"
                                class="px-3 py-1 rounded-lg bg-orange-100 text-orange-600 text-xs font-medium hover:bg-orange-500 hover:text-white transition">

                                    Detail

                                </button>

                                <a
                                href="/login-user"
                                class="px-3 py-1 rounded-lg bg-[#2f5d50] text-white text-xs font-medium hover:bg-[#3b7462] transition">

                                    Pinjam

                                </a>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5"
                        class="text-center py-10 text-slate-400 text-sm">

                            Tidak ada barang

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <!-- ASET -->

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">

        <div class="bg-[#2f5d50] px-6 py-4">

            <h2 class="text-white text-sm font-medium">
                Aset di Ruangan
            </h2>

        </div>

        <div class="overflow-x-auto">

            <table class="min-w-full divide-y divide-slate-200">

            <thead>

            <tr class="bg-slate-50 text-[11px] uppercase tracking-wide text-slate-500">

                <th class="px-4 py-3 border border-slate-200 text-center text-xs w-[3%]">
                    No
                </th>

                <th class="px-4 py-3 border border-slate-200 text-left text-xs w-[25%]">
                    Nama Aset
                </th>

                <th class="px-4 py-3 border border-slate-200 text-center text-xs w-[25%]">
                    Kode
                </th>

                <th class="px-4 py-3 border border-slate-200 text-center text-xs w-[25%]">
                    Kondisi
                </th>

            </tr>

            </thead>

                <tbody class="divide-y divide-slate-100 bg-white">

                @forelse($asets as $index => $aset)

                    <tr>

                        <td class="px-4 py-3 border border-slate-200 text-center text-sm text-slate-500">
                            {{ $index + 1 }}
                        </td>

                        <td class="px-4 py-3 border border-slate-200 text-sm text-slate-700">
                            {{ $aset->nama_aset }}
                        </td>

                        <td class="px-4 py-3 border border-slate-200 text-center text-sm text-slate-500">
                            {{ $aset->kode_aset }}
                        </td>

                        <td class="px-4 py-3 border border-slate-200 text-center text-sm text-slate-500">
                            {{ $aset->kondisi }}
                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="4"
                        class="text-center py-10 text-slate-400 text-sm">

                            Tidak ada aset

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

<div id="detailBarangModal"
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
onclick="closeDetailBarang()"
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
onclick="closeDetailBarang()"
class="w-full py-2.5 bg-[#2f5d50] text-white rounded-xl font-medium text-sm hover:bg-[#23463c] transition-all">

Tutup

</button>

</div>

</div>

</div>

</div>

<script>

function openDetailBarang(
nama,
kode,
kategori,
lokasi,
kondisi,
stok,
keterangan,
foto
)
{
    console.log(foto);
    
    document.getElementById(
    'detail_nama'
    ).innerText = nama;

    document.getElementById(
    'detail_kode'
    ).innerText = kode;

    document.getElementById(
    'detail_kategori'
    ).innerText = kategori;

    document.getElementById(
    'detail_lokasi'
    ).innerText = lokasi;

    document.getElementById(
    'detail_kondisi'
    ).innerText = kondisi;

    document.getElementById(
    'detail_stok'
    ).innerText = stok;

    document.getElementById(
    'detail_keterangan'
    ).innerText = keterangan;

    document.getElementById(
    'detail_gambar'
    ).src = '/foto-barang/' + foto;

    document
    .getElementById(
    'detailBarangModal'
    )
    .classList
    .remove('hidden');

    document
    .getElementById(
    'detailBarangModal'
    )
    .classList
    .add('flex');

}

function closeDetailBarang(){

    document
    .getElementById(
    'detailBarangModal'
    )
    .classList
    .add('hidden');

    document
    .getElementById(
    'detailBarangModal'
    )
    .classList
    .remove('flex');

}
</script>
</body>
</html>