@extends('admin.layout')

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

    <form method="post" action="/admin/{{ $admin->id_admin }}">
        @method('put')
        @csrf
        <div class="form-group">
            <label>ID Admin</label>
            <input type="text" value="{{ $admin->id_admin }}" readonly>
        </div>
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" value="{{ old('username', $admin->username) }}">
        </div>
        <div class="form-group">
            <label>Password Baru</label>
            <input type="password" name="password" placeholder="Kosongkan jika tidak ingin mengubah">
        </div>
        <button type="submit" class="btn btn-primary">UPDATE</button>
        <a href="/admin" class="btn btn-back">Kembali</a>
    </form>
</div>
@endsection