<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Barang - SMK Al-Irsyad</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-slate-50 p-8">
    <div class="max-w-6xl mx-auto">
        <header class="flex justify-between items-center mb-8">
            <h2 class="text-2xl font-bold text-slate-800">Daftar Inventaris Barang</h2>
            <a href="{{ route('barang.create') }}" class="bg-[#2F5D50] hover:bg-[#3F7465]-600 text-white px-4 py-2 rounded-xl text-sm font-bold">
                + Tambah Barang
            </a>
        </header>

        <div class="card-modern rounded-xl shadow-sm overflow-hidden border border-slate-100">
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-50 border-b border-slate-100">
                    <tr>
                        <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase">Nama Barang</th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase">Kategori</th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase">Stok</th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($barangs as $barang)
                    <tr>
                        <td class="px-6 py-4 text-sm font-medium">{{ $barang->nama_barang }}</td>
                        <td class="px-6 py-4 text-sm">{{ $barang->kategori }}</td>
                        <td class="px-6 py-4 text-sm font-bold">{{ $barang->stok }}</td>
                        <td class="px-6 py-4 text-sm">
                            <button class="text-blue-600 mr-2"><i class="fas fa-edit"></i></button>
                            <button class="text-red-600"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-8 text-center text-slate-400 italic">Data belum tersedia.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>