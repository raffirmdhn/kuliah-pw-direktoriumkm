<?php
session_start();
include 'koneksi.php';

$email = $_POST['email'];
$password = $_POST['password'];

$cek = mysqli_query($koneksi, "SELECT * FROM users WHERE email='$email'");
$data = mysqli_fetch_assoc($cek);

if ($data && password_verify($password, $data['password'])) {
    $_SESSION['user'] = $data['username'];
    header("Location: ../index.php"); // Ganti ke dashboard
} else {
    echo "Login gagal. <a href='login.php'>Coba lagi</a>";
}
?>
