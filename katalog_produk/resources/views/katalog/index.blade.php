<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modul Katalog Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <h1 class="text-center mb-4 text-primary">Katalog Produk</h1>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <!-- Tombol Tambah Produk: Hanya muncul jika user adalah ADMIN -->
            @auth
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('katalog.create') }}" class="btn btn-success">+ Tambah Produk</a>
                @else
                    <div></div> <!-- Spacer agar layout tetap rapi jika bukan admin -->
                @endif
            @else
                <div></div>
            @endauth
            
            <div>
                @auth
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-dark">Logout ({{ Auth::user()->username }})</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-sm btn-outline-primary">Login Admin</a>
                @endauth
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-12"> 
                <table class="table table-striped table-hover align-middle bg-white shadow-sm rounded">
                    <thead class="table-dark text-center">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Warna</th>
                            <th scope="col">Berat</th>
                            <th scope="col">Merk</th>
                            <!-- Kolom Aksi hanya ditampilkan ke admin, atau dibiarkan tapi isinya kondisional -->
                            @auth
                                @if(auth()->user()->role === 'admin')
                                    <th scope="col">Aksi</th>
                                @endif
                            @endauth
                        </tr>
                    </thead>
                    <tbody class="table-group-divider text-center">
                        @foreach ($katalog as $item)
                            <tr>
                                <th scope="row">{{ $item->id_produk }}</th>
                                <td>{{ $item->Nama_produk }}</td>
                                <td>{{ $item->Warna_produk }}</td>
                                <td>{{ $item->Berat }} gram</td>
                                <td>{{ $item->Merk }}</td>
                                
                                <!-- Tombol Aksi Edit & Hapus: Hanya muncul jika ADMIN -->
                                @auth
                                    @if(auth()->user()->role === 'admin')
                                        <td>
                                            <a href="{{ route('katalog.edit', $item->id_produk) }}" class="btn btn-warning btn-sm">Edit</a>
                                            
                                            <form action="{{ route('katalog.destroy', $item->id_produk) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>
                                    @endif
                                @endauth
                            </tr>
                        @endforeach

                        @if ($katalog->isEmpty())
                            <tr>
                                <td colspan="6" class="text-muted py-4">Belum ada data produk.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>