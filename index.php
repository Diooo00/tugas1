<?php   
require(__DIR__ . "/koneksi.php");

$keyword = $_GET['keyword'] ?? '';
if ($keyword !== '') {
    $stmt = $connection->prepare("SELECT * FROM mahasiswa WHERE nama LIKE ?");
    $cari = "%{$keyword}%";
    $stmt->bind_param("s", $cari);
    $stmt->execute();
    $hasil = $stmt->get_result();
} else {
    $hasil = $connection->query("SELECT * FROM mahasiswa");
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
                <a href="index.php" class="nav-link active" aria-current="page" href="#">Home</a>
                <a href="tambahmahasiswa.php" class="nav-link" href="#">Tambah Mahasiswa</a>
            </div>
            </div>
        </div>
        </nav>
        
        <div class="container-md">
            <p class="h1">Daftar Mahasiswa</p>
        </div>

        <div class="container-md">
            <form class="container-fluid">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Mahasiswa" name="keyword" aria-label="Cari Mahasiswa" value="<?= htmlspecialchars($keyword) ?>"/>
                    <button class="btn btn-outline-secondary" type="submit">Cari</button>
                </div>
            </form>
        </div>

        <br>

        <div class="container-md">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                    <th scope="col">No.</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($hasil && $hasil->num_rows > 0) {
                        $no = 1;
                        while ($row = $hasil->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><h5><?= $no ?></h5></td>
                                <td><?= htmlspecialchars($row['nim']) ?></td>
                                <td><?= htmlspecialchars($row['nama']) ?></td>
                                <td><?= htmlspecialchars($row['jenis_kelamin']) ?></td>
                                <td>
                                    <a href="update.php?id=<?= $row['id'] ?>" class="btn btn-primary1">Update</a>
                                    <button class="btn btn-primary2" type="button" data-bs-toggle="modal" data-bs-target="#hapus<?= $row['id'] ?>">Delete</button>
                                </td>
                            </tr>

                            <div class="modal fade" id="hapus<?= $row['id'] ?>" tabindex="-1" aria-labelledby="hapuslabel<?= $row['id'] ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="hapuslabel<?= $row['id'] ?>">Hapus Data</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    
                                    <div class="modal-body">
                                        Apakah anda yakin menghapus mahasiswa dengan nama <strong><?= htmlspecialchars($row['nama']) ?></strong>?
                                    </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-primary2">Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $no++;
                        }
                    } else {
                        echo "<tr><td colspan='5' class='text-center'>Tidak ada data.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

  </body>
</html>