<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$judul}}</title>
    <link href="https://googleapis.com" rel="stylesheet">
    <style>
        * { box-sizing: border-box; font-family: 'Plus Jakarta Sans', sans-serif; }
        body {
            background: linear-gradient(135deg, #fdfbfb 0%, #f3effb 50%, #eef6f5 100%);
            min-height: 100vh;
            margin: 0;
            padding: 45px 20px;
            color: #4a4754;
        }
        .container {
            max-width: 980px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(10px);
            padding: 34px;
            border-radius: 20px;
            border: 1px solid #ece7f6;
            box-shadow: 0 12px 32px rgba(149, 138, 179, 0.1);
        }
        .header-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 26px;
            padding-bottom: 18px;
            border-bottom: 1.5px solid #f2eef9;
        }
        h1 { margin: 0; font-size: 24px; font-weight: 700; color: #3d384c; letter-spacing: -0.3px; }
        .btn-add {
            background-color: #b8e0d2;
            color: #245747;
            text-decoration: none;
            padding: 11px 20px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.2s ease;
        }
        .btn-add:hover { background-color: #a3d5c3; transform: translateY(-1px); }
        table { width: 100%; border-collapse: separate; border-spacing: 0 8px; }
        th {
            background-color: #ebe5f8;
            color: #5b4d7c;
            font-weight: 600;
            font-size: 13px;
            padding: 14px 16px;
            text-align: left;
            letter-spacing: 0.3px;
        }
        th:first-child { border-top-left-radius: 12px; border-bottom-left-radius: 12px; }
        th:last-child { border-top-right-radius: 12px; border-bottom-right-radius: 12px; text-align: center; }
        tbody tr { background-color: #ffffff; transition: all 0.2s ease; }
        tbody tr:hover { background-color: #faf8fe; transform: scale(1.003); }
        td {
            padding: 15px 16px;
            border-top: 1px solid #f4f1fa;
            border-bottom: 1px solid #f4f1fa;
            font-size: 14px;
        }
        td:first-child { border-left: 1px solid #f4f1fa; border-top-left-radius: 12px; border-bottom-left-radius: 12px; }
        td:last-child { border-right: 1px solid #f4f1fa; border-top-right-radius: 12px; border-bottom-right-radius: 12px; text-align: center; }
        .badge { padding: 5px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; }
        .badge-l { background-color: #dbeafe; color: #3b6ea5; }
        .badge-p { background-color: #fce7f3; color: #a84a7c; }
        .btn-edit {
            background-color: #fde68a;
            color: #78551a;
            border: none;
            padding: 8px 15px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 600;
            transition: all 0.2s ease;
        }
        .btn-edit:hover { background-color: #fcd34d; }
        .btn-delete {
            background-color: #fecdd3;
            color: #9f3344;
            border: none;
            padding: 8px 15px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 600;
            transition: all 0.2s ease;
        }
        .btn-delete:hover { background-color: #fda4af; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header-bar">
            <h1>{{$judul}}</h1>
            <a href="/employe/create" class="btn-add">+ Tambah Pegawai</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Gender</th>
                    <th>Gaji</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employes as $row)
                <tr>
                    <td><strong>#{{$row->id}}</strong></td>
                    <td style="font-weight: 500;">{{$row->nama}}</td>
                    <td>{{$row->alamat}}</td>
                    <td>
                        <span class="badge {{ $row->gender === 'L' ? 'badge-l' : 'badge-p' }}">
                            {{ $row->gender === 'L' ? 'Laki-laki' : 'Perempuan' }}
                        </span>
                    </td>
                    <td style="font-weight: 600; color: #3d384c;">Rp {{ number_format((float)$row->gaji, 0, ',', '.') }}</td>
                    <td>
                        <a href="/employe/edit/{{$row->id}}" style="text-decoration: none;">
                            <button type="button" class="btn-edit">Edit</button>
                        </a>
                        <form method="post" action="/employe/{{$row->id}}" style="display: inline-block; margin-left: 5px;" onsubmit="return confirm('Yakin ingin menghapus data pegawai ini?')">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn-delete">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
