<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profil Peminjam</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap"
          rel="stylesheet">

    <style>

        body{
            font-family: 'Poppins', sans-serif;
        }

    </style>

</head>

<body class="bg-[#f5f7f6] min-h-screen">

    <!-- WRAPPER -->
    <div class="w-full min-h-screen">

        <!-- HEADER -->
        <div class="flex items-center justify-between
                    px-8 py-6">

            <div>

                <h1 class="text-2xl text-slate-800">
                    Profil Peminjam
                </h1>

                <p class="text-sm text-slate-400 mt-1">
                    Informasi akun peminjam inventaris
                </p>

            </div>

            <!-- BUTTON -->
            <a href="/dashboard-peminjam"
               class="bg-[#2f5d50]
                hover:bg-[#3f7465]
               text-white text-sm
               px-5 py-2 rounded-xl
               transition">

                Kembali

            </a>

        </div>

        <!-- CONTENT -->
        <div class="px-8 pb-8">

            <div class="card-modern
                        rounded-xl
                        border border-slate-100
                        overflow-hidden">

                <!-- TOP -->
                <div class="bg-[#f7faf9]
                            px-8 py-6
                            border-b border-slate-100">

                    <div class="flex items-center gap-4">

                        <!-- FOTO -->
                        @if($user->photo)

                            <img src="{{ asset('storage/' . $user->photo) }}"
                                 class="w-16 h-16
                                 rounded-xl
                                 object-cover">

                        @else

                            <div class="w-16 h-16
                                        rounded-xl
                                        bg-[#2f5d50]
                                        flex items-center justify-center
                                        text-white text-xl">

                                {{ strtoupper(substr($user->name, 0, 2)) }}

                            </div>

                        @endif

                        <!-- INFO -->
                        <div>

                            <h2 class="text-xl text-slate-800">

                                {{ $user->name }}

                            </h2>

                            <p class="text-sm text-slate-400 mt-1">

                                {{ $user->email }}

                            </p>

                        </div>

                    </div>

                </div>

                <!-- BODY -->
                <div class="p-8">

                    <div class="grid md:grid-cols-2 gap-4">

                        <!-- USERNAME -->
                        <div class="bg-slate-50
                                    border border-slate-100
                                    rounded-xl
                                    p-5">

                            <p class="text-xs
                                      text-slate-400
                                      uppercase
                                      tracking-wider
                                      mb-2">

                                Username

                            </p>

                            <h2 class="text-base text-slate-700">

                                {{ $user->name }}

                            </h2>

                        </div>

                        <!-- EMAIL -->
                        <div class="bg-slate-50
                                    border border-slate-100
                                    rounded-xl
                                    p-5">

                            <p class="text-xs
                                      text-slate-400
                                      uppercase
                                      tracking-wider
                                      mb-2">

                                Email

                            </p>

                            <h2 class="text-base text-slate-700 break-all">

                                {{ $user->email }}

                            </h2>

                        </div>

                        <!-- ROLE -->
                        <div class="bg-slate-50
                                    border border-slate-100
                                    rounded-xl
                                    p-5">

                            <p class="text-xs
                                      text-slate-400
                                      uppercase
                                      tracking-wider
                                      mb-2">

                                Role

                            </p>

                            <h2 class="text-base text-slate-700">

                                Peminjam

                            </h2>

                        </div>

                        <!-- STATUS -->
                        <div class="bg-slate-50
                                    border border-slate-100
                                    rounded-xl
                                    p-5">

                            <p class="text-xs
                                      text-slate-400
                                      uppercase
                                      tracking-wider
                                      mb-2">

                                Status

                            </p>

                            <span class="inline-block
                                         bg-[#e7f3ef]
                                         text-[#2f5d50]
                                         px-4 py-1.5
                                         rounded-xl
                                         text-xs">

                                Aktif

                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>
</html>