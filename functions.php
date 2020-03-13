<?php
$conn = mysqli_connect("Localhost", "root", "", "phpdasar");

function query($query){
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM producs");
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
    

?>