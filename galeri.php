<?php
$data = [];
if (file_exists("data_galeri.json")) {
  $json = file_get_contents("data_galeri.json");
  $data = json_decode($json, true);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Galeri Kegiatan - KUA Pitu Riase</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
</head>
<body class="bg-green-50 text-gray-800">

  
<!-- Header -->
  
  <header class="bg-green-800 text-white shadow">
    <div class="max-w-7xl mx-auto flex items-center justify-between p-4">
      <div class="flex items-center space-x-3">  
	<img src="logo.png" alt="Logo Kemenag" class="w-10 h-10">
        <span class="text-xl font-bold">KUA Pitu Riase</span>
      </div>
      <nav class="hidden md:flex items-center space-x-6">
  <a href="index.html" class="hover:underline">Beranda</a>
  <a href="profil.php" class="hover:underline">Profil</a>
  <a href="berita.php" class="hover:underline">Berita</a>
  <a href="pengumuman.php" class="hover:underline">Pengumuman</a>
  <a href="galeri.php" class="hover:underline">Galeri</a>
  <a href="unduhan.php" class="hover:underline">Unduhan</a>
  <a href="form_pengaduan.php" class="hover:underline">Pengaduan</a>
  <a href="login.html" class="bg-white text-green-800 px-3 py-1 rounded hover:bg-green-100 transition text-sm font-semibold ml-4">
    <i class="fas fa-lock mr-1"></i>Login Admin
  </a>
</nav>

    </div>
  </header>  <!-- Konten Galeri -->
  <main class="max-w-6xl mx-auto px-6 py-10">
    <h2 class="text-2xl font-bold text-green-700 mb-6 text-center flex items-center justify-center">
      <i class="fas fa-image text-2xl mr-2"></i>Galeri Kegiatan
    </h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      <?php if (!empty($data)): ?>
        <?php foreach (array_reverse($data) as $item): ?>
          <div class="bg-white rounded shadow hover:shadow-lg overflow-hidden">
            <img src="uploads/<?= htmlspecialchars($item['file']) ?>"
                 alt="Foto Galeri"
                 class="w-full h-48 object-cover cursor-pointer"
                 onclick="openLightbox(this.src)">
            <div class="p-3 text-center">
              <p class="text-sm text-gray-700"><?= htmlspecialchars($item['deskripsi']) ?></p>
              <p class="text-xs text-gray-400 mt-1"><?= date("d M Y, H:i", strtotime($item['tanggal'])) ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p class="text-gray-500 col-span-full text-center">Belum ada foto yang diunggah.</p>
      <?php endif; ?>
    </div>
  </main>

  <!-- Lightbox Overlay -->
  <div id="lightbox" class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50 hidden" onclick="closeLightbox()">
    <img id="lightbox-image" src="" class="max-w-full max-h-[90vh] rounded shadow-lg" />
  </div>

  <!-- Footer -->
  <footer class="bg-green-800 text-white py-4 text-center text-sm mt-12">
    &copy; <?= date("Y") ?> KUA Pitu Riase | Kementerian Agama RI
  </footer>

  <!-- Lightbox Script -->
  <script>
    const openLightbox = (src) => {
      document.getElementById('lightbox-image').src = src;
      document.getElementById('lightbox').classList.remove('hidden');
    };
    const closeLightbox = () => {
      document.getElementById('lightbox').classList.add('hidden');
    };
  </script>

</body>
</html>
