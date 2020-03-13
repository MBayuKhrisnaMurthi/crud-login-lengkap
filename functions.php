<?php
$conn = mysqli_connect("Localhost", "root", "", "phpdasar");

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $kategori = htmlspecialchars($data["kategori"]);
    $panjang = htmlspecialchars($data["panjang"]);
    $lebar = htmlspecialchars($data["lebar"]);
    $tinggi = htmlspecialchars($data["tinggi"]);
    $gambar = htmlspecialchars($data["gambar"]);

    $query ="INSERT INTO producs VALUES
            ('','$nama','$kategori','$panjang','$lebar','$tinggi','$gambar')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM producs WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $kategori = htmlspecialchars($data["kategori"]);
    $panjang = htmlspecialchars($data["panjang"]);
    $lebar = htmlspecialchars($data["lebar"]);
    $tinggi = htmlspecialchars($data["tinggi"]);
    $gambar = htmlspecialchars($data["gambar"]);

    $query ="UPDATE producs SET
            nama = '$nama',
            kategori = '$kategori',
            panjang = '$panjang',
            lebar = '$lebar',
            tinggi = '$tinggi',
            gambar = '$gambar'
            WHERE id = $id";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function cari($keyword){
    $query = "SELECT * FROM producs WHERE
            nama LIKE '%$keyword%' OR
            kategori LIKE '%$keyword%'";
    return query($query);
}
?>