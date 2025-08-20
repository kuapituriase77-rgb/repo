<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $judul   = htmlspecialchars($_POST["judul"]);
  $isi     = htmlspecialchars($_POST["isi"]);
  $tanggal = date("Y-m-d H:i");

  // Proses upload gambar
  $gambar = $_FILES["gambar"]["name"];
  $tmp = $_FILES["gambar"]["tmp_name"];
  $ext = pathinfo($gambar, PATHINFO_EXTENSION);
  $nama_file = "berita_" . time() . "." . $ext;

  // Pastikan folder ada
  if (!is_dir("uploads/berita")) {
    mkdir("uploads/berita", 0777, true);
  }

  // Simpan gambar ke folder
  move_uploaded_file($tmp, "uploads/berita/" . $nama_file);

  // Tambahkan ke berita.json
  $berita = [];
  if (file_exists("berita.json")) {
    $json = file_get_contents("berita.json");
    $berita = json_decode($json, true);
  }

  $berita[] = [
    "judul" => $judul,
    "isi" => $isi,
    "tanggal" => $tanggal,
    "gambar" => $nama_file
  ];

  file_put_contents("berita.json", json_encode($berita, JSON_PRETTY_PRINT));

  echo "<script>alert('Berita berhasil ditambahkan!'); window.location='kelola_berita.php';</script>";
} else {
  header("Location: tambah_berita.html");
  exit;
}
?>
