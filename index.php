<?php
session_start();

//if no login
    if (!isset($_SESSION['login'])) {
        // v1
        // echo "<script>
        //             alert('login terlebih dahulu');
        //             document.location.href='login.php';
        //         </script>
        //         ";

        //v2
        header("Location: login.php");
    }
    require "functions.php";
    $producs = query("SELECT * FROM producs ORDER BY id DESC");
    
    if (isset($_POST["cari"])) { 
        $producs = cari($_POST["keyword"]);
    }
?>
<html>
<head>
    <title>Halaman Admin</title>
</head>
<body>
    <h1>Daftar Barang</h1>
    <a href="logout.php">Logout</a><br><br>
    <a href="tambah.php">Tambah</a><br><br>
    <form action="" method="POST">
        <input type="text" name="keyword" autofocus autocomplete="off" placeholder="Masukan keyword pencarian!" size="30">
        <button type="submit" name="cari">Search</button>
    </form>
    <table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Aksi</th>
        <th>Gambar</th>
        <th>Nama</th>
        <th>Kategori</th>
        <th>Panjang</th>
        <th>Lebar</th>
        <th>Tinggi</th>
    </tr>
    <?php $i = 1; ?>
    <?php foreach ($producs as $produc) : ?>
    <tr>
        <td><?= $i; ?></td>
        <td>
            <a href="ubah.php?id=<?= $produc['id']; ?>">Ubah</a> |
            <a href="hapus.php?id=<?= $produc['id']; ?>" onclick="return confirm('Apakah anda Yakin?')">Hapus</a>
        </td>
        <td><img src="img/<?= $produc['gambar']; ?> " width="100"></td>
        <td><?= $produc['nama']; ?></td>
        <td><?= $produc['kategori']; ?></td>
        <td><?= $produc['panjang']; ?></td>
        <td><?= $produc['lebar']; ?></td>
        <td><?= $produc['tinggi']; ?></td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
    </table>
</body>
</html>