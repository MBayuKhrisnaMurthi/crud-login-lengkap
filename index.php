<?php
    require "functions.php";
    $producs = query("SELECT * FROM producs");
?>
<html>
<head>
    <title>Halaman Admin</title>
</head>
<body>
    <h1>Daftar Barang</h1>
    <a href="tambah.php">Tambah</a><br><br>
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
            <a href="ubah.php">Ubah</a> |
            <a href="hapus.php?id=<?= $produc['id']; ?>">Hapus</a>
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