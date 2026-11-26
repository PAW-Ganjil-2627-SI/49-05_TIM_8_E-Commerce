<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pelanggan & Alamat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: darkslategray">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Toko Online UMKM</a> 
            <div class="navbar-nav ms-auto">
            <div class="navbar-nav">
                <a class="nav-link active" href="{{ route('pelanggan.daftar') }}">Daftar Pelanggan</a>
                @auth
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link text-decoration-none text-light" style="padding: 0.5rem;">Logout ({{ Auth::user()->username }})</button>
                    </form>
                @else
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                @endauth
            </div>
        </div>
    </nav>

<div class="container py-4">
        <div class="kotak-konten p-4 border rounded bg-white">
            <h2 class="judul-halaman mb-4">Daftar Pelanggan & Alamat</h2>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover tabel-pelanggan">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No Hp</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat Pengiriman</th>

                            @auth
                            <th class="text-center" style="width: 15%;">Aksi</th>
                            @endauth
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pelanggan as $index => $row)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $row->nama }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->no_hp }}</td>
                                <td>{{ $row->jenis_kelamin }}</td>
                                <td>{{ $row->alamat_pengiriman }}</td>
                                
                                @can('kelola-data')
                                    <td class="text-center">
                                        <a href="{{ route('pelanggan.edit', $row->id) }}" class="btn btn-success btn-sm me-1">Edit</a>

                                        <form action="{{ route('pelanggan.destroy', $row->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </td>
                                @endcan
                            </tr>
                        @endforeach

                        @if ($pelanggan->isEmpty())
                            <tr>
                                <td colspan="7" class="text-center py-3 text-muted">Belum ada data pelanggan.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                @can('tambah-data')
                <a href="{{ route('pelanggan.create') }}" class="btn btn-success">Tambah Pelanggan</a>
                 @endcan
            </div>
        </div>
    </div>
</body>
</html>


    