<?php
include 'koneksi.php';

$username = $_POST['username'];
$email    = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$cek = mysqli_query($koneksi, "SELECT * FROM users WHERE email='$email'");
if (mysqli_num_rows($cek) > 0) {
    echo "Email sudah terdaftar. <a href='register.php'>Kembali</a>";
} else {
    $insert = mysqli_query($koneksi, "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')");
    if ($insert) {
        header("Location: login.php");
    } else {
        echo "Gagal daftar. <a href='register.php'>Coba lagi</a>";
    }
}
?>
