<?php
session_start();
if (!isset($_SESSION['username'])) header("location:index.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website CRUD Data Barang</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

    <?php include "./component/navbar.php" ?>

    <div class="add_inventaris">
        <a href="./add.php?op=tambah">+ Tambah</a>
    </div>

    <div class="table_inventaris">
        <table class="table">
            <thead>
                <th>No</th>
                <th>ID</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Jenis</th>
                <th>Harga</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                <?php
                $api_url = "https://proyek-praktcc-ugk4rvctua-uc.a.run.app/barang";
                $data = file_get_contents($api_url);
                $inventaris = json_decode($data, true);
                foreach ($inventaris as $no => $data) {
                ?>
                    <tr>
                        <td><?= $no + 1 ?></td>
                        <td><?= $data["id"] ?></td>
                        <td><?= $data["nama"] ?></td>
                        <td><?= $data["jumlah"] ?></td>
                        <td><?= $data["jenis"] ?></td>
                        <td><?= $data["harga"] ?></td>
                        <td>
                            <a href="./add.php?op=edit&id=<?= $data["id"] ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                            <a href="./hapus.php?id=<?= $data["id"] ?>&nama=<?=$data["nama"]?>"><button type="button" class="btn btn-danger ms-1">Delete</button></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
