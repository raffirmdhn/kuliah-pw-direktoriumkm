<?php
require 'Controllers/Umkm.php';
require 'Controllers/User.php';

// Controllers
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if ($_POST['action'] === 'getKabKota') {
    header('Content-Type: application/json');
    $provinsi_id = $_POST['provinsi_id'];
    echo json_encode($umkm->getKabKota($provinsi_id));
    exit;
  } else if ($_POST['action'] === 'login') {
    header('Content-Type: application/json');

    echo json_encode($user->login($_POST));
    exit;
  } else if ($_POST['action'] === 'register') {
    header('Content-Type: application/json');
    
    echo json_encode($user->register($_POST));
    exit;
  }
}
