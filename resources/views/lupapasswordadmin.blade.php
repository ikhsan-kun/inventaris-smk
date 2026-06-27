<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <title>Lupa Password Admin</title>

    <!-- TAILWIND -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- FONT -->
    <style>

        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');

        body {

            font-family: 'Plus Jakarta Sans', sans-serif;

            background:
            radial-gradient(circle at top left, #edf5f2 0%, #f8fafc 45%, #f1f5f9 100%);

        }

    </style>

</head>

<body class="min-h-screen flex items-center justify-center p-6">

    <!-- WRAPPER -->
    <div class="w-full max-w-md">

        <!-- CARD -->
        <div class="bg-white
        border border-slate-200
        shadow-xl
        rounded-2xl
        overflow-hidden">

            <!-- TOP -->
            <div class="px-8 pt-8 pb-6">

                <!-- ICON -->
                <div class="w-16 h-16 rounded-xl
                bg-[#eef7f4]
                flex items-center justify-center
                text-[#2f5d50]
                shadow-inner mb-6">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-7 h-7"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M12 11c0-1.657 1.343-3 3-3s3 1.343 3 3v1h1a1 1 0 011 1v5a1 1 0 01-1 1H5a1 1 0 01-1-1v-5a1 1 0 011-1h1v-1a3 3 0 016 0v1h4v-1z"/>

                    </svg>

                </div>

                <!-- TITLE -->
                <h2 class="text-3xl font-semibold
                text-slate-800 tracking-tight leading-none">

                    Reset Password

                </h2>

                <!-- SUBTITLE -->
                <p class="text-sm text-slate-400 mt-3 leading-relaxed">

                    Atur ulang password akun admin inventaris sekolah.

                </p>

            </div>

            <!-- FORM -->
            <div class="px-8 pb-8">

                <!-- ERROR -->
                @if(session('error'))

                    <div class="bg-red-50
                    border border-red-100
                    text-red-500
                    text-sm
                    px-4 py-3 rounded-xl mb-5">

                        {{ session('error') }}

                    </div>

                @endif

                <!-- SUCCESS -->
                @if(session('success'))

                    <div class="bg-[#eef7f4]
                    border border-[#d9ebe4]
                    text-[#2f5d50]
                    text-sm
                    px-4 py-3 rounded-xl mb-5">

                        {{ session('success') }}

                    </div>

                @endif

                <!-- FORM -->
                <form method="POST"
                      action="/reset-password-admin"
                      autocomplete="off"
                      class="space-y-5">

                    @csrf

                    <!-- USERNAME -->
                    <div>

                        <label class="block
                        text-[11px]
                        font-semibold
                        tracking-widest
                        uppercase
                        text-slate-400 mb-3 px-1">

                            Username Admin

                        </label>

                        <input type="text"
                               name="username"
                               placeholder="Masukkan username admin"
                               autocomplete="off"
                               class="w-full
                               bg-slate-50
                               border border-slate-200
                               rounded-xl
                               px-5 py-4
                               text-sm
                               text-slate-700
                               focus:outline-none
                               focus:ring-4
                               focus:ring-[#2f5d50]/10
                               focus:border-[#2f5d50]
                               transition-all"
                               required>

                    </div>

                    <!-- PASSWORD -->
                    <div>

                        <label class="block
                        text-[11px]
                        font-semibold
                        tracking-widest
                        uppercase
                        text-slate-400 mb-3 px-1">

                            Password Baru

                        </label>

                        <input type="password"
                               name="password"
                               placeholder="Masukkan password baru"
                               autocomplete="new-password"
                               class="w-full
                               bg-slate-50
                               border border-slate-200
                               rounded-xl
                               px-5 py-4
                               text-sm
                               text-slate-700
                               focus:outline-none
                               focus:ring-4
                               focus:ring-[#2f5d50]/10
                               focus:border-[#2f5d50]
                               transition-all"
                               required>

                    </div>

                    <!-- BUTTON -->
                    <button type="submit"
                            class="w-full
                            bg-[#2f5d50]
                            hover:bg-[#3f7465]
                            text-white
                            py-4
                            rounded-xl
                            text-sm
                            font-bold
                            transition-all
                            shadow-sm shadow-[#2f5d50]/15">

                        Simpan Password

                    </button>

                </form>

                <!-- BACK -->
                <a href="/login-admin"
                   class="mt-6 flex items-center justify-center gap-2
                   text-sm font-semibold text-slate-500
                   hover:text-[#2f5d50]
                   transition-all">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-4 h-4"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M15 19l-7-7 7-7"/>

                    </svg>

                    Kembali ke Login

                </a>

            </div>

        </div>

    </div>

</body>
</html>