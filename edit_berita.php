<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.html");
  exit;
}

$data = [];
if (file_exists("berita.json")) {
  $json = file_get_contents("berita.json");
  $data = json_decode($json, true);
}

$id = isset($_GET["id"]) ? (int)$_GET["id"] : -1;
$berita = isset($data[$id]) ? $data[$id] : null;

if (!$berita) {
  echo "<script>alert('Data tidak ditemukan.'); window.location='kelola_berita.php';</script>";
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Berita</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">

  <main class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold text-green-700 mb-6">Edit Berita</h1>
    <form action="update_berita.php" method="POST" enctype="multipart/form-data" class="space-y-4">
      <input type="hidden" name="id" value="<?= $id ?>">
      <div>
        <label class="block font-semibold">Judul</label>
        <input type="text" name="judul" required value="<?= htmlspecialchars($berita['judul']) ?>" class="w-full border border-gray-300 rounded px-3 py-2">
      </div>
      <div>
        <label class="block font-semibold">Isi Berita</label>
        <textarea name="isi" rows="6" required class="w-full border border-gray-300 rounded px-3 py-2"><?= htmlspecialchars($berita['isi']) ?></textarea>
      </div>
      <div>
        <label class="block font-semibold">Ganti Gambar (opsional)</label>
        <input type="file" name="gambar" class="text-sm">
        <p class="text-xs mt-1 text-gray-500">Gambar saat ini: <?= htmlspecialchars($berita['gambar']) ?></p>
      </div>
      <div class="text-right">
        <button type="submit" class="bg-green-700 text-white px-5 py-2 rounded hover:bg-green-800">Update Berita</button>
      </div>
    </form>
  </main>

</body>
</html>
