<?php

require_once 'C:\\xampp\\htdocs\\Brief9\\connection\\connexion.php';
require_once 'C:\\xampp\\htdocs\\Brief9\\model\\ville\\modelBus.php';

class BusDAO
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function addBus($bus)
    {
        $stmt = $this->db->prepare("INSERT INTO Bus (matricule, busNom, capac, idEn) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssii", $bus->getMatricule(), $bus->getBusNom(), $bus->getCapac(), $bus->getIdEn());

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateBus($bus)
    {
        $stmt = $this->db->prepare("UPDATE Bus SET matricule = ?, busNom = ?, capac = ?, idEn = ? WHERE busNombre = ?");
        $stmt->bind_param("ssiii", $bus->getMatricule(), $bus->getBusNom(), $bus->getCapac(), $bus->getIdEn(), $bus->getBusNombre());

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getBuses()
    {
        $result = $this->db->query("SELECT * FROM Bus");
        $buses = array();

        while ($row = $result->fetch_assoc()) {
            $bus = new Bus($row['matricule'], $row['busNom'], $row['capac'], $row['idEn']);
            $bus->setBusNombre($row['busNombre']);
            $buses[] = $bus;
        }

        return $buses;
    }

    public function deleteBus($bus)
    {
        $stmt = $this->db->prepare("DELETE FROM Bus WHERE busNombre = ?");
        $stmt->bind_param("i", $bus->getBusNombre());

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

?>
