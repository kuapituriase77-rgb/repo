<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.html");
  exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $judul = htmlspecialchars($_POST["judul"]);
  $isi = htmlspecialchars($_POST["isi"]);
  $tanggal = date("Y-m-d H:i");

  $file = 'pengumuman.json';
  $data = [];

  if (file_exists($file)) {
    $json = file_get_contents($file);
    $data = json_decode($json, true);
  }

  $data[] = [
    "judul" => $judul,
    "isi" => $isi,
    "tanggal" => $tanggal
  ];

  file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
  echo "<script>alert('Pengumuman berhasil ditambahkan!'); window.location='pengumuman.php';</script>";
} else {
  header("Location: tambah_pengumuman.html");
  exit;
}
?>
