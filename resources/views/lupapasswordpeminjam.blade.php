<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <title>Lupa Password Peminjam</title>

    <script src="https://cdn.tailwindcss.com"></script>

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

<body class="min-h-screen flex items-center justify-center p-6">

    <div class="w-full max-w-md">

        <div class="bg-white
        border border-slate-200
        shadow-xl
        rounded-2xl
        overflow-hidden">

            <!-- HEADER -->
            <div class="px-8 pt-8 pb-6">

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

                <h2 class="text-2xl font-semibold
                text-slate-800 tracking-tight">

                    Reset Password

                </h2>

                <p class="text-sm text-slate-500 mt-2">

                    Atur ulang password akun peminjam inventaris sekolah.

                </p>

            </div>

            <!-- BODY -->
            <div class="px-8 pb-8">

                @if(session('error'))

                    <div class="bg-red-50
                    border border-red-100
                    text-red-500
                    text-sm
                    px-4 py-3 rounded-xl mb-4">

                        {{ session('error') }}

                    </div>

                @endif

                @if(session('success'))

                    <div class="bg-[#eef7f4]
                    border border-[#d9ebe4]
                    text-[#2f5d50]
                    text-sm
                    px-4 py-3 rounded-xl mb-4">

                        {{ session('success') }}

                    </div>

                @endif

                <form method="POST"
                      action="/reset-password-user"
                      autocomplete="off"
                      class="space-y-4">

                    @csrf

                    <!-- USERNAME -->
                    <div>

                        <label class="block
                        text-[11px]
                        font-semibold
                        uppercase
                        tracking-widest
                        text-slate-400
                        mb-2">

                            Username Peminjam

                        </label>

                        <input
                        type="text"
                        name="username"
                        autocomplete="off"
                        placeholder="Masukkan username peminjam"
                        class="w-full
                        bg-slate-50
                        border border-slate-200
                        rounded-xl
                        px-4 py-3
                        text-sm
                        focus:outline-none
                        focus:ring-2
                        focus:ring-[#2f5d50]/20
                        focus:border-[#2f5d50]"
                        required>

                    </div>

                    <!-- PASSWORD -->
                    <div>

                        <label class="block
                        text-[11px]
                        font-semibold
                        uppercase
                        tracking-widest
                        text-slate-400
                        mb-2">

                            Password Baru

                        </label>

                        <input
                        type="password"
                        name="password"
                        autocomplete="new-password"
                        placeholder="Masukkan password baru"
                        class="w-full
                        bg-slate-50
                        border border-slate-200
                        rounded-xl
                        px-4 py-3
                        text-sm
                        focus:outline-none
                        focus:ring-2
                        focus:ring-[#2f5d50]/20
                        focus:border-[#2f5d50]"
                        required>

                    </div>

                    <!-- BUTTON -->
                    <button
                    type="submit"
                    class="w-full
                    bg-[#2f5d50]
                    hover:bg-[#3f7465]
                    text-white
                    py-3
                    rounded-xl
                    text-sm
                    font-semibold
                    transition">

                        Simpan Password

                    </button>

                </form>

                <!-- KEMBALI -->
                <a href="/login-user"
                   class="mt-5 flex items-center justify-center gap-2
                   text-sm font-semibold text-slate-500
                   hover:text-[#2f5d50]
                   transition">

                    ← Kembali ke Login

                </a>

            </div>

        </div>

    </div>

</body>
</html>