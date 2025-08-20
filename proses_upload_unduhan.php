<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.html");
  exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["dokumen"])) {
  $uploadDir = "dokumen/";
  $judul = htmlspecialchars($_POST["judul"]);
  $file = $_FILES["dokumen"];

  // Validasi sederhana
  if ($file["error"] === 0) {
    $ext = pathinfo($file["name"], PATHINFO_EXTENSION);
    $namaBaru = time() . "_" . uniqid() . "." . $ext;
    $tujuan = $uploadDir . $namaBaru;

    if (move_uploaded_file($file["tmp_name"], $tujuan)) {
      $data = [];
      $jsonFile = "data_unduhan.json";

      if (file_exists($jsonFile)) {
        $data = json_decode(file_get_contents($jsonFile), true);
      }

      $data[] = [
        "judul" => $judul,
        "file" => $namaBaru,
        "tanggal" => date("Y-m-d H:i")
      ];

      file_put_contents($jsonFile, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

      echo "<script>alert('Dokumen berhasil diunggah!'); window.location='upload_unduhan.php';</script>";
    } else {
      echo "<script>alert('Gagal menyimpan dokumen.'); window.location='upload_unduhan.php';</script>";
    }
  } else {
    echo "<script>alert('Terjadi kesalahan pada file.'); window.location='upload_unduhan.php';</script>";
  }
} else {
  header("Location: upload_unduhan.php");
  exit;
}
?>
