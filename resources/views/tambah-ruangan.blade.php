<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Ruangan</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(.95);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .animate-fadeIn {
            animation: fadeIn .25s ease;
        }

    </style>

</head>

<body class="bg-[#f4fff8] min-h-screen overflow-hidden">

    <!-- OVERLAY -->
    <div class="fixed inset-0 bg-black/20 backdrop-blur-[2px] flex items-center justify-center p-6">

        <!-- MODAL -->
        <div class="w-full max-w-4xl card-modern rounded-xl shadow-2xl p-10 border border-slate-100 relative animate-fadeIn">

            <!-- CLOSE -->
            <a href="/data-ruangan"
               class="absolute top-6 right-6 text-slate-400 hover:text-slate-700 text-2xl font-bold">

                ×

            </a>

            <!-- HEADER -->
            <div class="mb-10">

                <h1 class="text-4xl font-semibold text-slate-800">
                    Tambah Ruangan
                </h1>

                <p class="text-slate-400 mt-2">
                    Tambahkan data ruangan inventaris sekolah
                </p>

            </div>

            <!-- FORM -->
            <form action="{{ route('ruangan.simpan') }}"
                  method="POST"
                  class="space-y-8">

                @csrf

                <!-- ROW 1 -->
                <div class="grid grid-cols-2 gap-6">

                    <!-- NAMA -->
                    <div>

                        <label class="block text-sm font-semibold text-slate-600 mb-3">
                            Nama Ruangan
                        </label>

                        <input type="text"
                               name="nama_ruangan"
                               placeholder="Contoh: Lab Komputer TKJ"
                               class="w-full border border-slate-200 rounded-xl px-5 py-4 outline-none focus:ring-2 focus:ring-green-400">

                    </div>

                    <!-- KODE -->
                    <div>

                        <label class="block text-sm font-semibold text-slate-600 mb-3">
                            Kode Ruangan
                        </label>

                        <input type="text"
                               name="kode_ruangan"
                               placeholder="RNG-001"
                               class="w-full border border-slate-200 rounded-xl px-5 py-4 outline-none focus:ring-2 focus:ring-green-400">

                    </div>

                </div>

                <!-- ROW 2 -->
                <div class="grid grid-cols-2 gap-6">

                    <!-- PJ -->
                    <div>

                        <label class="block text-sm font-semibold text-slate-600 mb-3">
                            Penanggung Jawab
                        </label>

                        <input type="text"
                               name="penanggung_jawab"
                               placeholder="Nama Guru / Staff"
                               class="w-full border border-slate-200 rounded-xl px-5 py-4 outline-none focus:ring-2 focus:ring-green-400">

                    </div>

                    <!-- KAPASITAS -->
                    <div>

                        <label class="block text-sm font-semibold text-slate-600 mb-3">
                            Kapasitas
                        </label>

                        <input type="number"
                               name="kapasitas"
                               placeholder="40"
                               class="w-full border border-slate-200 rounded-xl px-5 py-4 outline-none focus:ring-2 focus:ring-green-400">

                    </div>

                </div>

                <!-- ROW 3 -->
                <div class="grid grid-cols-2 gap-6">

                    <!-- LOKASI -->
                    <div>

                        <label class="block text-sm font-semibold text-slate-600 mb-3">
                            Lokasi Gedung
                        </label>

                        <select name="lokasi"
                                class="w-full border border-slate-200 rounded-xl px-5 py-4 outline-none focus:ring-2 focus:ring-green-400 card-modern">

                            <option value="Gedung A">Gedung A</option>
                            <option value="Gedung B">Gedung B</option>
                            <option value="Gedung C">Gedung C</option>

                        </select>

                    </div>

                    <!-- JENIS -->
                    <div>

                        <label class="block text-sm font-semibold text-slate-600 mb-3">
                            Jenis Ruangan
                        </label>

                        <select name="jenis"
                                class="w-full border border-slate-200 rounded-xl px-5 py-4 outline-none focus:ring-2 focus:ring-green-400 card-modern">

                            <option value="Laboratorium">Laboratorium</option>
                            <option value="Kelas">Kelas</option>
                            <option value="Gudang">Gudang</option>
                            <option value="Kantor">Kantor</option>

                        </select>

                    </div>

                </div>

                <!-- DESKRIPSI -->
                <div>

                    <label class="block text-sm font-semibold text-slate-600 mb-3">
                        Deskripsi
                    </label>

                    <textarea rows="5"
                              name="deskripsi"
                              placeholder="Tambahkan keterangan ruangan..."
                              class="w-full border border-slate-200 rounded-xl px-5 py-4 outline-none focus:ring-2 focus:ring-green-400"></textarea>

                </div>

                <!-- BUTTON -->
                <div class="flex gap-4 pt-5">

                    <button type="submit"
                            class="flex-1 bg-[#2F5D50] hover:bg-[#3F7465]-500 hover:bg-[#3f7465] text-white py-4 rounded-xl font-semibold transition shadow-sm shadow-green-100">

                        <i class="fas fa-save mr-2"></i>
                        Simpan Ruangan

                    </button>

                    <a href="/data-ruangan"
                       class="flex-1 bg-slate-100 hover:bg-slate-200 text-slate-700 py-4 rounded-xl font-semibold text-center transition">

                        Batal

                    </a>

                </div>

            </form>

        </div>

    </div>

</body>
</html>