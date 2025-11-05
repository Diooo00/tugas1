<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require(__DIR__ . "/koneksi.php");
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jenis_kelaminn = $_POST['jenis_kelamin'];

    $query = "INSERT INTO mahasiswa (nim, nama, jenis_kelamin) VALUES (?, ?, ?)";
   
    $stmt = $connection->prepare($query);
   
    $stmt->bind_param('sss', $nim, $nama, $jenis_kelaminn);
   
    if ($stmt->execute()) {
        header("Location: index.php");
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
    $stmt->close();
    $connection->close();
    die();
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SPEDA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

        <nav class="navbar fixed-top navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
            <div class="container-md">
            <a class="navbar-brand" href="#">
                <img src="eyes.png" alt="Logo" width="35" height="35" class="d-inline-block align-text-center">
                Speda
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a href="index.php" class="nav-link" aria-current="page" href="#">Home</a>
                <a href="tambahmahasiswa.php" class="nav-link active" href="#">Tambah Mahasiswa</a>
            </div>
            </div>
        </div>
        </nav>
        
         <div class="container-md">
            <p class="h1">Tambah Mahasiswa</p>
            <br>
        </div>

        <div class="container-md">
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim" required>
                </div>

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label><br>
                    <input type="radio" id="laki" name="jenis_kelamin" value="Laki-laki" required> Laki-laki <br>
                    <input type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan" required> Perempuan
                </div>
                
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
        </div>

  </body>
</html>