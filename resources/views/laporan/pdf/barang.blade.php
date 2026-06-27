<!DOCTYPE html>
<html>
<head>
    <title>Laporan Barang</title>

    <style>

        body{
            font-family: sans-serif;
        }

        h2{
            text-align:center;
            margin-bottom:20px;
        }

        table{
            width:100%;
            border-collapse: collapse;
        }

        th, td{
            border:1px solid black;
            padding:10px;
            font-size:14px;
        }

        th{
            background: green;
            color:white;
        }

    </style>

</head>
<body>

    <h2>Laporan Data Barang</h2>

    <table class="min-w-full divide-y divide-slate-200">

        <thead class="bg-slate-50">

            <tr>

                <th>No</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Jumlah</th>

            </tr>

        </thead>

        <tbody class="divide-y divide-slate-100 card-modern">

            @foreach($barang as $item)

            <tr>

                <td>{{ $loop->iteration }}</td>

                <td>{{ $item->nama_barang }}</td>

                <td>{{ $item->kategori }}</td>

                <td>{{ $item->stok }}</td>

            </tr>

            @endforeach

        </tbody>

    </table>

</body>
</html>