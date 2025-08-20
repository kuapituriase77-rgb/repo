<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.html");
  exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-50 text-gray-800">
  <div class="max-w-5xl mx-auto py-10 px-6">
    <h1 class="text-3xl font-bold text-green-800 mb-6 text-center">??? Dashboard Admin KUA Pitu Riase</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 text-center">
      <a href="pengumuman.php" class="block bg-white p-6 rounded shadow hover:bg-green-100 transition">?? Kelola Pengumuman</a>
      <a href="lihat_pengaduan.php" class="block bg-white p-6 rounded shadow hover:bg-green-100 transition">?? Lihat Pengaduan</a>
      <a href="galeri.html" class="block bg-white p-6 rounded shadow hover:bg-green-100 transition">??? Lihat Galeri</a>
      <a href="unduhan.html" class="block bg-white p-6 rounded shadow hover:bg-green-100 transition">?? Dokumen Unduhan</a>
      <a href="index.html" class="block bg-white p-6 rounded shadow hover:bg-green-100 transition">?? Kembali ke Beranda</a>
      <a href="logout.php" class="block bg-red-100 p-6 rounded shadow hover:bg-red-200 transition">?? Logout</a>
    </div>
  </div>
</body>
</html>
