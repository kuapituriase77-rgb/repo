<?php
$pengaduan = file_exists("pengaduan.txt") ? file_get_contents("pengaduan.txt") : "Belum ada pengaduan masuk.";
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
      <h1 class="text-xl font-semibold">Dashboard Admin - Pengaduan Masyarakat</h1>
      <a href="dashboard_admin.php" class="bg-white text-green-800 px-3 py-1 rounded hover:bg-green-100 text-sm">
        Kembali ke Dashboard
      </a>
    </div>
  </header>

  <!-- Konten -->
  <main class="max-w-5xl mx-auto mt-8 p-6 bg-white rounded shadow">
    <h2 class="text-2xl font-bold text-green-700 mb-4">Daftar Pengaduan</h2>

    <div class="bg-gray-100 border rounded p-4 whitespace-pre-wrap text-sm leading-relaxed overflow-y-auto max-h-[500px]">
      <?= nl2br(htmlspecialchars($pengaduan)) ?>
    </div>

    <?php if (strlen(trim($pengaduan)) > 0): ?>
      <div class="mt-6 text-sm text-gray-500 text-right">
        Total karakter: <?= strlen($pengaduan) ?>
      </div>
    <?php endif; ?>
  </main>

  <!-- Footer -->
  <footer class="text-center text-xs text-gray-400 mt-10 py-4">
    &copy; <?= date("Y") ?> KUA Pitu Riase - Sistem Informasi
  </footer>

</body>
</html>
