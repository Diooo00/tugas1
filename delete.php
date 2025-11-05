<?php
require(__DIR__ . "/koneksi.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $connection->prepare("DELETE FROM mahasiswa WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    header("Location: index.php");
    exit();
} else {
    echo "Mahasiswa tidak ditemukan.";
}