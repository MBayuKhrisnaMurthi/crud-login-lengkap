<?php
require "functions.php";

//ambil data sesuai id dulu
$id = $_GET["id"];
$result = mysqli_query($conn, "SELECT * FROM producs WHERE id = $id");
$row = mysqli_fetch_assoc($result);

    if (isset($_POST["submit"])) {
        
        if (ubah($_POST) > 0) {
            echo "<script>
                alert('Data berhsail diubah');
                document.location.href='index.php';
            </script>
            ";
        } else{
            echo "<script>
            alert('Data gagal diubah');
        </script>
        ";
        }
    }
?>
<html>
    <body>
        <h1>Ubah Data</h1>
        <a href="index.php">kembali</a><br><br>
        <form action="" method="POST" enctype="multipart/form-data">
        <table cellpadding="10">
            <tr>
                <td><input type="hidden" name="id" id="id" required value="<?= $row['id']; ?>"></td>
                <td><input type="hidden" name="gambarlama" id="gambarlama" required value="<?= $row['gambar']; ?>"></td>
            </tr>
            <tr>
                <td><label for="nama">nama:</label></td>
                <td><input type="text" name="nama" id="nama" required value="<?= $row['nama']; ?>"></td>
            </tr>
            <tr>
                <td><label for="kategori">kategori:</label></td>
                <td><input type="text" name="kategori" id="kategori" required value="<?= $row['kategori']; ?>"></td>
            </tr>
            <tr>
                <td><label for="panjang">panjang:</label></td>
                <td><input type="text" name="panjang" id="panjang" required value="<?= $row['panjang']; ?>"></td>
            </tr>
            <tr>
                <td><label for="lebar">lebar:</label></td>
                <td><input type="text" name="lebar" id="lebar" required value="<?= $row['lebar']; ?>"></td>
            </tr>
            <tr>
                <td><label for="tinggi">tinggi:</label></td>
                <td><input type="text" name="tinggi" id="tinggi" required value="<?= $row['tinggi']; ?>"></td>
            </tr>
            <tr>
                <td><label for="gambar">gambar:</label></td>
                <td><img src="img/<?= $row['gambar']; ?>"></td>
                <td><input type="file" name="gambar" id="gambar" required></td>
            </tr>
            <tr>
                <td><button type="submit" name="submit">Ubah Data!</button></td>
            </tr>
        </table>
        </form>
    </body>
</html>