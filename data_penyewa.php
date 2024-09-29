<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['mobil'] = $_POST['mobil'];
    $_SESSION['harga'] = $_POST['harga'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Penyewa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Masukkan Data Penyewa</h2>
    <form action="konfirmasi.php" method="post">
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" required>
        </div>
        <div class="form-group">
            <label>Alamat:</label>
            <textarea name="alamat" class="form-control" placeholder="Masukkan Alamat" required></textarea>
        </div>
        <div class="form-group">
            <label>No Telpon:</label>
            <input type="text" name="no_telpon" class="form-control" placeholder="Masukkan No Telpon" required>
        </div>
        <div class="form-group">
            <label>No KTP/KK:</label>
            <input type="text" name="no_ktp_kk" class="form-control" placeholder="Masukkan No KTP/KK" required>
        </div>
        <div class="form-group">
            <label>Durasi Peminjaman (hari):</label>
            <input type="number" name="durasi" class="form-control" placeholder="Masukkan Durasi" required>
        </div>
        <button type="submit" class="btn btn-primary">Lanjutkan</button>
    </form>
</div>
</body>
</html>
