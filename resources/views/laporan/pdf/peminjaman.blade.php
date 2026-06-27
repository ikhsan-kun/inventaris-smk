<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">

    <title>
        Laporan Peminjaman
    </title>

    <style>

        body{
            font-family: sans-serif;
        }

        h1{
            text-align:center;
            margin-bottom:20px;
        }

        table{
            width:100%;
            border-collapse:collapse;
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
        LAPORAN PEMINJAMAN
    </h1>

<table>

    <tr>
        <th>No</th>
        <th>Nama Peminjam</th>
        <th>Barang / Aset</th>
        <th>Jumlah</th>
        <th>Tanggal Pinjam</th>
        <th>Status</th>
    </tr>

    @foreach($data as $d)

    <tr>

        <td>
            {{ $loop->iteration }}
        </td>

        <td>
            {{ optional($d->user)->name ?? '-' }}
        </td>

        <td>
            {{ $d->barang->nama_barang ?? optional($d->aset)->nama_aset ?? '-' }}
        </td>

        <td>
            {{ $d->jumlah }}
        </td>

        <td>
            {{ $d->tanggal_pinjam }}
        </td>

        <td>
            {{ ucfirst($d->status) }}
        </td>

    </tr>

    @endforeach

</table>

</body>
</html>