<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.html");
  exit;
}

$folder = "dokumen/";
// Hapus File
if (isset($_GET['hapus'])) {
  $hapus = $folder . basename($_GET['hapus']);
  if (file_exists($hapus)) unlink($hapus);
  header("Location: kelola_unduhan.php");
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
      <h1 class="text-xl font-semibold">Dashboard Admin - Upload Dokumen Resmi</h1>
      <a href="dashboard_admin.php" class="bg-white text-green-800 px-3 py-1 rounded hover:bg-green-100 text-sm">
        Kembali ke Dashboard
      </a>
    </div>
  </header>

  <div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold text-green-700 mb-6 text-center">
      <i class="fas fa-upload mr-2"></i>Upload Dokumen Resmi
    </h1>

    <form action="proses_upload_unduhan.php" method="POST" enctype="multipart/form-data">
      <div class="mb-4">
        <label class="block font-semibold mb-1">Judul Dokumen</label>
        <input type="text" name="judul" required class="w-full border p-2 rounded">
      </div>

      <div class="mb-4">
        <label class="block font-semibold mb-1">Pilih File (PDF, DOCX, ZIP, DLL)</label>
        <input type="file" name="dokumen" required class="w-full">
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
<main class="max-w-4xl mx-auto mt-8 bg-white p-6 rounded shadow space-y-8">
  <!-- Tabel File -->
  <h2 class="text-lg font-bold text-green-700">?? File di Folder 'unduhan/'</h2>
  <table class="w-full text-sm border border-gray-300">
    <thead class="bg-green-100 text-green-900">
      <tr>
        <th class="border px-3 py-2">No</th>
        <th class="border px-3 py-2">Nama File</th>
        <th class="border px-3 py-2">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $files = array_diff(scandir($folder), ['.', '..']);
      $no = 1;
      foreach ($files as $file):
      ?>
      <tr>
        <td class="border px-3 py-2 text-center"><?= $no++ ?></td>
        <td class="border px-3 py-2"><?= htmlspecialchars($file) ?></td>
        <td class="border px-3 py-2 text-center">
          <a href="<?= $folder . $file ?>" target="_blank" class="text-blue-600 hover:underline">Lihat</a> |
          <a href="?edit=<?= urlencode($file) ?>" class="text-yellow-600 hover:underline">Ubah</a> |
          <a href="?hapus=<?= urlencode($file) ?>" class="text-red-600 hover:underline" onclick="return confirm('Hapus file ini?')">Hapus</a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</body>
</html>
