<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pengaturan Profil</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    <style>

        body{
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

    </style>

</head>

<body class="bg-[#f8fafc] min-h-screen text-slate-700">

    <!-- WRAPPER -->
    <div class="w-full min-h-screen">

        <!-- HEADER -->
        <div class="flex items-center justify-between px-6 py-14">

            <div>

                <h1 class="text-2xl font-semibold text-slate-800">
                    Pengaturan Profil
                </h1>

                <p class="text-xs text-slate-400 mt-1">
                    Kelola akun administrator inventaris
                </p>

            </div>

            <a href="/dashboard-admin"
               class="bg-[#2f5d50]
               hover:bg-[#3b6e60]
               text-white text-sm font-medium
               px-4 py-2 rounded-xl
               transition-all duration-300">

                Kembali

            </a>

        </div>

        <!-- CONTENT -->
        <div class="px-8 pb-8">

        <div class="bg-white
                    rounded-xl
                    border border-slate-300
                    shadow-sm">

                <!-- TOP -->
                <div class="bg-[#f8faf9]
                            px-8 py-6
                            border-b border-slate-100">

                    <div class="flex items-center gap-4">

                        <!-- FOTO -->
                        @if($user->photo)

                            <img src="{{ asset('storage/' . $user->photo) }}"
                                 class="w-16 h-16 rounded-xl shadow-sm object-cover">

                        @else

                            <div class="w-16 h-16
                                        rounded-xl shadow-sm
                                        bg-[#2f5d50]
                                        flex items-center justify-center
                                        text-white text-lg font-semibold">

                                {{ strtoupper(substr($user->name, 0, 2)) }}

                            </div>

                        @endif

                        <!-- INFO -->
                        <div>

                            <h2 class="text-lg font-semibold text-slate-800">

                                {{ $user->name }}

                            </h2>

                            <p class="text-sm text-slate-500 mt-1">

                                {{ $user->email }}

                            </p>

                        </div>

                    </div>

                </div>

                <!-- FORM -->
                <form action="{{ route('profile.update') }}"
                      method="POST"
                      enctype="multipart/form-data"
                      class="p-6 space-y-4">

                    @csrf

                    @if ($errors->any())

                        <div class="bg-red-100
                                    text-red-600
                                    p-3
                                    rounded-xl">

                            {{ $errors->first() }}

                        </div>

                    @endif

                    <!-- SUCCESS -->
                    @if(session('success'))

                        <div class="bg-[#edf7f3]
                                    text-[#2f5d50]
                                    p-3
                                    rounded-xl">

                            {{ session('success') }}

                        </div>

                    @endif

                    <!-- ERROR -->
                    @if(session('error'))

                        <div class="bg-red-100
                                    text-red-600
                                    p-3
                                    rounded-xl">

                            {{ session('error') }}

                        </div>

                    @endif

                    <!-- FOTO -->
                    <div>

                        <label class="block
                                      text-xs
                                      font-semibold
                                      text-slate-300
                                      uppercase
                                      tracking-widest
                                      mb-2">

                            Foto Profil

                        </label>

                    <input type="file"
                        name="photo"
                        class="w-full
                                border border-slate-200
                                rounded-xl
                                px-4 py-2.5
                                text-sm">

                    </div>

                    <!-- USERNAME -->
                    <div>

                        <label class="block
                                      text-xs
                                      font-semibold
                                      text-slate-300
                                      uppercase
                                      tracking-widest
                                      mb-2">

                            Username

                        </label>

                        <input type="text"
                               name="name"
                               value="{{ $user->name }}"
                               class="w-full
                                      border border-slate-200
                                      rounded-xl
                                      px-4 py-2.5
                                      text-sm
                                      focus:outline-none
                                      focus:ring-2
                                      focus:ring-[#2f5d50]/20
                                      focus:border-[#2f5d50]">

                    </div>

                    <!-- EMAIL -->
                    <div>

                        <label class="block
                                      text-xs
                                      font-semibold
                                      text-slate-300
                                      uppercase
                                      tracking-widest
                                      mb-2">

                            Email

                        </label>

                        <input type="email"
                               name="email"
                               value="{{ $user->email }}"
                               class="w-full
                                      border border-slate-200
                                        rounded-xl
                                        px-4 py-2.5
                                      text-sm
                                      focus:outline-none
                                      focus:ring-2
                                      focus:ring-[#2f5d50]/20
                                      focus:border-[#2f5d50]">

                    </div>

                    <!-- PASSWORD -->
                    <div class="grid md:grid-cols-2 gap-4">

                        <!-- PASSWORD -->
                        <div>

                            <label class="block
                                          text-xs
                                          font-semibold
                                          text-slate-300
                                          uppercase
                                          tracking-widest
                                          mb-2">

                                Password Baru

                            </label>

                            <input type="password"
                                   name="password"
                                   value=""
                                   autocomplete="new-password"
                                   placeholder="Masukkan password baru"
                                   class="w-full
                                          border border-slate-200
                                            rounded-xl
                                            px-4 py-2.5
                                          text-sm
                                          focus:outline-none
                                          focus:ring-2
                                          focus:ring-[#2f5d50]/20
                                          focus:border-[#2f5d50]">

                        </div>

                        <!-- KONFIRMASI -->
                        <div>

                            <label class="block
                                          text-xs
                                          font-semibold
                                          text-slate-300
                                          uppercase
                                          tracking-widest
                                          mb-2">

                                Konfirmasi Password

                            </label>

                            <input type="password"
                                   name="password_confirmation"
                                   value=""
                                   autocomplete="new-password"
                                   placeholder="Konfirmasi password"
                                   class="w-full
                                          border border-slate-200
                                            rounded-xl
                                            px-4 py-2.5
                                          text-sm
                                          focus:outline-none
                                          focus:ring-2
                                          focus:ring-[#2f5d50]/20
                                          focus:border-[#2f5d50]">

                        </div>

                    </div>

                    <!-- BUTTON -->
                    <div class="flex gap-3 pt-2">

                        <button type="submit"
                                class="bg-[#2f5d50]
                                       hover:bg-[#3b6e60]
                                       text-white
                                       text-sm font-medium
                                       px-6 py-3
                                       rounded-xl
                                       transition-all duration-300">

                            Simpan Perubahan

                        </button>

                        <button type="reset"
                                class="bg-slate-100
                                       hover:bg-slate-200
                                       text-slate-600
                                       text-sm font-medium
                                       px-6 py-3
                                       rounded-xl
                                       transition-all duration-300">

                            Reset

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</body>
</html>