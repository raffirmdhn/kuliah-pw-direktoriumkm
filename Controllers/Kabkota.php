<?php
require_once 'Config/DB.php';

class Kabkota
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function index()
    {
        $stmt = $this->pdo->query("SELECT  * FROM kabkota");
        $data = $stmt->fetchAll();

        return $data;
    }

    public function show($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM kabkota WHERE id=:id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetch();
        return $data;
    }

    public function create($data)
    {
        $sql = "INSERT INTO kabkota (nama, latitude, longitude, provinsi_id) VALUES (:nama, :latitude, :longitude, :provinsi_id)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':nama' => $data['nama'],
            ':latitude' => $data['latitude'],
            ':longitude' => $data['longitude'],
            ':provinsi_id' => $data['provinsi_id'],
        ]);
        return $this->pdo->lastInsertId();
    }

    public function update($id, $data)
    {
        $sql = "UPDATE kabkota SET nama=:nama, latitude=:latitude, longitude=:longitude, provinsi_id=:provinsi_id WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':nama', $data['nama']);
        $stmt->bindParam(':latitude', $data['latitude']);
        $stmt->bindParam(':longitude', $data['longitude']);
        $stmt->bindParam(':provinsi_id', $data['provinsi_id']);
        $stmt->bindParam(':id', $id);

        $stmt->execute();
        return $this->show($id);
    }

    public function delete($id)
    {
        $row = $this->show($id);
        $sql = "DELETE FROM kabkota WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':id', $id);

        $stmt->execute();
        return $row;
    }
}

$kabkota = new Kabkota($pdo);
