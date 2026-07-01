@extends('layouts.app')

@section('content')

<div class="space-y-28">

    <!-- TOPBAR -->
    <div class="flex items-center justify-between">

        <!-- TITLE -->
        <div>

            <h1 class="text-2xl font-semibold text-slate-800">
                Dashboard
            </h1>

            <p class="text-xs text-slate-400 mt-1">
                Selamat datang di sistem inventaris sekolah
            </p>

        </div>

        <!-- PROFILE -->
        <div class="relative">

            <button type="button"
            onclick="toggleProfileMenu()"
            class="flex items-center gap-3
            bg-white border border-slate-200
            rounded-xl px-4 py-2.5
            shadow-sm hover:bg-slate-50 transition">

                @if(session('admin_photo'))

                    <img
                    src="{{ asset('storage/' . session('admin_photo')) }}"
                    alt="Foto Profil"
                    class="w-10 h-10 rounded-xl object-cover border border-slate-200">

                @else

                    <div class="w-10 h-10 rounded-xl bg-[#2F5D50]
                    flex items-center justify-center
                    text-white font-semibold">

                        {{ strtoupper(substr(session('admin_name'), 0, 2)) }}

                    </div>

                @endif

                <div class="text-left">

                    <p class="text-sm font-semibold text-slate-700">
                        {{ session('admin_name') }}
                    </p>

                    <p class="text-xs text-slate-400">
                        {{ session('admin_email') }}
                    </p>

                </div>

                <i class="fas fa-chevron-down text-xs text-slate-400"></i>

            </button>

            <!-- DROPDOWN -->
            <div id="profileMenu"
                class="hidden absolute right-0 mt-3
                w-56 bg-white border border-slate-200
                rounded-xl shadow-xl overflow-hidden z-50">

                <div class="px-5 py-4 border-b bg-slate-50">

                    <p class="text-sm font-semibold text-slate-700">
                        Akun Saya
                    </p>

                </div>

                <a href="/profil-admin"
                class="flex items-center gap-3 px-5 py-4
                hover:bg-slate-50 transition
                text-sm text-slate-700">

                    <i class="fas fa-user text-slate-400"></i>

                    Profil

                </a>

                <a href="/pengaturanprofiladmin"
                class="flex items-center gap-3 px-5 py-4
                hover:bg-slate-50 transition
                text-sm text-slate-700">

                    <i class="fas fa-gear text-slate-400"></i>

                    Pengaturan

                </a>

            </div>

        </div>

    </div>

    <!-- CARD -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-5 gap-4">

        <!-- TOTAL BARANG -->
        <div class="bg-white border border-slate-300 rounded-xl p-5 shadow-sm">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-sm text-slate-400 font-medium uppercase tracking-wide">
                        Total Barang
                    </p>

                    <h2 class="text-4xl font-semibold text-slate-800 mt-3">
                        {{ $totalBarang }}
                    </h2>

                    <p class="text-sm text-slate-400 mt-3">
                        {{ $totalBarang }} total barang tersedia
                    </p>

                </div>

                <div class="w-10 h-10 rounded-xl bg-[#eef7f4]
                flex items-center justify-center">

                    <i class="fas fa-box text-[#2F5D50] text-base"></i>

                </div>

            </div>

        </div>

        <!-- TOTAL ASET -->
        <div class="bg-white border border-slate-300 rounded-xl p-5 shadow-sm">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-sm text-slate-400 font-medium uppercase tracking-wide">
                        Total Aset
                    </p>

                    <h2 class="text-4xl font-semibold text-slate-800 mt-3">
                        {{ $totalAset }}
                    </h2>

                    <p class="text-sm text-slate-400 mt-3">
                        {{ $totalAset }} total aset tersedia
                    </p>

                </div>

                <div class="w-10 h-10 rounded-xl bg-[#eef7f4]
                flex items-center justify-center">

                    <i class="fas fa-database text-[#2F5D50] text-base"></i>

                </div>

            </div>

        </div>

        <!-- BARANG MASUK -->
        <div class="bg-white border border-slate-300 rounded-xl p-5 shadow-sm">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-sm text-slate-400 font-medium uppercase tracking-wide">
                        Barang Masuk
                    </p>

                    <h2 class="text-4xl font-semibold text-slate-800 mt-3">
                        {{ $barangMasuk }}
                    </h2>

                    <p class="text-sm text-slate-400 mt-3">
                        {{ $barangMasuk }} total barang masuk
                    </p>

                </div>

                <div class="w-10 h-10 rounded-xl bg-[#eef7f4]
                flex items-center justify-center">

                    <i class="fas fa-download text-[#2F5D50] text-base"></i>

                </div>

            </div>

        </div>

        <!-- BARANG KELUAR -->
        <div class="bg-white border border-slate-300 rounded-xl p-5 shadow-sm">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-sm text-slate-400 font-medium uppercase tracking-wide">
                        Barang Keluar
                    </p>

                    <h2 class="text-4xl font-semibold text-slate-800 mt-3">
                        {{ $barangKeluar }}
                    </h2>

                    <p class="text-sm text-red-400 mt-3">
                        {{ $barangKeluar }} barang keluar
                    </p>

                </div>

                <div class="w-10 h-10 rounded-xl bg-red-50
                flex items-center justify-center">

                    <i class="fas fa-upload text-red-500 text-base"></i>

                </div>

            </div>

        </div>

        <!-- PEMINJAMAN -->
        <div class="bg-white border border-slate-300 rounded-xl p-5 shadow-sm">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-sm text-slate-400 font-medium uppercase tracking-wide">
                        Peminjaman Aktif
                    </p>

                    <h2 class="text-4xl font-semibold text-slate-800 mt-3">
                        {{ $peminjamanAktif }}
                    </h2>

                    <p class="text-sm text-pink-400 mt-3">
                        {{ $peminjamanAktif }} peminjaman aktif
                    </p>

                </div>

                <div class="w-10 h-10 rounded-xl bg-pink-50
                flex items-center justify-center">

                    <i class="fas fa-link text-pink-500 text-base"></i>

                </div>

            </div>

        </div>

    </div>

</div>

<script>

function toggleProfileMenu()
{
    document
        .getElementById('profileMenu')
        .classList.toggle('hidden');
}

window.addEventListener('click', function(e){

    if (!e.target.closest('.relative')) {

        document
            .getElementById('profileMenu')
            .classList.add('hidden');

    }

});

</script>

@endsection