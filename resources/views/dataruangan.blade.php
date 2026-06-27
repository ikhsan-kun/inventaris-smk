@extends('layouts.app')

@section('content')

    <!-- CONTENT -->
    <div class="p-8">

        <!-- HEADER -->
        <header class="flex justify-between items-center mb-24">

            <div>

                <h2 class="text-2xl font-semibold text-slate-800">
                    Data Ruangan
                </h2>

                <p class="text-xs text-slate-400 font-medium">
                    Daftar ruangan dan laboratorium SMK Al-Irsyad
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

                Tambah Ruangan

            </button>
        </header>

        <!-- TABLE -->
        <div class="bg-white rounded-2xl border border-slate-300 overflow-hidden shadow-sm">

            <div class="overflow-x-auto">

                <table class="min-w-full divide-y divide-slate-200">

                    <thead class="bg-[#2f5d50] text-white">

                        <tr class="text-[11px] uppercase font-bold tracking-wide">

                            <th class="px-4 py-3 border border-[#3d6b5e]">Nama Ruangan</th>

                            <th class="px-4 py-3 border border-[#3d6b5e]">Penanggung Jawab</th>

                            <th class="px-4 py-3 border border-[#3d6b5e]">Kapasitas</th>

                            <th class="px-4 py-3 border border-[#3d6b5e]">Aksi</th>

                        </tr>

                    </thead>

                    <tbody class="divide-y divide-slate-100 card-modern">

                    @foreach($ruangans as $ruangan)

                    <tr class="hover:bg-slate-50 transition">

                        <td class="px-4 py-3 border border-slate-200 text-xs font-medium text-slate-700">

                            {{ $ruangan->nama_ruangan }}

                        </td>

                        <td class="px-4 py-3 border border-slate-200 text-xs text-slate-400">

                            {{ $ruangan->penanggung_jawab }}

                        </td>

                        <td class="px-4 py-3 border border-slate-200 text-xs text-slate-400">

                            {{ $ruangan->kapasitas }}

                        </td>

                        <td class="px-4 py-3 border border-slate-200">

                            <div class="flex items-center gap-2">

                                <!-- QR -->
                                <button
                                onclick="openQRModal(
                                '{{ $ruangan->id }}',
                                '{{ $ruangan->nama_ruangan }}'
                                )"
                                class="w-8 h-8 rounded-xl
                                bg-[#edf5f2]
                                text-[#2f5d50]
                                hover:bg-[#2f5d50]
                                hover:text-white
                                transition-all text-xs">

                                    <i class="fas fa-qrcode"></i>

                                </button>

                                <!-- EDIT -->
                                <button
                                onclick="openEditModal{{ $ruangan->id }}()"
                                class="w-8 h-8 rounded-xl bg-orange-50 text-orange-500 hover:bg-orange-500 hover:text-white transition-all text-xs">

                                    <i class="fas fa-pen"></i>

                                </button>

                                <!-- HAPUS -->
                                <form action="{{ route('ruangan.hapus', $ruangan->id) }}"
                                    method="POST">

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

                    @endforeach

                    </tbody>

                </table>

            </div>

        </div>

</div>
        <!-- MODAL -->
        <div id="modalRuangan"
            class="hidden fixed inset-0 bg-black/20 backdrop-blur-[2px] flex items-center justify-center p-4 z-50 overflow-y-auto">

            <div class="bg-white w-full max-w-sm rounded-2xl
                shadow-2xl overflow-hidden relative
                max-h-[85vh] overflow-y-auto">

            <button onclick="closeModal()"
                    class="absolute top-5 right-5 text-slate-400 hover:text-red-500 transition-all duration-300">

                <i class="fas fa-times text-sm text-slate-500 mt-1"></i>

            </button>

                <!-- HEADER -->
                <div class="p-6">

                    <h3 class="text-lg font-semibold text-slate-800">
                        Tambah Ruangan
                    </h3>

                    <p class="text-xs text-slate-400 mb-6">
                        Tambahkan data ruangan sekolah
                    </p>

                    <!-- FORM -->
                    <form action="{{ route('ruangan.simpan') }}"
                    method="POST"
                    class="space-y-4">

                    @csrf

                    <!-- NAMA -->
                    <div>

                        <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                            Nama Ruangan
                        </label>

                        <input type="text"
                            name="nama_ruangan"
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                    </div>

                    <!-- KODE -->
                    <div>

                        <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                            Kode Ruangan
                        </label>

                        <input type="text"
                            name="kode_ruangan"
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                    </div>

                    <!-- PJ -->
                    <div>

                        <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                            Penanggung Jawab
                        </label>

                        <select name="penanggung_jawab"
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                            <option value="">--- Pilih Penanggung Jawab ---</option>

                            <option value="Guru">Guru</option>
                            
                            <option value="Staff">Staff</option>

                        </select>

                    </div>

                    <!-- KAPASITAS -->
                    <div>

                        <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                            Kapasitas
                        </label>

                        <input type="number"
                            name="kapasitas"
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                    </div>

                    <!-- LOKASI -->
                    <div>

                        <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                            Lokasi Gedung
                        </label>

                        <select name="lokasi"
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                            <option value="">--- Pilih Lokasi Gedung ---</option>
                            
                            <option value="Gedung A">Gedung A</option>

                            <option value="Gedung B">Gedung B</option>
                            
                            <option value="Gedung C">Gedung C</option>

                        </select>

                    </div>

                    <!-- JENIS -->
                    <div>

                        <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                            Jenis Ruangan
                        </label>

                        <select name="jenis"
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                            <option value="">--- Pilih Jenis Ruangan ---</option>

                            <option value="Laboratorium">Laboratorium</option>
                            
                            <option value="Kelas">Kelas</option>
                            
                            <option value="Gudang">Gudang</option>
                            
                            <option value="Kantor">Kantor</option>

                        </select>

                    </div>

                    <!-- DESKRIPSI -->
                    <div>

                        <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                            Deskripsi
                        </label>

                        <textarea rows="3"
                        name="deskripsi"
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all"></textarea>

                    </div>

                    <!-- BUTTON -->
                    <div class="flex gap-3 pt-2">

                        <button type="submit"
                        class="flex-1 py-2.5 bg-[#2f5d50] text-white rounded-xl font-medium text-sm hover:bg-[#23463c] transition-all">

                            Simpan Ruangan

                        </button>

                        <button type="button"
                        onclick="closeModal()"
                        class="flex-1 bg-slate-200 hover:bg-slate-300 py-2 rounded-xl font-medium text-sm">

                            Batal

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>
@foreach($ruangans as $ruangan)

<!-- MODAL EDIT -->
<div id="editModal{{ $ruangan->id }}"
class="fixed inset-0 bg-black/30 backdrop-blur-sm
hidden items-center justify-center z-50 p-6">

    <div class="bg-white w-full max-w-sm rounded-2xl
    shadow-2xl overflow-hidden relative
    max-h-[85vh] overflow-y-auto">

        <!-- CLOSE -->
        <button
        onclick="closeEditModal{{ $ruangan->id }}()"
        class="absolute top-5 right-5 text-slate-400 hover:text-red-500 transition-all duration-300">

            <i class="fas fa-times text-sm text-slate-500 mt-1"></i>

        </button>

        <div class="p-6">

            <!-- TITLE -->
            <h3 class="text-lg font-semibold text-slate-800">
                Edit Ruangan
            </h3>

            <p class="text-xs text-slate-400 mb-6">
                Update data ruangan sekolah
            </p>

            <!-- FORM -->
            <form action="{{ route('ruangan.update', $ruangan->id) }}"
            method="POST"
            class="space-y-4">

                @csrf
                @method('PUT')

                <!-- NAMA RUANGAN -->
                <div>

                    <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                        Nama Ruangan
                    </label>

                    <input
                    type="text"
                    name="nama_ruangan"
                    value="{{ $ruangan->nama_ruangan }}"
                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                </div>

                <!-- KODE RUANGAN -->
                <div>

                    <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                        Kode Ruangan
                    </label>

                    <input
                    type="text"
                    name="kode_ruangan"
                    value="{{ $ruangan->kode_ruangan }}"
                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                </div>

                <!-- PENANGGUNG JAWAB -->
                <div>

                    <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                        Penanggung Jawab
                    </label>

                    <select
                    name="penanggung_jawab"
                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                        <option value="">--- Pilih Penanggung Jawab ---</option>

                        <option value="Guru"
                        {{ $ruangan->penanggung_jawab == 'Guru' ? 'selected' : '' }}>
                            Guru
                        </option>

                        <option value="Staff"
                        {{ $ruangan->penanggung_jawab == 'Staff' ? 'selected' : '' }}>
                            Staff
                        </option>

                    </select>

                </div>

                <!-- KAPASITAS -->
                <div>

                    <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                        Kapasitas
                    </label>

                    <input
                    type="number"
                    name="kapasitas"
                    value="{{ $ruangan->kapasitas }}"
                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                </div>

                <!-- LOKASI -->
                <div>

                    <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                        Lokasi Gedung
                    </label>

                    <select
                    name="lokasi"
                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                        <option value="">--- Pilih Lokasi Gedung ---</option>
                    
                        <option value="Gedung A"
                        {{ $ruangan->lokasi == 'Gedung A' ? 'selected' : '' }}>
                            Gedung A
                        </option>

                        <option value="Gedung B"
                        {{ $ruangan->lokasi == 'Gedung B' ? 'selected' : '' }}>
                            Gedung B
                        </option>

                        <option value="Gedung C"
                        {{ $ruangan->lokasi == 'Gedung C' ? 'selected' : '' }}>
                            Gedung C
                        </option>

                    </select>

                </div>

                <!-- JENIS -->
                <div>

                    <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                        Jenis Ruangan
                    </label>

                    <select
                    name="jenis"
                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                        <option value="">--- Pilih Jenis Ruangan ---</option>

                        <option value="Laboratorium"
                        {{ $ruangan->jenis == 'Laboratorium' ? 'selected' : '' }}>
                            Laboratorium
                        </option>

                        <option value="Kelas"
                        {{ $ruangan->jenis == 'Kelas' ? 'selected' : '' }}>
                            Kelas
                        </option>

                        <option value="Gudang"
                        {{ $ruangan->jenis == 'Gudang' ? 'selected' : '' }}>
                            Gudang
                        </option>

                        <option value="Kantor"
                        {{ $ruangan->jenis == 'Kantor' ? 'selected' : '' }}>
                            Kantor
                        </option>

                    </select>

                </div>

                <!-- BUTTON -->
                <div class="flex gap-3 pt-2">

                    <button type="submit"
                    class="flex-1 py-2.5 bg-[#2f5d50] text-white rounded-xl font-medium text-sm hover:bg-[#23463c] transition-all">

                        Simpan Perubahan

                    </button>

                    <button type="button"
                    onclick="closeEditModal{{ $ruangan->id }}()"
                    class="flex-1 py-2.5 bg-slate-200 text-slate-700 rounded-xl font-medium text-sm hover:bg-slate-300 transition-all">

                        Batal

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<script>

function openEditModal{{ $ruangan->id }}() {

    document
        .getElementById('editModal{{ $ruangan->id }}')
        .classList.remove('hidden');

    document
        .getElementById('editModal{{ $ruangan->id }}')
        .classList.add('flex');

}

function closeEditModal{{ $ruangan->id }}() {

    document
        .getElementById('editModal{{ $ruangan->id }}')
        .classList.remove('flex');

    document
        .getElementById('editModal{{ $ruangan->id }}')
        .classList.add('hidden');

}

</script>

@endforeach
<script>

function openModal() {

    document
        .getElementById('modalRuangan')
        .classList.remove('hidden');

}

function closeModal() {

    document
        .getElementById('modalRuangan')
        .classList.add('hidden');

}

    function toggleAnggotaMenu() {

    const menu = document.getElementById('anggotaMenu');

    menu.classList.toggle('hidden');

}

function openQRModal(id,nama)
{
    document
    .getElementById('qrModal')
    .classList.remove('hidden');

    document
    .getElementById('qrRuanganNama')
    .innerText = nama;

    document
    .getElementById('qrcodeRuangan')
    .innerHTML = '';

    new QRCode(
        document.getElementById('qrcodeRuangan'),
        {
            text:
            window.location.origin +
            '/ruangan/' +
            id,

            width:200,
            height:200
        }
    );
}

function closeQRModal()
{
    document
    .getElementById('qrModal')
    .classList.add('hidden');
}

function printQR()
{
    let nama =
        document.getElementById('qrRuanganNama').innerText;

    let qr =
        document.getElementById('qrcodeRuangan').innerHTML;

    let win =
        window.open('', '', 'width=800,height=600');

    win.document.write(`
        <html>
        <head>
            <title>Cetak QR Ruangan</title>

            <style>

                body{
                    font-family: Arial, sans-serif;
                    text-align:center;
                    padding-top:40px;
                }

                h2{
                    margin-bottom:20px;
                }

                img{
                    width:250px;
                    height:250px;
                }

            </style>

        </head>

        <body>

            <div style="
                width:300px;
                margin:auto;
                border:1px solid #ddd;
                padding:20px;
                border-radius:10px;
            ">

                <h3>SMK Al-Irsyad</h3>

                ${qr}

                <p style="margin-top:15px;font-weight:bold;">
                    ${nama}
                </p>

            </div>

        </body>

        </html>
    `);

    win.document.close();

    win.focus();

    setTimeout(() => {

        win.print();

        win.close();

    }, 500);
}

</script>

<div id="qrModal"
class="hidden fixed inset-0 bg-black/20 backdrop-blur-[2px]
flex items-center justify-center p-4 z-50">

    <div class="bg-white w-full max-w-sm rounded-2xl p-6 shadow-xl relative">

        <button
        onclick="closeQRModal()"
        class="absolute top-4 right-4 text-slate-400 hover:text-red-500">

            <i class="fas fa-times"></i>

        </button>

        <h2 class="text-lg font-semibold text-slate-800 mb-2">
            QR Ruangan
        </h2>

        <p
        id="qrRuanganNama"
        class="text-xs text-slate-400 mb-4">
        </p>

        <div
        id="qrcodeRuangan"
        class="flex justify-center">
        </div>

        <button
        onclick="printQR()"
        class="w-full mt-5 py-2.5 bg-[#2f5d50]
        text-white rounded-xl font-medium text-sm
        hover:bg-[#23463c] transition-all">

            Cetak QR

        </button>

    </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
@endsection