<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Profil KUA Pitu Riase</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-100 text-gray-800 font-sans">

<header class="bg-green-800 text-white p-4 shadow">
  <div class="max-w-6xl mx-auto flex justify-between items-center">
    <h1 class="text-lg font-bold">KUA Pitu Riase</h1>
    <a href="index.html" class="text-sm bg-white text-green-800 px-3 py-1 rounded hover:bg-green-100">?? Beranda</a>
  </div>
</header>

<main class="max-w-6xl mx-auto mt-10 p-6 bg-white rounded shadow">
  <h2 class="text-3xl font-bold text-center text-green-800 mb-6">Profil KUA Kecamatan Pitu Riase</h2>

  <div class="grid md:grid-cols-2 gap-8">
    <div>
      <img src="assets/img/kantor-kua.jpg" alt="KUA Pitu Riase" class="rounded shadow w-full object-cover h-64">
    </div>
    <div>
      <p class="text-gray-700 mb-4">
        Kantor Urusan Agama (KUA) Kecamatan Pitu Riase adalah unit pelaksana teknis Kementerian Agama di tingkat kecamatan 
        yang bertugas menyelenggarakan urusan pelayanan di bidang agama Islam, khususnya layanan pernikahan, wakaf, zakat, bimbingan umat, serta konsultasi keagamaan.
      </p>
      <p class="text-gray-700 mb-2"><strong>Alamat:</strong> Jl. Poros Sidrap - Luwu Timur, Pitu Riase, Sulawesi Selatan</p>
      <p class="text-gray-700 mb-2"><strong>Jam Layanan:</strong> Senin - Jumat, 08.00 – 16.00 WITA</p>
      <p class="text-gray-700"><strong>Email:</strong> kuapituriase77@gmail.com</p>
    </div>
  </div>

  <div class="mt-10">
    <h3 class="text-xl font-semibold text-green-700 mb-3">? Visi</h3>
    <p class="text-gray-700 mb-6">Terwujudnya pelayanan prima bidang urusan keagamaan yang profesional dan bermartabat.</p>

    <h3 class="text-xl font-semibold text-green-700 mb-3">?? Misi</h3>
    <ul class="list-disc pl-6 text-gray-700 space-y-2">
      <li>Memberikan pelayanan pernikahan yang cepat dan transparan</li>
      <li>Meningkatkan bimbingan keagamaan masyarakat</li>
      <li>Memberdayakan zakat, infak dan wakaf secara produktif</li>
      <li>Mendorong kerukunan umat dan toleransi antar golongan</li>
    </ul>
  </div>
</main>

<footer class="text-center text-xs text-gray-500 mt-10 py-4">
  &copy; <?= date("Y") ?> KUA Kecamatan Pitu Riase
</footer>

</body>
</html>
