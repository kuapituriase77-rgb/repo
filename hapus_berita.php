<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.html");
  exit;
}

$id = isset($_GET["id"]) ? (int)$_GET["id"] : -1;

$data = [];
if (file_exists("berita.json")) {
  $json = file_get_contents("berita.json");
  $data = json_decode($json, true);
}

if (isset($data[$id])) {
  // Hapus gambar
  $gambar = $data[$id]['gambar'];
  if (file_exists("uploads/berita/" . $gambar)) {
    unlink("uploads/berita/" . $gambar);
  }
  unset($data[$id]);
  $data = array_values($data); // reset index array
  file_put_contents("berita.json", json_encode($data, JSON_PRETTY_PRINT));
  echo "<script>alert('Berita berhasil dihapus.'); window.location='kelola_berita.php';</script>";
} else {
  echo "<script>alert('Berita tidak ditemukan.'); window.location='kelola_berita.php';</script>";
}
?>
