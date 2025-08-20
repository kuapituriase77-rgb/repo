<?php
$data = [];
if (file_exists("berita.json")) {
  $json = file_get_contents("berita.json");
  $data = json_decode($json, true);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Berita - KUA Pitu Riase</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
</head>
<body class="bg-green-50 text-gray-800">

<header class="bg-green-800 text-white shadow">
  <div class="max-w-6xl mx-auto px-4 py-4 flex items-center justify-between">
    <div class="flex items-center space-x-3">
      <img src="https://kemenag.go.id/storage/img/logo-kemenag.png" alt="Logo Kemenag" class="w-10 h-10">
      <h1 class="text-lg font-bold">KUA Pitu Riase</h1>
    </div>
    <a href="index.html" class="text-sm hover:underline">🏠 Beranda</a>
  </div>
</header>

<main class="max-w-6xl mx-auto px-6 py-10">
  <h2 class="text-3xl font-bold text-green-700 mb-10 text-center">
    <i class="fas fa-newspaper mr-2"></i>Berita Terkini
  </h2>

  <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
    <?php if (!empty($data)): ?>
      <?php foreach (array_reverse($data) as $index => $item): ?>
        <div class="bg-white rounded-lg overflow-hidden shadow hover:shadow-lg transition-all">
          <div class="relative">
            <img src="uploads/berita/<?= htmlspecialchars($item['gambar']) ?>" alt="Gambar Berita"
                 class="w-full h-48 object-cover">
            <div class="absolute bottom-2 left-2 bg-green-700 text-white text-xs px-2 py-1 rounded">
              <?= date("d M Y", strtotime($item["tanggal"])) ?>
            </div>
          </div>
          <div class="p-4">
            <h3 class="text-lg font-semibold text-green-800 mb-1"><?= htmlspecialchars($item["judul"]) ?></h3>
            <p class="text-sm text-gray-600 mb-3"><?= substr(strip_tags($item["isi"]), 0, 90) ?>...</p>
            <a href="berita_detail.php?id=<?= $index ?>" class="text-sm text-green-700 hover:underline">
              Baca Selengkapnya →
            </a>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <p class="text-gray-600 col-span-full text-center">Belum ada berita yang tersedia.</p>
    <?php endif; ?>
  </div>
</main>

<footer class="bg-green-800 text-white py-4 text-center text-sm mt-12">
  &copy; <?= date("Y") ?> KUA Pitu Riase | Kementerian Agama Republik Indonesia
</footer>

</body>
</html>
