<?php
require 'functions.php';

$id = $_GET["id"];

$tvl = query("SELECT * FROM travel WHERE id = $id")[0];

 
if(isset($_POST["update"])) {

    if(update($_POST) > 0 ){
        echo "
            <script>
                alert('data berhasil diupdate!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo " <script>
                alert('data gagal diupdate!');
                document.location.href = 'index.php';
            </script>";
    }
    
}



?>

<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h1>Update data travel</h1>

    <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $tvl["id"];?>">
            <div class="mb-3">
                <label for="nama" class="form-label">nama</label>
                <input type="text" class="form-control" id="nama" name="nama" require
                value="<?= $tvl["nama"]; ?>">
                
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar"
                value="<?= $tvl["gambar"]; ?>">
            </div>
            <div class="mb-3">
                <label for="kota" class="form-label">kota</label>
                <input type="text" class="form-control" id="kota" name="kota"
                value="<?= $tvl["kota"]; ?>">
            </div>
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal Pemesanan</label>
                <input type="text" class="form-control" id="tanggal" name="tanggal"
                value="<?= $tvl["tanggal"]; ?>">
            </div>
            <button type="update" name="update" class="btn btn-dark">Update</button>
</form>
    
</body>
</html>