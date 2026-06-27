<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">

    <title>
        Laporan Semua Inventaris
    </title>

    <style>

        body{
            font-family:sans-serif;
        }

        h1{
            text-align:center;
            margin-bottom:25px;
        }

        h2{
            margin-top:30px;
            margin-bottom:10px;
        }

        table{
            width:100%;
            border-collapse:collapse;
            margin-bottom:25px;
        }

        table, th, td{
            border:1px solid black;
        }

        th{
            background:#22c55e;
            color:white;
            padding:10px;
            font-size:12px;
        }

        td{
            padding:8px;
            font-size:11px;
        }

    </style>

</head>

<body>

    <h1>
        LAPORAN SEMUA INVENTARIS
    </h1>

    <!-- BARANG -->
    <h2>
        Data Barang
    </h2>

    <table class="min-w-full divide-y divide-slate-200">

        <tr>

            <th>No</th>

            <th>Nama Barang</th>

            <th>Kategori</th>

            <th>Stok</th>

        </tr>

        @foreach($barang as $b)

        <tr>

            <td>
                {{ $loop->iteration }}
            </td>

            <td>
                {{ $b->nama_barang }}
            </td>

            <td>
                {{ $b->kategori }}
            </td>

            <td>
                {{ $b->stok }}
            </td>

        </tr>

        @endforeach

    </table>

    <!-- ASET -->
    <h2>
        Data Aset
    </h2>

    <table class="min-w-full divide-y divide-slate-200">

        <tr>

            <th>No</th>

            <th>Nama Aset</th>

            <th>Kategori</th>

            <th>Kondisi</th>

            <th>Stok</th>

        </tr>

        @foreach($aset as $a)

        <tr>

            <td>
                {{ $loop->iteration }}
            </td>

            <td>
                {{ $a->nama_aset }}
            </td>

            <td>
                {{ $a->kategori }}
            </td>

            <td>
                {{ $a->kondisi }}
            </td>

            <td>
                {{ $a->stok }}
            </td>

        </tr>

        @endforeach

    </table>

    <!-- PEMINJAMAN -->
    <h2>
        Data Peminjaman
    </h2>

    <table class="min-w-full divide-y divide-slate-200">

        <tr>
            <th>No</th>
            <th>Nama Peminjam</th>
            <th>Barang / Aset</th>
            <th>Jumlah</th>
            <th>Tanggal Pinjam</th>
            <th>Status</th>
        </tr>

        @foreach($peminjaman as $p)

        <tr>

            <td>
                {{ $loop->iteration }}
            </td>

            <td>
                {{ optional($p->user)->name ?? '-' }}
            </td>

            <td>
                {{ $p->barang->nama_barang ?? optional($p->aset)->nama_aset ?? '-' }}
            </td>

            <td>
                {{ $p->jumlah }}
            </td>

            <td>
                {{ $p->tanggal_pinjam }}
            </td>

            <td>
                {{ ucfirst($p->status) }}
            </td>

        </tr>

        @endforeach

    </table>

</body>
</html>