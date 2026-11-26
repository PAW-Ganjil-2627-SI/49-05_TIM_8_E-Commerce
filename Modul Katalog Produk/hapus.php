<?php
require "koneksi.php";
$id = $_GET["id"];

$sql = "DELETE FROM katalog_produk WHERE id_produk = ?";

$stmt = mysqli_prepare($koneksi, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

header("Location: index.php");
exit;
?>