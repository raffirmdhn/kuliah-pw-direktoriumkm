<?php
$koneksi = mysqli_connect("localhost", "root", "", "kuliah_direktoriumkm");

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
