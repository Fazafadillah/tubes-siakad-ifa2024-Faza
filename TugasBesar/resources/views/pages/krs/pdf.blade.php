<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Laporan Data KRS</h2>
    <table>
        <thead>
            <tr><th>No</th><th>NPM</th><th>Nama</th><th>Kode Matkul</th><th>Nama Matkul</th></tr>
        </thead>
        <tbody>
            @foreach($dataKRS as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->mahasiswa->npm ?? '-' }}</td>
                <td>{{ $item->mahasiswa->nama ?? '-' }}</td>
                <td>{{ $item->matakuliah->kode_matakuliah ?? '-' }}</td>
                <td>{{ $item->matakuliah->nama_matakuliah ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>