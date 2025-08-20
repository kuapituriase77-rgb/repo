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
  <title>Data Pengaduan - Admin KUA</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-100 text-gray-800">

  <!-- Header -->
  <header class="bg-green-800 text-white p-4 shadow">
    <div class="max-w-6xl mx-auto flex justify-between items-center">
      <h1 class="text-xl font-semibold">Dashboard Admin - Upload Galeri</h1>
      <a href="dashboard_admin.php" class="bg-white text-green-800 px-3 py-1 rounded hover:bg-green-100 text-sm">
        Kembali ke Dashboard
      </a>
    </div>
  </header>


  <div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold text-green-700 mb-6 text-center">
      <i class="fas fa-upload mr-2"></i>Upload Foto Galeri
    </h1>

    <form action="proses_upload_galeri.php" method="POST" enctype="multipart/form-data">
      <div class="mb-4">
        <label class="block font-semibold mb-1">Pilih Gambar</label>
        <input type="file" name="foto" accept="image/*" required class="w-full" />
      </div>

      <div class="mb-4">
        <label class="block font-semibold mb-1">Deskripsi</label>
        <textarea name="deskripsi" rows="3" class="w-full border p-2 rounded" required></textarea>
      </div>

      <div class="flex justify-between">
        <a href="dashboard_admin.php" class="text-green-700 hover:underline">
          <i class="fas fa-arrow-left mr-1"></i>Kembali
        </a>
        <button type="submit" class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800">
          <i class="fas fa-save mr-1"></i>Upload
        </button>
      </div>
    </form>
  </div>

</body>
</html>
