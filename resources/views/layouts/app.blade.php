<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Al-Irsyad Inventory Hub</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="/css/theme.css?v=10">

</head>

<body class="flex min-h-screen text-slate-700">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-white border-r border-slate-200 flex flex-col sticky top-0 h-screen shadow-sm">

<!-- LOGO -->
<div class="p-6 flex items-center gap-4">

    <!-- LOGO IMAGE -->
    <div class="relative">

        <!-- GLOW -->
        <div class="absolute inset-0
        bg-[#2f5d50]/20 blur-2xl
        rounded-full scale-125"></div>

        <!-- CONTAINER -->
        <div class="relative w-16 h-16
        rounded-2xl bg-white
        border border-slate-100
        shadow-lg shadow-slate-200/60
        flex items-center justify-center
        overflow-hidden">

            <img
            src="{{ asset('images/logo.png') }}"
            class="w-11 h-11 object-contain">

        </div>

    </div>

    <!-- TEXT -->
    <div>

        <h1 class="text-[16px] font-semibold
        text-slate-700 leading-tight tracking-tight">

            SMK Al-Irsyad

        </h1>

        <p class="text-xs
        text-slate-400 font-medium mt-1">

            Kota Tegal

        </p>

    </div>

</div>

        <!-- MENU -->
        <nav class="flex-1 px-4 space-y-1 overflow-y-auto mt-2">

            <p class="text-xs font-semibold text-slate-300 px-3 py-3 uppercase tracking-widest">
                Menu Utama
            </p>

            <!-- DASHBOARD -->
            <a href="{{ route('dashboard') }}"
               class="flex items-center gap-3 px-4 py-3
               {{ request()->routeIs('dashboard') ? 'bg-[#eef7f4] text-[#2f5d50] border-r-4 border-[#3f7465] font-bold' : 'text-slate-500 hover:bg-[#eef7f4]' }}
               rounded-xl transition-all">

                <i class="fas fa-th-large w-5"></i>

                <span class="text-sm font-medium">
                    Dashboard
                </span>

            </a>

            <!-- ANGGOTA -->
            <div>

                <button
                    onclick="toggleAnggotaMenu()"
                    class="w-full flex items-center justify-between px-4 py-3 text-slate-500 hover:bg-[#eef7f4] rounded-xl transition-all">

                    <div class="flex items-center gap-3">

                        <i class="fas fa-users w-5"></i>

                        <span class="text-sm font-medium">
                            Anggota
                        </span>

                    </div>

                    <i class="fas fa-chevron-down text-xs"></i>

                </button>

                <!-- SUBMENU -->
                <div id="anggotaMenu"
                    class="ml-12 mt-2 space-y-2
                    {{ request()->is('data-guru') || request()->is('data-siswa') ? 'block' : 'hidden' }}">

                    <a href="/data-guru"
                    class="flex items-center gap-2 text-sm font-medium px-3 py-2 rounded-xl
                    {{ request()->is('data-guru') ? 'bg-[#eef7f4] text-[#2f5d50] font-bold' : 'text-slate-500 hover:bg-[#eef7f4] hover:text-[#2f5d50]' }}
                    transition-all">

                        <i class="fas fa-user-tie text-xs"></i>

                        Data Guru & Staff

                    </a>

                    <a href="/data-siswa"
                    class="flex items-center gap-2 text-sm font-medium px-3 py-2 rounded-xl
                    {{ request()->is('data-siswa') ? 'bg-[#eef7f4] text-[#2f5d50] font-bold' : 'text-slate-500 hover:bg-[#eef7f4] hover:text-[#2f5d50]' }}
                    transition-all">

                        <i class="fas fa-user-graduate text-xs"></i>

                        Data Siswa

                    </a>

                </div>

            </div>

            <!-- DATA BARANG -->
            <a href="{{ route('barang.index') }}"
               class="flex items-center gap-3 px-4 py-3
               {{ request()->routeIs('barang.index') ? 'bg-[#eef7f4] text-[#2f5d50] border-r-4 border-[#3f7465] font-bold' : 'text-slate-500 hover:bg-[#eef7f4]' }}
               rounded-xl transition-all">

                <i class="fas fa-box w-5"></i>

                <span class="text-sm font-medium">
                    Data Barang
                </span>

            </a>

            <!-- DATA ASET -->
            <a href="{{ route('aset.index') }}"
               class="flex items-center gap-3 px-4 py-3
               {{ request()->routeIs('aset.index') ? 'bg-[#eef7f4] text-[#2f5d50] border-r-4 border-[#3f7465] font-bold' : 'text-slate-500 hover:bg-[#eef7f4]' }}
               rounded-xl transition-all">

                <i class="fas fa-database w-5"></i>

                <span class="text-sm font-medium">
                    Data Aset
                </span>

            </a>

            <!-- TRANSAKSI -->
            <p class="text-xs font-semibold text-slate-300 px-3 py-3 uppercase tracking-widest mt-4">
                Transaksi
            </p>

            <!-- BARANG MASUK -->
            <a href="{{ route('barang.masuk') }}"
            class="flex items-center gap-3 px-4 py-3
            {{ request()->routeIs('barang.masuk')
                    ? 'bg-[#eef7f4] text-[#2f5d50] border-r-4 border-[#3f7465] font-bold'
                    : 'text-slate-500 hover:bg-[#eef7f4]' }}
            rounded-xl transition-all">

                <i class="fas fa-download w-5"></i>

                <span class="text-sm font-medium">
                    Barang Masuk
                </span>

            </a>

            <a href="{{ route('inventaris.keluar') }}"
            class="flex items-center gap-3 px-4 py-3
            {{ request()->routeIs('inventaris.keluar')
                    ? 'bg-[#eef7f4] text-[#2f5d50] border-r-4 border-[#3f7465] font-bold'
                    : 'text-slate-500 hover:bg-[#eef7f4]' }}
            rounded-xl transition-all">

                <i class="fas fa-upload w-5"></i>

                <span class="text-sm font-medium">
                    Inventaris Keluar
                </span>

            </a>

            <a href="{{ route('peminjaman.index') }}"
            class="flex items-center gap-3 px-4 py-3
            {{ request()->routeIs('peminjaman.index')
                    ? 'bg-[#eef7f4] text-[#2f5d50] border-r-4 border-[#3f7465] font-bold'
                    : 'text-slate-500 hover:bg-[#eef7f4]' }}
            rounded-xl transition-all">

                <i class="fas fa-hand-holding w-5"></i>

                <span class="text-sm font-medium">
                    Peminjaman
                </span>

            </a>

            <!-- LAINNYA -->
            <p class="text-xs font-semibold text-slate-300 px-3 py-3 uppercase tracking-widest mt-4">
                Lainnya
            </p>

            <a href="{{ route('ruangan.index') }}"
            class="flex items-center gap-3 px-4 py-3
            {{ request()->routeIs('ruangan.index')
                    ? 'bg-[#eef7f4] text-[#2f5d50] border-r-4 border-[#3f7465] font-bold'
                    : 'text-slate-500 hover:bg-[#eef7f4]' }}
            rounded-xl transition-all">

                <i class="fas fa-door-open w-5"></i>

                <span class="text-sm font-medium">
                    Data Ruangan
                </span>

            </a>

            <a href="{{ route('laporan.index') }}"
            class="flex items-center gap-3 px-4 py-3
            {{ request()->routeIs('laporan.index')
                    ? 'bg-[#eef7f4] text-[#2f5d50] border-r-4 border-[#3f7465] font-bold'
                    : 'text-slate-500 hover:bg-[#eef7f4]' }}
            rounded-xl transition-all">

                <i class="fas fa-file-alt w-5"></i>

                <span class="text-sm font-medium">
                    Laporan
                </span>

            </a>

        </nav>

        <!-- LOGOUT -->
        <div class="px-4 pb-2">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="w-full flex items-center gap-3 px-4 py-3
                    text-red-400 hover:bg-red-50 hover:text-red-500
                    rounded-xl transition-all text-sm font-medium">
                    <i class="fas fa-sign-out-alt w-5"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>

        <!-- FOOTER -->
        <div class="p-4 bg-[#2f5d50] m-4 rounded-xl text-white shadow-xl">

            <p class="text-[10px] opacity-70 font-semibold uppercase">
                Sistem Inventaris
            </p>

            <p class="font-semibold text-xl text-white">
                v1.0 — 2026
            </p>

        </div>

    </aside>

    <!-- CONTENT -->
    <main class="flex-1 p-10 overflow-y-auto bg-[#f8fafc]">

        @yield('content')

    </main>

<script>

function toggleAnggotaMenu()
{
    const menu = document.getElementById('anggotaMenu');
    menu.classList.toggle('hidden');
}

</script>

</body>
</html>