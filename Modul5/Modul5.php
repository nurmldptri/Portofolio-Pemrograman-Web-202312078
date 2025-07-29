<?php
$nama = $email = $pesan = "";
$errors = [];
$sukses = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["nama"])) {
        $errors[] = "Nama tidak boleh kosong.";
    } else {
        $nama = htmlspecialchars($_POST["nama"]);
    }

    if (empty($_POST["email"])) {
        $errors[] = "Email tidak boleh kosong.";
    } else {
        $email = htmlspecialchars($_POST["email"]);
    }

    if (empty($_POST["pesan"])) {
        $errors[] = "Pesan/Komentar tidak boleh kosong.";
    } else {
        $pesan = htmlspecialchars($_POST["pesan"]);
    }

    if (empty($errors)) {
        $sukses = true;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu Digital STITEK Bontang</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #e0f7fa; /* Biru muda */
            margin: 0;
            padding: 15px;
        }
        .container {
            background: #ffffff;
            padding: 20px;
            margin: auto;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            border-radius: 15px;
            border: 2px solid #b2ebf2;
        }
        .logo-container {
            text-align: center;
            margin-bottom: 15px;
        }
        .logo-container img {
            max-width: 120px;
            height: auto;
        }
        h1 {
            text-align: center;
            color: #fb8c00; /* Oranye tua */
            font-size: 1.6em;
        }
        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
            color: #0277bd; /* Biru laut */
        }
        input[type="text"], input[type="email"], textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 10px;
            border: 1px solid #81d4fa;
            background: #f0f9ff;
            box-sizing: border-box;
            font-size: 1em;
        }
        button {
            margin-top: 20px;
            background-color: #ff9800; /* Oranye */
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-weight: bold;
            width: 100%;
        }
        button:hover {
            background-color: #fb8c00;
        }
        .success, .error {
            margin-top: 20px;
            padding: 15px;
            border-radius: 10px;
            font-size: 0.95em;
        }
        .success {
            background-color: #e1f5fe;
            color: #01579b;
            border: 1px solid #81d4fa;
        }
        .error {
            background-color: #fff3e0;
            color: #e65100;
            border: 1px solid #ffccbc;
        }

        @media (min-width: 768px) {
            .container {
                max-width: 600px;
            }
        }

        @media (max-width: 767px) {
            h1 {
                font-size: 1.3em;
            }
            button {
                font-size: 1em;
            }
        }

        @media (max-width: 480px) {
            h1 {
                font-size: 1.1em;
            }
            input, textarea {
                font-size: 0.9em;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo-container">
            <img src="logo.png" alt="Logo STITEK Bontang">
        </div>
        <h1>Buku Tamu Digital STITEK Bontang</h1>

        <?php if (!empty($errors)): ?>
            <div class="error">
                <ul>
                    <?php foreach ($errors as $err): ?>
                        <li><?php echo $err; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php if ($sukses): ?>
            <div class="success">
                <p><strong>Terima kasih atas pesan Anda!</strong></p>
                <p><strong>Nama:</strong> <?= $nama ?></p>
                <p><strong>Email:</strong> <?= $email ?></p>
                <p><strong>Pesan:</strong> <?= nl2br($pesan) ?></p>
            </div>
        <?php endif; ?>

        <form method="post" action="">
            <label for="nama">Nama Lengkap:</label>
            <input type="text" name="nama" id="nama" value="<?= $nama ?>">

            <label for="email">Alamat Email:</label>
            <input type="email" name="email" id="email" value="<?= $email ?>">

            <label for="pesan">Pesan/Komentar:</label>
            <textarea name="pesan" id="pesan" rows="5"><?= $pesan ?></textarea>

            <button type="submit">Kirim Pesan</button>
        </form>
    </div>
</body>
</html>