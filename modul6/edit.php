<?php
include 'config.php';
$id = $_GET['id'];
$data = $conn->query("SELECT * FROM produk WHERE id_produk=$id")->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $conn->query("UPDATE produk SET nama_produk='$nama', harga=$harga, stok=$stok WHERE id_produk=$id");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
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
            background-color: #007bff;
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
    <h2>Edit Produk</h2>
    <form method="POST">
        <label>Nama Produk</label>
        <input type="text" name="nama_produk" value="<?= $data['nama_produk'] ?>" required>

        <label>Harga</label>
        <input type="number" name="harga" value="<?= $data['harga'] ?>" required>

        <label>Stok</label>
        <input type="number" name="stok" value="<?= $data['stok'] ?>" required>

        <input type="submit" value="Update">
    </form>
    <a href="index.php">← Kembali ke Daftar Produk</a>
</body>
</html>
