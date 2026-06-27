<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Peminjaman</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#f4fff8] min-h-screen p-10">

    <div class="max-w-2xl mx-auto card-modern rounded-xl shadow-xl p-10">

        <h1 class="text-4xl font-semibold text-slate-800 mb-8">
            Form Peminjaman
        </h1>

        <form class="space-y-6">

            <div>

                <label class="block text-sm text-slate-400 mb-2">
                    Nama Barang
                </label>

                <input type="text"
                       value="{{ $barang->nama_barang }}"
                       class="w-full border rounded-xl px-5 py-4 bg-slate-50"
                       readonly>

            </div>

            <div>

                <label class="block text-sm text-slate-400 mb-2">
                    Nama Peminjam
                </label>

                <input type="text"
                       value="{{ session('user') }}"
                       class="w-full border rounded-xl px-5 py-4">

            </div>

            <div>

                <label class="block text-sm text-slate-400 mb-2">
                    Jumlah Pinjam
                </label>

                <input type="number"
                       class="w-full border rounded-xl px-5 py-4">

            </div>

            <button type="submit"
                    class="bg-[#2F5D50] hover:bg-[#3F7465]-500 hover:bg-[#3f7465] text-white px-8 py-4 rounded-xl font-bold">

                Ajukan Peminjaman

            </button>

        </form>

    </div>

</body>
</html>