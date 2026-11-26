<?php
require "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_produk  = $_POST["nama_produk"];
    $warna_produk = $_POST["warna"];
    $berat        = $_POST["berat"];
    $merk         = $_POST["merk"];

    $sql = "INSERT INTO katalog_produk (Nama_produk, Warna_produk, Berat, Merk) VALUES (?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($koneksi, $sql);
    
    mysqli_stmt_bind_param($stmt, "ssis", $nama_produk, $warna_produk, $berat, $merk);
    
    mysqli_stmt_execute($stmt);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk - Katalog UMKM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white p-3">
                        <h4 class="card-title mb-0">Formulir Tambah Produk UMKM</h4>
                    </div>
                    <div class="card-body p-4">

                        <form action="" method="POST">
                            
                            <div class="mb-3">
                                <label for="nama_produk" class="form-label fw-bold">Nama Produk</label>
                                <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Masukkan nama produk" required>
                            </div>

                            <div class="mb-3">
                                <label for="warna" class="form-label fw-bold">Warna Produk</label>
                                <input type="text" class="form-control" id="warna" name="warna" placeholder="Masukkan warna produk" required>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="berat" class="form-label fw-bold">Berat</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="berat" name="berat" placeholder="0" required>
                                        <span class="input-group-text">gram</span>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="merk" class="form-label fw-bold">Merk / Nama UMKM</label>
                                    <input type="text" class="form-control" id="merk" name="merk" placeholder="Masukkan merk atau UMKM" required>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <a href="index.php" class="btn btn-outline-secondary">Kembali ke Katalog</a>
                                <button type="submit" class="btn btn-primary px-4">Simpan Produk</button>
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