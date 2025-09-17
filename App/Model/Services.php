<?php

namespace App\Model;

use App\Utils\Bdd;

class Services
{
    private \PDO $connexion;

    public function __construct()
    {
        $this->connexion = (new Bdd())->connectBDD();
    }

    public function getAllServices(): array
    {
        $stmt = $this->connexion->query("SELECT * FROM prestations");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getServiceById(int $id): ?array
    {
        $stmt = $this->connexion->prepare("SELECT * FROM prestations WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC) ?: null;
    }

    public function addService(array $data): void
    {
        $stmt = $this->connexion->prepare("INSERT INTO prestations (title, description, price) VALUES (?, ?, ?)");
        $stmt->execute([$data['title'], $data['description'], $data['price']]);
    }

    public function updateService(int $id, array $data): void
    {
        $stmt = $this->connexion->prepare("UPDATE prestations SET title = ?, description = ?, price = ? WHERE id = ?");
        $stmt->execute([$data['title'], $data['description'], $data['price'], $id]);
    }

    public function deleteService(int $id): void
    {
        $stmt = $this->connexion->prepare("DELETE FROM prestations WHERE id = ?");
        $stmt->execute([$id]);
    }
}
