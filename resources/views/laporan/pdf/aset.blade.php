<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">

    <title>
        Laporan Kondisi Aset
    </title>

    <style>

        body{
            font-family:sans-serif;
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
        LAPORAN KONDISI ASET
    </h1>

    <table class="min-w-full divide-y divide-slate-200">

        <tr>

            <th>No</th>

            <th>Nama Aset</th>

            <th>Kategori</th>

            <th>Kondisi</th>

            <th>Stok</th>

            <th>Lokasi</th>

        </tr>

        @foreach($data as $d)

        <tr>

            <td>
                {{ $loop->iteration }}
            </td>

            <td>
                {{ $d->nama_aset }}
            </td>

            <td>
                {{ $d->kategori }}
            </td>

            <td>
                {{ $d->kondisi }}
            </td>

            <td>
                {{ $d->stok }}
            </td>

            <td>
                {{ $d->lokasi }}
            </td>

        </tr>

        @endforeach

    </table>

</body>
</html>