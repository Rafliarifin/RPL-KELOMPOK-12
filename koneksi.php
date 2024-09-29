<?php
$host = "localhost:3307";
$user = "root";
$password = "";
$database = "rental_mobil";

$kon = mysqli_connect($host, $user, $password, $database);
if (!$kon) {
    die("Koneksi gagal: " . mysqli_connect_error());
} else {
    echo "Koneksi berhasil!";
}

?>