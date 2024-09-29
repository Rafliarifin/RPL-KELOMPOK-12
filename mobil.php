<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['email'] = $_POST['email'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pilih Merek Mobil</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">

</head>
<body>
<div class="container">
    <h2>Pilih Merek Mobil</h2>
    <form action="data_penyewa.php" method="post">
        <div class="form-group">
            <label for="mobil">Merek Mobil:</label>
            <select name="mobil" class="form-control" required>
                <option value="Toyota Avanza">Toyota Avanza - Rp 300.000/hari</option>
                <option value="Honda Brio">Honda Brio - Rp 250.000/hari</option>
                <option value="Suzuki Ertiga">Suzuki Ertiga - Rp 280.000/hari</option>
                <option value="Daihatsu Xenia">Daihatsu Xenia - Rp 290.000/hari</option>
            </select>
        </div>
        <div class="form-group">
            <label>Harga (IDR):</label>
            <input type="number" name="harga" class="form-control" placeholder="Masukkan Harga" required>
        </div>
        <button type="submit" class="btn btn-primary">Lanjutkan</button>
    </form>
</div>
</body>
</html>
