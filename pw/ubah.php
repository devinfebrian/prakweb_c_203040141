<?php
require 'functions.php';

// jika tidak ada id di url
if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit;
}

// ambil id dari url
$id = $_GET['id'];

// query mahasiswa berdasarkan id
$m = query("SELECT * FROM buku WHERE id_buku = $id");

// cek apakah tombol ubah sudah ditekan
if (isset($_POST['ubah'])) {
  if (ubah($_POST) > 0) {
    echo "<script>
            alert('data berhasil diubah');
            document.location.href = 'index.php';
        </script>";
  } else {
    echo "data gagal diubah!";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah Data Novel</title>
</head>

<body>
  <h3>Form Ubah Data Novel</h3>
  <form action="" method="POST">
    <input type="hidden" name="id_Buku" value="<?= $m['id_buku']; ?>">
    <ul>
      <li>
        <label>
          nama_buku :
          <input type="text" name="nama buku" autofocus required value="<?= $m['nama_buku']; ?>">
        </label>
      </li>
      <li>
        <label>
          pengarang :
          <input type="text" name="pengarang" required value="<?= $m['nama_pengarang']; ?>">
        </label>
      </li>
      <li>
        <label>
          gambar :
          <input type="text" name="gambar" required value="<?= $m['gambar_buku']; ?>">
        </label>
      </li>
      <li>
        <button type="submit" name="ubah">Ubah Data!</button>
      </li>
    </ul>
  </form>
</body>

</html>