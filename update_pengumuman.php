<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.html");
  exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $id = isset($_POST["id"]) ? (int) $_POST["id"] : -1;
  $judul = htmlspecialchars($_POST["judul"]);
  $isi = htmlspecialchars($_POST["isi"]);

  $file = "pengumuman.json";

  if ($id < 0 || !file_exists($file)) {
    echo "<script>alert('Data tidak ditemukan!'); window.location='pengumuman.php';</script>";
    exit;
  }

  $data = json_decode(file_get_contents($file), true);

  if (!isset($data[$id])) {
    echo "<script>alert('ID pengumuman tidak valid!'); window.location='pengumuman.php';</script>";
    exit;
  }

  $data[$id]["judul"] = $judul;
  $data[$id]["isi"] = $isi;
  $data[$id]["tanggal"] = date("Y-m-d H:i");

  file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
  echo "<script>alert('Pengumuman berhasil diperbarui!'); window.location='pengumuman.php';</script>";
} else {
  header("Location: pengumuman.php");
  exit;
}
?>
