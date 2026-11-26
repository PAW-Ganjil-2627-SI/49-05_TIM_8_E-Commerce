<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: darkslategray">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Toko Online UMKM</a> 
            <div class="navbar-nav">
                <a class="nav-link" href="{{ route('pelanggan.daftar') }}">Daftar Pelanggan</a>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="kotak-konten p-4 border rounded bg-white">
            <h2 class="judul-halaman mb-3">Edit Pelanggan</h2>

            <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST">
            @csrf
            @method('PUT')

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $pelanggan->nama) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $pelanggan->email) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="no_hp" class="form-label">No Hp</label>
                        <input type="tel" class="form-control" id="no_hp" name="no_hp" value="{{ old('no_hp', $pelanggan->no_hp) }}" required>
                    </div>
                    <div class="col-md-6">
                        <span class="form-label d-block">Jenis Kelamin</span>
                        <div class="form-check form-check-inline mt-2">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="lk" value="Laki-laki" @checked(old('jenis_kelamin', $pelanggan->jenis_kelamin) == 'Laki-laki')>
                                <label class="form-check-label" for="lk">Laki-laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="pr" value="Perempuan" @checked(old('jenis_kelamin', $pelanggan->jenis_kelamin) == 'Perempuan')>
                            <label class="form-check-label" for="pr">Perempuan</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="alamat_pengiriman" class="form-label">Alamat Pengiriman</label>
                        <textarea class="form-control" id="alamat_pengiriman" name="alamat_pengiriman" rows="3" required>{{ old('alamat_pengiriman', $pelanggan->alamat_pengiriman) }}</textarea>
                            </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success w-100 py-2 mt-2">Simpan Perubahan</button>
                <a href="{{ route('pelanggan.daftar') }}" class="btn btn-outline-secondary w-100 py-2 mt-2">Batal</a>
            </form>
        </div>
    </div>
</body>
</html>