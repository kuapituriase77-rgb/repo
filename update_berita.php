<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = (int)$_POST["id"];
  $judul = htmlspecialchars($_POST["judul"]);
  $isi = htmlspecialchars($_POST["isi"]);

  $berita = [];
  if (file_exists("berita.json")) {
    $json = file_get_contents("berita.json");
    $berita = json_decode($json, true);
  }

  if (!isset($berita[$id])) {
    echo "<script>alert('Data tidak ditemukan'); window.location='kelola_berita.php';</script>";
    exit;
  }

  // Simpan gambar baru jika diupload
  $gambar_baru = $berita[$id]['gambar'];
  if (!empty($_FILES['gambar']['name'])) {
    $ext = pathinfo($_FILES["gambar"]["name"], PATHINFO_EXTENSION);
    $nama_file = "berita_" . time() . "." . $ext;
    move_uploaded_file($_FILES["gambar"]["tmp_name"], "uploads/berita/" . $nama_file);
    $gambar_baru = $nama_file;
  }

  $berita[$id] = [
    "judul" => $judul,
    "isi" => $isi,
    "tanggal" => date("Y-m-d H:i"),
    "gambar" => $gambar_baru
  ];

  file_put_contents("berita.json", json_encode($berita, JSON_PRETTY_PRINT));
  echo "<script>alert('Berita berhasil diperbarui'); window.location='kelola_berita.php';</script>";
} else {
  header("Location: kelola_berita.php");
}
?>
