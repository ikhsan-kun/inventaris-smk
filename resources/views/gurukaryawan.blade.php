<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Guru & Karyawan</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-[#f4fff8] min-h-screen flex">

    <!-- SIDEBAR -->
    <aside class="w-64 card-modern border-r border-slate-200 min-h-screen p-6">

        <div class="flex items-center gap-3 mb-12">

            <div class="card-modern border border-slate-200 rounded-xl p-6 shadow-sm">
                <i class="fas fa-graduation-cap"></i>
            </div>

            <div>

                <h1 class="font-semibold text-slate-800">
                    SMK Al-Irsyad
                </h1>

                <p class="text-xs text-slate-400 uppercase">
                    Kota Tegal
                </p>

            </div>

        </div>

        <p class="text-xs font-bold text-slate-400 uppercase mb-4">
            Menu Utama
        </p>

        <div class="space-y-2">

            <a href="/dashboard"
               class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-500 hover:bg-[#2F5D50] hover:bg-[#3F7465]-50">

                <i class="fas fa-th-large"></i>
                <span>Dashboard</span>

            </a>

            <a href="/guru-karyawan"
               class="flex items-center gap-3 px-4 py-3 rounded-xl bg-[#2F5D50] hover:bg-[#3F7465]-50 text-[#2f5d50] border-r-4 border-green-500 font-bold">

                <i class="fas fa-users"></i>
                <span>Data Guru & Karyawan</span>

            </a>

            <a href="/siswa"
               class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-500 hover:bg-[#2F5D50] hover:bg-[#3F7465]-50">

                <i class="fas fa-user-graduate"></i>
                <span>Data Siswa</span>

            </a>

        </div>

    </aside>

    <!-- CONTENT -->
    <main class="flex-1 p-8">

        <!-- HEADER -->
        <div class="flex items-center justify-between mb-8">

            <div>

                <h1 class="text-3xl font-semibold text-slate-800">
                    Data Guru & Karyawan
                </h1>

                <p class="text-slate-400 mt-2">
                    Kelola data guru dan staff sekolah.
                </p>

            </div>

            <button class="bg-[#2F5D50] hover:bg-[#3F7465]-500 hover:bg-[#3f7465] text-white px-6 py-3 rounded-xl font-bold shadow-sm">

                + Tambah Data

            </button>

        </div>

        <!-- TABLE -->
        <div class="card-modern rounded-xl shadow-sm overflow-hidden">

            <table class="min-w-full divide-y divide-slate-200">

                <thead class="bg-slate-50">

                    <tr class="text-left text-slate-400 text-sm">

                        <th class="px-8 py-5">Nama</th>
                        <th class="px-8 py-5">Jabatan</th>
                        <th class="px-8 py-5">Email</th>
                        <th class="px-8 py-5">Aksi</th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-slate-100 card-modern">

                    <tr class="border-t">

                        <td class="px-8 py-5 font-semibold">
                            Admin Sekolah
                        </td>

                        <td class="px-8 py-5 text-slate-500">
                            Guru
                        </td>

                        <td class="px-8 py-5 text-slate-500">
                            admin@gmail.com
                        </td>

                        <td class="px-8 py-5">

                            <button class="bg-yellow-100 text-yellow-600 px-4 py-2 rounded-xl mr-2">
                                Edit
                            </button>

                            <button class="bg-red-100 text-red-600 px-4 py-2 rounded-xl">
                                Hapus
                            </button>

                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

    </main>

</body>
</html>