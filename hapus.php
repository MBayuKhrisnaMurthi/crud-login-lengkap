<?php
require "functions.php";

    //if no login
    if (!isset($_SESSION['login'])) {
        //v1
        // echo "<script>
        //             alert('login terlebih dahulu');
        //             document.location.href='login.php';
        //         </script>
        //         ";
        
        //v2
        header("Location: login.php");
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