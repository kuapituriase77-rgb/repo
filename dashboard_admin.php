<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.html");
  exit;
}

// Ambil data buku tamu
$tamu = [];
if (file_exists("buku_tamu.json")) {
  $json = file_get_contents("buku_tamu.json");
  $tamu = json_decode($json, true);
}

$hariIni = date("Y-m-d");
$bulanIni = date("Y-m");

$totalHariIni = 0;
$totalBulanIni = 0;

foreach ($tamu as $row) {
  $tgl = date("Y-m-d", strtotime($row["tanggal"]));
  if ($tgl === $hariIni) $totalHariIni++;
  if (strpos($tgl, $bulanIni) === 0) $totalBulanIni++;
}

$totalSemua = count($tamu);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard Admin - KUA Pitu Riase</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-100 text-gray-800">

<header class="bg-green-800 text-white p-4">
  <div class="max-w-6xl mx-auto flex justify-between items-center">
    <h1 class="text-lg font-bold">Dashboard Admin KUA</h1>
  </div>
</header>

<main class="max-w-6xl mx-auto mt-6 p-6 bg-white rounded shadow">

  <!-- Statistik Pengunjung -->
  <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-white text-center mb-8">
    <div class="bg-green-600 p-4 rounded shadow">
      <div class="text-2xl font-bold"><?= $totalHariIni ?></div>
      <div>Pengunjung Hari Ini</div>
    </div>
    <div class="bg-yellow-500 p-4 rounded shadow">
      <div class="text-2xl font-bold"><?= $totalBulanIni ?></div>
      <div>Pengunjung Bulan Ini</div>
    </div>
    <div class="bg-blue-600 p-4 rounded shadow">
      <div class="text-2xl font-bold"><?= $totalSemua ?></div>
      <div>Total Pengunjung</div>
    </div>
  </div>

  <!-- Menu Admin -->
  <main class="flex-grow py-10 px-4">
   
 <div class="max-w-6xl mx-auto">
      
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
 
       
        <a href="kelola_pengumuman.php" class="bg-white rounded-xl shadow hover:shadow-lg p-6 text-center transition">
 
         <i class="fas fa-bullhorn text-4xl text-green-600 mb-3"></i>
     
     <h3 class="text-lg font-semibold">Kelola Pengumuman</h3>
   
     </a>

        <a href="lihat_pengaduan.php" class="bg-white rounded-xl shadow hover:shadow-lg p-6 text-center transition">
    
      <i class="fas fa-inbox text-4xl text-green-600 mb-3"></i>
  
        <h3 class="text-lg font-semibold">Lihat Pengaduan</h3>
       
 </a>

       
 <a href="upload_galeri.php" class="bg-white rounded-xl shadow hover:shadow-lg p-6 text-center transition">
     
     <i class="fas fa-image text-4xl text-green-600 mb-3"></i>
          
<h3 class="text-lg font-semibold">Galeri Kegiatan</h3>
    
    </a>

    
    <a href="upload_unduhan.php" class="bg-white rounded-xl shadow hover:shadow-lg p-6 text-center transition">
 
 <i class="fas fa-upload text-4xl text-green-600 mb-3"></i>

  <h3 class="text-lg font-semibold">Upload Unduhan</h3>
</a>



<a href="kelola_berita.php" class="bg-white rounded-xl shadow hover:shadow-lg p-6 text-center transition">

          <i class="fas fa-file-download text-4xl text-green-600 mb-3"></i>
      
    <h3 class="text-lg font-semibold">Kelola Berita</h3>
       
 </a>

    

<a href="lihat_buku_tamu.php" class="bg-white rounded-xl shadow hover:shadow-lg p-6 text-center transition">

          <i class="fas fa-book-open text-4xl text-green-600 mb-3"></i>
      
    <h3 class="text-lg font-semibold">Lihat Buku Tamu</h3>
       
 </a>

<a href="statistik_pengunjung.php" class="bg-white rounded-xl shadow hover:shadow-lg p-6 text-center transition">

          <i class="fas fa-clock text-4xl text-green-600 mb-3"></i>
      
    <h3 class="text-lg font-semibold">Statistik Pengunjung</h3>
</a>

<!-- Menu Kelola Jadwal -->
<a href="kelola_jadwal.php" class="bg-white rounded-xl shadow hover:shadow-lg p-6 text-center transition">

          <i class="fas fa-book text-4xl text-green-600 mb-3"></i>
      
    <h3 class="text-lg font-semibold">Kelola Jadwal</h3>
</a>


    <a href="index.html" class="bg-white rounded-xl shadow hover:shadow-lg p-6 text-center transition">
      
    <i class="fas fa-home text-4xl text-green-600 mb-3"></i>
 
         <h3 class="text-lg font-semibold">Kembali ke Beranda</h3>
        
</a>

        
<a href="logout.php" class="bg-red-100 hover:bg-red-200 text-red-800 rounded-xl shadow p-6 text-center transition">

          <i class="fas fa-sign-out-alt text-4xl mb-3"></i>
          <h3 class="text-lg font-semibold">Logout</h3>

        </a>

     
  </div>

</main>

<footer class="text-center text-xs text-gray-500 mt-10 py-4">
  &copy; <?= date("Y") ?> Admin KUA Pitu Riase
</footer>

</body>
</html>
