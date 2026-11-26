<?php
require "koneksi.php";
$hasil = mysqli_query($koneksi, "SELECT * FROM katalog_produk");
?>

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

        <div class="mb-3 text-end">
            <a href="Tambah.php" class="btn btn-success">+ Tambah Produk</a>
        </div>

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
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider text-center">
                        <?php while ($row = mysqli_fetch_assoc($hasil)) { ?>
                            <tr>
                                <th scope="row"><?= $row["id_produk"] ?></th>
                                <td><?= $row["Nama_produk"] ?></td>
                                <td><?= $row["Warna_produk"] ?></td>
                                <td><?= $row["Berat"] ?> gram</td>
                                <td><?= $row["Merk"] ?></td>
                                <td>
                                    <a href="edit.php?id=<?= $row["id_produk"] ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="hapus.php?id=<?= $row["id_produk"] ?>" onclick="return confirm('Yakin hapus data ini?')" class="btn btn-danger btn-sm">Hapus</a>

                                    
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>