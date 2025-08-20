<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.html");
  exit;
}

if (isset($_GET["id"])) {
  $id = (int) $_GET["id"];
  $file = "pengumuman.json";

  if (file_exists($file)) {
    $data = json_decode(file_get_contents($file), true);

    if (isset($data[$id])) {
      unset($data[$id]);
      $data = array_values($data); // Reindex ulang
      file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
  }
}

header("Location: pengumuman.php");
exit;
?>
