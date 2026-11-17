@extends('layout_admin')


@section('content')
<div class="form-box">
    <h2>{{ $judul }}</h2>

    @if ($errors->any())
        <div class="alert alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="/admin">
        @csrf
        <div class="form-group">
            <label>ID Admin</label>
            <input type="number" name="id_admin" value="{{ old('id_admin') }}" placeholder="Contoh: 6">
        </div>
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" value="{{ old('username') }}" placeholder="Masukkan username">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Minimal 4 karakter">
        </div>
        <button type="submit" class="btn btn-primary">SIMPAN</button>
        <a href="/admin" class="btn btn-back">Kembali</a>
    </form>
</div>
@endsection