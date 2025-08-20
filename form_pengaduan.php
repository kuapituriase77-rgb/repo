<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Pengaduan - KUA Pitu Riase</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-green-50 text-gray-800">

  <!-- Header -->
  <header class="bg-green-800 text-white shadow">
    <div class="max-w-6xl mx-auto px-4 py-4 flex items-center justify-between">
      <div class="flex items-center space-x-3">
          <img src="logo.png" alt="Logo Kemenag" class="w-10 h-10">
        <h1 class="text-lg font-bold">KUA Pitu Riase</h1>
      </div>
      <a href="index.html" class="text-sm hover:underline">🏠 Beranda</a>
    </div>
  </header>

  <!-- Konten -->
  <main class="max-w-xl mx-auto px-6 py-10">
    <h2 class="text-2xl font-bold text-green-700 mb-6 text-center">
      <i class="fas fa-comments mr-2"></i>Formulir Pengaduan
    </h2>

    <form action="simpan_pengaduan.php" method="POST" class="bg-white p-6 rounded shadow space-y-4">
      <div>
        <label class="block font-semibold mb-1">Nama Lengkap</label>
        <input type="text" name="nama" required class="w-full border border-gray-300 rounded px-3 py-2">
      </div>

      <div>
        <label class="block font-semibold mb-1">Email</label>
        <input type="email" name="email" required class="w-full border border-gray-300 rounded px-3 py-2">
      </div>

      <div>
        <label class="block font-semibold mb-1">Isi Pengaduan</label>
        <textarea name="pesan" rows="5" required class="w-full border border-gray-300 rounded px-3 py-2"></textarea>
      </div>

      <div class="text-right">
        <button type="submit" class="bg-green-700 text-white px-5 py-2 rounded hover:bg-green-800">
          <i class="fas fa-paper-plane mr-1"></i>Kirim Pengaduan
        </button>
      </div>
    </form>
  </main>

  <!-- Footer -->
  <footer class="bg-green-800 text-white py-4 text-center text-sm mt-12">
    &copy; <?= date("Y") ?> KUA Pitu Riase | Kementerian Agama RI
  </footer>

</body>
</html>
