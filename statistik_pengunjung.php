<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.html");
  exit;
}

$jumlah = file_exists("counter.txt") ? file_get_contents("counter.txt") : 0;
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Statistik Pengunjung</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
 <header class="bg-green-800 text-white p-4 shadow">
    <div class="max-w-6xl mx-auto flex justify-between items-center">
      <h1 class="text-xl font-semibold">Dashboard Admin - Jumlah Pengujung WEB </h1>
      <a href="dashboard_admin.php" class="bg-white text-green-800 px-3 py-1 rounded hover:bg-green-100 text-sm">
        Kembali ke Dashboard
      </a>
    </div>
  </header>

<body class="bg-gray-100">
  <div class="max-w-2xl mx-auto bg-white mt-12 p-6 rounded shadow">
    <h2 class="text-xl font-bold text-green-700 mb-4"> Statistik Pengunjung</h2>
    <p class="text-lg text-gray-800">Total Pengunjung Website:</p>
    <p class="text-3xl font-bold text-green-700 mt-2"><?= $jumlah ?></p>
  </div>
</body>


<footer class="text-center text-xs text-gray-500 mt-10 py-4 no-print">
  &copy; <?= date("Y") ?> Admin KUA Pitu Riase
</footer>
</html>
