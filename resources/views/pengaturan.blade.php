<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan - SMK Al-Irsyad</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>

        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .toggle-checkbox:checked {
            right: 0;
            border-color: #22c55e;
            background-color: #22c55e;
        }

        .toggle-checkbox:checked + .toggle-label {
            background-color: #22c55e;
        }

    </style>
    
</head>

<body class="bg-gradient-to-r from-green-50 to-green-100 flex min-h-screen text-slate-700">

    <!-- SIDEBAR -->
    <aside class="w-64 card-modern border-r border-slate-200 flex flex-col sticky top-0 h-screen">

        <!-- LOGO -->
        <div class="p-6 flex items-center gap-3">

            <div class="card-modern border border-slate-200 rounded-xl p-6 shadow-sm">

                <i class="fas fa-graduation-cap text-white text-sm text-slate-500 mt-1"></i>

            </div>

            <div>

                <h1 class="font-extrabold text-[13px] text-slate-900 leading-tight">
                    SMK Al-Irsyad
                </h1>

                <p class="text-[10px] text-slate-400 font-medium uppercase tracking-tighter">
                    Kota Tegal
                </p>

            </div>

        </div>

        <!-- MENU -->
        <nav class="flex-1 px-4 space-y-1 overflow-y-auto mt-2">

            <p class="text-[10px] font-bold text-slate-400 px-3 py-3 uppercase tracking-widest">
                Menu Utama
            </p>

            <a href="{{ route('dashboard') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all text-slate-500 hoverbg-[#2F5D50] hover:bg-[#3F7465]:-50">

                <i class="fas fa-th-large w-5"></i>
                <span class="text-sm">Dashboard</span>

            </a>

            <a href="{{ route('barang.index') }}"
               class="flex items-center gap-3 px-4 py-3 hover:bg-[#2F5D50] hover:bg-[#3F7465]-50 rounded-xl transition-all group text-slate-500">

                <i class="fas fa-box w-5 group-hover:text-[#2f5d50]"></i>
                <span class="text-sm">Data Barang</span>

            </a>

            <a href="{{ route('aset.index') }}"
               class="flex items-center gap-3 px-4 py-3 hover:bg-[#2F5D50] hover:bg-[#3F7465]-50 rounded-xl transition-all group text-slate-500">

                <i class="fas fa-database w-5 group-hover:text-[#2f5d50]"></i>
                <span class="text-sm">Data Aset</span>

            </a>

            <p class="text-[10px] font-bold text-slate-400 px-3 py-3 uppercase tracking-widest mt-4">
                Transaksi
            </p>

            <a href="{{ route('barang.masuk') }}"
               class="flex items-center gap-3 px-4 py-3 hover:bg-[#2F5D50] hover:bg-[#3F7465]-50 rounded-xl transition-all group text-slate-500">

                <i class="fas fa-download w-5 group-hover:text-[#2f5d50]"></i>
                <span class="text-sm">Barang Masuk</span>

            </a>

            <a href="{{ route('inventaris.keluar') }}"
               class="flex items-center gap-3 px-4 py-3 hover:bg-[#2F5D50] hover:bg-[#3F7465]-50 rounded-xl transition-all group text-slate-500">

                <i class="fas fa-upload w-5 group-hover:text-[#2f5d50]"></i>
                <span class="text-sm">Inventaris Keluar</span>

            </a>

            <a href="{{ route('peminjaman.index') }}"
               class="flex items-center gap-3 px-4 py-3 hover:bg-[#2F5D50] hover:bg-[#3F7465]-50 rounded-xl transition-all group text-slate-500">

                <i class="fas fa-hand-holding w-5 group-hover:text-[#2f5d50]"></i>
                <span class="text-sm">Peminjaman</span>

            </a>

            <p class="text-[10px] font-bold text-slate-400 px-3 py-3 uppercase tracking-widest mt-4">
                Lainnya
            </p>

            <a href="{{ route('ruangan.index') }}"
               class="flex items-center gap-3 px-4 py-3 hover:bg-[#2F5D50] hover:bg-[#3F7465]-50 rounded-xl transition-all group text-slate-500">

                <i class="fas fa-door-open w-5 group-hover:text-[#2f5d50]"></i>
                <span class="text-sm">Data Ruangan</span>

            </a>

            <a href="{{ route('laporan.index') }}"
               class="flex items-center gap-3 px-4 py-3 hover:bg-[#2F5D50] hover:bg-[#3F7465]-50 rounded-xl transition-all group text-slate-500">

                <i class="fas fa-file-alt w-5 group-hover:text-[#2f5d50]"></i>
                <span class="text-sm">Laporan</span>

            </a>

            <!-- ACTIVE -->
            <a href="{{ route('pengaturan.index') }}"
               class="flex items-center gap-3 px-4 py-3 bg-[#2F5D50] hover:bg-[#3F7465]-50 text-[#2f5d50] border-r-4 border-green-500 font-bold rounded-xl transition-all">

                <i class="fas fa-cog w-5"></i>
                <span class="text-sm">Pengaturan</span>

            </a>

        </nav>

    </aside>

    <!-- CONTENT -->
    <main class="flex-1 p-8">

        <!-- HEADER -->
        <header class="flex justify-between items-center mb-8">

            <div>

                <h2 class="text-2xl font-semibold text-slate-800 italic">
                    Pengaturan
                </h2>

                <p class="text-[11px] text-slate-400 font-bold uppercase tracking-widest">
                    Konfigurasi sistem dan preferensi akun
                </p>

            </div>

            <div class="flex items-center gap-4">

        </header>

        <!-- GRID -->
        <div class="grid grid-cols-2 gap-6">

            <!-- SEKOLAH -->
            <div class="card-modern p-8 rounded-xl shadow-sm border border-slate-50">

                <div class="flex items-center gap-3 mb-6">

                    <div class="card-modern border border-slate-200 rounded-xl p-6 shadow-sm">

                        <i class="fas fa-school text-sm"></i>

                    </div>

                    <div>

                        <h3 class="text-sm font-bold text-slate-800">
                            Informasi Sekolah
                        </h3>

                        <p class="text-[9px] text-slate-400 font-medium uppercase">
                            Identitas resmi sekolah
                        </p>

                    </div>

                </div>

                <div class="space-y-4">

                    <div>

                        <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest ml-1">
                            Nama Sekolah
                        </label>

                        <input type="text"
                               value="SMK Al-Irsyad Kota Tegal"
                               class="w-full mt-1.5 px-4 py-3 bg-slate-50 border-none rounded-xl text-sm focus:ring-2 focus:ring-green-500 outline-none font-medium">

                    </div>

                    <div class="grid grid-cols-2 gap-4">

                        <div>

                            <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest ml-1">
                                NPSN
                            </label>

                            <input type="text"
                                   value="20329841"
                                   class="w-full mt-1.5 px-4 py-3 bg-slate-50 border-none rounded-xl text-sm focus:ring-2 focus:ring-green-500 outline-none font-medium">

                        </div>

                    </div>

                    <div>

                        <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest ml-1">
                            Alamat
                        </label>

                        <input type="text"
                               value="Jl. Gajah Mada No. 12, Kota Tegal"
                               class="w-full mt-1.5 px-4 py-3 bg-slate-50 border-none rounded-xl text-sm focus:ring-2 focus:ring-green-500 outline-none font-medium">

                    </div>

                </div>

            </div>

            <!-- ADMIN -->
            <div class="card-modern p-8 rounded-xl shadow-sm border border-slate-50">

                <div class="flex items-center gap-3 mb-6">

                    <div class="card-modern border border-slate-200 rounded-xl p-6 shadow-sm">

                        <i class="fas fa-user-shield text-sm"></i>

                    </div>

                    <div>

                        <h3 class="text-sm font-bold text-slate-800">
                            Profil Admin
                        </h3>

                        <p class="text-[9px] text-slate-400 font-medium uppercase">
                            Data akun pengelola sistem
                        </p>

                    </div>

                </div>

            </div>

        </div>

        <!-- BUTTON -->
        <div class="mt-8 flex justify-end">

            <button class="bg-[#2F5D50] hover:bg-[#3F7465]-500 text-white px-10 py-3.5 rounded-xl font-semibold text-[10px] flex items-center gap-3 shadow-xl shadow-green-100 hover:bg-[#3f7465] transition-all uppercase tracking-[2px]">

                <i class="fas fa-save"></i>
                Simpan Perubahan

            </button>

        </div>

    </main>

</body>
</html>