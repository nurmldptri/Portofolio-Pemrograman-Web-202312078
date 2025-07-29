<?php include 'inc/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Produk - Toko Maulideas</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #fff0f5;
      font-family: 'Segoe UI', sans-serif;
    }
    h2 {
      color: rgb(182, 72, 109);
    }
    .btn-primary {
      background-color: #f06292;
      border: none;
    }
    .btn-warning {
      background-color: #ffb74d;
      border: none;
    }
    .btn-danger {
      background-color: #e57373;
      border: none;
    }
    .table thead {
      background-color: #f8bbd0;
      color: #880e4f;
    }
    .table tbody tr:hover {
      background-color: #fce4ec;
    }
    .table-container {
      background-color: #fff;
      padding: 20px;
      border-radius: 15px;
      box-shadow: 0 0 15px rgba(233, 30, 99, 0.1);
    }
    .logo {
      height: 50px;
      margin-right: 10px;
    }
    .header-brand {
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 20px;
    }
  </style>
</head>
<body class="container py-4">

  <!-- Logo dan Judul -->
  <div class="header-brand">
    <img src="assets/logo.jpg" alt="Logo Maulideas" class="logo">
    <h2 class="mb-0">Toko Maulideas</h2>
  </div>

  <!-- Tombol Tambah -->
  <div class="text-end mb-3">
    <a href="tambah.php" class="btn btn-primary">+ Tambah Produk Baru</a>
  </div>

  <!-- Tabel Produk -->
  <div class="table-container">
    <table class="table table-bordered table-striped align-middle text-center">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Produk</th>
          <th>Harga</th>
          <th>Stok</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $stmt = $conn->query("SELECT * FROM produk");
        $no = 1;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
        ?>
          <tr>
            <td><?= $no++ ?></td>
            <td style="background-color:#fce4ec; color:#ad1457; font-weight:500;">
              <?= htmlspecialchars($row['nama_produk']) ?>
            </td>
            <td style="background-color:#ffe0e0; color:#b71c1c;">
              <span class="badge bg-danger-subtle text-danger-emphasis">Rp<?= number_format($row['harga']) ?></span>
            </td>
            <td style="background-color:#f3e5f5; color:#4a148c;">
              <strong><?= $row['stok'] ?></strong>
            </td>
            <td>
              <a href="edit.php?id=<?= $row['id_produk'] ?>" class="btn btn-warning btn-sm">Edit</a>
              <a href="hapus.php?id=<?= $row['id_produk'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>

</body>
</html>