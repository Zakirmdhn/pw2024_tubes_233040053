<?php
require '../Admin/functions.php';

$keyword = $_GET["keyword"];

$query = "SELECT * FROM travel WHERE
        nama LIKE '%$keyword%' OR 
        id_kota LIKE '%$keyword%' OR   
        tanggal LIKE '%$keyword%'
        ";
$travel = query($query);

?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nama Wisata</th>
            <th scope="col">Gambar</th>
            <th scope="col">Kota</th>
            <th scope="col">Tanggal Pemesanan</th>
            <th scope="col">Details</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($travel as $row) : ?>
            <tr>
                <th scope="row"><?= $i; ?></th>
                <td><?= $row['nama']; ?></td>
                <td><img src="../asset/IMG/?= $row["gambar"]; ?>" width="150"></td>
                <td><?= $row['id_kota']; ?></td>
                <td><?= $row['tahun']; ?></td>
                <td class="aksi">
              <a href="details.php?id=<?= $row["id"]; ?>" class="badge text-bg-dark text-decoration-none">details</a>
            </td>
                <td>
                    <a href="edit.php?id=<?= $row["id"]; ?>" class="badge text-bg-secondary text-decoration-none">Edit</a>
                    <a href="delete.php?id=<?= $row["id"]; ?>" class="badge text-bg-danger text-decoration-none" onclick="return confirm('yakin?');">Delete</a>
                </td>
            </tr>
            <?php $i++ ?>
        <?php endforeach; ?>
    </tbody>
</table>