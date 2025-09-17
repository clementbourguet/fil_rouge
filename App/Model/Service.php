<?php

namespace App\Model;

use App\Utils\Bdd;

class Service
{
    private \PDO $connexion;

    public function __construct()
    {
        $this->connexion = (new Bdd())->connectBDD();
    }

    public function getAllServices(): array
    {
        $sql = "SELECT id, name, description, duration_minutes, price, active FROM services";
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getServiceById(int $id): ?array
    {
        $sql = "SELECT id, name, description, duration_minutes, price, active 
                FROM services 
                WHERE id = ?";
        $stmt = $this->connexion->prepare($sql);
        $stmt->bindParam(1, $id, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC) ?: null;
    }

    public function addService(array $data): void
    {
        $sql = "INSERT INTO services (name, description, duration_minutes, price, active) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->connexion->prepare($sql);

        $stmt->bindParam(1, $data['name'], \PDO::PARAM_STR);
        $stmt->bindParam(2, $data['description'], \PDO::PARAM_STR);
        $stmt->bindParam(3, $data['duration_minutes'], \PDO::PARAM_INT);
        $stmt->bindParam(4, $data['price']); // prix peut être decimal → pas de PARAM_INT
        $active = $data['active'] ?? true;
        $stmt->bindParam(5, $active, \PDO::PARAM_BOOL);

        $stmt->execute();
    }

    public function updateService(int $id, array $data): void
    {
        $sql = "UPDATE services 
                SET name = ?, description = ?, duration_minutes = ?, price = ?, active = ? 
                WHERE id = ?";
        $stmt = $this->connexion->prepare($sql);

        $stmt->bindParam(1, $data['name'], \PDO::PARAM_STR);
        $stmt->bindParam(2, $data['description'], \PDO::PARAM_STR);
        $stmt->bindParam(3, $data['duration_minutes'], \PDO::PARAM_INT);
        $stmt->bindParam(4, $data['price']); // prix → float/decimal
        $active = $data['active'] ?? true;
        $stmt->bindParam(5, $active, \PDO::PARAM_BOOL);
        $stmt->bindParam(6, $id, \PDO::PARAM_INT);

        $stmt->execute();
    }

    public function deleteService(int $id): void
    {
        $sql = "DELETE FROM services WHERE id = ?";
        $stmt = $this->connexion->prepare($sql);
        $stmt->bindParam(1, $id, \PDO::PARAM_INT);
        $stmt->execute();
    }
}
