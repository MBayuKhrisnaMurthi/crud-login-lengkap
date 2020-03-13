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
?>