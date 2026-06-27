@extends('layouts.app')

@section('content')

<!-- CONTENT -->
<div class="p-8">

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-20">

        <div>

            <h1 class="text-2xl font-semibold text-slate-800">
                Data Siswa
            </h1>

            <p class="text-sm text-slate-400 mt-2">
                Kelola data siswa sekolah
            </p>

        </div>

        <!-- BUTTON -->
        <button onclick="openSiswaModal()"
        class="bg-[#2f5d50] hover:bg-[#3b6e60]
        transition-all duration-300
        text-white text-sm font-medium
        px-4 py-2 rounded-xl
        shadow-sm shadow-slate-200/50
        flex items-center gap-2">

            <i class="fas fa-plus"></i>

            Tambah Siswa

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
                            Nama Siswa
                        </th>

                        <th class="px-4 py-3 border border-[#3f7465] text-left text-xs">
                            NIS
                        </th>

                        <th class="px-4 py-3 border border-[#3f7465] text-left text-xs">
                            Kelas
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

                    @forelse($siswas as $index => $siswa)

                    <tr class="hover:bg-slate-50 transition-all duration-300">

                        <td class="px-4 py-3 border border-slate-200 text-center text-sm text-slate-500">
                            {{ $index + 1 }}
                        </td>

                        <!-- NAMA -->
                        <td class="px-4 py-3 border border-slate-200">

                            <div class="text-sm font-medium text-slate-700">
                                {{ $siswa->nama }}
                            </div>

                        </td>

                        <!-- NIS -->
                        <td class="px-4 py-3 border border-slate-200">

                            <span class="text-sm text-slate-500">
                                {{ $siswa->nis }}
                            </span>

                        </td>

                        <!-- KELAS -->
                        <td class="px-4 py-3 border border-slate-200">

                            <span class="bg-[#edf7f3] text-[#2f5d50]
                            text-xs font-medium px-3 py-1.5 rounded-full">

                                {{ $siswa->kelas }}

                            </span>

                        </td>

                        <!-- NO HP -->
                        <td class="px-4 py-3 border border-slate-200">

                            <span class="text-sm text-slate-500">
                                {{ $siswa->no_hp }}
                            </span>

                        </td>

                        <!-- AKSI -->
                        <td class="px-4 py-3 border border-slate-200">

                            <div class="flex items-center gap-2">

                                <!-- EDIT -->
                                <button

                                onclick="openEditSiswaModal(
                                '{{ $siswa->id }}',
                                '{{ $siswa->nama }}',
                                '{{ $siswa->nis }}',
                                '{{ $siswa->kelas }}',
                                '{{ $siswa->no_hp }}'
                                )"

                                class="w-8 h-8 rounded-xl
                                bg-orange-50 text-orange-500
                                hover:bg-orange-500 hover:text-white
                                transition-all duration-300">

                                    <i class="fas fa-pen text-sm"></i>

                                </button>

                                <!-- DELETE -->
                                <form action="{{ route('siswa.hapus', $siswa->id) }}"
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

                        <td colspan="6"
                        class="border border-slate-200 text-center py-12 text-slate-300 italic text-sm">

                            Belum ada data siswa terdaftar.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

<!-- POPUP TAMBAH SISWA -->
<div id="siswaModal"
class="fixed inset-0 bg-black/30 backdrop-blur-sm
hidden items-center justify-center z-50 p-6">

    <div class="bg-white w-full max-w-sm rounded-2xl
    shadow-2xl overflow-hidden relative
    max-h-[85vh] overflow-y-auto">

        <!-- CLOSE -->
        <button onclick="closeSiswaModal()"
        class="absolute top-5 right-5 text-slate-400 hover:text-red-500 transition-all duration-300">

            <i class="fas fa-times text-sm text-slate-500 mt-1"></i>

        </button>

        <div class="p-6">

            <h3 class="text-lg font-semibold text-slate-800">
                Tambah Siswa
            </h3>

            <p class="text-xs text-slate-400 mb-6">
                Tambahkan data siswa sekolah
            </p>

            <!-- FORM -->
            <form action="{{ route('siswa.store') }}"
            method="POST"
            class="space-y-4">

                @csrf

                <!-- NAMA -->
                <div>

                    <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                        Nama Siswa
                    </label>

                    <input type="text"
                    name="nama"
                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                </div>

                <!-- NIS -->
                <div>

                    <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                        NIS
                    </label>

                    <input type="text"
                    name="nis"
                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                </div>

                <!-- KELAS -->
                <div>

                    <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                        Kelas
                    </label>

                    <input type="text"
                    name="kelas"
                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

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

                        Simpan Data

                    </button>

                    <button type="button"
                    onclick="closeSiswaModal()"
                    class="flex-1 py-2.5 bg-slate-200 text-slate-700 rounded-xl font-medium text-sm hover:bg-slate-300 transition-all">

                        Batal

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<!-- POPUP EDIT SISWA -->
<div id="editSiswaModal"
class="fixed inset-0 bg-black/30 backdrop-blur-sm
hidden items-center justify-center z-50 p-6">

    <div class="bg-white w-full max-w-sm rounded-2xl
    shadow-2xl overflow-hidden relative
    max-h-[85vh] overflow-y-auto">

        <button onclick="closeEditSiswaModal()"
        class="absolute top-5 right-5 text-slate-400 hover:text-red-500 transition-all duration-300">

            <i class="fas fa-times text-sm text-slate-500 mt-1"></i>

        </button>

        <div class="p-6">

            <h3 class="text-lg font-semibold text-slate-800">
                Edit Siswa
            </h3>

            <p class="text-xs text-slate-400 mb-6">
                Update data siswa
            </p>

        <form id="editSiswaForm"
        action=""
        method="POST"
        class="space-y-4">

            @csrf
            @method('PUT')

            <!-- NAMA -->
            <div>

                <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                    Nama Siswa
                </label>

                <input
                type="text"
                id="editNama"
                name="nama"
                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

            </div>

            <!-- NIS -->
            <div>

                <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                    NIS
                </label>

                <input
                type="text"
                id="editNis"
                name="nis"
                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

            </div>

            <!-- KELAS -->
            <div>

                <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                    Kelas
                </label>

                <input
                type="text"
                id="editKelas"
                name="kelas"
                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

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
                onclick="closeEditSiswaModal()"
                class="flex-1 py-2.5 bg-slate-200 text-slate-700 rounded-xl font-medium text-sm hover:bg-slate-300 transition-all">

                    Batal

                </button>

            </div>

        </form>

        </div>

    </div>

</div>

<script>

function openSiswaModal() {

    document.getElementById('siswaModal')
    .classList.remove('hidden');

    document.getElementById('siswaModal')
    .classList.add('flex');

}

function closeSiswaModal() {

    document.getElementById('siswaModal')
    .classList.remove('flex');

    document.getElementById('siswaModal')
    .classList.add('hidden');

}

function openEditSiswaModal(
    id,
    nama,
    nis,
    kelas,
    no_hp
) {

    document.getElementById('editSiswaModal')
    .classList.remove('hidden');

    document.getElementById('editSiswaModal')
    .classList.add('flex');

    document.getElementById('editSiswaForm')
    .action = '/siswa/update/' + id;

    document.getElementById('editNama').value = nama;

    document.getElementById('editNis').value = nis;

    document.getElementById('editKelas').value = kelas;

    document.getElementById('editNoHp').value = no_hp;

}

function closeEditSiswaModal() {

    document.getElementById('editSiswaModal')
    .classList.remove('flex');

    document.getElementById('editSiswaModal')
    .classList.add('hidden');

}

</script>

@endsection