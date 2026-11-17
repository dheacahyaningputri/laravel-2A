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
        .form-card {
            max-width: 500px;
            margin: 0 auto;
            background: #ffffff;
            padding: 36px;
            border-radius: 20px;
            border: 1px solid #ece7f6;
            box-shadow: 0 12px 32px rgba(149, 138, 179, 0.1);
        }
        h1 {
            margin-top: 0;
            margin-bottom: 24px;
            font-size: 22px;
            font-weight: 700;
            color: #3d384c;
            text-align: center;
            border-bottom: 1.5px solid #f2eef9;
            padding-bottom: 16px;
        }
        .form-group { margin-bottom: 18px; }
        label { display: block; margin-bottom: 7px; font-weight: 600; font-size: 13.5px; color: #5b566b; }
        input[type="text"], textarea, select {
            width: 100%;
            padding: 11px 14px;
            background-color: #faf9fc;
            border: 1.5px solid #e5dff2;
            border-radius: 12px;
            font-size: 14px;
            color: #3d384c;
            transition: all 0.2s ease;
        }
        input[type="text"]:focus, textarea:focus, select:focus {
            outline: none;
            background-color: #ffffff;
            border-color: #fcd34d;
            box-shadow: 0 0 0 4px rgba(253, 230, 138, 0.35);
        }
        .btn-group { display: flex; gap: 12px; margin-top: 26px; }
        .btn-update {
            flex: 1;
            background-color: #fde68a;
            color: #78551a;
            border: none;
            padding: 13px;
            border-radius: 12px;
            font-size: 14.5px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        .btn-update:hover { background-color: #fcd34d; }
        .btn-back {
            background-color: #f1eff6;
            color: #6b667a;
            text-decoration: none;
            padding: 13px 20px;
            border-radius: 12px;
            font-size: 14.5px;
            font-weight: 600;
            text-align: center;
            transition: all 0.2s ease;
        }
        .btn-back:hover { background-color: #e4e0ee; }
    </style>
</head>
<body>
    <div class="form-card">
        <h1>{{$judul}}</h1>
        <form method="post" action="/employe/{{$employe->id}}">
            @method('put')
            @csrf
            <div class="form-group">
                <label>ID</label>
                <input type="text" name="id" value="{{$employe->id}}" readonly style="background-color: #f1eff6; color: #8c869c;">
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" value="{{$employe->nama}}" required>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" rows="3">{{$employe->alamat}}</textarea>
            </div>
            <div class="form-group">
                <label>Gender</label>
                <select name="gender">
                    <option value="L" {{$employe->gender === 'L' ? 'selected' : ''}}>Laki-laki</option>
                    <option value="P" {{$employe->gender === 'P' ? 'selected' : ''}}>Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label>Gaji</label>
                <input type="text" name="gaji" value="{{$employe->gaji}}">
            </div>
            <div class="btn-group">
                <a href="/employe" class="btn-back">Batal</a>
                <button type="submit" class="btn-update">Update</button>
            </div>
        </form>
    </div>
</body>
</html>
