<?php

if(strtolower($_SERVER["REQUEST_METHOD"]) == "post") {
   require(__DIR__ . "/koneksi.php");

   $nim = $_POST["nim"];
   $nama = $_POST["nama"];

   $sql = "INSERT INTO mahasiswa(nim, nama) values(?, ?)";

   $stmt = $connection->prepare($sql);

   $stmt->bind_param('ss', $nim, $nama);

   if($stmt->execute()) {
      echo "Data berhasil ditambah"; 
   } else {
      echo "Data gagal ditambah";
   }

   $stmt->close();
   $connection->close();
   echo "<a href='read.php'>Kembali ke dashboard</a>"; 
   die();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
   <form action="" method="post">
      <label for="nim">nim:</label>
      <input type="text" name="nim" id="nim">

      <label for="nama">nama:</label>
      <input type="text" name="nama" id="nama">

      <button type="submit">Kirim</button>
   </form>
</body>
</html>