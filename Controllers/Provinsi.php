<?php
require_once 'Config/DB.php';

class Provinsi
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function index()
    {
        $stmt = $this->pdo->query("SELECT  * FROM provinsi");
        $data = $stmt->fetchAll();

        return $data;
    }

    public function show($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM provinsi WHERE id=:id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetch();
        return $data;
    }

    public function create($data)
    {
        $sql = "INSERT INTO provinsi (nama, ibukota, latitude, longitude) VALUES (:nama, :ibukota, :latitude, :longitude)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':nama' => $data['nama'],
            ':ibukota' => $data['ibukota'],
            ':latitude' => $data['latitude'],
            ':longitude' => $data['longitude'],
            
        ]);
        return $this->pdo->lastInsertId();
    }

    public function update($id, $data)
    {
        $sql = "UPDATE provinsi SET nama=:nama, ibukota=:ibukota, latitude=:latitude, longitude=:longitude WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':nama', $data['nama']);
        $stmt->bindParam(':ibukota', $data['ibukota']);
        $stmt->bindParam(':latitude', $data['latitude']);
        $stmt->bindParam(':longitude', $data['longitude']);
        $stmt->bindParam(':id', $id);

        $stmt->execute();
        return $this->show($id);
    }

    public function delete($id)
    {
        $row = $this->show($id);
        $sql = "DELETE FROM provinsi WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':id', $id);

        $stmt->execute();
        return $row;
    }
}

$provinsi = new provinsi($pdo);
