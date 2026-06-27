<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profil Admin</title>

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

<body class="bg-[#f5f7f6] min-h-screen">

    <!-- WRAPPER -->
    <div class="w-full min-h-screen">

        <!-- HEADER -->
        <div class="flex items-center justify-between px-6 py-14">

            <div>

                <h1 class="text-2xl font-semibold text-slate-800">
                    Profil Admin
                </h1>

                <p class="text-xs text-slate-400 mt-1">
                    Informasi akun administrator inventaris
                </p>

            </div>

            <!-- BUTTON -->
            <a href="/dashboard-admin"
            class="bg-[#2f5d50]
            hover:bg-[#3f7465]
            text-white
            text-sm
            px-4
            py-2
            rounded-xl
            transition-all duration-300
            shadow-sm">

                Kembali

            </a>

        </div>

        <!-- CONTENT -->
        <div class="px-8 pb-8">

            <div class="bg-white
                        rounded-2xl
                        border border-slate-300
                        shadow-sm
                        overflow-hidden">

                <!-- TOP -->
                <div class="bg-[#f8faf9]
                            px-6 py-5
                            border-b border-slate-100">

                    <div class="flex items-center gap-4">

                        <!-- FOTO -->
                        @if($user->photo)

                            <img src="{{ asset('storage/' . $user->photo) }}"
                                 class="w-16 h-16
                                 rounded-xl
                                 shadow-sm
                                 object-cover">

                        @else

                            <div class="w-16 h-16
                                        rounded-xl
                                        shadow-sm
                                        bg-[#2f5d50]
                                        flex items-center justify-center
                                        text-white text-lg">

                                {{ strtoupper(substr($user->name, 0, 2)) }}

                            </div>

                        @endif

                        <!-- INFO -->
                        <div>

                            <h2 class="text-lg font-semibold text-slate-800">

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
                        <div class="bg-slate-50/80
                                    border border-slate-100
                                    rounded-xl
                                    p-4
                                    transition-all duration-300
                                    hover:shadow-md">

                            <p class="text-xs
                                        font-semibold
                                        text-slate-300
                                        uppercase
                                        tracking-widest
                                      mb-2">

                                Username

                            </p>

                            <h2 class="text-base font-medium text-slate-700">

                                {{ $user->name }}

                            </h2>

                        </div>

                        <!-- EMAIL -->
                        <div class="bg-slate-50/80
                                    border border-slate-100
                                    rounded-xl
                                    p-4
                                    transition-all duration-300
                                    hover:shadow-md">

                            <p class="text-xs
                                        font-semibold
                                        text-slate-300
                                        uppercase
                                        tracking-widest
                                      mb-2">

                                Email

                            </p>

                            <h2 class="text-base font-medium text-slate-700 break-all">

                                {{ $user->email }}

                            </h2>

                        </div>

                        <!-- ROLE -->
                        <div class="bg-slate-50/80
                                    border border-slate-100
                                    rounded-xl
                                    p-4
                                    transition-all duration-300
                                    hover:shadow-md">

                            <p class="text-xs
                                        font-semibold
                                        text-slate-300
                                        uppercase
                                        tracking-widest
                                      mb-2">

                                Role

                            </p>

                            <h2 class="text-base font-medium text-slate-700">

                                Administrator

                            </h2>

                        </div>

                        <!-- STATUS -->
                        <div class="bg-slate-50/80
                                    border border-slate-100
                                    rounded-xl
                                    p-4
                                    transition-all duration-300
                                    hover:shadow-md">

                            <p class="text-xs
                                      font-semibold
                                      text-slate-300
                                      uppercase
                                      tracking-widest
                                      mb-2">

                                Status

                            </p>

                            <span class="inline-block
                                        bg-[#edf7f3]
                                        text-[#2f5d50]
                                         px-3 py-1
                                         rounded-full
                                         text-xs
                                         font-medium">

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