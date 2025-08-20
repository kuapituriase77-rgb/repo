<?php
session_start();

if (!isset($_SESSION["login"])) {
  header("Location: login.html");
  exit;
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
 
 <title>Dashboard Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
 
 <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
 
 <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/forms"></script>
 
 <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
</head>
<body class="bg-gradient-to-br from-green-50 to-green-100 min-h-screen flex flex-col">

 
 <header class="bg-green-700 text-white shadow py-4">
 
   <div class="max-w-6xl mx-auto px-4">
   
   <h1 class="text-2xl font-bold flex items-center"><i class="fas fa-user-shield mr-2"></i> Dashboard Admin KUA Pitu Riase</h1>
   
 </div>
  
</header>

  
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

    <a href="index.html" class="bg-white rounded-xl shadow hover:shadow-lg p-6 text-center transition">
      
    <i class="fas fa-home text-4xl text-green-600 mb-3"></i>
 
         <h3 class="text-lg font-semibold">Kembali ke Beranda</h3>
        
</a>

        
<a href="logout.php" class="bg-red-100 hover:bg-red-200 text-red-800 rounded-xl shadow p-6 text-center transition">

          <i class="fas fa-sign-out-alt text-4xl mb-3"></i>
          <h3 class="text-lg font-semibold">Logout</h3>

        </a>

     
 </div>
    
</div>
 
 </main>


  <footer class="text-center py-4 text-sm text-gray-500">
    &copy; <?= date("Y") ?> KUA Pitu Riase. All rights reserved.
  
</footer>

</body>
</html>
