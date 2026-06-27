@extends('layouts.app')

@section('content')

<div class="p-8">

    <!-- HEADER -->
    <header class="flex justify-between items-center mb-6">

        <div>

            <h2 class="text-2xl font-semibold text-slate-800">
                Data Master Aset
            </h2>

            <p class="text-sm text-slate-400 mt-2">
                Monitoring barang berharga inventaris sekolah
            </p>

        </div>

            <!-- BUTTON -->
            <button onclick="openModal()"
                    class="bg-[#2f5d50] hover:bg-[#3b6e60]
                    text-white px-4 py-2 rounded-xl
                    font-medium text-sm
                    flex items-center gap-2
                    transition-all duration-300
                    shadow-sm shadow-slate-200/50">

                <i class="fas fa-plus"></i>

                Tambah Aset

            </button>

    </header>

    <!-- SEARCH -->
    <div class="flex justify-end mb-5">

        <form
            method="GET"
            action="{{ route('aset.index') }}"
            id="searchForm"
            class="relative">

            <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>

            <input
                type="text"
                name="search"
                id="searchInput"
                value="{{ request('search') }}"
                placeholder="Cari aset..."
                class="cursor-text pl-10 pr-4 py-2 rounded-xl
                border border-slate-200 bg-white
                text-sm outline-none
                focus:ring-2 focus:ring-[#2f5d50]/20
                focus:border-[#2f5d50]
                w-56 transition-all duration-300">

        </form>

    </div>

    <!-- TABLE -->
    <div class="bg-white rounded-2xl overflow-hidden border border-slate-300 shadow-sm">

        <table class="min-w-full divide-y divide-slate-200">

            <!-- HEAD -->
            <thead class="bg-[#2f5d50] text-white">

                <tr class="text-[11px] uppercase font-semibold tracking-widest">

                    <th class="px-4 py-3 border border-[#3f7465] text-center text-xs w-[3%]">
                        No
                    </th>

                    <th class="px-4 py-3 border border-[#3f7465] text-center text-xs w-[7%]">
                        Foto
                    </th>

                    <th class="px-4 py-3 border border-[#3f7465] text-left text-xs w-[20%]">
                        Nama Aset
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

                @forelse($asets as $item)

                @php
                    $no = $loop->iteration;
                @endphp

                <tr class="border border-slate-200 hover:bg-slate-50 transition-all duration-300">

                    <!-- NO -->
                    <td class="px-4 py-3 text-center text-xs text-slate-600 border border-slate-200">

                        {{ $no }}

                    </td>

                    <!-- FOTO -->
                    <td class="px-4 py-3 border border-slate-200">

                        <img src="{{ asset('foto-aset/' . $item->foto) }}"
                            class="w-10 h-10 object-cover rounded-xl border border-slate-200">

                    </td>

                    <!-- NAMA -->
                    <td class="px-4 py-3 border border-slate-200">

                        <h2 class="font-medium text-slate-700 text-xs">
                            {{ $item->nama_aset }}
                        </h2>

                        <p class="text-xs text-slate-500 mt-1">
                            {{ $item->kode_aset }}
                        </p>

                    </td>

                    <!-- KATEGORI -->
                    <td class="px-4 py-3 border border-slate-200">

                        <span class="px-2 py-1 rounded-full bg-[#edf5f2] text-[#2f5d50] text-xs font-medium">

                            {{ $item->kategori }}

                        </span>

                    </td>

                    <!-- LOKASI -->
                    <td class="px-4 py-3 border border-slate-200">

                        <span class="text-xs text-slate-600">
                            {{ $item->lokasi }}
                        </span>

                    </td>

                    <!-- STOK -->
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
                                    '{{ asset('foto-aset/' . $item->foto) }}',
                                    '{{ $item->nama_aset }}',
                                    '{{ $item->kode_aset }}',
                                    '{{ $item->kategori }}',
                                    '{{ $item->lokasi }}',
                                    '{{ $item->stok }}',
                                    '{{ $item->kondisi }}',
                                    '{{ $item->spesifikasi }}'
                                )"

                                class="cursor-pointer w-8 h-8 rounded-xl
                                bg-orange-50 text-orange-500
                                hover:bg-orange-500 hover:text-white
                                transition-all duration-300
                                flex items-center justify-center">

                                <i class="fas fa-eye text-sm"></i>

                            </button>

                            <!-- EDIT -->
                            <button

                                onclick="openEditModal(
                                    '{{ $item->id }}',
                                    '{{ $item->nama_aset }}',
                                    '{{ $item->tanggal_masuk }}',
                                    '{{ $item->kode_aset }}',
                                    '{{ $item->kategori }}',
                                    '{{ $item->merk }}',
                                    '{{ $item->lokasi }}',
                                    '{{ $item->stok }}',
                                    '{{ $item->harga_beli }}',
                                    '{{ $item->kondisi }}',
                                    '{{ $item->spesifikasi }}'
                                )"

                                class="cursor-pointer w-8 h-8 rounded-xl
                                bg-[#edf5f2] text-[#2f5d50]
                                hover:bg-[#2f5d50] hover:text-white
                                transition-all duration-300
                                flex items-center justify-center">

                                <i class="fas fa-pen text-sm"></i>

                            </button>

                            <!-- QR -->
                                <button
                                onclick="openQRModal(
                                    '{{ url('/detail-aset-qr/'.$item->id) }}',
                                    '{{ $item->nama_aset }}',
                                    '{{ $item->kode_aset }}'
                                )"
                                class="w-8 h-8 rounded-xl bg-[#edf5f2] text-[#2f5d50] hover:bg-[#2f5d50] hover:text-white transition-all duration-300 flex items-center justify-center">

                                <i class="fas fa-qrcode text-sm"></i>

                            </button>

                            <!-- DELETE -->
                            <form action="/hapus-aset/{{ $item->id }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus aset ini?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit"

                                    class="cursor-pointer w-8 h-8 rounded-xl
                                    bg-red-50 text-red-500
                                    hover:bg-red-500 hover:text-white
                                    transition-all duration-300
                                    flex items-center justify-center">

                                    <i class="fas fa-trash text-sm"></i>

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="7"
                    class="text-center py-14 text-slate-300 italic text-sm">

                        Belum ada data aset tersedia.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

<!-- MODAL TAMBAH ASET -->
<div id="modalTambahAset"
class="fixed inset-0 bg-black/30 backdrop-blur-sm
hidden items-center justify-center z-50 p-6">

    <div class="bg-white w-full max-w-sm rounded-2xl
    shadow-2xl overflow-hidden relative
    max-h-[85vh] overflow-y-auto">

    <button onclick="closeModal()"
    class="absolute top-5 right-5 text-slate-400 hover:text-red-500 transition-all duration-300">

        <i class="fas fa-times text-sm text-slate-500 mt-1"></i>

    </button>

    <div class="p-6">

        <h3 class="text-lg font-semibold text-slate-800">
            Tambah Aset
        </h3>

        <p class="text-xs text-slate-400 mb-6">
            Tambahkan data aset sekolah
        </p>

<form action="{{ route('aset.simpan') }}"
      method="POST"
      enctype="multipart/form-data"
      class="space-y-4">

    @csrf
                <!-- FOTO -->
                <div>

                    <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                        Foto Aset
                    </label>

                    <input
                        type="file"
                        name="foto"
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                </div>

                <!-- NAMA ASET -->
                <div>

                    <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                        Nama Aset
                    </label>

                    <input
                        type="text"
                        name="nama_aset"
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                </div>

                <!-- TANGGAL MASUK -->
                <div>

                    <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                        Tanggal Masuk
                    </label>

                    <input
                        type="date"
                        name="tanggal_masuk"
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                </div>

                <!-- KODE ASET -->
                <div>

                    <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                        Kode Aset
                    </label>

                    <input
                        type="text"
                        name="kode_aset"
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                </div>

                <!-- KATEGORI -->
                <div>

                    <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                        Kategori Aset
                    </label>

                    <select
                    name="kategori"
                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                        <option value="">--- Pilih Kategori ---</option>

                        <option value="Komputer">Komputer</option>
                        <option value="Jaringan">Jaringan</option>
                        <option value="Elektronik">Elektronik</option>
                        <option value="Furniture">Furniture</option>
                        <option value="Kendaraan">Kendaraan</option>
                        <option value="Gedung">Gedung</option>

                    </select>

                </div>

                <!-- MERK -->
                <div>

                    <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                        Merk
                    </label>

                    <input
                        type="text"
                        name="merk"
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                </div>

                <!-- LOKASI -->
                <div>

                    <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                        Lokasi
                    </label>

                    <select
                    name="lokasi"
                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                    <option value="">--- Pilih Lokasi ---</option>

                        @foreach($ruangans as $r)

                            <option value="{{ $r->nama_ruangan }}">
                                {{ $r->nama_ruangan }}
                            </option>

                        @endforeach

                    </select>

                </div>

                <!-- HARGA BELI -->
                <div>

                    <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                        Harga Beli
                    </label>

                    <input
                        type="number"
                        name="harga_beli"
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                </div>

                <!-- JUMLAH -->
                <div>

                    <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                        Jumlah
                    </label>

                    <input
                        type="number"
                        name="stok"
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                </div>

                <!-- KONDISI -->
                <div>

                    <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                        Kondisi
                    </label>

                    <select
                    name="kondisi"
                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                        <option value="">--- Pilih Kondisi ---</option>

                        <option value="Baik">Baik</option>
                        <option value="Rusak Ringan">Rusak Ringan</option>
                        <option value="Rusak Berat">Rusak Berat</option>

                    </select>

                </div>

                <!-- SPESIFIKASI -->
                <div>

                    <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                        Spesifikasi
                    </label>

                    <textarea
                        name="spesifikasi"
                        rows="3"
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all"></textarea>

                </div>
                    <div class="flex gap-3 mt-6">

                        <button
                            type="submit"
                            class="flex-1 py-2.5 bg-[#2f5d50] text-white rounded-xl font-medium text-sm">

                            Simpan Data

                        </button>

                        <button
                            type="button"
                            onclick="closeModal()"
                            class="flex-1 bg-slate-200 py-2 rounded-xl font-medium text-sm">

                            Batal

                        </button>

                    </div>
                
                </form>

            </div>

        </div>

    </div>

</div>
<!-- MODAL DETAIL -->
<div id="detailModal"
class="fixed inset-0 bg-black/30 backdrop-blur-sm hidden items-center justify-center z-50 p-6">

    <div class="bg-white w-full max-w-3xl rounded-3xl shadow-2xl overflow-hidden relative">

        <button onclick="closeDetail()"
        class="absolute top-5 right-6 text-slate-400 hover:text-red-500">

            <i class="fas fa-times text-lg"></i>

        </button>

        <div class="flex items-center h-[500px]">

            <div class="w-[40%] h-full bg-slate-50 flex items-center justify-center p-8">

                <img id="detailFoto"
                src=""
                class="max-h-[280px] object-contain rounded-2xl">

            </div>

            <div class="flex-1 h-full p-8 overflow-y-auto">

                <h1 class="text-3xl font-medium text-slate-800 mb-8">
                    Detail Aset
                </h1>

                <div class="space-y-5">

                    <div>
                        <p class="text-xs uppercase text-slate-300 mb-2">Nama Aset</p>
                        <h2 id="detailNama" class="text-base font-medium text-slate-700"></h2>
                    </div>

                    <div>
                        <p class="text-xs uppercase text-slate-300 mb-2">Kode Aset</p>
                        <h2 id="detailKode" class="text-sm font-medium text-slate-700"></h2>
                    </div>

                    <div>
                        <p class="text-xs uppercase text-slate-300 mb-2">Kategori</p>
                        <span id="detailKategori"
                        class="inline-block px-4 py-2 bg-[#edf5f2] text-[#2f5d50] rounded-full text-xs font-medium"></span>
                    </div>

                    <div>
                        <p class="text-xs uppercase text-slate-300 mb-2">Lokasi</p>
                        <h2 id="detailLokasi" class="text-sm font-medium text-slate-700"></h2>
                    </div>

                    <div class="grid grid-cols-2 gap-6">

                        <div>
                            <p class="text-xs uppercase text-slate-300 mb-2">Jumlah</p>
                            <h2 id="detailStok" class="text-base font-medium text-slate-700"></h2>
                        </div>

                        <div>
                            <p class="text-xs uppercase text-slate-300 mb-2">Kondisi</p>
                            <h2 id="detailKondisi" class="text-base font-medium text-slate-700"></h2>
                        </div>

                    </div>

                    <div>
                        <p class="text-xs uppercase text-slate-300 mb-2">Spesifikasi</p>

                        <div class="bg-slate-50 rounded-2xl p-5">

                            <p id="detailSpesifikasi"
                            class="text-slate-600 text-sm"></p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
<div id="editModal"
class="fixed inset-0 bg-black/30 backdrop-blur-sm hidden items-center justify-center z-50 p-6">

    <div class="bg-white w-full max-w-md rounded-3xl shadow-2xl overflow-hidden relative max-h-[90vh] overflow-y-auto">

        <button onclick="closeEditModal()"
        class="absolute top-5 right-5 text-slate-400 hover:text-red-500">

            <i class="fas fa-times text-sm"></i>

        </button>

        <div class="p-6">

            <h3 class="text-lg font-semibold text-slate-800">
                Edit Aset
            </h3>

            <p class="text-xs text-slate-400 mb-6">
                Ubah data aset sekolah
            </p>

            <form id="formEditAset"
            method="POST"
            enctype="multipart/form-data"
            class="space-y-4">

                @csrf
                @method('PUT')

                <!-- semua field edit di sini -->
                <!-- FOTO -->
                <div>

                    <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                        Foto Aset
                    </label>

                    <input
                        type="file"
                        name="foto"
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                </div>

                <!-- NAMA ASET -->
                <div>

                    <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                        Nama Aset
                    </label>

                    <input
                        type="text"
                        id="editNama"
                        name="nama_aset"
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                </div>

                <!-- TANGGAL MASUK -->
                <div>

                    <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                        Tanggal Masuk
                    </label>

                    <input
                        type="date"
                        id="editTanggal"
                        name="tanggal_masuk"
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                </div>

                <!-- KODE ASET -->
                <div>

                    <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                        Kode Aset
                    </label>

                    <input
                        type="text"
                        id="editKode"
                        name="kode_aset"
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                </div>

                <!-- KATEGORI -->
                <div>

                    <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                        Kategori Aset
                    </label>

                    <select
                    id="editKategori"
                    name="kategori"
                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                        <option value="">--- Pilih Kategori ---</option>

                        <option value="Komputer">Komputer</option>
                        <option value="Jaringan">Jaringan</option>
                        <option value="Elektronik">Elektronik</option>
                        <option value="Furniture">Furniture</option>
                        <option value="Kendaraan">Kendaraan</option>
                        <option value="Gedung">Gedung</option>

                    </select>

                </div>

                <!-- MERK -->
                <div>

                    <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                        Merk
                    </label>

                    <input
                        type="text"
                        id="editMerk"
                        name="merk"
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                </div>

                <!-- LOKASI -->
                <div>

                    <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                        Lokasi
                    </label>

                    <select
                    id="editLokasi"
                    name="lokasi"
                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                    <option value="">--- Pilih Lokasi ---</option>

                        @foreach($ruangans as $r)

                            <option value="{{ $r->nama_ruangan }}">
                                {{ $r->nama_ruangan }}
                            </option>

                        @endforeach

                    </select>

                </div>

                <!-- HARGA BELI -->
                <div>

                    <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                        Harga Beli
                    </label>

                    <input
                        type="number"
                        id="editHarga"
                        name="harga_beli"
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                </div>

                <!-- JUMLAH -->
                <div>

                    <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                        Jumlah
                    </label>

                    <input
                        type="number"
                        id="editStok"
                        name="stok"
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                </div>

                <!-- KONDISI -->
                <div>

                    <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                        Kondisi
                    </label>

                    <select
                    id="editKondisi"
                    name="kondisi"
                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                        <option value="">--- Pilih Kondisi ---</option>

                        <option value="Baik">Baik</option>
                        <option value="Rusak Ringan">Rusak Ringan</option>
                        <option value="Rusak Berat">Rusak Berat</option>

                    </select>

                </div>

                <!-- SPESIFIKASI -->
                <div>

                    <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                        Spesifikasi
                    </label>

                    <textarea
                        id="editSpesifikasi"
                        name="spesifikasi"
                        rows="3"
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all"></textarea>

                </div>

                <div class="flex gap-3 mt-6">

                    <button
                        type="submit"
                        class="flex-1 py-2.5 bg-[#2f5d50]
                        text-white rounded-xl font-medium text-sm">

                        Simpan Perubahan

                    </button>

                    <button
                        type="button"
                        onclick="closeEditModal()"
                        class="flex-1 bg-slate-200 py-2 rounded-xl font-medium text-sm">

                        Batal

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
     
<script>

let qrUrlAset = '';
let qrKodeAset = '';
let qrNamaAset = '';
function openModal() {
    document.getElementById('modalTambahAset')
        .classList.remove('hidden');

    document.getElementById('modalTambahAset')
        .classList.add('flex');
}

function closeModal() {
    document.getElementById('modalTambahAset')
        .classList.add('hidden');

    document.getElementById('modalTambahAset')
        .classList.remove('flex');
}

function openEditModal(
    id,
    nama,
    tanggal,
    kode,
    kategori,
    merk,
    lokasi,
    stok,
    harga,
    kondisi,
    spesifikasi
)
{
    document.getElementById('editModal')
        .classList.remove('hidden');

    document.getElementById('editModal')
        .classList.add('flex');

    document.getElementById('formEditAset').action =
        '/update-aset/' + id;

    document.getElementById('editNama').value = nama;
    document.getElementById('editTanggal').value = tanggal;
    document.getElementById('editKode').value = kode;
    document.getElementById('editKategori').value = kategori;
    document.getElementById('editMerk').value = merk;
    document.getElementById('editLokasi').value = lokasi;
    document.getElementById('editStok').value = stok;
    document.getElementById('editHarga').value = harga;
    document.getElementById('editKondisi').value = kondisi;
    document.getElementById('editSpesifikasi').value = spesifikasi;
}

function closeEditModal()
{
    document.getElementById('editModal')
        .classList.remove('flex');

    document.getElementById('editModal')
        .classList.add('hidden');
}

function openQRModal(url,nama,kode)
{
    qrUrlAset = url;
    qrKodeAset = kode;
    qrNamaAset = nama;

    document
    .getElementById('qrModal')
    .classList.remove('hidden');

    document
    .getElementById('qrModal')
    .classList.add('flex');

    document
    .getElementById('qrAsetNama')
    .innerText = nama;

    document
    .getElementById('qrcodeAset')
    .innerHTML = '';

    new QRCode(
        document.getElementById('qrcodeAset'),
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

function printQRAset()
{
    let qr =
        document.getElementById('qrcodeAset').innerHTML;

    let win =
        window.open('', '', 'width=900,height=700');

    win.document.write(`
    <html>

    <head>

        <title>QR Code Aset</title>

        <style>

            body{
                font-family:Arial,sans-serif;
                display:flex;
                justify-content:center;
                align-items:center;
                height:100vh;
                margin:0;
                background:white;
            }

            .card{
                width:550px;
                border:2px solid #000;
                border-radius:16px;
                padding:20px;
                display:flex;
                align-items:center;
                gap:20px;
                box-sizing:border-box;
            }

            .left{
                width:110px;
                flex-shrink:0;
                text-align:center;
            }

            .left img{
                width:100px !important;
                height:100px !important;
            }

            .right{
                flex:1;
            }

            .title{
                font-size:15px;
                font-weight:600;
                text-align:center;
                border-bottom:1px solid #ccc;
                padding-bottom:8px;
                margin-bottom:10px;
            }

            .info{
                font-size:12px;
                line-height:1.6;
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
                    Aset Milik SMK Al-Irsyad Kota Tegal
                </div>

                <div class="info">

                    <p>
                        <b>Nama Aset :</b>
                        ${qrNamaAset}
                    </p>

                    <p>
                        <b>Kode Aset :</b>
                        ${qrKodeAset}
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

function openDetail(
    foto,
    nama,
    kode,
    kategori,
    lokasi,
    stok,
    kondisi,
    spesifikasi
)
{
    document.getElementById('detailFoto').src = foto;
    document.getElementById('detailNama').innerText = nama;
    document.getElementById('detailKode').innerText = kode;
    document.getElementById('detailKategori').innerText = kategori;
    document.getElementById('detailLokasi').innerText = lokasi;
    document.getElementById('detailStok').innerText = stok + ' Unit';
    document.getElementById('detailKondisi').innerText = kondisi;
    document.getElementById('detailSpesifikasi').innerText = spesifikasi;

    document.getElementById('detailModal')
        .classList.remove('hidden');

    document.getElementById('detailModal')
        .classList.add('flex');
}

function closeDetail()
{
    document.getElementById('detailModal')
        .classList.remove('flex');

    document.getElementById('detailModal')
        .classList.add('hidden');
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
            QR Code Aset
        </h2>

        <p
        id="qrAsetNama"
        class="text-xs text-slate-400 mb-4">
        </p>

        <div
        id="qrcodeAset"
        class="flex justify-center">
        </div>

        <button
        onclick="printQRAset()"
        class="w-full mt-5 py-2.5 bg-[#2f5d50]
        text-white rounded-xl font-medium text-sm
        hover:bg-[#23463c] transition-all">

            Cetak QR

        </button>

    </div>

</div>
@endsection