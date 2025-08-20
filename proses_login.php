<?php
session_start();

$username = $_POST["username"];
$password = $_POST["password"];

// Username dan password default
if ($username === "admin" && $password === "admin123") {
  $_SESSION["login"] = true;
  $_SESSION["username"] = $username;
  header("Location: dashboard_admin.php");
  exit;
} else {
  echo "<script>alert('Login gagal! Username atau password salah.'); window.location='login.html';</script>";
}
?>
