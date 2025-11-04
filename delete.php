<?php

require_once(__DIR__ . '/koneksi.php'); //untuk memanggil file koneksi.php

$hapusNim = $_GET['nim'];
$sql = "DELETE FROM mahasiswa WHERE nim = ?";

$stmt = $connection->prepare($sql);
$stmt->bind_param("s", $hapusNim);
if($stmt->execute()){
    echo "Data berhasil dihapus.";
}
else{
    echo "Gagal menghapus data: ";
}

echo "<a href='read.php'>Kembali ke dashboard</a>";