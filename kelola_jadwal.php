<?php

session_start();

if (!isset($_SESSION["login"])) 
{
  header("Location: login.html");

  exit;
}


$file = "data_jadwal.json";

$data = json_decode(file_get_contents($file), true);



// Tambah data

if (isset($_POST['tambah']))
 {
  $data[] = [
    "tanggal" => $_POST["tanggal"],
    "kegiatan" => $_POST["kegiatan"],
    "tempat" => $_POST["tempat"]
  ];
  file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));
 
 header("Location: kelola_jadwal.php");
  
exit;
}



// Hapus data

if (isset($_GET["hapus"])) 
{
  array_splice($data, $_GET["hapus"], 1);
  file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));
 
 header("Location: kelola_jadwal.php");

  exit;
}

?>


<!DOCTYPE html>

<html lang="id">

<head>
  
<meta charset="UTF-8">

  <title>Kelola Jadwal Kegiatan</title>

  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>

<header class="bg-green-800 text-white p-4 shadow">
    <div class="max-w-6xl mx-auto flex justify-between items-center">
      <h1 class="text-xl font-semibold">Kelola Jadwal Kegiatan KUA</h1>
      <a href="dashboard_admin.php" class="bg-white text-green-800 px-3 py-1 rounded hover:bg-green-100 text-sm">
        Kembali ke Dashboard
      </a>
    </div>
  </header>

<body class="bg-gray-100">

<div class="max-w-5xl mx-auto mt-10 bg-white p-6 rounded shadow">
 
 <h2 class="text-xl font-bold text-green-700 mb-4">📋 Kelola Jadwal Kegiatan</h2>


  <form method="post" class="space-y-3 mb-6">
 
   <input type="date" name="tanggal" required class="w-full border p-2 rounded" />
 
   <input type="text" name="kegiatan" placeholder="Nama Kegiatan" required class="w-full border p-2 rounded" />
 
   <input type="text" name="tempat" placeholder="Tempat Kegiatan" required class="w-full border p-2 rounded" />
 
   <button name="tambah" class="bg-green-700 text-white px-4 py-2 rounded">Tambah Jadwal</button>

  </form>

  <table class="w-full table-auto text-sm border border-gray-300">

    <thead class="bg-green-100 text-green-900">
  
    <tr>
        
<th class="border px-2 py-1">Tanggal</th>

        <th class="border px-2 py-1">Kegiatan</th>

        <th class="border px-2 py-1">Tempat</th>

        <th class="border px-2 py-1">Aksi</th>

      </tr>

    </thead>

    <tbody>

      <?php foreach ($data as $i => $row): ?>

      <tr>

        <td class="border px-2 py-1">
<?= htmlspecialchars($row["tanggal"]) ?>
</td>
       
 <td class="border px-2 py-1"><?= htmlspecialchars($row["kegiatan"]) ?></td>

        <td class="border px-2 py-1"><?= htmlspecialchars($row["tempat"]) ?>
</td>
       
 <td class="border px-2 py-1 text-center">

          <a href="?hapus=<?= $i ?>" onclick="return confirm('Hapus jadwal ini?')" class="text-red-600 hover:underline">Hapus</a>

        </td>

      </tr>

      <?php endforeach;
 ?>

    </tbody>

  </table>

</div>
<footer class="text-center text-xs text-gray-400 mt-10 py-4">
    &copy; <?= date("Y") ?> Admin KUA Pitu Riase
  </footer>



</body>

</html>
