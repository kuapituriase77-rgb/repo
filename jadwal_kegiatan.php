<?php

$data = json_decode(file_get_contents("data_jadwal.json"), true);

?>


<!DOCTYPE html>

<html lang="id">

<head>

  <meta charset="UTF-8">

  <title>Jadwal Kegiatan KUA</title>

  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>

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
<body class="bg-gray-100 p-6">

  <div class="max-w-5xl mx-auto bg-white p-6 rounded shadow">

    <h1 class="text-2xl font-bold text-green-800 mb-4"> Jadwal Kegiatan KUA Pitu Riase</h1>

    <table class="w-full border text-sm">

      <thead class="bg-green-100 text-green-800">

        <tr>

          <th class="border px-3 py-2">Tanggal</th>

          <th class="border px-3 py-2">Kegiatan</th>

          <th class="border px-3 py-2">Tempat</th>

        </tr>
      </thead>

      <tbody>

        <?php foreach ($data as $d): ?>

        <tr>

          <td class="border px-3 py-2"><?= htmlspecialchars($d["tanggal"]) ?>
</td>
          
<td class="border px-3 py-2"><?= htmlspecialchars($d["kegiatan"]) ?>
</td>

          <td class="border px-3 py-2"><?= htmlspecialchars($d["tempat"]) ?>
</td>

        </tr>

        <?php endforeach; ?>

      </tbody>

    </table>

  </div>

</body>

</html>
