<?php
$data = [];
if (file_exists("pengumuman.json")) {
  $json = file_get_contents("pengumuman.json");
  $data = json_decode($json, true);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Pengumuman - KUA Pitu Riase</title>
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


  <!-- Konten -->
  <main class="max-w-4xl mx-auto px-6 py-10">
    <h2 class="text-3xl font-bold text-green-700 mb-8 text-center flex items-center justify-center">
      <i class="fas fa-bullhorn text-2xl mr-2"></i> Pengumuman Resmi
    </h2>

    <?php if (!empty($data)): ?>
      <div class="space-y-6">
        <?php foreach (array_reverse($data) as $item): ?>
          <div class="bg-white rounded-xl shadow p-6 hover:ring-2 hover:ring-green-400 transition">
            <div class="flex items-center mb-2">
              <div class="flex-shrink-0">
                <i class="fas fa-circle-info text-green-600 text-2xl mr-3"></i>
              </div>
              <div>
                <h3 class="text-lg font-semibold text-green-800"><?= htmlspecialchars($item["judul"]) ?></h3>
                <span class="text-sm text-gray-500">
                  <i class="fas fa-calendar-alt mr-1"></i><?= date("d M Y, H:i", strtotime($item["tanggal"])) ?>
                </span>
              </div>
            </div>
            <p class="text-gray-700 mt-3 leading-relaxed"><?= nl2br(htmlspecialchars($item["isi"])) ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    <?php else: ?>
      <p class="text-center text-gray-500">Belum ada pengumuman yang tersedia.</p>
    <?php endif; ?>
  </main>

  <!-- Footer -->
  <footer class="bg-green-800 text-white py-4 text-center text-sm mt-12">
    &copy; <?= date("Y") ?> KUA Pitu Riase | Kementerian Agama Republik Indonesia
  </footer>

</body>
</html>
