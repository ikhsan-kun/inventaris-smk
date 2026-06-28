@php
    $no = 1;
@endphp

<!DOCTYPE html>

<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Riwayat Peminjaman</title>

<script src="https://cdn.tailwindcss.com"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

<style>

    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');

    body{
        font-family:'Plus Jakarta Sans',sans-serif;

        background:
        radial-gradient(circle at top left,
        #edf5f2 0%,
        #f8fafc 45%,
        #f1f5f9 100%);
    }

</style>

</head>

<body class="min-h-screen p-6">

<div class="w-full">

<!-- HEADER -->
<div class="flex justify-between items-center mb-24">

    <div>

        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-xl border border-[#dce8e3] bg-white mb-4">

            <span class="w-2 h-2 rounded-full bg-[#2f5d50]"></span>

            <span class="text-xs font-semibold tracking-wider text-slate-500 uppercase">
                Inventaris Sekolah
            </span>

        </div>

        <h1 class="text-2xl font-semibold text-slate-800">
            Riwayat Peminjaman
        </h1>

        <p class="text-slate-400 mt-2 text-sm">
            Daftar seluruh peminjaman yang pernah diajukan.
        </p>

    </div>

    <div class="flex items-center gap-3">

        <div class="relative">

            <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>

            <input
            type="text"
            placeholder="Cari riwayat..."
            class="pl-10 pr-4 py-2
            w-64
            rounded-xl
            border border-slate-200
            bg-white
            text-sm">

        </div>

            <a href="/dashboard-peminjam"
            class="bg-[#2f5d50]
            hover:bg-[#3f7465]
            text-white
            px-4 py-2
            rounded-xl
            text-sm
            font-semibold
            flex items-center gap-2">

            <i class="fas fa-arrow-left"></i>

            Kembali

        </a>

    </div>

</div>

<!-- TABLE -->
<div class="bg-white rounded-2xl border border-slate-300 overflow-hidden shadow-sm">

    <div class="overflow-x-auto">

        <table class="min-w-full divide-y divide-slate-200">

            <thead class="bg-[#2f5d50] text-white">

                <tr class="text-[11px] uppercase font-bold tracking-wide">

            <th class="px-4 py-3 border border-[#3f7465] text-center text-xs w-[3%]">
                No
            </th>

            <th class="px-4 py-3 border border-[#3f7465] text-center text-xs w-[7%]">
                Tanggal Dipinjam
            </th>

            <th class="px-4 py-3 border border-[#3f7465] text-center text-xs w-[10%]">
                Nama Barang
            </th>

            <th class="px-4 py-3 border border-[#3f7465] text-center text-xs w-[7%]">
                Lokasi
            </th>

            <th class="px-4 py-3 border border-[#3f7465] text-center text-xs w-[5%]">
                Kondisi
            </th>

            <th class="px-4 py-3 border border-[#3f7465] text-center text-xs w-[7%]">
                Tanggal Kembali
            </th>

            <th class="px-4 py-3 border border-[#3f7465] text-center text-xs w-[5%]">
                Kondisi Kembali
            </th>

            <th class="px-4 py-3 border border-[#3f7465] text-center text-xs w-[10%]">
                Lokasi Pengembalian
            </th>

           <th class="px-4 py-3 border border-[#3f7465] text-center text-xs w-[10%]">
                Keterangan Pengembalian
            </th>

            <th class="px-4 py-3 border border-[#3f7465] text-center text-xs w-[5%]">
                Jumlah
            </th>

            <th class="px-4 py-3 border border-[#3f7465] text-center text-xs w-[10%]">
                Status
            </th>

            <th class="px-4 py-3 border border-[#3f7465] text-center text-xs min-w-[100px]">
                Aksi
            </th>

        </tr>

    </thead>

<tbody class="divide-y divide-slate-100 bg-white">

            @forelse($riwayat as $item)

            <tr class="hover:bg-slate-50 transition-all duration-300">

                <td class="px-4 py-3 border border-slate-200 text-center text-sm text-slate-500">
                    {{ $no++ }}
                </td>

                <td class="px-4 py-3 border border-slate-200 text-sm">
                    {{ $item->tanggal_pinjam }}
                </td>

                <td class="px-4 py-3 border border-slate-200">

                    <div class="text-sm font-medium text-slate-700">
                        @if($item->jenis == 'barang')
                            {{ optional($item->barang)->nama_barang ?? '-' }}
                        @else
                            {{ optional($item->aset)->nama_aset ?? '-' }}
                        @endif
                    </div>

                </td>

                <td class="px-4 py-3 border border-slate-200 text-sm text-slate-600">
                    @if($item->jenis == 'barang')
                        {{ optional($item->barang)->lokasi ?? '-' }}
                    @else
                        {{ optional($item->aset)->lokasi ?? '-' }}
                    @endif
                </td>

                <td class="px-4 py-3 border border-slate-200 text-sm text-slate-500">
                    {{ $item->kondisi_pinjam }}
                </td>

                <td class="px-4 py-3 border border-slate-200 text-sm">
                    {{ $item->tanggal_kembali }}
                </td>

                <td class="px-4 py-3 border border-slate-200 text-sm text-slate-500">
                    {{ $item->kondisi_kembali }}
                </td>

                <td class="px-4 py-3 border border-slate-200 text-sm text-slate-600">
                    {{ $item->lokasi_pengembalian }}
                </td>

                <td class="px-4 py-3 border border-slate-200 text-sm">
                    {{ $item->keterangan_kembali }}
                </td>

                <td class="px-4 py-3 border border-slate-200 text-center">

                    <span class="text-sm font-medium text-slate-700">
                        {{ $item->jumlah }}
                    </span>

                </td>

                <td class="px-4 py-3 border border-slate-200 text-center">

                    @if($item->status == 'pending')

                        <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs">
                            Pending
                        </span>

                    @elseif($item->status == 'disetujui')

                        <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs">
                            Disetujui
                        </span>

                    @elseif($item->status == 'ditolak')

                        <span class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-xs">
                            Ditolak
                        </span>

                    @elseif($item->status == 'menunggu_verifikasi')

                        <span class="px-3 py-1 bg-orange-100 text-orange-700 rounded-full text-xs">
                            Menunggu Verifikasi
                        </span>

                    @elseif($item->status == 'dikembalikan')

                        <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs">
                            Dikembalikan
                        </span>

                    @endif

                    </td>

                <td class="px-4 py-3 border border-slate-200">

                    <div class="flex items-center justify-center gap-2 min-w-[90px]">

                        <!-- DETAIL -->
                        <button
                        onclick="openDetailModal(
                        '{{ $item->jenis == 'barang' ? optional($item->barang)->nama_barang : optional($item->aset)->nama_aset }}',
                        '{{ $item->tanggal_pinjam }}',
                        '{{ $item->jumlah }}',
                        '{{ $item->kondisi_pinjam }}',
                        '{{ $item->tanggal_kembali }}',
                        '{{ $item->kondisi_kembali }}',
                        '{{ $item->lokasi_pengembalian }}',
                        '{{ $item->keterangan_kembali }}',
                        '{{ $item->status }}'
                        )"
                        class="w-8 h-8 rounded-xl
                        bg-orange-50 text-orange-500
                        hover:bg-orange-500 hover:text-white
                        transition-all duration-300
                        flex items-center justify-center">

                            <i class="fas fa-eye text-sm"></i>

                        </button>

                        <!-- PENGEMBALIAN -->
                        @if($item->status == 'disetujui')

                        <button
                        onclick="openPengembalianModal(
                        '{{ $item->id }}',
                        '{{ $item->jumlah }}'
                        )"
                        class="w-8 h-8 rounded-xl
                        bg-blue-50 text-blue-500
                        hover:bg-blue-500 hover:text-white
                        transition-all duration-300
                        flex items-center justify-center">

                            <i class="fas fa-arrow-rotate-left text-sm"></i>

                        </button>

                        @endif

                    </div>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="12" class="py-16 text-center">

                    <div class="flex flex-col items-center">

                        <div class="w-16 h-16 rounded-xl bg-slate-100 flex items-center justify-center mb-4">

                            <i class="fas fa-box-open text-2xl text-slate-300"></i>

                        </div>

                        <p class="text-slate-500 font-medium">

                            Belum ada riwayat peminjaman

                        </p>

                    </div>

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>

</div>

<!-- MODAL AJUKAN PENGEMBALIAN -->
<div id="pengembalianModal"
class="fixed inset-0 bg-black/30 backdrop-blur-sm
hidden items-center justify-center z-50 p-6">

<div class="bg-white w-full max-w-sm rounded-2xl
shadow-2xl overflow-hidden relative">

    <!-- Tombol Close -->
    <button
    onclick="closePengembalianModal()"
    class="absolute top-5 right-5 text-slate-400 hover:text-red-500 transition-all duration-300">

        <i class="fas fa-times text-sm text-slate-500 mt-1"></i>

    </button>

    <div class="p-6">

        <h3 class="text-lg font-semibold text-slate-800">
            Ajukan Pengembalian
        </h3>

        <p class="text-xs text-slate-400 mb-6">
            Lengkapi data pengembalian barang
        </p>

        <form
        action="/peminjaman/pengembalian"
        method="POST"
        enctype="multipart/form-data"
        class="space-y-4">

            @csrf

            <input
            type="hidden"
            id="pengembalian_id"
            name="id">

            <!-- FOTO -->
            <div>

                <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                    Foto Bukti Pengembalian
                </label>

                <input
                type="file"
                name="foto_pengembalian"
                accept="image/*"
                required
                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

            </div>

            <!-- TANGGAL -->
            <div>

                <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                    Tanggal Kembali
                </label>

                <input
                type="date"
                name="tanggal_kembali"
                required
                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

            </div>

            <!-- JUMLAH -->
            <div>

                <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                    Jumlah Dikembalikan
                </label>

                <input
                type="number"
                id="jumlah_kembali"
                name="jumlah_kembali"
                min="1"
                required
                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                <p id="infoJumlah"
                class="text-xs text-slate-500 mt-1 px-1"></p>

            </div>

            <!-- KONDISI -->
            <div>

                <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                    Kondisi Kembali
                </label>

                <select
                name="kondisi_kembali"
                required
                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                    <option value="">--- Pilih Kondisi ---</option>

                    <option value="Baik">Baik</option>
                    <option value="Rusak Ringan">Rusak Ringan</option>
                    <option value="Rusak Berat">Rusak Berat</option>

                </select>

            </div>

            <!-- LOKASI -->
            <div>

                <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                    Lokasi Pengembalian
                </label>

                <select
                name="lokasi_pengembalian"
                required
                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all">

                    <option value="">--- Pilih Lokasi Pengembalian ---</option>

                    @foreach($ruangans as $ruangan)

                        <option value="{{ $ruangan->nama_ruangan }}">
                            {{ $ruangan->nama_ruangan }}
                        </option>

                    @endforeach

                </select>

            </div>

            <!-- KETERANGAN -->
            <div>

                <label class="text-[10px] font-semibold uppercase tracking-widest text-slate-400 block mb-2 px-1">
                    Keterangan
                </label>

                <textarea
                name="keterangan_kembali"
                rows="3"
                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none transition-all"></textarea>

            </div>

            <div class="flex gap-3 mt-6">

                <button
                type="submit"
                class="flex-1 py-2.5 bg-[#2f5d50] text-white rounded-xl font-medium text-sm">

                    Kirim Pengembalian

                </button>

                <button
                type="button"
                onclick="closePengembalianModal()"
                class="flex-1 bg-slate-200 py-2 rounded-xl font-medium text-sm">

                    Batal

                </button>

            </div>

        </form>

    </div>

</div>

</div>

<!-- DETAIL MODAL AJUKAN PENGEMBALIAN -->
<div id="detailModal"
class="hidden fixed inset-0 bg-black/30 backdrop-blur-sm z-50 items-center justify-center p-6">

    <div class="bg-white w-full max-w-sm rounded-2xl
    shadow-2xl overflow-hidden relative">

        <!-- Tombol Close -->
        <button
        onclick="closeDetailModal()"
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

                <div class="font-medium text-slate-600">Barang / Aset</div>
                <div id="dBarang">-</div>

                <div class="font-medium text-slate-600">Tanggal Pinjam</div>
                <div id="dTanggalPinjam">-</div>

                <div class="font-medium text-slate-600">Jumlah</div>
                <div id="dJumlah">-</div>

                <div class="font-medium text-slate-600">Kondisi Pinjam</div>
                <div id="dKondisiPinjam">-</div>

                <div class="font-medium text-slate-600">Tanggal Kembali</div>
                <div id="dTanggalKembali">-</div>

                <div class="font-medium text-slate-600">Kondisi Kembali</div>
                <div id="dKondisiKembali">-</div>

                <div class="font-medium text-slate-600">Lokasi Pengembalian</div>
                <div id="dLokasi">-</div>

                <div class="font-medium text-slate-600">Keterangan</div>
                <div id="dKeterangan">-</div>

                <div class="font-medium text-slate-600">Status</div>
                <div id="dStatus">-</div>

            </div>

            <div class="mt-6">

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
        function openPengembalianModal(id, jumlah)
        {
            document.getElementById('pengembalian_id').value = id;

            document.getElementById('jumlah_kembali').value = '';

            document.getElementById('jumlah_kembali')
                .setAttribute('max', jumlah);

            document.getElementById('infoJumlah')
                .innerText =
                'Maksimal pengembalian: ' + jumlah;

            document.getElementById('pengembalianModal')
                .classList.remove('hidden');

            document.getElementById('pengembalianModal')
                .classList.add('flex');
        }

        function closePengembalianModal()
        {
            document.getElementById('pengembalianModal')
                .classList.remove('flex');

            document.getElementById('pengembalianModal')
                .classList.add('hidden');
        }
        function openDetailModal(
        barang,
        tanggalPinjam,
        jumlah,
        kondisiPinjam,
        tanggalKembali,
        kondisiKembali,
        lokasi,
        keterangan,
        status
        )
        {
            document.getElementById('dBarang').innerText = barang;
            document.getElementById('dTanggalPinjam').innerText = tanggalPinjam;
            document.getElementById('dJumlah').innerText = jumlah;
            document.getElementById('dKondisiPinjam').innerText = kondisiPinjam;
            document.getElementById('dTanggalKembali').innerText = tanggalKembali;
            document.getElementById('dKondisiKembali').innerText = kondisiKembali;
            document.getElementById('dLokasi').innerText = lokasi;
            document.getElementById('dKeterangan').innerText = keterangan;
            document.getElementById('dStatus').innerText = status;

            document.getElementById('detailModal')
                .classList.remove('hidden');

            document.getElementById('detailModal')
                .classList.add('flex');
        }

        function closeDetailModal()
        {
            document.getElementById('detailModal')
                .classList.remove('flex');

            document.getElementById('detailModal')
                .classList.add('hidden');
        }
    </script>
</body>
</html>