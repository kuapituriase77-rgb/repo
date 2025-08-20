
<?php
session_start();
$input_user = $_POST['username'];
$input_pass = $_POST['password'];
$users = json_decode(file_get_contents('users.json'), true);

foreach ($users as $user) {
  if ($user['username'] === $input_user && password_verify($input_pass, $user['password'])) {
    $_SESSION['logged_in'] = true;
    header('Location: dashboard.php');
    exit;
  }
}
echo "<script>alert('Login gagal!'); window.location='login.html';</script>";
?>
