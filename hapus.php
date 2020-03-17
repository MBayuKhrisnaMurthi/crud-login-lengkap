<?php
require "functions.php";

    //if no login
    if (!isset($_SESSION['login'])) {
        echo "<script>
                    alert('login terlebih dahulu');
                    document.location.href='login.php';
                </script>
                ";
    }

$id = $_GET["id"];

    if (hapus($id) > 0) {
        echo "<script>
                    alert('Data berhsail dihapus');
                    document.location.href='index.php';
                </script>
                ";
    }else{
        echo "<script>
                    alert('Data berhsail dihapus');
                    document.location.href='index.php';
                </script>
                ";
    }
?>