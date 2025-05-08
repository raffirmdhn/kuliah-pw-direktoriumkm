<?php
require 'Controllers/Umkm.php';

// Controllers
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'getKabKota') {
  header('Content-Type: application/json');
  $provinsi_id = $_POST['provinsi_id'];
  echo json_encode($umkm->getKabKota($provinsi_id));
  exit;
}
