<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Aset - {{ $aset->nama_aset }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-slate-700/40 backdrop-blur-sm min-h-screen flex items-center justify-center p-4">

    <div class="bg-white w-full max-w-sm rounded-2xl shadow-2xl overflow-hidden relative max-h-[90vh] overflow-y-auto">
        
        <div class="p-6">
            <div class="flex justify-between items-center mb-5">
                <h3 class="text-lg font-semibold text-slate-800">Detail Aset</h3>
            </div>

            <div class="grid grid-cols-2 gap-y-4 gap-x-6 text-sm text-slate-700">
                
                <div class="font-medium text-slate-500">Nama Aset</div>
                <div class="text-slate-800 font-semibold">{{ $aset->nama_aset }}</div>

                <div class="font-medium text-slate-500">Kode Aset</div>
                <div class="text-slate-800 font-medium">{{ $aset->kode_aset }}</div>

                <div class="font-medium text-slate-500">Kategori</div>
                <div class="text-slate-800">{{ $aset->kategori }}</div>

                <div class="font-medium text-slate-500">Lokasi</div>
                <div class="text-slate-800">{{ $aset->lokasi }}</div>

                <div class="font-medium text-slate-500">Kondisi</div>
                <div class="text-slate-800">
                    <span class="px-2 py-0.5 rounded-md text-xs font-medium bg-green-100 text-green-700">
                        {{ $aset->kondisi }}
                    </span>
                </div>

                <div class="font-medium text-slate-500">Jumlah</div>
                <div class="text-slate-800 font-medium">{{ $aset->stok }}</div>

                <div class="font-medium text-slate-500">Keterangan</div>
                <div class="text-slate-800 text-xs leading-relaxed">{{ $aset->spesifikasi ?? '-' }}</div>

                <div class="col-span-2 text-center mt-4 border-t border-slate-100 pt-4">
                    <h4 class="font-semibold text-slate-700 text-xs uppercase tracking-wider mb-3">Foto Aset</h4>
                    @if($aset->foto)
                        <img src="{{ asset('foto-aset/' . $aset->foto) }}" class="mx-auto w-40 h-40 object-contain rounded-xl border border-slate-200 p-2 bg-white shadow-sm">
                    @else
                        <div class="mx-auto w-40 h-40 flex items-center justify-center rounded-xl border border-dashed border-slate-300 bg-slate-50 text-slate-400 text-xs">
                            Tidak ada foto
                        </div>
                    @endif
                </div>
            </div>

            <div class="mt-6 flex flex-col gap-2">
                <a href="/login-user" class="w-full py-2.5 bg-[#2f5d50] text-white text-center rounded-xl font-medium text-sm hover:bg-[#23463c] transition-all shadow-md shadow-emerald-900/10">
                    Pinjam Aset
                </a>
            </div>

        </div>

    </div>

</body>
</html>