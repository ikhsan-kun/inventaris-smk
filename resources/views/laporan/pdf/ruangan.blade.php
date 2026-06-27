<!DOCTYPE html>
<html>
<head>
    <title>Laporan Ruangan</title>
</head>
<body>

<h2>Laporan Data Ruangan</h2>

<table border="1" width="100%" cellpadding="5">

    <tr>
        <th>No</th>
        <th>Nama Ruangan</th>
        <th>Lokasi</th>
    </tr>

    @foreach($data as $item)

    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->nama_ruangan }}</td>
        <td>{{ $item->lokasi }}</td>
    </tr>

    @endforeach

</table>

</body>
</html>