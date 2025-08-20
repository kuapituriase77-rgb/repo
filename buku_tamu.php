<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Isi Buku Tamu - KUA Pitu Riase</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-green-50 text-gray-800 font-sans">

<header class="bg-green-800 text-white p-4">
  <div class="max-w-4xl mx-auto flex justify-between items-center">
    <h1 class="text-lg font-bold">Isi Buku Tamu</h1>
    <a href="index.html" class="text-sm bg-white text-green-800 px-3 py-1 rounded hover:bg-green-100">Beranda</a>
  </div>
</header>

<main class="max-w-2xl mx-auto mt-8 p-6 bg-white rounded shadow">
  <form action="simpan_buku_tamu.php" method="POST" class="space-y-4">
    <div>
      <label class="block font-semibold mb-1">Nama Lengkap</label>
      <input type="text" name="nama" required class="w-full border px-3 py-2 rounded">
    </div>
    <div>
      <label class="block font-semibold mb-1">Alamat</label>
      <input type="text" name="alamat" required class="w-full border px-3 py-2 rounded">
    </div>
    <div>
      <label class="block font-semibold mb-1">Nomor HP</label>
      <input type="text" name="no_hp" class="w-full border px-3 py-2 rounded">
    </div>
    <div>
      <label class="block font-semibold mb-1">Keperluan</label>
      <input type="text" name="keperluan" required class="w-full border px-3 py-2 rounded">
    </div>
    <div>
      <label class="block font-semibold mb-1">Pesan dan Kesan</label>
      <textarea name="pesan" rows="3" class="w-full border px-3 py-2 rounded"></textarea>
    </div>
    <div class="text-right">
      <button type="submit" class="bg-green-700 text-white px-5 py-2 rounded hover:bg-green-800">Kirim</button>
    </div>
  </form>
</main>

<footer class="text-center text-sm text-gray-500 mt-10 py-4">
  &copy; <?= date("Y") ?> KUA Pitu Riase
</footer>

</body>
</html>
