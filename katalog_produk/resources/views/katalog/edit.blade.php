<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk - Katalog UMKM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card shadow-sm border-0">
                    <div class="card-header bg-warning text-dark p-3">
                        <h4 class="card-title mb-0">Formulir Edit Produk UMKM</h4>
                    </div>
                    <div class="card-body p-4">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('katalog.update', $katalog->id_produk) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="Nama_produk" class="form-label fw-bold">Nama Produk</label>
                                <input type="text" class="form-control" id="Nama_produk" name="Nama_produk" value="{{ old('Nama_produk', $katalog->Nama_produk) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="Warna_produk" class="form-label fw-bold">Warna Produk</label>
                                <input type="text" class="form-control" id="Warna_produk" name="Warna_produk" value="{{ old('Warna_produk', $katalog->Warna_produk) }}" required>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="Berat" class="form-label fw-bold">Berat</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="Berat" name="Berat" value="{{ old('Berat', $katalog->Berat) }}" required>
                                        <span class="input-group-text">gram</span>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="Merk" class="form-label fw-bold">Merk / Nama UMKM</label>
                                    <input type="text" class="form-control" id="Merk" name="Merk" value="{{ old('Merk', $katalog->Merk) }}" required>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <a href="{{ route('katalog.index') }}" class="btn btn-outline-secondary">Kembali ke Katalog</a>
                                <button type="submit" class="btn btn-warning px-4 text-dark fw-bold">Update Produk</button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>