<?php
$conn = mysqli_connect("localhost", "root", "", "pw2024_tubes_233040053");



function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}


function tambah($data){
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $gambar = upload();
    if(!$gambar) {
        return false;
    }

    $kota = htmlspecialchars($data["kota"]);
    $tanggal = htmlspecialchars($data["tanggal"]);


    $query = "INSERT INTO travel
            VALUES
           ('', '$nama', '$gambar', '$kota', '$tanggal')
        ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function delete($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM travel WHERE id = $id");

    return mysqli_affected_rows($conn);  
}



function update($data) {
    global $conn;

    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $gambarLama = htmlspecialchars($data["gambar"]);
    if($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }
    $kota = htmlspecialchars($data["kota"]);
    $tanggal = htmlspecialchars($data["tanggal"]);

    $query = "UPDATE travel SET
            nama = '$nama',
            gambar = '$gambar',
            kota = '$kota',
            tanggal = '$tanggal'
            WHERE id  = '$id'
            ";
    mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);
}

function cari($keyword){
    $query = "SELECT * FROM travel 
                WHERE
                nama LIKE '%$keyword%' OR
                kota LIKE '%$keyword%' OR
                tanggal LIKE '%$keyword%'
                ";
    return query($query);
}


?>