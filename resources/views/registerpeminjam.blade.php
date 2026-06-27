<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <title>Register Peminjam</title>

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

                    👤

                </div>

                <h2 class="text-2xl font-semibold
                text-slate-800 tracking-tight">

                    Register Peminjam

                </h2>

                <p class="text-sm text-slate-500 mt-2">

                    Buat akun untuk mengajukan peminjaman inventaris sekolah.

                </p>

            </div>

            <!-- BODY -->
            <div class="px-8 pb-8">

                @if($errors->any())

                    <div class="bg-red-50
                    border border-red-100
                    text-red-500
                    text-sm
                    px-4 py-3 rounded-xl mb-4">

                        {{ $errors->first() }}

                    </div>

                @endif

                <form
                method="POST"
                action="{{ route('register.user') }}"
                autocomplete="off"
                class="space-y-4">

                    @csrf

                    <!-- NAMA -->
                    <div>

                        <label class="block
                        text-[11px]
                        font-semibold
                        uppercase
                        tracking-widest
                        text-slate-400
                        mb-2">

                            Nama Lengkap

                        </label>

                        <input
                        type="text"
                        name="name"
                        placeholder="Masukkan nama lengkap"
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

                    <!-- EMAIL -->
                    <div>

                        <label class="block
                        text-[11px]
                        font-semibold
                        uppercase
                        tracking-widest
                        text-slate-400
                        mb-2">

                            Email

                        </label>

                        <input
                        type="email"
                        name="email"
                        placeholder="Masukkan email"
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

                            Password

                        </label>

                        <input
                        type="password"
                        name="password"
                        placeholder="Masukkan password"
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

                    <!-- KONFIRMASI -->
                    <div>

                        <label class="block
                        text-[11px]
                        font-semibold
                        uppercase
                        tracking-widest
                        text-slate-400
                        mb-2">

                            Konfirmasi Password

                        </label>

                        <input
                        type="password"
                        name="password_confirmation"
                        placeholder="Ulangi password"
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

                        Register

                    </button>

                </form>

                <!-- LOGIN -->
                <a href="/login-user"
                   class="mt-5 flex items-center justify-center gap-2
                   text-sm font-semibold text-slate-500
                   hover:text-[#2f5d50]
                   transition">

                    ← Sudah punya akun? Login

                </a>

            </div>

        </div>

    </div>

</body>
</html>