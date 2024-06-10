<?php
session_start();

if( !isset($_SESSION["login"])){
  header("Location: login.php");
  exit;
}

require 'functions.php';

$travel = query("SELECT * FROM travel");


if(isset($_POST["cari"])){
  $travel = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.fstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integritas="sha384-QWTKZyjpPEjISv5WaRU90FeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="asset/css/style1.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Unpas Travel</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a href="logout.php" class="btn btn-secondry logout">Logout</a>
          </li>
        </ul>
        <form action="" method="post" class="d-flex" role="search">
          <input class="form-control me-2 from-cari" type="text" name="keyword" autofocus placeholder="Search" autocomplete="off" id="keyword">
          <button class="btn btn-outline-dark" type="submit" name="cari" id="tombol-cari">Search</button>
        </form>
      </div>
   </div>
</nav>

<div id="container">
    <h1>Travel</h1>
    <a href="tambah.php">Tambah Data</a>

    <table class="table">
        <thead>
        
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Nama Wisata</th>
            <th scope="col">Gambar</th>
            <th scope="col">Kota</th>
            <th scope="col">Tanggal Pemesanan</th>
            <th scope="col" class="aksi">Aksi</th>
            </tr>
        </thead>
        <tbody>

            <?php $i = 1; ?>
            <?php foreach( $travel as $row) : ?>
            <tr>
            <td><?= $i; ?></td>
            <td><?= $row["nama"]; ?></td>
            <td><img src="../asset/IMG/<?= $row["gambar"]; ?>" width="150"></td>
            <td><?= $row["kota"]; ?></td>
            <td><?= $row["tanggal"]; ?></td>
            <td> 
            <a href="update.php?id=<?= $row["id"]; ?>">update</a> |
            <a href="delete.php?id=<?=  $row["id"]; ?>" onclick="return confirm('yakin?');">delete</a>
            <a href="details.php?id=<?= $row["id"]; ?>" class="badge text-bg-dark text-decoration-none">details</a>

            </td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
    


</body>
</html>
