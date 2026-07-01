<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Login Peminjam - SMK Al-Irsyad</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        * {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            background:
                radial-gradient(circle at top left, #edf5f2 0%, #f8fafc 45%, #f1f5f9 100%);
        }
    </style>

</head>

<body class="min-h-screen flex items-center justify-center px-4 py-2">

    <!-- CARD -->
    <div class="w-full max-w-4xl
    bg-white/90 backdrop-blur-xl
    rounded-xl
    overflow-hidden
    border border-white/60
    shadow-2xl shadow-slate-200/50
    grid md:grid-cols-2">

        <!-- LEFT -->
        <div class="hidden md:flex
        bg-[#2f5d50]
        relative overflow-hidden
        items-center justify-center p-4">

            <!-- BG EFFECT -->
            <div class="absolute w-[320px] h-[320px]
            bg-white/10 rounded-xl
            -top-24 -left-20 blur-2xl"></div>

            <div class="absolute w-[240px] h-[240px]
            bg-black/10 rounded-xl
            bottom-0 right-0 blur-2xl"></div>

            <!-- CONTENT -->
            <div class="relative z-10 text-center text-white">

                <!-- LOGO -->
                <div class="w-[80px] h-[80px]
                bg-white/10 backdrop-blur-md
                rounded-xl
                border border-white/10
                flex items-center justify-center
                mx-auto mb-8 shadow-xl">

                    <img src="{{ asset('images/logo.png') }}" class="w-[50px] object-contain">

                </div>

                <h1 class="text-lg font-medium leading-tight">
                    Sistem Inventaris
                    <br>
                    SMK Al-Irsyad
                </h1>

                <p class="text-white/70 text-xs mt-4 leading-relaxed max-w-xs mx-auto">

                    Platform pengelolaan inventaris sekolah
                    yang modern dan efisien.

                </p>

            </div>

        </div>

        <!-- RIGHT -->
        <div class="p-4 md:p-5 flex flex-col justify-center">

            <!-- TITLE -->
            <div class="mb-4">

                <div class="inline-flex items-center gap-2
                bg-[#edf5f2]
                text-[#2f5d50]
                px-3 py-2 rounded-xl
                text-[10px] font-bold tracking-wide mb-4">

                    <div class="w-2 h-2 rounded-xl bg-[#2f5d50]"></div>

                    LOGIN PEMINJAM

                </div>

                <h2 class="text-2xl font-semibold text-slate-800 leading-tight">

                    Selamat Datang

                </h2>

                <p class="text-slate-400 mt-2 text-sm leading-relaxed">

                    Login untuk melakukan peminjaman inventaris sekolah.

                </p>

            </div>

            <!-- ERROR -->
            @if(session('error'))

                <div class="bg-red-50 border border-red-100
                    text-red-500 px-4 py-2 rounded-xl mb-5 text-sm font-medium">

                    {{ session('error') }}

                </div>

            @endif

            <!-- SUCCESS -->
            @if(session('success'))

                <div class="bg-emerald-50 border border-emerald-100
                    text-emerald-600 px-4 py-2 rounded-xl mb-5 text-sm font-medium">

                    {{ session('success') }}

                </div>

            @endif

            <!-- FORM -->
            <form method="POST" action="{{ route('login.user') }}" class="space-y-3">

                @csrf

                <!-- EMAIL -->
                <div>

                    <label class="block
                    text-sm font-bold
                    text-slate-700 mb-3">

                        Email

                    </label>

                    <input type="email" name="email" placeholder="Masukkan email" autocomplete="off" class="w-full
                    bg-slate-50
                    border border-slate-200
                    rounded-xl
                    px-4 py-2
                    text-sm
                    outline-none
                    focus:border-[#2f5d50]
                    focus:ring-4 focus:ring-[#2f5d50]/10
                    transition-all" required>

                </div>

                <!-- PASSWORD -->
                <div>

                    <label class="block
                    text-sm font-bold
                    text-slate-700 mb-3">

                        Password

                    </label>

                    <input type="password" name="password" placeholder="Masukkan password" autocomplete="new-password"
                        class="w-full
                    bg-slate-50
                    border border-slate-200
                    rounded-xl
                    px-4 py-2
                    text-sm
                    outline-none
                    focus:border-[#2f5d50]
                    focus:ring-4 focus:ring-[#2f5d50]/10
                    transition-all" required>

                </div>

                <!-- OPTIONS -->
                <div class="flex justify-between items-center pt-1">

                    <label class="flex items-center gap-3
                    text-sm text-slate-500 font-medium">

                        <input type="checkbox" name="remember" class="accent-[#2f5d50] w-4 h-4">

                        Ingat saya

                    </label>

                    <a href="/lupapasswordpeminjam" class="text-sm font-semibold
                    text-[#2f5d50]
                    hover:underline">

                        Lupa password?

                    </a>

                </div>

                <!-- BUTTON -->
                <button type="submit" class="w-full
                bg-[#2f5d50]
                hover:bg-[#23463c]
                transition-all duration-300
                text-white
                font-bold
                py-2 rounded-xl
                shadow-xl shadow-[#2f5d50]/15
                mt-4">

                    Login Peminjam

                </button>

            </form>

            <!-- SWITCH -->
            <div class="grid grid-cols-2 gap-3 mt-3">

                <a href="/login-admin" class="bg-slate-100
            hover:bg-slate-200
            transition-all
            text-slate-600
            text-center
            py-2 rounded-xl
            font-bold text-sm">

                    Login Admin

                </a>

                <a href="/login-user" class="bg-[#2f5d50]
            text-white text-center
            py-2 rounded-xl
            font-bold text-sm
            shadow-sm shadow-[#2f5d50]/10">

                    Login User

                </a>

            </div>

            <div class="text-center mt-4">

                <span class="text-slate-500 text-sm">
                    Belum punya akun?
                </span>

                <a href="/register-user" class="text-[#2f5d50] font-semibold hover:underline">

                    Daftar Sekarang

                </a>

            </div>

            <!-- COPYRIGHT -->
            <p class="text-center text-[#2f5d50]
        text-[11px] mt-3 font-medium">

                © 2026 Chika Aulia Christine | Universitas Harkat Negeri

            </p>

        </div>

</body>

</html>