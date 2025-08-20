<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.html");
  exit;
}

$data = [];
if (file_exists("buku_tamu.json")) {
  $json = file_get_contents("buku_tamu.json");
  $data = json_decode($json, true);
}

// Filter
$bulan = $_GET["bulan"] ?? '';
$tahun = $_GET["tahun"] ?? '';
$filteredData = array_filter($data, function($item) use ($bulan, $tahun) {
  $time = strtotime($item["tanggal"]);
  return (!$bulan || date("n", $time) == $bulan) &&
         (!$tahun || date("Y", $time) == $tahun);
});
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Lihat Buku Tamu</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <style>
    @media print {
      .no-print { display: none; }
    }
  </style>
</head>
<body class="bg-gray-100 text-gray-800">

 <!-- Header -->
  <header class="bg-green-800 text-white p-4 shadow">
    <div class="max-w-6xl mx-auto flex justify-between items-center">
      <h1 class="text-xl font-semibold">Dashboard Admin - Buku Tamu</h1>
      <a href="dashboard_admin.php" class="bg-white text-green-800 px-3 py-1 rounded hover:bg-green-100 text-sm">
        Kembali ke Dashboard
      </a>
    </div>
  </header>

<main class="max-w-7xl mx-auto mt-8 p-6 bg-white rounded shadow">
  <div class="flex justify-between items-center mb-4 no-print">
    <h2 class="text-xl font-semibold text-green-700">Daftar Pengunjung</h2>
    <button onclick="window.print()" class="bg-blue-600 text-white px-3 py-1 rounded text-sm"> Cetak</button>
  </div>

  <form method="GET" class="mb-4 flex flex-wrap gap-2 items-center no-print">
    <select name="bulan" class="border rounded px-2 py-1">
      <option value="">Semua Bulan</option>
      <?php for ($m = 1; $m <= 12; $m++): ?>
        <option value="<?= $m ?>" <?= $bulan == $m ? 'selected' : '' ?>>
          <?= date("F", mktime(0, 0, 0, $m, 10)) ?>
        </option>
      <?php endfor; ?>
    </select>
    <select name="tahun" class="border rounded px-2 py-1">
      <option value="">Semua Tahun</option>
      <?php for ($y = date("Y"); $y >= 2022; $y--): ?>
        <option value="<?= $y ?>" <?= $tahun == $y ? 'selected' : '' ?>>
          <?= $y ?>
        </option>
      <?php endfor; ?>
    </select>
    <button type="submit" class="bg-green-700 text-white px-3 py-1 rounded">Filter</button>
  </form>

  <?php if (!empty($filteredData)): ?>
    <div class="overflow-x-auto">
      <table class="w-full text-sm border border-gray-200">
        <thead class="bg-green-100 text-green-800">
          <tr>
            <th class="border px-3 py-2">No</th>
            <th class="border px-3 py-2">Nama</th>
            <th class="border px-3 py-2">Alamat</th>
            <th class="border px-3 py-2">Nomor HP</th>
            <th class="border px-3 py-2">Keperluan</th>
            <th class="border px-3 py-2">Pesan/Kesan</th>
            <th class="border px-3 py-2">Tanggal</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach (array_reverse($filteredData) as $i => $row): ?>
            <tr class="hover:bg-gray-50">
              <td class="border px-3 py-2"><?= $i + 1 ?></td>
              <td class="border px-3 py-2"><?= htmlspecialchars($row["nama"]) ?></td>
              <td class="border px-3 py-2"><?= htmlspecialchars($row["alamat"]) ?></td>
              <td class="border px-3 py-2"><?= htmlspecialchars($row["no_hp"]) ?></td>
              <td class="border px-3 py-2"><?= htmlspecialchars($row["keperluan"]) ?></td>
              <td class="border px-3 py-2"><?= htmlspecialchars($row["pesan"]) ?></td>
              <td class="border px-3 py-2"><?= htmlspecialchars($row["tanggal"]) ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php else: ?>
    <p class="text-gray-600">Tidak ada data untuk filter yang dipilih.</p>
  <?php endif; ?>
</main>

<footer class="text-center text-xs text-gray-500 mt-10 py-4 no-print">
  &copy; <?= date("Y") ?> Admin KUA Pitu Riase
</footer>

</body>
</html>
