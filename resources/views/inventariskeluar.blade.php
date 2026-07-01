@extends('layouts.app')

@section('content')

    <!-- CONTENT -->
    <div class="p-8">

        <!-- HEADER -->
        <header class="flex justify-between items-center mb-24">

            <div>

                <h2 class="text-2xl font-semibold text-slate-800">
                    Log Inventaris Keluar
                </h2>

                <p class="text-xs text-slate-400 font-medium">
                    Catatan barang dan aset yang keluar atau didistribusikan
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

                Input Inventaris Keluar

            </button>

        </header>

        <!-- ERROR -->
        @if(session('error'))

        <div class="mb-4 p-4 bg-red-100 text-red-600 rounded-xl text-xs font-bold">
            {{ session('error') }}
        </div>

        @endif

        <!-- TABLE -->
        <div class="bg-white rounded-2xl border border-slate-300 overflow-hidden shadow-sm mt-6">

            <div class="overflow-x-auto">

            <table class="min-w-full divide-y divide-slate-200">

                <thead class="bg-[#2f5d50] text-white">

                    <tr class="text-[11px] uppercase font-bold tracking-wide">

                        <th class="px-4 py-3 border border-[#3d6b5e]">
                            Tanggal
                        </th>

                        <th class="px-4 py-3 border border-[#3d6b5e]">
                            Nama Barang
                        </th>

                        <th class="px-4 py-3 border border-[#3d6b5e]">
                            Jumlah Keluar
                        </th>

                        <th class="px-4 py-3 border border-[#3d6b5e]">
                            Keterangan
                        </th>

                        <th class="px-4 py-3 text-center border border-[#3d6b5e]">
                            Aksi
                        </th>

                    </tr>

                </thead>

                    <tbody class="divide-y divide-slate-200">

                        @forelse($transaksiKeluar as $tr)

                        <tr class="border-b border-slate-200 hover:bg-slate-50 transition-all">

                            <td class="px-4 py-3 border border-slate-200 text-xs font-medium text-slate-500">
                                {{ $tr->created_at->format('d/m/Y') }}
                            </td>

                            <td class="px-4 py-3 border border-slate-200 text-xs font-medium text-slate-700">
                            @if($tr->barang)

                                {{ $tr->barang->nama_barang }}

                            @elseif($tr->asset)

                                {{ $tr->asset->nama_aset }}

                            @else

                                -

                            @endif
                            </td>

                            <td class="px-4 py-3 border border-slate-200 text-xs font-medium text-red-500">
                                -{{ $tr->jumlah }} Unit
                            </td>

                            <td class="px-4 py-3 border border-slate-200 text-xs text-slate-400 italic">
                                {{ $tr->keterangan ?? '-' }}
                            </td>

                            <td class="px-4 py-3 border border-slate-200">

                                <div class="flex justify-center gap-2">

                                    <!-- EDIT -->
                                    <button

                                        onclick="openEditModal(
                                            '{{ $tr->id }}',
                                            '{{ $tr->jumlah }}',
                                            '{{ $tr->keterangan }}'
                                        )"

                                        class="w-8 h-8 rounded-xl bg-orange-50 text-orange-500 hover:bg-orange-500 hover:text-white transition-all text-xs">

                                        <i class="fas fa-pen"></i>

                                    </button>

                                    <!-- DELETE -->
                                    <form action="/inventaris-keluar/hapus/{{ $tr->id }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus transaksi ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="w-8 h-8 rounded-xl bg-red-50 text-red-500 hover:bg-red-500 hover:text-white transition-all text-xs">

                                            <i class="fas fa-trash"></i>

                                        </button>

                                            </form>

                                        </div>

                                </td>

                        </tr>

                        @empty

                        <tr>

                        <td colspan="5"
                            class="border border-slate-200 text-center py-12 text-slate-300 italic text-sm">

                                Belum ada riwayat keluar.

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

<!-- MODAL -->
<div id="modalKeluar"
     class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm hidden items-center justify-center z-50">

    <div class="bg-white w-full max-w-sm rounded-2xl shadow-2xl overflow-hidden relative max-h-[85vh] overflow-y-auto p-6">

        <div class="flex justify-between items-center mb-2">

            <h3 class="text-lg font-semibold text-slate-800">
                Input Inventaris Keluar
            </h3>

            <button onclick="closeModal()"
            class="text-slate-400 hover:text-red-500 transition-all duration-300">

                <i class="fas fa-times text-sm"></i>

            </button>

        </div>

        <p class="text-xs text-slate-400 mb-6">
            Tambahkan data inventaris keluar
        </p>

        <form action="{{ route('inventaris.keluar.simpan') }}"
              method="POST"
              class="space-y-4">

            @csrf

            <div>

                <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                    Jenis Inventaris
                </label>

                <select
                name="tipe"
                id="tipeInventaris"
                onchange="toggleInventaris()"
                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm">

                    <option value="">
                        --- Pilih Jenis Inventaris ---
                    </option>

                    <option value="barang">
                        Barang
                    </option>

                    <option value="aset">
                        Aset
                    </option>

                </select>

            </div>

            <div id="asetWrapper" class="hidden">

                <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                    Pilih Inventaris
                </label>

                <select
                name="aset_id"
                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm">

                    <option value="">
                        --- Pilih Aset ---
                    </option>

                    @foreach($asets as $a)

                        <option value="{{ $a->id }}">
                            {{ $a->nama_aset }}
                            (Tersedia: {{ $a->stok }})
                        </option>

                    @endforeach

                </select>

            </div>

            <div id="barangWrapper" class="hidden">

                <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                    Pilih Inventaris
                </label>

                <select
                name="barang_id"
                id="selectBarang"
                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm">

                    <option value="">
                        --- Pilih Barang ---
                    </option>

                    @foreach($barangs as $b)

                        <option value="{{ $b->id }}">
                            {{ $b->nama_barang }}
                            (Tersedia: {{ $b->stok }})
                        </option>

                    @endforeach

                </select>

            </div>

            <div>

                <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                    Jumlah Keluar
                </label>

                <input
                type="number"
                name="jumlah"
                required
                placeholder="0"
                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

            </div>

            <div>

                <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                    Keterangan / Keperluan
                </label>

                <textarea
                name="keterangan"
                rows="4"
                placeholder="Contoh: Rusak / Perbaikan"
                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all"></textarea>

            </div>

            <div class="flex gap-3 pt-2">

                <button
                type="submit"
                class="flex-1 py-2.5 bg-[#2f5d50]
                text-white rounded-xl font-medium text-sm
                hover:bg-[#23463c] transition-all">

                    Simpan Data

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
        class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm hidden items-center justify-center z-50">

        <div class="bg-white w-full max-w-sm rounded-2xl shadow-2xl overflow-hidden relative max-h-[85vh] overflow-y-auto p-6">

        <div class="flex justify-between items-center mb-2">

            <h3 class="text-lg font-semibold text-slate-800">
                Edit Inventaris Keluar
            </h3>

            <button onclick="closeEditModal()"
            class="text-slate-400 hover:text-red-500 transition-all duration-300">

                <i class="fas fa-times text-sm"></i>

            </button>

        </div>

        <p class="text-xs text-slate-400 mb-6">
            Update data inventaris keluar
        </p>

            <form id="formEdit"
                method="POST"
                class="space-y-4">

                @csrf
                @method('PUT')

                <div>

                    <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                        Jumlah Keluar
                    </label>

                    <input type="number"
                        name="jumlah"
                        id="editJumlah"
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                </div>

                <div>

                    <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                        Keterangan
                    </label>

                    <textarea
                    id="editKeterangan"
                    name="keterangan"
                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all h-24"></textarea>

                </div>

                <div class="flex gap-3 pt-2">

                    <button
                    type="submit"
                    class="flex-1 py-2.5 bg-[#2f5d50]
                    text-white rounded-xl font-medium text-sm
                    hover:bg-[#23463c] transition-all">

                        Simpan Perubahan

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
            document.getElementById('modalKeluar')
                .classList.replace('hidden', 'flex');
        }

        function closeModal() {
            document.getElementById('modalKeluar')
                .classList.replace('flex', 'hidden');
        }

    function toggleAnggotaMenu() {

    const menu = document.getElementById('anggotaMenu');

    menu.classList.toggle('hidden');

}

function toggleInventaris()
{
    let tipe =
        document.getElementById('tipeInventaris').value;

    let barangWrapper =
        document.getElementById('barangWrapper');

    let asetWrapper =
        document.getElementById('asetWrapper');

    if (tipe === 'aset') {

        barangWrapper.classList.add('hidden');

        asetWrapper.classList.remove('hidden');

    }
    else if (tipe === 'barang') {

        barangWrapper.classList.remove('hidden');

        asetWrapper.classList.add('hidden');

    }
    else {

        barangWrapper.classList.add('hidden');

        asetWrapper.classList.add('hidden');
    }
}
function openEditModal(id, jumlah, keterangan)
{
    document.getElementById('modalEdit')
        .classList.replace('hidden', 'flex');

    document.getElementById('formEdit')
        .action = '/inventaris-keluar/update/' + id;

    document.getElementById('editJumlah')
        .value = jumlah;

    document.getElementById('editKeterangan')
        .value = keterangan;
}

function closeEditModal()
{
    document.getElementById('modalEdit')
        .classList.replace('flex', 'hidden');
}
    </script>

@endsection