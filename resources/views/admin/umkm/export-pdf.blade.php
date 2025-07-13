<!DOCTYPE html>
<html>
<head>
    <title>Data UMKM</title>
    <style>
        table, th, td {
            border: 1px solid #000;
            border-collapse: collapse;
            padding: 5px;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Data UMKM Kelurahan Menanggal</h2>
    <table width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Usaha</th>
                <th>Pemilik</th>
                <th>Kategori</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($umkm as $i => $u)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $u->nama_usaha }}</td>
                <td>{{ $u->pemilik }}</td>
                <td>{{ $u->kategori }}</td>
                <td>{{ $u->alamat }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
