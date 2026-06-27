@extends('layouts.app')

@section('content')

<!-- CONTENT -->
<div class="p-8">

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-20">

        <div>

            <h1 class="text-2xl font-semibold text-slate-800">
                Data Guru & Staff
            </h1>

            <p class="text-sm text-slate-400 mt-2">
                Kelola data guru dan staff sekolah
            </p>

        </div>

        <!-- BUTTON -->
        <button onclick="openGuruModal()"
            class="bg-[#2f5d50] hover:bg-[#3b6e60]
            transition-all duration-300
            text-white text-sm font-medium
            px-4 py-2 rounded-xl
            shadow-sm shadow-slate-200/50
            flex items-center gap-2">

            <i class="fas fa-plus"></i>

            Tambah Guru

        </button>

    </div>

    <!-- TABLE -->
    <div class="bg-white rounded-2xl overflow-hidden border border-slate-300 shadow-sm">

        <!-- TABLE -->
        <div class="overflow-x-auto">

            <table class="min-w-full divide-y divide-slate-200">

                <thead class="bg-[#2f5d50] text-white">

                    <tr class="text-[11px] uppercase font-semibold tracking-widest">

                        <th class="px-4 py-3 border border-[#3f7465] text-center text-xs w-[3%]">
                            No
                        </th>

                        <th class="px-4 py-3 border border-[#3f7465] text-left text-xs w-[25%]">
                            Nama Guru
                        </th>

                        <th class="px-4 py-3 border border-[#3f7465] text-left text-xs">
                            NIP
                        </th>

                        <th class="px-4 py-3 border border-[#3f7465] text-left text-xs">
                            Kode
                        </th>

                        <th class="px-4 py-3 border border-[#3f7465] text-left text-xs">
                            Tempat Lahir
                        </th>

                        <th class="px-4 py-3 border border-[#3f7465] text-left text-xs">
                            Tanggal Lahir
                        </th>

                        <th class="px-4 py-3 border border-[#3f7465] text-left text-xs">
                            Jabatan
                        </th>

                        <th class="px-4 py-3 border border-[#3f7465] text-left text-xs">
                            No HP
                        </th>

                        <th class="px-4 py-3 border border-[#3f7465] text-left text-xs">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-slate-100 bg-white">

                    @forelse($gurus as $index => $guru)

                    <tr class="hover:bg-slate-50 transition-all duration-300">

                        <td class="px-4 py-3 border border-slate-200 text-center text-sm text-slate-500">
                            {{ $index + 1 }}
                        </td>

                        <!-- NAMA -->
                        <td class="px-4 py-3 border border-slate-200">

                            <div class="text-sm font-medium text-slate-700">
                                {{ $guru->nama }}
                            </div>

                        </td>

                        <!-- NIP -->
                        <td class="px-4 py-3 border border-slate-200">

                            <span class="text-sm text-slate-500">
                                {{ $guru->nip }}
                            </span>

                        </td>

                        <!-- KODE -->
                        <td class="px-4 py-3 border border-slate-200">
                            <span class="text-sm text-slate-500">
                                {{ $guru->kode }}
                            </span>
                        </td>

                        <!-- TEMPAT LAHIR -->
                        <td class="px-4 py-3 border border-slate-200">
                            <span class="text-sm text-slate-500">
                                {{ $guru->tempat_lahir }}
                            </span>
                        </td>

                        <!-- TANGGAL LAHIR -->
                        <td class="px-4 py-3 border border-slate-200">
                            <span class="text-sm text-slate-500">
                                {{ $guru->tanggal_lahir }}
                            </span>
                        </td>

                        <!-- JABATAN -->
                        <td class="px-4 py-3 border border-slate-200">

                            <span class="bg-[#edf7f3] text-[#2f5d50]
                            text-xs font-medium px-3 py-1.5 rounded-full">

                                {{ $guru->jabatan }}

                            </span>

                        </td>

                        <!-- NO HP -->
                        <td class="px-4 py-3 border border-slate-200">

                            <span class="text-sm text-slate-500">
                                {{ $guru->no_hp }}
                            </span>

                        </td>

                        <!-- AKSI -->
                        <td class="px-4 py-3 border border-slate-200">

                            <div class="flex items-center gap-2">

                                <!-- EDIT -->
                                <button

                                onclick="openEditGuruModal(
                                '{{ $guru->id }}',
                                '{{ $guru->nama }}',
                                '{{ $guru->nip }}',
                                '{{ $guru->kode }}',
                                '{{ $guru->tempat_lahir }}',
                                '{{ $guru->tanggal_lahir }}',
                                '{{ $guru->jabatan }}',
                                '{{ $guru->no_hp }}'
                                )"

                                class="w-8 h-8 rounded-xl
                                bg-orange-50 text-orange-500
                                hover:bg-orange-500 hover:text-white
                                transition-all duration-300">

                                    <i class="fas fa-pen text-sm"></i>

                                </button>

                                <!-- DELETE -->
                                <form action="{{ route('guru.hapus', $guru->id) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">

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

                        <td colspan="9"
                        class="border border-slate-200 text-center py-12 text-slate-300 italic text-sm">

                            Belum ada data guru & staff terdaftar.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

<!-- POPUP TAMBAH GURU -->
<div id="guruModal"
class="fixed inset-0 bg-black/30 backdrop-blur-sm
hidden items-center justify-center z-50 p-6">

    <div class="bg-white w-full max-w-sm rounded-2xl
    shadow-2xl overflow-hidden relative
    max-h-[85vh] overflow-y-auto">

        <!-- CLOSE -->
        <button onclick="closeGuruModal()"
        class="absolute top-5 right-5 text-slate-400 hover:text-red-500 transition-all duration-300">

            <i class="fas fa-times text-sm text-slate-500 mt-1"></i>

        </button>

        <!-- CONTENT -->
        <div class="p-6">

            <!-- TITLE -->
            <h3 class="text-lg font-semibold text-slate-800">
                Tambah Guru
            </h3>

            <p class="text-xs text-slate-400 mb-6">
                Tambahkan data guru & staff sekolah
            </p>

            <!-- FORM -->
            <form action="{{ route('guru.store') }}"
            method="POST"
            class="space-y-4">

                @csrf

                <!-- NAMA -->
                <div>

                    <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                        Nama Guru
                    </label>

                    <input
                    type="text"
                    name="nama"
                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                </div>

                <!-- NIP -->
                <div>

                    <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                        NIP
                    </label>

                    <input type="text"
                    name="nip"
                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                </div>

                <!-- KODE -->
                <div>

                    <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                        Kode
                    </label>

                    <input type="text"
                    name="kode"
                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                </div>

                <!-- TEMPAT LAHIR -->
                <div>

                    <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                        Tempat Lahir
                    </label>

                    <input type="text"
                    name="tempat_lahir"
                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                </div>

                <!-- TANGGAL LAHIR -->
                <div>

                    <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                        Tanggal Lahir
                    </label>

                    <input type="date"
                    name="tanggal_lahir"
                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                </div>

                <!-- JABATAN -->
                <div>

                    <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                        Jabatan
                    </label>

                    <select
                    name="jabatan"
                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                        <option value="">--- Pilih Jabatan ---</option>

                        <option value="Guru">
                            Guru
                        </option>

                        <option value="Staff">
                            Staff
                        </option>

                    </select>

                </div>

                <!-- NO HP -->
                <div>

                    <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                        No HP
                    </label>

                    <input type="text"
                    name="no_hp"
                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                </div>

                    <!-- BUTTON -->
                    <div class="flex gap-3 pt-2">

                    <button type="submit"
                    class="flex-1 py-2.5 bg-[#2f5d50] text-white rounded-xl font-medium text-sm hover:bg-[#23463c] transition-all">

                            Simpan Guru

                        </button>

                        <button type="button"
                                onclick="closeGuruModal()"
                                class="flex-1 bg-slate-200 hover:bg-slate-300 py-2 rounded-xl font-medium text-sm">

                            Batal

                        </button>

                    </div>

            </form>

        </div>

    </div>

</div>

<!-- POPUP EDIT GURU -->
<div id="editGuruModal"
class="fixed inset-0 bg-black/30 backdrop-blur-sm
hidden items-center justify-center z-50 p-6">

    <div class="bg-white w-full max-w-sm rounded-2xl
    shadow-2xl overflow-hidden relative
    max-h-[85vh] overflow-y-auto">

        <!-- CLOSE -->
        <button onclick="closeEditGuruModal()"
        class="absolute top-5 right-5 text-slate-400 hover:text-red-500 transition-all duration-300">

            <i class="fas fa-times text-sm text-slate-500 mt-1"></i>

        </button>

        <div class="p-6">

        <h3 class="text-lg font-semibold text-slate-800">
            Edit Guru
        </h3>

            <p class="text-xs text-slate-400 mb-6">
                Update data guru & staff
            </p>

            <!-- FORM -->
            <form id="editGuruForm"
            action=""
            method="POST"
            class="space-y-4">

                @csrf
                @method('PUT')

                <!-- NAMA -->
                <div>

                    <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                        Nama Guru
                    </label>

                    <input
                    type="text"
                    id="editNama"
                    name="nama"
                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                </div>

                <!-- NIP -->
                <div>

                    <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                        NIP
                    </label>

                    <input
                    type="text"
                    id="editNip"
                    name="nip"
                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                </div>

                <!-- KODE -->
                <div>

                    <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                        Kode
                    </label>

                    <input
                    type="text"
                    id="editKode"
                    name="kode"
                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                </div>

                <!-- TEMPAT LAHIR -->
                <div>

                    <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                        Tempat Lahir
                    </label>

                    <input
                    type="text"
                    id="editTempatLahir"
                    name="tempat_lahir"
                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                </div>

                <!-- TANGGAL LAHIR -->
                <div>

                    <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                        Tanggal Lahir
                    </label>

                    <input
                    type="date"
                    id="editTanggalLahir"
                    name="tanggal_lahir"
                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                </div>

                <!-- JABATAN -->
                <div>

                    <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                        Jabatan
                    </label>

                    <select
                    id="editJabatan"
                    name="jabatan"
                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                        <option value="">--- Pilih Jabatan ---</option>
                        
                        <option value="Guru">Guru</option>

                        <option value="Staff">Staff</option>

                    </select>

                </div>

                <!-- NO HP -->
                <div>

                    <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                        No HP
                    </label>

                    <input
                    type="text"
                    id="editNoHp"
                    name="no_hp"
                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                </div>

                    <!-- BUTTON -->
                    <div class="flex gap-3 pt-2">

                    <button type="submit"
                    class="flex-1 py-2.5 bg-[#2f5d50] text-white rounded-xl font-medium text-sm hover:bg-[#23463c] transition-all">

                            Simpan Perubahan

                        </button>

                    <button type="button"
                    onclick="closeEditGuruModal()"
                    class="flex-1 py-2.5 bg-slate-200 text-slate-700 rounded-xl font-medium text-sm hover:bg-slate-300 transition-all">

                            Batal

                        </button>

                    </div>

            </form>

        </div>

    </div>

</div>

<script>

function toggleAnggotaMenu() {

    const menu = document.getElementById('anggotaMenu');

    const arrow = document.getElementById('anggotaArrow');

    if (menu.classList.contains('hidden')) {

        menu.classList.remove('hidden');

        arrow.classList.add('rotate-180');

    } else {

        menu.classList.add('hidden');

        arrow.classList.remove('rotate-180');

    }

}

function openGuruModal() {

    document.getElementById('guruModal')
    .classList.remove('hidden');

    document.getElementById('guruModal')
    .classList.add('flex');

}

function closeGuruModal() {

    document.getElementById('guruModal')
    .classList.remove('flex');

    document.getElementById('guruModal')
    .classList.add('hidden');

}

function openEditGuruModal(
    id,
    nama,
    nip,
    kode,
    tempat_lahir,
    tanggal_lahir,
    jabatan,
    no_hp
) {

    document.getElementById('editGuruModal')
    .classList.remove('hidden');

    document.getElementById('editGuruModal')
    .classList.add('flex');

    document.getElementById('editGuruForm')
    .action = '/guru/update/' + id;

    document.getElementById('editNama').value = nama;

    document.getElementById('editNip').value = nip;

    document.getElementById('editKode').value = kode;

    document.getElementById('editTempatLahir').value = tempat_lahir;

    document.getElementById('editTanggalLahir').value = tanggal_lahir;

    document.getElementById('editJabatan').value = jabatan;

    document.getElementById('editNoHp').value = no_hp;

}

function closeEditGuruModal() {

    document.getElementById('editGuruModal')
    .classList.remove('flex');

    document.getElementById('editGuruModal')
    .classList.add('hidden');

}

</script>

@endsection