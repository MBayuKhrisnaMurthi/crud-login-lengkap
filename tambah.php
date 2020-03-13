<?php
require "functions.php";

    if (isset($_POST["submit"])) {
        
        if (tambah($_POST) > 0) {
            echo "<script>
                alert('Data berhsail ditambahkan');
                document.location.href='index.php';
            </script>
            ";
        } else{
            echo "<script>
            alert('Data gagal ditambahkan');
        </script>
        ";
        }
    }
?>
<html>
    <body>
        <h1>Tambah Data</h1>
        <a href="index.php">kembali</a><br><br>
        <form action="" method="POST">
        <table cellpadding="10">
            <tr>
                <td><label for="nama">nama:</label></td>
                <td><input type="text" name="nama" id="nama" required></td>
            </tr>
            <tr>
                <td><label for="kategori">kategori:</label></td>
                <td><input type="text" name="kategori" id="kategori" required></td>
            </tr>
            <tr>
                <td><label for="panjang">panjang:</label></td>
                <td><input type="text" name="panjang" id="panjang" required></td>
            </tr>
            <tr>
                <td><label for="lebar">lebar:</label></td>
                <td><input type="text" name="lebar" id="lebar" required></td>
            </tr>
            <tr>
                <td><label for="tinggi">tinggi:</label></td>
                <td><input type="text" name="tinggi" id="tinggi" required></td>
            </tr>
            <tr>
                <td><label for="gambar">gambar:</label></td>
                <td><input type="text" name="gambar" id="gambar" required></td>
            </tr>
            <tr>
                <td><button type="submit" name="submit">Tambah Data!</button></td>
            </tr>
        </table>
        </form>
    </body>
</html>