<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.html");
  exit;
}

$id = isset($_GET["id"]) ? (int) $_GET["id"] : -1;
$file = "pengumuman.json";

if ($id < 0 || !file_exists($file)) {
  echo "<script>alert('ID tidak valid!'); window.location='pengumuman.php';</script>";
  exit;
}

$data = json_decode(file_get_contents($file), true);

if (!isset($data[$id])) {
  echo "<script>alert('Pengumuman tidak ditemukan!'); window.location='pengumuman.php';</script>";
  exit;
}

$item = $data[$id];
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Pengumuman - KUA Pitu Riase</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-green-50">

  <div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold text-green-700 mb-6 text-center">
      <i class="fas fa-pen-to-square mr-2"></i>Edit Pengumuman
    </h1>

    <form action="update_pengumuman.php" method="POST">
      <input type="hidden" name="id" value="<?= $id ?>">
      <div class="mb-4">
        <label class="block font-semibold mb-1">Judul</label>
        <input type="text" name="judul" required value="<?= htmlspecialchars($item['judul']) ?>" class="w-full border p-2 rounded" />
      </div>
      <div class="mb-4">
        <label class="block font-semibold mb-1">Isi Pengumuman</label>
        <textarea name="isi" rows="5" required class="w-full border p-2 rounded"><?= htmlspecialchars($item['isi']) ?></textarea>
      </div>
      <div class="flex justify-between">
        <a href="kelola_pengumuman.php" class="text-green-700 hover:underline">
          <i class="fas fa-arrow-left mr-1"></i>Kembali
        </a>
        <button type="submit" class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800">
          <i class="fas fa-save mr-1"></i>Update
        </button>
      </div>
    </form>
  </div>

</body>
</html>
