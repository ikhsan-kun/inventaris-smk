<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Peminjam</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>

        *{
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body{
            background:
            radial-gradient(circle at top left, #edf5f2 0%, #f8fafc 45%, #f1f5f9 100%);
        }

    </style>

</head>

<body class="min-h-screen">

    <!-- NAVBAR -->
    <nav class="card-modern/80 backdrop-blur-xl
    border-b border-slate-200/70
    px-8 lg:px-12 py-5
    flex items-center justify-between sticky top-0 z-40">

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

            <p class="text-[11px]
            text-slate-400 font-medium mt-1">

                Sistem Inventaris Sekolah

            </p>

        </div>

    </div>

        <!-- PROFILE -->
        <div class="relative">

            <!-- BUTTON PROFILE -->
            <button onclick="toggleProfileMenu()"
                    class="flex items-center gap-4
                    card-modern border border-slate-200
                    rounded-xl px-4 py-3
                    shadow-sm hover:shadow-md
                    transition-all duration-300">

                <!-- FOTO -->
                @if(session('user_photo'))

                    <img src="{{ asset('storage/' . session('user_photo')) }}"
                        class="w-12 h-12 rounded-xl object-cover">

                @else

                    <div class="w-12 h-12 rounded-xl
                    bg-[#2f5d50]
                    flex items-center justify-center
                    text-white font-bold text-sm">

                        {{ strtoupper(substr(session('user'), 0, 2)) }}

                    </div>

                @endif

                <div class="text-left">

                    <h4 class="font-bold text-slate-800 text-sm">

                        {{ session('user') }}

                    </h4>

                    <p class="text-xs text-slate-400 mt-1">

                        {{ session('email') }}

                    </p>

                </div>

                <i class="fas fa-chevron-down text-slate-300 text-xs"></i>

            </button>

            <!-- DROPDOWN MENU -->
            <div id="profileMenu"
            class="hidden absolute right-0 top-20
            w-60 bg-white rounded-xl
            shadow-2xl border border-slate-200
            overflow-hidden z-50">

                <!-- HEADER -->
                <div class="px-6 py-5 border-b bg-[#f7faf9]">

                    <h3 class="font-bold text-slate-800 text-sm">
                        Akun Saya
                    </h3>

                </div>

                <!-- MENU -->
                <a href="/profil-peminjam"
                class="flex items-center gap-3
                px-6 py-4 hover:bg-slate-50
                text-slate-700 text-sm transition-all">

                    <i class="fas fa-user text-slate-400"></i>

                    Profil

                </a>

                <a href="/pengaturanprofilpeminjam"
                class="flex items-center gap-3
                px-6 py-4 hover:bg-slate-50
                text-slate-700 text-sm transition-all">

                    <i class="fas fa-gear text-slate-400"></i>

                    Pengaturan

                </a>

                <!-- LOGOUT -->
                <form action="/logout" method="POST">
                    @csrf

                    <button type="submit"
                            class="flex items-center gap-3
                            w-full text-left px-6 py-4
                            hover:bg-red-50 text-red-500
                            border-t text-sm transition-all">

                        <i class="fas fa-right-from-bracket"></i>

                        Keluar

                    </button>

                </form>

            </div>

        </div>

    </nav>

    <!-- CONTENT -->
<div class="px-8 lg:px-12 py-10">

    @if(isset($notifikasi))

    <div id="notifBox"
    class="bg-green-50 border border-green-200
    text-green-700 p-4 rounded-xl mb-6
    flex justify-between items-center">

        <span>
            🔔 {{ $notifikasi->notifikasi }}
        </span>

        <button
        onclick="hapusNotif()"
        class="font-bold">

            ×

        </button>

    </div>

    @endif

        <!-- HERO -->
        <div class="relative overflow-hidden
        bg-gradient-to-br from-[#2f5d50] to-[#3c7464]
        rounded-xl
        p-10 lg:p-14
        text-white shadow-2xl shadow-[#2f5d50]/15 mb-10">

            <!-- BG EFFECT -->
            <div class="absolute w-[350px] h-[350px]
            card-modern/10 rounded-xl
            -top-28 -right-20 blur-2xl"></div>

            <div class="absolute w-[200px] h-[200px]
            bg-black/10 rounded-xl
            bottom-0 right-20 blur-2xl"></div>

            <div class="relative z-10">

                <div class="inline-flex items-center gap-2
                card-modern/10 border border-white/10
                px-4 py-2 rounded-xl mb-6">

                    <div class="w-2 h-2 rounded-xl card-modern"></div>

                    <span class="text-xs font-bold tracking-wide">
                        DASHBOARD PEMINJAM
                    </span>

                </div>

                <h1 class="text-4xl lg:text-4xl font-semibold
                font-semibold leading-tight mb-4">

                    Selamat Datang 👋

                </h1>

                <p class="text-white/80 text-base leading-relaxed max-w-2xl">

                    Silakan lakukan peminjaman inventaris sekolah
                    dengan lebih mudah, cepat, dan modern.

                </p>

            </div>

        </div>

        <!-- MENU -->
        <div class="grid md:grid-cols-2 gap-8">

            <!-- PINJAM -->
            <a href="/pinjam-barang"
               class="group card-modern
               rounded-xl p-8
               border border-slate-200
               shadow-sm hover:shadow-2xl
               hover:-translate-y-1
               transition-all duration-300">

                <div class="w-16 h-16 rounded-xl
                bg-[#eef7f4]
                flex items-center justify-center
                text-3xl mb-6
                group-hover:bg-[#2f5d50]
                transition-all duration-300">

                    <span class="group-hover:scale-110 transition-all duration-300">
                        📦
                    </span>

                </div>

                <h2 class="text-2xl font-semibold text-slate-800 mb-3">

                    Pinjam Barang

                </h2>

                <p class="text-slate-400 text-sm leading-relaxed">

                    Ajukan peminjaman inventaris sekolah
                    dengan cepat dan mudah.

                </p>

            </a>

            <!-- RIWAYAT -->
            <a href="/riwayatpeminjaman"
            class="group card-modern
            rounded-xl p-8
            border border-slate-200
            shadow-sm hover:shadow-2xl
            hover:-translate-y-1
            transition-all duration-300">

                <div class="w-16 h-16 rounded-xl
                bg-[#eef7f4]
                flex items-center justify-center
                text-3xl mb-6
                group-hover:bg-[#2f5d50]
                transition-all duration-300">

                    <span class="group-hover:scale-110 transition-all duration-300">
                        📋
                    </span>

                </div>

                <h2 class="text-2xl font-semibold text-slate-800 mb-3">

                    Riwayat

                </h2>

                <p class="text-slate-400 text-sm leading-relaxed">

                    Lihat seluruh riwayat peminjaman
                    inventaris sekolah.

                </p>

            </a>

        </div>

    </div>

<script>

function toggleProfileMenu() {

    const menu = document.getElementById('profileMenu');

    menu.classList.toggle('hidden');

}

window.addEventListener('click', function(e){

    if (!e.target.closest('.relative')) {

        document.getElementById('profileMenu')
                .classList.add('hidden');

    }

});

function hapusNotif(){

    fetch('/hapus-notifikasi',{

        method:'POST',

        headers:{
            'X-CSRF-TOKEN':'{{ csrf_token() }}',
            'Content-Type':'application/json'
        }

    })
    .then(response => response.json())
    .then(data => {

        document
        .getElementById('notifBox')
        .remove();

    });

}
</script>

</body>
</html>