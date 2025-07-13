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

        th {
            background-color: #f0f0f0;
        }

        td.center, th.center {
            text-align: center;
        }

        a {
            color: blue;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Data UMKM Kelurahan Menanggal</h2>

    <table width="100%">
        <thead>
            <tr>
                <th class="center">No</th>
                <th>Nama Usaha</th>
                <th>Pemilik</th>
                <th class="center">Usia</th>
                <th>Pendidikan</th>
                <th>Deskripsi</th>
                <th>Alamat</th>
                <th class="center">RT</th>
                <th class="center">RW</th>
                <th>No. Telp</th>
                <th>Awal Usaha</th>
                <th>Kategori</th>
                <th>Foto</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($umkm as $i => $u)
            <tr>
                <td class="center">{{ $i + 1 }}</td>
                <td>{{ $u->nama_usaha }}</td>
                <td>{{ $u->pemilik }}</td>
                <td class="center">{{ $u->usia_pemilik }}</td>
                <td>{{ $u->pendidikan_terakhir }}</td>
                <td>{{ $u->deskripsi }}</td>
                <td>{{ $u->alamat }}</td>
                <td class="center">{{ $u->rt }}</td>
                <td class="center">{{ $u->rw }}</td>
                <td>{{ $u->no_telp }}</td>
                <td>{{ \Carbon\Carbon::parse($u->awal_mulai_usaha)->format('d/m/Y') }}</td>
                <td>{{ $u->kategori?->nama_kategori ?? '-' }}</td>
                <td>
                    @if ($u->foto)
                        <a href="{{ asset('storage/' . $u->foto) }}">Lihat Foto</a>
                    @else
                        -
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
