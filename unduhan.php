<?php
$data = [];
if (file_exists("data_unduhan.json")) {
  $json = file_get_contents("data_unduhan.json");
  $data = json_decode($json, true);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Unduhan - KUA Pitu Riase</title>
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
  </header>


  <!-- Konten Unduhan -->
  <main class="max-w-4xl mx-auto px-6 py-10">
    <h2 class="text-2xl font-bold text-green-700 mb-6 text-center flex items-center justify-center">
      <i class="fas fa-file-download text-xl mr-2"></i>Dokumen Unduhan Resmi
    </h2>

    <?php if (!empty($data)): ?>
      <ul class="space-y-4">
        <?php foreach (array_reverse($data) as $item): ?>
          <li class="bg-white rounded-lg shadow hover:shadow-md p-5 flex justify-between items-center">
            <div>
              <h3 class="text-green-800 font-semibold"><?= htmlspecialchars($item["judul"]) ?></h3>
              <p class="text-sm text-gray-500">
                <i class="fas fa-calendar-alt mr-1"></i><?= date("d M Y, H:i", strtotime($item["tanggal"])) ?>
              </p>
            </div>
            <a href="dokumen/<?= htmlspecialchars($item["file"]) ?>" class="text-sm bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800 transition" download>
              <i class="fas fa-download mr-1"></i>Unduh
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php else: ?>
      <p class="text-center text-gray-500">Belum ada dokumen tersedia.</p>
    <?php endif; ?>
  </main>

  <!-- Footer -->
  <footer class="bg-green-800 text-white py-4 text-center text-sm mt-12">
    &copy; <?= date("Y") ?> KUA Pitu Riase | Kementerian Agama RI
  </footer>

</body>
</html>
