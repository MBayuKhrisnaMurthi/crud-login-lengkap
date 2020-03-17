<?php
session_start();

require "functions.php";

//if login
if (isset($_SESSION['login'])) {
    echo "<script>
                document.location.href='index.php';
            </script>
            ";
}

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    //cek username
    if (mysqli_num_rows($result) === 1) {
        //ambil datanya
        $row = mysqli_fetch_assoc($result);

        //cek password sesuai atau tidak
        if (password_verify($password, $row["password"])) {

            //generate session
            $_SESSION["login"] = true;

            echo "<script>
                alert('berhasil masuk');
                document.location.href='index.php';
            </script>
            ";
            exit;
        }
    }
    $error = true;
}
?>
<html>

<head>
    <title>Halaman Login</title>
</head>

<body>
    <h1>Login</h1>
    <?php if (isset($error)) : ?>
        <p style="color: red; font-style: italic;">username / password salah</p>
    <?php endif; ?>
    <form action="" method="POST">
        <table cellpadding="10" cellspacing="0" border="1">
            <tr>
                <td><label for="username">Username</label></td>
                <td><input type="text" name="username" id="username" autocomplete="off"></td>
            </tr>
            <tr>
                <td><label for="password">Password</label></td>
                <td><input type="password" name="password" id="password" autocomplete="off"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" name="login">Login</button></td>
            </tr>
        </table>
    </form>
</body>

</html>