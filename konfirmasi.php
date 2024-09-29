<?php
session_start();
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['nama'] = $_POST['nama'];
    $_SESSION['alamat'] = $_POST['alamat'];
    $_SESSION['no_telpon'] = $_POST['no_telpon'];
    $_SESSION['no_ktp_kk'] = $_POST['no_ktp_kk'];
    $_SESSION['durasi'] = $_POST['durasi'];

    $email = $_SESSION['email'];
    $nama = $_SESSION['nama'];
    $alamat = $_SESSION['alamat'];
    $no_telpon = $_SESSION['no_telpon'];
    $no_ktp_kk = $_SESSION['no_ktp_kk'];
    $durasi = $_SESSION['durasi'];
    $mobil = $_SESSION['mobil'];
    $harga = $_SESSION['harga'];

    $sql = "INSERT INTO penyewa (email, nama, alamat, no_telpon, no_ktp_kk, durasi, mobil, harga) VALUES
    ('$email', '$nama', '$alamat', '$no_telpon', '$no_ktp_kk', '$durasi', '$mobil', '$harga')";

    if (mysqli_query($kon, $sql)) {
        echo "<div class='container'>
                <h2>Konfirmasi Pemesanan</h2>
                <p>Email: $email</p>
                <p>Nama: $nama</p>
                <p>Alamat: $alamat</p>
                <p>No Telpon: $no_telpon</p>
                <p>No KTP/KK: $no_ktp_kk</p>
                <p>Mobil: $mobil</p>
                <p>Durasi: $durasi hari</p>
                <p>Total Harga: Rp " . ($durasi * $harga) . "</p>
                <a href='index.php' class='btn btn-success'>Konfirmasi</a>
              </div>";
    } else {
        echo "<div class='alert alert-danger'>Gagal menyimpan data.</div>";
    }
}
?>
