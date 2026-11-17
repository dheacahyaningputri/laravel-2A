@extends('layout_admin')


@section('content')
<div class="top-bar">
    <div>
        <h2>{{ $judul }}</h2>
        <small>Daftar semua akun admin</small>
    </div>
    <div style="display:flex; gap:10px; align-items:center;">
        <span class="stat">Total: {{ $admins->count() }}</span>
        <a href="/admin/create" class="btn btn-primary">+ Tambah Admin</a>
    </div>
</div>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="table-wrap">
    <table class="tabel">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Dibuat</th>
                <th>Diubah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($admins as $row)
                <tr>
                    <td><span class="badge-id">{{ $row->id_admin }}</span></td>
                    <td>
                        <span class="avatar">{{ substr($row->username, 0, 1) }}</span>
                        <strong>{{ $row->username }}</strong>
                    </td>
                    <td class="muted">{{ $row->created_at }}</td>
                    <td class="muted">{{ $row->updated_at ?? '-' }}</td>
                    <td class="aksi">
                        <a href="/admin/{{ $row->id_admin }}/edit" class="btn btn-edit">Edit</a>
                        <form method="post" action="/admin/{{ $row->id_admin }}" style="display:inline-block;"
                              onsubmit="return confirm('Yakin hapus data ini?')">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-delete">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="kosong">Belum ada data admin.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection