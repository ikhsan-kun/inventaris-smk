<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SMK Al-Irsyad Tegal</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');

        *{
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body{
            background:
            radial-gradient(circle at top left, #edf5f2 0%, #f8fafc 45%, #f1f5f9 100%);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.96);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .animate-fadeIn {
            animation: fadeIn .2s ease;
        }
    </style>
</head>

<body class="min-h-screen flex flex-col overflow-x-hidden">

    <!-- NAVBAR -->
    <nav class="flex justify-end items-center px-8 py-7">

    </nav>

    <!-- HERO -->
    <section class="max-w-7xl mx-auto px-8 pt-6 pb-16 flex-grow flex items-center">

        <div class="grid lg:grid-cols-2 gap-16 items-center">

            <!-- TEXT -->
            <div>

                <!-- BADGE -->
                <div class="inline-flex items-center gap-3
                card-modern border border-slate-200
                px-5 py-3 rounded-xl shadow-sm mb-8">

                    <div class="w-2.5 h-2.5 rounded-xl bg-[#2f5d50]"></div>

                    <span class="text-sm font-semibold text-slate-600">
                        Sistem Inventaris Sekolah Modern
                    </span>

                </div>

                <!-- TITLE -->
                <h1 class="text-6xl lg:text-7xl
                font-semibold leading-[1.05]
                text-slate-800 tracking-tight">

                    Inventaris

                    <span class="text-[#2f5d50]">
                        Sekolah
                    </span>

                    <br>

                </h1>

                <!-- DESC -->
                <p class="text-slate-500 text-xl leading-relaxed
                mt-8 max-w-xl">

                    Sistem inventaris barang dan aset sekolah
                    untuk pengelolaan yang lebih rapi,
                    cepat, modern, dan efisien.

                </p>

                <!-- BUTTON -->
                <div class="flex flex-wrap items-center gap-4 mt-10">

                    <button
                    onclick="openModal()"
                    class="bg-[#2f5d50] hover:bg-[#23463c]
                    transition-all duration-300
                    text-white font-bold
                    px-4 py-3 rounded-xl
                    shadow-xl shadow-[#2f5d50]/20
                    flex items-center gap-3 text-sm text-slate-500 mt-1">

                        <i class="fas fa-right-to-bracket"></i>

                        Masuk Sistem

                    </button>

                </div>

            </div>

            <div class="relative flex justify-center items-center">

                <!-- Background Circle -->
                <div
                class="absolute w-[420px] h-[420px]
                rounded-full
                bg-gradient-to-br
                from-[#2f5d50]/10
                to-[#2f5d50]/5
                blur-3xl">
                </div>

                <!-- Logo Container -->
                <div
                class="relative
                w-[340px]
                h-[340px]
                rounded-full
                bg-white
                border border-slate-200
                shadow-[0_20px_60px_rgba(0,0,0,0.08)]
                flex items-center justify-center">

                    <img
                    src="{{ asset('images/logo.png') }}"
                    class="w-[220px] object-contain"
                    alt="Logo">

                </div>

            </div>

        </div>

    </section>

    <!-- FOOTER -->
    <footer class="w-full bg-[#2f5d50] py-6 mt-auto">
        <div class="max-w-7xl mx-auto px-8 flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/harkat.png') }}" alt="Logo Universitas" class="w-10 h-10 object-contain">
                <span class="font-bold text-white tracking-tight">Universitas Harkat Negeri</span>
            </div>
            <p class="text-[13px] font-semibold text-white text-center sm:text-right">
                © 2026 Chika Aulia Christine | Universitas Harkat Negeri
            </p>
        </div>
    </footer>

    <!-- MODAL LOGIN -->
    <div id="loginModal"
    class="fixed inset-0 bg-black/40 backdrop-blur-sm
    hidden items-center justify-center z-50">

        <div class="bg-white w-[420px]
        p-7 rounded-xl
        shadow-2xl relative animate-fadeIn mx-4">

            <!-- CLOSE -->
            <button onclick="closeModal()"
            class="absolute top-5 right-5
            text-slate-400 hover:text-red-500 transition-all">

                <i class="fas fa-times"></i>

            </button>

            <!-- TITLE -->
            <h2 class="text-2xl font-semibold text-slate-800 mb-2">
                Pilih Jenis Login
            </h2>

            <p class="text-sm text-slate-400 mb-8">
                Masuk sesuai akses akun yang digunakan
            </p>

            <!-- MENU -->
            <div class="space-y-4">

                <!-- ADMIN -->
                <a href="/login-admin"
                class="group flex items-center gap-5
                p-5 rounded-xl border border-slate-200
                hover:border-[#2f5d50]/20
                hover:bg-[#edf5f2]
                transition-all">

                    <div class="w-14 h-14 rounded-xl
                    bg-[#edf5f2]
                    text-[#2f5d50]
                    flex items-center justify-center text-xl">

                        <i class="fas fa-user-shield"></i>

                    </div>

                    <div>

                        <h3 class="font-bold text-slate-800
                        group-hover:text-[#2f5d50] transition-all">

                            Login sebagai Admin

                        </h3>

                        <p class="text-sm text-slate-400 mt-1">
                            Kelola sistem inventaris sekolah
                        </p>

                    </div>

                </a>

                <!-- USER -->
                <a href="/login-user"
                class="group flex items-center gap-5
                p-5 rounded-xl border border-slate-200
                hover:border-[#2f5d50]/20
                hover:bg-[#edf5f2]
                transition-all">

                    <div class="w-14 h-14 rounded-xl
                    bg-[#edf5f2]
                    text-[#2f5d50]
                    flex items-center justify-center text-xl">

                        <i class="fas fa-user"></i>

                    </div>

                    <div>

                        <h3 class="font-bold text-slate-800
                        group-hover:text-[#2f5d50] transition-all">

                            Login sebagai Peminjam

                        </h3>

                        <p class="text-sm text-slate-400 mt-1">
                            Ajukan peminjaman barang inventaris
                        </p>

                    </div>

                </a>

            </div>

        </div>

    </div>

    <!-- SCRIPT -->
    <script>

        function openModal() {

            const modal = document.getElementById('loginModal');

            modal.classList.remove('hidden');

            modal.classList.add('flex');

        }

        function closeModal() {

            const modal = document.getElementById('loginModal');

            modal.classList.add('hidden');

            modal.classList.remove('flex');

        }

        window.addEventListener('click', function(e) {

            const modal = document.getElementById('loginModal');

            if (e.target === modal) {

                closeModal();

            }

        });

    </script>

</body>
</html>