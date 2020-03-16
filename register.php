<?php
require "functions.php";

if (isset($_POST["register"])) {
    if (register($_POST) > 0) {
        echo "<script>
            alert('data pengguna berhasil ditambah');
            document.location.href='login.php';
        </script>
        ";
    } else {
        echo "<script>
            alert('data pengguna gagal ditambah');
        </script>
        ";
    }
}
?>
<html>

<head>
    <title>Halaman Register</title>
</head>

<body>
    <h1>Register</h1>
</body>
<form action="" method="POST">
    <table cellpadding="10" border="1" cellspacing="0">
        <tr>
            <td><label for="username">username</label></td>
            <td><input type="text" name="username" id="username"></td>
        </tr>
        <tr>
            <td><label for="password">Password</label></td>
            <td><input type="password" name="password" id="password"></td>
        </tr>
        <tr>
            <td><label for="password2">Repeat Password</label></td>
            <td><input type="password" name="password2" id="password2"></td>
        </tr>
        <tr>
            <td></td>
            <td><button type="submit" name="register">Simpan</button></td>
        </tr>
    </table>
</form>

</html>