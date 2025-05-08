<?php
require_once 'Config/DB.php';

class Pembina
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function index()
    {
        $stmt = $this->pdo->query("SELECT  * FROM pembina");
        $data = $stmt->fetchAll();

        return $data;
    }

    public function show($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM pembina WHERE id=:id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetch();
        return $data;
    }

    public function create($data)
    {
        $sql = "INSERT INTO pembina (nama, gender, tgl_lahir, tmp_lahir, keahlian) VALUES (:nama, :gender, :tgl_lahir, :tmp_lahir, :keahlian)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':nama' => $data['nama'],
            ':gender' => $data['gender'],
            ':tgl_lahir' => $data['tgl_lahir'],
            ':tmp_lahir' => $data['tmp_lahir'],
            ':keahlian' => $data['keahlian'],
        ]);
        return $this->pdo->lastInsertId();
    }

    public function update($id, $data)
    {
        $sql = "UPDATE pembina SET nama=:nama, gender=:gender, tgl_lahir=:tgl_lahir, tmp_lahir=:tmp_lahir, keahlian=:keahlian WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':nama', $data['nama']);
        $stmt->bindParam(':gender', $data['gender']);
        $stmt->bindParam(':tgl_lahir', $data['tgl_lahir']);
        $stmt->bindParam(':tmp_lahir', $data['tmp_lahir']);
        $stmt->bindParam(':keahlian', $data['keahlian']);
        $stmt->bindParam(':id', $id);

        $stmt->execute();
        return $this->show($id);
    }

    public function delete($id)
    {
        $row = $this->show($id);
        $sql = "DELETE FROM pembina WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':id', $id);

        $stmt->execute();
        return $row;
    }
}

$pembina = new Pembina($pdo);
