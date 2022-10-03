<?php
require 'functions.php';
$buku = query("SELECT * FROM buku");

if (isset($_POST['cari'])) {
  $buku = cari($_POST['keyword']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Novel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
  <div class="container" align="center">
    <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
    <h3>Daftar Novel</h3>

    <a href="tambah.php">Tambah Data Buku</a>
    <br><br>

    <form method="post" action="">
      <input type="text" name="keyword" size="50" placeholder="masukkan keywoard pencarian" autocomplete="off" autofocus>
      <button type="submit" name="cari">Cari!</button>
    </form>
    <br>

    <table border="5" cellpadding="15" cellspacing="0" style="background-color: white;">
      <thead>
        <tr>
          <th style="background-color: salmon;">Id Buku</th>
          <th style="background-color: salmon;">Nama Buku</th>
          <th style="background-color: salmon;">Nama Pengarang</th>
          <th style="background-color: salmon;">Gambar Buku</th>
        </tr>
      </thead>

      <?php if (empty($buku)) : ?>
        <tr>
          <td colspan="4">
            <p style="color: red; font-style: italic;">Data buku tidak ditemukan</p>
          </td>
        </tr>
      <?php endif; ?>

      <?php $i = 1;
      foreach ($buku as $b) : ?>
        <tbody>
          <tr>
            <td><?= $i++; ?></td>
            <th scope="row"><?= $b['id_buku']; ?></th>
            <td><?= $b['nama_buku']; ?></td>
            <td><?= $b['nama_pengarang']; ?></td>
            <td><img src="img/<?= $b['gambar_buku']; ?>" width="70"></td>
            <td>
              <a class="waves-effect waves-light btn-small" a href="ubah.php?id=<?= $m['id_Buku']; ?>">|<i class="material-icons right">create</i>|</a>

              <a class="waves-effect waves-light btn-small" a href="hapus.php?id=<?= $m['id_Buku']; ?>">|<i class="material-icons right">delete_forever</i>|</a>
            </td>
        </tbody>
      <?php endforeach; ?>
    </table>
  </div>
</body>

</html>