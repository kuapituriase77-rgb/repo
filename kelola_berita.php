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
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Kelola Berita - Admin KUA</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-100 text-gray-800">

  <header class="bg-green-800 text-white p-4 shadow">
    <div class="max-w-6xl mx-auto flex justify-between items-center">
      <h1 class="text-xl font-semibold">Kelola Berita</h1>
      <a href="dashboard_admin.php" class="bg-white text-green-800 px-3 py-1 rounded hover:bg-green-100 text-sm">
        Kembali ke Dashboard
      </a>
    </div>
  </header>

  <main class="max-w-6xl mx-auto p-6 bg-white mt-6 rounded shadow">
    <div class="flex justify-between items-center mb-6">
      <h2 class="text-xl font-bold text-green-700">Daftar Berita</h2>
      <a href="tambah_berita.html" class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800 text-sm">
        <i class="fas fa-plus-circle mr-1"></i>Tambah Berita
      </a>
    </div>

    <?php if (!empty($data)): ?>
      <table class="w-full text-sm text-left border border-gray-200">
        <thead class="bg-green-100 text-green-800">
          <tr>
            <th class="p-2 border">Thumbnail</th>
            <th class="p-2 border">Judul</th>
            <th class="p-2 border">Tanggal</th>
            <th class="p-2 border text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach (array_reverse($data) as $index => $item): ?>
            <tr class="hover:bg-gray-50">
              <td class="p-2 border">
                <img src="uploads/berita/<?= htmlspecialchars($item['gambar']) ?>" class="w-20 h-14 object-cover rounded" />
              </td>
              <td class="p-2 border"><?= htmlspecialchars($item["judul"]) ?></td>
              <td class="p-2 border"><?= date("d M Y, H:i", strtotime($item["tanggal"])) ?></td>
              <td class="p-2 border text-center space-x-1">
                <a href="edit_berita.php?id=<?= $index ?>" class="text-blue-600 hover:underline">Edit</a>
                <a href="hapus_berita.php?id=<?= $index ?>" onclick="return confirm('Hapus berita ini?')" class="text-red-600 hover:underline">Hapus</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php else: ?>
      <p class="text-gray-600">Belum ada berita ditambahkan.</p>
    <?php endif; ?>
  </main>

  <footer class="text-center text-xs text-gray-400 mt-10 py-4">
    &copy; <?= date("Y") ?> Admin KUA Pitu Riase
  </footer>

</body>
</html>
