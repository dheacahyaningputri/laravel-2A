@extends('template.dashboard')

@section('title', $judul)

@section('content')
<section class="page-heading">
    <div>
        <p class="eyebrow"><span aria-hidden="true"></span> DATA AKADEMIK</p>
        <h1>{{ $judul }}</h1>
        <p class="page-description">Kenali teman-teman dari Program Studi Sistem Informasi.</p>
    </div>
</section>

<section class="card student-card" aria-labelledby="student-list-heading">
    <div class="card-header">
        <div>
            <h2 id="student-list-heading">Daftar mahasiswa</h2>
            <p class="sub">Informasi mahasiswa yang terdaftar</p>
        </div>
        <span class="total"><span class="total-dot" aria-hidden="true"></span>{{ count($mahasiswa) }} Mahasiswa</span>
    </div>

    <div class="table-scroll" role="region" aria-label="Daftar mahasiswa" tabindex="0">
        <table>
            <thead>
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Gender</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mahasiswa as $mhs)
                    <tr>
                        <td>
                            <div class="nama-wrap">
                                <span class="avatar">{{ strtoupper(substr($mhs['nama'], 0, 1)) }}</span>
                                {{ $mhs['nama'] }}
                            </div>
                        </td>
                        <td>{{ $mhs['alamat'] }}</td>
                        <td>
                            <span class="badge {{ $mhs['gender'] === 'L' ? 'l' : 'p' }}">{{ $mhs['gender'] }}</span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="empty-state">Belum ada data mahasiswa untuk ditampilkan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
@endsection