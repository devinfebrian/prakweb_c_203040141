<?php
// koneksi DB
$conn = mysqli_connect('localhost', 'root', '', 'prakweb_c_203040141_pw');

// query isi tabel
$result = mysqli_query($conn, "SELECT * FROM buku");

// data ke array
$rows = [];
while ($row = mysqli_fetch_assoc($result)) {
  $rows[] = $row;
}

// tampung
$buku = $rows;
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
</head>

<body>
  <h3>Daftar Novel</h3>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Id Buku</th>
        <th scope="col">Nama Buku</th>
        <th scope="col">Nama Pengarang</th>
        <th scope="col">Gambar Buku</th>
      </tr>
    </thead>
    <?php foreach ($buku as $b) : ?>
      <tbody>
        <tr>
          <th scope="row"><?= $b['id_buku']; ?></th>
          <td><?= $b['nama_buku']; ?></td>
          <td><?= $b['nama_pengarang']; ?></td>
          <td><img src="img/<?= $b['gambar_buku']; ?>" width="70"></td>
      </tbody>
    <?php endforeach; ?>
  </table>
</body>

</html>