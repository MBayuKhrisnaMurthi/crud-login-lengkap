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

    $gambar = upload();
    if (!$gambar) {
        return false;
    }

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

    //jika mengubah gambar
    if ($_FILES['gambar']['error'] === 0) {
        $gambar = upload();
    } else{
        $gambar = htmlspecialchars($data["gambarlama"]);
    }

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

function upload(){
    $name = $_FILES['gambar']['name'];
    $tmp_name = $_FILES['gambar']['tmp_name'];
    $error = $_FILES['gambar']['error'];
    $size = $_FILES['gambar']['size'];

    //jika tidak upload gambar
    if ($error === 4) {
        echo "<script>
            alert('Silahkan pilih gambar terlebih dahulu');
        </script>
        ";
    }

    //yang diupload gambar atau bukan
    $ekstensivalid = ['jpg', 'jpeg', 'png'];
    $ekstensi = explode('.', $name);
    $ekstensi = strtolower(end($ekstensi));
    if (!in_array($ekstensi, $ekstensivalid)) {
        echo "<script>
            alert('Yang boleh diupload hanya gambar');
        </script>
        ";
    }

    //size photo max 2,5mb
    if ($size > 2500000) {
        echo "<script>
            alert('Ukuran gambar max hanya 2,5mb');
        </script>
        ";
    }

    //generate name photo
    $name = uniqid();
    $name .= '.';
    $name .= $ekstensi;

    //jika lolos ke3 seleksi
    move_uploaded_file($tmp_name, 'img/'. $name);

    return $name;
}
?>