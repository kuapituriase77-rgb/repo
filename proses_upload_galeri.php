<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.html");
  exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["foto"])) {
  $uploadDir = "uploads/";
  $file = $_FILES["foto"];
  $deskripsi = htmlspecialchars($_POST["deskripsi"]);

  // Validasi upload
  if ($file["error"] === 0 && in_array($file["type"], ["image/jpeg", "image/png", "image/jpg", "image/webp"])) {
    $ext = pathinfo($file["name"], PATHINFO_EXTENSION);
    $namaBaru = time() . "_" . uniqid() . "." . $ext;
    $tujuan = $uploadDir . $namaBaru;

    if (move_uploaded_file($file["tmp_name"], $tujuan)) {
      $data = [];
      $jsonFile = "data_galeri.json";

      if (file_exists($jsonFile)) {
        $data = json_decode(file_get_contents($jsonFile), true);
      }

      $data[] = [
        "file" => $namaBaru,
        "deskripsi" => $deskripsi,
        "tanggal" => date("Y-m-d H:i")
      ];

      file_put_contents($jsonFile, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

      echo "<script>alert('Foto berhasil diupload!'); window.location='galeri.php';</script>";
    } else {
      echo "<script>alert('Gagal mengunggah file.'); window.location='upload_galeri.php';</script>";
    }
  } else {
    echo "<script>alert('Format file tidak didukung. Gunakan JPG, PNG, atau WEBP.'); window.location='upload_galeri.php';</script>";
  }
} else {
  header("Location: upload_galeri.php");
  exit;
}
?>
