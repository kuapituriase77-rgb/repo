<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $data = [
    "nama" => htmlspecialchars($_POST["nama"]),
    "alamat" => htmlspecialchars($_POST["alamat"]),
    "no_hp" => htmlspecialchars($_POST["no_hp"]),
    "keperluan" => htmlspecialchars($_POST["keperluan"]),
    "pesan" => htmlspecialchars($_POST["pesan"]),
    "tanggal" => date("Y-m-d H:i:s")
  ];

  $bukuTamu = [];
  if (file_exists("buku_tamu.json")) {
    $json = file_get_contents("buku_tamu.json");
    $bukuTamu = json_decode($json, true);
  }

  $bukuTamu[] = $data;

  file_put_contents("buku_tamu.json", json_encode($bukuTamu, JSON_PRETTY_PRINT));

  echo "<script>alert('Terima kasih! Buku tamu berhasil diisi.'); window.location='index.html';</script>";
} else {
  header("Location: index.html");
  exit;
}
?>
