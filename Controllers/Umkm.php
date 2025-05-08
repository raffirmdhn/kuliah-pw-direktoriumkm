<?php
require_once 'Config/DB.php';

class Umkm
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function index()
    {
        $stmt = $this->pdo->query(
            "SELECT 
            u.*,
            k.nama AS kabkota,
            ku.nama AS kategori_umkm,
            b.nama AS pembina,
            p.nama AS provinsi
            FROM umkm u
            LEFT JOIN kabkota k ON u.kabkota_id = k.id
            LEFT JOIN provinsi p ON k.provinsi_id = p.id
            LEFT JOIN kategori_umkm ku ON u.kategori_umkm_id = ku.id
            LEFT JOIN pembina b ON u.pembina_id = b.id
            "
        );
        $data = $stmt->fetchAll();

        return $data;
    }

    public function show($id)
    {
        $stmt = $this->pdo->query("SELECT 
            u.*,
            k.nama AS kabkota,
            ku.nama AS kategori_umkm,
            b.nama AS pembina,
            p.id AS provinsi_id
            FROM umkm u
            LEFT JOIN kabkota k ON u.kabkota_id = k.id
            LEFT JOIN provinsi p ON k.provinsi_id = p.id
            LEFT JOIN kategori_umkm ku ON u.kategori_umkm_id = ku.id
            LEFT JOIN pembina b ON u.pembina_id = b.id
            WHERE u.id=$id
            ");
        $data = $stmt->fetch();
        return $data;
    }

    public function create($data)
    {
        $sql = "INSERT INTO umkm (nama, modal, pemilik, alamat, website, email, rating, kabkota_id, kategori_umkm_id, pembina_id) VALUES (:nama, :modal, :pemilik, :alamat, :website, :email, :rating, :kabkota_id, :kategori_umkm_id, :pembina_id)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':nama' => $data['nama'],
            ':modal' => $data['modal'],
            ':pemilik' => $data['pemilik'],
            ':alamat' => $data['alamat'],
            ':website' => $data['website'],
            ':email' => $data['email'],
            ':rating' => $data['rating'],
            ':kabkota_id' => $data['kabkota_id'],
            ':kategori_umkm_id' => $data['kategori_umkm_id'],
            ':pembina_id' => $data['pembina_id']
        ]);
        return $this->pdo->lastInsertId();
    }

    public function update($id, $data)
    {
        $sql = "UPDATE umkm SET nama=:nama, modal=:modal, pemilik=:pemilik, alamat=:alamat, website=:website, email=:email, rating=:rating, kabkota_id=:kabkota_id, kategori_umkm_id=:kategori_umkm_id, pembina_id=:pembina_id WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':nama', $data['nama']);
        $stmt->bindParam(':modal', $data['modal']);
        $stmt->bindParam(':pemilik', $data['pemilik']);
        $stmt->bindParam(':alamat', $data['alamat']);
        $stmt->bindParam(':website', $data['website']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':rating', $data['rating']);
        $stmt->bindParam(':kabkota_id', $data['kabkota_id']);
        $stmt->bindParam(':kategori_umkm_id', $data['kategori_umkm_id']);
        $stmt->bindParam(':pembina_id', $data['pembina_id']);
        $stmt->bindParam(':id', $id);

        $stmt->execute();
        return $this->show($id);
    }

    public function delete($id)
    {
        $row = $this->show($id);
        $sql = "DELETE FROM umkm WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':id', $id);

        $stmt->execute();
        return $row;
    }

    public function getProvinsi()
    {
        $stmt = $this->pdo->query("SELECT * FROM provinsi");
        return $stmt->fetchAll();
    }

    public function getKabKota($provinsi_id = null)
    {
        if ($provinsi_id) {
            $stmt = $this->pdo->prepare("SELECT * FROM kabkota WHERE provinsi_id = :provinsi_id");
            $stmt->bindParam(':provinsi_id', $provinsi_id);
            $stmt->execute();
        } else {
            $stmt = $this->pdo->query("SELECT * FROM kabkota");
        }
        return $stmt->fetchAll();
    }

    public function getKategoriUmkm()
    {
        $stmt = $this->pdo->query("SELECT * FROM kategori_umkm");
        return $stmt->fetchAll();
    }

    public function getPembina()
    {
        $stmt = $this->pdo->query("SELECT * FROM pembina");
        return $stmt->fetchAll();
    }
}

$umkm = new Umkm($pdo);
