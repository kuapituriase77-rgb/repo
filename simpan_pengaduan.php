<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nama = htmlspecialchars($_POST["nama"]);
  $email = htmlspecialchars($_POST["email"]);
  $pesan = htmlspecialchars($_POST["pesan"]);
  $tanggal = date("Y-m-d H:i");

  $data = "[$tanggal] Nama: $nama | Email: $email\nPesan: $pesan\n--------------------------\n";

  file_put_contents("pengaduan.txt", $data, FILE_APPEND);
  echo "<script>alert('Pengaduan berhasil dikirim. Terima kasih!'); window.location='form_pengaduan.php';</script>";
} else {
  header("Location: form_pengaduan.php");
  exit;
}
?>
