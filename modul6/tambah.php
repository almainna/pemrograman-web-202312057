<?php
include 'config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $conn->query("INSERT INTO produk (nama_produk, harga, stok) VALUES ('$nama', $harga, $stok)");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }

        h2 {
            color: #333;
        }

        form {
            max-width: 400px;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #28a745;
            border: none;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }

        a {
            display: inline-block;
            margin-top: 15px;
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h2>Tambah Produk Baru</h2>
    <form method="POST">
        <label>Nama Produk</label>
        <input type="text" name="nama_produk" required>

        <label>Harga</label>
        <input type="number" name="harga" required>

        <label>Stok</label>
        <input type="number" name="stok" required>

        <input type="submit" value="Simpan">
    </form>
    <a href="index.php">← Kembali ke Daftar Produk</a>
</body>
</html>
