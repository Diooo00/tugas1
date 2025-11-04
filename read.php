<?php

require_once(__DIR__."/koneksi.php");

$sql = "SELECT nim, nama FROM mahasiswa";
$result = $connection->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read</title>
</head>
<body>
    echo "<a href='create.php'>Tambah</a>";
    <table>
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Action</th>
        </tr>

        <?php if($result->num_rows > 0) : ?>
            <?php while($row = $result->fetch_assoc()) : ?>
                <tr>
                    <td><?= $row["nim"] ?></td>
                    <td><?= $row["nama"] ?></td>
                    <td>update <a href="delete.php?nim=<?= $row['nim'] ?>">delete</a></td>              
                </tr>
            <?php endwhile; ?>
        <?php else : ?>
            <tr>
                <td colspan="3">Data kosong</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>