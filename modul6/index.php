<?php
include 'config.php';
$result = $conn->query("SELECT * FROM produk");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Produk Toko Online</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }

        h2 {
            color: #333;
        }

        a.button {
            display: inline-block;
            margin-bottom: 15px;
            padding: 10px 15px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th {
            background-color: #f8f8f8;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        .actions a {
            margin-right: 10px;
            text-decoration: none;
            color: white;
            padding: 6px 10px;
            border-radius: 4px;
        }

        .edit-btn {
            background-color: #007bff;
        }

        .delete-btn {
            background-color: #dc3545;
        }
    </style>
</head>
<body>
    <h2>Daftar Produk</h2>
    <a href="tambah.php" class="button">+ Tambah Produk Baru</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id_produk'] ?></td>
            <td><?= $row['nama_produk'] ?></td>
            <td>Rp <?= number_format($row['harga'], 0, ',', '.') ?></td>
            <td><?= $row['stok'] ?></td>
            <td class="actions">
                <a href="edit.php?id=<?= $row['id_produk'] ?>" class="edit-btn">Edit</a>
                <a href="hapus.php?id=<?= $row['id_produk'] ?>" class="delete-btn" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
