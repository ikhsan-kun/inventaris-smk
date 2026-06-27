@extends('layouts.app')

@section('content')

<!-- CONTENT -->
<div class="p-8">

    <!-- HEADER -->
    <header class="flex justify-between items-center mb-20">

        <div>

            <h2 class="text-2xl font-semibold text-slate-800">
                Log Barang Masuk
            </h2>

            <p class="text-sm text-slate-400 mt-2">
                Catatan barang yang baru masuk ke gudang sekolah
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

            Input Barang Masuk

        </button>

    </header>

    <!-- TABLE -->
    <div class="bg-white rounded-2xl border border-slate-300 shadow-sm overflow-hidden mt-6">
    
    <div class="overflow-x-auto">

        <table class="min-w-full divide-y divide-slate-200">

            <!-- HEAD -->
            <thead class="bg-[#2f5d50] text-white border border-[#3f7465]">

                <tr class="text-[11px] uppercase font-semibold tracking-widest">

                    <th class="px-4 py-3 border border-[#3f7465]">
                        Tanggal
                    </th>

                    <th class="px-4 py-3 border border-[#3f7465]">
                        Nama Barang
                    </th>

                    <th class="px-4 py-3 border border-[#3f7465]">
                        Jumlah Masuk
                    </th>

                    <th class="px-4 py-3 border border-[#3f7465]">
                        Kondisi
                    </th>

                    <th class="px-4 py-3 border border-[#3f7465]">
                        Keterangan
                    </th>

                    <th class="px-4 py-3 border border-[#3f7465]">
                        Aksi
                    </th>

                </tr>

            </thead>

            <tbody class="divide-y divide-slate-100 bg-white">

                @forelse($transaksiMasuk as $tr)

                <tr class="hover:bg-slate-50 transition-all duration-300">

                    <!-- TANGGAL -->
                    <td class="px-4 py-3 border border-slate-200 text-xs text-slate-600">
                        {{ $tr->created_at->format('d/m/Y') }}
                    </td>

                    <!-- NAMA -->
                    <td class="px-4 py-3 border border-slate-200">

                        <div class="text-xs font-medium text-slate-700">
                            {{ $tr->nama_barang }}
                        </div>

                        <div class="text-xs text-slate-500 mt-1">
                            {{ $tr->kode_barang ?? '-' }}
                        </div>

                    </td>

                    <!-- STOK -->
                    <td class="px-4 py-3 border border-slate-200">

                        <span class="text-xs font-medium text-slate-700">
                            {{ $tr->stok }} {{ $tr->satuan }}
                        </span>

                    </td>

                    <!-- KONDISI -->
                    <td class="px-4 py-3 border border-slate-200">

                        <span class="px-2 py-1 rounded-full bg-[#edf5f2] text-[#2f5d50] text-xs font-medium">

                            {{ $tr->kondisi ?? '-' }}

                        </span>

                    </td>

                    <!-- KETERANGAN -->
                    <td class="px-4 py-3 border border-slate-200 text-xs text-slate-500 italic">
                        {{ $tr->keterangan ?? '-' }}
                    </td>

                    <!-- AKSI -->
                    <td class="px-6 py-4 border border-slate-200">

                        <div class="flex items-center gap-2">

                            <!-- EDIT -->
                            <button

                                onclick="openEditModal(
                                    '{{ $tr->id }}',
                                    '{{ $tr->nama_barang }}',
                                    '{{ $tr->tanggal_masuk }}',
                                    '{{ $tr->kode_barang }}',
                                    '{{ $tr->kategori }}',
                                    '{{ $tr->lokasi }}',
                                    '{{ $tr->stok }}',
                                    '{{ $tr->satuan }}',
                                    '{{ $tr->kondisi }}',
                                    '{{ $tr->keterangan }}'
                                )"

                                class="w-8 h-8 rounded-xl
                                bg-orange-50 text-orange-500
                                hover:bg-orange-500 hover:text-white
                                transition-all duration-300">

                                <i class="fas fa-pen text-sm"></i>

                            </button>

                            <!-- DELETE -->
                            <form action="{{ route('barang.hapus', $tr->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus barang ini?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="w-8 h-8 rounded-xl
                                        bg-red-50 text-red-500
                                        hover:bg-red-500 hover:text-white
                                        transition-all duration-300">

                                    <i class="fas fa-trash text-sm"></i>

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="6"
                        class="px-8 py-12 text-center text-slate-300 text-sm italic">

                        Belum ada riwayat masuk.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>
        
    </div>
    
</div>

</div>

<!-- MODAL -->
<div id="modalMasuk"
     class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm hidden items-center justify-center z-50 p-4">

    <div class="bg-white w-full max-w-sm rounded-2xl shadow-2xl overflow-hidden relative max-h-[85vh] overflow-y-auto p-6">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-2">

            <h3 class="text-lg font-semibold text-slate-800">
                Input Barang Masuk
            </h3>

            <button onclick="closeModal()"
            class="text-slate-400 hover:text-red-500 transition-all duration-300">

                <i class="fas fa-times text-sm"></i>

            </button>

        </div>

        <p class="text-xs text-slate-400 mb-6">
            Tambahkan data barang masuk
        </p>

        <!-- FORM -->
        <form action="{{ route('barang.store') }}"
              method="POST"
              enctype="multipart/form-data"
              class="space-y-5">

            @csrf

            <!-- FOTO -->
            <div>

                <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                    Foto Barang
                </label>

                <input type="file"
                       name="foto"
                       accept="image/*"
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

            </div>

            <!-- NAMA -->
            <div>

                <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                    Nama Barang
                </label>

                <input type="text"
                       name="nama_barang"
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

            </div>

            <!-- TANGGAL -->
            <div>

                <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                    Tanggal Barang Masuk
                </label>

                <input type="date"
                       name="tanggal_masuk"
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

            </div>

            <!-- KATEGORI -->
            <div>

                <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                    Kategori
                </label>

                <select
                name="kategori"
                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                    <option value="">--- Pilih Kategori ---</option>

                    <option value="Komputer">Komputer</option>
                    <option value="Laptop">Laptop</option>
                    <option value="Printer">Printer</option>
                    <option value="Proyektor">Proyektor</option>
                    <option value="Jaringan">Jaringan</option>
                    <option value="Elektronik">Elektronik</option>
                    <option value="Furniture">Furniture</option>
                    <option value="Kendaraan">Kendaraan</option>
                    <option value="Gedung">Gedung</option>
                    <option value="ATK">ATK</option>
                    <option value="Peralatan Lab">Peralatan Lab</option>

                </select>

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

            <!-- STOK -->
            <div>

                <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                    Stok
                </label>

                <input type="number"
                name="stok"
                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

            </div>

            <!-- SATUAN -->
            <div>

                <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                    Satuan
                </label>

                <select
                name="satuan"
                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                    <option value="">--- Pilih Satuan ---</option>

                    <option value="Unit">Unit</option>
                    <option value="PCS">PCS</option>
                    <option value="Box">Box</option>

                </select>

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

            <!-- KETERANGAN -->
            <div>

                <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                    Keterangan
                </label>

                <textarea
                name="keterangan"
                rows="4"
                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all"></textarea>

            </div>

            <!-- BUTTON -->
            <div class="flex gap-3 pt-2">

            <button
            type="submit"
            class="flex-1 py-2.5 bg-[#2f5d50]
            text-white rounded-xl font-medium text-sm
            hover:bg-[#23463c] transition-all">

                Simpan Barang

            </button>

            <button
            type="button"
            onclick="closeModal()"
            class="flex-1 bg-slate-200
            hover:bg-slate-300
            py-2 rounded-xl
            font-medium text-sm">

                Batal

            </button>

        </div>

        </form>

    </div>

</div>

<!-- MODAL EDIT -->
<div id="modalEdit"
class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm hidden items-center justify-center z-50 p-4">

    <div class="bg-white w-full max-w-sm rounded-2xl shadow-2xl overflow-hidden relative max-h-[85vh] overflow-y-auto p-6">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-2">

            <h3 class="text-lg font-semibold text-slate-800">
                Edit Barang Masuk
            </h3>

            <button onclick="closeEditModal()"
            class="text-slate-400 hover:text-red-500 transition-all duration-300">

                <i class="fas fa-times text-sm"></i>

            </button>

        </div>

        <p class="text-xs text-slate-400 mb-6">
            Update data barang masuk
        </p>

        <!-- FORM -->
        <form id="formEdit"
        action=""
        method="POST"
        class="space-y-5">

            @csrf
            @method('PUT')

            <!-- NAMA -->
            <div>

                <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                    Nama Barang
                </label>

                <input type="text"
                id="editNama"
                name="nama_barang"
                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

            </div>

            <!-- TANGGAL -->
            <div>

                <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                    Tanggal Barang Masuk
                </label>

                <input type="date"
                id="editTanggal"
                name="tanggal_masuk"
                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

            </div>

            <!-- KODE -->
            <div>

                <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                    Kode Barang
                </label>

                <input type="text"
                id="editKode"
                name="kode_barang"
                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

            </div>

            <!-- KATEGORI -->
            <div>

                <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                    Kategori
                </label>

                <select
                id="editKategori"
                name="kategori"
                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                <option value="">--- Pilih Kategori ---</option>

                <option value="Komputer">Komputer</option>
                <option value="Laptop">Laptop</option>
                <option value="Printer">Printer</option>
                <option value="Proyektor">Proyektor</option>
                <option value="Jaringan">Jaringan</option>
                <option value="Elektronik">Elektronik</option>
                <option value="Furniture">Furniture</option>
                <option value="Kendaraan">Kendaraan</option>
                <option value="Gedung">Gedung</option>
                <option value="ATK">ATK</option>
                <option value="Peralatan Lab">Peralatan Lab</option>

                </select>

            </div>

            <!-- LOKASI -->
            <div>

                <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                    Lokasi
                </label>

                <select
                name="lokasi"
                id="editLokasi"
                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                    <option value="">--- Pilih Lokasi ---</option>

                    @foreach($ruangans as $r)

                        <option value="{{ $r->nama_ruangan }}">
                            {{ $r->nama_ruangan }}
                        </option>

                    @endforeach

                </select>

            </div>

            <!-- STOK -->
            <div>

                <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                    Stok
                </label>

                <input type="number"
                id="editStok"
                name="stok"
                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

            </div>

            <!-- SATUAN -->
            <div>

                <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                    Satuan
                </label>

                <select
                id="editSatuan"
                name="satuan"
                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                    <option value="">--- Pilih Satuan ---</option>

                    <option value="Unit">Unit</option>
                    <option value="PCS">PCS</option>
                    <option value="Box">Box</option>

                </select>

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

            <!-- KETERANGAN -->
            <div>

                <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                    Keterangan
                </label>

                <textarea
                name="keterangan"
                id="editKeterangan"
                rows="4"
                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all"></textarea>

            </div>

            <!-- BUTTON -->
            <div class="flex gap-3 pt-2">

                <button
                type="submit"
                class="flex-1 py-2.5 bg-[#2f5d50]
                text-white rounded-xl font-medium text-sm
                hover:bg-[#23463c] transition-all">

                    Simpan Barang

                </button>

                <button
                type="button"
                onclick="closeEditModal()"
                class="flex-1 bg-slate-200
                hover:bg-slate-300
                py-2 rounded-xl
                font-medium text-sm">

                    Batal

                </button>

            </div>

        </form>

    </div>

</div>

<!-- SCRIPT -->
<script>

function openModal() {

    document.getElementById('modalMasuk')
    .classList.remove('hidden');

    document.getElementById('modalMasuk')
    .classList.add('flex');

}

function closeModal() {

    document.getElementById('modalMasuk')
    .classList.remove('flex');

    document.getElementById('modalMasuk')
    .classList.add('hidden');

}

function openEditModal(
    id,
    nama,
    tanggal,
    kode,
    kategori,
    lokasi,
    stok,
    satuan,
    kondisi,
    keterangan
) {

    document.getElementById('modalEdit')
    .classList.remove('hidden');

    document.getElementById('modalEdit')
    .classList.add('flex');

    document.getElementById('formEdit')
    .action = '/barang-masuk/update/' + id;

    document.getElementById('editNama').value = nama;

    document.getElementById('editTanggal').value = tanggal;

    document.getElementById('editKode').value = kode;

    document.getElementById('editKategori').value = kategori;

    document.getElementById('editLokasi').value = lokasi;

    document.getElementById('editStok').value = stok;

    document.getElementById('editSatuan').value = satuan;

    document.getElementById('editKondisi').value = kondisi;

    document.getElementById('editKeterangan').value = keterangan;

}

function closeEditModal() {

    document.getElementById('modalEdit')
    .classList.remove('flex');

    document.getElementById('modalEdit')
    .classList.add('hidden');

}

function toggleAnggotaMenu() {

    const menu = document.getElementById('anggotaMenu');

    menu.classList.toggle('hidden');

}

</script>

@endsection