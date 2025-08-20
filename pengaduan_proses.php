<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nama = htmlspecialchars($_POST["nama"]);
  $nik = htmlspecialchars($_POST["nik"]);
  $pengaduan = htmlspecialchars($_POST["pengaduan"]);
  $waktu = date("Y-m-d H:i:s");
  $data = "[$waktu] $nama ($nik): $pengaduan\\n";
  file_put_contents("pengaduan.txt", $data, FILE_APPEND);

  // Kirim ke email
  $to = "kuapituriase77@gmail.com";
  $subject = "Pengaduan Baru dari $nama";
  $message = "Nama: $nama\\nNIK: $nik\\n\\n$pengaduan";
  $headers = "From: noreply@kuapitur.go.id";
  mail($to, $subject, $message, $headers);

  echo "<script>alert('Pengaduan berhasil dikirim!'); window.location='form_pengaduan.html';</script>";
}
?>
