<?php

require_once(__DIR__ . '/koneksi.php'); //untuk memanggil file koneksi.php

$nim = "123240123";
$namaBaru = "Dimas Riski Ardiansyah";
$sql = "UPDATE mahasiswa SET nama = ? WHERE nim = ?";

$stmt = $connection->prepare($sql);
$stmt->bind_param("ss", $namaBaru, $nim);

if($stmt->execute()){
    echo "Data berhasil diupdate.";
}
else{
    echo "Gagal mengupdate data: ";
}