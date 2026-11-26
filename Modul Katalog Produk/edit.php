<?php
require "koneksi.php";

$id = $_GET["id"];

$sql = "SELECT * FROM katalog_produk WHERE id_produk = ?";
$stmt = mysqli_prepare($koneksi, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$hasil = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($hasil);
?>

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

                        <form action="proses_update.php" method="POST">
                            
                            
                            <input type="hidden" name="id_produk" value="<?= $row["id_produk"] ?>">

                            <div class="mb-3">
                                <label for="nama_produk" class="form-label fw-bold">Nama Produk</label>
                                <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?= $row["Nama_produk"] ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="warna" class="form-label fw-bold">Warna Produk</label>
                                <input type="text" class="form-control" id="warna" name="warna" value="<?= $row["Warna_produk"] ?>" required>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="berat" class="form-label fw-bold">Berat</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="berat" name="berat" value="<?= $row["Berat"] ?>" required>
                                        <span class="input-group-text">gram</span>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="merk" class="form-label fw-bold">Merk / Nama UMKM</label>
                                    <input type="text" class="form-control" id="merk" name="merk" value="<?= $row["Merk"] ?>" required>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <a href="index.php" class="btn btn-outline-secondary">Kembali ke Katalog</a>
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