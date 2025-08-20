<?php
$data = [];
if (file_exists("berita.json")) {
  $json = file_get_contents("berita.json");
  $data = json_decode($json, true);
}

$id = isset($_GET["id"]) ? (int)$_GET["id"] : -1;
$berita = isset($data[$id]) ? $data[$id] : null;

if (!$berita) {
  echo "<script>alert('Berita tidak ditemukan.');window.location='berita.php';</script>";
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title><?= htmlspecialchars($berita['judul']) ?> - Berita</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
</head>
<body class="bg-green-50 text-gray-800">

  <header class="bg-green-800 text-white shadow">
    <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
      <h1 class="text-lg font-bold">Detail Berita</h1>
      <a href="berita.php" class="text-sm bg-white text-green-800 px-4 py-1 rounded hover:bg-green-100">
        &larr; Kembali ke Berita
      </a>
    </div>
  </header>

  <main class="max-w-4xl mx-auto px-6 py-10 bg-white mt-6 rounded shadow">
    <img src="uploads/berita/<?= htmlspecialchars($berita['gambar']) ?>" alt="Gambar Berita" class="w-full h-64 object-cover rounded mb-6">
    <h2 class="text-2xl font-bold text-green-800 mb-2"><?= htmlspecialchars($berita["judul"]) ?></h2>
    <p class="text-sm text-gray-500 mb-6"><?= date("d M Y, H:i", strtotime($berita["tanggal"])) ?></p>
    <div class="prose max-w-none">
      <?= nl2br(htmlspecialchars($berita["isi"])) ?>
    </div>
  </main>

  <footer class="bg-green-800 text-white text-sm py-4 text-center mt-12">
    &copy; <?= date("Y") ?> KUA Pitu Riase | Kementerian Agama Republik Indonesia
  </footer>

</body>
</html>
