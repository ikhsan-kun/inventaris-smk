@extends('layouts.app')

@section('content')

    <!-- CONTENT -->
    <div class="p-8">

        <!-- HEADER -->
        <header class="flex justify-between items-center mb-24">

            <div>

                <h2 class="text-2xl font-semibold text-slate-800">
                    Daftar Peminjaman
                </h2>

                <p class="text-xs text-slate-400 font-medium">
                    Manajemen peminjaman barang dan aset sekolah
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

                Tambah Peminjam

            </button>

        </header>

        <!-- TABLE -->
        <div class="bg-white rounded-2xl border border-slate-300 overflow-hidden shadow-sm">

            <div class="overflow-x-auto">

                <table class="min-w-full divide-y divide-slate-200">

                    <thead class="bg-[#2f5d50] text-white">

                    <tr class="text-[11px] uppercase font-bold tracking-wide">

                        <th class="px-4 py-3 border border-[#3f7465] text-center text-xs w-[3%]">
                            No
                        </th>

                        <th class="px-4 py-3 border border-[#3f7465] text-left text-xs w-[10%]">
                            Nama Peminjam
                        </th>

                        <th class="px-4 py-3 border border-[#3d6b5e]">
                            Barang / Aset
                        </th>

                        <th class="px-4 py-3 border border-[#3d6b5e]">
                            Lokasi
                        </th>

                        <th class="px-4 py-3 border border-[#3d6b5e]">
                            Kondisi
                        </th>
                        
                        <th class="px-4 py-3 border border-[#3d6b5e]">
                            Tanggal Kembali
                        </th>

                        <th class="px-4 py-3 border border-[#3d6b5e]">
                            Kondisi Kembali
                        </th>

                        <th class="px-4 py-3 border border-[#3d6b5e]">
                            Lokasi Pengembalian
                        </th>

                        <th class="px-4 py-3 border border-[#3d6b5e]">
                            Keterangan Pengembalian
                        </th>

                        <th class="px-4 py-3 border border-[#3d6b5e]">
                            Jumlah
                        </th>

                        <th class="px-4 py-3 border border-[#3d6b5e]">
                            Status
                        </th>

                        <th class="px-4 py-3 border border-[#3d6b5e]">
                            Aksi
                        </th>

                        <th class="px-4 py-3 border border-[#3d6b5e]">
                            Persetujuan
                        </th>

                    </tr>

                    </thead>

                    <tbody class="divide-y divide-slate-100 bg-white">

                    @forelse($peminjaman as $p)

                    <tr class="hover:bg-slate-50 transition-all duration-300">

                        <td class="px-4 py-3 border border-slate-200 text-center text-sm text-slate-500">

                            {{ $loop->iteration }}

                        </td>

                        <td class="px-4 py-3 border border-slate-200">

                            <div class="text-sm font-medium text-slate-700">

                                @if($p->user)
                                    {{ $p->user->name }}
                                @elseif($p->peminjam_tipe == 'guru')
                                    {{ optional($p->guru)->nama }}
                                @elseif($p->peminjam_tipe == 'siswa')
                                    {{ optional($p->siswa)->nama }}
                                @endif

                            </div>

                        </td>

                        <td class="px-4 py-3 border border-slate-200">

                            <div class="text-sm font-medium text-slate-700">

                                @if($p->barang)
                                    {{ $p->barang->nama_barang }}
                                @elseif($p->aset)
                                    {{ $p->aset->nama_aset }}
                                @endif

                            </div>

                        </td>

                        <td class="px-4 py-3 text-xs text-slate-600 border border-slate-200">
                        @if($p->barang)
                            {{ $p->barang->lokasi }}
                        @elseif($p->aset)
                            {{ $p->aset->lokasi }}
                        @endif
                        </td>

                        <td class="px-4 py-3 border border-slate-200 text-sm text-slate-500">

                            {{ $p->kondisi_pinjam }}

                        </td>
                        
                        <td class="px-4 py-3 border border-slate-200 text-sm">
                            {{ $p->tanggal_kembali }}
                        </td>

                        <td class="px-4 py-3 border border-slate-200 text-sm">
                            {{ $p->kondisi_kembali }}
                        </td>

                        <td class="px-4 py-3 text-xs text-slate-600 border border-slate-200">
                            {{ $p->lokasi_pengembalian }}
                        </td>

                        <td class="px-4 py-3 border border-slate-200 text-sm">
                            {{ $p->keterangan_kembali }}
                        </td>

                        <td class="px-4 py-3 border border-slate-200 text-center">

                            <span class="text-sm font-medium text-slate-700">
                                {{ $p->jumlah }}
                            </span>

                        </td>

                        <td class="px-4 py-3 border border-slate-200 text-center">

                            @if($p->status == 'pending')

                                <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs">
                                    Pending
                                </span>

                            @elseif($p->status == 'disetujui')

                                <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs">
                                    Disetujui
                                </span>

                            @elseif($p->status == 'menunggu_verifikasi')

                                <span class="px-3 py-1 bg-orange-100 text-orange-700 rounded-full text-xs">
                                    Menunggu Verifikasi
                                </span>

                            @elseif($p->status == 'dikembalikan')

                                <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs">
                                    Dikembalikan
                                </span>

                            @elseif($p->status == 'ditolak')

                                <span class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-xs">
                                    Ditolak
                                </span>

                            @endif

                        </td>

                        <td class="px-4 py-3 border border-slate-200">

                            <div class="flex justify-center gap-2">

                                <!-- QR -->
                                <button

                                onclick="showQR(

                                '{{ $p->barang ? $p->barang->kode_barang : optional($p->aset)->kode_aset }}',

                                '{{ $p->barang ? $p->barang->nama_barang : optional($p->aset)->nama_aset }}'

                                )"

                                class="cursor-pointer w-8 h-8 rounded-xl
                                bg-[#edf5f2] text-[#2f5d50]
                                hover:bg-[#2f5d50] hover:text-white
                                transition-all duration-300
                                flex items-center justify-center">

                                    <i class="fas fa-qrcode text-sm"></i>

                                </button>

                                <!-- DETAIL -->
                                <button
                                onclick="openDetailPeminjaman(

                                '{{ $p->user ? $p->user->name : ($p->peminjam_tipe == 'guru' ? optional($p->guru)->nama : optional($p->siswa)->nama) }}',

                                '{{ $p->barang ? $p->barang->nama_barang : optional($p->aset)->nama_aset }}',

                                '{{ $p->jumlah }}',

                                '{{ $p->tanggal_pinjam }}',

                                '{{ $p->status }}',

                                '{{ $p->barang ? $p->barang->lokasi : optional($p->aset)->lokasi }}',

                                '{{ $p->barang ? $p->barang->kondisi : optional($p->aset)->kondisi }}',

                                '{{ $p->kondisi_pinjam }}',

                                '{{ $p->keterangan }}',

                                '{{ $p->tanggal_kembali }}',
                                '{{ $p->kondisi_kembali }}',
                                '{{ $p->lokasi_pengembalian }}',
                                '{{ $p->keterangan_kembali }}',
                                '{{ $p->foto_pengembalian ? asset("foto_pengembalian/".$p->foto_pengembalian) : "" }}'

                                )"
                                class="cursor-pointer w-8 h-8 rounded-xl
                                bg-orange-50 text-orange-500
                                hover:bg-orange-500 hover:text-white
                                transition-all duration-300
                                flex items-center justify-center">

                                    <i class="fas fa-eye text-sm"></i>

                                </button>

                                <!-- EDIT -->
                                @if($p->status == 'disetujui')

                                <button
                                onclick="openEditModal('{{ $p->id }}')"
                                class="cursor-pointer w-8 h-8 rounded-xl
                                bg-blue-50 text-blue-500
                                hover:bg-blue-500 hover:text-white
                                transition-all duration-300
                                flex items-center justify-center">

                                    <i class="fas fa-undo text-sm"></i>

                                </button>

                                @endif

                                <!-- HAPUS -->
                                @if($p->status == 'pending')

                                <form action="{{ url('/peminjaman/hapus/'.$p->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                    type="submit"
                                    class="cursor-pointer w-8 h-8 rounded-xl
                                    bg-red-50 text-red-500
                                    hover:bg-red-500 hover:text-white
                                    transition-all duration-300
                                    flex items-center justify-center">

                                        <i class="fas fa-trash text-sm"></i>

                                    </button>

                                </form>

                                @endif
                                
                            </div>

                        </td>
                                
        <td class="px-4 py-3 border border-slate-200">

        @if($p->status == 'pending')

        <div class="flex justify-center gap-2">

            <a href="{{ url('/peminjaman/setujui/'.$p->id) }}"
            class="w-8 h-8 rounded-xl
            bg-green-50 text-green-600
            hover:bg-green-600 hover:text-white
            flex items-center justify-center">

                <i class="fas fa-check"></i>

            </a>

            <a href="{{ url('/peminjaman/tolak/'.$p->id) }}"
            class="w-8 h-8 rounded-xl
            bg-red-50 text-red-600
            hover:bg-red-600 hover:text-white
            flex items-center justify-center">

                <i class="fas fa-times"></i>

            </a>

        </div>

        @elseif($p->status == 'menunggu_verifikasi')

        <div class="flex justify-center gap-2">

            <a href="{{ url('/peminjaman/setujui-pengembalian/'.$p->id) }}"
            class="w-8 h-8 rounded-xl
            bg-green-50 text-green-600
            hover:bg-green-600 hover:text-white
            flex items-center justify-center">

                <i class="fas fa-check"></i>

            </a>

            <a href="{{ url('/peminjaman/tolak-pengembalian/'.$p->id) }}"
            class="w-8 h-8 rounded-xl
            bg-red-50 text-red-600
            hover:bg-red-600 hover:text-white
            flex items-center justify-center">

                <i class="fas fa-times"></i>

            </a>

        </div>

        @endif

        </td>
                        
                    </tr>

                    @empty

                    <tr>

                    <td colspan="13"
                    class="border border-slate-200 text-center py-12 text-slate-300 italic text-sm">
                        Belum ada data peminjaman
                    </td>

                    </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

    </div>
    </div>
    <!-- MODAL -->
    <div id="modalPinjam"
         class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm hidden items-center justify-center z-50">

        <div class="bg-white w-full max-w-sm rounded-2xl shadow-2xl overflow-hidden relative max-h-[85vh] overflow-y-auto p-6">

        <div class="flex justify-between items-center mb-2">

            <h3 class="text-lg font-semibold text-slate-800">
                Form Peminjaman
            </h3>

            <button onclick="closeModal()"
            class="text-slate-400 hover:text-red-500 transition-all duration-300">

                <i class="fas fa-times text-sm"></i>

            </button>

        </div>

        <p class="text-xs text-slate-400 mb-6">
            Tambahkan data peminjaman inventaris
        </p>

            <!-- FORM -->
            <form action="{{ route('peminjaman.store') }}"
            method="POST"
            class="space-y-4">

                @csrf

                <input
                type="hidden"
                name="jenis"
                value="aset">

                <div>

                    <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                        Jenis Peminjam
                    </label>

                    <select
                    id="tipePeminjam"
                    name="peminjam_tipe"
                    onchange="togglePeminjam()"
                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm">

                        <option value="">--- Pilih Jenis ---</option>
                        <option value="guru">Guru / Staff</option>
                        <option value="siswa">Siswa</option>

                    </select>

                </div>

                <!-- GURU -->
                <div id="guruWrapper" class="hidden">

                    <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                        Guru / Staff
                    </label>

                    <select
                    name="guru_id"
                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm">

                        <option value="">
                            --- Pilih Guru ---
                        </option>

                        @foreach($gurus as $g)

                            <option value="{{ $g->id }}">
                                {{ $g->nama }}
                            </option>

                        @endforeach

                    </select>

                </div>

                <!-- SISWA -->
                <div id="siswaWrapper" class="hidden">

                    <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                        Siswa
                    </label>

                    <select
                    name="siswa_id"
                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm">

                        <option value="">
                            --- Pilih Siswa ---
                        </option>

                        @foreach($siswas as $s)

                            <option value="{{ $s->id }}">
                                {{ $s->nama }}
                            </option>

                        @endforeach

                    </select>

                </div>

                <!-- PILIH ASET -->
                <div id="asetWrapper">

                    <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                        Pilih Aset
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
                                (Stok: {{ $a->stok }})
                            </option>

                        @endforeach

                    </select>

                </div>

                <div>

                    <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                        Jumlah
                    </label>

                    <input type="number"
                           name="jumlah"
                           class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all"
                           placeholder="0"
                           required>

                </div>

                <!-- TANGGAL DIPINJAM -->
                <div>

                    <label
                    class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">

                        Tanggal Dipinjam

                    </label>

                    <input
                    type="date"
                    name="tanggal_pinjam"
                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm"
                    required>

                </div>

                <!-- KONDISI SAAT DIPINJAM -->
                <div>

                    <label
                    class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">

                        Kondisi Saat Dipinjam

                    </label>

                    <select
                    name="kondisi_pinjam"
                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm"
                    required>

                        <option value="">
                            --- Pilih Kondisi ---
                        </option>

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

                </div>

                <!-- KETERANGAN -->
                <div>

                    <label
                    class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">

                        Keterangan

                    </label>

                    <textarea
                    name="keterangan"
                    rows="3"
                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm"
                    placeholder="Masukkan keterangan peminjaman"></textarea>

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

<!-- SCRIPT -->
<script>
function openEditModal(id)
{
    document.getElementById('editId').value = id;

    document.getElementById('editModal')
        .classList.remove('hidden');

    document.getElementById('editModal')
        .classList.add('flex');
}

function closeEditModal()
{
    document.getElementById('editModal')
        .classList.remove('flex');

    document.getElementById('editModal')
        .classList.add('hidden');
}

function openModal() {
    document.getElementById('modalPinjam')
    .classList.replace('hidden', 'flex');
}

function closeModal() {
    document.getElementById('modalPinjam')
    .classList.replace('flex', 'hidden');
}

function toggleAnggotaMenu() {

    const menu = document.getElementById('anggotaMenu');

    menu.classList.toggle('hidden');

}

function togglePeminjam()
{
    let tipe =
        document.getElementById('tipePeminjam').value;

    let guru =
        document.getElementById('guruWrapper');

    let siswa =
        document.getElementById('siswaWrapper');

    if (tipe === 'guru')
    {
        guru.classList.remove('hidden');
        siswa.classList.add('hidden');
    }
    else if (tipe === 'siswa')
    {
        siswa.classList.remove('hidden');
        guru.classList.add('hidden');
    }
    else
    {
        guru.classList.add('hidden');
        siswa.classList.add('hidden');
    }
}

function openDetailPeminjaman(
nama,
barang,
jumlah,
tanggal,
status,
lokasi,
kondisi,
kondisiPinjam,
keterangan,

tanggalKembali,
kondisiKembali,
lokasiPengembalian,
keteranganKembali,
foto
)
{
    document.getElementById('dNama').innerText = nama;
    document.getElementById('dBarang').innerText = barang;
    document.getElementById('dJumlah').innerText = jumlah;
    document.getElementById('dTanggal').innerText = tanggal;
    document.getElementById('dStatus').innerText = status;
    document.getElementById('dLokasi').innerText = lokasi;
    document.getElementById('dKondisi').innerText = kondisi;
    document.getElementById('dKondisiPinjam').innerText = kondisiPinjam;
    document.getElementById('dKeterangan').innerText = keterangan;
    document.getElementById('dTanggalKembali').innerText =
        tanggalKembali;

    document.getElementById('dKondisiKembali').innerText =
        kondisiKembali;

    document.getElementById('dLokasiPengembalian').innerText =
        lokasiPengembalian;

    document.getElementById('dKeteranganKembali').innerText =
        keteranganKembali;

    if(foto)
    {
        document.getElementById('dFoto').src = foto;

        document.getElementById('dFoto')
            .style.display = 'block';
    }
    else
    {
        document.getElementById('dFoto')
            .style.display = 'none';
    }

    document.getElementById('detailModalPeminjaman')
        .classList.remove('hidden');

    document.getElementById('detailModalPeminjaman')
        .classList.add('flex');
}

function closeDetailPeminjaman()
{
    document.getElementById('detailModalPeminjaman')
        .classList.remove('flex');

    document.getElementById('detailModalPeminjaman')
        .classList.add('hidden');
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

</script>

<!-- DETAIL MODAL PEMINJAMAN -->
<div id="detailModalPeminjaman"
class="hidden fixed inset-0 bg-black/30 backdrop-blur-sm z-50 items-center justify-center p-6">

<div class="bg-white w-full max-w-sm rounded-2xl
shadow-2xl relative
max-h-[80vh] overflow-y-auto">

        <!-- Tombol Close -->
        <button
        onclick="closeDetailPeminjaman()"
        class="absolute top-5 right-5 text-slate-400 hover:text-red-500 transition-all duration-300">

            <i class="fas fa-times text-sm text-slate-500 mt-1"></i>

        </button>

        <div class="p-6">

            <h3 class="text-lg font-semibold text-slate-800">
                Detail Peminjaman
            </h3>

            <p class="text-xs text-slate-400 mb-6">
                Informasi lengkap peminjaman
            </p>

            <div class="grid grid-cols-2 gap-y-4 gap-x-6 text-sm text-slate-700">

                <div class="font-medium text-slate-600">
                    Nama Peminjam
                </div>

                <div id="dNama">-</div>

                <div class="font-medium text-slate-600">
                    Barang / Aset
                </div>

                <div id="dBarang">-</div>

                <div class="font-medium text-slate-600">
                    Jumlah
                </div>

                <div id="dJumlah">-</div>

                <div class="font-medium text-slate-600">
                    Tanggal Dipinjam
                </div>

                <div id="dTanggal">-</div>

                <div class="font-medium text-slate-600">
                    Status
                </div>

                <div id="dStatus">-</div>

                <div class="font-medium text-slate-600">
                    Lokasi
                </div>

                <div id="dLokasi">-</div>

                <div class="font-medium text-slate-600">
                    Kondisi Barang
                </div>

                <div id="dKondisi">-</div>

                <div class="font-medium text-slate-600">
                    Kondisi Saat Dipinjam
                </div>

                <div id="dKondisiPinjam">-</div>

                <div class="font-medium text-slate-600">
                    Keterangan
                </div>

                <div id="dKeterangan">-</div>

                <div class="font-medium text-slate-600">
                    Tanggal Kembali
                </div>

                <div id="dTanggalKembali">-</div>

                <div class="font-medium text-slate-600">
                    Kondisi Kembali
                </div>

                <div id="dKondisiKembali">-</div>

                <div class="font-medium text-slate-600">
                    Lokasi Pengembalian
                </div>

                <div id="dLokasiPengembalian">-</div>

                <div class="font-medium text-slate-600">
                    Keterangan Pengembalian
                </div>

                <div id="dKeteranganKembali">-</div>

            </div>

            <div class="mt-6">

                <label class="block text-sm font-medium text-slate-600 mb-2">
                    Foto Pengembalian
                </label>

                <img id="dFoto"
                    src=""
                    class="w-full rounded-xl border border-slate-200">

            </div>

            <div class="mt-6">

                <button
                onclick="closeDetailPeminjaman()"
                class="w-full py-2.5 bg-[#2f5d50] text-white rounded-xl font-medium text-sm hover:bg-[#23463c] transition-all">

                    Tutup

                </button>

            </div>

        </div>

    </div>

</div>

<!-- MODAL QR -->
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
            QR Barang / Aset
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

<div id="editModal"
class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm hidden items-center justify-center z-50">

    <div class="bg-white w-full max-w-sm rounded-2xl shadow-2xl overflow-hidden relative max-h-[85vh] overflow-y-auto p-6">

        <div class="flex justify-between items-center mb-2">

            <h3 class="text-lg font-semibold text-slate-800">
                Form Pengembalian
            </h3>

            <button onclick="closeEditModal()"
            class="text-slate-400 hover:text-red-500 transition-all duration-300">

                <i class="fas fa-times text-sm"></i>

            </button>

        </div>

        <p class="text-xs text-slate-400 mb-6">
            Lengkapi data pengembalian inventaris
        </p>

        <form method="POST"
        action="{{ url('/peminjaman/pengembalian') }}"
        enctype="multipart/form-data"
        class="space-y-4">

            @csrf

            <input
            type="hidden"
            name="id"
            id="editId">

            <div class="mb-4">

                <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                    Tanggal Dikembalikan
                </label>

                <input
                type="date"
                name="tanggal_kembali"
                required
                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm">

            </div>

            <div class="mb-4">

                <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                    Kondisi Saat Dikembalikan
                </label>

                <select
                name="kondisi_kembali"
                required
                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm">

                    <option value="">--- Pilih Kondisi Saat Dikembalikan ---</option>

                    <option value="Baik">Baik</option>

                    <option value="Rusak Ringan">
                        Rusak Ringan
                    </option>

                    <option value="Rusak Berat">
                        Rusak Berat
                    </option>

                </select>

            </div>

            <div class="mb-4">

                <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                    Lokasi Pengembalian
                </label>

                <select
                name="lokasi_pengembalian"
                required
                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm">

                    <option value="">
                        --- Pilih Lokasi Pengembalian ---
                    </option>

                    @foreach($ruangans as $ruangan)

                        <option value="{{ $ruangan->nama_ruangan }}">
                            {{ $ruangan->nama_ruangan }}
                        </option>

                    @endforeach

                </select>

            </div>

        <div class="mb-4">

            <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                Jumlah Pengembalian
            </label>

            <input
            type="number"
            name="jumlah_kembali"
            min="1"
            required
            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm">

        </div>

        <div class="mb-4">

            <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                Foto Bukti Pengembalian
            </label>

            <input
            type="file"
            name="foto_pengembalian"
            accept="image/*"
            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm">

        </div>

            <div class="mb-4">

                <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                    Keterangan Pengembalian

                </label>

                <textarea
                name="keterangan_kembali"
                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm"></textarea>

            </div>

            <div class="flex gap-3 pt-2">

                <button
                type="submit"
                class="flex-1 py-2.5 bg-[#2f5d50]
                text-white rounded-xl font-medium text-sm
                hover:bg-[#23463c] transition-all">

                    Simpan Pengembalian

                </button>

                <button
                type="button"
                onclick="closeEditModal()"
                class="flex-1 bg-slate-200 hover:bg-slate-300
                py-2 rounded-xl font-medium text-sm">

                    Batal

                </button>

            </div>

        </form>

    </div>

</div>
@endsection