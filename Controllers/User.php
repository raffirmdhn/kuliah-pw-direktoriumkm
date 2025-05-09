<?php
session_start();
require_once 'Config/DB.php';

class User
{
  private $pdo;

  public function __construct($pdo)
  {
    $this->pdo = $pdo;
  }

  public function register($data)
  {
    $nama = $data['nama'];
    $email = $data['email'];
    $password = $data['password'];

    $stmt = $this->pdo->prepare("SELECT * FROM user WHERE email=:email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $existUser = $stmt->fetch();

    if ($existUser) {
      return [
        "status" => 403,
        "message" => "Akun Email sudah digunakan."
      ];
      die;
    }

    $stmt = $this->pdo->prepare("INSERT INTO user (nama, email, password) VALUES(:nama, :email, :password)");
    $stmt->execute([
      ':nama' => $nama,
      ':email' => $email,
      ':password' => password_hash($password, PASSWORD_DEFAULT),
    ]);
    $lastInsertId = $this->pdo->lastInsertId();

    return [
      "status" => 200,
      "message" => "Registrasi berhasil, silahkan login.",
      "data" => ["id" => $lastInsertId]
    ];
    die;
  }

  public function login($data)
  {
    $stmt = $this->pdo->prepare("SELECT * FROM user WHERE email=:email");
    $stmt->bindParam(':email', $data['email']);
    $stmt->execute();
    $user = $stmt->fetch();

    if ($user && password_verify($data['password'], $user['password'])) {
      $_SESSION['user'] = $user;
      return [
        "status" => 200,
        "message" => "Login berhasil!"
      ];
    }
    return [
      "status" => 401,
      "message" => "Login gagal! Email atau Password salah."
    ];
  }
}

$user = new User($pdo);
