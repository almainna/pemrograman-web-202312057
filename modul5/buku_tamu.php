<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Buku Tamu Digital STITEK Bontang</title>
    <style>
        body {
            background-color: #ffffff;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            text-align: center;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 30px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
        }

        .logo {
            margin-bottom: 10px;
        }

        .logo img {
            width: 70px;
            height: auto;
        }

        h1 {
            margin-bottom: 25px;
            color: #2c3e50;
        }

        label {
            font-weight: 600;
            display: block;
            margin-top: 15px;
            text-align: left;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            margin-top: 5px;
            box-sizing: border-box;
            font-size: 14px;
            background-color: #f9f9f9;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        textarea:focus {
            border-color: #3498db;
            background-color: #fff;
            outline: none;
        }

        input[type="submit"] {
            margin-top: 20px;
            background-color: #3498db;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }

        .error {
            background: #ffe6e6;
            color: #c0392b;
            padding: 10px 15px;
            border-left: 5px solid #e74c3c;
            margin-top: 15px;
            border-radius: 6px;
            text-align: left;
        }

        .hasil {
            background: #ecf9ec;
            color: #2c662d;
            border-left: 5px solid #2ecc71;
            padding: 15px 20px;
            margin-top: 20px;
            border-radius: 6px;
            text-align: left;
        }

        .hasil strong {
            display: inline-block;
            width: 90px;
        }

        form {
            text-align: left;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="logo">
        <img src="Picture1.png" alt="Logo STITEK">
    </div>

    <h1>Buku Tamu Digital STITEK Bontang</h1>

    <?php
    $nama = $email = $pesan = "";
    $errors = [];
    $success = false;

    function bersihkan_input($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["nama"])) {
            $errors[] = "Nama Lengkap wajib diisi.";
        } else {
            $nama = bersihkan_input($_POST["nama"]);
        }

        if (empty($_POST["email"])) {
            $errors[] = "Alamat Email wajib diisi.";
        } else {
            $email = bersihkan_input($_POST["email"]);
        }

        if (empty($_POST["pesan"])) {
            $errors[] = "Pesan/Komentar wajib diisi.";
        } else {
            $pesan = bersihkan_input($_POST["pesan"]);
        }

        if (empty($errors)) {
            $success = true;
        }
    }
    ?>

    <!-- Form -->
    <form method="post" action="">
        <label for="nama">Nama Lengkap</label>
        <input type="text" name="nama" id="nama" value="<?= $nama ?>">

        <label for="email">Alamat Email</label>
        <input type="email" name="email" id="email" value="<?= $email ?>">

        <label for="pesan">Pesan/Komentar</label>
        <textarea name="pesan" id="pesan" rows="5"><?= $pesan ?></textarea>

        <input type="submit" value="Kirim Pesan">
    </form>

    <!-- Validasi & Tampilan Hasil -->
    <?php if (!empty($errors)) : ?>
        <div class="error">
            <ul>
                <?php foreach ($errors as $e) echo "<li>$e</li>"; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if ($success) : ?>
        <div class="hasil">
            <h3>Data Tamu:</h3>
            <p><strong>Nama:</strong> <?= $nama ?></p>
            <p><strong>Email:</strong> <?= $email ?></p>
            <p><strong>Pesan:</strong> <?= nl2br($pesan) ?></p>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
